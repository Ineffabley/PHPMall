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
    $result=mysqli_query($conn,"update dingdan set ddzt='完成' where id = $id");
        if($result) {
            mysqli_close($conn);
            echo "<script>alert('修改订单成功！')</script>";
            echo "<script type=\"text/javascript\">
  window.location.href=\"checkPay.php\"          
</script>";
        }

        else{
            echo "ERROR".$sql."<br>".$conn->error;
        }
}
?>