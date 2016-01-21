<!DOCTYPE html>
<html>
<head>
	<title>crop try</title>	
		
		<script type="text/javascript" src="http://localhost/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="http://localhost/js/jquery.Jcrop.js"></script>
		<link rel="stylesheet" href="http://localhost/js/jquery.Jcrop.min.css" />
		
		<script type="text/javascript">
	 		
			$(document).ready(function(){

	                      	var jcrop_api, boundx, boundy;

					$("#prpicfilebrws").change(function(){
	                     

	                      var file = document.getElementById("prpicfilebrws");
	                      var filer = new FileReader();  
	                       
	                        filer.onload= function(e){	document.getElementById("originalImg").src = e.target.result; }
	                      filer.readAsDataURL(file.files[0]);
						
									$('.thumbnail-img').Jcrop({
									    onChange: updatePreview,
									    onSelect: showCoords,
									    bgFade: true,
									    bgOpacity: .2,
									    setSelect: [ 0, 0, 220, 220 ],
									    aspectRatio: 1
									},function(){
									    jcrop_api = this;
									});
	                });
	
							function updatePreview(c) { // croping image preview
									    if (parseInt(c.w) > 0) {
									        var rx = 220 / c.w, ry = 220 / c.h;
									    }
									}
									function showCoords(c) { // show all coords
									    $('#x').val(c.x);
									    $('#y').val(c.y);
									    $('#x2').val(c.x2);
									    $('#y2').val(c.y2);
									    $('#w').val(c.w);
									    $('#h').val(c.h);
									}


$("#crop").on("click", function(){
    var canvas = document.getElementById("canvasThumbResult");
    var context = canvas.getContext("2d");
    var img = document.getElementById("originalImg"),
        $img = $(img),
        imgW = img.width,
        imgH = img.height;
    
    var ratioY = imgH / $img.height(),
        ratioX = imgW / $img.width();
    
    var getX = $('#x').val() * ratioX,
        getY = $('#y').val() * ratioY,
        getWidth = $('#w').val() * ratioX,
        getHeight = $('#h').val() * ratioY;
    
    context.drawImage(img,getX,getY,getWidth,getHeight,0,0,320,320);
});
			});
		</script>
		<style type="text/css">
div img{
    max-width: 400px;
    max-height: 400px;
}

input {
    width: 100px;
    float: left;
}

		</style>
</head>
<body>


	<input type="file" id="prpicfilebrws" accept="image/*" />
	<br/>
	<br/>
	<div id="originalArea" >
			<div>
			    <img id="originalImg" class="thumbnail-img"  src="" />
			</div>
				<button id="crop">Crop</button>
					<input type="text" id="x"  name="coord_x" />
					<input type="text" id="y"  name="coord_y" />
					<input type="text" id="x2" name="coord_x2"/>
					<input type="text" id="y2" name="coord_y2"/>
					<input type="text" id="w"  name="size_w"/>
					<input type="text" id="h"  name="size_h"/>

	</div>
	<div id="afterCropArea">
			<canvas id="canvasThumbResult" width="320" height="320"></canvas>
	</div>


</body>
</html>                    
