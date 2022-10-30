    <?php 
    
    session_start();
    session_unset();
    session_destroy();
    echo "<dis class = 'alert alert-success' role ='alert' >You have cleaned session!<?div>";

    header("Refresh: 2; URL = index.php");
?>