<?PHP
class Persona extends Conexion{

    
    function consultar($tabla,$wh=NULL){
        try {
              
            $conet=new Conexion();
            $sql="SELECT * FROM  $tabla ".$wh;   
            
            $rs=$conet->query($sql);
            //$rs=$rs->fetch_object();
            $conet->close();
            return $rs;
              //code...
          } catch (\Throwable $th) {
              //throw $th;
          }
    }

    function lista(){
        try {
              
            $conet=new Conexion();
            $sql="SELECT libros.Id_libro, libros.Nombre, libros.Editorial, libros.Cantidad FROM libros";   
            
            $rs=$conet->query($sql);
            //$rs=$rs->fetch_object();
            $conet->close();
            return $rs;
              //code...
          } catch (\Throwable $th) {
              //throw $th;
          }
    }
    function actualizar( $id,$nombre,$cantidad,$editorial){
        try {
            $conet=new Conexion();
            $sql=" UPDATE `libros` SET `Id_libro`=$id',`Nombre`=$nombre',`Editorial`='$editorial',`Cantidad`='$cantidad' WHERE Id_libro=$id";   
            
            $conet->query($sql);
            $rs=mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    function registrar($nombre,$editorial,$cantidad){
        try {
              
            $conet=new Conexion();
            $sql=" INSERT INTO `libros`( `Nombre`, `Editorial`, `Cantidad`) VALUES ('$nombre','$editorial',$cantidad) ";   
            
            $conet->query($sql);
            $rs=mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
              //code...
          } catch (\Throwable $th) {
              //throw $th;
          }
    }

    function insertar($nombre, $editorial, $cantidad){
        try {
              
            $conet=new Conexion();
            $sql=" INSERT INTO libros( Nombre, Editorial, Cantidad) VALUES ('".$nombre."','".$editorial."','".$cantidad."') ";   
            $conet->query($sql);
            $rs=mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
              //code...
          } catch (\Throwable $th) {
              //throw $th;
          }
    }  
    function editar($nombre,$edit,$can,$id)  {
        try {
              
            $conet=new Conexion();
            $sql=" UPDATE `libros` SET `Nombre`='$nombre',`Editorial`='$edit',`Cantidad`=$can WHERE Id_libro=$id";   
            $conet->query($sql);
            $rs=mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
              //code...
          } catch (\Throwable $th) {
              //throw $th;
          }
    }
    function eliminar ($id){
        try {
            $conet=new Conexion();
            $sql="DELETE  `libros` WHERE Id_libro=$id";   
            $conet->query($sql);
            $rs=mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
              //code...
          } catch (\Throwable $th) {
        }
    }
}
?>