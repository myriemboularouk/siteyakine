<?php

/*if (!empty($_POST)) {

echo "<pre>";
print_r($_POST);
echo "</pre>";


echo "<strong>adresse saisie: </strong><br/><br/>";

if (empty($_POST['ville'])) {
	echo "<span style = 'background:red;color:white; padding :5px'>ville :votre champ  ville est vide</span> <br/><br/>";
}else{
	echo "ville :" . $_POST['ville']. '<br/><br/>';
}



if (empty($_POST['CP'])) {
	echo " <span style = 'background:red;color:white; padding :5px'>code postale :votre champ  code postale est vide </span><br/><br/>";
}else{
	echo "code postal :" . $_POST['CP']. '<br/><br/>';
}

if (empty($_POST['adresse'])) {
	echo "<span style = 'background:red;color:white; padding :5px'>adresse : votre champ adresse est vide </span><br/><br/>";
}else{
	echo "adresse :" . $_POST['adresse']. '<br/><br/>';

}

}*/

 ?>
<?php 

$msg = array();
$msg['ville'] ='';
$msg['CP'] ='';
$msg['adresse'] ='';

if (!empty($_POST)) {
	//echo "<pre>";
    //print_r($_POST);
    //echo "</pre>";

	foreach ($_POST as $indice => $value) {
		if (empty($value)) {
			$msg [$indice]="<span style = 'background:red;color:white; padding :5px'>code postale :veillez renseigner le champd" .$indice.'</span><br/><br/>';
		}else{
			echo $indice.':<b>'.$value.'</b><br/>';
		}
	}
}
 ?>

<h1>formulaire</h1><br/>
<form method="post" action="">
    <?php echo $msg['ville'];?>
	<label>ville</label><br/>
	<input type="text" name="ville"><br/>

    <?php echo $msg['CP'];?>
	<label>CP</label><br/>
	<input type="number" name="CP"><br/><br/>

    <?php echo $msg['adresse'];?>
	<label for=adresse>Adresse</label><br/>
	<textarea  name=adresse rows=5 ></textarea><br/><br/>
    
    <input type="submit" value="valider">

</form>


 