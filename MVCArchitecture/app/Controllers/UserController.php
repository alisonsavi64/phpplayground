<?php 

namespace MVCArchitecture\App\Controllers;

use Exception;
use MVCArchitecture\Core\Request;
use PDO;
use Redis;

class UserController{
    public function __construct(private PDO $connection, private Redis $redis){
    }

    public function handleProfilePicture(Request $request, $id){        
        # Fix ext only for tests - Add profile pic path in a column in users table
        $imagePath = __DIR__ . "/../../storage/profiles/$id/profile_pic.png";
        if(!file_exists($imagePath)) throw new Exception("Profile picture dosen't exists");
        $mimeType = mime_content_type($imagePath);
        header('Content-type: ' . $mimeType);
        header('Content-Length: ' . filesize($imagePath));
        readfile($imagePath);
        exit;
    }

    public function handleCacheTest(Request $request){                                    
        $currentCache = $this->redis->get('random_number');        
        if(!empty($currentCache)){
            echo "Redis random number: " . $currentCache;
            exit;            
        }
        $randomNumber = array_rand(range(0, 100));
        $this->redis->set('random_number', $randomNumber, 10);
        echo "Redis new random number: " . $randomNumber;
        exit;        
    }

}