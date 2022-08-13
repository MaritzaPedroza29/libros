<?PHP
class Cliente extends Conexion{

    
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
            $sql="SELECT cliente.cedula, cliente.Nombre, cliente.Apellido, cliente.Nom_libro FROM cliente";   
            
            $rs=$conet->query($sql);
            //$rs=$rs->fetch_object();
            $conet->close();
            return $rs;
              //code...
          } catch (\Throwable $th) {
              //throw $th;
          }
    }
    function actualizar( $cedula,$nombre,$ape,$nom_libro){
        try {
            $conet=new Conexion();
            $sql=" UPDATE `cliente` SET `cedula`=$id',`Nombre`=$nombre',`Apellido`='$ape',`Nom_libro`='$nom_libro' WHERE cedula=$id";   
            
            $conet->query($sql);
            $rs=mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    function registrar($cedula,$nombre,$ape,$nom_libro){
        try {
              
            $conet=new Conexion();
            $sql=" INSERT INTO `cliente`( `cedula`, `Nombre`, `Apellido`, `Nom_libro`) VALUES ($cedula,'$nombre','$ape','$nom_libro') ";   
            
            $conet->query($sql);
            $rs=mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
              //code...
          } catch (\Throwable $th) {
              //throw $th;
          }
    }

    function insertar($cedula,$nombre, $editorial, $cantidad){
        try {
              
            $conet=new Conexion();
            $sql=" INSERT INTO cliente( cedula,Nombre,Apellido,Nom_libro) VALUES ('".$cedula."','".$nombre."','".$editorial."','".$cantidad."') ";   
            $conet->query($sql);
            $rs=mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
              //code...
          } catch (\Throwable $th) {
              //throw $th;
          }
    }    
}
?>