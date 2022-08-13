<nav class="navbar  navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Smart</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    
      <ul class="nav navbar-nav" id="nav">  

     
        <li class="dropdown-toggle"><a href="./?c=persona">Libros<span class="sr-only"></span></a></li>
        
      
          
       
       

<li class="dropdown-toggle"><a href="./?c=cliente">Clientes<span class="sr-only"></span></a></li>
       

        
       <!-- <li class="dropdown-toggle"><a href="#" onclick="nav_loadlistuser()">Usuario<span class="sr-only"></span></a></li>
        <li class="dropdown-toggle"><a href="?view=repsolicitud">Solicitudes<span class="sr-only"></span></a></li>    !-->
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"></a></li>

          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><strong>Hola! </strong> <?PHP echo $_SESSION['NOM'];?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          
          <li><a href="./?c=admin&a=cuenta">Cuenta</a></li>
          
         
         
          <li><a href="./?c=logout">Salir</a></li>
            
          </ul>
        </li>
      </ul>


    </div>
  </div>
</nav>

