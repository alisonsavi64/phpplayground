<?php

use MVCArchitecture\App\Events\SendEmailEvent;
use MVCArchitecture\Core\Request;
use MVCArchitecture\App\Models\User;

class AuthController{

    public function __construct(private PDO $connection, private Redis $redis){
        $this->connection = $connection;
    }

    public function showRegister(){
        require_once __DIR__ . '/../Views/RegisterView.php';
    }

    public function handleRegister(Request $request){
        $body = $request->body();
        $email = $body['email'] ?? '';
        $password = $body['password'] ?? '';
        $profilePic = $request->files()['profile_pic'];
        $userModel = new User($email, $password, null);
        $stmt = $this->connection->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $stmt->bindParam(':email', $userModel->email);
        $stmt->bindParam(':password', $userModel->password);

        $stmt->execute();

        $userId = $this->connection->lastInsertId();

        if(!empty($profilePic)){            
            if(!is_dir(__DIR__ . "/../../storage/profiles/$userId/")) mkdir(__DIR__ . "/../../storage/profiles/$userId/", 0777, true);            
            $fileName = $profilePic['name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            move_uploaded_file( $profilePic['tmp_name'], __DIR__ . "/../../storage/profiles/$userId/profile_pic.$ext");
        }

        $sendEmailEvent = new SendEmailEvent($userModel);        

        $this->redis->lPush('email_queue', $sendEmailEvent->toQueue());

        echo $email;
    }
}