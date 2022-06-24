<?php

define('API_KEY', '1529135125:AAESTjd32qwoLcH8qEU7fJFdRGKmFzyPjBY');
$token = API_KEY;
$userbot = "KingProxy7Bot";
$channels = "KimoLand";
$logchchannel = "@KingProxyLog";
$admin = 710732845;
$server_free_1 = file_get_contents("https://proxykn7.herokuapp.com/proxy");
//=================Functions====================\\
function makereq($method, $datas = [])
{
  $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datas));
  $res = curl_exec($ch);
  if (curl_error($ch)) {
    var_dump(curl_error($ch));
  } else {
    return json_decode($res);
  }
}

function EditMessageText($chat_id, $message_id, $text, $parse_mode, $disable_web_page_preview, $keyboard)
{
  bot('editMessagetext', [
    'chat_id' => $chat_id,
    'message_id' => $message_id,
    'text' => $text,
    'parse_mode' => $parse_mode,
    'disable_web_page_preview' => $disable_web_page_preview,
    'reply_markup' => $keyboard
  ]);
}

function apiRequest($method, $parameters)
{
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }
  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }
  foreach ($parameters as $key => &$val) {
    if (!is_numeric($val) && !is_string($val)) {
      $val = json_encode($val);
    }
  }
  $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method . '?' . http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
}

function SendMessage($ChatId, $TextMsg)
{
  makereq('sendMessage', [
    'chat_id' => $ChatId,
    'text' => $TextMsg,
    'parse_mode' => "MarkDown"
  ]);
}

function SendSticker($ChatId, $sticker_ID)
{
  makereq('sendSticker', [
    'chat_id' => $ChatId,
    'sticker' => $sticker_ID
  ]);
}

function Forward($KojaShe, $AzKoja, $KodomMSG)
{
  makereq('ForwardMessage', [
    'chat_id' => $KojaShe,
    'from_chat_id' => $AzKoja,
    'message_id' => $KodomMSG
  ]);
}

function save($filename, $TXTdata)
{
  $myfile = fopen($filename, "w") or die("Unable to open file!");
  fwrite($myfile, "$TXTdata");
  fclose($myfile);
}
//=================Variable====================\\
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
$textmessage = isset($update->message->text) ? $update->message->text : '';
$usm = file_get_contents("data/users.txt");
$step = file_get_contents("data/" . $from_id . "/step.txt");
$members = file_get_contents('data/users.txt');
$ban = file_get_contents('banlist.txt');
$uvip = file_get_contents('data/vips.txt');
$message_id = $update->callback_query->message->message_id;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channels&user_id=" . $from_id));
$tch = $truechannel->result->status;
//=================Buttons====================\\
$btn_menu = json_encode([
  'keyboard' => [
    [['text' => "💢دریافت پروکسی💢"]],
    [['text' => "حمایت💰"], ['text' => "🖌ارسال نظر"]],
    [['text' => "راهنما🧧"], ['text' => "⭐️درباره ما"]]
  ], 'resize_keyboard' => true,
]);
$btn_menu_admin = json_encode([
  'keyboard' => [
    [['text' => "📊آمار ربات📊"]],
    [['text' => "فوروارد همگانی📤"], ['text' => "📤ارسال همگانی"]],
    [['text' => "لغو حساب ویژه⚜️"], ['text' => "⚜️ویژه کردن حساب"]],
    [['text' => "آنبلاک⭕️"], ['text' => "❌بلاک "]],
    [['text' => "↩️برگشت"]]
  ], 'resize_keyboard' => true,
]);
$btn_getproxy = json_encode([
  'keyboard' => [
    [['text' => "🔰بخش عادی🔰"]],
    [['text' => "⚜️بخش ویژه⚜️"]],
    [['text' => "↩️برگشت"]]
  ], 'resize_keyboard' => true,
]);
$btn_free_server = json_encode([
  'keyboard' => [
    [['text' => "سرور دوم2️⃣"], ['text' => "1️⃣سرور اول"]],
    [['text' => "سرور چهارم4️⃣"], ['text' => "3️⃣سرور سوم "]],
    [['text' => "↩️برگشت"]]
  ], 'resize_keyboard' => true,
]);
$btn_vip_server = json_encode([
  'keyboard' => [
    [['text' => "🔆سرور بدون اسپانسر🔆"]],
    [['text' => "↩️برگشت"]]
  ], 'resize_keyboard' => true,
]);
$btn_back = json_encode([
  'keyboard' => [
    [['text' => "↩️برگشت"]]
  ], 'resize_keyboard' => true,
]);
//=================Buttons====================\\
if (strpos($ban, "$from_id") !== false) {
  SendMessage($chat_id, "⚠️حساب شما توسط مدیریت مسدود شده است\n\n🆔@$channels");
}
//=================Help====================\\
elseif ($textmessage == 'راهنما🧧') {
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "❗️راهنمای ربات
  
  ⇇انقضا پروکسی ها 1 هفته یا 1 روز است
  ⇇پروکسی های ویژه بدون اسپانسر هستند
  ⇇پروکسی ها عادی و اسپانسری هستند
  ⇇بخش ویژه موقتا غیرفعال است
  
  🌀@$userbot
  🆔@$channels",
    'parse_mode' => 'Html',
    'reply_markup' => $btn_menu,
    'resize_keyboard' => false
  ]));
}
//=================Back====================\\
elseif ($textmessage == '↩️برگشت') {
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "↩️از منوی زیر استفاده کنید
  
    🌀@$userbot
    🆔@$channels",
    'parse_mode' => 'Html',
    'reply_markup' => $btn_menu,
    'resize_keyboard' => false
  ]));
}
//=================Status====================\\
elseif ($textmessage == '📊آمار ربات📊' && $from_id == $admin) {
  $uvis = file_get_contents('data/vips.txt');
  $usercount = 1;
  $fp = fopen("data/users.txt", 'r');
  while (!feof($fp)) {
    fgets($fp);
    $usercount++;
  }
  $avis = -1;
  $fp = fopen("data/vips.txt", 'r');
  while (!feof($fp)) {
    fgets($fp);
    $avis++;
  }
  fclose($fp);
  SendMessage($chat_id, "🛗وضعیت ربات
  
  ➖تعداد اعضا : $usercount
  ➖اعضا ویژه : $avis
  ➖آیدی ها ویژه :$uvis
  
  🌀@$userbot
  🆔@$channels");
  SendMessage($logchchannel, "🛗وضعیت ربات
  
  ➖تعداد اعضا : $usercount
  ➖اعضا ویژه : $avis
  ➖آیدی ها ویژه :$uvis
  
  🌀@$userbot
  🆔@$channels");
}
//=================FeedBack====================\\
elseif ($textmessage == '🖌ارسال نظر') {
  save("data/$from_id/step.txt", "feedback");
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "📖نظر خود را ارسال کنید...",
    'parse_mode' => 'MarkDown',
    'reply_markup' => $btn_back
  ]));
} elseif ($step == 'feedback') {
  save("data/$from_id/step.txt", "none");
  $feed = $textmessage;
  SendMessage($admin, "✉️یک نظر جدید ارسال شد\n\n👤یوزرآیدی: $from_id\n💠یوزرنیم: @$username\n📝متن: $textmessage\n\n🆔@$channels");
  SendMessage($logchchannel, "✉️یک نظر جدید ارسال شد\n\n👤یوزرآیدی: $from_id\n💠یوزرنیم: @$username\n📝متن: $textmessage\n\n🆔@$channels");
  SendMessage($chat_id, "✅نظر شما با موفقیت ارسال شد");
}
//=================Delete Vip Account====================\\
elseif (strpos($textmessage, "/delete_vip") !== false) {
  if ($from_id == $admin) {
    $text = str_replace("/delete_vip", "", $textmessage);
    $newlist = str_replace($text, "", $vip);
    save("data/vips.txt", $newlist);
    SendMessage($admin, "⭕️حساب کاربر $text با موفقیت تنزل یافت");
    SendMessage($logchchannel, "⭕️حساب کاربر $text در ربات تنزل یافت");
  } else {
    SendMessage($chat_id, "⚠️این دستور مختص ادمین است");
  }
}
//=================Donate====================\\
elseif ($textmessage == 'حمایت💰') {
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "‼️برای ادامه فعالیت ربات و تامین بخشی از هزینه های سرور میتوانید از طریق لینک زیر از ربات و تیم حمایت کنید.\n\n🆔@$channels",
    'parse_mode' => 'MarkDown',
    'reply_markup' => json_encode([
      'inline_keyboard' =>
      [[['text' => "🔥لینک دونیت🔥", 'url' => "https://payping.ir/d/WiZG"]]]
    ])
  ]));
}
//=================Join Forced====================\\
elseif ($tch != 'member' && $tch != 'creator' && $tch != 'administrator') {
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال زیر بشید 👇

  🆔@$channels
  
  ✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇
  
  🔸 /start
  
  ✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌",
    'parse_mode' => 'HTML',
    'reply_markup' => json_encode([
      'inline_keyboard' =>
      [
        [['text' => "⚡️ورود به کانال⚡️", 'url' => "https://t.me/$channels"]]
      ]
    ])
  ]));
}
//=================Start====================\\
elseif ($textmessage == '/start') {
  if (!file_exists("data/$from_id/step.txt")) {
    mkdir("data/$from_id");
    save("data/$from_id/step.txt", "none");
    save("data/$from_id/tedad.txt", "0");
    $myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!");
    fwrite($myfile2, "$from_id\n");
    fclose($myfile2);
  }
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "💥به ربات کینگ پروکسی خوش اومدی\n💫دریافت رایگان پروکسی پرسرعت تلگرام\n\n🆔@$channels",
    'parse_mode' => 'Html',
    'reply_markup' => $btn_menu
  ]));
}
//=================Channel====================\\
elseif ($textmessage == '⭐️درباره ما') {
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "👤درباره ما
    
    ↯طراحی: KingNetwork
    ↯سرور: Exclusive (https://t.me/King_network7)
    ↯ورژن: 1.0
    ↯لینک: نیم بها
    ↯حمایت: <a href=" . 'https://www.payping.ir/d/WiZG' . ">دونیت</a>
    
    🌀@$userbot
    🆔@$channels",
    'parse_mode' => 'HTML',
    'reply_markup' => $btn_back,
  ]));
}
//=================Admin Panel====================\\
elseif ($textmessage == '/botpanel')
  if ($from_id == $admin) {
    var_dump(makereq('sendMessage', [
      'chat_id' => $update->message->chat->id,
      'text' => "🔰به پنل مدیریت خوش آمدید\n\n🆔@$channels",
      'parse_mode' => 'MarkDown',
      'reply_markup' => $btn_menu_admin
    ]));
  } else {
    SendMessage($chat_id, "❗️شما ادمین ربات نیستید❗️");
  }
//=================User Ban====================\\
elseif (strpos($textmessage, "/block") !== false && $chat_id == $admin) {
  $bban = str_replace('/block', '', $textmessage);
  if ($bban != '') {
    $myfile2 = fopen("banlist.txt", "a") or die("Unable to open file!");
    fwrite($myfile2, "$bban\n");
    fclose($myfile2);
    SendMessage($chat_id, "⭕️کاربر $bban با موفقیت مسدود شد");
    SendMessage($logchchannel, "⭕️کاربر $bban در ربات مسدود شد");
  }
}
//=================User Unban====================\\
elseif (strpos($textmessage, "/unblock") !== false && $chat_id == $admin) {
  $unbban = str_replace('/unblock', '', $textmessage);
  if ($unbban != '') {
    $newlist = str_replace($unbban, "", "banlist.txt");
    save("banlist.txt", $newlist);
    SendMessage($chat_id, "♻️کاربر $bban با موفقیت از مسدودیت خارج شد");
    SendMessage($logchchannel, "♻️کاربر $bban در ربات رفع مسدودیت شد");
  }
}
//=================Message To All====================\\
elseif ($textmessage == '📤ارسال همگانی')
  if ($from_id == $admin) {
    save("data/$from_id/step.txt", "sendtoall");
    var_dump(makereq('sendMessage', [
      'chat_id' => $update->message->chat->id,
      'text' => "📝پیام خود را ارسال کنید...",
      'parse_mode' => 'MarkDown',
      'reply_markup' => $btn_back
    ]));
  } else {
    SendMessage($chat_id, "❗️شما ادمین ربات نیستید❗️");
  }
elseif ($step == 'sendtoall') {
  save("data/$from_id/step.txt", "none");
  $fp = fopen("data/users.txt", 'r');
  while (!feof($fp)) {
    $ckar = fgets($fp);
    SendMessage($ckar, $textmessage);
  }
  SendMessage($chat_id, "✅عملیات با موفقیت به پایان رسید");
}
//=================Forward To All====================\\
elseif ($textmessage == 'فوروارد همگانی📤')
  if ($from_id == $admin) {
    save("data/$from_id/step.txt", "fortoall");
    var_dump(makereq('sendMessage', [
      'chat_id' => $update->message->chat->id,
      'text' => "📝پیام خود را فوروارد کنید...",
      'parse_mode' => 'MarkDown',
      'reply_markup' => $btn_back
    ]));
  } else {
    SendMessage($chat_id, "❗️شما ادمین ربات نیستید❗️");
  }
elseif ($step == 'fortoall') {
  save("data/$from_id/step.txt", "none");
  $forp = fopen("data/users.txt", 'r');
  while (!feof($forp)) {
    $fakar = fgets($forp);
    Forward($fakar, $chat_id, $mossage_id);
  }
  makereq('sendMessage', [
    'chat_id' => $chat_id,
    'text' => "✅عملیات با موفقیت به پایان رسید",
  ]);
}
//=================Block====================\\
elseif ($textmessage == '❌بلاک')
  if ($chat_id == $admin) {
    SendMessage($chat_id, "❗️روش بلاک کردن کاربر در ربات\n\n🔅/block USERID\n\n〽️به جای USERID آیدی عددی کاربر موردنظر را بگذارید\n\n🆔@$channels");
  } else {
    SendMessage($chat_id, "❗️شما ادمین ربات نیستید❗️");
  }
//=================UnBlock====================\\
elseif ($textmessage == 'آنبلاک⭕️')
  if ($chat_id == $admin) {
    SendMessage($chat_id, "❗️روش آنبلاک کردن کاربر در ربات\n\n🔅/unblock USERID\n\n〽️به جای USERID آیدی عددی کاربر موردنظر را بگذارید\n\n🆔@$channels");
  } else {
    SendMessage($chat_id, "❗️شما ادمین ربات نیستید❗️");
  }
//=================Add Vip Account====================\\
elseif ($textmessage == '⚜️ویژه کردن حساب')
  if ($chat_id == $admin) {
    SendMessage($chat_id, "🔰روش ویژه کردن کاربر در ربات\n\n🔅/add_vip USERID\n\n〽️به جای USERID آیدی عددی کاربر موردنظر را بگذارید\n\n🆔@$channels");
  } else {
    SendMessage($chat_id, "❗️شما ادمین ربات نیستید❗️");
  }
//=================UnBlock====================\\
elseif ($textmessage == 'لغو حساب ویژه⚜️')
  if ($chat_id == $admin) {
    SendMessage($chat_id, "🔰روش لغو حساب ویژه کاربر در ربات\n\n🔅/delete_vip USERID\n\n〽️به جای USERID آیدی عددی کاربر موردنظر را بگذارید\n\n🆔@$channels");
  } else {
    SendMessage($chat_id, "❗️شما ادمین ربات نیستید❗️");
  }
//=================Add Vip Account====================\\
elseif (strpos($textmessage, "/add_vip") !== false) {
  if ($from_id == $admin) {
    $text = str_replace("/add_vip", "", $textmessage);
    $myfile2 = fopen("data/vips.txt", 'a') or die("Unable to open file!");
    fwrite($myfile2, "$text\n");
    fclose($myfile2);
    SendMessage($chat_id, "🔱حساب کاربر $text با موفقیت ویژه شد");
    SendMessage($logchchannel, "🔱حساب کاربر $text در ربات ویژه شد");
  }
}
//=================Get Proxy====================\\
elseif ($textmessage == '💢دریافت پروکسی💢') {
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "به منوی ساخت ربات خوش آمدید👾\nلطفا یک دکمه را انتخاب کنید.🤖",
    'parse_mode' => 'MarkDown',
    'reply_markup' => $btn_getproxy
  ]));
}
//=================Get Proxy Vip====================\\
elseif ($textmessage == '⚜️بخش ویژه⚜️')
  if (strpos($uvip, "$from_id") !== false) {
    var_dump(makereq('sendMessage', [
      'chat_id' => $update->message->chat->id,
      'text' => "✅سرور مورد نظر را انتخاب کنید",
      'parse_mode' => 'MarkDown',
      'reply_markup' => $btn_vip_server
    ]));
  } else {
    $textvip = "❗️حساب شما رایگان است
    ➖➖➖➖➖➖➖➖➖➖➖
    مزایا حساب ویژه:
    ↯پروکسی های پرسرعت
    ↯پروکسی های بدون اسپانسر
    ↯پروکسی های نیم بها
    ➖➖➖➖➖➖➖➖➖➖➖
    ⚠️بخش ویژه برای عموم کاربران غیرفعال است
    
    🆔@$channels";
    SendMessage($chat_id, $textvip);
  }
//=================Get Proxy Free====================\\
elseif ($textmessage == '🔰بخش عادی🔰') {
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "✅سرور مورد نظر را انتخاب کنید",
    'parse_mode' => 'MarkDown',
    'reply_markup' => $btn_free_server
  ]));
}
//=================Proxy Server Free====================\\
elseif ($textmessage == '1️⃣سرور اول') {
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "🌀لیست پروکسی ها

    ➖➖➖➖➖➖➖➖➖➖
    


    $server_free_1
    ➖➖➖➖➖➖➖➖➖➖
    
    🆔@$channels",
    'parse_mode' => 'MarkDown',
    'reply_markup' => $btn_back 
  ]));
}
//=================Proxy Server Vip====================\\
elseif ($textmessage == '🔆سرور بدون اسپانسر🔆')
  if (strpos($uvip, "$from_id") !== false) {
    var_dump(makereq('sendMessage', [
      'chat_id' => $update->message->chat->id,
      'text' => "✅",
      'parse_mode' => 'MarkDown',
      'reply_markup' => $btn_back
    ]));
  } else {
    $textvip = "❌حساب کاربری شما ویژه نمیباشد❌";
    SendMessage($chat_id, $textvip);
  }
//=================Proxy Server Free====================\\
else {
  SendMessage($chat_id, "❗️دستور اشتباه است❗️");
}
$txxt = file_get_contents('data/users.txt');
$pmembersid = explode("\n", $txxt);
if (!in_array($chat_id, $pmembersid)) {
  $aaddd = file_get_contents('data/users.txt');
  $aaddd .= $chat_id . "\n";
  file_put_contents('data/users.txt', $aaddd);
}
