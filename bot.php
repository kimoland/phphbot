<?php
$admin = "710732845"; # -- Admin -- #
define('API_KEY','1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA'); # -- Token -- #
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
        return json_decode($res,true);
    }
}
function send($chat_id,$text,$rep=0){
	$return = bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>$text,
		'reply_to_message_id'=>$rep,
		'parse_mode'=>'MarkDown'
	]);
	return $return;
}
function fwd($to,$from,$msg_id){
    $return = bot('forwardMessage',[
		'chat_id'=>$to,
        'from_chat_id'=>$from,
        'message_id'=>$msg_id
	]);
	return $return;
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$from_id= $message->from->id;
$text = $message->text;
$message_id = $message->message_id;
$reply = $message->reply_to_message;
$inline_data = $update->callback_query->data;
if($from_id != $admin){
    if($text == "/start"){
        send($chat_id,"💐به ربات پیام رسان من خوش امدید\n📥پیامتان را بفرسید\n📯ساخته شده توسط @MrCodi");
    }elseif($update){
        $r = fwd($admin,$from_id,$message_id);
        if(isset($r['result']['forward_from_chat'])){
            bot('sendMessage',[
                'chat_id'=>$admin,
                'text'=>"این پیام از یک کانال ارسال شده و یا ارسال کننده این پیام فروارد عمومی خود را بسته برای پاسخ به این پیام بر روی دکمه زیر کلیک کنید👇",
                'parse_mode'=>'MarkDown',
                'reply_to_message_id'=>$r['result']['message_id'],
                'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"📪پاسخ",'callback_data'=>"answer:$from_id"]
                    ]
                ]])
            ]);
        }
        send($chat_id,"📫پیام شما ارسال شد\nمنتظر جواب باشید\n📯ساخته شده توسط @MrCodi");
    }
}else{
    if($text == "/start"){
        send($chat_id,"💐سلام ادمین به ربات خودت خوش اومدی\nهر پیامی که کاربرا توی ربات بفرستن به تو فروارد میشه و میتونی با ریپلای کردن روشون بهشون جواب بدی✌️");
    }elseif($text && $reply){
        $to_send = $reply->forward_from->id;
        send($to_send,"پیام شما پاسخ داده شد👇");
        send($to_send,$text);
        send($chat_id,"📪پاسخ شما فرستاده شد");
    }elseif($update->message->sticker && $reply){
        $to_send = $reply->forward_from->id;
        send($to_send,"پیام شما پاسخ داده شد👇");
        bot('sendSticker',[
            'chat_id'=>$to_send,
            'sticker'=>$update->message->sticker->file_id
        ]);
        send($chat_id,"📪پاسخ شما فرستاده شد");
    }elseif($update->message->photo && $reply){
        $to_send = $reply->forward_from->id;
        send($to_send,"پیام شما پاسخ داده شد👇");
        $photo = json_encode($update->message->photo);
        $photo = json_decode($photo,true);
        bot('sendPhoto',[
            'chat_id'=>$to_send,
            'photo'=>$photo[count($photo)-1]['file_id']
        ]);
        send($chat_id,"📪پاسخ شما فرستاده شد");
    }elseif($reply){
        $to_send = $reply->forward_from->id;
        send($to_send,"پیام شما پاسخ داده شد👇");
        fwd($to_send,$admin,$message_id);
        send($chat_id,"📪پاسخ شما فرستاده شد");
    }
}//@iRoSource
if(preg_match("/answer:(.*)/",$inline_data,$a)){
    $f = fopen("temp.temp", "w") or die("Unable to open file!");
    fwrite($f, $a[1]);
    fclose($f);
    send($admin,"📬پاسخ خود را بفرستيد");
}elseif(file_exists("temp.temp") && $text){
    send(file_get_contents("temp.temp"),"پیام شما پاسخ داده شد👇");
    send(file_get_contents("temp.temp"),$text);
    send($admin,"📪پاسخ شما فرستاده شد");
    unlink("temp.temp");
}elseif(file_exists("temp.temp") && $update->message->sticker){
    send(file_get_contents("temp.temp"),"پیام شما پاسخ داده شد👇");
    bot('sendSticker',[
        'chat_id'=>file_get_contents("temp.temp"),
        'sticker'=>$update->message->sticker->file_id
    ]);
    send($admin,"📪پاسخ شما فرستاده شد");
    unlink("temp.temp");
}elseif(file_exists("temp.temp") && $update->message->photo){
    send(file_get_contents("temp.temp"),"پیام شما پاسخ داده شد👇");
    $photo = json_encode($update->message->photo);
    $photo = json_decode($photo,true);
    bot('sendPhoto',[
        'chat_id'=>file_get_contents("temp.temp"),
        'photo'=>$photo[count($photo)-1]['file_id']
    ]);
    send($admin,"📪پاسخ شما فرستاده شد");
    unlink("temp.temp");
}elseif(file_exists("temp.temp") && $update){
    send(file_get_contents("temp.temp"),"پیام شما پاسخ داده شد👇");
    fwd(file_get_contents("temp.temp"),$admin,$message_id);
    send($chat_id,"📪پاسخ شما فرستاده شد");
    unlink("temp.temp");
}
//@iRoSource 
?>
