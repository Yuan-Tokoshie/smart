<?php
namespace App\Http\Middleware;
use Closure;
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;
use App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Exception;

class AuthMiddleware{
    public function handle($request, Closure $next){
       switch ($request->path()) {
            case 'login':       
                //查詢DB驗證帳密的正確性
                $request=$this->login($request);
                return response($request);             
                break;
            case 'register':
                //登錄帳號
                $request=$this->register($request);
                return response($request);
                break;
            default:
                $Controller = new Controller();
                $jwtToken = $request->header('jwtToken');
                $secret_key = "YOUR_SECRET_KEY";
                if ($jwtToken != NULL){
                    if($this->checkToken($request)){
                        $payload = JWT::decode($jwtToken, new Key($secret_key, 'HS256'));
                        $request->attributes->add(['email' => $payload->data->id]);
                        return $next($request);
                    }
                }else{           
                    return response($Controller->response(401, $request->header('jwtToken')));
                }
                break;
        }
    }

    public function register($request){
        $User = new User();
        $Controller = new Controller();
        
        $email = $request->input("email"); 
        if ($email ==NULL){
            return $Controller->response(415, "format error");
        }else{
            $result = $User->getmail($request);
            if(count($result)==0){
                $result = $User->register($request);
                if($result==1){
                    return $Controller->response(200, "register success");
                }
            }else{
                return $Controller->response(403, "email or phone has existed");
             }
        }
 
        # return $next($request);
     }

     public function login($request){
        $User = new User();
        $Controller = new Controller();
        $email = $request->input("email");  
        $password = $request->input("password");        
        $result = $User->login($request);
         if(count($result)!=0){
            $token = $this->genToken($email);
            $userInfo = $User->getUserHomeInfo($email);
            array_push($userInfo, $token);
            return $Controller->response(200, "login success",$userInfo);
         }else{
            return $Controller->response(401, "email or password error");
         }
        # return $next($request);
     }

    public function checkToken($request){
        $jwtToken = $request->header('jwtToken');
        $secret_key = "YOUR_SECRET_KEY";
        try {
        //    echo $jwtToken;
            $payload = JWT::decode($jwtToken, new Key($secret_key, 'HS256'));
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    private function genToken($id){
        $secret_key = "YOUR_SECRET_KEY";
        $issuer_claim = "localhost";
        $audience_claim = "localhost";
        $issuedat_claim = time(); // issued at
        $expire_claim = $issuedat_claim + 600000;
        $payload = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "exp" => $expire_claim,
            "data" => array(
                "id" => $id,
        ));
        $jwt = JWT::encode($payload, $secret_key, 'HS256');
        return $jwt;
    }
}
