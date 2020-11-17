<?php
error_reporting(0);
header('Content-type:text/html;charset=utf-8');
$conn = new MySQLi("localhost","root","root","test");
//判断是否连接成功
mysqli_set_charset($conn,'utf8');
mysqli_connect_error()?die("连接失败"):"";
if(!empty($_GET['name'])){
    $name=$_GET['name'];
    $email=$_GET['email'];
    $address=$_GET['address'];
    $tel=$_GET['tel'];
    $ddbz=$_GET['ddbz'];
    $sum=$_GET['total'];
    $zffs=$_GET['payment'];
    $sql = "insert into dingdan (name,email,address,tel,ddbz,sum,zffs,ddzt) values('{$name}','{$email}','{$address}','{$tel}','{$ddbz}','{$sum}','{$zffs}','未完成')";
    if($conn->query($sql)==TRUE)
    {
        echo "<script>alert('添加成功！')</script>";
        echo"<script type=\"text/javascript\">
  window.location.href=\"index.php\"          
</script>";
    }
    else{
        echo "ERROR".$sql."<br>".$conn->error;
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>订单</title>

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
            <form action="" method="get">
            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">订单地址</h3>
                    </div>

                    <div class="form-group">
                        <input class="input" type="text" name="name" placeholder="姓名">
                    </div>
                    <div class="form-group">
                        <input class="input" type="email" name="email" placeholder="邮箱">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="address" placeholder="地址">
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="tel" placeholder="电话">
                    </div>
                    <div class="order-notes">
                        <textarea class="input" placeholder="订单备注" name="ddbz"></textarea>
                    </div>
                </div>
                <!-- /Billing Details -->

            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">你的定单</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>产品</strong></div>
                        <div><strong>总价</strong></div>
                    </div>
                    <?php
                    function product1_query()
                    {
                        global $conn;
                        $result=mysqli_query($conn,"select * from eshop_car");
                        while($myrow=mysqli_fetch_row($result)) {
                            $pid = $myrow[1];
                            $result1 = mysqli_query($conn, "select * from eshop_product where id=$pid");
                            while ($row=mysqli_fetch_row($result1)) {
                                ?>
                                <div class="order-products">
                                    <div class="order-col">
                                        <div><?php echo $row[1]?></div>
                                        <div><?php echo $myrow[4]?></div>
                                    </div>
                                </div>
                            <?php }
                        }
                        mysqli_free_result($result);
                    }
                    $conn=mysqli_connect("localhost","root","123456","user_info")or die("连接数据库服务器失败".mysqli_error());
                    mysqli_set_charset($conn,'utf8');
                    product1_query();
                    mysqli_close($conn);
                    ?>

                    <div class="order-col">
                        <div>运费</div>
                        <div>免费</div>
                    </div>
                    <div class="order-col">
                        <div><strong>总计</strong></div>
                        <?php
                        function product_query()
                        {
                            $total=0;
                            global $conn;
                            $result=mysqli_query($conn,"select * from eshop_car");
                            while($myrow=mysqli_fetch_row($result)) {
                                $total+=$myrow[4];
                            }
                            ?>
                            <div><strong class="order-total"><input type="hidden" name="total" value="<?php echo $total?>"><?php echo $total?></strong></div>
                        <?php
                            mysqli_free_result($result);
                        }
                        $conn=mysqli_connect("localhost","root","123456","user_info")or die("连接数据库服务器失败".mysqli_error());
                        mysqli_set_charset($conn,'utf8');
                        product_query();
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-1" value="现金支付">
                        <label for="payment-1">
                            <span></span>
                            现金支付
                        </label>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2" value="微信支付">
                        <label for="payment-2">
                            <span></span>
                            微信支付
                        </label>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-3" value="支付宝">
                        <label for="payment-3">
                            <span></span>
                            支付宝支付
                        </label>
                    </div>
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        我已阅读并接受 <a href="#">条款和条件</a>
                    </label>
                </div>
                <input type="submit" class="primary-btn order-submit" style="width: 420px" value="提交订单">

            </div>
                    </form>
            <!-- /Order Details -->
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
