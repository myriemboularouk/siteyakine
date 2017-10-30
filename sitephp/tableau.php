<?php
echo '<br/>';
echo '<table border="1">';
for($i = 0; $i < 100; $i ++){

	if($i%10 == 0){
		echo '<tr>';
	}
	echo '<td>' . $i . '</td>';
}
echo '</tr>';
echo '</table>';
