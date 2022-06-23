<?php 
define('API_KEY', '1491491242:AAHX1Yj0f6hsI8fTDD_wg2DbAh355DGqPo4');
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

function sendmessage($chat_id, $text){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>"MarkDown"
 ]);
 }

 $update = json_decode(file_get_contents('php://input'));
$message = $update->message; 
$chat_id = $message->chat->id;
$text = $message->text;
$message_id = $message->message_id;
$from_id = $message->from->id;
$firstname = $message->from->first_name;
$lastname = $message->from->last_name;
$username = $message->from->username;
$proxy = file_get_contents("https://proxykn7.herokuapp.com/proxy");
$admin = 710732845;
$message_id2 = $message->message_id;

//==================================
if ($text == "/start") {
    
        $user = file_get_contents('users.txt');
        $members = explode("\n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "\n";
            file_put_contents("data/$chat_id/users.txt", "0");
            file_put_contents('users.txt', $add_user);
        }
        file_put_contents("data/$chat_id/users.txt", "no");
        
        bot('sendmessage', [
            'chat_id' => $chat_id,
 'text'=>"Send GetProxy Or /get 
 
 @King_Network7",
 'reply_to_message_id' => $message_id2,
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
     'keyboard'=>[
        [['text'=>"GetProxy"]]
        ],'resize_keyboard'=>true])
 ]); 
}
//===========================//
if ($text == "GetProxy" || $text == "/get"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"➖➖➖➖➖➖➖➖➖➖➖

$proxy

➖➖➖➖➖➖➖➖➖➖➖",
        'reply_to_message_id' => $message_id2,
 'parse_mode'=>"html",
 'reply_markup'=>json_encode([
     'keyboard'=>[
         [['text'=>"Back"],['text'=>"Reload"]]
         ],'resize_keyboard'=>true])
 ]); 
}
//=====================//
if ($text == "Back"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"Send GetProxy Or /get",
        'reply_to_message_id' => $message_id2,
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
     'keyboard'=>[
        [['text'=>"GetProxy"]]
        ],'resize_keyboard'=>true])
 ]); 
}
//================\\
if ($text == "Reload"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"➖➖➖➖➖➖➖➖➖➖➖

$proxy

➖➖➖➖➖➖➖➖➖➖➖",
'reply_to_message_id' => $message_id2,
 'parse_mode'=>"html",
 'reply_markup'=>json_encode([
     'keyboard'=>[
         [['text'=>"Back"],['text'=>"Reload"]]
         ],'resize_keyboard'=>true])
 ]); 
}

//=================//
 if ($text == "/admin") {
        bot('sendmessage', [
            'chat_id' => $admin,
            'text' => "ها چیه",
            'reply_to_message_id' => $message_id2,
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => "امار"],['text'=>"برگشت"]
                    ]
                ]
            ])
        ]);
    } 
	elseif ($text == "امار") {
        $user = file_get_contents("users.txt");
        $member_id = explode("\n", $user);
        $member_count = count($member_id) - 1;
 
        bot('sendmessage', [
            'chat_id'=>$chat_id,
            'text' => "تعداد ممبر ها : $member_count",
            'parse_mode' => "MarkDown",
        ]);
    }

?>
