function showUser(str) {
    if (str == "") {
        document.getElementById("myTabContent").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("myTabContent").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../controller/vistaPersona.php?q="+str,true);
        xmlhttp.send();
    }
};
