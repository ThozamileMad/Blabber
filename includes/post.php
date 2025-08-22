<?php
    header("Content-Type: application/json");
    
    $data = [];
    if (isset($_POST["text"])) {
        $text = $_POST["text"];
        $data["text"] = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);
    } 

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        if ($image["error"] === 1) {
            $data["status"] = "error";
            $data["message"] = "Upload Error: " . $image["error"];
            echo json_encode($data);
            return;
        };

        $target_dir = __DIR__ . "/../uploads/post_pictures/";;
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $file_name = uniqid("post_") . ".jpg";
        $target_file = $target_dir . $file_name;
        $file_uploaded = move_uploaded_file($image["tmp_name"], $target_file);

        if (!$file_uploaded) {
            $data["status"] = "error";
            $data["message"] = "Upload Error: " . "Could not move file.";
            echo json_encode($data);
            return;
        }
        
        $data["image_path"] = $target_file;
    }
    
    echo json_encode($data);
    
    /*else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid input'
        ]);
    }*/
?> 
