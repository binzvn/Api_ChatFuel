<?php 
$id  = $_GET['id'];
	$url = "https://graph.facebook.com/".$id."/picture?type=large&width=500&height=500";
	$check = "https://graph.facebook.com/".$id."/picture?type=large";
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
					'url' => $url
				)
			)
		),
	)
);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
    

    }else {
    echo '{
 "messages": [
   {"text": "[BOT] Sai UID hoặc Account đã bị khóa."} 
   ]
}';
    	
    }
?>
