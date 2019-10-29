<?php  

include 'config.php';
header('Content-Type:application/json');
$username = $_POST['username'];
$pwd = $_POST["password"];

$result = findAll("SELECT * FROM wc_admin WHERE username='{$username}'");


if(empty($result)) {
	exit(json_encode(['status' => 0, 'msg' => '用户不存在']));
}

if($result[0]["password"] != md5($pwd)) {
	exit(json_encode(['status' => 0, 'msg' => '密码不正确']));
}
setcookie('username',$username);
exit(json_encode(['status' => 1, 'msg' => '登陆成功']));


