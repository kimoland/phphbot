<?php
/*
---------
ADMIN=> @Amirhossein_Taypram
---------
*/
ob_start();
define('API_KEY','1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA');//توکن را وارد کنید
$token = API_KEY;
$admin =  "710732845";//ایدی عددی خود را وارد کنید
$GetINFObot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getMe"));
$UserNameBot = $GetINFObot->result->username;
$NameBot = $GetINFObot->result->first_name;
function save($filename,$TXTdata){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
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
function sendAction($chat_id, $action){
bot('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action]);
}
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}
		function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }
function ForwardMessage($chatid,$from_chat,$message_id){
	bot('ForwardMessage',[
	'chat_id'=>$chatid,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
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
function SendAudio($chatid,$audio,$keyboard,$caption,$sazande,$title){
	bot('SendAudio',[
	'chat_id'=>$chatid,
	'audio'=>$audio,
	'caption'=>$caption,
	'performer'=>$sazande,
	'title'=>$title,
	'reply_markup'=>$keyboard
	]);
	}
function SendDocument($chatid,$document,$keyboard,$caption){
	bot('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
function SendSticker($chatid,$sticker,$keyboard){
	bot('SendSticker',[
	'chat_id'=>$chatid,
	'sticker'=>$sticker,
	'reply_markup'=>$keyboard
	]);
	}
function SendVideo($chatid,$video,$keyboard,$duration){
	bot('SendVideo',[
	'chat_id'=>$chatid,
	'video'=>$video,
	'duration'=>$duration,
	'reply_markup'=>$keyboard
	]);
	}
function SendVoice($chatid,$voice,$keyboard,$caption){
	bot('SendVoice',[
	'chat_id'=>$chatid,
	'voice'=>$voice,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
function SendContact($chatid,$first_name,$phone_number,$keyboard){
	bot('SendContact',[
	'chat_id'=>$chatid,
	'first_name'=>$first_name,
	'phone_number'=>$phone_number,
	'reply_markup'=>$keyboard
	]);
	}
function SendChatAction($chatid,$action){
	bot('sendChatAction',[
	'chat_id'=>$chatid,
	'action'=>$action
	]);
	}
function KickChatMember($chatid,$user_id){
	bot('kickChatMember',[
	'chat_id'=>$chatid,
	'user_id'=>$user_id
	]);
	}
function LeaveChat($chatid){
	bot('LeaveChat',[
	'chat_id'=>$chatid
	]);
	}
function GetChat($chatid){
	bot('GetChat',[
	'chat_id'=>$chatid
	]);
	}
function GetChatMembersCount($chatid){
	bot('getChatMembersCount',[
	'chat_id'=>$chatid
	]);
	}
function GetChatMember($chatid,$userid){
	$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
	$tch = $truechannel->result->status;
	return $tch;
	}
function AnswerCallbackQuery($callback_query_id,$text,$show_alert){
	bot('answerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$text,
		'show_alert'=>$show_alert
    ]);
	}
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
	 bot('editMessagetext',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'text'=>$text,
    'parse_mode'=>$parse_mode,
	'disable_web_page_preview'=>$disable_web_page_preview,
    'reply_markup'=>$keyboard
	]);
	}
function EditMessageCaption($chat_id,$message_id,$caption,$keyboard,$inline_message_id){
	 bot('editMessageCaption',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'caption'=>$caption,
    'reply_markup'=>$keyboard,
	'inline_message_id'=>$inline_message_id
	]);
	}


$button_manage = json_encode(['keyboard'=>[
    [['text'=>'↩️منوی اصلی']],
    [['text'=>'پیام همگانی'],['text'=>'فوروارد همگانی']],
    [['text'=>'آمار']],
],'resize_keyboard'=>true]);
$button_admin = json_encode(['keyboard'=>[
    [['text'=>'🔰کانال ما🔰']],
    [['text'=>'مدیریت']],
],'resize_keyboard'=>true]);
$button_official = json_encode(['keyboard'=>[
  [['text'=>'🔰کانال ما🔰']],
],'resize_keyboard'=>true]);
$button_back = json_encode(['keyboard'=>[
    [['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$update = json_decode(file_get_contents('php://input'));
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$messageid = $update->callback_query->message->message_id;
$data_id = $update->callback_query->id;
$txt = $update->callback_query->message->text;
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$from_username = $update->message->from->username;
$from_first = $update->message->from->first_name;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
$text = $update->message->text;
$message_id = $update->message->message_id;
$stickerid = $update->message->sticker->file_id;
$videoid = $update->message->video->file_id;
$voiceid = $update->message->voice->file_id;
$fileid = $update->message->document->file_id;
$photo = $update->message->photo;
$photoid = $photo[count($photo)-1]->file_id;
$musicid = $update->message->audio->file_id;
$caption = $update->message->caption;
$cde = time();
$code = md5("$cde$from_id");
$coin = file_get_contents('user/'.$from_id."/coin.txt");
$username = $update->message->from->username;
$name = $update->message->from->first_name;
$coin_wait = file_get_contents('user/'.$wait."/coin.txt");
$Member = file_get_contents('admin/Member.txt');
$data = $update->callback_query->data;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@king_network7&user_id=$from_id"));
$tch = $truechannel->result->status;
mkdir("data");
mkdir("data/$from_id");
mkdir("data/$chat_id");
$amir = file_get_contents("data/$from_id/amir.txt");
// start source
if (strpos($block , "$from_id") !== false) {
 return false;
}
elseif ($from_id != $chat_id and $chat_id != $feed) {
 LeaveChat($chat_id);
}
//===============
elseif(strpos($text,'/start') !== false) {
  $id = str_replace("/start ","",$text);
  mkdir("user/$from_id");
  if (!file_exists("user/$from_id/coin.txt")) {
    save("user/$from_id/coin.txt","0");
    save("user/$from_id/command.txt","none");
    SendMessage($chat_id,"☑️شما باا موفیقت در سیستم ما ثبت شدید☑️
⚜️دوباره دستور زیر را وارد کنید⚜️

/start","html","true");

    if ($id != "") {
      if ($id != $from_id) {
          SendMessage($id,"یک نفر با لینک اختصاصی شما وارد ربات شد.");
          $coin = file_get_contents("user/$id/coin.txt");
          settype($coin,"integer");
          $newcoin = $coin + 1;
          save("user/$id/bonsa.txt",$newcoin);
      }
      else {
        SendMessage($chat_id,"شما قبلا در ربات عضو بودید !");
      }
    }
  }
   if($from_id == $admin){
          SendMessage($chat_id,"Hello World","html","true",$button_admin);
   }else{
	      SendMessage($chat_id,"Hello World","html","true",$button_official);
   }
}
//==============
elseif($text == '↩️منوی اصلی'){
 if($from_id == $admin){
  file_put_contents('user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"↩️ شما به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_admin);
 }else{
  file_put_contents('user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"↩️ شما به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official);
 }
}
//===============
elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	SendMessage($chat_id,"📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال های زیر بشید 👇

🆔 @king_network7
✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇

🔸 /start

✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌","html","true",$button_official);
	}
//===============
elseif($text =="🔰کانال ما🔰"){
	SendMessage($chat_id,"🛡کانال ما🛡

⚜️شما می توانید با پیوستن به کانال ما از اخبار و اپدیت های روبات با خبر باشید⚜

@soros_robot");
}

 

//================//
elseif($text == 'مدیریت' and $from_id == $admin){
 SendMessage($chat_id,"به پنل مدیریت خوش اومدید","html","true",$button_manage);
}
elseif($text == 'آمار' and $from_id == $admin){
 $txtt = file_get_contents('admin/Member.txt');
 $member_id = explode("\n",$txtt);
 $mmemcount = count($member_id) -1;
 SendMessage($chat_id,"کل کاربران: $mmemcount نفر","html","true");
}
elseif($text == 'فوروارد همگانی' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","s2a fwd");
 SendMessage($chat_id,"پیام مورد نظر را فوروارد کنید","html","true",$button_back);
}
elseif($command == 's2a fwd' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","none");
 SendMessage($chat_id,"پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
 $all_member = fopen( "admin/Member.txt", 'r');
 while( !feof( $all_member)) {
  $user = fgets( $all_member);
  ForwardMessage($user,$admin,$message_id);
 }
}
elseif($text == 'پیام همگانی' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","s2a");
 SendMessage($chat_id,"پیامتون رو وارد کنید","html","true",$button_back);
}
elseif($command == 's2a' and $from_id == $admin){
 file_put_contents("user/".$from_id."/command.txt","none");
 SendMessage($chat_id,"پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
 $all_member = fopen( "admin/Member.txt", 'r');
 while( !feof( $all_member)) {
  $user = fgets( $all_member);
  if($sticker_id != null){
   SendSticker($user,$stickerid);
  }
  elseif($videoid != null){
   SendVideo($user,$videoid,$caption);
  }
  elseif($voiceid != null){
   SendVoice($user,$voiceid,'',$caption);
  }
  elseif($fileid != null){
   SendDocument($user,$fileid,'',$caption);
  }
  elseif($musicid != null){
   SendAudio($user,$musicid,'',$caption);
  }
  elseif($photoid != null){
   SendPhoto($user,$photoid,'',$caption);
  }
  elseif($text != null){
   SendMessage($user,$text,"html","true");
  }
 }
}

$txxt = file_get_contents('admin/Member.txt');
$pmembersid= explode("\n",$txxt);
if (!in_array($chat_id,$pmembersid)){
 $aaddd = file_get_contents('admin/Member.txt');
 $aaddd .= $chat_id."\n";
 file_put_contents('admin/Member.txt',$aaddd);
}unlink('error_log');

?>
