var sitelink = "http://192.168.1.12/graduationProject";

$(document).ready(function () {

    // to solve the trim problem in IE <= 8
    if (typeof String.prototype.trim !== 'function') {
        String.prototype.trim = function () {
            return this.replace(/^\s+|\s+$/g, '');
        }
    }
    

});


