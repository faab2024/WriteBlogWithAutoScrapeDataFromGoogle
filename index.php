<?php include 'header.php';?>
<style>
div.content {
  text-align: justify;
}
div.cont {
  text-align: left;
}
</style>
<body class="w3-light-grey">




<?php
//Written By Abdul Fakhri


//including the database connection file

$databaseHost = 'localhost';
$databaseName = 'ironxpxj_edu';
$databaseUsername = 'ironxpxj_admin';
$databasePassword = '!@#123qweasdzxc';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
      
}

$id=$_GET['id'];
if($id!=null){
    //fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT subject,article_name,article_content,img,DATE_FORMAT(date,'%d %b, %Y') as dates from post WHERE article_id='$id'");
}else{
    //fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT subject,article_name,article_content,img,DATE_FORMAT(date,'%d %b, %Y') as dates from post LIMIT 1");
}  


while($res = mysqli_fetch_array($result)) {
$sub=$res['subject'];
$title=$res['article_name'];
?>
<!-- Top menu on small screens -->

<header class="w3-container w3-top w3-white w3-xlarge w3-padding-16">
  
  <p><?php echo $sub;?></p>
  <span class="w3-left w3-padding"><?php echo $title; ?></span>
 
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/css/materialize.min.css">
<!-- !PAGE CONTENT! -->
<div class="content" style="max-width:1600px;margin-top:83px">
  
   <img src="<?php echo $res['img'];?>" alt="Diagram" width="" height="">
   
   
     
            <div class="cont"><?php 
             
             echo $res['article_content'];
             ?> </div><br>
           
             <p><a href="https://www.google.com/search?tbm=vid&tbs=dur:1,hq:h,cc:1,qdr:y&q=<?php echo $res['article_name'];?>" 
                              target="popup" 
                               onclick="window.open('https://www.google.com/search?tbm=vid&tbs=dur:1,hq:h,cc:1,qdr:y&q=<?php echo $res['article_name'];?>','popup','width=800,height=600'); return false;">
                                 Watch The Video
                            </a></p>                
               
                       <!-- <table class="table table-striped">
                                

                         <thead>
                            
                                    <tr>

                                  
                                   
                                  
                                  
                                   <th>Content</th>
                                   
                                 
                                  <th>Video</th>
                                   
                                   
                                  
                                 
                                 </tr>
                            
                              </thead>
                        
                        
                        
                        <tbody>-->
                            
                           <?php
		                  
		                      
		                  //echo "<tr>";
                               
		              
		                  ?>
		                 
		                  
		                  <?php
		                  
		                 
		                 
		                 //echo "</tr>";
		                 
		                  }
                          ?>
                       
                   
		   </div>
		   
</center>
   
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/js/materialize.min.js"></script>

<script>
    
    $(function(){
  if ('speechSynthesis' in window) {
    speechSynthesis.onvoiceschanged = function() {
      var $voicelist = $('#voices');

      if($voicelist.find('option').length == 0) {
        speechSynthesis.getVoices().forEach(function(voice, index) {
          var $option = $('<option>')
          .val(index)
          .html(voice.name + (voice.default ? ' (default)' :''));

          $voicelist.append($option);
        });

        $voicelist.material_select();
      }
    }

    $('#speak').click(function(){
      var text = $('#message').val();
      var msg = new SpeechSynthesisUtterance();
      var voices = window.speechSynthesis.getVoices();
      msg.voice = voices[$('#voices').val()];
      msg.rate = $('#rate').val() / 10;
      msg.pitch = $('#pitch').val();
      msg.text = text;

      msg.onend = function(e) {
        console.log('Finished in ' + event.elapsedTime + ' seconds.');
      };

      speechSynthesis.speak(msg);
    })
  } else {
    $('#modal1').openModal();
  }
});
</script>
 
 

 

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

</script>


</body>
</html>
