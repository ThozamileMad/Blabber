<?php include "./includes/login-script.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Social Platform</title>
    <link rel="stylesheet" href="./css/login.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="floating-orb"></div>
        <div class="floating-orb"></div>
        
        <div class="logo">
            <h1>Blabber</h1>
            <p>Welcome back!</p>
        </div>

        <?php 
            if (!is_null($response["valid"]) && !$response["valid"]) echo '
                <div class="alert alert-error">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <strong>Registration failed!</strong><br>
                        Please fix the errors below and try again.
                    </div>
                </div> 
            '; 

            if ($response["valid"]) echo '
                <div class="alert alert-success">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <strong>Success!</strong><br>
                        Your account has been created successfully. You can now log in.
                    </div>
                </div>
            ';
        ?>

        <form action="login.php" method="POST">
            <?php           
                // Email
                $invalid_email = !$response["valid"] && $response["reason"] == "email";
                $email_msg = $invalid_email ? $response["msg"] : "Invalid Email";
                $email_has_error = $invalid_email ? " has-error" : "";
                $email_error_display = $invalid_email ? "flex" : "none";

                // Password
                $invalid_password = !$response["valid"] && $response["reason"] == "password";
                $password_msg = $invalid_password ? $response["msg"] : "Invalid Password";
                $password_has_error = $invalid_password ? " has-error" : "";
                $password_error_display = $invalid_password ? "flex" : "none";

                /* ✅ Debug printing
                echo "<pre>";

                echo "Email:\n";
                echo "  invalid: " . ($invalid_email ? 'true' : 'false') . "\n";
                echo "  msg: $email_msg\n";
                echo "  has_error: $email_has_error\n";
                echo "  display: $email_error_display\n\n";

                echo "Password:\n";
                echo "  invalid: " . ($invalid_password ? 'true' : 'false') . "\n";
                echo "  msg: $password_msg\n";
                echo "  has_error: $password_has_error\n";
                echo "  display: $password_error_display\n\n";

                echo "</pre>"; */

                echo '
                    <div class="form-group email-form-group' . $email_has_error . '">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                        <div class="error-message" style="display: ' . $email_error_display . '">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            ' . $email_msg . '
                        </div>
                    </div>

                    <div class="form-group password-form-group' . $password_has_error . '">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Create a strong password" required>
                        <div class="error-message" style="display: ' . $password_error_display . '">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            ' . $password_msg . '
                        </div>
                    </div>
                ';
            ?>

            <div class="form-options">
                <div class="remember-me">
                    <input type="checkbox" id="remember_me" name="remember_me">
                    <label for="remember_me">Remember me</label>
                </div>
                <a href="forgot-password.php" class="forgot-password">Forgot password?</a>
            </div>

            <button type="submit" class="submit-btn">Sign In</button>
        </form>



        <div class="register-link">
            Don't have an account? <a href="register.php">Create one here</a>
        </div>
    </div>

    <script src="./js/login.js">
    </script>
</body>
</html>