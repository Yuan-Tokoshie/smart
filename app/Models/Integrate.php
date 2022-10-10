<?php
    namespace app\Models;

    use Illuminate\Support\Facades\DB;

    class Integrate{
        public function getIntegrates($community_id){
            $sql = "SELECT
                        icon.url,
                        integrate.type,
                        integrate.name
                    FROM
                        integrate,
                        icon
                    WHERE
                        integrate.icon_id = icon.id AND
                        integrate.community_id = :community_id";
            return DB::select($sql);
        }

        public function getIntegrate($community_id,$type){
            $sql = "SELECT
                    icon.url,
                    integrate.type,
                    integrate.name,
                    integrate.id
                FROM
                    integrate,
                    icon
                WHERE
                    integrate.icon_id = icon.id AND
                    integrate.commuity_id = :community_id AND
                    integrate.type =:type ";
            $args = array($community_id,$type);
            return DB::select($sql,$args);
        }
        
        public function getHomeIntegrates($home_id){
            $sql = "SELECT
                        icon.url,
                        integrate.name,
                        integrate.type
                    FROM
                        integrate,
                        integrate_home_state,
                        icon
                    WHERE
                        integrate.id = integrate_home_state.integrate_id AND
                        integrate.icon_id = icon.id AND
                        integrate_home_state.state = 1 AND
                        integrate_home_state.home_id = :home_id";
            $args = array($home_id);
            return DB::select($sql,$args);
        }

        public function getHomeIntegrate($home_id,$type){
            $sql = "SELECT
                        icon.url,
                        integrate.name,
                        integrate.type
                    FROM
                        integrate,
                        integrate_home_state,
                        icon
                    WHERE
                        integrate.id = integrate_home_state.integrate_id AND
                        integrate.icon_id = icon.id AND
                        integrate_home_state.state = 1 AND
                        integrate_home_state.home_id = :home_id AND
                        integrate.type = :type";
            $args = array($home_id,$type);
            return DB::select($sql,$args);
        }
        public function getHomeSceneState($scene_id,$home_id){
            $sql = "SELECT 
                        integrate_device.device_id,
                        service.name,
                        integrate_device_home_state.state,
                        domain.name AS domain,
                        community_device.device_name,
                        area.name AS area
                    FROM 
                        integrate_device,
                        service,
                        integrate_device_home_state,
                        domain,
                        community_device,
                        area
                    WHERE 
                        integrate_device.integrate_id = :scene_id AND 
                        integrate_device.id = integrate_device_home_state.integrate_device_id AND 
                        service.id=integrate_device_home_state.service_id AND 
                        integrate_device.device_id = community_device.device_id AND 
                        domain.id = community_device.domain_id AND
                        area.id = community_device.area_id AND
                        home_id=:home_id;";
            $args = array($scene_id,$home_id);
            return DB::select($sql,$args);
        }
        public function getHomeScriptState($script_id,$home_id){
            $sql = "SELECT 
                        integrate_device.device_id,
                        integrate_device.step,
                        integrate_device_home_state.state,
                        domain.name AS domain,
                        area.name AS area,
                        community_device.device_name
                    FROM 
                        integrate_device,
                        service,
                        integrate_device_home_state,
                        domain,
                        community_device,
                        area
                    WHERE 
                        integrate_device.integrate_id = :script_id AND 
                        integrate_device.id = integrate_device_home_state.integrate_device_id AND 
                        service.id=integrate_device_home_state.service_id AND 
                        integrate_device.device_id = community_device.device_id AND 
                        domain.id = community_device.domain_id AND
                        area.id = community_device.area_id AND
                        home_id=:home_id;";
            $args = array($script_id,$home_id);
            return DB::select($sql,$args);
        }

        public function newIntegrate($name,$type,$icon_id){
            $sql = "INSERT INTO `integrate` (`name`,`type`,`icon_id`) VALUES (:name,:type,:icon_id)";
            $args = array($name,$type,$icon_id);
            return DB::insert($name,$type,$icon_id);
        }

        public function removeIntegrate($id){
            $sql = "DELETE FROM `integrate` WHERE `id`=:id";
            $args = array($id);
            return DB::delete($sql,$args);
        }

        public function updateIntegrate(){
            
        }
    }
?>