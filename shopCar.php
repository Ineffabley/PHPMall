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
                <li class="active"><a href="index.php">首页</a></li>
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
                <tr>
                    <th><label><input class="check-all check" type="checkbox"/>&nbsp;全选</label></th>
                    <th>商品</th>
                    <th>单价</th>
                    <th>数量</th>
                    <th>小计</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                function product_query()
                {
                    global $conn;
                    $result=mysqli_query($conn,"select * from eshop_car");
                    while($myrow=mysqli_fetch_row($result)) {
                        $pid = $myrow[1];
                        $result1 = mysqli_query($conn, "select * from eshop_product where id=$pid");
                        while ($row=mysqli_fetch_row($result1)) {
                            $sum=$myrow[4];
                            ?>
                            <tr>
                                <td class="goods"><input class="check-one check" type="checkbox"/></td>
                                <td class="goods"><img src="<?php echo  $row[6]?>" alt=""/><span><?php echo  $row[1]?></span></td>
                                <td class="price"><?php echo  $row[3]?></td>
                                <td class="count">
                                    <span class="reduce">-</span>
                                    <input class="count-input" type="text" value="<?php echo $myrow[2] ?>"/>
                                    <span class="add">+</span></td>
                                <td class="subtotal"><?php echo$sum?></td>
                                <td class="operation"><span class="delete"><a href="delOne.php? id=<?php echo $myrow[0]?>">删除</a></span></td>
                            </tr>
                        <?php }
                    }
                    mysqli_free_result($result);

                }
                $conn=mysqli_connect("localhost","root","root","test")or die("连接数据库服务器失败".mysqli_error());
                mysqli_set_charset($conn,'utf8');
                product_query();
                mysqli_close($conn);
                ?>
                </tbody>
            </table>

            <div class="foot" id="foot">
                <label class="fl select-all"><input type="checkbox" class="check-all check"/>&nbsp;全选</label>
                <a class="fl delete" id="deleteAll" href="delAll.php">删除</a>
                <div class="fr closing"><a href="dingdan.php">结 算</a></div>
                <div class="fr total">合计：￥<span id="priceTotal"></span></div>
                <div class="fr selected" id="selected">已选商品
                    <span id="selectedTotal">0</span>件
                    <span class="arrow up">︽</span>
                    <span class="arrow down">︾</span>
                </div>
                <div class="selected-view">
                    <div id="selectedViewList" class="clearfix">
                        <!--<div><img src="images/1.jpg"><span>取消选择</span></div>-->
                    </div>
                    <span class="arrow">◆<span>◆</span></span>
                </div>
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
