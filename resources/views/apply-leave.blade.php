<?php 
$ipaddress = $_SERVER['REMOTE_ADDR'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Attendance</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="{{ URL::asset('js/webcam.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js"></script>
<!--    <script>
        //webcam.set_api_url( 'upload.php' );
        webcam.set_quality( 90 ); // JPEG quality (1 - 100)
        webcam.set_shutter_sound( true ); // play shutter click sound
        
        webcam.set_hook( 'onComplete', 'my_completion_handler' );
        
        function take_snapshot() {
            // take snapshot and upload to server
            document.getElementById('upload_results').innerHTML = 'Snapshot<br>'+
            '<img src="uploading.gif">';
            webcam.snap();
			
			
        }
        
        function my_completion_handler(msg) {
            // extract URL out of PHP output
            if (msg.match(/(http\:\/\/\S+)/)) {
                var image_url = RegExp.$1;
                // show JPEG image in page
                document.getElementById('upload_results').innerHTML = 
                    'Snapshot<br>' + 
                    '<img src="' + image_url + '">';
                var karthik= $("#upload_image_url").val(image_url);
			   // alert(karthik);
                // reset camera for another shot
                webcam.reset();
            }
            else alert("PHP Error: " + msg);
        }
    </script>  -->
    <script language="JavaScript">
function take_snapshot() {
    Webcam.snap(function(data_uri) {
    document.getElementById('results').innerHTML = '<img id="base64image" src="'+data_uri+'"/><button onclick="SaveSnap();">Save Snap</button>';
});
}
function ShowCam(){
Webcam.set({
width: 320,
height: 240,
image_format: 'jpeg',
jpeg_quality: 100
});
Webcam.attach('#my_camera');
}
function SaveSnap(){
    document.getElementById("loading").innerHTML="Saving, please wait...";
    var file =  document.getElementById("base64image").src;
    var formdata = new FormData();
    formdata.append("base64image", file);
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", function(event) { uploadcomplete(event);}, false);
    ajax.open("POST", "upload.php");
    ajax.send(formdata);
}
function uploadcomplete(event){
    document.getElementById("loading").innerHTML="";
    var image_return=event.target.responseText;
    var showup=document.getElementById("uploaded").src=image_return;
}
window.onload= ShowCam;
</script>
<style>
label.error {
  color:red;
}
.main
{
    margin-left: auto;
    margin-right: auto;
    width: 584px;
}
.snap
{
    color: white;
    border-radius: 4px;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    background: rgb(28, 184, 65);
    font-family: inherit;
    font-size: 100%;
    padding: .5em 1em;
    border: 0 hsla(0, 0%, 0%, 0);
    text-decoration: none;
}
.border
{
    border: 3px rgb(28, 184, 65) solid;
    padding: 5px;
width: 236px;
    height: 237px;
}
#my_camera video {
  width: 218px !important;
  height: 164px !important;
  margin-top: 32px !important;
}
#my_camera {
  width:0px !important;
  height:0px !important;	
}
#results img {
  width: 218px !important;
  height: 164px !important;
  margin-top: 11px !important;
}
#results button{
  margin-top:34px;
}
</style>
</head>
<body>
<div class="log_company" style="text-align: center; margin-top:-3%">
    
<a href="index.php"><img src="img/logo.png" alt="Smiley face" height="200" width="200"></a>
</div>

<?php

{!! Form::open(array('route' => 'store', 'class' => 'form')) !!}

?>
 <form role="form" action="#" method="POST" id="login-form"class="col-lg-5 col-md-5 col-lg-offset-3 col-md-offset-3" style="margin-top:-3%">
      <label for="pwd">Take Pic:</label>     
	<table class="main">
        <tr>
            <td valign="top">
	            <div class="border container" id="Cam">
                      <div id="my_camera"></div>Live Webcam<br>
                    </div>
                <input type="button" class="btn btn-primary btn-xs" value="Take Picture" onClick="take_snapshot()">
				 <input type="hidden" id="upload_image_url" name="imageUrl" value="">
				 <input type="hidden" id="ip_address" name="IpAddress" value="<?php echo $ipaddress ?>">
				
            </td>
            <td width="10">&nbsp;</td>
            <td valign="top">
                <div id="upload_results Prev" class="border container">
                    Snapshot<br> <div id="results"></div>
                   
                </div>
            </td>
        </tr>
    </table>

<!--     <div class="form-group">
<div class="container" id="Cam"><b>Webcam Preview...</b>
    <div id="my_camera"></div><form><input type="button" value="Snap It" onClick="take_snapshot()"></form>
</div>
<div class="container" id="Prev">
    <b>Snap Preview...</b><div id="results"></div>
</div>
<div class="container" id="Saved">
    <b>Saved</b><span id="loading"></span><img id="uploaded" src=""/>
</div>
    </div> -->


{!! Form::open(['url'=>'register','id'=>'sign-up','class'=>'col-md-6 col-md-push-4 form-horizontal'])!!}
        
            <div class='form-group'>
                {!! Form::label('first_name', 'First Name:',['class'=>'col-xs-12 col-md-3']) !!}
                <div class= 'col-xs-12 col-md-6'>
                    {!! Form::text('first_name', null, ['class' => 'form-control'])!!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('last_name', 'Last Name:',['class'=>'col-xs-12 col-md-3']) !!}
                <div class= 'col-xs-12 col-md-6'>
                    {!! Form::text('last_name', null, ['class' => 'form-control'])!!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('email', 'Email Address:',['class'=>'col-xs-12 col-md-3']) !!}
                <div class= 'col-xs-12 col-md-6 '>
                    {!! Form::text('email', null, ['class' => 'form-control'])!!}
    <div class='form-group'>
            {!! Form::label('password', 'Password:',['class'=>'col-xs-12 col-md-3']) !!}
                <div class= 'col-xs-12 col-md-6'>
                    {!! Form::password('password', null, ['class' => 'form-control'])!!}
                </div>
            </div>
    
                    <div class='form-group'>
            {!! Form::label('password_confirmation', 'Confirm Password:',['class'=>'col-xs-12 col-md-3']) !!}
                <div class= 'col-xs-12 col-md-6'>
                    {!! Form::password('password_confirmation', null, ['class' => 'form-control'])!!}
                </div>
            </div>
                    </div>  <div class='btn btn-small'>
                {!! Form::submit('Join Us!',['class'=>'btn btn-success btn-sm form-control'])!!}
            </div>
                    
        {!! Form::close() !!}


    <div class="form-group">
      <label for="email">Emp ID:</label>
      <input type="text" class="form-control" id="empId" name="empId" placeholder="Enter Employee ID">
    </div>
	    <div class="form-group">
      <label for="pwd">Select Leave Date From:</label>
      <div class="input-group date">
                    <input type="text" class="form-control datetimepicker1" id="datetimepicker1" name= "from_date" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
    </div>
	     <div class="form-group">
      <label for="pwd">Select Leave Date To:</label>
     <div class="input-group date">
                    <input type="text" class="form-control datetimepicker2" name="to_date" id="datetimepicker2" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
    </div>

	<div class="row" style="margin-top:3%;">
	<a href="index.php"><button type="button" class="btn btn-danger btn-lg col-md-offset-5 col-lg-offset-5" style="margin-left:2%;">Cancel</button></a>
        <button type="submit" class="btn btn-success btn-lg col-md-offset-7 col-lg-offset-7">Apply</button>
   </div>
  </form>

<?php	
{!! Form::close() !!}
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $("#datetimepicker1").datepicker({
            dateFormat: "dd-M-yy",
            autoclose: true	
        });
        $('#datetimepicker2').datepicker({
            dateFormat: "dd-M-yy",
	    autoclose: true	
        });
      });
    </script>
<script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
<script>
    $( "#login-form" ).validate({
      rules: {
        empId: "required",
		imageUrl:"required",
		from_date:"required",
		to_date:"required"
      }
    });
</script>
</body>
</html>























































































