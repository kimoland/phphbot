<?php
ob_start();
define('API_KEY','1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA');

#DevAmirH
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
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
//============== End Source ================
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
    bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>$text,
        'parse_mode'=>$parsmde,
        'disable_web_page_preview'=>$disable_web_page_preview,
        'reply_markup'=>$keyboard
    ]);
}
function sendVideo ($chat_id,$video,$caption,$keyboard){
    bot('sendVideo',array(
        'chat_id'=>$chat_id,
        'video'=>$video,
        'caption'=>$caption,
        'reply_markup'=>$keyboard
    ));
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG
    ]);
}
function SendPhoto($chatid,$photo,$keyboard,$caption){
  bot('SendPhoto',[
  'chat_id'=>$chatid,
  'photo'=>$photo,
  'caption'=>$caption,
  'reply_markup'=>$keyboard
  ]);
  }
//======= متغییر ها =======\\
if(!is_dir("data/$from_id")){
mkdir("data/$from_id");
}
$update = json_decode(file_get_contents('php://input'));
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$text = $update->message->text;
$step = file_get_contents("data/$from_id/step.txt");
$ADMIN = "123456789";
//============
$sudo = json_encode(['keyboard'=>[
[['text'=>"امار"]],
[['text'=>"ارسال همگانی"],['text'=>"فروارد همگانی"]],
[['text'=>"برگشت"]],
],'resize_keyboard'=>true]);
//============
if($text == "/start"){
if (!file_exists("data/$from_id/step.txt")) {
        mkdir("data/$from_id");
        file_put_contents("data/$from_id/step.txt","none");
        $myfile2 = fopen("Member.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    }
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"سلام دوست عزیز
 به ربات اینستا دانلودر خوش اومدی :)
از دکمه های زیر استفاده کن !
",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"دانلود عکس"],['text'=>"دانلود فیلم"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($text == "دانلود عکس"){
file_put_contents("data/$from_id/step.txt","c1");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا لینک عکس خود را ارسال کنید",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($step == "c1"){
file_put_contents("data/$from_id/step.txt","none");
bot('SendPhoto',[
'chat_id'=>$chat_id,
'photo'=>"$text",
'caption'=>"Done !",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($text == "دانلود فیلم"){
file_put_contents("data/$from_id/step.txt","c2");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا لینک فیلم خود را ارسال کنید",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($step == "c2"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendVideo',[
'chat_id'=>$chat_id,
'video'=>"$text",
'caption'=>"Done !",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"برگشت"]],
],
'resize_keyboard'=>true
])
]);
}
elseif($text == "برگشت"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"به منوی قبلی برگشتید :",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"دانلود عکس"],['text'=>"دانلود فیلم"]],
],
'resize_keyboard'=>true
])
]);
}
//panel admin
elseif($text == "/panel" && $chat_id == $ADMIN){
SendMessage($chat_id,"Hi My Admin :","MarkDown","true",$sudo);
} 

elseif($text == "امار" && $from_id == $ADMIN){
    $user = file_get_contents("Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	sendmessage($chat_id , " آمار کاربران : $member_count" , "html");
}
elseif($text == "ارسال همگانی" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/step.txt","send");
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام مورد نظر رو در قالب متن بفرستید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'/panel']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($step == "send" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/step.txt","no");
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام همگانی فرستاده شد.",
  ]);
	$all_member = fopen( "Member.txt", "r");
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			SendMessage($user,$text,"html");
		}
}
elseif($text == "فروارد همگانی" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/step.txt","fwd");
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"پیام خودتون را فروراد کنید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'/panel']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($step == "fwd" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/step.txt","no");
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"درحال فروارد",
  ]);
$forp = fopen( "Member.txt", 'r'); 
while( !feof( $forp)) { 
$fakar = fgets( $forp); 
Forward($fakar, $chat_id,$message_id); 
  } 
   bot('sendMessage',[ 
   'chat_id'=>$chat_id, 
   'text'=>"با موفقیت فروارد شد.", 
   ]);
}
?>
