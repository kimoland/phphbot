<!--

    [[[[[[[[[[[[[[[:KING:]]]]]]]]]]]]]]]
    [:::::::::::::[[[US]]]:::::::::::::]
    [::::::::::::[[[JOIN]]]::::::::::::]
    [:::::[[[[[[[[:NETWORK:]]]]]]]:::::]
    [:::::[                      ]:::::]
    [:::::[                      ]:::::]
    [:::::[     @king_network7   ]:::::]
    [:::::[     @king_source7    ]:::::]
    [:::::[     @king_movie7     ]:::::]
    [:::::[                      ]:::::]
    [:::::[                      ]:::::]
    [:::::[[[[[[[[:NETWORK:]]]]]]]:::::]
    [::::::::::::[[[JOIN]]]::::::::::::]
    [:::::::::::::[[[US]]]:::::::::::::]
    [[[[[[[[[[[[[[[:KING:]]]]]]]]]]]]]]]

-->
<?php
ini_set("log_errors" , "off");
set_time_limit(0);
flush();
$API_KEY = '1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA';
$admin = array('710732845','710732845');
$gapsupport = -123456789;
$host = "https://viptmail.ir/po";
$idrobot = "KingMovieFileBot";
$channel = "hslu78tvhos254";
$GetINFObot = json_decode(file_get_contents("https://api.telegram.org/bot".$API_KEY."/getMe"));
$botids = $GetINFObot->result->username;
//===============KING BOT===============\\
define('API_KEY', $API_KEY);
function bot($method, $datas = [])
{
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
}
}
function SendMessage($chatid, $text, $parsmde, $disable_web_page_preview, $mode, $reply, $keyboard = null){bot('sendMessage', ['chat_id' => $chatid,'text' => $text,'parse_mode' => $parsmde,'disable_web_page_preview' => $disable_web_page_preview,'reply_markup' => $keyboard]);}
function ForwardMessage($chatid, $from_chat, $message_id){bot('ForwardMessage', ['chat_id' => $chatid,'from_chat_id' => $from_chat,'message_id' => $message_id]);}
function deletemessage($chat_id, $message_id){bot('deletemessage', ['chat_id' => $chat_id,'message_id' => $message_id,]);}
function SendPhoto($chatid, $photo, $keyboard, $caption){bot('SendPhoto', ['chat_id' => $chatid,'photo' => $photo,'caption' => $caption,'reply_markup' => $keyboard]);}
function SendAudio($chatid, $audio, $keyboard, $caption, $sazande, $title){bot('SendAudio', ['chat_id' => $chatid,'audio' => $audio,'caption' => $caption,'performer' => $sazande,'title' => $title,'reply_markup' => $keyboard]);}
function SendDocument($chatid, $document, $keyboard, $caption){bot('SendDocument', ['chat_id' => $chatid,'document' => $document,'caption' => $caption,'reply_markup' => $keyboard]);}
function SendSticker($chatid, $sticker, $keyboard){bot('SendSticker', ['chat_id' => $chatid,'sticker' => $sticker,'reply_markup' => $keyboard]);} 
function SendVideo($chatid, $video, $keyboard, $duration){bot('SendVideo', ['chat_id' => $chatid,'video' => $video,'duration' => $duration,'reply_markup' => $keyboard]);}
function SendVoice($chatid, $voice, $keyboard, $caption){bot('SendVoice', ['chat_id' => $chatid,'voice' => $voice,'caption' => $caption,'reply_markup' => $keyboard]);}
function SendContact($chatid, $first_name, $phone_number, $keyboard){bot('SendContact', ['chat_id' => $chatid,'first_name' => $first_name,'phone_number' => $phone_number,'reply_markup' => $keyboard]);}
function SendAction($chatid, $action){bot('sendAction', ['chat_id' => $chatid,'action' => $action]);}
function EditMessageText($chat_id, $message_id, $text, $parse_mode, $disable_web_page_preview, $keyboard){bot('editMessagetext', ['chat_id' => $chat_id,'message_id' => $message_id,'text' => $text,'parse_mode' => $parse_mode,'disable_web_page_preview' => $disable_web_page_preview,'reply_markup' => $keyboard]);}
function GetChatMember($chatid,$userid){
$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
$tch = $truechannel->result->status;
return $tch;
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
//===============KING BOT===============\\
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$name = $update->message->from->first_name;
$last = $update->message->from->last_name;
$username = $update->message->from->username;
$from_username = $update->message->from->username;
$from_first = $update->message->from->first_name;
$forward_id = $update->message->forward_from->id;
$forward = $update->message->forward_from;;
$c_id = $message->forward_from_chat->id;
$data_id = $update->callback_query->from->id;
$data_username = $update->callback_query->from->username;
$forward_id = $update->message->forward_from->id;
$data_first = $update->callback_query->from->first_name;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
$reply = $update->message->reply_to_message;
$from_chat_msg_id = $update->message->forward_from_message_id;
$from_chat_username = $update->message->forward_from_chat->username;
$text = $message->text;
mkdir("data");
mkdir("data/$from_id");
$user = json_decode(file_get_contents("data/set/userss.json"),true);
$users = json_decode(file_get_contents("data/set/datass.json"),true);
@$block = file_get_contents("admin/info/BlockMember.txt");
@$kingnet = file_get_contents("data/$chat_id/king.txt");
@$list = file_get_contents("admin/info/member.txt");
$create = file_get_contents("data/$chat_id/create.txt");
$cre = file_get_contents("data/$chat_id/cre.txt");
$gold = file_get_contents("data/$chat_id/gold.txt");
$goldacc = file_get_contents("data/$chat_id/goldacc.txt");
$wait = file_get_contents("data/$chat_id/wait.txt");
$listtbots = file_get_contents("data/$chat_id/create.txt");
$on_off = file_get_contents("data/on-off.txt");
$tokenbot =  file_get_contents("data/$from_id/set/bottoken.txt");
$url =  file_get_contents("data/$from_id/set/url.txt");
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$fromm_id = $update->inline_query->from->id;
$fromm_user = $update->inline_query->from->username;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$JoinChannel = GetChatMember("@$channel",$data_id);
$supoort =file_get_contents("supoort.txt");
$now = date('h:i:s');
//===============KING BOT===============\\
$keybord_1 = json_encode([
'inline_keyboard' => [
[['text' => "✅ساخت ربات✅", 'callback_data' => "createbot"]],
[['text' => "قوانین⚠️", 'callback_data' => "stop"],['text' => "⚠️راهنما", 'callback_data' => "help"]],
[['text' => "⚙️حساب شما⚙️", 'callback_data' => "youraccount"]],
[['text' => "لینک امتیاز گیری⚜️", 'callback_data' => "link"],['text' => "⚜️امکانات ربات ساز", 'callback_data' => "amazing"]],
[['text' => "پشتیبانی💯", 'callback_data' => "support"],['text' => "💯گزارش تخلف", 'callback_data' => "reportbot"]],
[['text' => "💠کانال ما💠", 'url' => "https://t.me/$channel"]],
]
]);
$button_lang = json_encode([
'inline_keyboard' => [
[['text' => "🇮🇷پارسی🇮🇷", 'callback_data' => "persian"]],
]
]);
$delete = json_encode([
'inline_keyboard' => [
[['text'=>"{$listtbots}",'callback_data'=>"delete bot"]],
[['text'=>"🔙منوی اصلی🔙",'callback_data'=>"home"]],
]
]);
$webhoook = json_encode([
'inline_keyboard' => [
[['text'=>"♻️ست وب هوک♻️",'callback_data'=>"setwebhook"]],
[['text' => "🔖️راهنما🔖️", 'callback_data' => "helpweb"]],
[['text'=>"🔙منوی اصلی🔙",'callback_data'=>"home"]],
]
]);
//===============KING BOT===============\\
if($on_off == 'false' and $from_id != $admin){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "کاربر گرامی ربات ساز به دلیل بروزرسانی خاموش میباشد!
🆔 @$channel
🆔 @$botids",
]);
}
//===============KING BOT===============\\
elseif(preg_match('/^\/([Ss]tart)(.*)/',$text)){
preg_match('/^\/([Ss]tart)(.*)/',$text,$match);
$match[2] = str_replace(" ","",$match[2]);
$match[2] = str_replace("\n","",$match[2]);
if($match[2] != null){
if (strpos($list , "$chat_id") == false){
if($match[2] != $chat_id){
if (strpos($gold , "$chat_id") == false){
$txxt = file_get_contents('data/'.$match[2]."/gold.txt");
$pmembersid= explode("\n",$txxt);
if (!in_array($chat_id,$pmembersid)){
$aaddd = file_get_contents('data/'.$match[2]."/gold.txt");
file_get_contents("data/".$match[2]."/gold.txt",$aaddd+1);
}
SendMessage($match[2],"🆕 یک نفر با لینک اختصاصی شما وارد ربات شد");
}
}
}
}
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "🇮🇷لطفا زبان خود را انتخاب کنید :
✏️@$botids",
'parse_mode' => "MarkDown",
'reply_markup' => $button_lang
]);	
}
//===============KING BOT===============\\
elseif ($data == "persian") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
file_put_contents("data/$chat_id/king.txt", "No");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "سلام $name
زبان پارسی تنظیم شد
  🅾 با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه یا وبسایت خود ایجاد کنید.

⚛ برای ساخت ربات دکمه (✅ایجاد ربات✅) رو بزنید 
✏️@$botids",
'parse_mode' => "MarkDown",
'reply_markup' => $keybord_1
]);	
}
//===============KING BOT===============\\
elseif ($data == "webhook") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
file_put_contents("data/$chat_id/king.txt", "No");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "سلام $name
به راحتی ربات خود را به صورت خودکار ست وبهوک کنید 🤠❤️
✏️@$botids",
'parse_mode' => "MarkDown",
'reply_markup' => $webhoook
]);	
}
//===============KING BOT===============\\
elseif ($data == "deleterobot") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
file_put_contents("data/$chat_id/king.txt", "No");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "لطفا یکی از ربات خود را از گزینه های زیر انتخاب نمایید✔️
⚠️توجه شما فقط میتوانید آخرین ربات خود را حذف کنید.
✏️@$botids",
'parse_mode' => "MarkDown",
'reply_markup' => $delete
]);	
}
//===============KING BOT===============\\
elseif ($data == "home") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
file_put_contents("data/$chat_id/king.txt", "No");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "سلام $name
  🅾 با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه یا وبسایت خود ایجاد کنید.

⚛ برای ساخت ربات دکمه (✅ایجاد ربات✅) رو بزنید 
✏️@$botids",
'parse_mode' => "MarkDown",
'reply_markup' => $keybord_1
]);	
}
//===============KING BOT===============\\
elseif ($data == "link") {
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text'=>"سلام😊🌹

حتما دیدی که بعضی از کاربر های تلگرام روی بیوگرافی یا اسمشون ساعت وجود داره
تو هم دوست داری این کار رو انجام بدی ولی یا زمان نداری یا دانش کافی
😊من ربات ساز کینگ نتورک رو بهت پیشنهاد میکنم
-ساخت ربات های api و cli🔘
-کاملا رایگان🗣
-دارای تنظیمات فوق حرفه ای⚙️
-پروفایل حرفه ای📫
-پشتیبانی قوی و 24 ساعته☎️
-سرعت فوق العاده🌐

برای ساخت ربات کاملا هوشمند کافیست روی کلمه آبی رنگ زیر کلیک یا لمس کنی😍👇
[ساخت ربات هوشمند](https://telegram.me/$botids?start=$chatid)
🆔 @$channel
🆔 @$botids",
]);
}
//===============KING BOT===============\\
elseif ($data == "daryaftpayam") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "کمی صبر کنید",
'show_alert' => false
]);
$supporthelp = file_get_contents("data/$chatid/pasokh1.txt");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "پیام مدیریت🔖
➖➖➖
$supporthelp
➖➖➖
موفق باشید🤷‍♂️",
]);
}
//===============KING BOT===============\\
elseif ($data == "help") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "1⃣ ابتدا به ربات ( @BotFather ) مراجعه کنید
2⃣ دستور /newbot رو ارسال کنید
3⃣ یک نام برای ربات ارسال کنید
4⃣ پس از ارسال نام،یک یوزرنیم ارسال کنید
❌ توجه کنین حتما باید در آخر یوزرنیم ارسالی کلمه bot با حروف کوچیک یا بزرگ (فرقی نداره) وجود داشته باشه
5⃣ اگر با پیغام زیر برخورد کردید
Sorry, this username is already taken. Please try something different.
یعنی قبلا یکی این یوزرنیم رو ثبت کرده یوزرنیم دیگری وارد کنید. اگر این پیغام رو دریافت نکردید یعنی کار حل است
6⃣ حالا به این ربات مراجعه کنید و دکمه (ساخت ربات🔖) رو بزنید
7⃣ سپس پیام آخری که از ربات ( @BotFather ) دریافت کردید رو فوروارد کنید
8⃣ ربات شما با موفقیت ثبت شد
🆔 @$channel
🆔 @$botids",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "helpweb") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "1⃣ ابتدا به ربات ( @BotFather ) مراجعه کنید
2⃣ دستور /newbot رو ارسال کنید
3⃣ یک نام برای ربات ارسال کنید
4⃣ پس از ارسال نام،یک یوزرنیم ارسال کنید
❌ توجه کنین حتما باید در آخر یوزرنیم ارسالی کلمه bot با حروف کوچیک یا بزرگ (فرقی نداره) وجود داشته باشه
5⃣ اگر با پیغام زیر برخورد کردید
Sorry, this username is already taken. Please try something different.
یعنی قبلا یکی این یوزرنیم رو ثبت کرده یوزرنیم دیگری وارد کنید. اگر این پیغام رو دریافت نکردید یعنی کار حل است
6⃣ حالا به این ربات مراجعه کنید و دکمه (ساخت ربات🔖) رو بزنید
7⃣ سپس پیام آخری که از ربات ( @BotFather ) دریافت کردید رو فوروارد کنید
8⃣ ربات شما با موفقیت ثبت شد

اینجا ربات ادرس جایی رو میخاد که سورس شما ذخیره شده 🤚 

مثل 😀
https://king-network7.de/robot/index.php

🆔 @$channel
🆔 @$botids",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "stop") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "ℹ قوانین استفاده از ربات:

☢ همه مطالب باید تابع قوانین جمهوری اسلامی ایران باشد.
☢ رعایت ادب و احترام به کاربران.
☢ ساخت هرگونه ربات در ضمیمه +18 خلاف قوانین ربات میباشد و در صورت مشاهده ربات مورد نظر مسدود و همچنین مدیر ربات از تمامی ربات ها بلاک میشود.
☢ مسئولیت پیام های رد و بدل شده در هر ربات با مدیر آن میباشد و ما هیچگونه مسئولیتی نداریم.
☢ در صورت مشاهده استفاده از قابلیت های ربات در جهات منفی به شدت برخورد میشود.
☢ اگر به هر دلیلی درخواست های ربات شما به سرور ما بیش از حد معمول باشد (و حساب ربات ویژه نباشد) چند باری به شما اخطار داده میشود اگر این اخطار ها نادیده گرفته شوند ربات شما مسدود و به هیچ عنوان از محدودیت خارج نمیشود.

🆔 @$channel
🆔 @$botids",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "amazing") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "🔖-پیامتون رو به بقیه فوروارد کنید و یا به صورت ناشناس بفرستی🗣
-bمشاهده دقیق امار کاربران
-ساخت گروه برای مدیریت ربات توسط چندنفر👥
-دارای تنظیمات فوق حرفه ای⚙️
-بکاپ گیری و حذف کامل اطلاعات ربات💾
-پروفایل حرفه ای📫
-پشتیبانی قوی و 24 ساعته☎️
-سرعت فوق العاده🌐:
🆔 @$channel
🆔 @$botids",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "setwebhook") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "tokenbot");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "توکن خود را ارسال کنید!",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
if ($kingnet == 'tokenbot') {
$bottoken = $text;
$getinfotoken1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $bottoken . "/getwebhookinfo"));
$getinfotoken2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $bottoken . "/getme"));
$Eight2 = objectToArrays($getinfotoken1);
$ur = $Eight2["result"]["url"];
$yes2 = $Eight2["ok"];
$Eight1 = objectToArrays($getinfotoken2);
$un = $Eight1["result"]["username"];
$fr = $Eight1["result"]["first_name"];
$id = $Eight1["result"]["id"];
$ok = $Eight1["ok"];
if ($ok != 1) {
sendMessage($chat_id, "کاربر عزیز

توکن ارسال شده نامعتبر است 🙁😢

لطفا با دقت بیشتری ارسال نمایید 🙂

و یا از دکمه ( راهنما 🔖 ) آموزش گرفتن توکن و استفاده از ربات را بگیرید 🛠");
} else{
file_put_contents("data/$chatid/king.txt","url");
file_put_contents("data/$from_id/set/bottoken.txt",$text);
sendAction($chat_id, 'typing');
bot('sendMessage', [
'chat_id' => $chat_id,
'text'=>"آفرین 🙃
تا اینجا خوب آومدی 😃

حالا باید آدرس سورستون رو ارسال نمایید 😉

نمونه 👇
https://king-network7.de/robot/index.php",
]);
}
}
elseif($kingnet == "url"){
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text))
{
SendAction($chat_id,'typing');
bot('sendMessage', [
'chat_id' => $chat_id,
'text'=>"آدرس ارسالی شما نامعتبر است 😕
لطفا آدرس را به درستی ارسال نمایید 🙂",
]);
}
else {
file_put_contents("data/$chatid/king.txt","no");
file_put_contents("data/$from_id/set/url.txt",$text);
bot('sendMessage', [
'chat_id' => $chat_id,
'text'=>"Loading | کمی صبر کنید 🙂",
]);
sleep(1);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2, + 1,
'text'=>"Loading | کمی صبر کنید 🙂"
]);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2, + 1,
'text'=>"خب کاربر عزیز 🙂

توکن ربات شما 😶
$tokenbot 

آدرس هاست شما 🤚

$text

جهت ست وبهوک دستور زیر را ارسال نمایید /SetBot 😶",
]);
}
} 
elseif($text == "/SetBot" ){
if($tokenbot != "no"){
bot('sendMessage', [
'chat_id' => $chat_id,
'text'=>"کمی صبر کنید 😸 | Loding...",
]);
sleep(1);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2, + 1,
'text'=>"چیزی نمونده الان رباتت ست میشه 😄😝",
]);
file_get_contents("https://api.telegram.org/bot$tokenbot/setwebhook?url=$url"); 
sleep(1);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2, + 1,
'text'=>"ربات شما با موفقیت ست وبهوک شد 🙂",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
}
//===============KING BOT===============\\
elseif ($data == "support") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "supprots");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "پیام خود را ارسال کنید!",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
if ($kingnet == 'supprots') {
file_put_contents("data/$chat_id/king.txt", "no");
bot('sendMessage', [
'chat_id' => "$gapsupport",
'text' => "
پیام جدید ارسال شد🤷‍♂️ 
➖➖➖ 
متن ارسال شده : $text
➖➖➖",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "اطلاعات ارسال کننده🔅", 'callback_data' => "king_network7"]],
[['text' => "آیدی عددی فرد🆔", 'callback_data' => "king_network7"], ['text' => "$from_id", 'callback_data' => "king_network7"]],
[['text' => "آیدی تلگرامیش💠", 'url' => "https://t.me/$username"]],
]
])
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "پیام ارسال گردید هر چه سریع تر پاسخ خواهیم داد!",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
} 
//===============KING BOT===============\\
elseif ($data == "reportbot") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "report");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "⭕️لطفا یوزر آیدی ربات متخلف را ارسال کنید",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
if ($kingnet == 'report') {
if(preg_match('/^(@)(.*)([Bb][Oo][Tt])/s',$text)){
file_put_contents("data/$chat_id/king.txt", "no");
bot('sendMessage', [
'chat_id' => "$gapsupport",
'text' => "گزارش تخلف صورت گرفت😑🤐😱
➖➖➖
آیدی ربات متخلف : $text
➖➖➖
🆔 @$channel
🆔 @$botids",
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "✅ ثبت شد
	✅ به زودی به درخواست شما رسیدگی میشود",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
else{
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "⭕️ خطا !!!
	⭕️ دقت کنین یوزرنیم ربات با @ شروع شده و با کلمه (bot) پایان میابد",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
}
//===============KING BOT===============\\
elseif ($data == "youraccount") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "اطلاعات اکانت شما به شرح زیر است
🆔 @$channel
🆔 @$botids",
'reply_markup' => json_encode([
'inline_keyboard' => [
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"👤》نام شما > {$name}",'callback_data'=>"Slm"],['text'=>"👤》ایدی شما > {@$username}",'url'=>"http://t.me/$username"]
],
[
['text'=>"📱》شناسه شما > {$from_id}",'callback_data'=>"Slm"],['text'=>"📡》ربات شما > {$listtbots}",'url'=>"http://t.me/$listtbots"]
],
[
['text'=>"💫》امتیاز شما > {$gold}",'callback_data'=>"fg"]]
],
[
['text'=>"⚙️》وضیعت شما > { ✅فعال✅}",'callback_data'=>"fal"]
],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "id2user") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "📲شناسه عددی شما 

ID = `$from_id`",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "createbot") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "سلام دوست عزیز
لطفا نوع رباتی که میخواهید بسازید را انتخاب کنید♥",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "⭕️API⭕️", 'callback_data' => "apibot"]],
[['text' => "♻️CLI♻️", 'callback_data' => "clibot"]],
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "clibot") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "سلام دوست عزیز
لطفا نوع رباتی که میخواهید بسازید را انتخاب کنید♥",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "📍ساخت ربات ساعت در بیو📍", 'callback_data' => "timebioclicreatebot"]],
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "apibot") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "سلام دوست عزیز
لطفا نوع رباتی که میخواهید بسازید را انتخاب کنید♥",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋ساخت ربات پیام رسان♋", 'callback_data' => "pvapicreatebot"]],
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "pvapicreatebot") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "create bot pv");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "✅ توکن ربات مورد نظر رو ارسال کنید یا میتونین پیام حاوی توکن رو از ( @BotFather ) فوروارد کنید",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "timebioclicreatebot") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "لطفا کمی صبر کنید💎",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "create bot time bio");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "✅ توکن ربات مورد نظر رو ارسال کنید یا میتونین پیام حاوی توکن رو از ( @BotFather ) فوروارد کنید",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}
//===============KING BOT===============\\
if ($kingnet == 'create bot pv') {
if($update->message->forward_from != null){
$rep = strchr($text,"Use this token to access the HTTP API:");
$rep = str_replace("Use this token to access the HTTP API:",'',$rep);
$rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
$rep = str_replace("\n",'',$rep);
$token = $rep;
}else{
$token = $text;
}
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
$resultb = objectToArrays($userbot);
$username_bot = $resultb["result"]["username"];
$id_bot = $resultb["result"]["id"];
$first_bot = $resultb["result"]["first_name"];
$ok = $resultb["ok"];
if($ok != 1) {
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "‼️دوست عزیز توکن مورد نظر نامعتبر است.

⭕️لطفا با دقت بیشتر یک توکن صحیح بفرستید:",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}else{
if($username == null){
$username = $first;
}else{
$username = "@".$username;
}
if(file_exists("Bot/$username_bot")){
file_put_contents("data/$chatid/king.txt", "no");
file_put_contents("admin/admin-token/token/$username_bot.txt",$token);
file_put_contents("admin/admin-token/admin/$username_bot.txt",$chat_id);
$class = file_get_contents("admin/source/api/pvsource/Class.php");
$class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("admin/bot/$username_bot/Class.php",$class);
$index = file_get_contents("admin/source/api/pvsource/index.php");
file_put_contents("admin/bot/$username_bot/index.php",$index);
$button = file_get_contents("admin/source/api/pvsource/Button.php");
file_put_contents("admin/bot/$username_bot/other/Button.php",$button);	
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=$host/admin/bot/$username_bot/index.php");
file_put_contents("data/$chat_id/king.txt", "No");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "ربات شما با موفیقت روی سرور ما متصل شد🌀

برای ورود روی دکمه زیر بزنید!",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text'=>"🔯ورود به ربات🔯",'url'=>"https://telegram.me/$username_bot"]],
]
])
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟",
'parse_mode' => "MarkDown",
'reply_markup' => $keybord_1
]);
}
else{
if($create == 'true' and $from_id != $admin){
file_put_contents("data/$chatid/king.txt", "no");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "با زیر مجموعه گیری ربات خود را رایگان ویژه کنید",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "ورود به ربات پشتیبانی🔰", 'url' => "https://t.me/$supoort"]],
]
])
]);
}
else{
file_put_contents("data/$chatid/king.txt", "no");
file_put_contents("data/$chatid/create.txt", "true");
mkdir("admin/bot/$username_bot");
mkdir("admin/bot/$username_bot/other");
mkdir("admin/bot/$username_bot/other/$from_id");
mkdir("admin/bot/$username_bot/other/access");
mkdir("admin/bot/admin/bot/$username_bot/other/button");
mkdir("admin/bot/$username_bot/other/profile");
mkdir("admin/bot/$username_bot/other/setting");
mkdir("admin/bot/$username_bot/other/wordlist");
mkdir("admin/bot/$username_bot/other/button/caption");
mkdir("admin/bot/$username_bot/other/button/file");
mkdir("admin/bot/$username_bot/other/button/forward");
mkdir("admin/bot/$username_bot/other/button/music");
mkdir("admin/bot/$username_bot/other/button/photo");
mkdir("admin/bot/$username_bot/other/button/feed");
mkdir("admin/bot/$username_bot/other/button/sticker");
mkdir("admin/bot/$username_bot/other/button/text");
mkdir("admin/bot/$username_bot/other/button/video");
mkdir("admin/bot/$username_bot/other/button/voice");
file_put_contents("admin/bot/$username_bot/other/setting/start.txt","Hi!✋ 
<b>Welcome To My Bot</b>");
file_put_contents("admin/bot/$username_bot/other/setting/send.txt","<b>Sent To My Admin!</b>");
file_put_contents("admin/bot/$username_bot/other/setting/bot_type.txt","gold");
file_put_contents("admin/bot/$username_bot/other/setting/sticker.txt","✅");
file_put_contents("admin/bot/$username_bot/other/setting/file.txt","✅");
file_put_contents("admin/bot/$username_bot/other/setting/aks.txt","✅");
file_put_contents("admin/bot/$username_bot/other/setting/music.txt","✅");
file_put_contents("admin/bot/$username_bot/other/setting/film.txt","✅");
file_put_contents("admin/bot/$username_bot/other/setting/voice.txt","✅");
file_put_contents("admin/bot/$username_bot/other/setting/join.txt","✅");
file_put_contents("admin/bot/$username_bot/other/setting/link.txt","✅");
file_put_contents("admin/bot/$username_bot/other/setting/forward.txt","✅");
file_put_contents("admin/bot/$username_bot/other/setting/pm_forward.txt","⛔️");
file_put_contents("admin/bot/$username_bot/other/setting/pm_resani.txt","✅");
file_put_contents("admin/bot/$username_bot/other/setting/on-off.txt","true");
file_put_contents("admin/bot/$username_bot/other/setting/profile.txt","✅");
file_put_contents("admin/bot/$username_bot/other/setting/contact.txt","⛔️");
file_put_contents("admin/bot/$username_bot/other/setting/location.txt","⛔️");
file_put_contents("admin/admin-token/token/$username_bot.txt",$token);
file_put_contents("admin/admin-token/admin/$username_bot.txt",$chat_id);
file_put_contents("data/$chatid/create.txt", "true");
$class = file_get_contents("admin/source/api/pvsource/Class.php");
$class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
file_put_contents("admin/bot/$username_bot/Class.php",$class);
$index = file_get_contents("admin/source/api/pvsource/index.php");
file_put_contents("admin/bot/$username_bot/index.php",$index);
$button = file_get_contents("admin/source/api/pvsource/Button.php");
file_put_contents("admin/bot/$username_bot/other/Button.php",$button);	
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=$host/admin/bot/$username_bot/index.php");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "ربات شما با موفیقت روی سرور ما متصل شد🌀

برای ورود روی دکمه زیر بزنید!",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text'=>"🔯ورود به ربات🔯",'url'=>"https://telegram.me/$username_bot"]],
]
])
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟",
'parse_mode' => "MarkDown",
'reply_markup' => $keybord_1
]);
$txxt = file_get_contents('admin/info/Bots.txt');
$pmembersid= explode("\n",$txxt);
if (!in_array($username_bot,$pmembersid)){
$aaddd = file_get_contents('admin/info/Bots.txt');
$aaddd .= $username_bot."\n";
file_put_contents('admin/info/Bots.txt',$aaddd);
}
}
}
}
}
//===============KING BOT===============\\
if ($kingnet == 'create bot time bio') {
if($update->message->forward_from != null){
$rep = strchr($text,"Use this token to access the HTTP API:");
$rep = str_replace("Use this token to access the HTTP API:",'',$rep);
$rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
$rep = str_replace("\n",'',$rep);
$token = $rep;
}else{
$token = $text;
}
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
$resultb = objectToArrays($userbot);
$username_bot = $resultb["result"]["username"];
$id_bot = $resultb["result"]["id"];
$first_bot = $resultb["result"]["first_name"];
$ok = $resultb["ok"];
if($ok != 1) {
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "‼️دوست عزیز توکن مورد نظر نامعتبر است.

⭕️لطفا با دقت بیشتر یک توکن صحیح بفرستید:",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔙منوی اصلی🔙", 'callback_data' => "home"]],
]
])
]);
}else{
if($username == null){
$username = $first;
}else{
$username = "@".$username;
}
if(file_exists("Bot/$username_bot")){
file_put_contents("data/$chatid/king.txt", "no");
file_put_contents("admin/admin-token/token/$username_bot.txt",$token);
file_put_contents("admin/admin-token/admin/$username_bot.txt",$chat_id);
$index = file_get_contents("admin/source/cli/timebiosource/index.php");
$index = str_replace("[*[TOKEN]*]",$token,$index);
$index = str_replace("[*[ADMIN]*]",$from_id,$index);
$index = str_replace("[*[HOST]*]",$host,$index);
$index = str_replace("[*[BOTUSER]*]",$username_bot,$index);
$index = str_replace("[*[KINGBOTUSER]*]",$idrobot,$index);
$index = str_replace("[*[CHANNEL]*]",$channel,$index);
file_put_contents("admin/bot/$username_bot/index.php",index);
$api = file_get_contents("admin/source/cli/timebiosource/index.php");
file_put_contents("admin/bot/line/$username_bot/api.php",$api);	
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=$host/admin/bot/$username_bot/index.php");
file_put_contents("data/$chat_id/king.txt", "No");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "ربات شما با موفیقت روی سرور ما متصل شد🌀

برای ورود روی دکمه زیر بزنید!",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text'=>"☢تنظیم شماره اکانت☢",'url'=>"$host/admin/bot/line/$username_bot/api.php"]],
[['text'=>"🔯لینک تنظیم کرون جاب🔯",'url'=>"$host/admin/bot/line/$username_bot/api.php "]],
[['text'=>"🔯ورود به ربات مدیریت اکانت🔯",'url'=>"https://telegram.me/$username_bot"]],
]
])
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟",
'parse_mode' => "MarkDown",
'reply_markup' => $keybord_1
]);
}
else{
if($create == 'true' and $from_id != $admin){
file_put_contents("data/$chatid/king.txt", "no");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "با زیر مجموعه گیری ربات خود را رایگان ویژه کنید",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "ورود به ربات پشتیبانی🔰", 'url' => "https://t.me/$supoort"]],
]
])
]);
}
else{
file_put_contents("data/$chatid/king.txt", "no");
file_put_contents("data/$chatid/create.txt", "true");
mkdir("admin/bot/$username_bot");
file_put_contents("admin/admin-token/token/$username_bot.txt",$token);
file_put_contents("admin/admin-token/admin/$username_bot.txt",$chat_id);
file_put_contents("data/$chatid/create.txt", "true");
$index = file_get_contents("admin/source/cli/timebiosource/index.php");
$index = str_replace("[*[TOKEN]*]",$token,$index);
$index = str_replace("[*[ADMIN]*]",$from_id,$index);
$index = str_replace("[*[HOST]*]",$host,$index);
$index = str_replace("[*[BOTUSER]*]",$username_bot,$index);
$index = str_replace("[*[KINGBOTUSER]*]",$idrobot,$index);
$index = str_replace("[*[CHANNEL]*]",$channel,$index);
file_put_contents("admin/bot/$username_bot/index.php",index);
$api = file_get_contents("admin/source/cli/timebiosource/line/api.php");
file_put_contents("admin/bot/line/$username_bot/api.php",$api);	
file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=$host/admin/bot/$username_bot/index.php");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "ربات شما با موفیقت روی سرور ما متصل شد🌀

برای ورود روی دکمه زیر بزنید!",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text'=>"☢تنظیم شماره اکانت☢",'url'=>"$host/admin/bot/line/$username_bot/api.php"]],
[['text'=>"🔯لینک تنظیم کرون جاب🔯",'url'=>"$host/admin/bot/line/$username_bot/api.php "]],
[['text'=>"🔯ورود به ربات مدیریت اکانت🔯",'url'=>"https://telegram.me/$username_bot"]],
]
])
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "↩️ به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟",
'parse_mode' => "MarkDown",
'reply_markup' => $keybord_1
]);
$txxt = file_get_contents('admin/info/Bots.txt');
$pmembersid= explode("\n",$txxt);
if (!in_array($username_bot,$pmembersid)){
$aaddd = file_get_contents('admin/info/Bots.txt');
$aaddd .= $username_bot."\n";
file_put_contents('admin/info/Bots.txt',$aaddd);
}
}
}
}
}
//===============KING BOT===============\\
if ($chatid == $admin or $chat_id == $admin) {
if ($text == "مدیریت") {	
sendAction($chat_id, 'typing');
var_dump(bot('sendPhoto',[
'chat_id'=>$update->message->chat->id,
'photo'=>"https://t.me/$username",
'caption'=>"سلام ادمین عزیز♂️😹

به پنل مدیریتت خوش آمدی😱 خودت دیگ همه چیو بلدی🌝🔰",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "ورود به پنل مدیریت❣️", 'callback_data' => "panelbot"]],
]
])
]));
}
//===============KING BOT===============\\
elseif ($data == "panelbot") {
bot('sendMessage', [
'chat_id' => $chatid,
'text' => "به پنل مدیریتت خوش آمدی ادمین عزیز😝❤",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔖آمار ربات🔖", 'callback_data' => "memberinfo"]],
[['text' => "پیام همگانی💎", 'callback_data' => "send"], ['text' => "💎فوروارد همگانی", 'callback_data' => "fwd"]],
[['text' => "🔰ارسال پیام🔰", 'callback_data' => "pasokh"]],
[['text' => "بلاک❌", 'callback_data' => "block"], ['text' => "✅انبلاک", 'callback_data' => "unblock"]],
[['text' => "😑ساخت ربات دوم😑", 'callback_data' => "creatwo"]],
[['text' => "تنظیم ربات پشتیبانی⭕️", 'callback_data' => "setsupportbot"],['text' => "⭕️تنظیم کانال", 'callback_data' => "setchannel"]],
[['text' => "🌀دریافت آیدی عددی🌀", 'callback_data' => "geus"]],
[['text'=>"خاموش کردن ربات❌",'callback_data'=>"off"],['text'=>"✅روشن کردن ربات",'callback_data'=>"on"]],
]
])
]);
}
//===============KING BOT===============\\
elseif($data == "on"){
file_put_contents("admin/on-off.txt","true");
bot('sendMessage',[
'chat_id'=>$chatid,
'text'=>"ربات روشن شد✅",
'parse_mode'=>"MarkDown",
]);
}
//===============KING BOT===============\\
elseif($data == "off"){
file_put_contents("admin/on-off.txt","false");
bot('sendmessage',[
'chat_id' => $chatid,
'text' => "ربات خاموش شد❌",
'parse_mode'=>"MarkDown",
]);
}
//===============KING BOT===============\\
if($data == "setchannel"){
sendaction($chat_id, typing);
 file_put_contents("data/$chat_id/sinalfa.txt","setchannels");
$channels = file_get_contents("data/$chat_id/channelid.txt");
   S_A_F_T('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"اول از همه ربات را در کانال خودتان ادمین کنید✔️

بعدی ایدی  کانال خود رو بدون @ زیر بفرستید

channelid

🆔: @$channel ",
 'parse_mode'=>'html']);
} }
if($sinalfa == "setchannels"){
file_put_contents("data/$chat_id/sinalfa.txt","none");
file_put_contents("data/$chat_id/channelid.txt",$text);
S_A_F_T('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"کانال با موفقیعت ست شد 
موفق و موعید باشید❤️
🆔: @$channel ",
'parse_mode'=>'html']);
}
//===============KING BOT===============\\
if($data == "setsupportbot"){
sendaction($chat_id, typing);
file_put_contents("data/$chat_id/sinalfa.txt","setsupportbots");
$supoort =file_get_contents("supoort.txt");
S_A_F_T('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"ایدی ربات خود را بدون @ بفرستید
supportid
مثال 
telfire
ایدی شما باشد جایگذاری کنید بفرستید
تشکر از تیم بزرگ فایر
🆔: @$channel ",
 'parse_mode'=>'html']);
}
if($sinalfa == "setsupportbots"){
file_put_contents("data/$chat_id/sinalfa.txt","none");
file_put_contents("supoort.txt",$text);
S_A_F_T('sendmessage', [
'chat_id' =>$chat_id,
'text' =>"کانال با موفقیعت ست شد 
موفق و موعید باشید❤️
🆔: @$supoort ",
'parse_mode'=>'html']);
}
//===============KING BOT===============\\
elseif ($data == "backmenuadmin") {
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "به پنل مدیریتت خوش آمدی ادمین عزیز😝❤️",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "🔖آمار ربات🔖", 'callback_data' => "memberinfo"]],
[['text' => "پیام همگانی💎", 'callback_data' => "send"], ['text' => "💎فوروارد همگانی", 'callback_data' => "fwd"]],
[['text' => "🔰ارسال پیام🔰", 'callback_data' => "pasokh"]],
[['text' => "بلاک❌", 'callback_data' => "block"], ['text' => "✅انبلاک", 'callback_data' => "unblock"]],
[['text' => "😑ساخت ربات دوم😑", 'callback_data' => "creatwo"]],
[['text' => "تنظیم ربات پشتیبانی⭕️", 'callback_data' => "setsupportbot"],['text' => "⭕️تنظیم کانال", 'callback_data' => "setchannel"]],
[['text' => "🌀دریافت آیدی عددی🌀", 'callback_data' => "geus"]],
[['text'=>"خاموش کردن ربات❌",'callback_data'=>"off"],['text'=>"✅روشن کردن ربات",'callback_data'=>"on"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "geus") {
@$list = file_get_contents("admin/info/member.txt");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "اینم لیست کامل آیدی عددی ها❗️
$list",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "memberinfo") {
$user = file_get_contents("admin/info/member.txt");
$member_id = explode("\n", $user);
$member_count = count($member_id) - 1;
$bots = file_get_contents("admin/info/Bots.txt");
$bot_id = explode("\n", $bots);
$bot_count = count($bot_id) - 1;
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "آمار دقیق ربات🔻
به شرح زیر است.",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♂️اعضای اصلی ربات♂️", 'callback_data' => "king_network7"],['text' => "$member_count", 'callback_data' => "king_network7"]],
[['text' => "🌝تعداد ربات های ساخته شده🌝", 'callback_data' => "king_network7"],['text' => "$bot_count", 'callback_data' => "king_network7"]],
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "send") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "کمی صبر کنید",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "send");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "ادمین عزیز عشقم😑 پیامتو ارسال کن😹",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
} 
elseif ($data == "send") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "کمی صبر کنید",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "send");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "ادمین عزیز عشقم😑 پیامتو ارسال کن😹",
]);
} elseif ($kingnet == "send") {
file_put_contents("data/$chat_id/king.txt", "no");
$fp = fopen("admin/info/member.txt", 'r');
while (!feof($fp)) {
$ckar = fgets($fp);
sendmessage($ckar, $text);
}
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "ارسال شد🏷",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
}
elseif ($data == "fwd") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "کمی صبر کنید",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "fwd");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "خوب پیام خودتون را فروارد کنید فقط زود که حوصله ندارم😤",
]);
} elseif ($kingnet == 'fwd') {
file_put_contents("data/$chat_id/king.txt", "no");
$forp = fopen("admin/info/member.txt", 'r');
while (!feof($forp)) {
$fakar = fgets($forp);
Forward($fakar, $chat_id, $message_id);
}
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "ارسال شد🏷",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "block") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "کمی صبر کنید",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "block");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "آیدی عددی بدبختو بفرست💣",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
}
elseif ($kingnet == 'block') {
$myfile2 = fopen("admin/info/BlockMember.txt", 'a') or die("Unable to open file!");
fwrite($myfile2, "$text\n");
fclose($myfile2);
file_put_contents("data/$chat_id/king.txt", "No");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => " این $text بدبخت بلاک شد📜",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "unblock") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "کمی صبر کنید",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "unblock");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "آیدی عددی بدبختو بفرست💣",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
} elseif ($kingnet == 'unblock') {
$newlist = str_replace($text, "", $penlist);
file_put_contents("admin/info/BlockMember.txt", $newlist);
file_put_contents("data/$chat_id/king.txt", "No");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "این $text بدبخت آنبلاک شد🌀",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "pasokh") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "کمی صبر کنید",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "pasokh1");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "خوب ایدی عددی کاربر را بفرست️",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
} elseif ($kingnet == 'pasokh1') {
file_put_contents("data/pasokh.txt", $text);
file_put_contents("data/$chat_id/king.txt", "pasokh2");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "متن پیام خود را وارد کنید",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
}
elseif ($kingnet == 'pasokh2') {
$pasokh = file_get_contents("data/pasokh.txt");
file_put_contents("data/$pasokh/pasokh1.txt", $text);
file_put_contents("data/$chat_id/king.txt", "");
bot('sendMessage', [
'chat_id' => $pasokh,
'text' => "کاربر گرامی شما یک پیام از طرف پشتیبانی دارید
جهت مشاهده پیام به صندوق دریافت پیام مراجعه کنید",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "صندوق دریافت پیام", 'callback_data' => "daryaftpayam"]],
]
])
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "با موفقیت فرستاده شد",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
}
//===============KING BOT===============\\
elseif ($data == "creatwo") {
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "کمی صبر کنید",
'show_alert' => false
]);
file_put_contents("data/$chatid/king.txt", "creatwo1");
bot('editmessagetext', [
'chat_id' => $chatid,
'message_id' => $message_id2,
'text' => "🤖 پیامی از شخص مورد نظر فوروارد کنید",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
}
elseif ($kingnet == 'creatwo1') {
unlink("data/$forward_id/create.txt");
file_put_contents("data/$chat_id/king.txt", "no");
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "🤖 شخص مورد نظر ربات دیگری میتواند بسازد.",
'parse_mode' => "MarkDown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♋پنل مدیریت♋", 'callback_data' => "backmenuadmin"]],
]
])
]);
}
//===============KING BOT===============\\
if(!file_exists("data/$chatid")){
mkdir("data/$chatid");
}
if(!file_exists("data/$chat_id/gold.txt")){
file_put_contents("data/$chat_id/gold.txt","0");
}
if(!file_exists("data/$chat_id/king.txt")){
file_put_contents("data/$chat_id/king.txt","no");
}
$user = file_get_contents('admin/info/member.txt');
$members = explode("\n", $user);
if (!in_array($from_id, $members)) {
$add_user = file_get_contents('admin/info/member.txt');
$add_user .= $from_id . "\n";
file_put_contents('admin/info/member.txt', $add_user);
}

?>
<!--

    [[[[[[[[[[[[[[[:KING:]]]]]]]]]]]]]]]
    [:::::::::::::[[[US]]]:::::::::::::]
    [::::::::::::[[[JOIN]]]::::::::::::]
    [:::::[[[[[[[[:NETWORK:]]]]]]]:::::]
    [:::::[                      ]:::::]
    [:::::[                      ]:::::]
    [:::::[     @king_network7   ]:::::]
    [:::::[     @king_source7    ]:::::]
    [:::::[     @king_movie7     ]:::::]
    [:::::[                      ]:::::]
    [:::::[                      ]:::::]
    [:::::[[[[[[[[:NETWORK:]]]]]]]:::::]
    [::::::::::::[[[JOIN]]]::::::::::::]
    [:::::::::::::[[[US]]]:::::::::::::]
    [[[[[[[[[[[[[[[:KING:]]]]]]]]]]]]]]]

-->
