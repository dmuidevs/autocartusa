<?php
/**
 * Template Name: contactDetails
  */
?>

<?php
	echo "nothing found";
	$makename = $_REQUEST['hiddenmakename'];

	$updatedMakeName=str_replace($makename, "-", "");

	echo $updatedMakeName;
	echo $makename;


?>