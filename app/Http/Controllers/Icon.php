<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use App\Models\Icon as IconModel;
    use Illuminate\Http\Request;

    class Icon extends Controller{
        protected $iconmodel;
        public function __construct(){
            $this->iconmodel = new IconModel();
        }
        
        public function getIcon($id){
            if ($id !='All') {      
                $result = $this->iconmodel->getIcon($id);            
                return self::select($result);
            }else{
                $result = $this->iconmodel->getIcons();
                return self::select($result); 
            }
        }
    }
?>

