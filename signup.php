<?php
$con = mysqli_connect('localhost', 'root', 'root');
if(! $con )
{
    die('连接失败: ' . mysqli_error($con));
}

mysqli_select_db($con,'test');
$sql = "select username FROM user_info where username = '$_POST[signup_userName]' ";
$result = mysqli_query($con,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
$rows=mysqli_num_rows($result);
if($rows){
    echo "<script>alert(\"手机号已注册\");window.location.href='signup.html';</script>";
    exit;
}else{
    $sql=" INSERT INTO user_info (username, password, email) VALUES('$_POST[signup_userName]','$_POST[signup_passWord]','$_POST[signup_passWord]') ";
    mysqli_query($con,$sql);
    echo "<script>alert(\"注册成功，请登录！\");window.location.href='index.html';</script>";
}
mysqli_close($con)

?>