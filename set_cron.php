<?php
$yx = opendir('myToken');
while($isi=readdir($yx))
if($isi != '.' && $isi != '..'){ 
$token=$isi;

$stat= json_decode(auto('https://graph.facebook.com/me/home?fields=id,name,from,comments&limit=5&access_token='.$token),true);
for($i=1;$i<=count($stat[data]);$i++){ 
set_time_limit(0);

$name = json_decode(auto('https://graph.facebook.com/'.$stat[data][$i-1][from][id].'?fields=name&access_token='.$token),true);
$id = ''.$stat[data][$i-1][from][id].'';

$emoticon=$emo[rand(0,count($emo)-1)];

$text = array(
'Happy Independence Day in Advance
Admin - Mujahid Khan',
);

auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/reactions?type=LIKE&method=POST&access_token='.$token.'');
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/comments?message='.urlencode($text).'&attachment_url=http://graph.facebook.com/'.$stat[data][$i-1][from][id].'/picture?type=large&redirect=true&width=100&height=100&access_token='.$token.'&method=POST');
}
}
echo '<center>Refresh Done</center>';
function auto($url) {
$curl = curl_init();
curl_setopt($curl,
CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,
CURLOPT_URL, $url);
$ch = curl_exec($curl);
curl_close($curl); 
return $ch;
}

?>