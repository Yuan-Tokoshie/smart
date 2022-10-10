<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use App\Models\Favorite as FavoriteModel;
    use Illuminate\Http\Request;

    class Favorite extends Controller{
        protected $favoritemodel;
        public function __construct(){
            $this->favoritemodel = new FavoriteModel();
        }
        
        public function getFavorite(Request $request,$type){
            $email = $request->get("email");
            $result = $this->favoritemodel->getFavorite($email,$type);            
            return self::select($result);
        }
        
        public function newFavorite(Request $request){
            $user_id = $request->input("user_id");
            $home_id = $request->input("home_id");
            $integrate_id = $request->input("integrate_id");    
            $result =  $this->favoritemodel->newFavorite($user_id,$home_id,$integrate_id);
            return self::insert($result); 
        }

        public function removeFavorite(Request $request){
            $user_id = $request->input("user_id");
            $home_id = $request->input("home_id");
            $integrate_id = $request->input("integrate_id");
            $result = $this->favoritemodel->removeFavorite($user_id,$home_id,$integrate_id);
            return self::delete($result);
        }
    }
?>