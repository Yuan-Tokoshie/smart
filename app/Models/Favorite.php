<?php
    namespace app\Models;

    use Illuminate\Support\Facades\DB;

    class Favorite{
        public function getFavorites($user_id,$home_id){
            $sql = "SELECT
                        integrate.id,
                        integrate.name,
                        integrate.type,
                        icon.url
                    FROM
                        favorite,
                        integrate,
                        icon
                    WHERE
                        favorite.integrate_id = integrate.id AND
                        integrate.icon_id = icon.id AND
                        favorite.user_id=:user_id AND
                        favorite.home_id=:home_id";
            $args = array($user_id,$home_id);
            return DB::select($sql,$args);
        }

        public function getFavorite($email,$type){
            $sql = "SELECT 
                        integrate.id,
                        integrate.name,
                        integrate.icon_id
                    FROM 
                        integrate,
                        user,
                        favorite
                    WHERE 
                        integrate.id = favorite.integrate_id AND
                        user.id = favorite.user_id AND
                        favorite.home_id = user.home_id AND
                        user.email = :email AND
                        integrate.type = :type;";    
            $args = array($email,$type);
            return DB::select($sql,$args);
        }
        
        public function newFavorite($user_id,$home_id,$integrate_id){
            $sql = "INSERT INTO `favorite` (`user_id`,`home_id`,`integrate_id`) VALUES (:user_id,:home_id,:integrate_id)";
            $args = array($user_id,$home_id,$integrate_id);
            return DB::insert($sql,$args);
        }

        public function removeFavorite($user_id,$home_id,$integrate_id){
            $sql = "DELETE FROM `favorite` WHERE `user_id`=:user_id AND `home_id`=:home_id AND `integrate_id`=:integrate_id";
            $args = array($user_id,$home_id,$integrate_id);
            return DB::delete($sql,$args);
        }
    }
?>