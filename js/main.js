var sitelink = "http://localhost/graduationsurcas";



$(document).ready(function () {

        $(".submit-form-spinner").hide();

    // to solve the trim problem in IE <= 8
    if (typeof String.prototype.trim !== 'function') {
        String.prototype.trim = function () {
            return this.replace(/^\s+|\s+$/g, '');
        }
    }
    
});


    



