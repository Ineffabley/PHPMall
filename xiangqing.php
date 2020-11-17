<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>电子商品-荔枝转卖</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>lizhi@163.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i>北二环东路17号</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-user-o"></i>我的账户</a></li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">所有类别</option>
                                <option value="1">生活用品</option>
                                <option value="1">电子器材</option>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">查找</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">

                        <!-- Cart -->
                        <div class="dropdown">
                            <a  href="shopCar.php">
                                <i class="fa fa-shopping-cart"></i>
                                <span><a href="shopCar.php">购物车</a></span>
                            </a>
                        </div>
                        <!-- /Cart -->

                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li><a href="index.php">首页</a></li>
                <li class="active"><a href="dizi.php">电子商品</a></li>
                <li><a href="shenghuo.php">生活用品</a></li>
                <li><a href="xuexi.php">学习用品</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<!-- SECTION -->
<!-- SECTION -->
<?php
function product_query()
{
global $conn;
$id=$_GET['id'];
$result=mysqli_query($conn,"select * from eshop_product where id='".$id."'");
while($myrow=mysqli_fetch_row($result)){?>
    <div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="<?php echo $myrow[6]?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="<?php echo $myrow[6]?>" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="<?php echo $myrow[6]?>" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="<?php echo $myrow[6]?>" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="<?php echo $myrow[6]?>" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="<?php echo $myrow[6]?>" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="<?php echo $myrow[6]?>" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="<?php echo $myrow[6]?>" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?php echo $myrow[1]?></h2>
                    <div>
                        <h3 class="product-price"><?php echo $myrow[3]?><del class="product-old-price"><?php echo $myrow[4]?></del></h3>
                        <span class="product-available">待售</span>
                    </div>
                    <p><?php echo $myrow[5]?></p>
                    <div class="add-to-cart" align="center">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="addCart.php? id=<?php echo $myrow[0]?>"> 添加到购物车</a></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php }

}

    $conn=mysqli_connect("localhost","root","123456","user_info")or die("连接数据库服务器失败".mysqli_error());
mysqli_set_charset($conn,'utf8');
product_query();
mysqli_close($conn);
?>

<!-- /SECTION -->

<!-- /FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">关于我们</h3>
                        <p>荔枝转卖，致力于同城大学生二手闲置物品寄售</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>北二环东路17号</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>lizhi@163.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">分类</h3>
                        <ul class="footer-links">
                            <li><a href="#">最新售卖</a></li>
                            <li><a href="#">电子用品</a></li>
                            <li><a href="#">生活用品</a></li>
                            <li><a href="#">学习用品</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">信息</h3>
                        <ul class="footer-links">
                            <li><a href="#">关于我们</a></li>
                            <li><a href="#">联系我们</a></li>
                            <li><a href="#">隐私政策</a></li>
                            <li><a href="#">订单和退货</a></li>
                            <li><a href="#">条款和条件</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">服务</h3>
                        <ul class="footer-links">
                            <li><a href="#">我的账户</a></li>
                            <li><a href="#">查看购物车</a></li>
                            <li><a href="#">心愿单</a></li>
                            <li><a href="#">追踪订单</a></li>
                            <li><a href="#">帮助</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>