<?php
error_reporting(0);
//لاین 143 تکمیل شود
define('API_KEY','1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA');// توکن ربات

# -- Variables -- #
$get = json_decode(file_get_contents('php://input'));
$chat_id = $get->message->chat->id;
$text = $get->message->text;
$message = $get->message->message_id;
$username = $messsage->from->username;
$caption = $get->message->caption;
$txt_msg = $get->message->text;
$user_id = $get->message->from->id;
$msg_id = $get->message->message_id;
$from_id = $get->message->from->id;
$tc = $get->message->chat->type;
$textmassage = $message->text;
$first_name = $message->from->first_name;
mkdir("data/$chat_id");
# -----قفل اجباری چنل
# -----
$step = file_get_contents("data/$from_id/step.txt");
$type = file_get_contents("data/$from_id/type.txt");
$panel = file_get_contents("data/$from_id/panel.txt");
$Dev = 710732845;// ایدی عددی مالک ربات
$admini = "710732845";// ایدی عددی مالک ربات
$ping = sys_getloadavg();
$fox = file_get_contents("data/$user_id/sms.txt");
$foxfree1 = file_get_contents("data/$user_id/smsf1.txt");
$foxfree2 = file_get_contents("data/$user_id/smsf2.txt");
$foxvip = file_get_contents("data/$user_id/vip.txt");
$foxvip2 = file_get_contents("data/$user_id/vip2.txt");
$foxvip3 = file_get_contents("data/$user_id/vip3.txt");
$panel = file_get_contents("panel.txt");
# -----
function bot($method,$datas=[]){$url = 'https://api.telegram.org/bot'.API_KEY.'/'.$method;$ch = curl_init();
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

# -- Function -- #
function sendmsg($user_id,$txt_msg,$msg_id,$key = null) {
	bot('sendmessage', ['chat_id'=>$user_id, 'text'=>$txt_msg, 'reply_to_message_id'=>$msg_id,'reply_markup'=>$key,]);
}
# ----
function SendMessage($user_id,$txt_msg,$msg_id,$key = null) {
	bot('sendmessage', ['chat_id'=>$user_id, 'text'=>$txt_msg, 'reply_to_message_id'=>$msg_id,'reply_markup'=>$key,]);
}

# -- hesab --
function sendphoto($chat_id, $photo, $caption){
    sasan('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption,
]);
}
# -- del folder --
function DeleteFolder($path){
 if($handle=opendir($path)){
  while (false!==($file=readdir($handle))){
   if($file<>"." AND $file<>".."){
    if(is_file($path.'/'.$file)){ 
     @unlink($path.'/'.$file);
    } 
    if(is_dir($path.'/'.$file)) { 
     deletefolder($path.'/'.$file); 
     @rmdir($path.'/'.$file); 
    }
   }
        }
    }
}

# -----
$menu = json_encode([
'keyboard'=>[
[['text'=>'سرور های vip'],['text'=>'پنل مدیریت']],
[['text'=>'حساب کاربری']],
],"resize_keyboard"=>true]);
# -----
$sasan = json_encode([
'keyboard'=>[
[['text'=>'آمار ربات'],['text'=>'ویژه کردن']],
[['text'=>'مشخصات ربات']],
[['text'=>'حذف لیست بن ربات'],['text'=>'پیام همگانی']],
[['text'=>'🏛خانه'],['text'=>'🏛خانه']],
],"resize_keyboard"=>true]);
# -----
$bot = json_encode([
'keyboard'=>[
[['text'=>'🏛خانه']],
],"resize_keyboard"=>true]);
mkdir("data");
mkdir("data/$user_id");
////ایدی کانال خود را جایگزین بکنید
# -- panel admin --
if ($txt_msg == "/panel" && $from_id == $Dev or $txt_msg == "پنل مدیریت" && $from_id == $Dev){
sendmsg($user_id,"به پنل مدیریت خوش آمدید",$msg_id,$sasan);
}

# -- Start -- #
if ($txt_msg == "/startt" or $txt_msg == "🏛خانه"){
file_put_contents("data/$user_id/sms.txt","none");
$user = file_get_contents('Member.txt');
$members = explode("\n",$user);
if (!in_array($chat_id,$members)){
$add_user = file_get_contents('Member.txt');
$add_user .= $chat_id."\n";
file_put_contents('Member.txt',$add_user);
}
sendmsg($user_id,"🌐سلام به ربات اس ام اس بمبر خوش اومدید 🌐
⚠️حتما بخش راهنما ربات را بخوانید بعد از ربات استفاده نمایید⚠️",$msg_id,$menu,$join!="member" && $join!="creator" && $join!="administrator");
}
# -----free1
if($txt_msg=="راهنما 📚") {
sendmsg($user_id,"راهنما 📚 :
1 : در بخش اصلی ربات (خانه) از سرور ها یکی رو انتخاب میکنید بسته به vip یا free بدون سرور.
2 : شماره کاربر مورد نظر رو به درستی وارد میکنید و صبر میکنید که ربات تایید رو ارسال کند,شماره باید به این صورت باشه
✅9123456789
3:وقتی درخواست اسپم میزنید به هیچ عنوان تا ثبت شماره و ارسال پیام تایید از ربات دکمه برگشت یا استارت دوباره ربات رو نزنید چون ربات شمارو بن میکنه.⚠️⚠️
- - - -
⚠️قبل از استفاده از ربات به بخش قوانین سر بزنید⚠️",$msg_id,$bot);
}
# -----
if($txt_msg=="پشتیبانی ☎️") {
sendmsg($user_id,"📬جهت برقراری با پشتیبانی میتوانید به آیدی ادمین ربات مرجعه کنید👇 :

👤Admin : ",$msg_id,$bot);
}
# ----
if($txt_msg=="قوانین 🧾") {
sendmsg($user_id,"⚠️لطفا با دقت تمامی قوانین را بخوانید تا به مشکل مواجه نشوید⚠️

1-این ربات تنها جهت سرگرمی و شوخی با دوستان و آشنایان تهیه و آماده گردیده است.
2-ادمین ربات و ربات هیچگونه مسئولیتی در قبال هرگونه استفاده بر عهده نمیگیرد.
3-در صورت مشاهده استفاده نادرست حساب کاربری شما برای همیشه مسدود خواهد شد.
4-در صورت هرگونه شکایت و یا اعتراضی تیم ما با پلیس همکاری میکند.
5-درصورت درخواست اطلاعات شما از طرف پلیس تنها زمانی که شکایتی ثبت شده باشد،طبق قانون شماره 4(اعم از آیدی تلگرام و یا موجود بود شماره همراه) تیم ما این حق را دارد که در اختیار قرار دهد.
6-ادمین ربات در هر زمانی می تواند قوانین جدید وضع، تغییر و یا حذف کند.
7-کاربران ربات این حق را دارند که تنها در صورت پذیرفتن قوانین از ربات استفاده کنند.
8-زمانی که از طرف ربات پاسخی دریافت نکردید، تعداد درخواست ها از جانب دیگر کاربران بالا بوده و این یعنی ربات توانایی پاسخ همزمان به چندین کاربر را ندارد در این صورت میبایست صبرکنید تا ربات پاسخ به درخواست قبلی شما را بدهد.
9-هرگونه اسپم زدن به ربات خلاف میباشد و منجر به بن شدن شما میشود.(بازه زمانی را ادمین مشخص میکند)
10-هرگونه بی احترامی قابل قبول نیست و منجر به مسدودیت مادام العمر میشود.(صادق برای کاربران VIP و عادی)
",$msg_id,$bot);
}
#-------panel admin---------#
elseif ($text == 'آمار ربات' && $from_id == $Dev) {
$user = file_get_contents("Member.txt");
$member_id = explode("\n",$user);
$member_count = count($member_id) -1;
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "تعداد اعضای ربات : $member_count",
'parse_mode' => 'MarkDown'
]);
}
elseif($text == "مشخصات ربات" && $chat_id == $Dev){
$load = sys_getloadavg();
$mem = memory_get_usage();
$ver = phpversion();           
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
پینگ 〽️ : $load[0]
ورژن پی اچ پی♻️ : $ver
میزان مصرف حافظه💻 : $mem KB",
'parse_mode'=>"MarkDown",
]);
 }
if($text == "speed bot test"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"وضعیت ربات:

پینگ: $ping[0]",
'parse_mode'=>"html"
]);
}
if($text == "حذف لیست بن ربات" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","delete");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🤔آیا اطمینان کامل دارید از پاکسازی لیست بن ربات؟
😅اگه اطمینان کامل دارید روی دکمه delete کلیک کنید.
😇در غیر اینصورت روی دکمه پنل مدیریت کلیک کیند.",
'parse_mode'=>"MarkDown",  
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"delete"]],
[['text'=>"پنل مدیریت"]],
],
'resize_keyboard'=>true,
])
]);
}
elseif($step == "delete" && $chat_id == $Dev){
file_put_contents("data/$from_id/step.txt","none");
DeleteFolder("data/spam");
sendmsg($user_id,"حذف شد",$msg_id);
}
if($text == "حساب کاربری"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"

🧬ایدی عددی شما: $from_id
",
'parse_mode'=>"html"
]);
}
elseif ($text == 'پیام همگانی' && $chat_id == $Dev){
file_put_contents("panel.txt","Send");
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "پیام مورد نظرتونو بفرستید تا برای همه ی کاربرا ارسالش کنم",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>'پنل مدیریت']
],
]

])
]);
}

elseif($panel == "Send" && $chat_id == $Dev){
file_put_contents("panel.txt","none");
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" پیام همگانی فرستاده شد.",
'parse_mode' => 'html'
]);
$all_member = fopen( "Member.txt", "r");
while( !feof( $all_member)) {
$user = fgets( $all_member);
SendMessage($user,$text,'html');
}
}
?>
