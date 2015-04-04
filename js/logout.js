
function logout() {
    
    $.get(sitelink + "/server/logout.php", function (data, status) {
        if (data == 'true') {
            window.location.assign(sitelink);
        } else {
            alert("there is some erroe")
        }
    });
}

