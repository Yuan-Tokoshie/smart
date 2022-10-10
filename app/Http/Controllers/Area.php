<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use App\Models\Area as AreaModel;
    use Illuminate\Http\Request;

    class Area extends Controller{
        protected $areamodel;
        public function __construct(){
            $this->areamodel = new AreaModel();
        }
        
        public function getArea($community_id,$id){
            if ($id != 'All') {            
                $result = $this->areamodel->getArea($community_id,$id);            
                return self::select($result);
            }else{
                $result = $this->areamodel->getAreas($community_id);
                return self::select($result); 
            }
        }
        
        public function newArea(Request $request){
            $community_id = $request->input("community_id");
            $name = $request->input("name");
            $result =  $this->areamodel->newArea($community_id,$name);
            return self::insert($result); 
        }

        public function removeArea(Request $request){
            $id = $request->input("id"); 
            $result = $this->areamodel->removeArea($id);
            return self::delete($result); 
        }

        public function updateArea(Request $request){
            $id = $request->input("id"); 
            $name = $request->input("name");   
            $result = $this->areamodel->updateArea($id,$name);
            return self::update($result);
        }
    }
?>

