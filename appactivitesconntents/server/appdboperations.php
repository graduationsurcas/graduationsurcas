<?php

class appdboperations {

    public static function getPlacesList($limit = 25) {
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
                  ORDER BY place.create_date DESC
                  LIMIT " . intval($limit);

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
    
       public static function getPlacesListOrderByLocation($limit = 25, $lat, $lang) {
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
                  ( place.place_location_lng <= $lang)
                  LIMIT " . intval($limit);

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
    
    
    
    
     public static function getItemsList($limit = 25) {
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $sql = "SELECT
                    item.item_id,
                    item.item_name,
                    DATE(item.item_add_date) AS adddate,
                    item.item_description
                  FROM item
                  WHERE item.status_view = 1
                  ORDER BY adddate DESC
                  LIMIT " . intval($limit);

            $data = array();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":id", $placeid, PDO::PARAM_INT);
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

    
}