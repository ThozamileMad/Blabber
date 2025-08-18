<?php include "./includes/register-script.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Social Platform</title>
    <link rel="stylesheet" href="./css/register.css" />
</head>
<body>
    <div class="container">
        <div class="floating-orb"></div>
        <div class="floating-orb"></div>
        
        <div class="logo">
            <h1>SocialHub</h1>
            <p>Join our community today</p>
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

        <form action="register.php" method="POST" enctype="multipart/form-data" novalidate>
            <?php           
                // First Name
                $invalid_fname = !$response["valid"] && $response["reason"] == "fname";
                $fname_msg = $invalid_fname ? $response["msg"] : "Invalid First name";
                $fname_has_error = $invalid_fname ? " has-error" : "";
                $fname_error_display = $invalid_fname ? "flex" : "none";

                // Last Name
                $invalid_lname = !$response["valid"] && $response["reason"] == "lname";
                $lname_msg = $invalid_lname ? $response["msg"] : "Invalid Last name";
                $lname_has_error = $invalid_lname ? " has-error" : "";
                $lname_error_display = $invalid_lname ? "flex" : "none";

                // Username
                $invalid_username = !$response["valid"] && $response["reason"] == "username";
                $username_msg = $invalid_username ? $response["msg"] : "Invalid Username";
                $username_has_error = $invalid_username ? " has-error" : "";
                $username_error_display = $invalid_username ? "flex" : "none";

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

                // Confirm Password
                $invalid_confirm_password = !$response["valid"] && $response["reason"] == "confirm_password";
                $confirm_password_msg = $invalid_confirm_password ? $response["msg"] : "Password does not match";
                $confirm_password_has_error = $invalid_confirm_password ? " has-error" : "";
                $confirm_password_error_display = $invalid_confirm_password ? "flex" : "none";

                /* ✅ Debug printing
                echo "<pre>";
                echo "First Name:\n";
                echo "  invalid: " . ($invalid_fname ? 'true' : 'false') . "\n";
                echo "  msg: $fname_msg\n";
                echo "  has_error: $fname_has_error\n";
                echo "  display: $fname_error_display\n\n";

                echo "Last Name:\n";
                echo "  invalid: " . ($invalid_lname ? 'true' : 'false') . "\n";
                echo "  msg: $lname_msg\n";
                echo "  has_error: $lname_has_error\n";
                echo "  display: $lname_error_display\n\n";

                echo "Username:\n";
                echo "  invalid: " . ($invalid_username ? 'true' : 'false') . "\n";
                echo "  msg: $username_msg\n";
                echo "  has_error: $username_has_error\n";
                echo "  display: $username_error_display\n\n";

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

                echo "Confirm Password:\n";
                echo "  invalid: " . ($invalid_confirm_password ? 'true' : 'false') . "\n";
                echo "  msg: $confirm_password_msg\n";
                echo "  has_error: $confirm_password_has_error\n";
                echo "  display: $confirm_password_error_display\n\n";
                echo "</pre>"; */

                echo '
                    <div class="form-row">
                        <div class="form-group' . $fname_has_error . '">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="fname" placeholder="Enter your first name" required>
                            <div class="error-message" style="display: ' . $fname_error_display . '">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                ' . $fname_msg . '
                            </div> 
                        </div>
                
                        <div class="form-group' . $lname_has_error . '">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" placeholder="Enter your last name" required>
                            <div class="error-message" style="display: ' . $lname_error_display . '">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                ' . $lname_msg . '
                            </div> 
                        </div>
                    </div>

                    <div class="form-group' . $username_has_error . '">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Choose a unique username" required>
                        <div class="error-message" style="display: ' . $username_error_display . '">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            ' . $username_msg . '
                        </div>
                    </div>

                    <div class="form-group' . $email_has_error . '">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                        <div class="error-message" style="display: ' . $email_error_display . '">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            ' . $email_msg . '
                        </div>
                    </div>

                    <div class="form-group' . $password_has_error . '">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Create a strong password" required>
                        <div class="error-message" style="display: ' . $password_error_display . '">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            ' . $password_msg . '
                        </div>
                    </div>

                    <div class="form-group' . $confirm_password_has_error . '">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                        <div class="error-message" style="display: ' . $confirm_password_error_display . '">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            ' . $confirm_password_msg . '
                        </div>
                    </div>
                ';
            ?>

            <div class="form-group">
                <label for="profile_picture">Profile Picture (Optional)</label>
                <div class="file-input-wrapper">
                    <input type="file" id="profile_picture" name="profile_picture" class="file-input" accept="image/*">
                    <label for="profile_picture" class="file-input-label">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                        </svg>
                        Choose profile picture
                    </label>

                    <div class="profile-preview hidden">
                        <img src="" 
                            alt="Profile Preview" 
                            class="profile-preview-avatar">
                        <div class="profile-preview-info">
                            <h4>Preview</h4>
                            <p>This is how your profile picture will appear</p>
                            <button type="button" class="preview-remove">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--
                <div class="form-group">
                    Unselected svg path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" 
                    Selected svg path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    <label for="profile_picture">Profile Picture (Optional)</label>
                    <div class="file-input-wrapper">
                        <input type="file" id="profile_picture" name="profile_picture" class="file-input" accept="image/*">
                        <label for="profile_picture" class="file-input-label">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                            </svg>
                            profile_photo.jpg selected
                        </label>
                        
                        Profile Picture Preview - Show when image is selected
                        <div class="profile-preview">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" 
                                alt="Profile Preview" 
                                class="profile-preview-avatar">
                            <div class="profile-preview-info">
                                <h4>Preview</h4>
                                <p>This is how your profile picture will appear</p>
                                <button type="button" class="preview-remove">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            -->

            <button type="submit" class="submit-btn">Create Account</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="login.php">Sign in here</a>
        </div>
    </div>

    <script src="./js/register.js"></script>
</body>
</html>