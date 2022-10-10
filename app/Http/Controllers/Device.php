<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\Device as DeviceModel;
    use Illuminate\Http\Request;

    class Device extends Controller{
        protected $devicemodel;
        public function __construct(){
            $this->devicemodel = new DeviceModel();
        }

        public function getDevice($community_id){
            $result = $this->devicemodel->getDevices($community_id);
            return self::select($result);
        }

        public function newDevice(Request $request){
            $id = $request->input('id');
            $home_id = $request->input('home_id');
            $result = $this->devicemodel->newDevice($id,$home_id);
            return self::insert($result);
        }

        public function removeDevice(Request $request){
            $id = $request->input('id');
            $result = $this->devicemodel->removeDevice($id);
            return self::delete($result);
        }
        public function updateDevice(Request $request){
            
        }
    }
?>