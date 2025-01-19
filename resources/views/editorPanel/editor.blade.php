{{-- version 5 --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WebJa HTML Editor</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/editor.css') }}">  <!-- Common CSS File -->
    <link rel="icon" href="/UI/icon/logo-no-background.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/material-palenight.min.css">
    <style>
        .CodeMirror {
            height: 72.5vh !important;
            overflow-y: hidden;

        }
        .CodeMirror-vscrollbar::-webkit-scrollbar{
            width: .5vw !important;
        }
        .CodeMirror-vscrollbar::-webkit-scrollbar-thumb{
            /* background: linear-gradient(135deg, #DAF7A6, #000000); */
            background: #C3E88D;
            border-radius: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>WebJa HTML Editor</h1>
        </header>
        
        <div class="ide">
            <div class="input">
                <div class="top-panel">
                    <div class="sec_1"><button class="run-button" id="run-button">Run</button></div>
                    <div class="sec_2"><button class="live-button" id="live-button">Full Screen</button></div>
                </div>

                <div class="input-panel">
                    <textarea id="code" placeholder="Type your HTML and CSS here..."></textarea>
                </div>
            </div>

            <div class="output">
                <iframe id="output"></iframe>
            </div>
        </div>

        <footer>
            <h2>©️ WebJa</h2>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/css/css.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/htmlmixed/htmlmixed.min.js"></script>

    {{-- <script src="{{ asset('assets/js/codemirror.js') }}"></script>
    <script src="{{ asset('assets/js/xml.js') }}"></script>
    <script src="{{ asset('assets/js/css.js') }}"></script>
    <script src="{{ asset('assets/js/javascript.js') }}"></script>
    <script src="{{ asset('assets/js/htmlmixed.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/codemirror.css') }}"> --}}

    <script>
        const editor = CodeMirror.fromTextArea(document.getElementById('code'), {
            mode: 'htmlmixed',
            theme: 'material-palenight',
            lineNumbers: true,
            lineWrapping: true,
            autoCloseTags: true,
            matchTags: {bothTags: true},
        });

        document.getElementById('run-button').addEventListener('click', function() {
            const code = editor.getValue();
            updateOutput(code);
        });

        document.getElementById('live-button').addEventListener('click', function() {
            const code = editor.getValue();
            liveOutput(code);
        });

        function updateOutput(code) {
            const output = document.getElementById('output');
            const doc = output.contentDocument || output.contentWindow.document;
            doc.open();
            doc.write(code);
            doc.close();
        }

        function liveOutput(code) {
            const newWindow = window.open();
            newWindow.document.open();
            newWindow.document.write(code);
            newWindow.document.title="WebJa Example"
            newWindow.history.pushState(null,'','/WebJa');
            newWindow.document.close();
        }

        document.addEventListener('DOMContentLoaded', async function() {
            try {
                const clipboardText = await navigator.clipboard.readText();
                if (isValidHtml(clipboardText)) {
                    editor.setValue(clipboardText);
                    updateOutput(clipboardText);
                } else {
                    editor.setValue('');
                    updateOutput('');
                }
            } catch (err) {
                console.error('Failed to read clipboard contents: ', err);
                editor.setValue('');
                updateOutput('');
            }
        });

        function isValidHtml(html) {
            const pattern = /<html[\s\S]*<\/html>/i;
            return pattern.test(html);
        }
    </script>
</body>
</html>
