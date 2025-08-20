const $fileInputWrapper = $(".file-input-wrapper");
const $fileInput = $("#profile_picture");
const $svgPath = $(".file-input-wrapper svg path");
const $profilePreview = $(".profile-preview");
const $profilePreviewAvatar = $(".profile-preview-avatar");
const $removeBtn = $(".preview-remove");
const $fNameInput = $("#fname");
const $lNameInput = $("#lname");
const $usernameInput = $("#username");
const $emailInput = $("#email");
const $passwordInput = $("#password");
const $confirmPasswordInput = $("#confirm_password");
const $form = $("form");

const handleImageAdd = () => {
  const selectedPath =
    "M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z";

  $fileInputWrapper.addClass("has-preview");
  $svgPath.attr("d", selectedPath);

  $profilePreview.removeClass("hidden");

  const url = URL.createObjectURL($fileInput[0].files[0]);
  $profilePreviewAvatar.attr("src", url);
};

const handleImageRemove = () => {
  const currentSrc = $profilePreviewAvatar.attr("src");
  if (currentSrc && currentSrc.startsWith("blob:")) {
    URL.revokeObjectURL(currentSrc);
  }

  const unSelectedPath =
    "M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z";
  $fileInputWrapper.removeClass("has-preview");
  $svgPath.attr("d", unSelectedPath);
  $profilePreview.addClass("hidden");
  $profilePreviewAvatar.attr("src", "");
  $fileInput.val("");
};

$fileInput.on("change", function () {
  if (this.files && this.files.length > 0) {
    handleImageAdd();
  }
});

$removeBtn.on("click", handleImageRemove);

const handleError = (showError, formGroupClass) => {
  showError
    ? $(formGroupClass).addClass("has-error")
    : $(formGroupClass).removeClass("has-error");
  $(formGroupClass + " .error-message").css(
    "display",
    showError ? "flex" : "none"
  );
};

const validInput = (element, minLength, maxLength, regex, formGroupClass) => {
  const value = element.val().trim();
  const length = value.length;

  if (length < minLength || length > maxLength) {
    handleError(true, formGroupClass);
    return false;
  }

  if (regex) {
    if (!regex.test(value)) {
      handleError(true, formGroupClass);
      return false;
    }
  }

  handleError(false, formGroupClass);
  return true;
};

const comparePassword = (formGroupClass) => {
  const valid =
    $passwordInput.val().length === $confirmPasswordInput.val().length;
  if (!valid) {
    handleError(true, formGroupClass);
    return false;
  }

  handleError(false, formGroupClass);
  return true;
};

$form.on("submit", function (e) {
  e.preventDefault();

  const validFName = validInput(
    $fNameInput,
    1,
    100,
    /^[a-zA-Z]+$/,
    ".fname-form-group"
  );
  const validLName = validInput(
    $lNameInput,
    1,
    100,
    /^[a-zA-Z]+$/,
    ".lname-form-group"
  );
  const validUsername = validInput(
    $usernameInput,
    3,
    20,
    /^[a-zA-Z0-9_]+$/,
    ".username-form-group"
  );
  const validEmail = validInput(
    $emailInput,
    3,
    100,
    /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
    ".email-form-group"
  );
  const validPassword = validInput(
    $passwordInput,
    8,
    100,
    /^\S+$/,
    ".password-form-group"
  );
  const validConfirmPassword = comparePassword(".confirm-password-form-group");

  if (
    validFName &&
    validLName &&
    validUsername &&
    validEmail &&
    validPassword &&
    validConfirmPassword
  ) {
    $form[0].submit();

    // Store Inputs In Session
    sessionStorage.setItem("fname", "$fNameInput.val()");
    sessionStorage.setItem("lname", $lNameInput.val());
    sessionStorage.setItem("username", $usernameInput.val());
    sessionStorage.setItem("email", $emailInput.val());
    sessionStorage.setItem("profile_picture", $fileInput[0].files[0] ? `../upload/profile_pictures/${$fileInput[0].files[0]}` : null); 
    sessionStorage.setItem("last_activity", Date.now());
  }
});
