<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use App\Models\Home as HomeModel;
    use Illuminate\Http\Request;

    class Home extends Controller{
        protected $homemodel;
        public function __construct(){
            $this->homemodel = new HomeModel();
        }
        
        public function getHome($id){
            if ($id !='All'){            
                $result = $this->homemodel->getHome($id);            
                return self::select($result);
            }else{
                $result = $this->homemodel->getHomes();
                return self::select($result); 
            }
        }
        
        public function newHome(Request $request){
            $community_id = $request->input("community_id");
            $home_no = $request->input("home_no");
            $result =  $this->homemodel->newHome($community_id,$name);
            return self::insert($result); 
        }

        public function removeHome(Request $request){
            $id = $request->input("id"); 
            $result = $this->homemodel->removeHome($id);
            return self::delete($result); 
        }
        public function updateHome(Request $request){
            $id = $request->input("id");
            $home_no = $request->input("home_no");    
            $result = $this->homemodel->updateHome($id,$home_no);
            return self::update($result);
        }
    }
?>