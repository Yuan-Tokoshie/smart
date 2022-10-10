<?php
    namespace app\Models;

    use Illuminate\Support\Facades\DB;

    class Area{
        public function getAreas($community_id){
            $sql = "SELECT
                        *
                    FROM
                        `area`
                    WHERE
                        `community_id` = :community_id";
            $args = array($community_id);
            return DB::select($sql,$args);
        }
        public function getArea($community_id,$id){
            $sql = "SELECT
                        *
                    FROM
                        `area`
                    WHERE
                        `community_id`=:community_id AND
                        `id`=:id";
            $args = array($community_id,$id);
            return DB::select($sql,$args);
        }
        public function newArea($community_id,$name){
            $sql = "INSERT INTO `area` (`community_id`,`name`) VALUES (:community_id,:name)";
            $args = array($community_id,$name);
            return DB::insert($sql,$args);
        }
        public function removeArea($id){
            $sql = "DELETE FROM `area` WHERE `id`=:id";
            $args = array($id);
            return DB::delete($sql,$args);
        }
        public function updateArea($id,$name){
            $sql = "UPDATE `area`
                    SET name=:name
                    WHERE `id`=:id";
            $args = array($name,$id);
            return DB::update($sql,$args);
        }
    }
?>