<?php
define('API_KEY','1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA');
$admin = 710732845;
$tokens = "1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA";
$channel = "hslu78tvhos254";
$idbot = "zizimahdibot";
$idadmin = "zoraideale";
$host_folder = 'https://viptmail.ir/ir';
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
    
    function getChatMember($chat_id,$user_id){
  $url = 'https://api.telegram.org/bot'.API_KEY.'/getChatMember?chat_id='.$chat_id.'&user_id='.$user_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->result->status;
  return $result;
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
    
function apiRequest($method, $parameters)
    {if (!is_string($method))
    {error_log("Method name must be a string\n");
    return false;}
    if (!$parameters) {
    $parameters = array();}
  else if (!is_array($parameters))
  {error_log("Parameters must be an array\n");
    return false;}
  foreach ($parameters as $key => &$val)
  {if (!is_numeric($val) && !is_string($val))
  {$val = json_encode($val);}
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
    }
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$mossage_id = $update->message->message_id;
$chatid = $update->callback_query->message->chat->id;
$chat_id = $update->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$from_id = $update->message->from->id;;
$msg_id = $update->message->message_id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$text = isset($update->message->text)?$update->message->text:'';
$command = file_get_contents('data/user/'.$from_id."/command.txt");ب
$usm = file_get_contents("data/users.txt");
$step = file_get_contents("data/".$from_id."/step.txt");
$members = file_get_contents('data/users.txt');
$ban = file_get_contents('banlist.txt');
$codefree = file_get_contents('data/user/'.$from_id."/codefree.txt");
$karbarash = file_get_contents('data/user/'.$from_id."/gold.txt");
$gold = file_get_contents('data/user/'.$from_id."/gold.txt");
$goldacc = file_get_contents('data/user/'.$from_id."/goldacc.txt");
$uvip = file_get_contents('data/vips.txt');
mkdir("data/$from_id");
$ali = file_get_contents("data/".$from_id."/ali.txt");
$to =  file_get_contents("data/".$from_id."/token.txt");
$url =  file_get_contents("data/".$from_id."/url.txt");
$message_id = $update->callback_query->message->message_id;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$tokens/getChatMember?chat_id=@$channel&user_id=".$from_id));
$tch = $truechannel->result->status;
//===============KING BOT===============\\
function SendMessage($ChatId, $TextMsg, $chat_id, $text, $model)
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
function sendaction($chat_id, $action){
bot('sendchataction',[
'chat_id'=>$chat_id,
'action'=>$action
]);
}
function sendphoto($chat_id, $photo, $action){
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'action'=>$action
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
function save($filename,$TXTdata)
{
$myfile = fopen($filename, "w") or die("Unable to open file!");
fwrite($myfile, "$TXTdata");
fclose($myfile);
}
if (strpos($ban , "$from_id") !== false  ) {
SendMessage($chat_id,"متاسفیم😔\nدسترسی شما از این سرور مسدود شده است.⚫️");
    }
//===============KING BOT===============\\
elseif($text == '/start')
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
'text'=>"سلام😃👋\n\n- به ربات ساز حرفه ای تلگرام خوش آمدید🌹\n- به راحتی برای خود یک ربات تلگرامی رایگان بسازید🎯\n- برای ساخت ربات جدید دکمه ساخت ربات را بزنید🤖\n🎗 @$idbot",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"ایجاد ربات🎯"],['text'=>"🎯حذف ربات"]],
[['text'=>"👤ربات من👤"]],
[['text'=>"قوانین📖"],['text'=>"📖راهنما"]],
[['text'=>"🔯بخش وب هوک🔯"]],
[['text'=>" 📢کانال ما"],['text'=>"📜ارسال نظر"]]
],
],
'resize_keyboard'=>false
                            ])
                   ]
        )
    );
}
//===============KING BOT===============\\
elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	SendMessage($chat_id,"📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال زیر بشید 👇

🆔@$channel

✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇

🔸 /start

✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌","MarkDown","true");
	}
//===============KING BOT===============\\

elseif ($text == '🔙 برگشت')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"سلام😃👋\n\n- به ربات ساز حرفه ای تلگرام خوش آمدید🌹\n- به راحتی برای خود یک ربات تلگرامی رایگان بسازید🎯\n- برای ساخت ربات جدید دکمه ساخت ربات را بزنید🤖\n🎗 @$idbot🎗",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>[
[['text'=>"ایجاد ربات🎯"],['text'=>"🎯حذف ربات"]],
[['text'=>"👤ربات من👤"]],
[['text'=>"قوانین📖"],['text'=>"📖راهنما"]],
[['text'=>"🔯بخش وب هوک🔯"]],
[['text'=>" 📢کانال ما"],['text'=>"📜ارسال نظر"]]
],
'resize_keyboard'=>false
])
])
);
}
//===============KING BOT===============\\
elseif ($text == '📖راهنما')
{
SendMessage($chat_id,"برای ساخت ربات جدید روی دکمه 🤖 ساخت ربات بزنید.\n\nبرای حذف ربات روی دکمه ❌ حذف ربات بزنید.\n\nبرای دیدن تعداد ربات ها خود روی دکمه 🚀 ربات های من بزنید.\n🤖@$idbot🎗");
}
//===============KING BOT===============\\
elseif($text == '📜ارسال نظر')
{
save("data/$from_id/step.txt","feedback");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"نظر خود را ارسال کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($step == 'feedback')
{
save("data/$from_id/step.txt","none");
$feed = $text;
SendMessage($admin,"یک نظر جدید📜\n\n-کاربر `$from_id`🍿\n\n-آیدی `@$username`🎨\n\n`📋متن نظر : $text`");
SendMessage($chat_id,"ارسال شد.");
}
//===============KING BOT===============\\
elseif ($text == '/update')
{
SendMessage($chat_id,"ربات با موفقیت بروزرسانی شد");
}
elseif ($text == '/update')
{
SendMessage($chat_id,"ربات با موفقیت بروزرسانی شد");
    
} 
elseif ($text == '🎯حذف ربات') {
if (file_exists("data/$from_id/step.txt"))
{}
$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "")
{SendMessage($chat_id,"❗️شما هنوز هیچ رباتی نساخته اید❗️");}
else
{
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"🤖ربات مورد نظر خود را انتخاب نمایید🤖",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"👉 @".$botname,'callback_data'=>"del ".$botname]]]
                            ])
                        ]
        )
    );

}
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
'text'=>"ربات شما با موفقیت حذف شد !",
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"به کانال ما بپیوندید",'url'=>"https://telegram.me/@$channel"]]]
                            ])
]                )
        );
}
else{var_dump(makereq('editMessageText',
['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"خطا",
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"به کانال ما بپیوندید",'url'=>"https://telegram.me/@$channel"]]]
                            ])
]                    )
             );
   }
}
//===============KING BOT===============\\
elseif($text == '👤ربات من👤')
{$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "")
{SendMessage($chat_id,"شما هنوز هیچ رباتی نساخته اید !");
return;
}
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"لیست ربات های شما :",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"👉 @".$botname,'url'=>"https://telegram.me/".$botname]]]
                            ])
                                ]
        )
    );
}
//===============KING BOT===============\\
elseif ($text == '📢کانال ما') {

{SendMessage($chat_id,"کانال تیم برنامه نویسی ما \n @$channel");}
}
//===============KING BOT===============\\
elseif($text == "🔯بخش وب هوک🔯"){
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
	'text'=>"سلام من یه ربات کاربردی هستم میتونم کار های زیرو انجام بدم🙃",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"ست وب هوک"],['text'=>"اطلاعات توکن"]],
	[['text'=>"دلیت وب هوک"]]
           ]
        ])
     ])
        );
 }
elseif($text == "ست وب هوک"){
     sendAction($chat_id, 'typing');
			file_put_contents("data/$from_id/ali.txt","to");
				var_dump(makereq('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"خوب کاربر عزیز ابتدا توکن ربات خودتون را بفرستید",
                 'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"منوی اصلی🔁"]],
           ]
        ])
     ])
        );
 }
elseif($ali == "to"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
        //==================
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        //Token Not True
        SendMessage($chat_id, "عه توکن را اشتباه وارد کردید😐\n لطفا توکن را بدرستی وارد کنید😉");
    } else{
    file_put_contents("data/$from_id/ali.txt","url");
    file_put_contents("data/$from_id/token.txt",$text);
	SendAction($chat_id,'typing');
	var_dump(makereq('sendmessage',
    'chat_id'=>$chat_id,
    'text'=>"خوب حالا ادرس جای که سورستون قرار داره را بفرستید 

    مثلا:
    https://yoursite.ir/index.php
    
        حتما ابتدا با https://  شروع شود
            
    
    ",
  ]);
}
}
elseif($ali == "url")
             {
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text))
  {
  SendAction($chat_id,'typing');
	var_dump(makereq('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" سایتتون اشتباهه",
  ]);
 }
 else {
 file_put_contents("data/$from_id/ali.txt","no");
 file_put_contents("data/$from_id/url.txt",$text);
 	var_dump(makereq('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"کمی صبر کنید ",
  ]);
  sleep(1);
   	var_dump(makereq('editmessagetext',[
    'chat_id'=>$chat_id,
        'message_id'=>$message_id + 1,
    'text'=>"کمی صبر کنید .."
  ]);
	var_dump(makereq('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"ست وب هوک را انجام بدم
    توکن ربات شما :
    $to
    ادرس سورس شما 
    $text
    
    پس دستور زیر را بزن🙃
    /setwebhook",
  ]);
 }
}
elseif($text == "/setwebhook" ){
if($to != "no"){
 	 	var_dump(makereq('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"کمی صبر کنید ",
  ]);
  sleep(1);
	var_dump(makereq('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
      'text'=>"در حال ست کردن وب هوک ",
  ]);
  file_get_contents("https://api.telegram.org/bot$to/setwebhook?url=$url");
    sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
      'text'=>"وب هوک ست شد  موفق  و موید باشید ",
  ]);
  sleep(1);
  file_put_contents("data/$from_id/ali.txt","no");
	var_dump(makereq('sendmessage',[
	'chat_id'=>$chat_id,
		    'message_id'=>$message_id + 1,
	'text'=>"به منوی اصلی برگشتید🙃",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"ست وب هوک"],['text'=>"اطلاعات توکن"]],
	[['text'=>"دلیت وب هوک"]]
           ]
        ])
     ])
        );
 }

}
//===============KING BOT===============\\
elseif ($text == 'ایجاد ربات🎯'){
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"به منوی ساخت ربات خوش آمدید👾\nلطفا یک دکمه را انتخاب کنید.🤖",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
            'keyboard'=>[
              [['text'=>"بخش ویژه🏆"]],
              [['text'=>"بخش رایگان🎯"]],
              [['text'=>"🔙 برگشت"]]
           ]
        ])
     ]));
 }
//===============KING BOT===============\\
elseif ($text == '🔙 برگشت به منو')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"به منوی ساخت ربات خوش آمدید👾\nلطفا یک دکمه را انتخاب کنید.🤖",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
            'keyboard'=>[
              [['text'=>"بخش ویژه🏆"]],
              [['text'=>"بخش رایگان🎯"]],
              [['text'=>"🔙 برگشت"]]
           ]
        ])
     ]));
 }
//===============KING BOT===============\\
elseif ($text == 'بخش ویژه🏆')
if (strpos($uvip , "$from_id") !== false  ) {
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"نوع ربات را انتخاب کنید.😃",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
[['text'=>"API-VIP"]],
[['text'=>"CLI-VIP"]],
[['text'=>"🔙 برگشت به منو"]]
            ]
        ])
    ]));
 }
else
{
$textvip = '⚜️ متاسفانه حساب شما رایگان است.
➖➖➖➖➖➖➖➖➖➖➖';
SendMessage($chat_id,$textvip);
}
//===============KING BOT===============\\
elseif ($text == 'API-VIP')
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"نوع ربات را انتخاب کنید.😃",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
[['text'=>"پیام رسان ویژه📬"]],
[['text'=>"🔙 برگشت به منو"]]
            ]
        ])
    ]));
 }
//===============KING BOT===============\\
elseif ($text == 'CLI-VIP')
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"نوع ربات را انتخاب کنید.😃",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
[['text'=>"پیام رسان ویژه📬"]],
[['text'=>"🔙 برگشت به منو"]]
            ]
        ])
    ]));
 }
//===============KING BOT===============\\
elseif ($text == 'بخش رایگان🎯')
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"نوع ربات را انتخاب کنید.😃",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
[['text'=>"API"]],
[['text'=>"CLI"]],
[['text'=>"🔙 برگشت به منو"]]
            ]
        ])
    ]));
 }
//===============KING BOT===============\\
elseif ($text == 'API')
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"نوع ربات را انتخاب کنید.😃",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
[['text'=>"پیامرسان💬"]],
[['text'=>"🔙 برگشت به منو"]]
            ]
        ])
    ]));
 }
//===============KING BOT===============\\
elseif ($text == 'CLI')
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"نوع ربات را انتخاب کنید.😃",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
[['text'=>"پیامرسان💬"]],
[['text'=>"🔙 برگشت به منو"]]
            ]
        ])
    ]));
 }
//===============KING BOT===============\\
elseif ($text == 'پیامرسان💬')
{
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 1 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت 1 ربات است🚫\nبرای ساخت ربات بیشتر با @$idadmin مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create time");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
//===============KING BOT===============\\
elseif ($text == 'پیام رسان ویژه📬')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 2 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت 2 ربات است🚫\nبرای ساخت ربات بیشتر با @$idadmin مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create botpv");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"شما کاربر ویژه🏆نیستید☹️");
}
//===============KING BOT===============\\

elseif ($text == '/panel')
if ($from_id == $admin)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"سلام قربان😃👋\nبه پنل مدیریت📋 ربات خود خوش آمدید😁",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [['text'=>"ارسال به همه📬"],['text'=>"آمار📋"]],
              [['text'=>"آنبلاک✅"],['text'=>"بلاک⛔️"]],
              [['text'=>"فروارد به همه🚀"]],
              [['text'=>"🔙 برگشت"]]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"برادر شما ادمین ربات نیستید😐😂");
}
//===============KING BOT===============\\
elseif (strpos($text , "/ban") !== false && $chat_id == $admin)
{
$bban = str_replace('/ban','',$text);
if ($bban != '')
{
$myfile2 = fopen("banlist.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$bban\n");
fclose($myfile2);
SendMessage($chat_id,"`کاربر $bban با موفقیت مسدود شد🍃`");
SendMessage($chanell,"`کاربر $bban از سرور ربات ساز مسدود شد🍃`");
}
}
elseif (strpos($text , "/unban") !== false && $chat_id == $admin)
{
$unbban = str_replace('/unban','',$text);
if ($unbban != '')
{
$newlist = str_replace($unbban,"","banlist.txt");
save("banlist.txt",$newlist);
SendMessage($chat_id,"`کاربر $unbban با موفقیت از مسدودیت خارج شد🍃`");
SendMessage($chanell,"`کاربر $unbban از مسدودیت سرور ربات ساز خارج شد🍃`");
}
}
//===============KING BOT===============\\
elseif ($text == 'ارسال به همه📬')
if ($from_id == $admin)
{
save("data/$from_id/step.txt","sendtoall");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"پیام خود را ارسال کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
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
SendMessage($ckar,$text);
}
SendMessage($chat_id,"پیام شما با موفقیت به تمام کاربران ارسال شد👍");
}
//===============KING BOT===============\\
elseif ($text == 'فروارد به همه🚀')
if ($from_id == $admin)
{
save("data/$from_id/step.txt","fortoall");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"پیام خود را ارسال کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
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
//===============KING BOT===============\\
elseif ($text == 'بلاک⛔️')
if ($chat_id == $admin) {
SendMessage($chat_id,"برای بلاک⛔️ کردن کاربری به صورت زیر عمل کنید.👇\n/ban USERID\nبه جای USERID آیدی عددی کاربر موردنظر را بگذارید😃");
}
else
{ SendMessage($chat_id,"شما ادمین نیستید."); }
elseif ($text == 'آنبلاک✅')
if ($chat_id == $admin) {
SendMessage($chat_id,"برای آنبلاک✅ کردن کاربری به صورت زیر عمل کنید.👇\n/unban USERID\nبه جای USERID آیدی عددی کاربر موردنظر را بگذارید😃");
}
else
{ SendMessage($chat_id,"شما ادمین نیستید."); }
//===============KING BOT===============\\
elseif (strpos($text , "/setvip" ) !== false ) {
if ($from_id == $admin) {
$text = str_replace("/setvip","",$text);
$myfile2 = fopen("data/vips.txt", 'a') or die("Unable to open file!");  
fwrite($myfile2, "$text\n");
fclose($myfile2);
SendMessage($chat_id,"🔸عملیات ارتقا حساب با موفقیت انجام شد.📃\nکاربر $text به لیست اعضای ویژه🏆اضافه شد😃");
}
}
//===============KING BOT===============\\
elseif (strpos($text , "/delvip" ) !== false ) {
if ($from_id == $admin) {
$text = str_replace("/delvip","",$text);
      $newlist = str_replace($text,"",$vip);
      save("data/vips.txt",$newlist);
SendMessage($admin,"🔹کاربر$text با موفقیت از لیست اعضای ویژه حذف گردید.");
SendMessage($logch,"👤 کاربر $text از لیست اعضای ویژه حذف گردید.");
}
else {
SendMessage($chat_id,"⛔️ شما ادمین نیستید.");
}
}
//===============KING BOT===============\\
elseif ($text == 'آمار📋' && $from_id == $admin){
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
    SendMessage($chat_id,"آمار دقیق ربات در همین ساعت ⏰\n--------------------------------\n📋تعداد اعضای ربات : $usercount\n\n🤖تعداد رباتها : $number\n\n🏆تعداد اعضای ویژه : $avis\n--------------------------------\n🏆آیدی های ویژه :\n$uvis");
    }
//===============KING BOT===============\\
elseif ($step == 'create time')
{$token = $text;
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));

function objectToArrays( $object )
{if( !is_object( $object ) && !is_array( $object ) )
{return $object;}
if( is_object( $object ) )
{$object = get_object_vars( $object );}
return array_map( "objectToArrays", $object );
}

$resultb = objectToArrays($userbot);
$un = $resultb["result"]["username"];
$ok = $resultb["ok"];
if($ok != 1)
{SendMessage($chat_id,"❗️توکن نامعتبر❗️");}
else
{SendMessage($chat_id,"🚩در حال ساخت ربات 🚩");
if (file_exists("bots/$un/index.php"))
{$source = file_get_contents("bot/pv/index.php");
$source = str_replace("[*[TOKEN]*]",$token,$source);
$source = str_replace("[*[ADMIN]*]",$from_id,$source);
save("bots/$un/index.php",$source);
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ربات شما با موفقیت ساخته شد✅",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"🔙 برگشت"]]
],
'resize_keyboard'=>true
])
]
)
);
}
else
{
mkdir("bots/$un");
mkdir("bots/$un/other");
mkdir("bots/$un/other/$from_id");
mkdir("bots/$un/other/access");
mkdir("bots/$un/other/button");
mkdir("bots/$un/other/profile");
mkdir("bots/$un/other/setting");
mkdir("bots/$un/other/wordlist");
mkdir("bots/$un/other/button/caption");
mkdir("bots/$un/other/button/file");
mkdir("bots/$un/other/button/forward");
mkdir("bots/$un/other/button/music");
mkdir("bots/$un/other/button/photo");
mkdir("bots/$un/other/button/feed");
mkdir("bots/$un/other/button/sticker");
mkdir("bots/$un/other/button/text");
mkdir("bots/$un/other/button/video");
mkdir("bots/$un/other/button/voice");
save("bots/$un/other/setting/start.txt","Hi!✋ 
<b>Welcome To My Bot</b>");
save("bots/$un/other/setting/send.txt","<b>Sent To My Admin!</b>");
save("bots/$un/other/setting/sticker.txt","✅");
save("bots/$un/other/setting/file.txt","✅");
save("bots/$un/other/setting/aks.txt","✅");
save("bots/$un/other/setting/music.txt","✅");
save("bots/$un/other/setting/film.txt","✅");
save("bots/$un/other/setting/voice.txt","✅");
save("bots/$un/other/setting/join.txt","✅");
save("bots/$un/other/setting/link.txt","✅");
save("bots/$un/other/setting/forward.txt","✅");
save("bots/$un/other/setting/pm_forward.txt","⛔️");
save("bots/$un/other/setting/pm_resani.txt","✅");
save("bots/$un/other/setting/on-off.txt","true");
save("bots/$un/other/setting/profile.txt","✅");
save("bots/$un/other/setting/contact.txt","⛔️");
save("bots/$un/other/setting/location.txt","⛔️");
$source = file_get_contents("bot/pv/index.php");
$source = str_replace("[*[TOKEN]*]",$token,$source);
$source = str_replace("[*[ADMIN]*]",$from_id,$source);
save("bots/$un/index.php",$source); 
file_get_contents("http://api.telegram.org/bot".$token."/setwebhook?url=$host_folder/bots/$un/index.php");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"ربات شما با موفقیت ساخته شد✅",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"🔯ورود به ربات🔯".$un,'url'=>"https://telegram.me/".$un]]
[['text'=>"کانال ما⭕️".$un,'url'=>"https://telegram.me/"$channel],['text'=>"⭕️کانال دوم ما".$un,'url'=>"https://telegram.me/"$channel]]
]
])
]
)
);
}
}
}
//===============KING BOT===============\\
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
