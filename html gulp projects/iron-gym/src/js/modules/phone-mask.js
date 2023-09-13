export default function initiatePhoneMask() {
  /* Phone Mask */
  mask("[data-tel-input]");

  // Remove '+' if nothing else is entered to show placeholder
  const phoneInputs = document.querySelectorAll("[data-tel-input]");
  phoneInputs.forEach((input) => {
    input.addEventListener("input", () => {
      if (input.value == "+") input.value = "";
    });
    input.addEventListener("blur", () => {
      if (input.value == "+") input.value = "";
    });
  });
}
