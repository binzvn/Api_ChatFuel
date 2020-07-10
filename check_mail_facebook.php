<?php
header('Content-Type: text/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
$mail = $_GET['email'];
if(!empty($_GET['email'])){
function mt_random_float($min, $max) {
  $float_part = mt_rand(0, mt_getrandmax())/mt_getrandmax();
  $integer_part = mt_rand($min, $max - 1);
  return $integer_part + $float_part;
}
function checktrangthai($email){
  $data = file_get_contents('https://b-api.facebook.com/method/auth.login?access_token=237759909591655%25257C0f140aabedfb65ac27a739ed1a2263b1&format=json&sdk_version=2&email='.$email.'&locale=en_US&password='.mt_random_float(15, 50).'&sdk=ios&generate_session_cookies=1&sig=3f555f99fb6');
  if (strpos($data, 'The password you entered is incorrect') !== false) {
    $trangthai = '[BOT] Mail '.$email.' đã đăng ký Facebook';
  }
  else if (strpos($data, 'appear to belong to an account') !== false) {
    $trangthai = '[BOT] Mail '.$email.' chưa đăng ký Facebook.';
  }
  else if (strpos($data, 'You are trying too often') !== false) {
    $trangthai = '[BOT] Mail '.$email.' đã bị Facebook giới hạn.';
  }
$response = array(
	'messages' => array(
		'0' => array(
					'text' => $trangthai
		),
	)
);

    echo json_encode($response, \JSON_UNESCAPED_UNICODE);
}
checktrangthai($mail);
}
else {
  echo 'Đéo input mail thì check kiểu loz à?';
}
 ?>
