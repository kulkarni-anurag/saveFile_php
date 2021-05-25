<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Save & Open File</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
    <script src="plugins/jQuery/jquery.min.js"></script>
		<script src="plugins/bootstrap/bootstrap.min.js"></script>
		<script>
		  $(document).ready(function(){
		    $("#save").click(function(){
		      code = $("#code").val();
		      filename = $("#filename").val();
		      
		      $.ajax({
		        type: "POST",
		        url: "save.php",
		        data: "code=" + code + "&filename=" + filename,
		        success: function(html){
		          if(html == 'true'){
		            $("#add_err2").html('<div class="alert alert-success"><strong>File Saved.</strong></div>');
		          }
		          else if(html == 'false'){
		            $("#add_err2").html('<div class="alert alert-danger"><strong>File Not Saved.</strong></div>');
		          }
		          else if(html == 's_code'){
		            $("#add_err2").html('<div class="alert alert-danger"><strong>Code</strong> is required.</div>');
		          }
		          else if(html == 's_filename'){
		            $("#add_err2").html('<div class="alert alert-danger"><strong>Filename</strong> is required.</div>');
		          }
		          else{
		            $("#add_err2").html('<div class="alert alert-danger"><strong>Error</strong> processing request. Please try again.</div>');
		          }
		        },
		        beforeSend: function(){
		          $("#add_err2").html('<div class="alert alert-warning"><strong>Saving...</strong></div>');
		        }
		      });
		      return false;
		    });
		    
		    $("#open").click(function(){
		      filename = $("#filename").val();
		      
		      $.ajax({
		        type: "POST",
		        url: "open.php",
		        data: "filename=" + filename,
		        success: function(html){
		          if(html == 's_file'){
		            $("#add_err2").html('<div class="alert alert-danger"><strong>Filename</strong> is required.</div>');
		          }
		          else{
		            $("#code").html(html);
		            $("#add_err2").html('<div class="alert alert-success"><strong><a href="#" data-dismiss="alert" class="close" aria-label="close">&times;</a>Opened.</strong></div>');
		          }
		        },
		        beforeSend: function(){
		          $("#add_err2").html('<div class="alert alert-warning"><strong>Opening...</strong></div>');
		        }
		      });
		      return false;
		    });
		  });
		</script>
  </head>
  <body>
    <h1 class="text-center mt-3">Saving & Opening File Using PHP</h1>
    <div class="container mt-5">
      <div class="col-md-12">
        <form class="form">
          <label>Enter Your Code :</label>
          <textarea class="form-control" rows="5" id="code" name="name"></textarea>
        </form>
        <div id="add_err2" class="mt-3"></div>
        <input type="text" class="form-control mt-3" placeholder="Enter File Name" id="filename" name="filename">
        <button class="btn btn-success mt-3" id="save" name="save">Save File &nbsp;<i class="icofont-save"></i></button>
        
        <button class="btn btn-light mt-3 ml-3" id="open" name="open">Open File &nbsp;<i class="icofont-folder-open"></i></button>
      </div>
    </div>
  </body>
</html>