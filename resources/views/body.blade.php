<div class="content" id="content">
    <div id="content2"></div>
</div>

<script>
    // Function to dynamically load HTML content from a URL
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

    // Initially load content into content2 div
    loadHTMLContent('https://asapial.github.io/WebJa-CSS-Project/Learning Topics/1. align-content.html', 'content2');
</script>
