<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\Integrate as IntegrateModel;
    use Illuminate\Http\Request;

    class Integrate extends Controller{
        protected $integratemodel;
        public function __construct(){
            $this->integratemodel = new IntegrateModel();
        }

        public function getIntegrate($community_id,$type){
            if($type != 'All'){      
                $result = $this->integratemodel->getIntegrate($community_id,$type);            
                return self::select($result);
            }else{
                $result = $this->integratemodel->getIntegrates();
                return self::select($result);
            }
        }

        public function getHomeIntegrate($home_id,$type){
            if($type != 'All'){      
                $result = $this->integratemodel->getHomeIntegrates($home_id);            
                return self::select($result);
            }else{
                $result = $this->integratemodel->getHomeIntegrate($home_id,$type);
                return self::select($result); 
            }
        }
        public function getHomeSceneState($scene_id,$home_id){
            $result = $this->integratemodel->getHomeSceneState($scene_id,$home_id);
            return self::select($result);
        }
        public function getHomeScriptState($script_id,$home_id){
            $result = $this->integratemodel->getHomeScriptState($script_id,$home_id);
            return self::select($result);
        }
        #type(1為腳本/2為場景/3為自動化)
        public function newIntegrate(Request $request){
            $name = $request->input('name');
            $type = $type->input('type');
            $icon_id = $request->input('icon_id');
            
            if($type != 1 || $type != 2 || $type != 3){
                $result = 0;
                return self::insert($result);
            }else{
                $result = $this->integratemodel->newIntegrate($name,$type,$icon_id);
                return self::insert($result);
            }
        }

        public function removeIntegrate(Request $request){
            $id = $request->input('id');
            $result = $this->integratemodel->removeIntegrate($id);
            return self::delete($result);
        }

        public function updateIntegrate(Request $request){
            
        }
    }
?>