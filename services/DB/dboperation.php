<?php

class dboperation {

    public static function logIn($useremail, $userpass) {
        $data = array("status" => "false", "message" => "");
        try {
//            require '../config.php';
            define("DB_HOST", "localhost");
            define("DB_USERNAME", "root");
            define("DB_PASSWORD", "");
            define("DB_NAME", "oman_tourism_guide");

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
//                if the email not find on the database
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
            $dbh = null;
        } catch (PDOException $e) {
            $data["message"] = $e->getMessage();
            $data["status"] = "false";
        } finally {
            //            print the data in json format
            echo json_encode($data);
        }
    }

    public static function getPlacesTypes() {
        try {

            //            include_once './config.php';

            define("DB_HOST", "localhost");
            define("DB_USERNAME", "root");
            define("DB_PASSWORD", "");
            define("DB_NAME", "oman_tourism_guide");

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

        define("DB_HOST", "localhost");
        define("DB_USERNAME", "root");
        define("DB_PASSWORD", "");
        define("DB_NAME", "oman_tourism_guide");

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
            $stmt->bind_param('issddiis',
                    intval($place_type),
                    strval($place_name),
                    strval($address), 
                    doubleval($location_lat), 
                    doubleval($location_lng),
                    intval($admin_id),
                    intval($view), 
                    strval($description)
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

}
