<?php
define('API_KEY','1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA');
$admin = 710732845
function makereq($method,$datas=[])
    {$url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch))
  {var_dump(curl_error($ch));}
    else
  {return json_decode($res);}
    }

$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$chat_id = $update->message->chat->id;
$mossage_id = $update->message->message_id;
$from_id = $update->message->from->id;
$msg_id = $update->message->message_id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$usm = file_get_contents("data/users.txt");
$step = file_get_contents("data/".$from_id."/step.txt");
$members = file_get_contents('data/users.txt');
$ban = file_get_contents('banlist.txt');
$uvip = file_get_contents('data/vips.txt');
$chanell = 'ID Channel';
function SendMessage($ChatId, $TextMsg)
{
makereq('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>"MarkDown"
]);
}
function SendSticker($ChatId, $sticker_ID)
{
makereq('sendSticker',[
'chat_id'=>$ChatId,
'sticker'=>$sticker_ID
]);
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
makereq('ForwardMessage',[
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
if (strpos($ban , "$from_id") !== false  ) {
SendMessage($chat_id,"متاسفیم😔\nدسترسی شما از این سرور مسدود شده است.⚫️");
	}
elseif(isset($update->callback_query))
{$callbackMessage = '';var_dump(makereq('answerCallbackQuery',['callback_query_id'=>$update->callback_query->id,'text'=>$callbackMessage]));
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
if (strpos($data, "del") !== false )
{$botun = str_replace("del ","",$data);
unlink("bots/".$botun."/index.php");
save("data/$chat_id/bots.txt","");
save("data/$chat_id/tedad.txt","0");
var_dump(makereq('editMessageText',
['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربات شما کاملا حذف شد✅ !",
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"به کانال ما بپیوندید",'url'=>"https://telegram.me/teamking_sh"]]]
                            ])
]                )
        );
}
else{var_dump(makereq('editMessageText',
['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"خطا",
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"به کانال ما بپیوندید",'url'=>"https://telegram.me/teamking_sh"]]]
                            ])
]                    )
             );
   }
}
elseif ($textmessage == '⬅️برگشت⬅️')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"سلام👋\n\n- به ربات ساز حرفه ای تلگرام خوش آمدید💝\n- به راحتی برای خود یک ربات تلگرامی رایگان بسازید❇️\n- برای ساخت ربات خود در سرور ما روی دکمه ساخت ربات کلیک کنید💯\n🆔 bot_testi_bot 🆔",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"🔧ساخت ربات در سرور🔧"],['text'=>"📝ربات های من در این سرور📝"]],
[['text'=>"⁉️راهنما استفاده⁉️"],['text'=>"❌حذف ربات از سرور❌"],['text'=>"📃قوانین📃"]],
[['text'=>" 🆑کانال ما🆑"],['text'=>"✉️ارسال نظر خود به سازنده ربات✉️"]]
],
'resize_keyboard'=>false
                            ])
                               ]
        )
    );
}
elseif ($textmessage == '⁉️راهنما استفاده⁉️')
{
SendMessage($chat_id,"برای ساختن ربات در سرور روی دکمه 🔧ساخت ربات در سرور🔧 کلیک کنید .\n\nبرای حذف ربات روی دکمه ❌حذف ربات از سرور❌ کلیک کنید.\n\nبرای دیدن لیست ربات های ساخته شده توسط شما در سرور ما روی دکمه 📝ربات های من در این سرور📝 کلیک کنید.\n🆔 bot_testi_bot 🆔");
}
elseif ($textmessage == '/back')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"سلام👋\n\n- به ربات ساز حرفه ای تلگرام خوش آمدید💝\n- به راحتی برای خود یک ربات تلگرامی رایگان بسازید❇️\n- برای ساخت ربات خود در سرور ما روی دکمه ساخت ربات کلیک کنید💯\n🆔 bot_testi_bot 🆔",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"🔧ساخت ربات در سرور🔧"],['text'=>"📝ربات های من در این سرور📝"]],
[['text'=>"⁉️راهنما استفاده⁉️"],['text'=>"❌حذف ربات از سرور❌"],['text'=>"📃قوانین📃"]],
[['text'=>" 🆑کانال ما🆑"],['text'=>"✉️ارسال نظر خود به سازنده ربات✉️"]]
],
'resize_keyboard'=>false
                            ])
                               ]
        )
    );
}
elseif ($textmessage == '📊آمار📊' && $from_id == $admin){
$number = count(scandir("bots"))-1;
$uvis = file_get_contents('data/vips.txt');
	$usercount = 1;
	$fp = fopen( "data/users.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$usercount ++;
	}
$avis = -1;
	$fp = fopen( "data/vips.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$avis ++;
	}
	fclose( $fp);
	SendMessage($chat_id,"📆⏰آمار دقیق ربات در همین ساعت 📆⏰\n--------------------------------\n📊تعداد اعضای ربات📊 : $usercount\n\n📟تعداد رباتها📟 : $number\n\n🎖تعداد اعضای ویژه🎖 : $avis\n--------------------------------\n🏅آیدی های ویژه🏅 :\n$uvis");
	}
elseif($textmessage == '✉️ارسال نظر خود به سازنده ربات✉️')
{
save("data/$from_id/step.txt","feedback");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"💌نظر خود را بنویسید و ارسال کنید این نطر مستقیما به دست سازنده میرسد مطمئن باشید نظر های شما به بهبود عملکرد ما اثر خواهد گذاشت💌 : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"⬅️برگشت⬅️"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($step == 'feedback')
{
save("data/$from_id/step.txt","none");
$feed = $textmessage;
SendMessage($admin,"یک نظر جدید📜\n\n-کاربر `$from_id`🍿\n\n-آیدی `@$username`🎨\n\n`📄متن نظر📄 : $textmessage`");
SendMessage($chat_id,"ارسال شد.");
}

elseif($textmessage == '/start')
{
if (!file_exists("data/$from_id/step.txt"))
{mkdir("data/$from_id");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"سلام👋\n\n- به ربات ساز حرفه ای تلگرام خوش آمدید💝\n- به راحتی برای خود یک ربات تلگرامی رایگان بسازید❇️\n- برای ساخت ربات خود در سرور ما روی دکمه ساخت ربات کلیک کنید💯\n🆔 bot_testi_bot 🆔",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"🔧ساخت ربات در سرور🔧"],['text'=>"📝ربات های من در این سرور📝"]],
[['text'=>"⁉️راهنما استفاده⁉️"],['text'=>"❌حذف ربات از سرور❌"],['text'=>"📃قوانین📃"]],
[['text'=>" 🆑کانال ما🆑"],['text'=>"✉️ارسال نظر خود به سازنده ربات✉️"]]
],
'resize_keyboard'=>false
                            ])
                               ]
        )
    );
}
elseif ($textmessage == '❌حذف ربات از سرور❌') {
if (file_exists("data/$from_id/step.txt"))
{}
$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "")
{SendMessage($chat_id,"❌اخطار شما هنوز رباتی در سرور ما نساخته اید❌");}
else
{
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"🤖ربات خود را انتخاب کنید🤖",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"👉 @".$botname,'callback_data'=>"del ".$botname]]]
                            ])
                               ]
        )
    );

}
}
elseif ($textmessage == '/panel')
if ($from_id == $admin)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"سلام قربان😃👋\nبه پنل مدیریت📋 ربات خود خوش آمدید😁",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"ارسال به همه📬"],['text'=>"آمار📋"]
              ],
              [
                ['text'=>"آنبلاک✅"],['text'=>"بلاک⛔️"]
              ],
              [
                ['text'=>"فروارد به همه🚀"]
              ],
              [
                ['text'=>"⬅️برگشت⬅️"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"برادر شما ادمین ربات نیستید😐😂");
}
elseif (strpos($textmessage , "/ban") !== false && $chat_id == $admin)
{
$bban = str_replace('/ban','',$textmessage);
if ($bban != '')
{
$myfile2 = fopen("banlist.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$bban\n");
fclose($myfile2);
SendMessage($chat_id,"`کاربر $bban با موفقیت مسدود شد🍃`");
SendMessage($chanell,"`کاربر $bban از سرور ربات ساز مسدود شد🍃`");
}
}
elseif (strpos($textmessage , "/unban") !== false && $chat_id == $admin)
{
$unbban = str_replace('/unban','',$textmessage);
if ($unbban != '')
{
$newlist = str_replace($unbban,"","banlist.txt");
save("banlist.txt",$newlist);
SendMessage($chat_id,"`کاربر $unbban با موفقیت از مسدودیت خارج شد🍃`");
SendMessage($chanell,"`کاربر $unbban از مسدودیت سرور ربات ساز خارج شد🍃`");
}
}
elseif ($textmessage == 'ارسال به همه📬')
if ($from_id == $admin)
{
save("data/$from_id/step.txt","sendtoall");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"پیام خود را ارسال کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"⬅️برگشت⬅️"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"شما ادمین نیستید.");
}
elseif ($step == 'sendtoall')
{
SendMessage($chat_id,"پیام در حال ارسال میباشد...⏰");
save("data/$from_id/step.txt","none");
$fp = fopen( "data/users.txt", 'r');
while( !feof( $fp)) {
$ckar = fgets( $fp);
SendMessage($ckar,$textmessage);
}
SendMessage($chat_id,"پیام شما با موفقیت به تمام کاربران ارسال شد👍");
}
elseif ($textmessage == 'فروارد به همه🚀')
if ($from_id == $admin)
{
save("data/$from_id/step.txt","fortoall");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"پیام خود را ارسال کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"⬅️برگشت⬅️"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"شما ادمین نیستید.");
}
elseif ($step == 'fortoall')
{
save("data/$from_id/step.txt","none");
		 SendMessage($chat_id,"در حال فروارد پیام شما...");
$forp = fopen( "data/users.txt", 'r');
while( !feof( $forp)) {
$fakar = fgets( $forp);
Forward($fakar, $chat_id,$mossage_id);
		 }
		 makereq('sendMessage',[
		 'chat_id'=>$chat_id,
		 'text'=>"🚀پیام شما برای تمامی کاربران فروارد شد✅",
		 ]);
	 }
elseif ($textmessage == 'بلاک⛔️')
if ($chat_id == $admin) {
SendMessage($chat_id,"برای بلاک⛔️ کردن کاربری به صورت زیر عمل کنید.👇\n/ban USERID\nبه جای USERID آیدی عددی کاربر موردنظر را بگذارید😃");
}
else
{ SendMessage($chat_id,"شما ادمین نیستید."); }
elseif ($textmessage == 'آنبلاک✅')
if ($chat_id == $admin) {
SendMessage($chat_id,"برای آنبلاک✅ کردن کاربری به صورت زیر عمل کنید.👇\n/unban USERID\nبه جای USERID آیدی عددی کاربر موردنظر را بگذارید😃");
}
else
{ SendMessage($chat_id,"شما ادمین نیستید."); }
elseif (strpos($textmessage , "/setvip" ) !== false ) {
if ($from_id == $admin) {
$text = str_replace("/setvip","",$textmessage);
$myfile2 = fopen("data/vips.txt", 'a') or die("Unable to open file!");  
fwrite($myfile2, "$text\n");
fclose($myfile2);
SendMessage($chat_id,"🔸عملیات ارتقا حساب با موفقیت انجام شد.📃\nکاربر $text به لیست اعضای ویژه🏆اضافه شد😃");
}
}
elseif ($textmessage == '🔧ساخت ربات در سرور🔧')
{
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"به منوی ساخت ربات خوش آمدید👾\nلطفا یک دکمه را انتخاب کنید.🤖",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"🎖بخش ویژه🎖"]
              ],
              [
                ['text'=>"🆓بخش رایگان🆓"]
              ],
              [
                ['text'=>"⬅️برگشت⬅️"]
              ]
           ]
        ])
     ]));
 }
elseif ($textmessage == '⬅️برگشت⬅️')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"به منوی ساخت ربات خوش آمدید👾\nلطفا یک دکمه را انتخاب کنید.🤖",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"🎖بخش ویژه🎖"]
              ],
              [
                ['text'=>"🆓بخش رایگان🆓"]
              ],
              [
                ['text'=>"⬅️برگشت⬅️"]
              ]
           ]
        ])
     ]));
 }

elseif ($textmessage == '🆓بخش رایگان🆓')
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"نوع ربات را انتخاب کنید.😃",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"🅾ایکس او❎"],['text'=>"📿صلوات شمار"]
              ],
	      [
                ['text'=>"یوزر اینفوℹ️"],['text'=>"ماشین حساب🖌"]
              ],
              [
         ['text'=>"زمان⏰"],['text'=>"کوتاه کننده لینک🌀"]
              ],
	      [
['text'=>"دستیار متن🖊"],['text'=>"متن عاشقانه💝"]
],
[
['text'=>"چک کننده کدهای php🔍"],['text'=>"🤖تفریحی"]
],
[
['text'=>"فال حافظ📜"],['text'=>"پیامرسان💬"]
],
[
	        ['text'=>"⬅️برگشت⬅️"]
	      ]
            ]
        ])
    ]));
 }

else
{SendMessage($chat_id,"❗️دستور اشتباه است❗️");}
$txxt = file_get_contents('data/users.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('data/users.txt');
      $aaddd .= $chat_id."\n";
      file_put_contents('data/users.txt',$aaddd);
    }
?>
