<?php 
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    function response($status,$message,$result=NULL){
        $resp['status'] = $status;
        $resp['message'] = $message;
        $resp['response'] = $result; 
        return $resp;
    }
    function login_message($result){
        if(count($result)!=0){
            return self::response(200, "login success");
        }else{
            return self::response(200, "email or password error");
        }
    }
    function select($result){
        if(count($result)!=0){
            return self::response(200, "查詢成功", $result);
        }else{
            return self::response(200, "無查詢結果");
        }
    }

    function insert($result){
        if($result==1){
            return self::response(200, "新增成功");
        }else{
            return self::response(204, "新增失敗");
        }
    }

    function delete($result){
        if($result==1){
            return self::response(200, "刪除成功");
        }else{
            return self::response(204, "刪除失敗");
        }
    }

    function update($result){
        if($result==1){
            return self::response(200, "更新成功");
        }else{
            return self::response(204, "更新失敗");
        }
    }

}
?>