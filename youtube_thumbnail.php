<?php 
$url  = $_GET['url'];
 $value = explode("v=", $url);
    $videoId = $value[1];
	$images = "https://i4.ytimg.com/vi/".$videoId."/maxresdefault.jpg";
	$check = "https://i4.ytimg.com/vi/".$videoId."/maxresdefault.jpg";
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$check);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$data = curl_exec($ch);
	curl_close($ch);
	$result = json_decode($data,true);
    if(!isset($result['error']))
    {
    	
$result = array(
	'messages' => array(
		'0' => array(
			'attachment' => array(
				'type' => 'image',
				'payload' => array(
					'url' => $images
				)
			)
		),
	)
);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
    
    }else {
    echo '{
 "messages": [
   {"text": "[BOT] Video chưa được thêm Thumbnail."} 
   ]
}';
    }
?>
