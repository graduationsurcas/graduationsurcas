<?php

class appdboperations {

    public static function getPlacesList($limit = 25, $selectfrom = -1) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT
                    place.place_id,
                    place.place_name,
                    place.description,
                    DATE(place.create_date) AS createdate,
                    place_type.place_name AS placetype
                  FROM place
                    INNER JOIN place_type
                      ON place.place_type = place_type.place_id
                  WHERE place.view = 1
                  ORDER BY place.create_date DESC";
            if($selectfrom > -1){
                $sql = $sql . " LIMIT " . intval($selectfrom) . ", " . intval($limit);
            }  else {
                $sql = $sql . " LIMIT " . intval($limit);
            }
                  

            $data = array();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":id", $placeid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $place = array();
                $place["id"] = $row["place_id"];
                $place["name"] = $row["place_name"];
                $place["description"] = $row["description"];
                $place["date"] = $row["createdate"];
                $place["placetype"] = $row["placetype"];
                array_push($data, $place);
            }

            $dbh = null;
            return $data;

            /*             * * close the database connection ** */
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
       public static function getPlacesListOrderByLocation($limit = 25, $lat, $lang, $selectfrom = -1) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT
                    place.place_id,
                    place.place_name,
                    place.description,
                    DATE(place.create_date) AS createdate,
                    place_type.place_name AS placetype
                  FROM place
                    INNER JOIN place_type
                      ON place.place_type = place_type.place_id
                  WHERE place.view = 1
                  ORDER BY (place.place_location_lat <= $lat),
                  ( place.place_location_lng <= $lang)";
            if($selectfrom > -1){
                $sql = $sql . " LIMIT " . intval($selectfrom) . ", " . intval($limit);
            }  else {
                $sql = $sql . " LIMIT " . intval($limit);
            }

            $data = array();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":id", $placeid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $place = array();
                $place["id"] = $row["place_id"];
                $place["name"] = $row["place_name"];
                $place["description"] = $row["description"];
                $place["date"] = $row["createdate"];
                $place["placetype"] = $row["placetype"];
                array_push($data, $place);
            }

            $dbh = null;
            return $data;

            /*             * * close the database connection ** */
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public static function getPlaceInformation($placeid) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT
                    place.place_id,
                    place.place_name,
                    place.description,
                    DATE(place.create_date) AS createdate,
                    place.last_update,
                    place.create_date,
                    place.view,
                    place.place_admin_creator,
                    place.place_location_lng,
                    place.place_location_lat,
                    place.address,
                    place.place_type,
                    place_type.place_name AS placetype
                  FROM place
                    INNER JOIN place_type
                      ON place.place_type = place_type.place_id
                  WHERE place.view = 1 AND place.place_id = :id";

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":id", $placeid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            return $result[0];

            /*             * * close the database connection ** */
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
      public static function getPlaceImage($placeid) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT place_image_id, image_title, image_path"
                    . " FROM place_image WHERE place_id = :id";

            $data = array();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":id", $placeid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $index = 0;
            foreach ($result as $row) {
                $data[$index] = $row["image_path"].$row["image_title"];
                $index++;
            }
            $dbh = null;
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

     public static function getItemsOnPlaceCount($placeid) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = 'SELECT count(*) as count FROM item WHERE item_place = '.  intval($placeid);
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
    
    
    
    
     public static function getItemsList($limit = 25, $selectfrom = -1) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT
                    item.item_id,
                    item.item_name,
                    DATE(item.item_add_date) AS adddate,
                    item.item_description
                  FROM item
                  WHERE item.status_view = 1
                  ORDER BY adddate DESC";
              if($selectfrom > -1){
                $sql = $sql . " LIMIT " . intval($selectfrom) . ", " . intval($limit);
            }  else {
                $sql = $sql . " LIMIT " . intval($limit);
            }

            $data = array();
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $item = array();
                $item["id"] = $row["item_id"];
                $item["name"] = $row["item_name"];
                $item["description"] = $row["item_description"];
                $item["date"] = $row["adddate"];
                array_push($data, $item);
            }

            $dbh = null;
            return $data;

            /*             * * close the database connection ** */
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
     public static function getItemsListByLocation($limit = 25, $lat, $lang , $selectfrom = -1) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT
                    item.item_id,
                    item.item_name,
                    DATE(item.item_add_date) AS adddate,
                    item.item_description
                  FROM item
                    INNER JOIN place
                      ON item.item_place = place.place_id
                  WHERE item.status_view = 1
                  ORDER BY (place.place_location_lat <= ".floatval($lat)."),
                  ( place.place_location_lng <= ".floatval($lang).")";
              if($selectfrom > -1){
                $sql = $sql . " LIMIT " . intval($selectfrom) . ", " . intval($limit);
            }  else {
                $sql = $sql . " LIMIT " . intval($limit);
            }
            $data = array();
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $item = array();
                $item["id"] = $row["item_id"];
                $item["name"] = $row["item_name"];
                $item["description"] = $row["item_description"];
                $item["date"] = $row["adddate"];
                array_push($data, $item);
            }

            $dbh = null;
            return $data;

            /*             * * close the database connection ** */
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
     public static function getItemsListByPlace($limit = 25, $placeid, $selectfrom = -1) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT
                    item.item_id,
                    item.item_name,
                    DATE(item.item_add_date) AS adddate,
                    item.item_description
                  FROM item
                    INNER JOIN place
                      ON item.item_place = place.place_id
                  WHERE item.status_view = 1 
                        AND place.place_id = :palceid
                  ORDER BY item.item_add_date";
              if($selectfrom > -1){
                $sql = $sql . " LIMIT " . intval($selectfrom) . ", " . intval($limit);
            }  else {
                $sql = $sql . " LIMIT " . intval($limit);
            }
            $data = array();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":palceid", $placeid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $item = array();
                $item["id"] = $row["item_id"];
                $item["name"] = $row["item_name"];
                $item["description"] = $row["item_description"];
                $item["date"] = $row["adddate"];
                array_push($data, $item);
            }

            $dbh = null;
            return $data;

            /*             * * close the database connection ** */
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
     public static function getItemInformation($itemid) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT
                    item.item_id AS itemid,
                    item_type.itemtype_id AS itemtypeid,
                    item_type.itemtype_name AS itemtype,
                    place.place_id AS placeid,
                    place.place_name AS placename,
                    place_type.place_name AS placetype,
                    item.item_name AS itemname,
                    DATE(item.item_add_date) AS createdate,
                    item.item_description AS description,
                    place.place_location_lat AS locationlat,
                    place.place_location_lng AS locationlong,
                    place.address
                  FROM item
                    INNER JOIN item_type
                      ON item.item_type = item_type.itemtype_id
                    INNER JOIN place
                      ON item.item_place = place.place_id
                    INNER JOIN place_type
                      ON place.place_type = place_type.place_id
                  WHERE item.item_id = :id";

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":id", $itemid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            return $result[0];

            /*             * * close the database connection ** */
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
       public static function getItemImage($itemid) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT
                    item_image.id_item_image,
                    item_image.image_title,
                    item_image.image_path
                  FROM item_image
                  WHERE item_image.item_id = :id";

            $data = array();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":id", $itemid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $index = 0;
            foreach ($result as $row) {
                $data[$index] = $row["image_path"].$row["image_title"];
                $index++;
            }
            $dbh = null;
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getServiceList($limit = 25, $selectfrom = -1) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT
                    service.service_id,
                    service_type.servicetype_id,
                    service_type.servicetype_name,
                    user_service.useservice_name,
                    user_service.useservice_id,
                    service.service_location_lat,
                    service.service_location_lang,
                    service.service_desc,
                    DATE(service.service_add_date) AS createdate,
                    service.service_title
                  FROM service
                    INNER JOIN service_type
                      ON service.service_type = service_type.servicetype_id
                    INNER JOIN user_service
                      ON service.service_user_id = user_service.useservice_id
                  WHERE service.service_status = 1
                  ORDER BY service.service_add_date DESC";
                    if($selectfrom > -1){
                $sql = $sql . " LIMIT " . intval($selectfrom) . ", " . intval($limit);
            }  else {
                $sql = $sql . " LIMIT " . intval($limit);
            }

            $data = array();
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $service = array();
                $service["id"] = $row["service_id"];
                $service["title"] = $row["service_title"];
                $service["type"] = $row["servicetype_name"];
                $service["typeid"] = $row["servicetype_id"];
                $service["providername"] = $row["useservice_name"];
                $service["providerid"] = $row["useservice_id"];
                $service["locationlat"] = $row["service_location_lat"];
                $service["locationlong"] = $row["service_location_lang"];
                $service["description"] = $row["service_desc"];
                $service["date"] = $row["createdate"];
                array_push($data, $service);
            }

            $dbh = null;
            return $data;

            /*             * * close the database connection ** */
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
      public static function getServiceListByProvider($limit = 25, $providerid) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT
                    service.service_id,
                    service_type.servicetype_id,
                    service_type.servicetype_name,
                    user_service.useservice_name,
                    user_service.useservice_id,
                    service.service_location_lat,
                    service.service_location_lang,
                    service.service_desc,
                    DATE(service.service_add_date) AS createdate,
                    service.service_title
                  FROM service
                    INNER JOIN service_type
                      ON service.service_type = service_type.servicetype_id
                    INNER JOIN user_service
                      ON service.service_user_id = user_service.useservice_id
                  WHERE service.service_status = 1
                  AND service.service_user_id = :providerid
                  ORDER BY service.service_add_date DESC
                  LIMIT " . intval($limit);

            $data = array();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":providerid", $providerid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $service = array();
                $service["id"] = $row["service_id"];
                $service["title"] = $row["service_title"];
                $service["type"] = $row["servicetype_name"];
                $service["typeid"] = $row["servicetype_id"];
                $service["providername"] = $row["useservice_name"];
                $service["providerid"] = $row["useservice_id"];
                $service["locationlat"] = $row["service_location_lat"];
                $service["locationlong"] = $row["service_location_lang"];
                $service["description"] = $row["service_desc"];
                $service["date"] = $row["createdate"];
                array_push($data, $service);
            }

            $dbh = null;
            return $data;

            /*             * * close the database connection ** */
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
      public static function getServiceProviderInformation($serviceproviderid) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT
                    user_service.useservice_name,
                    user_service.useservice_email,
                    (SELECT
                      COUNT(*)
                    FROM user_service_rate
                    WHERE user_service_rate.user_service_id = user_service.useservice_id
                    AND user_service_rate.rate_value = 1) AS positive_rate,
                    (SELECT
                      COUNT(*)
                    FROM user_service_rate
                    WHERE user_service_rate.user_service_id = user_service.useservice_id 
                    AND user_service_rate.rate_value = 0) AS negative_rate,
                    user_service.useservice_phone,
                    user_service.useservice_add_date,
                    user_service.account_status
                  FROM user_service
                  WHERE user_service.useservice_id = :id";

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":id", $serviceproviderid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            return $result[0];

            /*             * * close the database connection ** */
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    
        public static function userSignIn($useremail, $userpass) {
        $data = array("status" => "false", "message" => "", "userinfo"=>"");
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare('SELECT count(*) as find FROM user WHERE user_email = :useremail');
            $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $find;
            foreach ($result as $row) {
                $find = ($row['find'] == 0) ? false : true;
            }    
            if ($find == FALSE) {
                $data["message"] = "check your emaile";
                return $data;
            } else {
                $stmt = $dbh->prepare("SELECT user_password FROM user WHERE user_email = :useremail");
                $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                $stmt->execute();
                $pass = $stmt->fetch(PDO::FETCH_ASSOC);
//                include_once '../class/cryptpass.php';
                if (decrypt_pass($userpass, $pass['user_password'])) {
                    $query = 'SELECT
                                user.user_name,
                                user.user_email,
                                language.lang_shortcut,
                                language.lang_name,
                                user.user_id
                              FROM user
                                INNER JOIN language
                                  ON user.user_lang = language.lang_id
                              WHERE user.user_email = :useremail';
                    $stmt = $dbh->prepare($query);
                    $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    $userinfo = array();
                    $userinfo["userid"] = $row["user_id"];
                    $userinfo["type"] = "user";
                    $userinfo["username"] = $row["user_name"];
                    $userinfo["useremail"] = $row["user_email"];
                    $userinfo["langshortcut"] = $row["lang_shortcut"];
                    $userinfo["langname"] = $row["lang_name"];
                 

                    $data["message"] = "did you know what is blue";
                    $data["status"] = "true";
                    $data["userinfo"] = $userinfo;
                    
                } else {
                    //                if the password is wrong
                    $data["message"] = "password is wrong";
                    $data["status"] = "false";
                    return $data;
                }

                $dbh = null;
                return $data;
            }
//            close the database connection
        } catch (PDOException $e) {
            $data["message"] = $e->getMessage();
            $data["status"] = "false";
            return $data;
        }
    }
    
    
}
