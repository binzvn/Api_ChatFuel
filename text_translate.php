  <?php
$text=$_GET[text];
$lang=$_GET[lang];
$lang=strtolower($lang); 
//get API key from Yandex website
$key='trnsl.1.1.20191108T164508Z.222adc669804138d.bef05749bd1a4f807cea2e17ca22fe3bb2b9713c'; //thay key v么 膽芒y nha
//API url
$url='https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$key.'&text='. str_replace(" ", "%20", $text).'&lang='.$lang;
$jsondata=file_get_contents($url);
$dataJ = json_decode($jsondata);
$translateWord= $dataJ->text[0];
//output
echo '{
 "messages": [
   {"text": "Translation :\n '.$translateWord.'"} 
   ]
}';
?>
