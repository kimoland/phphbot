<?php
define('API_KEY', '1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA');
error_reporting(0);
$admin = array('710732845','710732845');
$channel = "@hslu78tvhos254";
$channel2 = "@hslu78tvhos254";
$channel1 = "hslu78tvhos254";
$channel22 = "hslu78tvhos254";
$botids = "KingMovieFileBot";
//===============KING BOT===============\\
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
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
bot('sendMessage',[
'chat_id'=>$chatid,
'text'=>$text,
'parse_mode'=>$parsmde,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
} 
 function sendphoto($chat_id, $photo, $caption){
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption,
]);
}
function timer($x){
$tehran = new DateTimeZone("Asia/Tehran");
$london = new DateTimeZone("Europe/London");
$dateDiff = new DateTime("now", $london);
$timeOffset = $tehran->getOffset($dateDiff);
$newtime = time() + $timeOffset;
return Date("$x",$newtime);
}
function forwardmessage($chat_id,$from_chat_id,$message_id){
bot("forwardmessage",[
'chat_id'=>$chat_id,
'from_chat_id'=>$from_chat_id,
'message_id'=>$message_id
]);
}
function savedatas($type,$data,$dir){
$type = str_replace(array("1","2","3","4","5","6","7","8","9","0"), array('q','w','e','r','t','y','u','i','o','p'), $type);
$xml = simplexml_load_file("data/$dir.xml");
$kingnetwork = $xml->$type;
$as = file_get_contents("data/$dir.xml");
if($kingnetwork == ""){
$as = str_replace("</data>", "<$type>$data</$type>
</data>", $as);
@file_put_contents("data/$dir.xml","$as");
}
if($kingnetwork != null){
$as = str_replace("<$type>$kingnetwork</$type>", "<$type>$data</$type>", $as);
@file_put_contents("data/$dir.xml","$as");
}
}
function keybo($xns){
$sw = '{"keyboard":['.$xns.'],"resize_keyboard":true}';
return $sw;
}
function chatmessageid(){
$update = json_decode(file_get_contents('php://input'));
$message = $update->message; 
$chat_id = $message->chat->id;
$chatid = $update->callback_query->message->chat->id;
if($chat_id != ""){
return $chat_id;
}if($chatid != ""){
return $chatid;
}
}
//===============KING BOT===============\\
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = chatmessageid();
mkdir("data");
$xml = simplexml_load_file("data/data.xml");
$cha_id = str_replace(array("1","2","3","4","5","6","7","8","9","0"), array('q','w','e','r','t','y','u','i','o','p'), $chat_id);
$kingnetwork = $xml->$cha_id;
$text = $message->text;
$name = $message->from->first_name;
$lastname = $message->from->last_name;
$username = $message->from->username;
$from_id = chatmessageid();
$data = $update->callback_query->data;
//===============KING BOT===============\\
$check = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel2&user_id=$chat_id"),true); 
$stats2 = $check['result']['status'];
$as = file_get_contents("data/data.xml");
if($as == ""){
$gd = '<?xml version="1.0" encoding="UTF-8"?>
<data>
</data>';
file_put_contents("data/data.xml",$gd);
}
$as2 = file_get_contents("kings.php");
if($as2 == ""){
$gd = '<?php
$xc =0;';
file_put_contents("kings.php",$gd);
}
$as3 = file_get_contents("data/mo.xml");
if($as3 == ""){
$gd = '<?xml version="1.0" encoding="UTF-8"?>
<data>
</data>';
file_put_contents("data/mo.xml",$gd);
}
//===============KING BOT===============\\
$keyboard = json_encode(['keyboard'=>[
[['text'=>"🚗دریافت شماره🚗"]],
[['text'=>"امتیاز گیری🎄"],['text'=>"🎄حساب شما"]],
[['text'=>"🌅کد هدیه🌅"]],
[['text'=>"راهنما ربات☢"],['text'=>"☢مقررات ربات"]],
[['text'=>"پشتیبانی🏓"],['text'=>"🏓استعلام شماره ها"]],
[['text'=>"⚜️کانال ربات⚜️"]],
],'resize_keyboard'=>true]);
//===============KING BOT===============\\
$menuadmin = json_encode(['keyboard'=>[
[['text'=>"ارسال همگانی📮"],['text'=>"📮فوروارد همگانی"]],
[['text'=>"امار🔮"],['text'=>"🔮تنظیم موجودی"]],
[['text'=>"🎈ساخت کد هدیه🎈"]],
[['text'=>"تنظیم متن قوانین📚"],['text'=>"📚تنظیم متن راهنما"]],
[['text'=>"تنظیم ربات پشتیبانی⚙️"],['text'=>"⚙️تنظیم موجودی شماره"]],
[['text'=>'↩️منوی اصلی↩️']]
],'resize_keyboard'=>true]);
//===============KING BOT===============\\
$back = json_encode(['keyboard'=>[
[['text'=>'↩️منوی اصلی↩️']],
],'resize_keyboard'=>true]);
//===============KING BOT===============\\
$backadmin = json_encode(['keyboard'=>[
[['text'=>'↩️منوی ادمین↩️']],
],'resize_keyboard'=>true]);
//===============KING BOT===============\\
$typenumber = json_encode(['keyboard'=>[
[['text'=>"💎تلگرام"],['text'=>"📺اینستاگرام"]],
[['text'=>"🔍گوگل"],['text'=>"📳 واتس اپ"]],
[['text'=>"🐝بیتالک"],['text'=>"💌لاین"]],
[['text'=>"📞وایبر"],['text'=>"☂️ایمو"]],
[['text'=>"📱اسکایپ"],['text'=>"🛃فیسبوک"]],
[['text'=>"✳️وی چت"],['text'=>"📨یاهو"]],
[['text'=>"🗃مایکروسافت"],['text'=>"🐣تویتر"]],
[['text'=>"🏮تانگو"],['text'=>"📽یوتیوب"]],
[['text'=>"💰الکترونیوم"]],
[['text'=>"↩️منوی اصلی↩️"]],
],'resize_keyboard'=>true]);
//===============KING BOT===============\\
$keshvar = json_encode(['keyboard'=>[
[['text'=>"روسیه 🇷🇺"]],
[['text'=>"فیلیپین 🇵🇭"],['text'=>"میانمار 🇲🇲"]],
[['text'=>"انگلستان 🇬🇧"],['text'=>"ماکائو 🇲🇴"]],
[['text'=>"هنگ کنگ 🇭🇰"],['text'=>"تایلند 🇹🇭"]],
[['text'=>"پرو 🇵🇪"],['text'=>"فرانسه 🇫🇷"]],
[['text'=>"عربستان 🇸🇦"],['text'=>"نیجریه 🇳🇬"]],
[['text'=>"اسپانیا 🇪🇸"],['text'=>"آمریکا 🇺🇸"]],
[['text'=>"جامائیکا 🇯🇲"],['text'=>"ایرلند 🇮🇪"]],
[['text'=>"اسرائیل 🇮🇱"],['text'=>"ایتالیا 🇮🇹"]],
[['text'=>"افغانستان 🇦🇫"],['text'=>"آرژانتین 🇦🇷"]],
[['text'=>"آذربایجان 🇦🇿"],['text'=>"الجزایر 🇩🇿"]],
[['text'=>"برزیل 🇧🇷"],['text'=>"آلمان 🇩🇪"]],
[['text'=>"هند 🇮🇳"],['text'=>"ژاپن 🇯🇵"]],
[['text'=>"آفریقای جنوبی 🇿🇦"]],
[['text'=>"پرتغال 🇵🇹"],['text'=>"سوئد 🇸🇪"]],
[['text'=>"استونی 🇪🇪"],['text'=>"کانادا 🇨🇦"]],
[['text'=>"چین 🇨🇳"],['text'=>"ترکیه 🇹🇷"]],
[['text'=>"سوئیس 🇨🇭"]],
[['text'=>"↩️منوی اصلی↩️"]],
],'resize_keyboard'=>true]);
//===============KING BOT===============\\
$setinfonumber = json_encode(['keyboard'=>[
[['text'=>"🇷🇺روسیه🇷🇺"]],
[['text'=>"🇵🇭فیلیپین🇵🇭"],['text'=>"🇲🇲میانمار🇲🇲"]],
[['text'=>"🇬🇧انگلستان🇬🇧"],['text'=>"🇲🇴ماکائو🇲🇴"]],
[['text'=>"🇭🇰هنگ کنگ🇭🇰"],['text'=>"🇹🇭تایلند🇹🇭"]],
[['text'=>"🇵🇪پرو🇵🇪"],['text'=>"🇫🇷فرانسه🇫🇷"]],
[['text'=>"🇸🇦عربستان🇸🇦"],['text'=>"🇳🇬نیجریه🇳🇬"]],
[['text'=>"🇪🇸اسپانیا🇪🇸"],['text'=>"🇺🇸آمریکا🇺🇸"]],
[['text'=>"🇯🇲جامائیکا🇯🇲"],['text'=>"🇮🇪ایرلند🇮🇪"]],
[['text'=>"🇮🇱اسرائیل🇮🇱"],['text'=>"🇮🇹ایتالیا🇮🇹"]],
[['text'=>"🇦🇫افغانستان🇦🇫"],['text'=>"🇦🇷آرژانتین🇦🇷"]],
[['text'=>"🇦🇿آذربایجان🇦🇿"],['text'=>"🇩🇿الجزایر🇩🇿"]],
[['text'=>"🇧🇷برزیل🇧🇷"],['text'=>"🇩🇪آلمان🇩🇪"]],
[['text'=>"🇮🇳هند🇮🇳"],['text'=>"🇯🇵ژاپن🇯🇵"]],
[['text'=>"🇿🇦آفریقا جنوبی🇿🇦"]],
[['text'=>"🇵🇹پرتغال🇵🇹"],['text'=>"🇸🇪سوئد🇸🇪"]],
[['text'=>"🇪🇪استونی🇪🇪"],['text'=>"🇨🇦کانادا🇨🇦"]],
[['text'=>"🇨🇳چین🇨🇳"],['text'=>"🇹🇷ترکیه🇹🇷"]],
[['text'=>"🇨🇭سوئیس🇨🇭"]],
[['text'=>"↩️منوی ادمین↩️"]],
],'resize_keyboard'=>true]);
//===============KING BOT===============\\
include 'kings.php';
$cont = $update->message->contact;
$phone_number = $cont->phone_number;
$chekid = $cont->first_name;
$xbw = "ok".$cha_id;
$vjs = $xml->$xbw;
if($vjs == "" && $phone_number == ""){
sendmessage($chat_id,"خطا !! شما اکانت خود را تایید نکردید جهت تایید از دکمه تایید حساب استفاده نمایید",'true',keybo('
[{"text":"💠تایید هویت💠","request_contact":true}]
')
);
return false;
}
elseif($phone_number != ""){
if($chekid == $name){
$phone_number = str_replace("+", "", $phone_number);
$s = preg_split('//u', $phone_number, null, PREG_SPLIT_NO_EMPTY);
$v = $s['0'].$s['1'];
if($v == "98"){
savedatas($xbw,"ok","data");
sendmessage($chat_id,"
حساب کاربریتان با موفقیت تایید شد✅
دستور /start ارسال کنید📍");
}else{
sendmessage($chat_id,"✅سیستم ضدتقلب فعال شد
📍این شماره متعلق به ایران نیست
📍فقط کاربران با شماره ایران حق استفاده از ربات را دارند
🆔 $channel
🌐 $channel2");
}
}else{
sendmessage($chat_id,"📍اطلاعات ارسال شده با اطلاعات اصلی اکانت مطابقت ندارد
🆔 $channel
🌐 $channel2");
return false;
}
}
//===============KING BOT===============\\
if($text == "🎄حساب شما"){
$xmls = simplexml_load_file("data/mo.xml");
$mo = $xmls->$cha_id;
sendmessage($chat_id," 
➖➖➖➖➖➖➖➖
💰 موجودی شما : $mo سکه
➖➖➖➖➖➖➖➖");
}
//===============KING BOT===============\\
if($stats2 != 'creator' && $stats2 != 'administrator' && $stats2 != 'member'){
SendMessage($chat_id, "
📛ربات در حالت عادی قفل است📛
🚫ابتدا وارد کانال اسپانسر های ما شوید🚫
✅سپس دستور /start را ارسال کنید✅
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
-$channel1
-$channel2
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
● @$botids ●");
return false;
}
//===============KING BOT===============\\
if($text == '/start'){
$user = file_get_contents('users.txt');
$members = explode("\n",$user);
if (!in_array($chat_id,$members)){
$add_user = file_get_contents('users.txt');
$add_user .= $chat_id."\n";
file_put_contents('users.txt',$add_user);
savedatas($from_id,"0","mo");
}
sendmessage($chat_id,"کاربر گرامی به ربات دریافت شماره مجازی خیلی خوش آمدید❤️

✅ به راحتی شماره مجازی بگیرید

✅ با سرعت بالا و کاملا اتوماتیک

✅ با کمترین امتیاز ممکن 
🆔 $channel
🌐 $channel2",'true',$keyboard);
}
//===============KING BOT===============\\
if($text == "↩️منوی اصلی↩️"){
sendmessage($chat_id,"به منوی اصلی برگشتید یک گزینه را انتخاب کنید🔘",'true',$keyboard);
}
//===============KING BOT===============\\
if($text == "امتیاز گیری🎄"){
sendmessage($chat_id,"
اولین ربات شماره مجازی رایگان
با زیرمجموعه گیری شماره مجازی رایگان دریافت کنید
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
-هوشمند
-سیستم ضدتقلب🗣
-دارای شماره بیش از 30 کشور⚙️
-پشتیبانی از انواع پیامرسان ها📫
-بدون بلاک و ریپورت شدن شماره☎️
-کاملا رایگان🌐
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
[دریافت شماره مجازی رایگان](https://telegram.me/$botids?start=$chat_id)
",'true',$back);
}
//===============KING BOT===============\\
$help = $xml->help;
$textgetmo = $xml->textgetmo;
$userbot = $xml->userbot;
$russia = $xml->russia;
$phli = $xml->phli;
$mianmar = $xml->mianmar;
$uk = $xml->uk;
$hongkong = $xml->hongkong;
$thilan = $xml->thilan;
$pronum = $xml->pronum;
$france = $xml->france;
$irlan = $xml->irlan;
$israee = $xml->israee;
$arabic = $xml->arabic;
$niger = $xml->niger;
$spain = $xml->spain;
$usa = $xml->usa;
$jama = $xml->jama;
$italy = $xml->italy;
$afghan = $xml->afghan;
$porte = $xml->porte;
$esto = $xml->esto;
$cana = $xml->cana;
$chain = $xml->chain;
$turk = $xml->turk;
$jama = $xml->$jama;
$soee = $xml->soee;
$argan = $xml->argan;
$azar = $xml->azar;
$algazir = $xml->algazir;
$brazil = $xml->brazil;
$german = $xml->german;
$india = $xml->india;
$japan = $xml->japan;
$africa = $xml->africa;
$soed = $xml->soed;
//===============KING BOT===============\\
if($text == "☢مقررات ربات"){
sendmessage($chat_id,"☢مقررات ربات☢ : \n $textgetmo");
}
//===============KING BOT===============\\
if($text == "راهنما ربات☢"){
sendmessage($chat_id,"⛄راهنما ربات⛄ : \n $help");
}
//===============KING BOT===============\\
if($text == "پشتیبانی🏓"){
$supportb = json_encode([ 'inline_keyboard'=>[ 
[['text'=>"🔅ورود به ربات پشتیبانی🔅",'url'=>"https://t.me/$userbot"]]
]
]);
sendmessage($chat_id,"
🔻برای ارتباط با پشتیبانی🔻
🔻روی دکمه زیر کلیک کنید🔻
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
● $channel ●
● $channel2 ●",'true', $supportb);
}

//===============KING BOT===============\\
if($text == "🏓استعلام شماره ها"){
$numberinfo = json_encode([ 'inline_keyboard'=>[ 
[['text'=>"🇷🇺تعداد شماره روسیه🇷🇺= $russia",'callback_data'=>"0000010"]],
[['text'=>"🇵🇭تعداد شماره فیلیپین🇵🇭= $phli",'callback_data'=>"0100000"]],
[['text'=>"🇲🇲تعداد شماره میانمار🇲🇲= $mianmar",'callback_data'=>"0010000"]],
[['text'=>"🇬🇧تعداد شماره انگلستان🇬🇧= $uk",'callback_data'=>"1000000"]],
[['text'=>"🇭🇰تعداد شماره هنگ کنگ🇭🇰= $hongkong",'callback_data'=>"0000100"]],
[['text'=>"🇹🇭تعداد شماره تایلند🇹🇭= $thilan",'callback_data'=>"0200000"]],
[['text'=>"🇵🇪تعداد شماره پرو🇵🇪= $pronum",'callback_data'=>"0400000"]],
[['text'=>"🇫🇷تعداد شماره فرانسه🇫🇷= $users",'callback_data'=>"0300000"]],
[['text'=>"🇮🇪تعداد شماره ایرلند🇮🇪= $france",'callback_data'=>"0020000"]],
[['text'=>"🇮🇱تعداد شماره اسرائیل🇮🇱= $israee",'callback_data'=>"0003000"]],
[['text'=>"🇸🇦تعداد شماره عربستان🇸🇦= $arabic",'callback_data'=>"0000400"]],
[['text'=>"🇳🇬تعداد شماره نیجریه🇳🇬= $niger",'callback_data'=>"0000002"]],
[['text'=>"🇪🇸تعداد شماره اسپانیا🇪🇸= $spain",'callback_data'=>"0000010"]],
[['text'=>"🇺🇸تعداد شماره آمریکا🇺🇸= $usa",'callback_data'=>"0100000"]],
[['text'=>"🇯🇲تعداد شماره جامائیکا🇯🇲= $jama",'callback_data'=>"0010000"]],
[['text'=>"🇮🇹تعداد شماره ایتالیا🇮🇹= $italy",'callback_data'=>"1000000"]],
[['text'=>"🇦🇫تعداد شماره افغانستان🇦🇫= $afghan",'callback_data'=>"0000100"]],
[['text'=>"🇵🇹تعداد شماره پرتغال🇵🇹= $porte",'callback_data'=>"0003000"]],
[['text'=>"🇪🇪تعداد شماره استونی🇪🇪= $esto",'callback_data'=>"0000400"]],
[['text'=>"🇨🇦تعداد شماره کانادا🇨🇦= $cana",'callback_data'=>"0000002"]],
[['text'=>"🇨🇳تعداد شماره چین🇨🇳= $chain",'callback_data'=>"0000010"]],
[['text'=>"🇹🇷تعداد شماره ترکیه🇹🇷= $turk",'callback_data'=>"0100000"]],
[['text'=>"🇨🇭تعداد شماره سوئیس🇨🇭= $soee",'callback_data'=>"1000000"]],
[['text'=>"🇦🇷تعداد شماره آرژانتین🇦🇷= $argan",'callback_data'=>"0003000"]],
[['text'=>"🇦🇿تعداد شماره آذربایجان🇦🇿= $azar",'callback_data'=>"0000400"]],
[['text'=>"🇩🇿تعداد شماره الجزایر🇩🇿= $algazir",'callback_data'=>"0000002"]],
[['text'=>"🇧🇷تعداد شماره برزیل🇧🇷= $brazil",'callback_data'=>"0000010"]],
[['text'=>"🇩🇪تعداد شماره آلمان🇩🇪= $german",'callback_data'=>"0100000"]],
[['text'=>"🇮🇳تعداد شماره هند🇮🇳= $india",'callback_data'=>"0010000"]],
[['text'=>"🇯🇵تعداد شماره ژاپن🇯🇵= $japan",'callback_data'=>"1000000"]],
[['text'=>"🇸🇪تعداد شماره سوئد🇸🇪= $soed",'callback_data'=>"10070000"]],
[['text'=>"🇿🇦تعداد شماره آفریقای جنوبی🇿🇦= $africa",'callback_data'=>"0000100"]]
]
]);
sendmessage($chat_id,"
🔻موجودی شماره های ربات🔻
🔻کاملا هوشمند🔻
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
● $channel ●
● $channel2 ●",'true', $numberinfo);
}
//===============KING BOT===============\\
if($text == "⚜️کانال ربات⚜️"){
$listchannel = json_encode([ 'inline_keyboard'=>[ 
[['text'=>"🔅کانال آموزش شبکه و اینترنت آزاد🔅",'url'=>"https://t.me/$channel1"]],
[['text'=>"🔅کانال دانلود فیلم و سریال رایگان🔅",'url'=>"https://t.me/$channel22"]]
]
]);
sendmessage($chat_id,"
🔻لیست کانال های ربات🔻
🔻برای ورود به کانال کافی است🔻
🔻روی دکمه کلیک کنید🔻
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
",'true', $listchannel);
}
//===============KING BOT===============\\
elseif(strpos($text,"/start ") !== false){
$xbs = str_replace("/start ", "", $text);
$xb = str_replace(array("1","2","3","4","5","6","7","8","9","0"), array('q','w','e','r','t','y','u','i','o','p'), $xbs);
if($chat_id == $xbs){ 
sendmessage($chat_id,"☢خطا شما نمیتوانید با لینک زیر مجموعه خود عضو ربات شوید☢");
return false;
}
$user = file_get_contents("users.txt");
$user1 = explode("\n",$user);
if(!in_array($xbs , $user1)){
sendmessage($chat_id , "☢این کاربر در ربات ما عضو نیست☢");
return false;
}
if(!in_array($from_id,"$user1")){
$xmls = simplexml_load_file("data/mo.xml");
$mo = $xmls->$xb;
$ajz = $mo+2;
savedatas($xbs,"$ajz","mo");
savedatas($from_id,"0","mo");
sendmessage($chat_id,"کاربر گرامی به ربات دریافت شماره مجازی خیلی خوش آمدید❤️

✅ به راحتی شماره مجازی بگیرید

✅ با سرعت بالا و کاملا اتوماتیک

✅ با کمترین امتیاز ممکن 
🆔 $channel
🌐 $channel2",'true',$keyboard);
$user .= $from_id."\n";
file_put_contents("users.txt",$user);
sendmessage($xbs,"یک کاربر با شناسه $chat_id توسط شما دعوت شد و شما 1 امتیاز دریافت کردید");
}
}
//===============KING BOT===============\\
if($text == "🚗دریافت شماره🚗"){
sendmessage($chat_id,"🌈سرویس مورد نظر را انتخاب کنید🌈",'', '', $typenumber);
}
if($text == "💎تلگرام"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "📺اینستاگرام"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "🔍گوگل"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "📳 واتس اپ"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "🐝بیتالک"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "💌لاین"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "📞وایبر"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "☂️ایمو"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "📱اسکایپ"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "🛃فیسبوک"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "✳️وی چت"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "📨یاهو"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "🗃مایکروسافت"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "🐣تویتر"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
if($text == "💰الکترونیوم"){
sendmessage($chat_id,"🎡کشور را انتخاب کنید🎡",'true',$keshvar);
}
//===============KING BOT===============\\
if($text == "روسیه 🇷🇺"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "فیلیپین 🇵🇭"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "میانمار 🇲🇲"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "انگلستان 🇬🇧"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "ماکائو 🇲🇴"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "هنگ کنگ 🇭🇰"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "تایلند 🇹🇭"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "فرانسه 🇫🇷"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "پرو 🇵🇪"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "نیجریه 🇳🇬"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "عربستان 🇸🇦"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "آمریکا 🇺🇸"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "اسپانیا 🇪🇸"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "ایرلند 🇮🇪"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "جامائیکا 🇯🇲"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "ایتالیا 🇮🇹"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "اسرائیل 🇮🇱"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "آرژانتین 🇦🇷"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "افغانستان 🇦🇫"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "الجزایر 🇩🇿"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "آذربایجان 🇦🇿"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "آلمان 🇩🇪"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "برزیل 🇧🇷"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "ژاپن 🇯🇵"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "هند 🇮🇳"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "انگلیس 🇬🇧"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "آفریقای جنوبی 🇿🇦"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "سوئد 🇸🇪"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "پرتغال 🇵🇹"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "کانادا 🇨🇦"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "استونی 🇪🇪"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "ترکیه 🇹🇷"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "چین 🇨🇳"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
if($text == "سوئیس 🇨🇭"){
sendmessage($chat_id,"🌵موجودی شما کافی نیست🌵",'true',$back);
}
//===============KING BOT===============\\
if($text == "🌅کد هدیه🌅"){
savedatas($from_id,"scodevip","data");
sendmessage($chat_id,"
🎁کد هدیه را ارسال کنید🎁
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
● @$botids ● 
● $channel ●
● $channel2 ●",'true',$back);
}
if($kingnetwork == "scodevip"){
$codes = $xml->codevip;
$countmo = $xml->codevipmo;
if($text == $codes){
$xmls = simplexml_load_file("data/mo.xml");
$mo = $xmls->$cha_id + $countmo;
savedatas($chat_id, $mo , "mo");
sendmessage($chat_id , "
🎁کد هدیه درست بود🎁
🔯امتیاز به حساب شما واریز شد🔯
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
● @$botids ● 
● @$channel ●
● @$channel2 ●");
}
if($text != $codes){
sendmessage($chat_id,"
🅾کد مورد نظر اشتباه است🅾
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
● @$botids ● 
● $channel ●
● $channel2 ●",'true',$back);
}
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if(in_array($chat_id , $admin)){
if($text == "↩️منوی ادمین↩️" || $text == "/panel" || $text == "مدیریت"){
sendmessage($chat_id,"به منوی ادمین خوش آمدید یک گزینه را انتخاب کنید🔘",'true',$menuadmin);
}
//===============KING BOT===============\\
if($text == "امار🔮"){
$user = file_get_contents("users.txt");
$x_member = explode("\n",$user);
$users = count($x_member) ;
$keys = json_encode([ 'inline_keyboard'=>[ 
[['text'=>"تعداد کاربران ربات= $users",'callback_data'=>"000000"]]
]
]);
sendmessage($chat_id,"
🔻آمار دقیق ربات🔻
🔻به شرح زیر است🔻
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
● $channel ●
● $channel2 ●",'true', $keys);
}
//===============KING BOT===============\\
if($text == "📚تنظیم متن راهنما"){
savedatas($from_id,"settexthelp","data");
sendmessage($chat_id,"متن راهنما📚 را ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "settexthelp"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("help",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "⚙️تنظیم موجودی شماره"){
sendmessage($chat_id,"شماره مورد نظر را انتخاب کنید",'true',$setinfonumber);
}
//===============KING BOT===============\\
if($text == "ارسال همگانی📮"){
savedatas($from_id,"sendalltomessage","data");
sendmessage($chat_id,"
📮پیام خود را ارسال نمایید📮
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
● $channel ●
● $channel2 ●",'true',$backadmin);
}
elseif($kingnetwork == "sendalltomessage"){
savedatas($from_id,"none","data");
$user = file_get_contents("users.txt");
$array_user = explode("\n",$user);
foreach($array_user as $idm){
sendmessage($chat_id,"پیام شما با موفقیت به تمام کاربران ربات ارسال شد",'true',$backadmin);
}
}
//===============KING BOT===============\\
if($text == "📮فوروارد همگانی"){
savedatas($from_id,"sendalltoforward","data");
sendmessage($chat_id,"
📮پیام را فوروارد کنید📮
〰〰〰〰〰〰〰〰〰〰〰〰〰〰
● $channel ●
● $channel2 ●",'true',$backadmin);
}
elseif($kingnetwork == "sendalltoforward"){
savedatas($from_id,"none","data");
$user = file_get_contents("users.txt");
$array_user = explode("\n",$user);
foreach($array_user as $idm){
sendmessage($chat_id,"پیام شما با موفقیت به تمام کاربران ربات فوروارد شد",'true',$backadmin);
}
}

//===============KING BOT===============\\
if($text == "🔮تنظیم موجودی"){
sendmessage($chat_id,"جهت افزودن موجودی از /add USERID MO بجای USERID ایدی عددی کاربر و بجای MO تعداد موجودی که قصد افزودنش را دارید \n\n\n جهت کسر موجودی از /kasr USERID MO استفاته کنید بجای USERID ایدی عددی و بجای Mo تعداد موجودی که قصد دارید کم شود");
}
if(strpos($text,"/kasr ") !== false){
$xmls = simplexml_load_file("data/mo.xml");
$data = explode(" ",$text);
$userid = $data['1'];
$userid = str_replace(array("1","2","3","4","5","6","7","8","9","0"), array('q','w','e','r','t','y','u','i','o','p'), $userid);
$m_o = $data['2'];
$dn = $xmls->$userid - $m_o;
savedatas($userid,"$dn","mo");
sendmessage($chat_id,"با موفقیت انجام شد");
}
//===============KING BOT===============\\
if(strpos($text,"/add ") !== false){
$xmls = simplexml_load_file("data/mo.xml");
$data = explode(" ",$text);
$userid = $data['1'];
$userid = str_replace(array("1","2","3","4","5","6","7","8","9","0"), array('q','w','e','r','t','y','u','i','o','p'), $userid);
$m_o = $data['2'];
$dn = $xmls->$userid + $m_o;
savedatas($userid,"$dn","mo");
sendmessage($chat_id,"با موفقیت تعداد $m_o سکه به حساب ".str_replace(array('q','w','e','r','t','y','u','i','o','p'),array("1","2","3","4","5","6","7","8","9","0"),$userid)."اضافه شد.",'true',$backadmin);
}
//===============KING BOT===============\\
if($text == "تنظیم متن قوانین📚"){
savedatas($from_id,"settextvip","data");
sendmessage($chat_id,"متن را ارسال کنید استفاده از کلمات کلیدی زیر سبب جایگزینی مقدار تعیین شده از سوی سرور میشود.
FIRSTNAME = نمایش اسم کاربر
CHATID = نمایش شناسه عددی کاربر
LASTNAME = نمایش اسم خانوادگی کاربر

کلمات کلیدی در متن با حتما کلمات بزرگ لاتین باشند در غیر این صورت کار ساز نیست
",'true',$backadmin);
}
elseif($kingnetwork == "settextvip"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("textgetmo",$text,"data");
savedatas($from_id,"none","data");
}
    
//===============KING BOT===============\\
if($text == "🇷🇺روسیه🇷🇺"){
savedatas($from_id,"setnumberrus","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberrus"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("russia",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇵🇭فیلیپین🇵🇭"){
savedatas($from_id,"setnumberphili","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberphili"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("phli",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇲🇲میانمار🇲🇲"){
savedatas($from_id,"setnumbermianmar","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumbermianmar"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("mianmar",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇮🇹ایتالیا🇮🇹"){
savedatas($from_id,"setnumberitaly","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberitaly"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("italy",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇦🇫افغانستان🇦🇫"){
savedatas($from_id,"setnumberafghan","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberafghan"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("afghan",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇵🇹پرتغال🇵🇹"){
savedatas($from_id,"setnumberporte","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberporte"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("porte",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇬🇧انگلستان🇬🇧"){
savedatas($from_id,"setnumberuk","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberuk"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("uk",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇲🇴ماکائو🇲🇴"){
savedatas($from_id,"setnumbermaka","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumbermaka"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("maka",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇭🇰هنگ کنگ🇭🇰"){
savedatas($from_id,"setnumberhongkong","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberhongkong"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("hongkong",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇹🇭تایلند🇹🇭"){
savedatas($from_id,"setnumberthilan","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberthilan"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("thilan",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇵🇪پرو🇵🇪"){
savedatas($from_id,"setnumberpronum","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberpronum"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("pronum",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇫🇷فرانسه🇫🇷"){
savedatas($from_id,"setnumberfrance","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberfrance"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("france",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇸🇦عربستان🇸🇦"){
savedatas($from_id,"setnumberarabic","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberarabic"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("arabic",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇳🇬نیجریه🇳🇬"){
savedatas($from_id,"setnumberniger","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberniger"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("niger",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇪🇸اسپانیا🇪🇸"){
savedatas($from_id,"setnumberspain","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberspain"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("spain",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇺🇸آمریکا🇺🇸"){
savedatas($from_id,"setnumberusa","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberusa"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("usa",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇯🇲جامائیکا🇯🇲"){
savedatas($from_id,"setnumberjama","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberjama"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("jama",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇮🇪ایرلند🇮🇪"){
savedatas($from_id,"setnumberirlan","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberirlan"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("irlan",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇮🇱اسرائیل🇮🇱"){
savedatas($from_id,"setnumberisraee","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberisraee"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("israee",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇪🇪استونی🇪🇪"){
savedatas($from_id,"setnumberesto","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberesto"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("esto",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇨🇦کانادا🇨🇦"){
savedatas($from_id,"setnumbercana","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumbercana"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("cana",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇨🇳چین🇨🇳"){
savedatas($from_id,"setnumberchain","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberchain"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("chain",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇹🇷ترکیه🇹🇷"){
savedatas($from_id,"setnumberturk","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberturk"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("turk",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇨🇭سوئیس🇨🇭"){
savedatas($from_id,"setnumbersoee","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumbersoee"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("soee",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇦🇷آرژانتین🇦🇷"){
savedatas($from_id,"setnumberargan","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberargan"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("argan",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇦🇿آذربایجان🇦🇿"){
savedatas($from_id,"setnumberazar","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberazar"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("azar",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇩🇿الجزایر🇩🇿"){
savedatas($from_id,"setnumberalgazir","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberalgazir"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("algazir",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇧🇷برزیل🇧🇷"){
savedatas($from_id,"setnumberbrazil","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberbrazil"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("brazil",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇩🇪آلمان🇩🇪"){
savedatas($from_id,"setnumbergerman","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumbergerman"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("german",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇮🇳هند🇮🇳"){
savedatas($from_id,"setnumberindia","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberindia"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("india",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇯🇵ژاپن🇯🇵"){
savedatas($from_id,"setnumberjapan","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberjapan"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("japan",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇿🇦آفریقا جنوبی🇿🇦"){
savedatas($from_id,"setnumberafrica","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumberafrica"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("africa",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🇸🇪سوئد🇸🇪"){
savedatas($from_id,"setnumbersoed","data");
sendmessage($chat_id,"مقدار را به صورت عدد ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "setnumbersoed"){
sendmessage($chat_id,"تنظیم شد",'true',$backadmin);
savedatas("soed",$text,"data");
savedatas($from_id,"none","data");
}
//===============KING BOT===============\\
if($text == "🎈ساخت کد هدیه🎈"){
savedatas($from_id,"createcodevip","data");
sendmessage($chat_id,"کد را ارسال کنید",'true',$backadmin);
}
if($kingnetwork == "createcodevip"){
sendmessage($chat_id,"تنظیم شد مقدار موجودی کد را ارسال کنید");
savedatas("codevip",$text,"data");
savedatas($from_id,"setmocodevip","data");
}
if($kingnetwork == "setmocodevip"){
sendmessage($chat_id,"ساخته شد این کد از این پس توسط هر کس وارد گردد موجودی $text را دریاف میکند",'true',$backadmin);
savedatas("codevipmo",$text,"data");
savedatas($from_id,"none","data");
}
}
//===============KING BOT===============\\
?>
