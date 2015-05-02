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
    
    
}
