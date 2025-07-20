<?php 

namespace MVCArchitecture\App\Controllers;

use Exception;
use MVCArchitecture\Core\Request;
use PDO;

class UserController{
    public function __construct(private PDO $connection){
    }

    public function handleProfilePicture(Request $request, $id){
        # Fix ext only for tests - Add profile pic path in a column in users table
        $imagePath = __DIR__ . "/../../storage/profiles/$id/profile_pic.jpeg";
        if(!file_exists($imagePath)) throw new Exception("Profile picture dosen't exists");
        $mimeType = mime_content_type($imagePath);
        header('Content-type: ' . $mimeType);
        header('Content-Length: ' . filesize($imagePath));
        readfile($imagePath);
        exit;
    }

}