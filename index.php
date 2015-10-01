<?php
$dsn='mysql:dbname=bigger;host=127.0.0.1';
	$user = 'root';
	$pass = '';
	
	$db = new PDO($dsn,$user,$pass);
	
	$sql= 'SELECT `id`,`title`,`news`
	FROM `news`';

	$rows=$db->query($sql)->fetchall();
	
	if(!isset($rows)){
		echo 'canot conect';
	}
	if(count($rows) === 0){
		echo 'empty base';
	}
	if (!array($rows)){
		echo 'non array';
	}
	
	echo '<form method="GET">
	<input type="submit" name="start" value="main"<br>
	</form>';
	
	if(isset($_GET['start'])){
		for($i=0;$i<count($rows);$i++){
			$b = $rows[$i][id];
			for($d=0;$d<count($rows);$d++){
				if($b == $rows[$d][id]){
					echo ''.$rows[$d][title].'<br>';
					echo ''.$rows[$d][news].'<br>';
					echo '<form method="GET">';
					echo '<input type="submit" name="b'.$d.'" value="b'.$d.'">';
					echo '</form>';
				}
			}
		}
	};

	for($c=0;$c<count($rows);$c++){
		if(isset($_GET['b'.$c.''])){
			echo ''.$rows[$c][title].'<br>';
			echo ''.$rows[$c][news].'<br>';
		}
	};
?>
