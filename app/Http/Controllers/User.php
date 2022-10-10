<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User as Model;
use Illuminate\Http\Request;

class User extends Controller{
    protected $Model;
    public function __construct(){
        $this->Model = new Model();
    }
    
    public function login(Request $request){
        $email = $request->input("email");  
        $password = $request->input("password");         
        $result = $this->Model->login($email,$password);
        return $result; 
    }

    public function register(Request $request){
        $email = $request->input("email"); 
        $name = $request->input("name");
        $phone = $request->input("phone");  
        $password = $request->input("password");  
        $result =  $this->Model->newUser($email,$name,$phone,$password);
        return $result; 
    }

    public function getmail(Request $request){
        $email = $request->input("email"); 
        $phone = $request->input("phone");  
        $result =  $this->Model->getmail($email,$phone);
        return $result; 
    }

    public function getUser($id){
         if ($id!='All') {            
            $result = $this->Model->getUser($id);            
            return self::select($result);
        } else {
            $result = $this->Model->getUsers();
            return self::select($result); 
        }
    }
    public function getUserHomeInfo($email){
        return $result = $this->Model->getUserHomeInfo($email); 
   }
    public function newUser(Request $request){
        $email = $request->input("email"); 
        $name = $request->input("name");
        $phone = $request->input("phone");  
        $password = $request->input("password");  
        $result =  $this->Model->newUser($email,$name,$phone,$password);
        return self::insert($result); 
    }
    public function removeUser(Request $request){
        $id = $request->input("id"); 
        $result = $this->Model->removeUser($id);
        return self::delete($result); 
    }
    public function updateUser(Request $request){
        $id = $request->input("id"); 
        $email = $request->input("email"); 
        $name = $request->input("name");
        $phone = $request->input("phone");  
        $password = $request->input("password");     
        $result = $this->Model->updateUser($id,$email,$name,$phone,$password);
        return self::update($result);
    }
    public function changePassword(Request $request){
        $oldPassword = $request->input("oldPassword");  
        $newPassword = $request->input("newPassword");  
        $email = $request->get("email");         
        if($this->Model->ConfirmUserPassord($email,$oldPassword)){
            $result = $this->Model->updateUserPassord($email,$newPassword);
            return self::update($result);
        }
        else{
            return self::update(null);
        }
    }
    public function getUserHomeRole(Request $request){
        $email = $request->get("email");         
        return self::select($this->Model->getUserHomeRole($email));
    }
}

