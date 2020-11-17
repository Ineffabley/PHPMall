<?php

$con = mysqli_connect('localhost', 'root', 'root');
if(! $con )
{
    die('连接失败: ' . mysqli_error($con));
}

mysqli_select_db($con,'test');
$sql = "select username,password FROM user_info where username = '$_POST[login_userName]' and password='$_POST[login_passWord]'";
$result = $con->query($sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
$rows = mysqli_num_rows($result);
if($rows){
    $sql1 = "select enable from user_info where username = '$_POST[login_userName]' and password='$_POST[login_passWord]'" ;
    $result1 = $con->query($sql1);
    $row = mysqli_fetch_array($result1);
        if ($row['enable'] == 1) {
            echo "<script>alert(\"管理员登陆成功\");window.location.href='index2.php';</script>";
        } else {
            echo "<script>alert(\"登陆成功\");window.location.href='index.php';</script>";
        }
        exit();

}else{
    echo "用户名或密码错误";
    echo "
       <script>
           setTimeout(function(){window.location.href='login.html';},3000);
        </script>";
}

mysqli_close($con)

?>