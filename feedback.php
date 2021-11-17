<?php
/**
 * Author: Usmon
 * Date: 23.12.2018
 * Time: 19:55
 */

//Telegram API params
$telegram_bot_token = '2135808785:AAFp27ckhgClZ-Tu9shWiKOSJJpZtjUI-pM'; //Need token with word "bot"
$telegram_user_id = '1830645257'; //Get your user name and set here 
 
//If POST request
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']))
{
    //Params
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message=trim($_POST['message']);
  
    //Check and send message
    if(!empty($name) && !empty($email) && !empty($subject) && !empty($message))
    {
        //Start
        $url = 'https://api.telegram.org/'.$telegram_bot_token.'/sendMessage?text=:text_content&chat_id='.$telegram_user_id;
        $content = "Name: " .$name . "\nEmail: ". $email ."\nSubject: ". $subject ."\nMessage: ". $message ;
        $replaced_url = str_replace(':text_content', urlencode($content), $url);
        $requestToTelegram = file_get_contents($replaced_url, true);
        $result = json_decode($requestToTelegram, true);
       
    }
}
else
    header('Location: index.php');


?>