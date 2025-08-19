<?php       
    session_start();

    if (isset($_SESSION)) {
        header("Location: index.php");
        exit();
    }
    
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
    $email = trim($_POST["email"]) ?? "";
    $password = trim($_POST["password"]) ?? "";

    // Database Initialization
    $db_file_path = "./sqlite.db";

    try {
        $db = new PDO("sqlite:$db_file_path");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    // Fetch All User Info
    $stmt = $db->prepare("SELECT email, hashed_password FROM users WHERE email = :email");
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$record) {
        $response = [
            "valid" => false,
            "reason" => "email",
            "msg" => "Email address not found."
        ];
        // print_r($response);
        return $response;
    }

    // Password Error
    if (!password_verify($password, $record["hashed_password"])) {
        $response = [
            "valid" => false,
            "reason" => "password",
            "msg" => "Password does not match."
        ];
        // print_r($response);
        return;
    }


    // Store Inputs In Session
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    $_SESSION["last_activity"] = time();

    // Trigger Successful Response
    $response["valid"] = true;
?>