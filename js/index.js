// Post composer functionality
const textarea = document.querySelector(".composer-textarea");
const postBtn = document.querySelector(".post-btn");

textarea.addEventListener("input", function () {
  if (this.value.trim().length > 0) {
    postBtn.disabled = false;
  } else {
    postBtn.disabled = true;
  }
});

// Like button functionality
document.querySelectorAll(".action-btn").forEach((btn) => {
  if (
    btn.innerHTML.includes(
      'path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10'
    )
  ) {
    btn.addEventListener("click", function () {
      this.classList.toggle("liked");
      const span = this.querySelector("span");
      const count = parseInt(span.textContent);
      if (this.classList.contains("liked")) {
        span.textContent = count + 1;
      } else {
        span.textContent = count - 1;
      }
    });
  }
});

// Follow button functionality
document.querySelectorAll(".follow-btn").forEach((btn) => {
  btn.addEventListener("click", function () {
    if (this.textContent === "Follow") {
      this.textContent = "Following";
      this.style.background = "#10b981";
    } else {
      this.textContent = "Follow";
      this.style.background = "";
    }
  });
});

// Post functionality
postBtn.addEventListener("click", function () {
  if (textarea.value.trim()) {
    // Simulate posting
    this.disabled = true;
    this.textContent = "Posting...";

    setTimeout(() => {
      // Create new post element
      const newPost = document.createElement("article");
      newPost.className = "post";
      newPost.innerHTML = `
                        <div class="post-header">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=96&h=96&fit=crop&crop=face" alt="Your Avatar" class="post-avatar">
                            <div class="post-user-info">
                                <h4>You</h4>
                                <p>@you • now</p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p>${textarea.value}</p>
                        </div>
                        <div class="post-actions">
                            <div class="action-buttons">
                                <button class="action-btn">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>0</span>
                                </button>
                                <button class="action-btn">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>0</span>
                                </button>
                                <button class="action-btn">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                                    </svg>
                                    <span>Share</span>
                                </button>
                            </div>
                        </div>
                    `;

      // Add the new post to the feed
      const feed = document.querySelector(".feed");
      feed.insertBefore(newPost, feed.children[1]);

      // Clear the textarea
      textarea.value = "";
      this.disabled = true;
      this.textContent = "Post";

      // Add like functionality to the new post
      newPost
        .querySelector(".action-btn")
        .addEventListener("click", function () {
          this.classList.toggle("liked");
          const span = this.querySelector("span");
          const count = parseInt(span.textContent);
          if (this.classList.contains("liked")) {
            span.textContent = count + 1;
          } else {
            span.textContent = count - 1;
          }
        });
    }, 1000);
  }
});

// Search functionality
const searchInput = document.querySelector(".search-bar input");
searchInput.addEventListener("input", function () {
  // Simulate search functionality
  if (this.value.length > 2) {
    console.log("Searching for:", this.value);
  }
});
