<?PHP

require_once('./codex/model/class.persona.php');

class PersonaController{
        
    private $model,$validacion;

    public function __CONSTRUCT(){
        $this->model = new Persona();
        $this->validacion = new Validacion;       
    }


    public function eliminar(){
        if($this->validacion->estaconectado('ROL',1)){
            if(!isset($_POST['id']) || $_POST['id']==''
               $this->validacion->mensaje(0,'Datos con *  requeridos');
            } 
            $_POST['id']=$this->validacion->limpiar($_POST['id']);
            if(!$this->model->eliminar($_POST['id'])) $this->validacion->mensaje(0,'Error a elm');
        }
    }

    public function index(){      
                
        require_once('codex/layout/head.php'); 
        if(!$this->validacion->estaconectado('ROL',1)){
            print $this->validacion->offline();
            exit;
        } 
        $rs=$this->model->consultar('libros');
        
        require_once('codex/layout/nav/nav.php');  
        require_once('codex/view/persona/index.php');    
        
        require_once('codex/layout/footer.php');  
        
    }

    function vereficar(){
        if($this->validacion->estaconectado('ROL',1)){
            if(isset($_POST['id'])!=""){
                $rp = $this->model->consultar('libros', " where Id_libro=".$_POST['id']);
                if($this->model->rows($rp)==1){
                    $obj = $this->model->recorrer($rp);
                    echo json_encode($obj);
                }
            }
        }
    }


    function crud(){
        if($this->validacion->estaconectado('ROL',1)){

            
            $nombre='';
            $edit='';
            $can='';
            $idd=0;
            if(isset($_POST['vid'])){
                $rp=$this->model->consultar('libros', " where Id_libro=".$_POST['vid']);
                if($this->model->rows($rp)==1){
                    $obj=$this->model->recorrer($rp);
                    $idd=$obj['Id_libro'];
                    $nombre=$obj['Nombre'];
                    $edit=$obj['Editorial'];
                    $can=$obj['Cantidad'];
                }

            }
            require_once('codex/view/persona/crud.php');
        }
    }


    function guardar(){
        if($this->validacion->estaconectado('ROL',1)){
           
            if(!isset($_POST['nombre']) || $_POST['nombre']==''
            || !isset($_POST['editorial']) || $_POST['editorial']==''
            || !isset($_POST['cantidad']) || $_POST['cantidad']==''){
               $this->validacion->mensaje(0,'Datos con *  requeridos');
            }
            $_POST['nombre']=$this->validacion->limpiar($_POST['nombre']);
            $_POST['editorial']=$this->validacion->limpiar($_POST['editorial']);
            $_POST['cantidad']=$this->validacion->limpiar($_POST['cantidad']);
            $this->validacion->EsNumero($_POST['cantidad']);
            $this->validacion->EsNombre($_POST['nombre']);
            $this->validacion->EsNombre($_POST['editorial']);


            if($_POST['idd']==0){
                $rc=$this->model->consultar('libros'," where Nombre='".$_POST['nombre']."'");
                if($this->model->rows($rc)!=0){
                    $this->validacion->mensaje(1,'El libro ya existe');
                }
            }
            if($_POST['idd']!=0){
                $rc=$this->model->consultar('libros'," where Id_libro=".$_POST['idd']);
            if($this->model->rows($rc)!=0){
                $ok=$this->model->editar($_POST['nombre'],$_POST['editorial'],$_POST['cantidad'], $_POST['idd']);
                if($ok>0){
                    $this->validacion->mensaje(3,'Se edito','./?c=persona');
                }else{
                    $this->validacion->mensaje(1,'Error al editar');
                }
            }
            }
            
                $ok=$this->model->registrar($_POST['nombre'],$_POST['editorial'],$_POST['cantidad']);
                if($ok>0){
                    $this->validacion->mensaje(3,'Si registro','./?c=persona');
                }else{
                    $this->validacion->mensaje(1,'Error de registro');
                }
             //else  // regitrar o actualizar

            //$x = 1;
           
            

           


        }
    }
}

?>