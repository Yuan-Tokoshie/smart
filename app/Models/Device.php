<?php
    namespace app\Models;

    use Illuminate\Support\Facades\DB;

    class Device{
        public function getDevices($community_id){
            $sql = "SELECT
                        icon.url,
                        community_device.device_id,
                        domain.name AS domain,
                        community_device.device_name,
                        area.name AS area
                    FROM
                        community,
                        domain,
                        area,
                        icon,
                        community_device
                    WHERE
                        community.id = :community_id AND
                        domain.id = community_device.domain_id AND
                        area.id = community_device.area_id AND
                        icon.id = community_device.icon_id";
            $args = array($community_id);
            return DB::select($sql,$args);
        }
        

        public function newDevice($id,$home_id){
            $sql = "INSERT INTO `device` (`id`,`home_id`) VALUES (:id,:home_id)";
            $args = array($id);
            return DB::delete($sql,$args);
        }

        public function removeDevice($id){
            $sql = "DELETE FROM `device` WHERE `id`=:id";
            $args = array($id);
            return DB::delete($sql,$args);
        }

        public function updateDevice(){
            
        }
    }
?>