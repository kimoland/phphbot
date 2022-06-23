<?php 

define('API_KEY','1491491242:AAHX1Yj0f6hsI8fTDD_wg2DbAh355DGqPo4');

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
}elseif($textmessage == '/get')){
$api = file_get_contents("https://mrpooya.xyz/api/TeleFay.php");
	bot('sendMessage',[
         'chat_id'=>$chat_id,
         'text'=>$api,
	 ]);
    }else{
        bot('sendMessage',[
         'chat_id'=>$chat_id,
          'text'=>"Error",
	 ]);
    }
    
}else{
     bot('sendMessage',[
         'chat_id'=>$chat_id,
          'text'=>"Error",
	 ]);
}

    

?>
