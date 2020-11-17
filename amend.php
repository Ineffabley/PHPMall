<!doctype html>

<html>

<head>

    <meta charset="UTF-8">

    <title>正在修改密码</title>

</head>

<body>

<?php

$con = mysqli_connect('localhost', 'root', 'root');

if(! $con )
{
    die('连接失败: ' . mysqli_error($con));
}

mysqli_select_db($con,'test');

$sql = "select username from user_info where username ='$_POST[signup_userName]' ";
$result = $con->query($sql);
$rows =mysqli_fetch_array($result);

if ($rows['username'] != $_POST[signup_userName] ) {
    echo "<script>alert(\"用户名不存在\"); window.location.href='re.html';</script>";
}else {
    $sql1 = "update username set password='$_POST[newpassword]' where username='$_POST[signup_userName]'";
    $result1 = $con->query($sql1);

    mysqli_close($con);
    echo "<script>alert(\"密码修改成功\"); window.location.href='index.html';</script>";
}

?>

</body>

</html>