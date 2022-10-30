<?php
if (isset($_SESSION['user_id']) == false) {
	header("Refresh: 1; URL= LoginJS.php");
}else {
    header("URL= index.php");
}
?>