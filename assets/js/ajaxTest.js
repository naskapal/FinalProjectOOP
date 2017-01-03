if (window.XMLHttpRequest) {
    // code for modern browsers
    xmlhttp = new XMLHttpRequest();
 } else {
    // code for old IE browsers
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

// xhttp.onreadystatechange =
function editAjax(username) {
  if (this.readyState == 4 && this.status == 200) {
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "edit_admin.php?username="+username, true);
    xhttp.send();
    document.getElementById("demo").innerHTML = xhttp.responseText;
  }
};
