<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use App\Models\Community as Model;
    use Illuminate\Http\Request;

    class Community extends Controller{
        protected $Model;
        public function __construct(){
            $this->Model = new Model();
        }
        
        public function getCommunity($id){
            if ($id!='All') {            
                $result = $this->Model->getCommunity($id);            
                return self::select($result);
            }else{
                $result = $this->Model->getCommunities();
                return self::select($result); 
            }
        }
        
        public function newCommunity(Request $request){
            $name = $request->input("name");     
            $result =  $this->Model->newCommunity($name);
            return self::insert($result); 
        }

        public function removeCommunity(Request $request){
            $id = $request->input("id"); 
            $result = $this->Model->removeCommunity($id);
            return self::delete($result); 
        }

        public function updateCommunity(Request $request){
            $id = $request->input("id");
            $name = $request->input("name");  
            $result = $this->Model->updateCommunity($id,$name);
            return self::update($result);
        }
    }
?>