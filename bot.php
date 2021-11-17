<?php 

ob_start();
$API_KEY = '1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA';//توکن 
$ADMIN = 710732845;// ایدی عددی ادمین
##------------------------------##
define('API_KEY',$API_KEY);
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
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
	function Forward($KojaShe,$AzKoja,$KodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG
    ]);
}
	function save($filename,$TXTdata)
{
    $myfile = fopen($filename, "w") or die("Unable to open file!");
    fwrite($myfile, "$TXTdata");
    fclose($myfile);
}
//========================================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$step = file_get_contents("data/".$from_id."/step.txt");
$mtn = file_get_contents("data/".$from_id."/mtn.txt");
//==========================================//
elseif($text == "/panel" && $from_id == $ADMIN){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"ادمین عزیز به پنل مدیریتی ربات خودش امدید",
                'parse_mode'=>'html',
      'reply_markup'=>json_encode([
            'keyboard'=>[
              [
              ['text'=>"آمار"],['text'=>"پیام همگانی"]
              ],
              ],'resize_keyboard'=>true
        ])
            ]);
        }
elseif($text == "آمار" && $from_id == $ADMIN){
	sendaction($chat_id,'typing');
    $user = file_get_contents("data/users.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	sendmessage($chat_id , " آمار کاربران : $member_count" , "html");
}
elseif($text == "پیام همگانی" && $from_id == $ADMIN){
    save("data/$from_id/step.txt","bc");
	sendaction($chat_id,'typing');
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
elseif($step == "bc" && $from_id == $ADMIN){
    save("data/$from_id/step.txt","no");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام همگانی فرستاده شد.",
  ]);
	$all_member = fopen( "data/users.txt", "r");
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			SendMessage($user,$text,"html");
		}
}
//==========================================//
elseif($text == '/setname'){
    save("data/$from_id/step.txt","step");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"خوب دوست عزیز دوست داری اسم فایل ها را به چی تغییر بدم😅
راستی فرمت فایل یادتون نره های 
فرمت به اینا میگن :  
apk,mp3,mp4,ogg و  ........
مثلا
tikapp.apk",
  ]);
}
elseif($step == "step"){
    save("data/$from_id/step.txt","create bot13");
    save("data/$from_id/mtn.txt",$text);
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"خوب حله. \n حالا هرچی فایل بفرستی من تغییرش میدم به اسمی که گفتی",
  ]);
}
elseif(isset($message->document)){
$document = $message->document;
$file = $document->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents("$mtn",file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
sendaction($chat_id,'typing');
		bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"خوب کمی صبر کنید الان براتون فایلتون را میفرستم😊",
  ]);
sendaction($chat_id,'upload_document');
bot('senddocument',[
    'chat_id'=>$chat_id,
    'document'=>new CURLFile("$mtn"),
  ]);
}
?>
