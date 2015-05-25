<script type="text/javascript">
  function test () {

  var file = document.getElementById("lol");
  var filer = new FileReader();  
    filer.onload= function(e){
     document.getElementById("i").src = e.target.result; 
   }    
    filer.readAsDataURL(file.files[0]);
    
}
</script>
<input type="file" onchange="test()" id="lol" />
<img src="" id="i" width="500" />