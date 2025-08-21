<?php include "./includes/index-script.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blabber - Home</title>
    <link rel="stylesheet" href="./css/index.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="floating-orb"></div>
    <div class="floating-orb"></div>
    
    <header class="header">
        <div class="header-content">
            <div class="logo">Blabber</div>
            
            <div class="search-bar">
                <svg class="search-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
                <input type="text" placeholder="Search posts, people, or topics...">
            </div>
            
            <div class="user-menu">
                <button class="notification-btn">
                    <svg fill="currentColor" viewBox="0 0 20 20" width="20" height="20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                    </svg>
                    <div class="notification-badge"></div>
                </button>
                <img src=<?php echo $profile_picture ? "./" . $profile_picture : "" ?> alt="User Avatar" class="user-avatar">
            </div>
        </div>
    </header>

    <main class="main-content">
        <aside class="sidebar">
            <h3>Navigation</h3>
            <nav>
                <a href="#" class="nav-item active">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Home
                </a>
                <a href="#" class="nav-item">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                    </svg>
                    Profile
                </a>
                <a href="#" class="nav-item">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    Messages
                </a>
                <a href="#" class="nav-item">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                    </svg>
                    Favorites
                </a>
                <a href="#" class="nav-item">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                    </svg>
                    Settings
                </a>
            </nav>
        </aside>

        <section class="feed">
            <div class="post-composer">
                <div class="composer-header">
                    <img src=<?php echo $profile_picture ? $profile_picture : "" ?> alt="Your Avatar" class="composer-avatar">
                    <div>
                        <h4>What's on your mind?</h4>
                    </div>
                </div>
                <textarea class="composer-textarea" placeholder="Share your thoughts with the community..." rows="3"></textarea>
                <img src="" alt="Post image" class="post-image post-image-preview">
                <video src="" controls="" class="post-video post-video-preview"></video>
                <div class="composer-actions">
                    <div class="composer-options">

                        <input type="file" id="photo-upload" class="file-input" accept="image/*">
                        <input type="file" id="video-upload" class="file-input" accept="video/*">
                        
                        <label for="photo-upload" class="composer-btn" title="Add Photo">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                            </svg>
                        </label>
                        
                        <label for="video-upload" class="composer-btn" title="Add Video">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                            </svg>
                        </label>

                        <button class="composer-btn" title="Add Poll">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <button class="composer-btn" title="Add Location">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <button class="post-btn">Post</button>
                </div>
            </div>

            <?php 
                foreach ($posts as $p) {
                    $post_id = $p["post_id"];
                    $profile_picture = $p["profile_picture"] ? "./uploads/profile_pictures/" . $p["profile_picture"] : "";
                    $fname = $p["fname"];
                    $lname = $p["lname"];
                    $username = $p["username"];
                    $msg = $p["msg"];
                    $media = $p["media"];
                    $media_type = $p["media_type"];
                    $created_at = convert_time($p["created_at"]);

                    if ($media) {
                        if ($media_type == "image") $media = "./uploads/posted_pictures/" . $media;
                        if ($media_type == "video") $media = "./uploads/posted_videos/" . $media;
                    }

                    echo '
                        <article class="post">
                            <div class="post-header">
                                <img src="' . $profile_picture . '" alt="User Avatar" class="post-avatar">
                                <div class="post-user-info">
                                    <h4>' . $fname . ' ' . $lname . '</h4>
                                    <p>@' . $username . ' • ' . $created_at . '</p>
                                </div>
                            </div>
                            <div class="post-content">
                                <p>' . $msg . '</p>
                            </div>';

                    if ($media) {
                        if ($media_type == "image") {
                            echo '<img src="' . $media . '" alt="Post image" class="post-image">';
                        } elseif ($media_type == "video") {
                            echo '<video src="' . $media . '" controls class="post-video"></video>';
                        }
                    }

                    $stmt = $db->prepare("SELECT COUNT(*) FROM post_likes WHERE post_id = :post_id");
                    $stmt->bindValue(":post_id", $post_id, PDO::PARAM_STR);
                    $stmt->execute();
                    $like_count = $stmt->fetchColumn();  

                    $stmt = $db->prepare("SELECT COUNT(*) FROM post_comments WHERE post_id = :post_id");
                    $stmt->bindValue(":post_id", $post_id, PDO::PARAM_STR);
                    $stmt->execute();
                    $comment_count = $stmt->fetchColumn();  

                    echo '
                            <div class="post-actions">
                                <div class="action-buttons">
                                    <button class="action-btn">
                                        <svg fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>'. $like_count . '</span>
                                    </button>
                                    <button class="action-btn">
                                        <svg fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>' . $comment_count . '</span>
                                    </button>
                                    <button class="action-btn">
                                        <svg fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                                        </svg>
                                        <span>Share</span>
                                    </button>
                                </div>
                            </div>
                        </article>';
                }
                ?>
        </section>

        <aside class="right-sidebar">
            <div class="widget">
                <h3>Trending Topics</h3>
                <?php 
                    foreach ($trends as $t) {
                        echo '
                            <div class="trending-item">
                                <div>
                                    <div class="trending-topic">#' . $t["name"]. '</div>
                                    <div class="trending-posts">' . convert_number(intval($t["usage_count"])) . ' posts</div>
                                </div>
                            </div>
                        ';
                    }
                ?>
            </div>

            <div class="widget">
                <h3>Suggested for You</h3>
                <?php
                    foreach ($suggestion_records as $sr) {
                        $profile_picture = $sr["profile_picture"] ? "./uploads/profile_pictures/" . $sr["profile_picture"] : "";
                        $fname = $sr["fname"];
                        $lname = $sr["lname"];
                        $username = $sr["username"];
                        
                        echo '
                            <div class="suggested-user">
                                <img src="' . $profile_picture . '" alt="Suggested User" class="suggested-avatar">
                                <div class="suggested-info">
                                    <div class="suggested-name">' . $fname . " " . $lname . '</div>
                                    <div class="suggested-username">@' . $username . '</div>
                                </div>
                                <button class="follow-btn">Follow</button>
                            </div>
                        ';
                    }
                ?>
            </div>

            <div class="widget">
                <h3>Quick Stats</h3>
                <div class="trending-item">
                    <div>
                        <div class="trending-topic">Following</div>
                        <div class="trending-posts"><?php echo convert_number(intval($following_count)) ?></div>
                    </div>
                </div>
                <div class="trending-item">
                    <div>
                        <div class="trending-topic">Followers</div>
                        <div class="trending-posts"><?php echo convert_number(intval($follows_count)) ?></div>
                    </div>
                </div>
                <div class="trending-item">
                    <div>
                        <div class="trending-topic">Posts</div>
                        <div class="trending-posts"><?php echo convert_number(intval($posts_count)) ?></div>
                    </div>
                </div>
            </div>
        </aside>
    </main>

    <script src="./js/index.js"></script>
</body>
</html>
