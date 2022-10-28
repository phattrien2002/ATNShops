

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
                        <?php Department($conn ); ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                
                                <input type="text" placeholder="What do you need?">
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
                        <h2>ATN Shops</h2>
                        <div class="breadcrumb__option">
                            <a href="?page=content">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                            
                            <?php Department($conn ); ?>
                                
                            </ul>
                        </div>
                        
                        
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>New Products</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                            <?php 
                             if(isset($_GET['id'])){
                                $id=$_GET['id'];
                                $re = pg_query($conn,"SELECT product.product_id, product.product_name, product.price, product.pro_qty, product.pro_image, category.cat_name 
                                from product, category where product.cat_id = category.cat_id and '$id'=category.cat_id ");
                                
        
                            }
                            else{

                                $re = pg_query($conn,"SELECT product_id, product_name, price, pro_qty, pro_image, cat_name from product a, category b 
                                where a.cat_id = b.cat_id order by price desc");
                            }
                                $number=1;

                                while($row=pg_fetch_array($re, NULL, PGSQL_ASSOC)) { 
                                if($number<11){
                                ?>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="ATNtoy/<?php echo $row['pro_image'] ?>">
                                            
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="?page=shop-details&&id=<?php echo  $row['product_id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span> </span>
                                            <h5><a href="?page=shop-details&&id=<?php echo  $row['product_id'] ?>"><?php echo $row["product_name"] ?></a></h5>
                                            <div class="product__item__price"><?php echo $row["price"]  ?>$ </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php 
                                $number++;
                            } ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0"> </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>21</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php 
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $re = pg_query($conn,"SELECT product.product_id, product.product_name, product.price, product.pro_qty, product.pro_image, category.cat_name 
                            from product, category where product.cat_id = category.cat_id and '$id'=category.cat_id ");
                        
                        }
                        else{

                            $re = pg_query($conn,"SELECT product_id, product_name, price, pro_qty, pro_image, cat_name  from product a, category b  
                            where a.cat_id = b.cat_id order by cat_name desc");
                        }
                        
                    while($row=pg_fetch_array($re, NULL, PGSQL_ASSOC)) { 
                        
                    ?>
                    

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="ATNtoy/<?php echo $row['pro_image'] ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="?page=shop-details&&id=<?php echo  $row['product_id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="?page=shop-details&&id=<?php echo  $row['product_id'] ?>"><?php echo $row["product_name"] ?></a></h6>
                                    <h5><?php echo $row["price"] ?>$</h5>
                                </div>
                            </div>
                        </div>
                            <?php } ?>
                         
                        
                        
                        
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

   