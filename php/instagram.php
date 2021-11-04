<?php
$instagram = null;
$id = '17841447658902325'; 
$token = 'EAACmK5gwmZAsBAD6TK6ZAH8uHHb333HaXeMt75uaJ2dp93CUwZCCcqF5yPPtmNdlsyfYhuh7WBT2z1WgskTOHgQyeO86DnudwAQPIWOMyup4SptdDk7DnagNVtMZBYPIolDwVhD7oLeR5JYW9hDcySGgK7ZBvwEoZBJaZAOn1gM4pZCf12kp74vQWVjl9s29DD4ZD';
$count = '12';
$url = 'https://graph.facebook.com/v9.0/' . $id . '?fields=name,media.limit(' . $count. '){caption,media_url,thumbnail_url,permalink,like_count,comments_count,media_type}&access_token=' . $token;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
if($response){
  $instagram = json_decode($response);
  if(isset($instagram->error)){
      $instagram = null;
  }
}
foreach($instagram->media->data as $value){
if($value->media_type=='VIDEO'){
$src=$value->thumbnail_url;
$video = '<span class="video"></span>';
}
else{
$src=$value->media_url;
$video = "";
}
echo '<a href="'.$value->permalink.'" target="_blank"><img src="'.$src.'" alt="'.$value->caption.'" width="100%"></a>';
}
?>

