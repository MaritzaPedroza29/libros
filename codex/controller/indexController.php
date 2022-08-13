<?PHP

require_once('./codex/model/class.usuario.php');

class IndexController{
        
    private $model,$validacion;

    public function __CONSTRUCT(){
        $this->model = new Usuario();
        $this->validacion = new Validacion;       
    }

    public function index(){
        
        require_once('codex/layout/head.php');          
        require_once('codex/view/index/index.php');    
        require_once('codex/layout/footer.php');
    }

    public function about(){
        
        require_once('codex/layout/head.php');
        require_once('codex/layout/nav/nav.php');
        require_once('codex/view/index/about.php');        
        require_once('codex/layout/footer.php');
    }


    public function verificar(){
        
        if(isset($_POST['cuenta']) && isset($_POST['pasw'])){
            $_POST['cuenta']=$this->validacion->limpiar($_POST['cuenta']);
            $_POST['pasw']=$this->validacion->limpiar($_POST['pasw']);
            $this->validacion->EsNumero($_POST['cuenta']);
            $_POST['pasw']=MD5($_POST['pasw']);
            
            $rst=$this->model->consultar('login'," where login_usuario='".$_POST['cuenta']."' and login_pasw='".$_POST['pasw']."'");
   
            $nrs=$this->model->rows($rst);
            
            if($nrs!=1){
                $this->validacion->mensaje(1,'credenciales incorrectas');                
            }
            $dat=$this->model->recorrer($rst);
            

            $_SESSION['time'] = time();
            $_SESSION['expire'] = $_SESSION['time'] + (3600*4600*5600*6600);
            
            $TK=md5(date('Y-m-d H:i:s'));
            //$_SESSION['TK']=$TK;
           // $_SESSION[$TK]=MD5($dat['cliente_id'].$dat['cliente_nombre']);
            
            
           $this->validacion->mensaje(3,'conectado');
           
           
        }
    }



    public function panel(){
        require_once('codex/layout/head.php');
        if(!$this->validacion->estaconectado('ROL',2)){
            print $this->validacion->offline();
          }  
        require_once('codex/layout/nav/nav.php');        
        require_once('codex/view/cliente/panel.php'); 
        require_once('codex/layout/footer.php');    
    }
    
 
    
}

?>