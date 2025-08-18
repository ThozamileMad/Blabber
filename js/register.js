const fileInputWrapper = document.querySelector(".file-input-wrapper");
const fileInput = document.getElementById("profile_picture");
const svgPath = document.querySelector(".file-input-wrapper svg path");
const profilePreview = document.querySelector(".profile-preview");
const profilePreviewAvatar = document.querySelector(".profile-preview-avatar");
const removeBtn = document.querySelector(".preview-remove");

const handleImageAdd = () => {
  const selectedPath =
    "M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z";
  fileInputWrapper.classList.add("has-preview");
  svgPath.setAttribute("d", selectedPath);

  profilePreview.classList.remove("hidden");
  const url = URL.createObjectURL(fileInput.files[0]);
  profilePreviewAvatar.src = url;
};

const handleImageRemove = () => {
  const unSelectedPath =
    "M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z";
  fileInputWrapper.classList.remove("has-preview");
  svgPath.setAttribute("d", unSelectedPath);

  profilePreview.classList.add("hidden");
  profilePreviewAvatar.src = "";
};

fileInput.addEventListener("change", () => {
  if (!(fileInput.files && fileInput.files.length > 0)) {
    handleImageRemove();
    return;
  }

  handleImageAdd();
});

removeBtn.addEventListener("click", handleImageRemove);
