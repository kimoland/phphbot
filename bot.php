

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

?>
