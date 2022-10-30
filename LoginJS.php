
<?php 
	if(isset( $_POST['btnLogin']))
	{
		$us = $_POST['txtUsername'];
		$pa = $_POST['txtPass'];

		$_POST['name'] = 'asdasdsa';


		 

		$err = "";
		if($us=="")
		{
			$err .= "Enter Username, please</br>";

		}
		if($pa=="")
		{
			$err.="Enter Password, please</br>";
		}
		if($err !="")
		{
			echo $err;
		}
		else{
			include_once("connection.php");
			$pass = md5($pa);
			$res = pg_query($conn, "SELECT username, password, state FROM customer WHERE username='$us' AND password='$pass'")
            or die(pg_last_error($conn));
            $row = pg_fetch_array($res, NULL, PGSQL_ASSOC);
			if(pg_num_rows($res)==1)
			{
				$_SESSION["us"]=$us;
                 $_SESSION["admin"]= $row["state"];
                
				echo '<meta http-equiv="refresh" content="0;URL =?page=content"/>';
			}
			else{
			echo "You loged in fail";
			}
			
			
		}
	}
	?>
<script>
	
	function process()
	{
		n = document.getElementById("txtUsername");
		pass = document.getElementById("txtPass");
		if(us.value=="")
		{
			alert("Enter Username please");
			return false;
		}
		

	}
</script>
</script>

<form id="form1" name="form1" method="POST" action="" onsubmit="return process()">
<div class="row">
	<div class="container">
    <div class="humberger__menu__nav mobile-menu">

        <label for="txtUsername" class="col-sm-2 control-label">Username(*):  </label>
		<div class="col-sm-10">
		      <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value=""/>
		</div>
      </div>  
      
    <div class="form-group">
		<label for="txtPass" class="col-sm-2 control-label">Password(*):  </label>			
		<div class="col-sm-10">
		      	<input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" value=""/>
		</div>
	</div> 
	<div class="form-group">
		<div class="btn_login_cancel">	 
        	<div class="col-sm-2"></div>
        		<div class="col-sm-10">
        			<input type="submit" name="btnLogin"  class="site-btn" id="btnLogin" value="Login"/>
            		<input type="submit" name="btnCancel"  class="site-btn" id="btnLogin" value="Cancel"/>
				</div>  
			</div>
			</div>
	</div>
 </div>
    
</form>

   