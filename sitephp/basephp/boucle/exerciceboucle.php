<?php 
//boucle/exemple_boucle.php
// 1 : telecharger 5 images sur google : 
echo 'test';
echo '<img src="image1.jpg"/>';
 

 //3
 $i = 0;
 while ($i < 5) { 

echo '<img src="image1.jpg" width="250px" /> <br/>';
  
 $i ++;
 echo '<hr/>';  
 } 
//4
$i = 1;// $i = 0 puis 1 puis 2 puis 3 puis 4
while ($i <= 5) { 

echo '<img src="image'. $i .'.jpg" width="250px" /> <br/>';
 
$i ++;
echo '<hr/>';  
}
 
// boucle for

for($i = 0; $i < 3; $i++) {
    echo $i . '----';
}









?>