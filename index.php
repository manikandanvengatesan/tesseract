<html>
<head>
    <script src="https://cdn.rawgit.com/naptha/tesseract.js/0.2.0/dist/tesseract.js"></script>
</head>
<body>
    <input type="file" id="file" name="url" />
    <input type="button" id="go_button" value="Run" onclick='runOCR();'/>
    <div id="ocr_results"> </div>
    <div id="ocr_status"> </div>
</body>
<script>
    function runOCR() {
        var image = document.getElementById("file").files[0].name;
        Tesseract.recognize(image)
            .then(function(result) {
                document.getElementById("ocr_results")
                    .innerText = result.text;
            }).progress(function(result) {
                document.getElementById("ocr_status")
                    .innerText = result["status"] + " (" +
                    (result["progress"] * 100) + "%)";
            });
    }

    document.getElementById("go_button")
        .addEventListener("click", function(e) {
            var url = document.getElementById("url").value;
            runOCR(url);
        });
</script>

</html>