

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="ATNtoy/background.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Supplier Management</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Supplier Management</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
<!-- Bootstrap --> 
<form name="frm" method="post" action="">
        <h2>Supplier</h2>
        <p>
        <i class="fa fa-plus"></i> <a href="?page=addSupp"> Add</a>
        </p>
        <table id="tablesupplier" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Suppliers Name</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
                include_once("connection.php");
                if(isset($_GET["function"])=="del")
                {
                    if(isset($_GET["id"]))
                    {
                       $id = $_GET["id"];
                        pg_query($conn, "delete from supplier where supplierid='$id'");
                    }
                         
                }

                $No = 1;
                $result = pg_query($conn, "select * from supplier");
                while ($row=pg_fetch_array($result, NULL, PGSQL_ASSOC))
                {
                ?>
			<tr>
                <td class="cotCheckBox"><?php echo $No; ?></td>
                <td><?php echo $row['suppliername']?></td>
                <td style='text-align:center'><a href="?page=updateSupp&&id=<?php echo $row['supplierid'];?>"><i class="fa fa-edit"></i></td>
                <td style='text-align:center'><a href="?page=branch&&function=del&&id=<?php echo $row['supplierid']; ?>"
                 onclick="return ConfirmDelete()"><i class="fa fa-close"></i></td>
            </tr>
            <?php
                $No++;
                }
                
                ?>
			</tbody>
        </table>   
 </form>

