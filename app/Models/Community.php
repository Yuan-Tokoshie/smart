<?php
    namespace app\Models;

    use Illuminate\Support\Facades\DB;

    class Community{
        public function getCommunities(){
            $sql = "SELECT * FROM `community`";
            return DB::select($sql);
        }
        public function getCommunity($id){
            $sql = "SELECT * FROM `community` WHERE `id`=:id";
            $args = array($id);
            return DB::select($sql,$args);
        }
        public function newCommunity($name){
            $sql = "INSERT INTO `community` (`name`) VALUES (:name)";
            $args = array($name);
            return DB::insert($sql,$args);
        }
        public function removeCommunity($id){
            $sql = "DELETE FROM `community` WHERE `id`=:id";
            $args = array($id);
            return DB::delete($sql,$args);
        }
        public function updateCommunity($id,$name){
            $sql = "UPDATE `community`
                    SET name=:name
                    WHERE `id`=:id";
            $args = array($name,$id);
            return DB::update($sql,$args);
        }
    }
?>