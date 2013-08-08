function getDownloadURL(url) {
    var req = new XMLHttpRequest();
    req.open("GET", "http://www.kapfer.co.uk/rehost/realdebrid.php?url=" + encodeURIComponent(url), true);
    req.onreadystatechange = function() {
        if (req.readyState === 4) {
            if (req.status !== 200) {
                alert("Konnte Download-URL nicht laden. (" + req.status + ")");
                return;
            }

            var result = JSON.parse(req.responseText);
            if (result.error !== 0) {
                alert(result.message);
                return;
            }
            if (typeof(result.folder) !== "undefined" && result.folder === 1) {
                var links = "";
                for (var i = 0; i < result.urls.length; i++) {
                    links += '<a href="' + result.urls[i] + '" target="_blank">' + result.urls[i] + "</a><br />\n";
                }
                document.body.innerHTML = links;
            }
            else {
                document.location.href = result.url;
            }
        }
    };
    req.send();
}

getDownloadURL(document.location.href);