<?php

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
@$penlist = file_get_contents("data/pen.txt");
$text = $message->text;
@mkdir("data/$chat_id");
@$ali = file_get_contents("data/$chat_id/ali.txt");
@$list = file_get_contents("users.txt");
$ADMIN = 710732845;
$channel = file_get_contents("data/channel.txt");
$channe2l = file_get_contents("data/channel2.txt");
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$fromm_id = $update->inline_query->from->id;
$fromm_user = $update->inline_query->from->username;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
//====================ᵗᶦᵏᵃᵖᵖ======================//
$ptn = json_encode([
    'inline_keyboard' => [
        [
            ['text' => "1⃣", 'callback_data' => "c1"], ['text' => "2⃣", 'callback_data' => "c2"], ['text' => "3⃣", 'callback_data' => "c3"]
        ],
        [
            ['text' => "4⃣", 'callback_data' => "c4"], ['text' => "5⃣", 'callback_data' => "c5"], ['text' => "6⃣", 'callback_data' => "c6"]
        ],
        [
            ['text' => "7⃣", 'callback_data' => "c7"], ['text' => "8⃣", 'callback_data' => "c8"], ['text' => "9⃣", 'callback_data' => "c9"]
        ],
        [
            ['text' => "چک کن😊", 'callback_data' => "chk"], ['text' => "0⃣", 'callback_data' => "c0"]
        ],
        [
            ['text' => "ولش بریم منوی اصلی", 'callback_data' => "home"]
        ],
    ]
]);
////_________
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
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "به ربات مویسین(بازدیدگیرشکلاتی) خوش امدید❤️
            
سین و ویو رو به آسونی با من دریافت کنید😁

همین الان شروع کنید🤝👇",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "جمع اوری شکلات🙃", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "زیرمجموعه گیری👥", 'callback_data' => "b"], ['text' => "ناحیه کاربری شما🙃", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "ثبت تبلیغ🤓", 'callback_data' => "e"], ['text' => "جابجایی 🔃شکلات🍬", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "سوپر مارکت🎰", 'callback_data' => "f"], ['text' => "راهنما شکلاتی ها", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => "پیگیری سفارشات🤓", 'callback_data' => "h"], ['text' => "کد شکلاتی😋", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "شکلات روزانه🍬", 'callback_data' => "j"]
                    ],
                    
                ]
            ])
        ]);
    } elseif (strpos($penlist, "$from_id")) {
        SendMessage($chat_id, "هی کاربر عزیز شما از سرور ما بلاک شدید  دیگه پیام ندید با تشکر");
    } elseif (strpos($text, '/start') !== false && $forward_chat_username == null) {
        $newid = str_replace("/start ", "", $text);
        if ($from_id == $newid) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "چجور خودت میخوای با لینک خودت عضو رباتت بشی انوقت سکه هم میخوای",
            ]);
        } elseif (strpos($list, "$from_id") !== false) {
            SendMessage($chat_id, "شما قبلا در این ربات عضو شدی و نمیتونی با لینک عضویت دوستت عضو ربات بشی😑");
        } else {
            sendAction($chat_id, 'typing');
            @$sho = file_get_contents("data/$newid/shoklat.txt");
            $getsho = $sho + 10;
            file_put_contents("data/$newid/shoklat.txt", $getsho);
            @$sea = file_get_contents("data/$newid/membrs.txt");
            $getsea = $sea + 1;
            file_put_contents("data/$newid/membrs.txt", $getsea);
            $user = file_get_contents('users.txt');
            $members = explode("\n", $user);
            if (!in_array($from_id, $members)) {
                $add_user = file_get_contents('users.txt');
                $add_user .= $from_id . "\n";
                file_put_contents("data/$chat_id/membrs.txt", "0");
                file_put_contents("data/$chat_id/shoklat.txt", "10");
                file_put_contents('users.txt', $add_user);
            }
            file_put_contents("data/$chat_id/ali.txt", "No");
            sendmessage($chat_id, "تبریک شما با دعوت کاربر $newid عضو ربات ما شدید❤️");
            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "  به ربات مویسین(بازدیدگیرشکلاتی) خوش امدید❤️

سین و ویو رو به آسونی با من دریافت کنید😁

همین الان شروع کنید🤝👇",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "جمع اوری شکلات🙃", 'callback_data' => "a"]
                        ],
                        [
                            ['text' => "زیرمجموعه گیری👥", 'callback_data' => "b"], ['text' => "ناحیه کاربری شما🙃", 'callback_data' => "c"]
                        ],
                        [
                            ['text' => "ثبت تبلیغ🤓", 'callback_data' => "e"], ['text' => "جابجایی 🔃شکلات🍬", 'callback_data' => "d"]
                        ],
                        [
                            ['text' => "سوپر مارکت🎰", 'callback_data' => "f"], ['text' => "راهنما شکلاتی ها", 'callback_data' => "g"]
                        ],
                        [
                            ['text' => "پیگیری سفارشات🤓", 'callback_data' => "h"], ['text' => "کد شکلاتی😋", 'callback_data' => "k"]
                        ],
                        [
                            ['text' => "شکلات روزانه🍬", 'callback_data' => "j"]
                        ],
                    ]
                ])
            ]);
            SendMessage($newid, "تبریک یکی با لینک عضویت شما عوض ربات شد😊

و شما 10تا شکلات گیرتومن امد😱");
        }
    }
    elseif ($data == "home") {
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
            'text' => "
به منوی اصلی برگشتید🙂
سین و ویو رو به آسونی با من دریافت کنید😁
همین الان شروع کنید🤝👇

",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "جمع اوری شکلات🙃", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "زیرمجموعه گیری👥", 'callback_data' => "b"], ['text' => "ناحیه کاربری شما🙃", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "ثبت تبلیغ🤓", 'callback_data' => "e"], ['text' => "جابجایی 🔃شکلات🍬", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "سوپر مارکت🎰", 'callback_data' => "f"], ['text' => "راهنما شکلاتی ها", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => "پیگیری سفارشات🤓", 'callback_data' => "h"], ['text' => "کد شکلاتی😋", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "شکلات روزانه🍬", 'callback_data' => "j"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "a") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "یه لحظه صبر کن",
            'show_alert' => false
        ]);
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "به بخش  دریافت شکلات🍬 رایگان خوش آمدید.🤤

شما می توانید با شیوه نوین جدید  تبلیغات و پست های دیگران را در کانال مشاهده نموده و در ازای مشاهده هر تبلیغ ، برای خود شکلات به دست آورید. شما می توانید با شکلات های به دست آمده، برای خود و یا دوستان خود تبلیغ سفارش دهید❤️",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم کانال😊", 'url' => "https://telegram.me/joinchat/AAAAAEM-WYPn6KZNZgzETw"]
                    ],
                    [
                        ['text' => "ولش برگردیم صفحه اصلی😑", 'callback_data' => "home"]
                    ]
                ]
            ])
        ]);
    }  
      elseif ($data == "b") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "ربات مویسین هم اکنون در تلگرام منتشر شد😱😨

آیا خسته شده اید که مطالب شما در کانال بازدید نمیخورد 😢😕

آیا مردم پی میبرند که کانال شما فیک است؟😔😢

آیا دوست دارید بازدید مطالب کانال شما افزایش یابد؟😁😱

آیا آماده برنده شدن در چالش ها هستید؟😋❤️


فقط کافیست در ربات مویسین عضو شوید
و شکلات جمع کنید و برای مطالب کانال خود بازدید جمع آوری کنید🙃

http://telegram.me/moiseenbot?start=$chatid",
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "سلام کاربر عزیز به بخش زیر مجموعه گیری خوش امدید❤️

شما با معرفی دوستان خود به ربات 
10 سکه  بصورت رایگان دریافت کنید😮

کاری هم نداره پیام بالارو را بفرست به دوستات😝👌👇👇",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی❤️", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }
     elseif ($data == "f") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "📟سوپر مارکت شکلاتی ها🤤

⁉️نکته حتما در قسمت توضیحات ایدی عددی خودتون را وارد کنید😊

⚪️ایدی عددی شما : $chatid",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "یه جعبه 100تایی شکلات🍬 | 400تومن", 'url' => "http://ppng.ir/d/rmZ5"]
                    ],
                    [
                        ['text' => "یه جعبه 250تایی شکلات🍬 | 700تومن", 'url' => "http://ppng.ir/d/EYBS"]
                    ],
                    [
                        ['text' => "یه جعبه 500تایی شکلات🍬 | 1000تومن", 'url' => "http://ppng.ir/d/zkLJ"]
                    ],
                        [
                        ['text' => "یه جعبه 700تایی شکلات🍬 | 1500تومن", 'url' => "http://ppng.ir/d/w37x"]
                    ],
                    [
                        ['text' => "برگشت به منوی اصلی ", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
      elseif ($data == "e") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب کاربر گرامی پست شما چقدر ویو بخوره 🙃
          هر ویو برابر یک شکلات میباشد",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "20 ویو👁", 'callback_data' => "seen20"]
                    ],
                    [
                        ['text' => "45 ویو 👁", 'callback_data' => "seen45"]
                    ],
                    [
                        ['text' => " 80 ویو👁", 'callback_data' => "seen80"]
                    ],
                    [
                        ['text' => "130 ویو👁", 'callback_data' => "seen130"]

                    ],
                    [
                        ['text' => "240 ویو👁 ", 'callback_data' => "seen240"]
                    ],
                    [
                        ['text' => "300ویو👁", 'callback_data' => "seen300"]
                    ],
                    [
                        ['text' => "برگشت به منوی اصلی ", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }
        

////----
if ($chatid == $ADMIN or $chat_id == $ADMIN) {
    if ($text == "مدیریت") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "مدیر گرامی به پنل مدیریت ربات ‌شکلاتی خوش امدید🙂",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "آمار کلی و وضعیت ربات😊", 'callback_data' => "am"]
                    ],
                    [
                        ['text' => "ارسال پیام به همه کاربران🙂", 'callback_data' => "send"], ['text' => "فروارد همگانی🤓", 'callback_data' => "fwd"]
                    ],
                    [
                        ['text' => "بلاک کردن کاربر🤓", 'callback_data' => "pen"], ['text' => "انبلاک کاربر☹️", 'callback_data' => "unpen"]
                    ],
                    [
                        ['text' => "ساخت کد شکلاتی🍬", 'callback_data' => "crl"],['text' => "تنظیم چنل تبلیغات", 'callback_data' => "setc"]
                    ],
                       [
                        ['text' => "شکلات به کاربر", 'callback_data' => "buy"],['text' => "تنظیم چنل کد شکلاتی", 'callback_data' => "setc2"]
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
تعداد تبلیغات در حال انجام: $don
تعداد تبلیغات انجام شده: $enf",

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
            'text' => "خوب پیام خودتون را برام بفرستید تا بفرستم برا  کاربرا  . بدو وقت ندارم😑",
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
            'text' => "خوب پیام خودتون را فروارد کنید فقط زود که حوصله ندارم😤",
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
            'text' => "خوب ی بخشیدی حالا . ایدی عددیشو بدع تا انبلاکش کنم😕",
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
            'text' => "خوب یوزر نیم چنل را بفرست    همراه با @ بفرستید  ",
        ]);
    } elseif ($ali == 'setc') {
        file_put_contents("data/channel.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "حله چنل تبلیغات این شد
 
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
            'text' => "خوب یوزر نیم چنل را بفرست    همراه با @ بفرستید  ",
        ]);
    } elseif ($ali == 'setc2') {
        file_put_contents("data/channel2.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "حله چنل کد شکلاتی این شد
 
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
    elseif ($data == "crl") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "crl");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب یه عدد بگو عجیجم❤️",
        ]);
    } elseif ($ali == 'crl') {
        file_put_contents("data/code.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "crl2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب تعداد شکلات ها چقدر باشه",
            'parse_mode' => "MarkDown"
        ]);
    } elseif ($ali == 'crl2') {
        $code = file_get_contents("data/code.txt");
        $code2 = file_get_contents("data/code2.txt");
        file_put_contents("data/code2.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "حله کد شما ساخته شد  ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
               $code = file_get_contents("data/code.txt");
        $code2 = file_get_contents("data/code2.txt");
        bot('sendMessage', [
            'chat_id' => $channel2,
            'text' => " یک کد شکلات ساخته شد😶 

⚫️کد شکلاتی : $code 
🔴تعداد شکلات ها : $code2
⚪️ساعت ساخت : $fatime

فقط یه نفر میتونه استفاده کنه😶 ",
            ]);
        
        
        
        
        
    }

}
?>
