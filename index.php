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
                <img src=<?php echo isset($_SESSION["profile_picture"]) ? "./" . $_SESSION["profile_picture"] : "" ?> alt="User Avatar" class="user-avatar">
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
                    <img src=<?php echo isset($_SESSION["profile_picture"]) ? $_SESSION["profile_picture"] : "" ?> alt="Your Avatar" class="composer-avatar">
                    <div>
                        <h4>What's on your mind?</h4>
                    </div>
                </div>
                <textarea class="composer-textarea" placeholder="Share your thoughts with the community..." rows="3"></textarea>
                <div class="composer-actions">
                    <div class="composer-options">
                        <button class="composer-btn" title="Add Photo">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <button class="composer-btn" title="Add Video">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                            </svg>
                        </button>
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

            <article class="post">
                <div class="post-header">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=96&h=96&fit=crop&crop=face" alt="User Avatar" class="post-avatar">
                    <div class="post-user-info">
                        <h4>Sarah Johnson</h4>
                        <p>@sarahj • 2 hours ago</p>
                    </div>
                </div>
                <div class="post-content">
                    <p>Just finished reading an amazing book about sustainable living! 📚✨ The insights about reducing our carbon footprint while maintaining a comfortable lifestyle are truly eye-opening. Highly recommend "The Sustainable Home" by anyone interested in making a positive environmental impact.</p>
                    <p>What are your favorite eco-friendly habits? I'd love to hear your tips! 🌱</p>
                </div>
                <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=600&h=300&fit=crop" alt="Book and plant" class="post-image">
                <div class="post-actions">
                    <div class="action-buttons">
                        <button class="action-btn">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                            </svg>
                            <span>24</span>
                        </button>
                        <button class="action-btn">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                            </svg>
                            <span>8</span>
                        </button>
                        <button class="action-btn">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                            </svg>
                            <span>Share</span>
                        </button>
                    </div>
                </div>
            </article>

            <article class="post">
                <div class="post-header">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=96&h=96&fit=crop&crop=face" alt="User Avatar" class="post-avatar">
                    <div class="post-user-info">
                        <h4>Alex Chen</h4>
                        <p>@alexchen • 4 hours ago</p>
                    </div>
                </div>
                <div class="post-content">
                    <p>Working on a new project that combines AI with sustainable agriculture 🚜🤖 The potential to optimize crop yields while reducing environmental impact is incredible!</p>
                    <p>Technology for good is what gets me excited every morning. What projects are you passionate about? #TechForGood #AI #Sustainability</p>
                </div>
                <div class="post-actions">
                    <div class="action-buttons">
                        <button class="action-btn liked">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                            </svg>
                            <span>42</span>
                        </button>
                        <button class="action-btn">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                            </svg>
                            <span>15</span>
                        </button>
                        <button class="action-btn">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                            </svg>
                            <span>Share</span>
                        </button>
                    </div>
                </div>
            </article>

            <article class="post">
                <div class="post-header">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=96&h=96&fit=crop&crop=face" alt="User Avatar" class="post-avatar">
                    <div class="post-user-info">
                        <h4>Emma Rodriguez</h4>
                        <p>@emmarodriguez • 6 hours ago</p>
                    </div>
                </div>
                <div class="post-content">
                    <p>Beautiful sunset from my evening walk today 🌅 Sometimes the best therapy is just stepping outside and appreciating the world around us.</p>
                    <p>Hope everyone is having a wonderful day! Remember to take breaks and enjoy the little moments ✨</p>
                </div>
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&h=300&fit=crop" alt="Beautiful sunset" class="post-image">
                <div class="post-actions">
                    <div class="action-buttons">
                        <button class="action-btn">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                            </svg>
                            <span>67</span>
                        </button>
                        <button class="action-btn">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                            </svg>
                            <span>12</span>
                        </button>
                        <button class="action-btn">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                            </svg>
                            <span>Share</span>
                        </button>
                    </div>
                </div>
            </article>
        </section>

        <aside class="right-sidebar">
            <div class="widget">
                <h3>Trending Topics</h3>
                <div class="trending-item">
                    <div>
                        <div class="trending-topic">#TechForGood</div>
                        <div class="trending-posts">1.2K posts</div>
                    </div>
                </div>
                <div class="trending-item">
                    <div>
                        <div class="trending-topic">#Sustainability</div>
                        <div class="trending-posts">892 posts</div>
                    </div>
                </div>
                <div class="trending-item">
                    <div>
                        <div class="trending-topic">#AI</div>
                        <div class="trending-posts">2.1K posts</div>
                    </div>
                </div>
                <div class="trending-item">
                    <div>
                        <div class="trending-topic">#Mindfulness</div>
                        <div class="trending-posts">567 posts</div>
                    </div>
                </div>
                <div class="trending-item">
                    <div>
                        <div class="trending-topic">#Photography</div>
                        <div class="trending-posts">1.5K posts</div>
                    </div>
                </div>
            </div>

            <div class="widget">
                <h3>Suggested for You</h3>
                <div class="suggested-user">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=80&h=80&fit=crop&crop=face" alt="Suggested User" class="suggested-avatar">
                    <div class="suggested-info">
                        <div class="suggested-name">David Kim</div>
                        <div class="suggested-username">@davidkim</div>
                    </div>
                    <button class="follow-btn">Follow</button>
                </div>
                <div class="suggested-user">
                    <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=80&h=80&fit=crop&crop=face" alt="Suggested User" class="suggested-avatar">
                    <div class="suggested-info">
                        <div class="suggested-name">Maria Santos</div>
                        <div class="suggested-username">@mariasantos</div>
                    </div>
                    <button class="follow-btn">Follow</button>
                </div>
                <div class="suggested-user">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face" alt="Suggested User" class="suggested-avatar">
                    <div class="suggested-info">
                        <div class="suggested-name">James Wilson</div>
                        <div class="suggested-username">@jameswilson</div>
                    </div>
                    <button class="follow-btn">Follow</button>
                </div>
            </div>

            <div class="widget">
                <h3>Quick Stats</h3>
                <div class="trending-item">
                    <div>
                        <div class="trending-topic">Following</div>
                        <div class="trending-posts">245</div>
                    </div>
                </div>
                <div class="trending-item">
                    <div>
                        <div class="trending-topic">Followers</div>
                        <div class="trending-posts">1,023</div>
                    </div>
                </div>
                <div class="trending-item">
                    <div>
                        <div class="trending-topic">Posts</div>
                        <div class="trending-posts">87</div>
                    </div>
                </div>
            </div>
        </aside>
    </main>

    <script src="./js/index.js"></script>
</body>
</html>