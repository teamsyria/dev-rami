<?php

define('API_KEY','Token');

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
 $time = time() + (979 * 11 + 1 + 30);
//-//////
$update = json_decode(file_get_contents('php://input'));
$geyhe= file_get_contents("http://batsazfree.tk/gameebot/geyhe.php");
$kagaz = file_get_contents("http://batsazfree.tk/gameebot/kagaz.php");
$sang = file_get_contents("http://batsazfree.tk/gameebot/sang.php");
$pa = file_get_contents("http://batsazfree.tk/gameebot/pa.php");
$message = $update->message; 
$first_name = $message->from->first_name;
$chat_id = $message->chat->id;
$text = $message->text;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;
//---------------//
if($text == '/start'){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"مرحبا بك في بوت ساعه وتاريخ ⏰

الان يمكنك معرف الوقت ولتاريخ 📆

بدقه عاليه وبالتمام ولظبط الكامل ✅

كن تحت التجربه واعرف اوقاتك ⏳",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"قائمه العمل ⚙",'callback_data'=>"pa"]
              ],
            ]
        ])
 ]);
}
elseif($data == "pa"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"حسنا اختر احد الاقسام 🔲",
 'parse_mode'=>"MarkDown",
'reply_markup' => json_encode([
                'inline_keyboard' => [
 [
            ['text' => "التاريخ 📆", 'callback_data' => "z1"], ['text' => "الوقت ⏰", 'callback_data' => "z2"]
            ],
            [
                ['text'=>"📚 التاريخ بالاحرف EN 📚",'callback_data'=>"z3"]
                ],
                [
                ['text'=>"النجاح ✔️",'url'=>"t.me/php18"],['text'=>"تواصل 💬",'url'=>"t.me/ts8bot"]
                ]
            ]
])
 ]);     
}
elseif($data == "z1"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"📆  التاريخ الان  📆" . "\n\n" . "*📆---اليوم | * " . date("*j*") . "\n\n" . "*🗓---الشهر |* " . date("*m*") . "\n\n" . "*🗓---السنه |* " . date("*Y*") . "\n\n" . "*🗓---ا*ليوم من السنه | " . date("*z*") . "\n\n" . "",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"↪️ العوده ↩️",'callback_data'=>"pa"]
]
]
])
 ]);
}
elseif($data == "z2"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"⏳ الوقت الان ⌛️" . "\n\n" . "⏰---الساعه : " . date( "*g*" , $time) . "\n\n" . "🕰---الدقيقه : " . date("*i*") . "\n\n" . "⏰---الثانيه : " . date("*s*") . "\n\n" . "",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"↪️ العوده ↩️",'callback_data'=>"pa"]
]
]
])
 ]);
}
elseif($data == "z3"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"📚 التاريخ بالاحرف EN 📚 " . "\n\n" . "*💡Today ➠ : *" . date("_l_") . "\n\n" . "*💡the month ➠ : *" . date("_F_") . "\n\n" . "*💡What is this date? ➠ :*_This is today s history_",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"↪️ العوده ↩️",'callback_data'=>"pa"]
]
]
])
 ]);
}
?>ا
