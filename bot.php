<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
ini_set('error_logs','off');
error_reporting(0);
ob_start();
define('API_KEY','1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA'); //=> توکن
function Source_Home($method,$datas=[]){
$url = 'https://api.telegram.org/bot'.API_KEY.'/'.$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
//*******************************************************
function SendMessage($chat_id,$text,$mode,$reply = null,$keyboard = null){
Source_Home('SendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>$mode,
'reply_to_message_id'=>$reply,
'reply_markup'=>$keyboard
]);
}
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
Source_Home('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
}
function Forward($berekoja,$azchejaei,$kodompayam)
{
Source_Home('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
function GetChatMember($chatid,$userid){
	$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
$tch = $truechannel->result->status;
return $tch;
}
//*********************************************************
$dev = array("710732845","710732845","710732845"); //ایدی عددی ادمین ها
$token = API_KEY; // دست نزن
//**********************[متغیر]***********************************
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$text = $message->text;
$textt = $message->text;
$from_id = $message->from->id;
$fromid = $update->callback_query->from->id;
$chat_id = $message->chat->id;
$chatid = $update->callback_query->message->chat->id;
$message_id = $message->message_id;
$messageid = $update->callback_query->message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$first = $update->callback_query->from->first_name;
$username = $message->from->username;
$tc = $update->message->chat->type;
$data = $update->callback_query->data;
$reply = $message->reply_to_message->forward_from->id;
$reply_id = $message->reply_to_message->from->id;
mkdir("data/$from_id");
mkdir("Source_Home/$from_id");
//***************************************************************
@$user = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
@$step = $user['step'];
@$coin = $user["coin"];
@$invite = $user["invite"];
$forchannel =Source_Home('getChatMember',['chat_id'=>"@$channel",'user_id'=>$from_id]) ; 
$tch = $forchannel->result->status;
$member = file_get_contents("data/members.txt");
$remove = json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]);
//*****************************************************************
@$zrb = json_decode(file_get_contents("Source_Home/$from_id/zarb.json"),true);
$zrb2 = $zrb["zrb"];
$zrb3 = $zrb["zrb2"];
//==================================================
@$tfrig = json_decode(file_get_contents("Source_Home/$from_id/tafrig.json"),true);
$tfrig2 = $tfrig["tfrig"];
$tfrig3 = $tfrig["tfrig2"];
//==================================================
if($text == "/start"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
Source_Home('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سلام خوش امدی عزیزم",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ضرب"],['text'=>"تفریق"]],
[['text'=>"/start"]],
]
])
 ]); 
}

elseif($text == "ضرب"){
$user["step"] = "zarb";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
Source_Home('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عدد را ارسال کنید :",
 ]); 
}
elseif($step == "zarb"){
$user['step'] = "zarb2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$zrb['zrb'] = "$text";
$outjson = json_encode($zrb,true);
file_put_contents("Source_Home/$from_id/zarb.json",$outjson);
Source_Home('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب عدد رو ضرب چند کنم ؟",
]);
}
elseif($step == "zarb2"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$zrb['zrb2'] = "$text";
$outjson = json_encode($zrb,true);
file_put_contents("Source_Home/$from_id/zarb.json",$outjson);
Source_Home('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عدد شما حاضر است !!",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"دریافت حاصل ضرب"]],
[['text'=>"/start"]],
]
])
]);    
}
elseif($text == "دریافت حاصل ضرب"){
$zrb4 = $zrb2 * $zrb3;
Source_Home('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$zrb2 × $zrb3 = $zrb4",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ضرب"],['text'=>"تفریق"]],
[['text'=>"/start"]],
]
])
 ]); 
}

elseif($text == "تفریق"){
$user["step"] = "tfrig";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
Source_Home('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عدد را ارسال کنید :",
 ]); 
}
elseif($step == "tfrig"){
$user['step'] = "tfrig2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$tfrig['tfrig'] = "$text";
$outjson = json_encode($tfrig,true);
file_put_contents("Source_Home/$from_id/tafrig.json",$outjson);
Source_Home('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عدد رو [ تفریق ] چند کنم ؟",
]);
}
elseif($step == "tfrig2"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$tfrig['tfrig2'] = "$text";
$outjson = json_encode($tfrig,true);
file_put_contents("Source_Home/$from_id/tafrig.json",$outjson);
Source_Home('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عدد شما حاضر است !!",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"دریافت حاصل تفریق"]],
]
])
]);    
}
elseif($text == "دریافت حاصل تفریق"){
$tafrig4 = $tfrig2 / $tfrig3;
Source_Home('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$tfrig2 ÷ $tfrig3 = $tafrig4",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ضرب"],['text'=>"تفریق"]],
[['text'=>"/start"]],
]
])
 ]); 
}
//************************************************
if($text == "/panel"){
if (in_array($from_id , $dev)){
Source_Home('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پنل مدیریت",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"آمار"],['text'=>"پیام همگانی"]],
[['text'=>"فروارد همگانی"]],
]
])
]);    
}
}
elseif($text == "آمار" && in_array($from_id , $dev)){
$dex = file_get_contents("data/members.txt");
$dexx = explode("\n",$dex);
$mem = count($dexx)-1;
 Source_Home('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
تعداد اعضا ربات شما : $mem
"
]);   
}
elseif($text == "پیام همگانی" &&  in_array($from_id , $dev)){
$user['step'] = "pmtoall";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
Source_Home('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما"
]);
}
elseif($step == "pmtoall"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
Source_Home('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ارسال شد️",
]);
$memh = fopen("data/members.txt",'r');
while(!feof($memh)){
$memuser = fgets($memh);
Source_Home('SendMessage',[
'chat_id'=>$memuser,
'text'=>$text
]);
}
}
elseif($text == "فروارد همگانی" &&  in_array($from_id , $dev)){
$user['step'] = "fwdtoall";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
Source_Home('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پیامتو فور بزن برام"
]);
}
elseif($step == "fwdtoall"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$mem = file_get_contents("data/members.txt");
$memer = explode("\n",$mem); 
for ($i=0;$i<=count($memer)-1;$i++){ 
$koja = $memer["$i"];
Source_Home('ForwardMessage',[
'chat_id'=>$koja,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id]);
}
Source_Home('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"فروارد شد️",
]);
}
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
