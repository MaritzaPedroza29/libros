<!DOCTYPE html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <title><?PHP echo (_TITULO_);?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="./css/bootstrap.css" media="screen">
   
   
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  
    <script>

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>     
    <script src="./js/lib/jquery.js"></script>    
    <link href="./js/lib/plugins/select2/select2.css" rel="stylesheet">
    <link href="plugins/alert/css/jquery-confirm.css" rel="stylesheet" media="screen"> 
	  <link href="plugins/alert/css/toastr.css" rel="stylesheet" media="screen">
	  <script src="plugins/jquery/jquery-2.1.0.min.js"></script>
	  <script src="plugins/alert/js/jquery-confirm.js"></script>
	  <script src="plugins/alert/js/toastr.min.js"></script>
    <script src="./js/lib/bootstrap.min.js"></script>
	  <script src="./js/lib/validation.js"></script>
    <script src="./js/lib/msg.js"></script>
    <script src="./js/lib/devoops.js"></script>
    <link  href="./css/template.css" rel="stylesheet">
   
   
   </head>
  <body >
 

  <div class="modal fade" id="loading" data-keyboard="false"  data-backdrop="false" role="dialog" style="text-align:center;vertical-align: middle;background:#3c3c3cbf ;">
    <div class="loader"></div>
  </div>

  
  

  <div class="modal fade" id="Modal" data-keyboard="false" data-backdrop="false" role="dialog">
    <div id="longimodal" class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="Mtitle"></h4>
          </div>
          <div class="modal-body" id="Mbody">
          
          </div>      
        </div>
      </div> 
    </div>
    <script>
  $("#loading").modal('show');

  </script>