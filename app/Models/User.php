<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;


class User{
    public function login($email,$password){
        $sql = "select * from user where email=? and password = ? ";
        $args = array($email,$password);
        $response = DB::select($sql,$args);
        return $response;
    }

    public function getmail($email,$phone){
        $sql = "select * from user where email=? or phone = ? ";
        $args = array($email,$phone);
        $response = DB::select($sql,$args);
        return $response;
    }

    public function getUsers(){
        $sql = "select * from user";
        $response = DB::select($sql);
        return $response;
    }
    public function getUser($id){
        $sql = "select * from user where id=?";
        $args = array($id);
        $response = DB::select($sql,$args);
        return $response;
    }

    public function newUser($email,$name,$phone,$password){
        $sql = "insert into user (email,name,phone,password) values (:email,:name,:phone,:password)";
        $args = array($email,$name,$phone,$password);
        $response = DB::insert($sql,$args);
        return $response;

    }

    public function updateUser($id,$email,$name,$phone,$password){
        $sql = "update user set name=:name, password=:password,phone=:phone ,email=:email where id=:id";
        $args = array($id,$email,$name,$phone,$password);
        $response = DB::update($sql,$args);
        return $response;
    }
    public function removeUser($id){
        $sql = "delete from user where id=:id";
        $args = array($id);
        $response = DB::delete($sql,$args);
        return $response;
    }
    public function getUserHomeInfo($email){
        $sql = "SELECT 
                    user.home_id,
                    home.community_id,
                    home.ip,
                    home.token 
                FROM 
                    user,
                    home 
                WHERE 
                    user.home_id = home.id AND  
                    user.email = :email;";
        $args = array($email);
        $response = DB::select($sql,$args);
        return $response;
    }
    public function ConfirmUserPassord($email,$oldPassword){
        $sql = "SELECT * FROM `user` WHERE user.email =:email  AND user.password=:oldPassword";
        $args = array($email,$oldPassword);
        $response = DB::select($sql,$args);
        if(count($response) == 0){
            return false;
        }
        else{
            return true;
        }
    }
    public function updateUserPassord($email,$newPassword){
        $sql = "UPDATE `user` SET user.password=:newPassword WHERE email=:email";
        $args = array($newPassword,$email);
        $response = DB::update($sql,$args);
        return $response;
    }
    public function getUserHomeRole($email){
        $sql = "SELECT 
            role.name AS role_name,
            home.home_no,
            user.name,
            role.id
        FROM 
            user,user_home,role,home
        WHERE 
            user.id = user_home.user_id AND
            user_home.home_id = user.home_id AND
            user_home.role_id = role.id AND
            user.home_id = home.id AND
            user.email =:email;";
        $args = array($email);
        $response = DB::select($sql,$args);
        return $response;
    }
}

