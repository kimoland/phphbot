s<?php

set_time_limit(0);

ob_start();

$API_KEY = '1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA';
##------------------------------##
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

function sendmessage($chat_id, $text)
{
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => "MarkDown"
    ]);
}

function deletemessage($chat_id, $message_id)
{
    bot('deletemessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
    ]);
}

function sendaction($chat_id, $action)
{
    bot('sendchataction', [
        'chat_id' => $chat_id,
        'action' => $action
    ]);
}

function Forward($KojaShe, $AzKoja, $KodomMSG)
{
    bot('ForwardMessage', [
        'chat_id' => $KojaShe,
        'from_chat_id' => $AzKoja,
        'message_id' => $KodomMSG
    ]);
}

function sendphoto($chat_id, $photo, $action)
{
    bot('sendphoto', [
        'chat_id' => $chat_id,
        'photo' => $photo,
        'action' => $action
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


//====================ᵗᶦᵏᵃᵖᵖ======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$channel_post = $update->message->channel_post;
$code = file_get_contents("data/code.txt");
$code2 = file_get_contents("data/code2.txt");
$chid = $update->channel_post->message->message_id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$c_id = $message->forward_from_chat->id;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
@$shoklt = file_get_contents("data/$chat_id/shoklat.txt");
@$penlist = file_get_contents("data/pen.txt");
$text = $message->text;
@mkdir("data/$chat_id");
@$ali = file_get_contents("data/$chat_id/ali.txt");
@$list = file_get_contents("users.txt");
$ADMIN = 710732845;
$idbot = file_get_contents("data/idbot.txt");
$uadmin = adaminsss;
$frosh = file_get_contents("data/frosh.txt");
$sharzh_h1000 = file_get_contents("data/channel.txt");
$sharzh_ir300 = file_get_contents("data/channel2.txt");
$listbon = file_get_contents("data/pen.txt");
$listk = file_get_contents("users.txt");
$sms = file_get_contents("forkr.txt");
$add = $update->callback_query->data+1;
$rem = $update->callback_query->data-1;
$id = $message->from->id;
$username = $message->from->username;
$name = $message->from->first_name;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$fromm_id = $update->inline_query->from->id;
$fromm_user = $update->inline_query->from->username;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$fatime = jdate("h:i:s");
$fadate = jdate("Y F d");
$faapi = jdate("sih");
//====================ᵗᶦᵏᵃᵖᵖ======================//
if ($text == "/start") {

        $user = file_get_contents('users.txt');
        $members = explode("\n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "\n";
            file_put_contents("data/$chat_id/membrs.txt", "0");
            file_put_contents("data/$chat_id/shoklat.txt", "10");
            file_put_contents('users.txt', $add_user);
        }
        file_put_contents("data/$chat_id/ali.txt", "no");
        file_put_contents("data/$chat_id/asm.txt", $name);
        file_put_contents("data/$chat_id/mam.txt", $username);
        file_put_contents("data/$chat_id/svd.txt", $fatime);
        file_put_contents("data/$chat_id/tvd.txt", $fadate);
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "سلام به ربات api ساز خوش امدید💎🚀
با این ربات به اسانی😉🚀Api پیشرفته🔧 خود را بصورت رایگان بدون نیاز هاست
بسازید😉
علاوه بر این قابلیت تشخیص api ،ساخت وب🌐 و... را دارد


💎👥سازنده : telegram.me/sssteam",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🌐ساخت وبسایت جدید🌐", 'callback_data' => "newapi"]
                    ],
                    [
['text' => "🔩پردازش گر وبسایت🌐🔩", 'callback_data' => "prdsapi"]
                    ],
                    [
                       
                        ['text' => "🔩تنظیمات🔩", 'callback_data' => "$rem"]
                    ],
                    [
                        ['text' => "⁉️راهنمای ربات🤔", 'callback_data' => "g"], ['text' => "🌟حمایت از بات🌟", 'callback_data' => "d"]
                  ],
                  [
                        ['text' => "📡سازنده📡", 'url' => "http://telegram.me/sssteam"]
                    ],
                    
                ]
            ])
        ]);
    } elseif (strpos($penlist, "$from_id")) {
        SendMessage($chat_id, "کاربر گرامی شما از سرور ما مسدود شده اید لطفا دیگر پیام نفرستید
باتشکر
اگر اشتباهی مسدود شدید به مدیریت خبر دهید تا شمارا ازاد کند
@adamimsss 👈ادمین");
    } elseif ($data == "home") {
    unlink("cod/$chatid.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "no");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "به منوی اصلی بازگشتید🔃

با من به اسانی وبسایت پیشرفته خود را بسازید بدون نیاز هاست 🌐
دیگر از هاست بی نیاز شوید💎😉
",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [                        ['text' => "🌐ساخت وبسایت جدید🌐", 'callback_data' => "newapi"]
                    ],
                    [
['text' => "🔩پردازش گر وبسایت🌐🔩", 'callback_data' => "prdsapi"]
                    ],
                    [
                       
                        ['text' => "🔩تنظیمات🔩", 'callback_data' => "$rem"]
                    ],
                    [
                        ['text' => "⁉️راهنمای ربات🤔", 'callback_data' => "g"], ['text' => "🌟حمایت از بات🌟", 'callback_data' => "d"]
                  ],
                  [
                        ['text' => "📡سازنده📡", 'url' => "http://telegram.me/sssteam"]
                    ],
                ]
            ])
        ]);


            file_put_contents("data/$chatid/ali.txt", "no");
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "
به منوی اصلی بازگشتید🔃

با من به اسانی وبسایت پیشرفته خود را بسازید بدون نیاز هاست 🌐
دیگر از هاست بی نیاز شوید💎😉
",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                    [
                                                ['text' => "🌐ساخت وبسایت جدید🌐", 'callback_data' => "newapi"]
                    ],
                    [
['text' => "🔩پردازش گر وبسایت🌐🔩", 'callback_data' => "prdsapi"]
                    ],
                    [
                       
                        ['text' => "🔩تنظیمات🔩", 'callback_data' => "$rem"]
                    ],
                    [
                        ['text' => "⁉️راهنمای ربات🤔", 'callback_data' => "g"], ['text' => "🌟حمایت از بات🌟", 'callback_data' => "d"]
                  ],
                  [
                        ['text' => "📡سازنده📡", 'url' => "http://telegram.me/sssteam"]
                    ],  
                  ]
               ])
            ]);
     } elseif ($data == "d") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "هاست نداری😔

دوست وب بسازی🌐
بقیه دوستات میتونن وب بسازن اما تو نمیتونی چون هاست نداری♻️😔😔


با عضویت در ربات API به اسونی بصورت رایگان و بینهایت وب ایجاد کن


با ربات Api از هاست بی نیاز شوید💎🌟✅

لینک👇👇
http://telegram.me/APISSS_BOT?start=startsssbot
〰〰〰〰〰〰〰〰〰
ساخته شده توسط تیم بزرگ برنامه نویسی💻🌟: @sssteam",
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "با ارسال بنر بالا و معرفی ما از ربات ما حمایت کنید✅
            یا میتوانید با عضویت در چنل SSS TEAM از ما حمایت نمایید✅
            http://telegram.me/sssteam",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی❤️", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
    elseif ($data == "newapi") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "newapi");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "متنی که میخواهید در وب قرار بگیرد ارسال نمایید✅.     اگر کد،متغیر و... را بدرستی ارسال نمایید یک api بسازید",
        ]);
    } elseif ($ali == 'newapi') {

        file_put_contents("data/$chat_id/$faapi.php", $text);
        file_put_contents("data/$chat_id/marker.txt", $fatime);
        file_put_contents("data/$chat_id/superman.txt", $sharzh_h1000/data/$chat_id/$faapi.php);
        file_put_contents("forkr.txt", $chat_id);
        file_put_contents("data/$chat_id/ali.txt", "werdporese");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "متن،کدو.. در وب قرار دادم لینک🌐😉👇👇💈
$sharzh_h1000/data/$chat_id/$faapi.php 👈LINK
",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "prdsapi") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "prdsapi");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "ادرس وب سایت را ارسال نمایید
            تا مورد پردازش قرار بگیرد✅💎",
        ]);
    } elseif ($ali == 'prdsapi') {

        $apiapiapicom = file_get_contents("$text");
        $linkafcom = file_get_contents('http://yeo.ir/api.php?url='.$text);
        file_put_contents("data/$chat_id/ali.txt", "werdpopqwzrese");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "متن،اطلاعات و... در وبسایت $linkafcom جستوجو شد✅🚀🌐
 متن و.. های که در وب وجود دارد👇👇👇👇👇👇👇
 $apiapiapicom",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "g") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کار با این ربات سادس وبسایت بصورت رایگان بسازید از هاست بی نیاز شوید 

و از قابلیت های بیشتر ربات استفاده کنید",
            'show_alert' => true
        ]);
    }

////----
if ($chatid == $ADMIN or $chat_id == $ADMIN) {
    if ($text == "مدیریت") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "ادمین گرامی به پنل مدیریت خود خوش امدید",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "📊آمار📊", 'callback_data' => "am"]
                    ],
                    [
                        ['text' => "ارسال پیام به همه کاربران🙂", 'callback_data' => "send"], ['text' => "فروارد همگانی🤓", 'callback_data' => "fwd"]
                    ],
                    [
                        ['text' => "بلاک کردن کاربر🤓", 'callback_data' => "pen"], ['text' => "✅انبلاک کردن✅", 'callback_data' => "unpen"]
                    ],
                    [
                        ['text' => "💢تنظیم دامنه✅", 'callback_data' => "setc"]
                  ],
                  [
                        ['text' => "👥اطلاعات کاربران👥", 'callback_data' => "setc2"], ['text' => "👥لیست اعضا👥", 'callback_data' => "listkar"]
                  ],
                  [
                        ['text' => "❔راهنمای ادمین👤", 'callback_data' => "helpadmin"], ['text' => "⚫لیست سیاه⚫", 'callback_data' => "listbon"]
                    ]
                ]
            ])
        ]);
     } elseif ($data == "listkar") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "لیست کاربران👥👇
$listk
➖➖➖➖➖➖➖➖
آخرین نفر که api ساخته👇
$sms
",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "بازگشت به منوی اصلی ", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "listbon") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "لیست افراد بن⚫👇
$listbon",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "بازگشت به منوی اصلی ", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "am") {
        $user = file_get_contents("users.txt");
        $member_id = explode("\n", $user);
        $member_count = count($member_id) - 1;
        @$don = file_get_contents("data/done.txt");
        @$enf = file_get_contents("data/enf.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "تعداد اعضای ربات : $member_count",

            'show_alert' => true
        ]);
    } elseif ($data == "send") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب پیام خودتون را برام بفرستید تا بفرستم برای تمامی کاربران ربات",
        ]);
    } elseif ($ali == "send") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
            sendmessage($ckar, $text);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "با موفقیت برای همه کاربران ارسال شد",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "fwd") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "fwd");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب پیام خود را فروارد کنید تابه همه اعضا فرستاده شود",
        ]);
    } elseif ($ali == 'fwd') {
        file_put_contents("data/$chat_id/ali.txt", "no");
        $forp = fopen("users.txt", 'r');
        while (!feof($forp)) {
            $fakar = fgets($forp);
            Forward($fakar, $chat_id, $message_id);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "با موفقیت فروارد شد.",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "pen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "pen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "فقط ایدی عددیشو بفرست تا بلاک بشه از ربات😡",
        ]);
    } elseif ($ali == 'pen') {
        $myfile2 = fopen("data/pen.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$text\n");
        fclose($myfile2);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => " با موفقیت بلاکش کردم😤
 ایدیش هم 
 $text ",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "unpen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "unpen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "برای انبلاک کردن فرد کافیست ایدی عددی اون را بفرستید",
        ]);
    } elseif ($ali == 'unpen') {
        $newlist = str_replace($text, "", $penlist);
        file_put_contents("data/pen.txt", $newlist);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "حله انبلاک کردمش
 ایدیش هم 
 $text ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
    elseif ($data == "setc") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "setc");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "ادرس دامنه و محل سورس دقیق را ارسال نمایید اگر این بخش تنظیم نشود وبسایت ها ساخته نمیشن",
        ]);
    } elseif ($ali == 'setc') {
        file_put_contents("data/channel.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "دامنه با موفقیت تنظیم شد✅ از این پس وب ها با موفقیت برای ساخته میشود",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
     elseif ($data == "setc2") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "setc2");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب ایدی عددی کاربر را ارسال نمایید تا تمام اطلاعات نمایش داده شود",
        ]);
    } elseif ($ali == 'setc2') {
        $sssl = file_get_contents("data/$text/asm.txt");
        $fffg = file_get_contents("data/$text/mam.txt");
        $tttl = file_get_contents("data/$text/svd.txt");
        $vvvl = file_get_contents("data/$text/tvd.txt");
        $gggl = file_get_contents("data/$text/superman.txt");
        $zzzl = file_get_contents("data/$text/marker.txt");
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "اطلاعات پیدا شد؟
            در صورت نبودن اطلاعات کاربر یعنی ایدی عددی اشتباه است یا کاربر در ربات عضو نیست💈👤
نام کاربر👤 : $sssl
🆔 ایدی کاربر : @$fffg
⏰ساعت ورود : $tttl
📅تاریخ ورود : $vvvl

ساعت اخرین api ساخته شده : $zzzl

اخرین api ساخته شده : $gggl",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }

}
?>
