<?php
error_reporting(0);
header('Content-type:text/html;charset=utf-8');
$conn = new MySQLi("localhost","root","root","test");
//判断是否连接成功
mysqli_set_charset($conn,'utf8');
mysqli_connect_error()?die("连接失败"):"";
if(!empty($_GET['name'])){
    $id=$_GET['id'];
    $name=$_GET['name'];
    $lb=$_GET['lb'];
    $oldprice=$_GET['oldprice'];
    $newprice=$_GET['newprice'];
    $ms=$_GET['ms'];
    $sql = "update eshop_product set Name = '".$name."', lb = '".$lb."',oldprice = '".$oldprice."', newprice = '".$newprice."', ms = '".$ms."' where Id = '".$id."'";
    $result = mysqli_query($conn,$sql);//执行更新语句
    if($result){
        mysqli_close($conn);
        echo "<script>alert('修改成功！')</script>";
        echo"<script type=\"text/javascript\">
  window.location.href=\"shangpin.php\"          
</script>";
    }else{
        echo "ERROR".$sql."<br>".$conn->error;
        mysqli_free_result($result);
        mysqli_close($conn);
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

    <title>商品</title>

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
                <tr>
                    <th>商品</th>
                    <th>类别</th>
                    <th>原价</th>
                    <th>新价</th>
                    <th>描述</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                function product_query()
                {
                    $id=$_GET['id'];
                    global $conn;
                    $result = mysqli_query($conn, "select * from eshop_product where id=  '".$id."' ");
                    while ($row=mysqli_fetch_row($result)) {
                        ?>
                        <form method="get" action="">
                        <tr>
                            <td class="goods"><img src="<?php echo  $row[6]?>" alt=""/><span><input type="text" name="name" value="<?php echo  $row[1]?>"></span></td>
                            <td class="price"><input type="text" name="lb" value="<?php echo  $row[2]?>"></td>
                            <td class="count"><input type="text" name="oldprice" value="<?php echo  $row[3]?>"></td>
                            <td class="count"><input type="text" name="newprice" value="<?php echo  $row[4]?>"></td>
                            <td class="count"><input type="text" name="ms" value="<?php echo  $row[5]?>"></td>
                            <input type="hidden" name="id" value="<?php echo  $row[0]?>">
                            <td class="operation">
                                <span ><input type="submit" value="更改"></span>
                            </td>
                        </tr>
                        </form>
                    <?php }

                    mysqli_free_result($result);

                }
                $conn=mysqli_connect("localhost","root","root","test")or die("连接数据库服务器失败".mysqli_error());
                mysqli_set_charset($conn,'utf8');
                product_query();
                mysqli_close($conn);
                ?>
                </tbody>
            </table>
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
