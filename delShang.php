<?php
$id=$_GET['id'];
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
$conn = new MySQLi("localhost","root","root","test");
$sqlstr1 = "delete from eshop_product where id =  '".$id."'";		//定义删除语句
$result = mysqli_query($conn,$sqlstr1);				//执行删除操作
if ($result){
    echo "<script>alert('删除成功');location='shangpin.php';</script>";
}else{
    echo "删除失败";
}
?>