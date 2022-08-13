<?PHP

require_once('./codex/model/class.cliente.php');

class ClienteController{
        
    private $model,$validacion;

    public function __CONSTRUCT(){
        $this->model = new Cliente();
        $this->validacion = new Validacion;       
    }

    public function index(){      
                
        require_once('codex/layout/head.php'); 
        if(!$this->validacion->estaconectado('ROL',1)){
            print $this->validacion->offline();
            exit;
        } 
        $rs=$this->model->consultar('cliente');
        
        require_once('codex/layout/nav/nav.php');  
        require_once('codex/view/cliente/index.php');    
        
        require_once('codex/layout/footer.php');  
        
    }

    function vereficar(){
        if($this->validacion->estaconectado('ROL',1)){
            if(isset($_POST['id'])!=""){
                $rp = $this->model->consultar('cliente', " where cedula=".$_POST['id']);
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
            $ape='';
            $nom_libro='';
            $idd=0;
            if(isset($_POST['vid'])){
                $rp=$this->model->consultar('cliente', " where cedula=".$_POST['vid']);
                if($this->model->rows($rp)==1){
                    $obj=$this->model->recorrer($rp);
                    $idd=$obj['cedula'];
                    $nombre=$obj['Nombre'];
                    $ape=$obj['Apellido'];
                    $nom_libro=$obj['Nom_libro'];
                }

            }
            require_once('codex/view/cliente/crud.php');
        }
    }



    function guardar(){
        if($this->validacion->estaconectado('ROL',1)){
           
            if(!isset($_POST['nombre']) || $_POST['nombre']==''
            || !isset($_POST['apellido']) || $_POST['apellido']==''
            || !isset($_POST['nom_libro']) || $_POST['nom_libro']==''){
               $this->validacion->mensaje(0,'Datos con *  requeridos');
            }
            $_POST['nombre']=$this->validacion->limpiar($_POST['nombre']);
            $_POST['apellido']=$this->validacion->limpiar($_POST['apellido']);
            $_POST['nom_libro']=$this->validacion->limpiar($_POST['nom_libro']);
            $this->validacion->EsNombre($_POST['nom_libro']);
            $this->validacion->EsNombre($_POST['nombre']);
            $this->validacion->EsNombre($_POST['apellido']);


            if($_POST['idd']==0){
                $rc=$this->model->consultar('cliente'," where cedula='".$_POST['cedula']."'");
                if($this->model->rows($rc)!=0){
                    $this->validacion->mensaje(1,'El libro ya existe');
                }
            }
            if($_POST['idd']!=0){
                $rc=$this->model->consultar('cliente'," where cedula=".$_POST['idd']);
            if($this->model->rows($rc)!=0){
                $ok=$this->model->editar($_POST['nombre'],$_POST['editorial'],$_POST['cantidad'], $_POST['idd']);
                if($ok>0){
                    $this->validacion->mensaje(3,'Se edito','./?c=persona');
                }else{
                    $this->validacion->mensaje(1,'Error al editar');
                }
            }
            }
            
                $ok=$this->model->registrar($_POST['idd'],$_POST['nombre'],$_POST['editorial'],$_POST['cantidad']);
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