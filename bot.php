<?php
/*
Admin=>@Amirhossein_Taypram
*/
ob_start();
/* Token Bot */
define('API_KEY','1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA');
/* Admin List */
$fileadmins = file_get_contents("data/admin.txt");
$arrayadmins = array($fileadmins);
$admin = "710732845";
$adminlist = "710732845";
$kanal = "@king_network7";
$GetINFObot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getMe"));
$UserNameBot = $GetINFObot->result->username;
/* Tabee Save */
function save($filename,$TXTdata){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
/* Tabee getFileList */
function getFileList($folderName, $fileType = "")
{
    if (substr($folderName, strlen($folderName) - 1) != "/") {
        $folderName .= '/';
    }

	$c=0;
    foreach (glob($folderName . '*' . $fileType) as $filename) {
        if (is_dir($filename)) {
            $type = 'folder';
        } else {
            $type = 'file';
        }
        $c++;
    }
	return $c;

}
/* Tabee numberformat */
function numberformat($str, $sep = ',')
{
    $result = '';
    $c = 0;
    $num = strlen("$str");
    for ($i = $num - 1; $i >= 0; $i--) {
        if ($c == 3) {
            $result = $sep . $result;
            $result = $str[$i] . $result;
            $c = 0;
        } else {
            $result = $str[$i] . $result;
        }
        $c++;
    }
    return $result;
}
	/* Zip Aechive */
function create_zip($files = array(),$destination = '') {
    if(file_exists($destination)) { return false; }
    $valid_files = array();
    if(is_array($files)) {
        foreach($files as $file) {
            if(file_exists($file)) {
                $valid_files[] = $file;
            }
        }
    }
    if(count($valid_files)) {
        $zip = new ZipArchive();
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
            return false;
        }
        foreach($valid_files as $file) {
            $zip->addFile($file,$file);
        }
        $zip->close();
        return file_exists($destination);
    }
    else
    {
        return false;
    }
} 
/* Button */
$button_manage = json_encode(['keyboard'=>[
[['text'=>'↩️منوی اصلی']],
[['text'=>'📊آمار'],['text'=>'📮فوروارد همگانی']],
[['text'=>'📭پیام همگانی'],['text'=>'🅾️بن گلوبال']],
[['text'=>'♻️بروزرسانی'],['text'=>'📊لیست افراد بن ال شده']],
],'resize_keyboard'=>true]);
$button_official_admin = json_encode(['keyboard'=>[
[['text'=>'🛠ساختن ربات']],
[['text'=>"💎ویژه کردن رایگان رباتم😳"],['text'=>'🎁استفاده از کد💎']],
[['text'=>'⚜️اشتراک (حساب) ویژه⚜️']],
[['text'=>'📖راهنما'],['text'=>'📊آمار فعلی ربات⌛️']],
[['text'=>'🗣پشتیبانی ربات ها']],
[['text'=>'🔩امکانات ربات'],['text'=>'☠️گزارش تخلف']],
[['text'=>'📃قوانین ساخت ربات']],
[['text'=>'🈸مدیریت']],
],'resize_keyboard'=>true]);
$button_official = json_encode(['keyboard'=>[
[['text'=>'🛠ساختن ربات']],
[['text'=>"💎ویژه کردن رایگان رباتم😳"],['text'=>'🎁استفاده از کد💎']],
[['text'=>'⚜️اشتراک (حساب) ویژه⚜️']],
[['text'=>'📖راهنما'],['text'=>'📊آمار فعلی ربات⌛️']],
[['text'=>'🗣پشتیبانی ربات ها']],
[['text'=>'🔩امکانات ربات'],['text'=>'☠️گزارش تخلف']],
[['text'=>'📃قوانین ساخت ربات']],
],'resize_keyboard'=>true]);
$button_back = json_encode(['keyboard'=>[
[['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_remove = json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true]);
/* Tabee objectToArrays */
function objectToArrays( $object ) {
				if( !is_object( $object ) && !is_array( $object ) )
				{
				return $object;
				}
				if( is_object( $object ) )
				{
				$object = get_object_vars( $object );
				}
			return array_map( "objectToArrays", $object );
			}
/* Tabee Bot OFficial */
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
/* Tabee Send Message */
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Forward Message */
function ForwardMessage($chatid,$from_chat,$message_id){
	bot('ForwardMessage',[
	'chat_id'=>$chatid,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
	}
	/* Tabee Send Photo */
function SendPhoto($chatid,$photo,$keyboard,$caption){
	bot('SendPhoto',[
	'chat_id'=>$chatid,
	'photo'=>$photo,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Audio */
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
	/* Tabee Send Document */
function SendDocument($chatid,$document,$keyboard,$caption){
	bot('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Sticker */
function SendSticker($chatid,$sticker,$keyboard){
	bot('SendSticker',[
	'chat_id'=>$chatid,
	'sticker'=>$sticker,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Video */
function SendVideo($chatid,$video,$caption,$keyboard,$duration){
	bot('SendVideo',[
	'chat_id'=>$chatid,
	'video'=>$video,
        'caption'=>$caption,
	'duration'=>$duration,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Voice */
function SendVoice($chatid,$voice,$keyboard,$caption){
	bot('SendVoice',[
	'chat_id'=>$chatid,
	'voice'=>$voice,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Contact */
function SendContact($chatid,$first_name,$phone_number,$keyboard){
	bot('SendContact',[
	'chat_id'=>$chatid,
	'first_name'=>$first_name,
	'phone_number'=>$phone_number,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Chat Action */
function SendChatAction($chatid,$action){
	bot('sendChatAction',[
	'chat_id'=>$chatid,
	'action'=>$action
	]);
	}
	/* Tabee Kick Chat Member */
function KickChatMember($chatid,$user_id){
	bot('kickChatMember',[
	'chat_id'=>$chatid,
	'user_id'=>$user_id
	]);
	}
	/* Tabee Leave Chat */
function LeaveChat($chatid){
	bot('LeaveChat',[
	'chat_id'=>$chatid
	]);
	}
	/* Tabee Get Chat */
function getChat($idchat){
	$json=file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChat?chat_id=".$idchat);
	$data=json_decode($json,true);
	return $data["result"]["first_name"];
}
	/* Tabee Get Chat Members Count */
function GetChatMembersCount($chatid){
	bot('getChatMembersCount',[
	'chat_id'=>$chatid
	]);
	}
	/* Tabee Get Chat Member */
function GetChatMember($chatid,$userid){
	$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
	$tch = $truechannel->result->status;
	return $tch;
	}
	/* Tabee Answer Callback Query */
function AnswerCallbackQuery($callback_query_id,$text,$show_alert){
	bot('answerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$text,
		'show_alert'=>$show_alert
    ]);
	}
	/* Tabee Edit Message Text */
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
	/* Tabee Edit Message Caption */
function EditMessageCaption($chat_id,$message_id,$caption,$keyboard,$inline_message_id){
	 bot('editMessageCaption',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'caption'=>$caption,
    'reply_markup'=>$keyboard,
	'inline_message_id'=>$inline_message_id
	]);
	}
// Variable Source
$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$chat_id = $update->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$from_id = $update->message->from->id;
 //========================
$forward_id = $update->message->forward_from->id;
$first = $update->message->from->first_name;
$username = $update->message->from->username;
$text = $update->message->text;
$message_id = $update->message->message_id;
$m = $gold - 20;
$txt = $update->callback_query->message->text;
$messageid = $update->callback_query->message->message_id;
$block = file_get_contents("data/block-list.txt");
$feed = a5;
$banall = file_get_contents("data/banall-member/banall.txt");
$command = file_get_contents('data/user/'.$from_id."/command.txt");
$idpushe = file_get_contents("Bot/$idtxt/other/access/mum.txt");
$from_chat_msg_id = $update->message->forward_from_message_id;
$from_chat_username = $update->message->forward_from_chat->username;
$stickerid = $update->message->sticker->file_id;
$videoid = $update->message->video->file_id;
$nan = file_get_contents("data/admins.txt");
$voiceid = $update->message->voice->file_id;
$textmessage = isset($update->message->text)?$update->message->text:'';
$fileid = $update->message->document->file_id;
$photoid = $update->message->photo->file_id;
$musicid = $update->message->audio->file_id;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$rono/getChatMember?chat_id=@king_network7&user_id=".$from_id));
$tch = $truechannel->result->status;
$rono = API_KEY;
$message_id = $update->message->message_id;
$message_id_call = $update->callback_query->message->message_id;
$ban_all = file_get_contents("data/user/banall.txt");
//=========
    if (strpos($banall , "$from_id") !== false) {
	return false;
	}
	elseif (strpos($block , "$from_id") !== false) {
	return false;
	}
	elseif ($from_id != $chat_id and $chat_id != $feed) {
	LeaveChat($chat_id);
	}
	elseif (strpos($banall , "$from_id") !== false  ) {
  SendMessage($chat_id,"*You Are GloballyBanned From Server.❌
Don't Message Again...❌*
➖➖➖➖➖➖➖➖➖➖`
دسترسی شما به این سرور مسدود شده است.❌
لطفا پیام ندهید...❌`");
 }
	//===============
	//===============
	elseif(preg_match('/^\/([Ss]tart)(.*)/',$text)){
	preg_match('/^\/([Ss]tart)(.*)/',$text,$match);
	$match[2] = str_replace(" ","",$match[2]);
	$match[2] = str_replace("\n","",$match[2]);
	if($match[2] != null){
	if (strpos($Member , "$from_id") == false){
	if($match[2] != $from_id){
	if (strpos($gold , "$from_id") == false){
	$txxt = file_get_contents('data/user/'.$match[2]."/gold.txt");
    $pmembersid= explode("\n",$txxt);
    if (!in_array($from_id,$pmembersid)){
      $aaddd = file_get_contents('data/user/'.$match[2]."/gold.txt");
		save('data/user/'.$match[2]."/gold.txt",$aaddd+1);
    }
	SendMessage($match[2],"🆕 یک نفر با لینک اختصاصی شما وارد ربات شد","html","true",$button_official);
	}
	}
	}
	}
	mkdir('data/user/'.$from_id);
	if($from_id == $admin){
	SendMessage($chat_id,"ســلام $first
به ربات ساز گردو
در ساعت :  $time
و تاریخ : $date
 خوش آمديد.

⚜️با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه، وبسایت یا وبلاگ و... خود ایجاد کنید

🔹برای ساخت ربات دکمه (ساختن ربات) رو بزنید.

🔹برای دیدن آموزش دریافت توکن نیز روی دکمه ( راهنما) بزنید.
🆔 @a2","html","true",$button_official_admin);
	}else{
	SendMessage($chat_id,"ســلام $first
به ربات ساز گردو
در ساعت :  $time
و تاریخ : $date
 خوش آمديد.

⚜️با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه، وبسایت یا وبلاگ و... خود ایجاد کنید

🔹برای ساخت ربات دکمه (ساختن ربات) رو بزنید.

🔹برای دیدن آموزش دریافت توکن نیز روی دکمه ( راهنما) بزنید.
🆔 @a2","html","true",$button_official_admin);
	}
	}
	//===============
	elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	SendMessage($chat_id,"📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال زیر بشید 👇

🆔 @king_network7

✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇

🔸 /start

✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌","html","true",$button_remove);
	}
  
  
  elseif($text == '↩️منوی اصلی'){
  save('data/user/'.$from_id."/command.txt","none");
  if($from_id == $admin){
  SendMessage($chat_id,"↩️ شما به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official_admin);
  }else{
  SendMessage($chat_id,"↩️ شما به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_official);
  }
  }
    //===============
    
  //===============
  elseif($text == '📖راهنما'){
  SendMessage($chat_id,"1⃣ ابتدا به ربات ( @BotFather ) مراجعه کنید
2⃣ دستور /newbot رو ارسال کنید
3⃣ یک نام برای ربات ارسال کنید
4⃣ پس از ارسال نام،یک یوزرنیم ارسال کنید
❌ توجه کنین حتما باید در آخر یوزرنیم ارسالی کلمه bot با حروف کوچیک یا بزرگ (فرقی نداره) وجود داشته باشه
5⃣ اگر با پیغام زیر برخورد کردید
Sorry, this username is already taken. Please try something different.
یعنی قبلا یکی این یوزرنیم رو ثبت کرده یوزرنیم دیگری وارد کنید. اگر این پیغام رو دریافت نکردید یعنی کار حل است
6⃣ حالا به این ربات مراجعه کنید و دکمه (☢ساخت ربات) رو بزنید
7⃣ سپس پیام آخری که از ربات ( @BotFather ) دریافت کردید رو فوروارد کنید
8⃣ ربات شما با موفقیت ثبت شد

🆔 @a3","html","true");
  }
  //===============
  //================
  //===============
  elseif($text == '🗣پشتیبانی ربات ها'){
  SendMessage($chat_id,"🔸 دوست عزیز تمام نظراتتون رو میتونید به ربات زیر بفرستید ما 24 ساعته پاسخگوی شما هستیم و برای حل مشکل شما آماده ایم👇
🆔 @Robot_Supportbot","html","true");
  }
  //===============
  elseif($text == '📃قوانین ساخت ربات'){
  SendMessage($chat_id,"ℹ قوانین استفاده از ربات:

☢ همه مطالب باید تابع قوانین جمهوری اسلامی ایران باشد.
☢ رعایت ادب و احترام به کاربران.
☢ ساخت هرگونه ربات در ضمیمه +18 خلاف قوانین ربات میباشد و در صورت مشاهده ربات مورد نظر مسدود و همچنین مدیر ربات از تمامی ربات ها بلاک میشود.
☢ مسئولیت پیام های رد و بدل شده در هر ربات با مدیر آن میباشد و ما هیچگونه مسئولیتی نداریم.
☢ در صورت مشاهده استفاده از قابلیت های ربات در جهات منفی به شدت برخورد میشود.
☢ اگر به هر دلیلی درخواست های ربات شما به سرور ما بیش از حد معمول باشد (و حساب ربات ویژه نباشد) چند باری به شما اخطار داده میشود اگر این اخطار ها نادیده گرفته شوند ربات شما مسدود و به هیچ عنوان از محدودیت خارج نمیشود.

🆔 @a3","html","true");
  }
  //===============
  //===============
  elseif($text == '🔩امکانات ربات'){
   ForwardMessage($chat_id,"@a3","21");  
   }
  //===============
   elseif($text == '🎁دریافت لینک افزایش امتیاز💎'){
  SendMessage($chat_id,"بنر شما برای افزایش امتیاز آماده شد👇😀","html","true");
  SendMessage($chat_id,"دوست داری ربات برای خودت بسازی؟؟😀
ریپورت هستی و نمیتونی به دیگران پیام بدی و اونها هم ریپورتن؟😖
ربات پیامرسان میخوای بسازی؟؟؟😍
اونم با اشتراک ویژه به صورت رایگان؟؟😳
بدو بیا ربات زیر

https://telegram.me/a2?start=$from_id
","MarkDown","true",$button_bazaryabi);
  }
  //===============

  // Manage
  elseif($text == '🈸مدیریت' and $from_id == $admin){
  save('data/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🈸 به بخش ادمین خوش اومدین","html","true",$button_manage);
  }
  elseif ($text == 'افزودن ادمین' and $from_id == $admin){
	  $s = file_get_contents("data/admin.txt");
	 save('data/user/'.$from_id."/command.txt","addadmin");
	 sendMessage($chat_id,"سلام
	 لطفا ایدی ادمین را بصورت آرایه
	 ,id
	 در فایل 
	 data/admin.txt
	 اضافه کنید.
	 و ایدی فرد را اینجا وارد کنید تا من خبر ادمین شدنشو بهش بدم");
  }
  elseif($command == 'addadmin' and $from_id == $admin){
	save('data/user/'.$from_id."/command.txt","none");
	save('data/admin.txt',"$text");
	sendMessage($chat_id,"فرد موردنظر ادمین شد!");
	sendMessage($text,"تبریک شما ادمین شدید
	لطفا قوانین را رعایت کنید");
  }
  //============
 
  elseif($text == '🅾️اطلاعات'){
  save("other/$from_id/command.txt","set idtaraf");
  SendChatAction($chat_id,"typing");
  SendMessage($chat_id,"<i>🅾️ ایدی عددی را وارد کنید:</i>","html","true",$button_manage);
  }
elseif($command == 'set idtaraf'){
  save("other/$from_id/command.txt","none");
 $info = json_decode(
 file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=$text")
 );
 if ($info->ok == true)
 {
   SendMessage($chat_id,"<i>✅ آیدی حروفی :$info->result->username</i>","html","true",$button_manage);
 }
 }
  //============
  //============
  elseif($text == '📊آمار' and $from_id == $admin){  
	  $txtt = file_get_contents('data/users.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
	$mmemcount_member = numberformat("$mmemcount",',');
	$txttt = file_get_contents('data/access/robots.txt');
    $member_id1 = explode("\n",$txttt);
    $mmemcount1 = count($member_id1) -1;
	$botsss = str_replace("\n",' | ',$botsss);
  SendMessage($chat_id,"
  👥 اعضا ربات اصلی: $mmemcount_member
  
  🅾 اعضا جدید:
  $botsss","html","true");
  }
  //============
  elseif($text == '📮فوروارد همگانی' and $from_id == $admin){
	save("data/user/".$from_id."/command.txt","s2a fwd");
	SendMessage($chat_id,"📮 پیام مورد نظر را فوروارد کنید","html","true",$button_back);
	}
	elseif($command == 's2a fwd' and $from_id == $admin){
	save("data/user/".$from_id."/command.txt","none");
	SendMessage($chat_id,"📮 پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
	$all_member = fopen( "data/access/mum.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			ForwardMessage($user,$admin,$message_id);
		}
	}
	//===========
	elseif($text == '📭پیام همگانی' and $from_id == $admin){
	save("data/user/".$from_id."/command.txt","s2a");
	SendMessage($chat_id,"📭 پیامتون رو وارد کنید","html","true",$button_back);
	}
	elseif($command == 's2a' and $from_id == $admin){
	save("data/user/".$from_id."/command.txt","none");
	SendMessage($chat_id,"📭 پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
	$all_member = fopen( "data/access/mum.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			if($sticker_id != null){
			SendSticker($user,$sticker_id);
			}
			elseif($video_id != null){
			SendVideo($user,$video_id,$caption);
			}
			elseif($voice_id != null){
			SendVoice($user,$voice_id,'',$caption);
			}
			elseif($file_id != null){
			SendDocument($user,$file_id,'',$caption);
			}
			elseif($music_id != null){
			SendAudio($user,$music_id,'',$caption);
			}
			elseif($photo2_id != null){
			SendPhoto($user,$photo2_id,'',$caption);
			}
			elseif($photo1_id != null){
			SendPhoto($user,$photo1_id,'',$caption);
			}
			elseif($photo0_id != null){
			SendPhoto($user,$photo0_id,'',$caption);
			}
			elseif($text != null){
			SendMessage($user,$text,"html","true");
			}
		}
	}
		
//============
elseif(preg_match('/^\/([Bb]anall) (.*)/',$text) and $from_id == $admin){
	preg_match('/^\/([Bb]anall) (.*)/',$text,$match);
	$id = json_decode(file_get_contents("https://api.pwrtelegram.xyz/bottoken/getChat?chat_id=".$match[2]));
	$user = $id->result->id;
	if($user != null){
	$txxt = file_get_contents('data/banall-member/banall.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($user,$pmembersid)){
      $aaddd = file_get_contents('data/banall-member/banall.txt');
      $aaddd .= $user."\n";
		file_put_contents('data/banall-member/banall.txt',$aaddd);
    }
	SendMessage($chat_id,"🚫 کاربر مورد نظر بن ال شد.","html","true");
	SendMessage($user,"*You Are GloballyBanned From Server.❌
Don't Message Again...❌*
➖➖➖➖➖➖➖➖➖➖`
دسترسی شما به این سرور مسدود شده است.❌
لطفا پیام ندهید...❌`","html","true");
	}else{
	SendMessage($chat_id,"متاسفانه خطایی رخ داده است.","html","true");
	}
	}
//============
 	elseif(preg_match('/^\/([Uu]n[Bb]anall) (.*)/',$text) and $from_id == $admin){
	preg_match('/^\/([Uu]n[Bb]anall) (.*)/',$text,$match);
	$id = json_decode(file_get_contents("https://api.pwrtelegram.xyz/bottoken/getChat?chat_id=".$match[2]));
	$user = $id->result->id;
	if($user != null){
	$rep = str_replace("$user\n",'',$block);
	save("data/banall-member/banall.txt",$rep);
	SendMessage($chat_id,"✅کاربر مورد نظر آنبن ال  شد.","html","true");
	SendMessage($user,"✅شما آنبن ال شدین.","html","true");
	}else{
	SendMessage($chat_id,"🚫 متاسفانه خطایی رخ داده است.","html","true");
	}
	}
	//==========
	 elseif($text == '📊لیست افراد بن ال شده' and $from_id == $admin){
	
	$botsban = file_get_contents("data/banall-member/banall.txt");
	$exbotban = explode(">",$botsban);
	$c = count($exbotban)-2;
	$botsssban = '';
	if($exbotban[$c-(-1)] != null){
	$botsssban = $botsssban.">".$exbotban[$c-(-1)];
	}if($exbotban[$c] != null){
	$botsssban = $botsssban.">".$exbotban[$c];
	}if($exbotban[$c-1] != null){
	$botsssban = $botsssban.">".$exbotban[$c-1];
	}if($exbotban[$c-2] != null){
	$botsssban = $botsssban.">".$exbotban[$c-2];
	}if($exbotban[$c-3] != null){
	$botsssban = $botsssban.">".$exbotban[$c-3];
	}if($exbotban[$c-4] != null){
	$botsssban = $botsssban.">".$exbotban[$c-4];
	}if($exbotban[$c-5] != null){
	$botsssban = $botsssban.">".$exbotban[$c-5];
	}if($exbotban[$c-6] != null){
	$botsssban = $botsssban.">".$exbotban[$c-6];
	}if($exbotban[$c-7] != null){
	$botsssban = $botsssban.">".$exbotban[$c-7];
	}if($exbotban[$c-8] != null){
	$botsssban = $botsssban.">".$exbotban[$c-8];
	}
	$botsssban = str_replace("\n",' | ',$botsssban);
	
	SendChatAction($chat_id,"typing");
	SendMessage($chat_id,"<i>📊🕵لیست </i> <code>10</code> <i>کاربر بن ال شده: </i>
	$botsssban","html","true");
	}
	
//============

mkdir('data/user/'.$from_id);
$txxt = file_get_contents('data/access/mum.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('data/access/mum.txt');
      $aaddd .= $chat_id."\n";
		file_put_contents('data/access/mum.txt',$aaddd);
    }
	$txxt = file_get_contents('data/access/UserName.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array("@".$username,$pmembersid)){
      $aaddd = file_get_contents('data/access/UserName.txt');
      $aaddd .= "@".$username."\n";
	  if($username != null){
		file_put_contents('data/access/UserName.txt',$aaddd);
	  }
    }
	/*
Admin=>@Amirhossein_Taypram
*/
    unlink("error_log");
?>
