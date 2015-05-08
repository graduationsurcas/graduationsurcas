<?php

class dboperation {
    public static function action_report($report, $adminid) {
        $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)
                or die(mysqli_error($conn));
        $conn->set_charset('UTF-8');
        $conn->query('SET NAMES utf8');
        $query = 'INSERT INTO action_report(id_action_report, admin, source_ip,'
                . ' report, create_date) VALUES '
                . '(NULL, ?, ?, ?,CURRENT_TIMESTAMP)';
        $stmt = $conn->prepare($query) or die(mysql_error());
        $stmt->bind_param('iss', 
                $adminid,
                $_SERVER['REMOTE_ADDR'],
                $report);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
//            return TRUE;
        } else {
//            return FALSE;
//             echo $stmt->error;
        }
        $conn->close();
    }

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
    
    
    /* test/
     * 
     * 
     */

    public static function restpass($useremail) {
        
        $data = array("status" => "false", "message" => "");
        try {
            $randompass = rand(1, 9);
            $place_type = ($randompass);
            dboperation::senemail($useremail);
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('update admin
                            SET admin_password = :password 
                                where admin_email = :email');
            $stmt->bindParam(':password', $place_type, PDO::PARAM_INT);
            $stmt->bindParam(':email', $useremail, PDO::PARAM_INT);
            $stmt->execute();
            
//            close the database connection
        } catch (PDOException $e) {
            $data["message"] = $e->getMessage();
            $data["status"] = "false";
        } finally {
            $dbh = null;
            echo json_encode($data);
        }
    }

    /*
     * 
     */
    public static function senemail($useremail) {
         $to = $useremail;
   $subject = "This is subject";
   $message = "This is simple text message.";
   $header = "From:albusaidi1231@gmail.com \r\n";
   $retval = mail ($to,$subject,$message,$header);
        
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

    public static function getAllItemTypes() {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT itemtype_id, itemtype_name FROM item_type WHERE 1";
            $getAllItemTypes = array();
            foreach ($dbh->query($sql) as $row) {
                $id = $row['itemtype_id'];
                $type = $row['itemtype_name'];
                $getAllItemTypes[$id] = $type;
            }

            return $getAllItemTypes;

            /*             * * close the database connection ** */
            $dbh = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getAllPlaces() {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT
                    place.place_id,
                    place.place_name,
                    place_type.place_name AS type
                  FROM place
                    INNER JOIN place_type
                      ON place.place_type = place_type.place_id";
            $getPlacesTypes = array();
            foreach ($dbh->query($sql) as $row) {
                array_push($getPlacesTypes, $row);
            }

            return $getPlacesTypes;

            /*             * * close the database connection ** */
            $dbh = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function newPlace($admin_id, $place_name, $place_type, 
            $address, $location_lat, $location_lng,
            $view, $description, $images) {

        $data = array("status" => "false", "message" => "");
//        require_once 'DB_coninfo.php';



        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
                    . 'VALUES (NULL, '
                    . ' :place_type,'
                    . ' :place_name,'
                    . ' :address,'
                    . ' :place_location_lat,'
                    . ' :place_location_lng,'
                    . ' :place_admin_creator,'
                    . ' :view ,'
                    . ' :description)';
            $stmt = $dbh->prepare($query) or die(mysql_error());
            $stmt->bindParam(':place_type', $place_type, PDO::PARAM_INT);
            $stmt->bindParam(':place_name', $place_name, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':place_location_lat', $location_lat, PDO::PARAM_STR);
            $stmt->bindParam(':place_location_lng', $location_lng, PDO::PARAM_STR);
            $stmt->bindParam(':place_admin_creator', $admin_id, PDO::PARAM_INT);
            $stmt->bindParam(':view', $view, PDO::PARAM_INT);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->execute();
             if ($stmt->rowCount() == 1) {
                $data["status"] = "true";
                $idofinserteditem = $dbh->lastInsertId();
                $placeimage = dboperation::uploadItemImages($images);
                if (count($placeimage["success"]) > 0) {
                    $stmt = $dbh->prepare('INSERT INTO place_image
                        (place_image_id, place_id, image_title, image_path) 
                      VALUES(:id, :placeid, :imageurl, :path)');
                    foreach ($placeimage["success"] as $imagename) {
                        $stmt->bindValue(':id', 'NULL');
                        $stmt->bindValue(':placeid', $idofinserteditem);
                        $stmt->bindValue(':imageurl', $imagename);
                        $stmt->bindValue(':path', '../uploadsimages/');
                        $stmt->execute();
                    }
                }
            } else {
                $data["message"] = $stmt->errorInfo();
                $data["status"] = "false";
            }
        } catch (Exception $e) {
            $data["message"] = $e->getMessage();
            $data["status"] = "false";
        } finally {
            $dbh = null;
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

    public static function getPlacesList($selectfrom = 1, $selectamount = 25) {
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
                      LIMIT ' . $selectfrom . ' , ' . $selectamount . '');

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
        $response = array("status" => "false", "message" => "");

        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $stmt = $dbh->prepare("SELECT admin_password FROM admin WHERE admin_email = :useremail");
            $stmt->bindParam(':useremail', $email, PDO::PARAM_STR);
            $stmt->execute();
            $pass = $stmt->fetchAll();
//            $response["message"] = $pass[0]["admin_password"];

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
            echo json_encode($response);
            $dbh = null;
        }
    }

    public static function updateItem($itemid, $itemtype, $itemname, $view, $description) {
        $response = array("status" => "false", "message" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('UPDATE item
                                    SET item_type = :itemtype,
                                        item_name = :itemname,
                                        item_description = :itemdescription,
                                        status_view = :statusview,
                                        item_last_update = CURRENT_TIMESTAMP()
                                    WHERE item_id = :itemid');
            $stmt->bindParam(':itemid', $itemid, PDO::PARAM_INT);

            $stmt->bindParam(':itemtype', $itemtype, PDO::PARAM_INT);
            $stmt->bindParam(':statusview', $view, PDO::PARAM_INT);

            $stmt->bindParam(':itemname', $itemname, PDO::PARAM_STR);
            $stmt->bindParam(':itemdescription', $description, PDO::PARAM_STR);

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

    public static function removeItem($itemid, $password, $email) {
        $response = array("status" => "false", "message" => "");

        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $stmt = $dbh->prepare("SELECT admin_password FROM admin WHERE admin_email = :useremail");
            $stmt->bindParam(':useremail', $email, PDO::PARAM_STR);
            $stmt->execute();
            $pass = $stmt->fetchAll();
//            $response["message"] = $pass[0]["admin_password"];

            if (decrypt_pass($password, $pass[0]['admin_password'])) {
                $response["status"] = "true";

                $stmt = $dbh->prepare('DELETE
                                        FROM item
                                      WHERE item_id = :itemid');
                $stmt->bindParam(':itemid', $itemid, PDO::PARAM_INT);
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
            echo json_encode($response);
            $dbh = null;
        }
    }

    public static function newItem($creatorid, $itemtype, $itemplace, $itemname,
            $itemdesc, $itemview, $images) {
        $data = array("status" => "false", "message" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = 'INSERT INTO oman_tourism_guide.item '
                    . '(item_id, '
                    . 'item_type, '
                    . 'item_admin_creator, '
                    . 'item_place, '
                    . 'item_name,'
                    . 'item_description, '
                    . 'status_view) '
                    . 'VALUES (NULL, :item_type, :item_admin_creator,'
                    . ' :item_place, :item_name, :item_description,'
                    . ' :status_view )';
            $stmt = $dbh->prepare($query) or die(mysql_error());
            $stmt->bindParam(':item_type', $itemtype, PDO::PARAM_INT);
            $stmt->bindParam(':item_admin_creator', $creatorid, PDO::PARAM_INT);
            $stmt->bindParam(':item_place', $itemplace, PDO::PARAM_INT);
            $stmt->bindParam(':item_name', $itemname, PDO::PARAM_STR);
            $stmt->bindParam(':item_description', $itemdesc, PDO::PARAM_STR);
            $stmt->bindParam(':status_view', $itemview, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() == 1) {
                $data["status"] = "true";
                $idofinserteditem = $dbh->lastInsertId();
                $itemsimage = dboperation::uploadItemImages($images);
                if (count($itemsimage["success"]) > 0) {
                    $stmt = $dbh->prepare('INSERT INTO item_image (id_item_image, item_id, image_title, image_path) 
                      VALUES(:id, :placeid, :imageurl, :path)');
                    foreach ($itemsimage["success"] as $imagename) {
                        $stmt->bindValue(':id', 'NULL');
                        $stmt->bindValue(':placeid', $idofinserteditem);
                        $stmt->bindValue(':imageurl', $imagename);
                        $stmt->bindValue(':path', '../uploadsimages/');
                        $stmt->execute();
                    }
                }
            } else {
                $data["message"] = $stmt->errorInfo();
                $data["status"] = "false";
            }
        } catch (Exception $e) {
            $data["message"] = $e->getMessage();
            $data["status"] = "false";
        } finally {
            $dbh = null;
            echo json_encode($data);
        }
    }

    public static function itemsTotalCount() {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = 'SELECT count(*) as count FROM item WHERE 1';
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

    public static function getItemsList($selectfrom = 1, $selectamount = 25) {
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                                    item.item_id,
                                    item_type.itemtype_name,
                                    item.item_type,
                                    place.place_name,
                                    item.item_place,
                                    item.item_name,
                                    DATE(item.item_add_date) AS adddate,
                                    item.item_description,
                                    item.status_view
                                  FROM item
                                    INNER JOIN item_type
                                      ON item.item_type = item_type.itemtype_id
                                    INNER JOIN place
                                      ON item.item_place = place.place_id
                                  ORDER BY item.item_add_date DESC
                                   LIMIT ' . intval($selectfrom) . ' , ' . intval($selectamount) . '');

            $stmt->execute();
            $result = $stmt->fetchAll();
            $response = array("status" => "false", "data" => "");
            $item = array(
                "itemid" => "",
                "itemtype" => "",
                "itemtypeid" => "",
                "itemplace" => "",
                "itemplaceid" => "",
                "itemname" => "",
                "itemadddate" => "",
                "itemdesc" => "",
                "itemstatusview" => ""
            );
            $data = array();
            foreach ($result as $row) {
                $item['itemid'] = $row['item_id'];
                $item['itemtype'] = $row['itemtype_name'];
                $item['itemtypeid'] = $row['item_type'];
                $item['itemplace'] = $row['place_name'];
                $item['itemplaceid'] = $row['item_place'];
                $item['itemname'] = $row['item_name'];
                $item['itemadddate'] = $row['adddate'];
                $item['itemdesc'] = $row['item_description'];
                $item['itemstatusview'] = $row['status_view'];
                array_push($data, $item);
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

    public static function itemsCommentTotalCount() {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = 'SELECT count(*) as count FROM item_comment WHERE 1';
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

    public static function itemCommentsTotalCount($itemid) {
        $response = array("status" => "false", "data" => "");
        $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        try {
            $sql = 'SELECT count(*) as count FROM item_comment WHERE :itemid';
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":itemid", $itemid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $count = $row['count'];
            }
            $response["data"] = $count;
            $response["status"] = "true";
        } catch (PDOException $e) {
            $response["data"] = $e->getMessage();
            $response["status"] = "false";
        } finally {
            $dbh = null;
            return json_encode($response, JSON_UNESCAPED_UNICODE);
        }
    }

    public static function getItemsCommentsList($selectfrom = 1, $selectamount = 25) {
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                                item.item_id,
                                item.item_name,
                                item_comment.itemcomment_text,
                                item_comment.itemcomment_id,
                                item_comment.itemcomment_add_date AS createdate,
                                user.user_id,
                                user.user_name
                              FROM item_comment
                                INNER JOIN item
                                  ON item_comment.itemcomment_item_id = item.item_id
                                INNER JOIN user
                                  ON item_comment.itemcomment_user_id = user.user_id
                                LIMIT ' . intval($selectfrom) . ' , ' . intval($selectamount) . '');

            $stmt->execute();
            $result = $stmt->fetchAll();
            $response = array("status" => "false", "data" => "");
            $comment = array(
                "commid" => "",
                "commtext" => "",
                "commdate" => "",
                "itemid" => "",
                "itemname" => "",
                "username" => "",
                "userid" => ""
            );
            $data = array();
            foreach ($result as $row) {
                $comment['commid'] = $row['itemcomment_id'];
                $comment['commtext'] = $row['itemcomment_text'];
                $comment['commdate'] = $row['createdate'];
                $comment['itemid'] = $row['item_id'];
                $comment['itemname'] = $row['item_name'];
                $comment['username'] = $row['user_name'];
                $comment['userid'] = $row['user_id'];
                array_push($data, $comment);
            }
            $response['data'] = $data;
            $response["status"] = "true";
        } catch (PDOException $e) {
            $response["data"] = $e->getMessage();
            $response["status"] = "false";
            echo $e->getMessage();
        } finally {
            $dbh = null;
            return json_encode($response, JSON_UNESCAPED_UNICODE);
        }
    }

    public static function getItemCommentsList($selectfrom = 0, $selectamount = 25, $itemid) {
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                                item.item_id,
                                item.item_name,
                                item_comment.itemcomment_text,
                                item_comment.itemcomment_id,
                                item_comment.itemcomment_add_date AS createdate,
                                user.user_id,
                                user.user_name
                              FROM item_comment
                                INNER JOIN item
                                  ON item_comment.itemcomment_item_id = item.item_id
                                INNER JOIN user
                                  ON item_comment.itemcomment_user_id = user.user_id
                                  WHERE item.item_id = :itemid
                                LIMIT ' . intval($selectfrom) . ' , ' . intval($selectamount) . '');
            $stmt->bindParam("itemid", $itemid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $response = array("status" => "false", "data" => "");
            $comment = array(
                "commid" => "",
                "commtext" => "",
                "commdate" => "",
                "itemid" => "",
                "itemname" => "",
                "username" => "",
                "userid" => ""
            );
            $data = array();
            foreach ($result as $row) {
                $comment['commid'] = $row['itemcomment_id'];
                $comment['commtext'] = $row['itemcomment_text'];
                $comment['commdate'] = $row['createdate'];
                $comment['itemid'] = $row['item_id'];
                $comment['itemname'] = $row['item_name'];
                $comment['username'] = $row['user_name'];
                $comment['userid'] = $row['user_id'];
                array_push($data, $comment);
            }
            $response['data'] = $data;
            $response["status"] = "true";
        } catch (PDOException $e) {
            $response["data"] = $e->getMessage();
            $response["status"] = "false";
            echo $e->getMessage();
        } finally {
            $dbh = null;
            return json_encode($response, JSON_UNESCAPED_UNICODE);
        }
    }

    public static function removeItemComment($commentid) {
        $response = array("status" => "false", "message" => "");
        $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        try {
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('DELETE FROM item_comment '
                    . 'WHERE itemcomment_id = :commentid');
            $stmt->bindParam(':commentid', $commentid, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $response["message"] = "done";
                $response["status"] = "true";
            } else {
                $response["message"] = $stmt->errorInfo();
                $response["status"] = "false";
            }
        } catch (PDOException $e) {
            $response["message"] = $e->errorInfo;
            $response["status"] = "false";
        } finally {
            $dbh = null;
            return json_encode($response);
        }
    }

    public static function getItemsImages($itemid) {
        $itemimages = array();
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                                    item_image.image_title,
                                    item_image.image_path,
                                    item_image.id_item_image
                                  FROM item_image
                                  WHERE item_image.item_id = :itemid');
            $stmt->bindParam(":itemid", $itemid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                array_push($itemimages, $row);
            }
        } catch (PDOException $e) {
            //
        } finally {
            $dbh = null;
            return json_encode($itemimages);
        }
    }

    public static function itemsSearch($searchkey) {
        $searchkey = strval($searchkey);
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                                    item.item_id,
                                    item.item_name,
                                    DATE(item.item_add_date) AS itemadddate,
                                    item.item_description,
                                    item.status_view,
                                    item_type.itemtype_name,
                                    place.place_name,
                                    place.address,
                                    place.place_id,
                                    item.item_type
                                  FROM item
                                    INNER JOIN item_type
                                      ON item.item_type = item_type.itemtype_id
                                    INNER JOIN place
                                      ON item.item_place = place.place_id
                                      INNER JOIN place_type
                                         ON place.place_type = place_type.place_id
                                  WHERE item_type.itemtype_name LIKE "%' . $searchkey . '%"
                                  OR item.item_name LIKE "%' . $searchkey . '%"
                                  OR place.place_name LIKE "%' . $searchkey . '%"
                                  OR place.address LIKE "%' . $searchkey . '%"
                                  OR item.item_add_date LIKE "%' . $searchkey . '%"
                                  OR place_type.place_name LIKE "%' . $searchkey . '%"
                                  OR item.item_description LIKE "%' . $searchkey . '%"');
            $stmt->execute();
            $result = $stmt->fetchAll();
            $data = array();

            $item = array(
                "itemid" => "",
                "itemname" => "",
                "itemadddate" => "",
                "itemdescr" => "",
                "statusview" => "",
                "itemtype" => "",
                "itemtypeid" => "",
                "placename" => "",
                "placeaddress" => "",
                "placeid" => "",
            );
            foreach ($result as $row) {
                $item["itemid"] = $row["item_id"];
                $item["itemname"] = $row["item_name"];
                $item["itemadddate"] = $row["itemadddate"];
                $item["itemdescr"] = $row["item_description"];
                $item["statusview"] = $row["status_view"];
                $item["itemtype"] = $row["itemtype_name"];
                $item["itemtypeid"] = $row["item_type"];
                $item["placename"] = $row["place_name"];
                $item["placeaddress"] = $row["address"];
                $item["placeid"] = $row["place_id"];
                array_push($data, $item);
            }
            $response["data"] = $data;
            $response["status"] = "true";
        } catch (PDOException $e) {
            $response["data"] = $e->getMessage();
            $response["status"] = "false";
            echo $e->getMessage();
        } finally {
            echo json_encode($response);
            $dbh = null;
        }
    }

    public static function uploadItemImages($images) {
        $response = array("success" => array(), "field" => array());
        $success_upload_image_url = array();
        $field_upload_image_url = array();
        $j = 0;     // Variable for indexing uploaded image.
        // Declaring Path for uploaded images.
        for ($i = 0; $i < count($images['name']); $i++) {
            // Loop to get individual element from the array
            $validextensions = array("jpeg", "jpg", "JPG", "png", "PNG");      // Extensions which are allowed.
            $ext = explode('.', basename($images['name'][$i]));   // Explode file name from dot(.)
            $file_extension = end($ext); // Store extensions in the variable.
            $imagename = "";
            $imagename = md5(uniqid()) . "." . $ext[count($ext) - 1];
            $target_path = "../uploadsimages/";
            $target_path = $target_path . $imagename;     // Set the target path with a new name of image.
            $j = $j + 1;      // Increment the number of uploaded images according to the files in array.
            if (($images["size"][$i] < 2000001)     // 2MB files can be uploaded.
                    && in_array($file_extension, $validextensions)) {
                if (move_uploaded_file($images['tmp_name'][$i], $target_path)) {
                    // If file moved to uploads folder.
                    $success_upload_image_url[$i] = $imagename;
                } else {     //  If File Was Not Moved.
                    $field_upload_image_url[$i] = $images['name'][$i];
                }
            } else {     //   If File Size And File Type Was Incorrect.
                $field_upload_image_url[$i] = $images['name'][$i] . " | Image Size Or File Type Was Incorrect";
            }
        }
        $response["success"] = $success_upload_image_url;
        $response["field"] = $field_upload_image_url;
        return $response;
    }

    public static function getServiceProvidersList($selectfrom = 0, $selectamount = 25) {
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                                    user_service.useservice_id,
                                    user_service.useservice_name,
                                    user_service.useservice_email,
                                    user_service.useservice_phone,
                                    DATE(user_service.useservice_add_date) AS createdate,
                                    user_service.positive_evaluation,
                                    user_service.negative_evaluation,
                                    user_service.account_status
                                  FROM user_service
                                  ORDER BY user_service.useservice_add_date DESC
                      LIMIT ' . $selectfrom . ' , ' . $selectamount . '');

            $stmt->execute();
            $result = $stmt->fetchAll();
            $response = array("status" => "false", "data" => "");
            $serviceproviders = array(
                "id" => "",
                "name" => "",
                "email" => "",
                "phone" => "",
                "createdate" => "",
                "positiveevaluation" => "",
                "negativeevaluation" => "",
                "blockstatus" => "");
            $data = array();
            foreach ($result as $row) {
                $serviceproviders["id"] = $row['useservice_id'];
                $serviceproviders["name"] = $row['useservice_name'];
                $serviceproviders["email"] = $row['useservice_email'];
                $serviceproviders["phone"] = $row['useservice_phone'];
                $serviceproviders["createdate"] = $row['createdate'];
                $serviceproviders["positiveevaluation"] = $row['positive_evaluation'];
                $serviceproviders["negativeevaluation"] = $row['negative_evaluation'];
                $serviceproviders["blockstatus"] = ($row['account_status'] == "0") ? "false" : "true";
                array_push($data, $serviceproviders);
            }
            $response['data'] = $data;
            $response["status"] = "true";
        } catch (PDOException $e) {
            $response["data"] = $e->getMessage();
            $response["status"] = "false";
            echo $e->getMessage();
        } finally {
            $dbh = null;
            return json_encode($response);
        }
    }

    public static function serviceProvidersTotalCount() {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = 'SELECT count(*) as count FROM user_service WHERE 1';
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

    public static function updateServiceProvider($id, $name, $email, $phone, $accountstatuse) {
        $response = array("status" => "false", "message" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('UPDATE user_service
                                    SET useservice_name = :name,
                                        useservice_email = :email,
                                        useservice_phone = :phone,
                                        account_status = :status
                                    WHERE useservice_id = :id');
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
            $accountstatuse = ($accountstatuse == "false") ? 0 : 1;
            $stmt->bindParam(':status', $accountstatuse, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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

    public static function updateServiceProviderPassword($id, $password) {
        $response = array("status" => "false", "message" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('UPDATE user_service
                                    SET useservice_password = :pass
                                    WHERE useservice_id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':pass', encrypt_pass($password), PDO::PARAM_STR);
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

    public static function removeServiceProvider($ServiceProviderid, $password, $email) {
        $response = array("status" => "false", "message" => "");

        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $stmt = $dbh->prepare("SELECT admin_password FROM admin WHERE admin_email = :useremail");
            $stmt->bindParam(':useremail', $email, PDO::PARAM_STR);
            $stmt->execute();
            $pass = $stmt->fetchAll();
//            $response["message"] = $pass[0]["admin_password"];

            if (decrypt_pass($password, $pass[0]['admin_password'])) {
                $response["status"] = "true";

                $stmt = $dbh->prepare('DELETE
                                    FROM user_service
                                  WHERE useservice_id = :serviceproviderid');
                $stmt->bindParam(':serviceproviderid', $ServiceProviderid, PDO::PARAM_INT);
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
            echo json_encode($response);
            $dbh = null;
        }
    }

    public static function getServiceProviderInfo($id) {
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                                   user_service.useservice_id,
                                    user_service.useservice_name,
                                    user_service.useservice_email,
                                    user_service.useservice_phone,
                                    DATE(user_service.useservice_add_date) AS createdate,
                                    user_service.positive_evaluation,
                                    user_service.negative_evaluation,
                                    user_service.account_status
                                  FROM user_service
                                  WHERE user_service.useservice_id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $response = array("status" => "false", "data" => "");
            $serviceproviders = array(
                "id" => "",
                "name" => "",
                "email" => "",
                "phone" => "",
                "createdate" => "",
                "positiveevaluation" => "",
                "negativeevaluation" => "",
                "blockstatus" => "");
            $data = array();
            foreach ($result as $row) {
                $serviceproviders["id"] = $row['useservice_id'];
                $serviceproviders["name"] = $row['useservice_name'];
                $serviceproviders["email"] = $row['useservice_email'];
                $serviceproviders["phone"] = $row['useservice_phone'];
                $serviceproviders["createdate"] = $row['createdate'];
                $serviceproviders["positiveevaluation"] = $row['positive_evaluation'];
                $serviceproviders["negativeevaluation"] = $row['negative_evaluation'];
                $serviceproviders["blockstatus"] = ($row['account_status'] == "0") ? "false" : "true";
                array_push($data, $serviceproviders);
            }
            $response['data'] = $data;
            $response["status"] = "true";
        } catch (PDOException $e) {
            $response["data"] = $e->getMessage();
            $response["status"] = "false";
            echo $e->getMessage();
        } finally {
            $dbh = null;
            return json_encode($response);
        }
    }

    public static function getServiceRequestsList($selectfrom = 0, $selectamount = 25) {
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                                    service_request.servicerequest_id,
                                    service_request.servicerequest_title,
                                    user_service.useservice_name,
                                    service_request.servicerequest_type,
                                    service_type.servicetype_name,
                                    service_request.servicerequest_user_id,
                                    service_request.servicerequest_location_lat,
                                    service_request.servicerequest_location_lang,
                                    service_request.servicerequest_desc,
                                    DATE(service_request.servicerequest_add_date) AS createdate
                                  FROM service_request
                                    INNER JOIN service_type
                                      ON service_request.servicerequest_type = service_type.servicetype_id
                                    INNER JOIN user_service
                                      ON service_request.servicerequest_user_id = user_service.useservice_id
                                  ORDER BY service_request.servicerequest_add_date
                      LIMIT ' . $selectfrom . ' , ' . $selectamount . '');

            $stmt->execute();
            $result = $stmt->fetchAll();
            $response = array("status" => "false", "data" => "");
            $servicerequest = array(
                "id" => "",
                "title" => "",
                "providername" => "",
                "providerid" => "",
                "servicerequesttypeid" => "",
                "servicerequesttypename" => "",
                "locationlat" => "",
                "locationlang" => "",
                "desc" => "",
                "createdate" => "");
            $data = array();
            foreach ($result as $row) {
                $servicerequest["id"] = $row['servicerequest_id'];
                $servicerequest["title"] = $row['servicerequest_title'];
                $servicerequest["providername"] = $row['useservice_name'];
                $servicerequest["providerid"] = $row['servicerequest_user_id'];
                $servicerequest["servicerequesttypeid"] = $row['servicerequest_type'];
                $servicerequest["servicerequesttypename"] = $row['servicetype_name'];
                $servicerequest["locationlat"] = $row['servicerequest_location_lat'];
                $servicerequest["locationlang"] = $row['servicerequest_location_lang'];
                $servicerequest["desc"] = $row['servicerequest_desc'];
                $servicerequest["createdate"] = $row['createdate'];
                array_push($data, $servicerequest);
            }
            $response['data'] = $data;
            $response["status"] = "true";
        } catch (PDOException $e) {
            $response["data"] = $e->getMessage();
            $response["status"] = "false";
            echo $e->getMessage();
        } finally {
            $dbh = null;
            return json_encode($response);
        }
    }
    
    
    
    /*dservices*/
    public static function getServicesList($selectfrom = 0, $selectamount = 25) {
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                service.service_user_id,
                service.service_admin_add,
                service.service_location_lat,
                service.service_location_lang,
                service.service_desc,
                service.service_add_date,
                service.service_positive_rate,
                service.service_negative_rate,
                service.service_status,
                service.service_title,
                user_service.useservice_id,
                user_service.useservice_name
              FROM service
                INNER JOIN user_service
    ON service.service_user_id = user_service.useservice_id LIMIT ' . $selectfrom . ' , ' . $selectamount . '');

            $stmt->execute();
            $result = $stmt->fetchAll();
            $response = array("status" => "false", "data" => "");
            $service = array(
                "id" => "",
                "admin" => "",
                "loclat" => "",
                "loclan" => "",
                "dec" => "",
                "adddate" => "",
                "prate" => "",
                "nrate" => "",
                "status" => "",
                "title" => "",
                "userid" => "",
                "username" => "");
            $data = array();
            foreach ($result as $row) {
                $service["id"] = $row['service_user_id'];
                $service["admin"] = $row['service_admin_add'];
                $service["loclat"] = $row['service_location_lat'];
                $service["loclan"] = $row['service_location_lang'];
                $service["dec"] = $row['service_desc'];
                $service["adddate"] = $row['service_add_date'];
                $service["prate"] = $row['service_positive_rate'];
                $service["nrate"] = $row['service_negative_rate'];
                $service["status"]  = ($row['service_status'] == "0") ? "false" : "true";
                $service["desc"] = $row['service_status'];
                $service["title"] = $row['service_title'];
                $service["userid"] = $row['useservice_id'];
                $service["username"] = $row['useservice_name'];
                array_push($data, $service);
            }
            $response['data'] = $data;
            $response["status"] = "true";
        } catch (PDOException $e) {
            $response["data"] = $e->getMessage();
            $response["status"] = "false";
            echo $e->getMessage();
        } finally {
            $dbh = null;
            return json_encode($response);
        }
    }
    
    /*edn*/
    
    
    
    
    
    
    
    

    public static function ServiceRequestsTotalCount() {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = 'SELECT count(*) as count FROM service_request WHERE 1';
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

    public static function removeServiceRequests($requestid) {
        $response = array("status" => "false", "message" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $dbh->prepare('DELETE
                                    FROM service_request
                                  WHERE servicerequest_id = :id');
            $stmt->bindParam(':id', $requestid, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $response["message"] = "done";
                $response["status"] = "true";
            } else {
                $response["message"] = $stmt->errorInfo();
                $response["status"] = "false";
            }
        } catch (PDOException $e) {
            $response["message"] = $e->getMessage();
            $response["status"] = "false";
        } finally {
            return json_encode($response);
            $dbh = null;
        }
    }

    public static function confirmServiceRequests($requestid, $adminid) {
        $response = null;
        $response = array("status" => "false", "message" => "");
        try {

          $response = array("languages"=>"", "place"=>"","services"=>"","dbsize"=>"");
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $dbh->prepare('SELECT * FROM service_request WHERE'
                    . ' servicerequest_id = :id');
            $stmt->bindParam(':id', $requestid, PDO::PARAM_INT);
            $stmt->execute();
            $request = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
//            
//            print_r($request);
//            
            $stmt = $dbh->prepare('INSERT INTO service 
                (service_title, service_add_date, service_desc,
                service_location_lang, service_location_lat,
                service_admin_add, service_user_id, 
                service_type, service_id)
                VALUES (:title, CURRENT_TIMESTAMP, :desc, :llang,
                :llat, :adminid, :userid, :servicetype, NULL)');

            $stmt->bindParam(':title', $request["servicerequest_title"], PDO::PARAM_STR);
            $stmt->bindParam(':desc', $request["servicerequest_desc"], PDO::PARAM_STR);
            $stmt->bindParam(':llang', $request["servicerequest_location_lang"], PDO::PARAM_STR);
            $stmt->bindParam(':llat', $request["servicerequest_location_lat"], PDO::PARAM_STR);
            $stmt->bindParam(':adminid', $adminid, PDO::PARAM_INT);
            $stmt->bindParam(':userid', $request["servicerequest_user_id"], PDO::PARAM_INT);
            $stmt->bindParam(':servicetype', $request["servicerequest_type"], PDO::PARAM_INT);

            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $stmt = $dbh->prepare('DELETE
                                    FROM service_request
                                  WHERE servicerequest_id = :id');
                $stmt->bindParam(':id', $requestid, PDO::PARAM_INT);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $response["message"] = "done";
                    $response["status"] = "true";
                } else {
                    $response["message"] = $stmt->errorInfo();
                    $response["status"] = "false";
                }
            } else {
                $response["message"] = $stmt->errorInfo();
                $response["status"] = "false";
            }
        } catch (PDOException $e) {
            $response["message"] = $e->getMessage();
            $response["status"] = "false";
        } finally {
            $dbh = null;
            return json_encode($response);
        }
    }

    public static function getStatisticsCount() {
        try {
            $response = array("languages" => "", "place" => "");


            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = 'SELECT * 
            FROM
            (SELECT COUNT(*) FROM user WHERE user_lang = 1) as ar, 
            (SELECT COUNT(*) FROM user WHERE user_lang = 2) as en, 
            (SELECT COUNT(*) FROM user WHERE user_lang = 3) as fr,
            (SELECT COUNT(*) FROM user WHERE user_lang = 4) as gr';
            $languages = array(
                "ar" => "",
                "en" => "",
                "fr" => "",
                "gr" => "");
            foreach ($dbh->query($sql) as $row) {
                $languages["ar"] = $row[0];
                $languages["en"] = $row[1];
                $languages["fr"] = $row[2];
                $languages["gr"] = $row[3];
            }
            $response["languages"] = $languages;
            $sql = 'SELECT * 
            FROM
           
            (SELECT COUNT(*) FROM place WHERE place_type = 3) as museum, 
            (SELECT COUNT(*) FROM place WHERE place_type = 4) as fort, 
            (SELECT COUNT(*) FROM place WHERE place_type = 5) as castel,
            (SELECT COUNT(*) FROM place WHERE place_type = 6) as burg';
            $place = array(
                "museum" => "",
                "fort" => "",
                "castel" => "",
                "burg" => "");

            foreach ($dbh->query($sql) as $row) {
                $place["museum"] = $row[0];
                $place["fort"] = $row[1];
                $place["castel"] = $row[2];
                $place["burg"] = $row[3];
            }
            $response["place"] = $place;
            $sql = 'SELECT * 
            FROM
           
           (SELECT COUNT(*) FROM service) as service, 
            (SELECT COUNT(*) FROM service_request ) as service_request';
            $service = array(
                "service" => "",
                "service_request" => "");

            foreach ($dbh->query($sql) as $row) {
                $service["service"] = $row[0];
                $service["service_request"] = $row[1];
            }

            $response["service"] =$service;
            $sql = 'SELECT table_name AS "Table",  '
                    . 'sum(cast(round((((data_length + index_length)) / 1024 / 1024), 2) '
                    . 'as decimal(11,3))) as space   FROM information_schema.TABLES  WHERE '
                    . 'table_schema = "oman_tourism_guide"  order by space';
            $DBSize = array(
                "size" => "");
            foreach ($dbh->query($sql) as $row) {
                $DBSize["size"] = $row[1];
            }
            $response["DBSize"] = $DBSize;
            $sql = 'SELECT * 
            FROM
            (SELECT COUNT(*) FROM share_area ) as sharearea, 
            (SELECT COUNT(*) FROM share_comment ) as sharecomment';
            $sharearea = array(
                "sharearea" => "",
                "sharecomment" => "");
            foreach ($dbh->query($sql) as $row) {
                $sharearea["sharearea"] = $row[0];
                $sharearea["sharecomment"] = $row[1];
                
            }
            $response["sharearea"] = $sharearea;
            $sql = 'SELECT * 
            FROM
            (SELECT COUNT(*) FROM item ) as item, 
            (SELECT COUNT(*) FROM item_comment ) as item_comment';
            $item = array(
                "item" => "",
                "item_comment" => "");
            foreach ($dbh->query($sql) as $row) {
                $item["item"] = $row[0];
                $item["item_comment"] = $row[1];
                
            }
            $response["item"] = $item;
;
            
            

            ;

/*
 *edit 
 */

            $dbh = null;
            return $response;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getPlaceCount() {
        $response = array("languages" => "", "place" => "");
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

            $sql = 'SELECT * 
            FROM
            
            (SELECT COUNT(*) FROM place WHERE user_lang = 3) as museum, 
            (SELECT COUNT(*) FROM user WHERE user_lang = 4) as fort, 
            (SELECT COUNT(*) FROM user WHERE user_lang = 5) as castel,
            (SELECT COUNT(*) FROM user WHERE user_lang = 4) as burg';
            $languages = array(
                "museum" => "",
                "fort" => "",
                "castel" => "",
                "burg" => "");
            foreach ($dbh->query($sql) as $row) {
                $languages["museum"] = $row[0];
                $languages["fort"] = $row[1];
                $languages["castel"] = $row[2];
                $languages["burg"] = $row[3];
            }
            $response["languages"] = $languages;




            $dbh = null;
            return $response;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public static function getsheaareaist($selectfrom = 1, $selectamount = 25) {
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                user.user_id,
                user.user_name,
                share_area.sharearea_id,
                share_area.sharearea_text,
                share_area.sharearea_user_id,
                share_area.sharearea_add_date,
                share_area.sharearea_location
                FROM share_area
                INNER JOIN user
                  ON share_area.sharearea_user_id = user.user_id
                                   LIMIT ' . intval($selectfrom) . ' , ' . intval($selectamount) . '');

            $stmt->execute();
            $result = $stmt->fetchAll();
            $response = array("status" => "false", "data" => "");
            $item = array(
                "user_id" => "",
                "user_name" => "",
                "sharearea_id" => "",
                "sharearea_text" => "",
                "sharearea_user_id" => "",
                "sharearea_user_id" => "",
                "sharearea_add_date" => "",
                "sharearea_location" => ""
              
            );
            $data = array();
            foreach ($result as $row) {
                $item['userid'] = $row['user_id'];
                $item['username'] = $row['user_name'];
                $item['shareareaid'] = $row['sharearea_id'];
                $item['sheareatext'] = $row['sharearea_text'];
                $item['shearareaid'] = $row['sharearea_user_id'];
                $item['shearareauserid'] = $row['sharearea_user_id'];
                $item['sheaareaadddate'] = $row['sharearea_add_date'];
                $item['shearareallocation'] = $row['sharearea_location'];
                array_push($data, $item);
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

    
    
    
    public static function getuserfeedbacllist($selectfrom = 1, $selectamount = 25) {
        $response = array("status" => "false", "data" => "");
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT
                user.user_name,
                user.user_id,
                feadback.feadback_id,
                feadback.feadback_user_id,
                feadback.feadback_add_date,
                feadback.feadback_text
              FROM feadback
                INNER JOIN user
                  ON feadback.feadback_user_id = user.user_id
                                   LIMIT ' . intval($selectfrom) . ' , ' . intval($selectamount) . '');

            $stmt->execute();
            $result = $stmt->fetchAll();
            $response = array("status" => "false", "data" => "");
            $item = array(
                "user_name" => "",
                "user_id" => "",
                "feadback_id" => "",
                "feadback_user_id" => "",
                "feadback_add_date" => "",
                "feadback_text" => ""
              
            );
            $data = array();
            foreach ($result as $row) {
                $item['username'] = $row['user_name'];
                $item['userid'] = $row['user_id'];
                $item['feedbackid'] = $row['feadback_id'];
                $item['feedbackuserid'] = $row['feadback_user_id'];
                $item['feedbackadddate'] = $row['feadback_add_date'];
                $item['feedbacktext'] = $row['feadback_text'];
                array_push($data, $item);
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
    
    
    
    
    
    
    

}
