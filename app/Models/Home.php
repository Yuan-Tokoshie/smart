<?php
    namespace app\Models;

    use Illuminate\Support\Facades\DB;

    class Home{
        public function getHomes(){
            $sql = "SELECT * FROM `home`";
            return DB::select($sql);
        }
        public function getHome($id){
            $sql = "SELECT * FROM `home` WHERE `id`=:id";
            $args = array($id);
            return DB::select($sql,$args);
        }
        public function newHome($community_id,$home_no,$ip,$token){
            $sql = "INSERT INTO `home` (`community_id`,`home_no`,`ip`,`token`) VALUES (:community_id,:home_no,:ip,:token)";
            $args = array($community_id,$home_no);
            return DB::insert($sql,$args);
        }
        public function removeHome($id){
            $sql = "DELETE FROM `home` WHERE `id`=:id";
            $args = array($id);
            return DB::delete($sql,$args);
        }
        public function updateHome($id,$home_no,$ip,$token){
            $sql = "UPDATE `home`
                    SET 
                       home_no=:home_no AND
                       ip=:ip AND
                       token=:token
                    WHERE `id`=:id";
            $args = array($home_no,$id);
            return DB::update($sql,$args);
        }
    }
?>