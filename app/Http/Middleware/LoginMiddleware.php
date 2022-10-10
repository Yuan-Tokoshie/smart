<?php
namespace App\Http\Middleware;
use Closure;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User;
use Illuminate\Http\Request;

class LoginMiddleware{
    public function handle($request, Closure $next){
       $User = new User();
       $Controller = new Controller();
       
       $result = $User->login($request);       
        if(count($result)!=0){
            return $Controller->response(200, "login success");
        }else{
            return $Controller->response(401, "email or password error");
        }
       # return $next($request);
    }
}
