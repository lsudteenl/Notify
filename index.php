<?php
header('Content-Type: text/html; charset=utf-8');

define('LINE_API',"https://notify-api.line.me/api/notify");
$token = "uwUnnXn7E9svH04B8y4yoL22TMBf5RAGQIaFUX247rV"; //ใส่Token ที่copy เอาไว้
$str = (isset($_GET['test'])?$_GET['test']:''); //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
$stickerPkg = (isset($_GET['pkg'])?$_GET['pkg']:''); //stickerPackageId
$stickerId = (isset($_GET['id'])?$_GET['id']:''); //stickerId
 
$res = notify_message($str,$stickerPkg,$stickerId,$token);
print_r($res);
function notify_message($message,$stickerPkg,$stickerId,$token){
     $queryData = array(
      'message' => $message,
      'stickerPackageId'=>$stickerPkg,
      'stickerId'=>$stickerId
     );
     $queryData = http_build_query($queryData,'','&');
     $headerOptions = array(
         'http'=>array(
             'method'=>'POST',
             'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                 ."Authorization: Bearer ".$token."\r\n"
                       ."Content-Length: ".strlen($queryData)."\r\n",
             'content' => $queryData
         ),
     );
     $context = stream_context_create($headerOptions);
     $result = file_get_contents(LINE_API,FALSE,$context);
     $res = json_decode($result);
  return $res;
 }
 
/* $line_api = 'https://notify-api.line.me/api/notify';
$access_token = 'PQ3GIGAHp9V1WT9GV0oiZEXv2Byn1oUNGrvkOTyEB0F';

$str = (isset($_GET['msg'])?$_GET['msg']:'';    //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
$image_thumbnail_url = '';  // ขนาดสูงสุด 240×240px JPEG
$image_fullsize_url = '';  // ขนาดสูงสุด 1024×1024px JPEG
$sticker_package_id = '';  // Package ID ของสติกเกอร์
$sticker_id = '';    // ID ของสติกเกอร์

$message_data = array(
 'message' => $str,
 'imageThumbnail' => $image_thumbnail_url,
 'imageFullsize' => $image_fullsize_url,
 'stickerPackageId' => $sticker_package_id,
 'stickerId' => $sticker_id
);

$result = send_notify_message($line_api, $access_token, $message_data);
print_r($result);

function send_notify_message($line_api, $access_token, $message_data)
{
 $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$access_token );

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $line_api);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $result = curl_exec($ch);
 // Check Error
 if(curl_error($ch))
 {
  $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) ); 
 }
 else
 {
  $return_array = json_decode($result, true);
 }
 curl_close($ch);
 return $return_array;
} */

?>
