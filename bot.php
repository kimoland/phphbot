<?php 

define('API_KEY','1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA');

function Bot($method,$datas=[]){
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
function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 

    // Uncomment one of the following alternatives
     $bytes /= pow(1024, $pow);
     //$bytes /= (1 << (10 * $pow)); 

    return round($bytes, $precision) . ' ' . $units[$pow]; 
} 
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
    $message = $update->message; 
    $chat_id = $message->chat->id;
    $message_id = $message->message_id;
    $textmessage = $message->text;
}
if($textmessage == '/start'){
	    bot('sendMessage',[
         'chat_id'=>$chat_id,
          'text'=>"به ربات نیم بها خوش امدید!
          
جهت نیم بها کردن لینک فایل موردنظر خود را ارسال کنید:",
	 ]);
}elseif(filter_var($textmessage, FILTER_VALIDATE_URL, FILTER_NULL_ON_FAILURE)){
    
    $data = json_decode(file_get_contents('https://rimon.ir/api/?url='.urlencode($textmessage)),true);
    if(isset($data['file'])){
        $file = $data['file'];
        $length = formatBytes($data['length']);
        $dl1 = $data['dl1'];
        $dl2 = $data['dl2'];
        bot('sendMessage',[
         'chat_id'=>$chat_id,
          'text'=>"نام فایل: $file
حجم فایل: $length",
          'reply_markup'=> json_encode([
             'inline_keyboard'=>[
[['text'=>'دانلود با سرور اول','url'=>"$dl1"]],
[['text'=>'دانلود با سرور دوم','url'=>"$dl2"]]
]])
	 ]);
    }else{
        bot('sendMessage',[
         'chat_id'=>$chat_id,
          'text'=>"لینک نامعتبر!",
	 ]);
    }
    
}else{
     bot('sendMessage',[
         'chat_id'=>$chat_id,
          'text'=>"لینک نامعتبر!",
	 ]);
}

    

?>
