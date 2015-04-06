<?php

class dboperation {

    public static function logIn($useremail, $userpass) {
        $data = array("status" => "false", "message" => "");
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT count(*) as find FROM admin WHERE admin_email = :useremail');
            $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $find;
            foreach ($result as $row) {
                $find = ($row['find'] == 0) ? false : true;
            }

            if ($find == FALSE) {
                $data["message"] = "email not found on the database";
            } else {
                $stmt = $dbh->prepare("SELECT admin_password FROM admin WHERE admin_email = :useremail");
                $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                $stmt->execute();
                $pass = $stmt->fetch(PDO::FETCH_ASSOC);
                include_once '../class/cryptpass.php';

                if (decrypt_pass($userpass, $pass['admin_password'])) {
                    $query = 'SELECT admin_id, admin_type.admintype_name as level, '
                            . ' admin_name '
                            . ' FROM admin, admin_type WHERE '
                            . 'admin_email = :useremail and '
                            . 'admin_type.admintype_id = admin.admin_type';
                    $stmt = $dbh->prepare($query);
                    $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    session_start();


                    $_SESSION['login-admin-name'] = $row['admin_name'];
                    $_SESSION['login-admin-id'] = $row['admin_id'];
                    $_SESSION['login-admin-email'] = $useremail;
                    $_SESSION['login-admin-level'] = $row['level'];
                    $_SESSION['login'] = true;


                    $data["message"] = "some message";
                    $data["status"] = "true";

                    //inserted repor
//                    require_once 'ActionReport.php';
//                    DB_operation::action_report(LOGIN);
                } else {
                    //                if the password is wrong
                    $data["message"] = "password is wrong";
                }
            }
//            close the database connection
        } catch (PDOException $e) {
            $data["message"] = $e->getMessage();
            $data["status"] = "false";
        } finally {
            $dbh = null;
            echo json_encode($data);
        }
    }

    public static function getPlacesTypes() {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT place_id, place_name FROM place_type WHERE 1";
            $getPlacesTypes = array();
            foreach ($dbh->query($sql) as $row) {
                $id = $row['place_id'];
                $type = $row['place_name'];
                $getPlacesTypes[$id] = $type;
            }

            return $getPlacesTypes;

            /*             * * close the database connection ** */
            $dbh = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getAllPlacesx() {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT place_id, place_name FROM place_type WHERE 1";
            $getPlacesTypes = array();
            foreach ($dbh->query($sql) as $row) {
                $id = $row['place_id'];
                $type = $row['place_name'];
                $getPlacesTypes[$id] = $type;
            }

            return $getPlacesTypes;

            /*             * * close the database connection ** */
            $dbh = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function newPlace($admin_id, $place_name, $place_type, $address, $location_lat, $location_lng, $view, $description) {

        $data = array("status" => "false", "message" => "");
//        require_once 'DB_coninfo.php';



        try {

            $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)
                    or die(mysqli_error($conn));
            $conn->set_charset('UTF-8');
            $conn->query('SET NAMES utf8');
            $query = 'INSERT INTO oman_tourism_guide.place '
                    . '(place_id, '
                    . 'place_type, '
                    . 'place_name, '
                    . 'address, '
                    . 'place_location_lat,'
                    . ' place_location_lng, '
                    . 'place_admin_creator, '
                    . 'view, '
                    . 'description) '
                    . 'VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)';
            $stmt = $conn->prepare($query) or die(mysql_error());
            $stmt->bind_param('issddiis', intval($place_type), strval($place_name), strval($address), doubleval($location_lat), doubleval($location_lng), intval($admin_id), intval($view), strval($description)
            );
            $stmt->execute();
            if ($stmt->affected_rows == 1) {
                $data["status"] = "true";
            } else {
                $data["message"] = $stmt->error;
                $data["status"] = "false";
            }
        } catch (Exception $e) {
            $data["message"] = $e->getMessage();
            $data["status"] = "false";
        } finally {
            $conn->close();
            echo json_encode($data);
        }
    }

    public static function placeTotalCount() {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = 'SELECT count(*) as count FROM place WHERE 1';
            $count;
            foreach ($dbh->query($sql) as $row) {
                $count = $row['count'];
            }
            return $count;
            $dbh = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function placeSearch($searchkey) {
        $searchkey = strval($searchkey);
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                                    place.place_id,
                                    place_type.place_name AS placetype,
                                    place.address,
                                    place.place_location_lat,
                                    place.place_location_lng,
                                    place.description,
                                    place.view,
                                    DATE(place.create_date) AS adddate,
                                    place.place_name,
                                    place.place_type
                                  FROM place
                                    INNER JOIN place_type
                                      ON place.place_type = place_type.place_id
                                  WHERE 1 AND place.place_name LIKE "%' . $searchkey . '%"
                                  OR place_type.place_name LIKE "%' . $searchkey . '%"
                                  OR place.address LIKE "%' . $searchkey . '%"
                                  OR place.create_date LIKE "%' . $searchkey . '%"
                                  OR place.description LIKE "%' . $searchkey . '%"
                                  ORDER BY place.create_date DESC');
//            $stmt->bindParam(':searchkey', $searchkey, PDO::PA);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $data = array();
            $place = array("id" => "",
                "placetype" => "",
                "name" => "",
                "view" => "",
                "locationlat" => "",
                "placetypeid" => "",
                "desc" => "",
                "locationlang" => "",
                "createdate" => "",
                "address" => "");
            foreach ($result as $row) {
                $place["id"] = $row['place_id'];
                $place["placetype"] = $row['placetype'];
                $place["name"] = $row['place_name'];
                $place["placetypeid"] = $row['place_type'];
                $place["view"] = $row['view'];
                $place["address"] = $row['address'];
                $place["locationlat"] = $row['place_location_lat'];
                $place["locationlang"] = $row['place_location_lng'];
                $place["createdate"] = $row['adddate'];
                $place["desc"] = $row['description'];
                array_push($data, $place);
            }
            $response["data"] = $data;
            $response["status"] = "true";
        } catch (PDOException $e) {
            $response["data"] = $e->getMessage();
            $response["status"] = "false";
            echo $e->getMessage();
        } finally {
            echo json_encode($response);

            /*             * * close the database connection ** */
            $dbh = null;
        }
    }

    public static function getPlacesList($selectfrom = 1, $selectto = 25) {
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                                    place.place_id,
                                    place_type.place_name AS placetype,
                                    place.address,
                                    place.view,
                                    place.place_location_lat,
                                    place.place_location_lng,
                                    place.description,
                                    DATE(place.create_date) AS adddate,
                                    place.place_name,
                                    place.place_type
                                  FROM place
                                    INNER JOIN place_type
                                      ON place.place_type = place_type.place_id
                      ORDER BY place.create_date DESC
                      LIMIT ' . $selectfrom . ' , ' . $selectto . '');

            $stmt->execute();
            $result = $stmt->fetchAll();
            $response = array("status" => "false", "data" => "");
            $place = array("id" => "",
                "placetype" => "",
                "name" => "",
                "view" => "",
                "locationlat" => "",
                "desc" => "",
                "locationlang" => "",
                "createdate" => "",
                "placetypeid" => "",
                "address" => "");
            $data = array();
            foreach ($result as $row) {
                $place["id"] = $row['place_id'];
                $place["type"] = $row['placetype'];
                $place["placetypeid"] = $row['place_type'];
                $place["name"] = $row['place_name'];
                $place["view"] = $row['view'];
                $place["address"] = $row['address'];
                $place["locationlat"] = $row['place_location_lat'];
                $place["locationlang"] = $row['place_location_lng'];
                $place["creatdate"] = $row['adddate'];
                $place["desc"] = $row['description'];
                array_push($data, $place);
            }
            $response['data'] = $data;
            $response["status"] = "true";
        } catch (PDOException $e) {
            $response["data"] = $e->getMessage();
            $response["status"] = "false";
            echo $e->getMessage();
        } finally {
            return json_encode($response);
            $dbh = null;
        }
    }

    public static function updatePlaces($placeid, $place_type, $new_name, $new_address, $loc_lat, $loc_lang, $view, $description) {
        $response = array("status" => "false", "message" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('UPDATE place
                            SET place_type = :place_type,
                                place_name = :new_name,
                                address = :new_address,
                                place_location_lat = :loc_lat,
                                place_location_lng = :loc_lang,
                                view = :view,
                                description = :desc,
                                last_update = CURRENT_TIMESTAMP()
                            WHERE place_id = :placeid');
            $stmt->bindParam(':place_type', $place_type, PDO::PARAM_INT);
            $stmt->bindParam(':new_name', $new_name, PDO::PARAM_STR);
            $stmt->bindParam(':new_address', $new_address, PDO::PARAM_STR);
            $stmt->bindParam(':loc_lat', $loc_lat, PDO::PARAM_STR);
            $stmt->bindParam(':loc_lang', $loc_lang, PDO::PARAM_STR);
            $stmt->bindParam(':view', $view, PDO::PARAM_INT);
            $stmt->bindParam(':desc', $description, PDO::PARAM_STR);
            $stmt->bindParam(':placeid', $placeid, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $response['message'] = "done";
                $response["status"] = "true";
            } else {
                $response['message'] = $stmt->errorInfo();
                $response["status"] = "false";
            }
        } catch (PDOException $e) {
            $response["message"] = $e->getMessage();
            $response["status"] = "false";
            echo $e->getMessage();
        } finally {
            echo json_encode($response);
            $dbh = null;
        }
    }

    public static function removePlaces($placeid, $password, $email) {
        $response = array("status" => "tru", "message" => "");

        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $stmt = $dbh->prepare("SELECT admin_password FROM admin WHERE admin_id = 1");
            $stmt->bindParam(':useremail', $email, PDO::PARAM_STR);
            $stmt->execute();
            $pass = $stmt->fetchAll();

            if (decrypt_pass($password, $pass[0]['admin_password'])) {
                $response["status"] = "true";

                $stmt = $dbh->prepare('DELETE
                                    FROM place
                                  WHERE place_id = :placeid');
                $stmt->bindParam(':placeid', $placeid, PDO::PARAM_INT);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $response["message"] = "done";
                    $response["status"] = "true";
                } else {
                    $response["message"] = $stmt->errorInfo();
                    $response["status"] = "false";
                }
            } else {
                $response["message"] = "wrong password";
                $response["status"] = "false";
            }
        } catch (PDOException $e) {
            $response["message"] = $e->getMessage();
            $response["status"] = "false";
        } finally {
;
            echo json_encode($response);
            $dbh = null;
        }
    }

}
