<?php       
    session_start();
    $response = [
        "valid" => null,
        "reason" => null,
        "msg" => null
    ];
    /*
    1. Registration Form

    Full Name: Required, alphabetic characters (maybe allow spaces).

    Email: Required, must be a valid format, must be unique.

    Password: Required, should meet minimum complexity (e.g., min 6–8 chars).

    Profile Picture: Optional, but if present:

    Only allow .jpg, .jpeg, .png

    File size limit (e.g., 2MB)

    Sanitize file name
    */

    /*
    CREATE TABLE users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        fname TEXT,
        lname TEXT,
        username TEXT UNIQUE,
        email TEXT UNIQUE,
        hashed_password TEXT,
        created_at TEXT DEFAULT (datetime('now')),
        updated_at TEXT DEFAULT (datetime('now'))
    );
    */

    if ($_SERVER["REQUEST_METHOD"] != "POST") return;

    // Input Field Values
    $fname = trim($_POST["fname"]) ?? "";
    $lname = trim($_POST["lname"]) ?? "";
    $username = trim($_POST["username"]) ?? "";
    $email = trim($_POST["email"]) ?? "";
    $password = trim($_POST["password"]) ?? "";
    $confirm_password = trim($_POST["confirm_password"]) ?? "";

    // Database Initialization
    $db_file_path = "./sqlite.db";

    try {
        $db = new PDO("sqlite:$db_file_path");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
    
    // Regex and Confirm Password Validation
    $fname_valid = !preg_match("/[^a-zA-Z]/", $fname);
    $lname_valid = !preg_match("/[^a-zA-Z]/", $lname);
    $username_valid = preg_match("/^[a-zA-Z0-9_]{3,20}$/", $username);
    $email_valid = preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email);
    $password_valid = strlen($password) >= 8;

    if (!$fname_valid) {
        $response = [
            "valid" => false,
            "reason" => "fname",
            "msg" => "First name is invalid or does not meet requirements."
        ];
        //print_r($response);
        return;
    }

    if (!$lname_valid) {
        $response = [
            "valid" => false,
            "reason" => "lname",
            "msg" => "Last name is invalid or does not meet requirements."
        ];
        //print_r($response);
        return;
    }

    if (!$username_valid) {
        $response = [
            "valid" => false,
            "reason" => "username",
            "msg" => "Username is invalid or does not meet requirements."
        ];
        //print_r($response);
        return;
    }

    if (!$email_valid) {
        $response = [
            "valid" => false,
            "reason" => "email",
            "msg" => "Email is invalid or does not meet requirements."
        ];
        //print_r($response);
        return;
    }

    if (!$password_valid) {
        $response = [
            "valid" => false,
            "reason" => "password",
            "msg" => "Password is invalid or does not meet requirements."
        ];
        //print_r($response);
        return;
    }

    if ($password != $confirm_password) {
        $response = [
            "valid" => false,
            "reason" => "confirm_password",
            "msg" => "Passwords do not match."
        ];
        //print_r($response);
        return;
    }



    // Fetch All User Info
    $stmt = $db->prepare("SELECT * FROM users");
    $stmt->execute();

    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if ($records) {
        //print_r($records);

        foreach ($records as $r) {

            // Check if Username in DB
            if (in_array($username, $r)) {
                $response = [
                    "valid" => false,
                    "reason" => "username",
                    "msg" => "Username already exists."
                ];
                //print_r($response);
                return;
            }

            // Check if Email in DB
            if (in_array($email, $r)) {
                $response = [
                    "valid" => false,
                    "reason" => "email",
                    "msg" => "Email address already exists."
                ];
                //print_r($response);
                return;
            }

            // Check if Password in DB
            if (password_verify($password, $r["hashed_password"])) {
                $response = [
                    "valid" => false,
                    "reason" => "password",
                    "msg" => "Password already exists in our records."
                ];
                //print_r($response);
                return;
            }
        }
    }

    // Profile Image
    ini_set('memory_limit', '256M');
    $refined_profile_picture = null;
    if (
        isset($_FILES["profile_picture"]) && 
        $_FILES["profile_picture"]["error"] === UPLOAD_ERR_OK
    ) {
        // Get image info
        $file_tmp_path = $_FILES["profile_picture"]["tmp_name"];
        $file_name = $_FILES["profile_picture"]["name"];
        $file_size = $_FILES["profile_picture"]["size"];
        $file_type = $_FILES["profile_picture"]["type"];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); 
        
        // Validate file extension
        $allowed_exts = ["jpg", "jpeg", "png"];
        if (!in_array($file_ext, $allowed_exts)) {
            $response = [
                "valid" => false,
                "reason" => "profile_picture",
                "msg" => "Invalid file type. Only JPG, JPEG, and PNG allowed.",
            ];
            return;
        }

        // Validate file size 
        if ($file_size > 5 * 1024 * 1024) {
            $response = [
                "valid" => false,
                "reason" => "profile_picture",
                "msg" => "File too large. Maximum 5MB allowed.",
            ];
            return;
        }

        // Create image from uploaded file 
        switch ($file_ext) {
            case "jpg":
            case "jpeg":
                $img = imagecreatefromjpeg($file_tmp_path);
                break;
            case "png":
                $img = imagecreatefrompng($file_tmp_path);
                break;
            default:
                $img = false;
        }

        if (!$img) {
            $response = [
                "valid" => false,
                "reason" => "profile_picture",
                "msg" => "Invalid image file.",
            ];
            return;
        }

        // Create upload directory 
        $target_dir = __DIR__ . "/../uploads/profile_pictures/";

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Generate unique filename
        $unique_name = uniqid("profile_") . ".jpg"; 
        $target_file = $target_dir . $unique_name;

        // Crop and resize image
        $width = imagesx($img);
        $height = imagesy($img);
        $size = min($width, $height);
        
        $cropped = imagecrop($img, [
            'x' => ($width - $size) / 2,
            'y' => ($height - $size) / 2,
            'width' => $size,
            'height' => $size
        ]);

        if (!$cropped) {
            imagedestroy($img);
            $response = [
                "valid" => false,
                "reason" => "profile_picture",
                "msg" => "Failed to process image.",
            ];
            return;
        }

        $resized = imagescale($cropped, 200, 200);

        if (!$resized) {
            imagedestroy($img);
            imagedestroy($cropped);
            $response = [
                "valid" => false,
                "reason" => "profile_picture",
                "msg" => "Failed to resize image.",
            ];
            return;
        }

        // Save as JPEG with 90% quality
        if (imagejpeg($resized, $target_file, 90)) {
            $refined_profile_picture = $unique_name;
        } else {
            $response = [
                "valid" => false,
                "reason" => "profile_picture",
                "msg" => "Failed to save image.",
            ];
        }

        // Clean up memory
        imagedestroy($img);
        imagedestroy($cropped);
        imagedestroy($resized);
    }

    // Store Inputs In DB
    $stmt = $db->prepare("INSERT INTO users (fname, lname, username, email, hashed_password, profile_picture) VALUES (:fname, :lname, :username, :email, :hashed_password, :profile_picture)");
    $stmt->bindValue(":fname", $fname, PDO::PARAM_STR);
    $stmt->bindValue(":lname", $lname, PDO::PARAM_STR);
    $stmt->bindValue(":username", $username, PDO::PARAM_STR);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":hashed_password", password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
    $stmt->bindValue(":profile_picture", $refined_profile_picture ? $refined_profile_picture : null, PDO::PARAM_STR);
    $stmt->execute();

    // Store Inputs In Session
    $_SESSION["fname"] = $fname;
    $_SESSION["lname"] = $lname;
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    $_SESSION["last_activity"] = time();

    // Trigger Successful Response
    $response["valid"] = true;
?>