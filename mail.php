<?PHP
$sender = 'bugandtest@gmail.com';
$recipient = 'bugandtest@gmail.com';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}

    // $email_to = "bugandtest@gmail.com";
    // $subject = "email auto app";

    // $message = "<body>

            
    //     </body>";

    // $variables = array();

    // $variables['name'] = "Robert";
    // $variables['age'] = "30";

    // $template = file_get_contents("bedankt_aankoop.php");

    // foreach($variables as $key => $value)
    // {
    //     $template = str_replace('{{ '.$key.' }}', $value, $template);
    // }

    // echo $template;
    // Your template file being something like :

?>