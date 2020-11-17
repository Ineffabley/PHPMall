<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>购物车</title>

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
    <link rel="stylesheet" href="css/style1.css"/>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">

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
                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
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
                <li class="active"><a href="index1.php">首页</a></li>
                <li><a href="dizi.php">电子商品</a></li>
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
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <table id="cartTable">
                <thead>
                <tr style="color: #66afe9">
                    <th >姓名</th>
                    <th>地址</th>
                    <th>电话</th>
                    <th>金额</th>
                    <th>支付方式</th>
                    <th>定单状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                error_reporting(0);
                function product_query()
                {
                        global $conn;
                        $result1 = mysqli_query($conn, "select * from dingdan");
                        while ($row=mysqli_fetch_row($result1)) {
                            ?>
                            <tr>
                                <td class="goods"><?php echo  $row[1]?></td>
                                <td class="goods"><?php echo  $row[3]?></td>
                                <td class="goods"><?php echo  $row[4]?></td>
                                <td class="goods"><?php echo $row[6]?></td>
                                <td class="goods">  <?php echo $row[7]?></td>
                                <td class="subtotal">  <?php echo $row[8]?></td>
                                <td class="operation"><span class="delete"><a href="finish.php? id=<?php echo $row[0]?>"><strong>订单完成</strong></a></span></td>
                            </tr>
                        <?php }
                    }
                    mysqli_free_result($result);
                $conn=mysqli_connect("localhost","root","123456","user_info")or die("连接数据库服务器失败".mysqli_error());
                mysqli_set_charset($conn,'utf8');
                product_query();
                mysqli_close($conn);
                ?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->




<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
