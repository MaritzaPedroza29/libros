<?PHP

require_once('./codex/model/class.usuario.php');

class AdminController{
        
    private $model,$validacion;

    public function __CONSTRUCT(){
        $this->model = new Usuario();
        $this->validacion = new Validacion;       
    }

    public function index(){      
        require_once('codex/layout/head.php');
        require_once('codex/view/admin/login.php'); 
        require_once('codex/layout/footer.php');   
        
    }


    public function verificar(){
        if(isset($_POST['cuenta']) && isset($_POST['pasw'])){
           $_POST['cuenta']=$this->validacion->limpiar($_POST['cuenta']);
           $_POST['pasw']=$this->validacion->limpiar($_POST['pasw']);
           $this->validacion->EmailValido($_POST['cuenta']);
           $_POST['pasw']=md5($_POST['pasw']);

           $rs=$this->model->consultar('login'," where login_usuario='".$_POST['cuenta']."' and login_pasw='".$_POST['pasw']."'");
            if($this->model->rows($rs)==1){
            $ob=$this->model->recorrer($rs);
            $_SESSION['time'] = time();
            $_SESSION['expire'] = $_SESSION['time'] + (3600*4600*5600*6600);
            $TK=md5(date('Y-m-d H:i:s'));
            $_SESSION['TK']=$TK;          
            $_SESSION[$TK]=MD5($ob['login_id'].$ob['login_nombre']);
            $_SESSION['ID']=$ob['login_id'];   
            $_SESSION['NOM']=$ob['login_nombre'];
            $_SESSION['ROL']=1;//es admin
                $this->validacion->mensaje(3,'Conectando','./?c=admin&a=panel');
            }
            else{
                $this->validacion->mensaje(1,'credenciales incorrectas');
            }
        }
        
    }

    public function panel(){
        if(!$this->validacion->estaconectado('ROL','1')){
            print $this->validacion->offline();
          }  
        require_once('codex/layout/head.php');          
        require_once('codex/layout/nav/nav.php');  
        require_once('codex/view/admin/index.php');    
        require_once('codex/layout/footer.php');
    
    
    }


    function restore(){
      
      require_once('codex/view/admin/restore.php');  
    }
    
    function sendrestore(){

        if(isset($_POST['cuenta'])&& $_POST['cuenta']!=''){
            
            $rs=$this->model->consultar('login'," where logiin_usuario='".$_POST['cuenta']."'");

            if($this->model->rows($rs)==1){
                $obj=$this->model->recorrer($rs);
                $idusuario=$obj['login_id'];
                $clave=$this->validacion->genkey(5);
                $key=md5($clave);
                
                $rst=$this->model->recuperar($idusuario,$key);
               
                if($rst>=0 && $rst<=1){
                    $send=$this->validacion->correo_linux('Restore@eyersoft.com',$_POST['cuenta'],'su clave es: '.$clave,$obj['login_nombre'],'ahi esta su clave');
                    
                 
                    $this->validacion->mensaje(3,$send);
                
                }
               

            }
        }
    }

    


}
?>