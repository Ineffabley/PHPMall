<?php
$id=$_GET['id'];
//echo "<script>alert($id)</script>";
if(!empty($_GET))
{
    $conn = new MySQLi("localhost","root","root","test");
//判断是否连接成功
//    mysqli_query($conn,"set names utf-8");
    mysqli_set_charset($conn,'utf8');
    mysqli_connect_error()?die("连接失败"):"";

  $result = mysqli_query($conn,"select * from eshop_car where id = $id");
  if ($myrow= mysqli_fetch_row($result)){
        $cid=$myrow[0];
        $NUM=$myrow[2]+1;
        $total=$NUM*$myrow[3];
        //echo $NUM,$total;
        $sql = "update  eshop_car set num = '".$NUM."', total = '".$total."' where Id = '".$cid."'";
        $result = mysqli_query($conn,$sql);//执行更新语句
        if($result) {
            mysqli_close($conn);
            echo "<script>alert('添加成功！')</script>";
            echo"<script type=\"text/javascript\">

  window.location.href=\"index.php\"          

</script>";
        }
    }else{
        $result1=mysqli_query($conn,"select * from eshop_product where id= $id");
        $myrow1=mysqli_fetch_row($result1);
        $price=$myrow1[3];
        $sql = "insert into eshop_car (productid,num ,price,total) values('{$id}','1','{$price}','{$price}')";
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


}
?>