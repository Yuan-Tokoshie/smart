<?php
    namespace app\Models;

    use Illuminate\Support\Facades\DB;

    class Icon{
        public function getIcons(){
            $sql = "SELECT * FROM `icon`";
            return DB::select($sql);
        }
        public function getIcon($id){
            $sql = "SELECT * FROM `icon` WHERE `id`=:id";
            $args = array($id);
            return DB::select($sql,$args);
        }
    }
?>