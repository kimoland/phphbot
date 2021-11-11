<?php

set_time_limit(0);
ob_start();
$ADMIN = 710732845;//add_admin
$API_KEY = '1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA';//add_token
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
        'parse_mode' => "HTML"
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


//====================php_seven======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$channel_post = $update->message->channel_post;
$chid = $update->channel_post->message->message_id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$c_id = $message->forward_from_chat->id;
$id = $message->from->id;
$username = $message->from->username;
$name = $message->from->first_name;
$lastname = $message->from->last_name;
@$shoklt = file_get_contents("data/$chat_id/shoklat.txt");
@$penlist = file_get_contents("data/pen.txt");
$text = $message->text;
@mkdir("data/$chat_id");
@$ali = file_get_contents("data/$chat_id/ali.txt");
@$list = file_get_contents("users.txt");
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$fromm_id = $update->inline_query->from->id;
$fromm_user = $update->inline_query->from->username;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$fatime = jdate("h:i:s");
$fadate = jdate("Y F d");
//====================php_seven======================//
if ($text == "/start") {

        $user = file_get_contents('users.txt');
        $members = explode("\n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "\n";
            file_put_contents("data/$chat_id/metmbrs.txt", $lastname);
            file_put_contents('users.txt', $add_user);
            file_put_contents("data/$chat_id/asm.txt", $name);
        file_put_contents("data/$chat_id/mam.txt", $username);
        file_put_contents("data/$chat_id/svd.txt", $fatime);
        file_put_contents("data/$chat_id/tvd.txt", $fadate);
        }
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "سلام به ربات یو اینفو خوش اومدی🌹😊
با این ربات به اسونی اطلاعات خودت رو دریافت کن و حتی اطلاعات فیک و جعلی برای خودت درست کن🌟✅",
            'parse_mode' => "HTML",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "👥ساخت اطلاعات فیک👥", 'callback_data' => "namefik"]
                    ],
                    [
                       
                        ['text' => "🚀سازنده🚀", 'url' => "http://telegram.me/php_seven"]
                    ],
                    
                ]
            ])
        ]);
if ($text == "/channel") {

        file_put_contents("data/$chat_id/tvd.txt", $fadate);
        }
        file_put_contents("data/$chat_id/ali.txt", "uupno");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "⚠️Your name : $name
⚠️Your last name : $lastname
⚠️Your user name : @$username
⚠️Your id : $id",
        ]);
    } elseif (strpos($penlist, "$from_id")) {
        SendMessage($chat_id, "کاربر گرامی شما از سرور ما مسدود شده اید لطفا دیگر پیام نفرستید
باتشکر
اگر اشتباهی مسدود شدید به مدیریت خبر دهید تا شمارا ازاد کند
@php_admin 👈ادمین");
    } 
    elseif ($data == "namefik") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "namefik");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب اسم خودت رو برای اطلاعات فیک بفرست",
        ]);
            } elseif ($ali == 'namefik') {
        file_put_contents("data/$chat_id/imname.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "cccaaa");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب حالا اسم خانودگی فیک رو که میخوای بسازی بفرست",
            'parse_mode' => "HTML"
        ]);
            } elseif ($ali == 'cccaaa') {
        file_put_contents("data/$chat_id/lastname.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "vvvaaa");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب حالا یوزنیم فیک رو که میخوای بسازی بفرست",
            'parse_mode' => "HTML"
        ]);
            } elseif ($ali == 'vvvaaa') {
        file_put_contents("data/$chat_id/yousrname.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "qqqaaa");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب حالا ایدی عددی(شناسه)فیکی که میخوای بسازی بفرست",
            'parse_mode' => "HTML"
        ]);
    } elseif ($ali == 'qqqaaa') {
        $fikname = file_get_contents("data/$chat_id/imname.txt");
        $fiklastname = file_get_contents("data/$chat_id/lastname.txt");
        $fikusername = file_get_contents("data/$chat_id/yousrname.txt");
        file_put_contents("data/$chat_id/ali.txt", "Nodjsjhshdhd");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "⚠️Your name : $fikname
⚠️Your last name : $fiklastname
⚠️Your user name : $fikusername
⚠️Your id : $text",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }

////----
if ($chatid == $ADMIN or $chat_id == $ADMIN) {
    if ($text == "/panel") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "ادمین گرامی به پنل مدیریت خود خوش امدید",
            'parse_mode' => "HTML",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "آمار👥👥", 'callback_data' => "am"]
                    ],
                    [
                        ['text' => "✉ پیام همگانی✉", 'callback_data' => "send"], ['text' => "📨فروارد همگانی📨", 'callback_data' => "fwd"]
                    ],
                    [
                        ['text' => "بلاک کردن کاربر🤓", 'callback_data' => "pen"], ['text' => "✅انبلاک کردن✅", 'callback_data' => "unpen"]
                    ]
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
            'text' => "تعداد ممبر ها : $member_count
",

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
                        ['text' => "✅انجام شد", 'callback_data' => "home"]
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
                        ['text' => "✅انجام شد", 'callback_data' => "home"]
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
            'parse_mode' => "HTML",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "✅انجام شد", 'callback_data' => "home"]
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
                        ['text' => "✅انجام شد", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }
/*
channels :
@PHP_Seven
@PHP_School
@TGfreeBot
*/
}
unlink("error_log");
?>
