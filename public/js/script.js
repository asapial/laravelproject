
function loadHTMLContent(url, elementId) {
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      document.getElementById(elementId).innerHTML = data;
    })
    .catch((error) =>
      console.error("Error loading HTML content:", error)
    );
}

loadHTMLContent('https://asapial.github.io/WebJa-CSS-Project/Learning Topics/1. align-content.html', 'content2');



document.addEventListener("DOMContentLoaded", function(){

    const wrap=document.getElementById("sideBar");
    const burger=document.getElementById("burger");
    const content=document.getElementById("content2");
    const container=document.getElementById("container");
    const preview=document.getElementById("preview");
   

    
    burger.addEventListener('click',function(event)
    {      
        event.stopPropagation();
        burger.style.display="none";
        container.style.gridTemplateColumns="auto  repeat(11,1fr)";
        wrap.style.display="block";
        container.style.gridTemplateAreas=
        `
        "h h h h h h h h h h h h"
        "s c c c c c c c c c c c"
        "s c c c c c c c c c c c"
        `;
    });

    content.addEventListener('click',function(event){

        if(!wrap.contains(event.target) && !burger.contains(event.target) && window.innerWidth<900 ){
            burger.style.display = 'block';
            wrap.style.display="none";
            container.style.gridTemplateColumns=" repeat(12,1fr)";
            container.style.gridTemplateAreas=
            `
       "h h h h h h h h h h h h"
        "c c c c c c c c c c c c"
        "c c c c c c c c c c c c"
        `;
        }
    });


    document.querySelector('#content').addEventListener('click', function(event) {
        if (event.target.closest('.mmd-clipboard-copy-container')) {
          // Get the value from the ClipboardButton element
          const clipboardButton = event.target.closest('.mmd-clipboard-copy-container').querySelector('.ClipboardButton');
          const valueToCopy = clipboardButton.getAttribute('value');
    
          // Use the Clipboard API to copy text to the clipboard
          navigator.clipboard.writeText(valueToCopy).then(function() {
           
            // Optional: Toggle the check icon visibility
            const copyIcon = clipboardButton.querySelector('.mmd-clipboard-copy-icon');
            const checkIcon = clipboardButton.querySelector('.mmd-clipboard-check-icon');
            copyIcon.style.display = 'none';
            checkIcon.style.display = 'inline';
          }).catch(function(error) {
            console.error('Error copying text: ', error);
          });
        }
      });

});


const slider = document.getElementById("theme-slider");
slider.addEventListener("input", () => {
  const value = slider.value;
  const lightness = 100 - value;
  document.body.style.backgroundColor = `hsl(0, 0%, ${lightness}%)`;
  const fontColor = value < 50 ? "#000000" : "#ffffff";
  document.body.style.color = fontColor;
  // const borderColor = value < 50 ? "#000000" : "#ffffff";
  // document.body.style.borderBottomColor = borderColor;
});

  



