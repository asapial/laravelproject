// Function to load HTML content dynamically into an element
function loadHTMLContent(url, elementId) {
  fetch(url)
    .then((response) => {
      if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
      return response.text();
    })
    .then((data) => {
      const targetElement = document.getElementById(elementId);
      if (targetElement) {
        targetElement.innerHTML = data;
      } else {
        console.error(`Element with ID "${elementId}" not found.`);
      }
    })
    .catch((error) =>
      console.error("Error loading HTML content:", error)
    );
}

// Load specific content into the #content2 element
loadHTMLContent(
  "Learning Topics/1. align-content.html",
  "content2"
);



document.addEventListener("DOMContentLoaded", function () {
  const wrap = document.getElementById("sideBar");
  const burger = document.getElementById("burger");
  const content = document.getElementById("content2");
  const container = document.getElementById("container");

  // Toggle sidebar visibility on burger button click
  if (burger && wrap && container) {
    burger.addEventListener("click", function (event) {
      event.stopPropagation();
      burger.style.display = "none";
      container.style.gridTemplateColumns = "auto repeat(11, 1fr)";
      wrap.style.display = "block";
      container.style.gridTemplateAreas = `
        "h h h h h h h h h h h h"
        "s c c c c c c c c c c c"
        "s c c c c c c c c c c c"
      `;
    });

    // Hide sidebar when clicking outside of it
    if (content) {
      content.addEventListener("click", function (event) {
        if (
          !wrap.contains(event.target) &&
          !burger.contains(event.target) &&
          window.innerWidth < 900
        ) {
          burger.style.display = "block";
          wrap.style.display = "none";
          container.style.gridTemplateColumns = "repeat(12, 1fr)";
          container.style.gridTemplateAreas = `
            "h h h h h h h h h h h h"
            "c c c c c c c c c c c c"
            "c c c c c c c c c c c c"
          `;
        }
      });
    }
  }

  // Handle clipboard copy functionality
  const contentElement = document.querySelector("#content");
  if (contentElement) {
    contentElement.addEventListener("click", function (event) {
      const copyContainer = event.target.closest(".mmd-clipboard-copy-container");
      if (copyContainer) {
        const clipboardButton = copyContainer.querySelector(".ClipboardButton");
        if (clipboardButton) {
          const valueToCopy = clipboardButton.getAttribute("value");
          navigator.clipboard
            .writeText(valueToCopy)
            .then(function () {
              // Toggle icons to indicate copy success
              const copyIcon = clipboardButton.querySelector(".mmd-clipboard-copy-icon");
              const checkIcon = clipboardButton.querySelector(".mmd-clipboard-check-icon");
              if (copyIcon && checkIcon) {
                copyIcon.style.display = "none";
                checkIcon.style.display = "inline";
                setTimeout(() => {
                  checkIcon.style.display = "none";
                  copyIcon.style.display = "inline";
                }, 2000); // Revert icon after 2 seconds
              }
            })
            .catch(function (error) {
              console.error("Error copying text: ", error);
            });
        }
      }
    });
  }
});

// Theme slider functionality
const slider = document.getElementById("theme-slider");
if (slider) {
  slider.addEventListener("input", () => {
    const value = slider.value;
    const lightness = 100 - value;
    document.body.style.backgroundColor = `hsl(0, 0%, ${lightness}%)`;
    const fontColor = value < 50 ? "#000000" : "#ffffff";
    document.body.style.color = fontColor;
  });
}
