// Post composer functionality
const textarea = document.querySelector(".composer-textarea");
const postBtn = document.querySelector(".post-btn");
const $imageInput = $("#photo-upload");
const $imagePreview = $(".post-image-preview");
const $videoInput = $("#video-upload");
const $videoPreview = $(".post-video-preview");
const $textarea = $(".composer-textarea");
const $postBtn = $(".post-btn");

const showPreview = ($input, $preview, $class) => {
  const url = URL.createObjectURL($input[0].files[0]);
  $preview.attr("src", url);
  $preview.removeClass($class);
};

const removePreview = ($input, $preview, $class) => {
  $input.val("");
  $preview.attr("src", "");
  $preview.addClass($class);
};

$imageInput.on("change", function () {
  if (!(this.files && this.files.length > 0)) {
    removePreview($(this), $imagePreview, "post-image-preview");
    return;
  }
  showPreview($(this), $imagePreview, "post-image-preview");
});

$videoInput.on("change", function () {
  if (!(this.files && this.files.length > 0)) {
    removePreview($(this), $videoPreview, "post-video-preview");
    return;
  }
  showPreview($(this), $videoPreview, "post-video-preview");
});

textarea.addEventListener("input", function () {
  if (this.value.trim().length > 0) {
    postBtn.disabled = false;
  } else {
    postBtn.disabled = true;
  }
});

$postBtn.on("click", function () {
  const textAreaVal = $textarea.val().trim();
  const imageFile = $imageInput[0].files[0] ;

  const formData = new FormData();
  
  textAreaVal ? formData.append("text", textAreaVal) : null;
  imageFile ? formData.append("image", imageFile) : null;
  for (let pair of formData.entries()) {
    console.log(pair[0]+ ':', pair[1]);
  }

  $.ajax({
    url: "./includes/post.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (res) {
      console.log("Success: ", res);
      alert('Upload successful!');
    },
    error: function (xhr, status, error) {
      console.error("Error:", error);
      alert('Upload failed');
    }
  });

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
sessionStorage.setItem("fname", "John");
sessionStorage.setItem("lname", "Doe");
sessionStorage.setItem("username", "JohnDoe");
sessionStorage.setItem("email", "JohnDoe@gmail.com");
sessionStorage.setItem("profile_picture", "./uploads/profile_pictures/1.jpg");
sessionStorage.setItem("last_activity", Date.now());

postBtn.addEventListener("click", function () {
  if (textarea.value.trim()) {
    this.disabled = true;
    this.textContent = "Posting...";

    setTimeout(() => {
      const newPost = document.createElement("article");
      newPost.className = "post";
      newPost.innerHTML = `
                        <div class="post-header">
                            <img src="${sessionStorage.getItem(
                              "profile_picture"
                            )}" alt="Your Avatar" class="post-avatar">
                            <div class="post-user-info">
                                <h4>${sessionStorage.getItem(
                                  "fname"
                                )} ${sessionStorage.getItem("lname")}</h4>
                                <p>@${sessionStorage.getItem(
                                  "username"
                                )} • now</p>
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

const searchInput = document.querySelector(".search-bar input");
searchInput.addEventListener("input", function () {
  if (this.value.length > 2) {
    console.log("Searching for:", this.value);
  }
});
