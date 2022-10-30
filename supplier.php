
<!-- Hero Section Begin -->
<section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                            
                            
                        </div>
                        
                        <ul>
                        <li ><a  href="?page=pm">All</a></li>

                            <?php Category_List($conn ); ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                    
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0389 766 155</h5>
                                <span>Support 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

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
        <h1>Supplier Management</h1>
        <p>
        <i class="fa fa-plus"></i> <a href="?page=adds"> Add</a>
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Supplier Name</strong></th>
                     <th><strong>Supplier</strong></th>
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
                        pg_query($conn, "delete from supplier where supplier_id='$id'");
                    }
                         
                }

                $No = 1;
                $result = pg_query($conn, "select * from supplier");
                while ($row=pg_fetch_array($result, NULL, PGSQL_ASSOC))
                {
                ?>
			<tr>
                <td class="cotCheckBox"><?php echo $No; ?></td>
                <td><?php echo $row['supplier_name']?></td>
                <td><?php echo $row['supplier_address']?></td>
                <td style='text-align:center'><a href="?page=upc&&id=<?php echo $row['cat_id'];?>"><i class="fa fa-edit"></i></td>
                <td style='text-align:center'><a href="?page=cat&&function=del&&id=<?php echo $row['cat_id']; ?>"
                 onclick="return ConfirmDelete()"><i class="fa fa-close"></i></td>
            </tr>
            <?php
                $No++;
                }
                
                ?>
			</tbody>
        </table>  
        
        
        
 </form>