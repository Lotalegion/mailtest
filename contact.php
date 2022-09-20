<?php
    require_once(__DIR__ . '/vendor/autoload.php');
    use \Mailjet\Resources;
    define('API_PUBLIC_KEY', '21659f25aee8b22f5ab2a9ec27b7d6e6');
    define('API_PRIVATE_KEY', '49c4024e8d0d7be8d5d9e3c917cec809');
    $mj = new \Mailjet\Client(API_PUBLIC_KEY, API_PRIVATE_KEY,true,['version' => 'v3.1']);

    if(!empty($_POST['surname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['message'])){
        $surname = htmlspecialchars($_POST['surname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $body = [
                'Messages' => [
                [
                    'From' => [
                    'Email' => "newcomptediscord890@gmail.com",
                    'Name' => "test"
                    ],
                    'To' => [
                    [
                        'Email' => "newcomptediscord890@gmail.com",
                        'Name' => "test"
                    ]
                    ],
                    'Subject' => "test email",
                    'TextPart' => "$email, $message",
                ]
                ]
            ];
                $response = $mj->post(Resources::$Email, ['body' => $body]);
                $response->success();
                echo "Email envoyé avec succès !";

        }else{
                echo "Email non valide";
            }
    
        } else {
            header('Location: index.php');
            die();
        }