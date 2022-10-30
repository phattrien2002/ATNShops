
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="ATNtoy/background.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Supplier Management</h2>
                        <div class="breadcrumb__option">
                            <a href="?page=content">Home</a>
                            <span>Supplier Management</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

	    
	<?php
		include_once("connection.php");
		if(isset($_POST['btnAdd']))
		{
			$id = $_POST['txtID'];
			$name = $_POST['txtName'];
			$address = $_POST['txtAddress'];
			
			$err = "";
			if($id=="")
			{
				$err .= "Enter Supplier ID</br>";
			}
			if($name=="")
			{
				$err .= "Enter Supplier name</br>";
			}
			if($address=="")
			{
				$err .= "Enter Supplier address</br>";
			}
			if($err != "")
			{
				echo $err;
			}
			else
			{
				$sql = "select * from supplier where supplier_id ='$id' and supplier_name = '$name'and supplier_address = '$address'";
				$re = pg_query($conn, $sql);
				if(pg_num_rows($re)=="0")
				{
					pg_query($conn, "insert into supplier (supplier_id, supplier_name, supplier_address) values ('$id', '$name','$address')");
					echo '<meta http-equiv="refresh" content="0;URL =?page=supplier"';
				}
				else
				{
					echo "Data duplicated";
				}
			}
		}
	?>

<div class="container">
	<h2>Adding Branch</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Supplier ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Supplier ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Supplier Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Supplier Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
					</div>
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Supplier Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Supplier Address" value='<?php echo isset($_POST["txtAddress"])?($_POST["txtAddress"]):"";?>'>
							</div>
					</div>
                    
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="site-btn" name="btnAdd" id="btnAdd" value="Add new"/>
                              <input type="button" class="site-btn" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=supplier'" />
                              	
						</div>
					</div>
				</form>
	</div>