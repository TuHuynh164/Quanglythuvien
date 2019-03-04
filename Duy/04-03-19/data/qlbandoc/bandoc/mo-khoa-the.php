<?php
	include "../../data.php";
    include "../../function.php";
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    $dt = new database();
    
    if(isset($_POST['control'])){
        $control = $_POST['control'];
        if($control==0){
        	$dt->command('UPDATE `the_thanh_vien` SET `Trang_thai` = 1 WHERE `the_thanh_vien`.`So_the` = '.$id);
        	$control=1;
        	echo $control;
   		}
   		else{
   			$dt->command('UPDATE `the_thanh_vien` SET `Trang_thai` = 0 WHERE `the_thanh_vien`.`So_the` = '.$id);
   			$control=0;
   			echo $control;
   		}
    }
    // echo $id;
?>