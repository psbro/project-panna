<?php

 //$beta = '1-DekQ4UU5CjRNJawx-X1ytixuFHAzb-0'; // this will come from the server uploaded by monish
 //$gama = 'https://drive.google.com/uc?export=view&id=';
 //$alfa = $gama.$beta;
$servername = "localhost";
$username = "id17450222_anshu";
$password = "9URcDT}kF@P4e6Zo";
$dbname = "id17450222_user_panna";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
} catch(PDOException $e) {
  echo  $e->getMessage();
}
function get_special(){
    
     global $conn;
    $sql = "SELECT * FROM sector WHERE sectors = ('serial')";
    $vote = $conn->prepare($sql);
    $vote->execute();
    $voteNumber = $vote->fetch();
    $data_1 =  $voteNumber['count'];
     if($data_1 == null){
        return 'nothing';
    }else{
        return $data_1;
    }
    $voteNumber->closeCursor();

}
function get_image($count){
    $main_string = 'https://drive.google.com/uc?export=view&id=';
    

    //============main code======================
      global $conn;
    $sql = "SELECT * FROM school WHERE serial = $count";
    
    $vote = $conn->prepare($sql);
    $vote->execute();
    $voteNumber = $vote->fetch();
    $data_1 =  $voteNumber['image'];
     if($data_1 == null){
        return 'nothing';
    }else{
        $image_address = $main_string.$data_1;
        return "<img src = $image_address height = '300px' width = '300px'>";
    }
    $voteNumber->closeCursor();
    
}
function get_title($count){
     
     global $conn;
    $sql = "SELECT * FROM school WHERE  serial = $count ";
    $vote = $conn->prepare($sql);
    $vote->execute();
    $voteNumber = $vote->fetch();
    $data_1 =  $voteNumber['title'];
     if($data_1 == null){
        return 'nothing';
    }else{
        return $data_1;
    }
    $voteNumber->closeCursor();
    
}
function get_bio($count){
      global $conn;
    $sql = "SELECT * FROM school WHERE  serial = $count ";
    $vote = $conn->prepare($sql);
    $vote->execute();
    $voteNumber = $vote->fetch();
    $data_1 =  $voteNumber['bio'];
     if($data_1 == null){
        return 'nothing';
    }else{
        return $data_1;
    }
    $voteNumber->closeCursor();
    
}
function get_map($count){
      global $conn;
    $sql = "SELECT * FROM school WHERE  serial = $count ";
    $vote = $conn->prepare($sql);
    $vote->execute();
    $voteNumber = $vote->fetch();
    $data_1 =  $voteNumber['map'];
    $word = "<iframe src= '$data_1'  width='300' height='300' style='border:0;' allowfullscreen='' loading='lazy'></iframe>";
     if($data_1 == null){
        return 'nothing';
    }else{
        return $word;
    }
    $voteNumber->closeCursor();
    
}
function get_video($count){
      global $conn;
    $sql = "SELECT * FROM school WHERE  serial = $count ";
    $vote = $conn->prepare($sql);
    $vote->execute();
    $voteNumber = $vote->fetch();
    $data_1 =  $voteNumber['video'];
    $word = "<iframe width='300' height= '300' src= '$data_1' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
     if($data_1 == null){
        return 'nothing';
    }else{
        return '<b style = "color: white;">'.$word.'</b>';
    }
    $voteNumber->closeCursor();
    
}
function random_number(){
    $alfa = mt_rand(0,3);
    return $alfa;
}
function final_data(){
    $number_1 = get_special();
    for($alfa = $number_1+4;$alfa>=0;$alfa--){
        $number_1= random_number();
     $bio = get_bio($alfa);
     $video = get_video($alfa);
     $map = get_map($alfa);
     $title = get_title($alfa);
     $image = get_image($alfa);
     if($number_1 == 1){
         $color = '#fd5c63';
     }else if($number_1 == 2){
         $color = '#FFD700';
     }else if($number_1 == 3){
         $color = '#DDA0DD';
     }else{
         $color = '#00FFFF';
     }
     
     
     if($bio != 'nothing'){
    
         echo " <div class  = 'ui-field-contain' style = 'background-color:  $color;'> ";
         
         echo "<div data-role = 'header'>";
         echo "<h1>".$title.'</h1>';
         echo "</div><div style = 'text-align: center;'>";
         echo $image.'</div>';
        
         
         echo "<div  data-role='collapsible' data-collapsed='true'><h1>READ MORE</h1>";
         echo "<b><p style ='background-color: #FFFACD; color: #0072B5'; font: 15px bold Arial, sans-serif;'>".$bio.'</p></b></div>';
         echo "<div style = 'background-color: #bfdf35' data-role='collapsible' data-collapsed='true'><h1>MAPS</h1>";
         echo "<p style ='background-color: #FFFACD;'>".$map.'</p></div>';
         echo "<div data-role='collapsible' data-collapsed='true'><h1>VIDEOS</h1>";
         echo "<p style ='background-color: #FFFACD;'>".$video.'</p></div>';
         
    }
     
    }
 
    
}
 
?>
<!DOCTYPE html>
<html>
    <head>
             <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      <link rel = "stylesheet" href = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
      <script src = "https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        </head>
        <body>  
        <div class="ui-grid-a">
 <div class="ui-block-a">Left</div>
 <div class="ui-block-b"><label for = 'selection'  style = 'background-color: #fdd08c'>search your area of intrsest</label>
                <select name = 'selection' id = 'area_of_intrest'>
                       
                            
                           
                                <option  value =''>select from here </option>
                                <option  value = 'panna temple'>panna temple</option>
                                <option  value = 'panna tiger reserve'>panna tiger reserve</option>
                                <option  value ='inside panna'>inside panna</option>
                                <option  value = 'structure'>Architecture splender </option>
                                <option  value = 'panna hotels'>panna hotels</option>
                                <option  value = 'panna village'>panna village</option>
                                
                               
                    
                    </select></div>
</div>
    
        <div data-role = 'header' data-position = 'fixed' style = "background-image: url('https://media.giphy.com/media/Eqz8ZFUScPHH2/giphy.gif?cid=ecf05e47f2fsid8bdurwb2o50qlorke9jlk4bd3vqiyae65o&rid=giphy.gif&ct=g')">
            <h4 style = "font-family: 'Lobster', cursive; color: white;">TRAVEL PANNA</h4>
            <div data-role = 'navbar'>
            <ul>
                <li >
                    <img src = 'download.png'  hight = '30' width = '50' alt = 'LOGO'>
            </li>
            <li>
            <a href = 'about.html' data-taransition = "flip">about us</a>
            </li>
                <li>
                    <a href = '' >goal's</a>
                    </li>
                    <li>
                        <a href = 'passadmin.html' data-transition = 'turn'>ADMIN PANEL</a>
                    </li>
                </ul>
                </div>
            </div>
             <div  ui-content = 'ui-content' style = 'font-family: "Lucida Console", "Courier New", monospace;'>
                
            
        <div  dat-role ='page' ui-page-theme = 'c' style="color: black; background-color:  #fdd08c;" >
            
            <?php 
            final_data();
            ?>
              <div style = "font-family: 'Lobster', cursive; color: black;" data-role = 'footer' data-position = 'fixed'>
           coded and designed by <b>shubhanshu mishra</b>& Team
             </div>
            </div>
            </body>
            </html>