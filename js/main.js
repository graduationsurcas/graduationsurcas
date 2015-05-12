var sitelink = "http://192.168.1.14/graduationsurcas";



$(document).ready(function () {

        $(".submit-form-spinner").hide();

    // to solve the trim problem in IE <= 8
    if (typeof String.prototype.trim !== 'function') {
        String.prototype.trim = function () {
            return this.replace(/^\s+|\s+$/g, '');
        }
    };
    
     //  To add new input file field dynamically,
    //   on click of "Add More Files" button below
    //    function will be executed.
    $('#add_more').click(function () {
        $(this).before($("<div/>", {
            id: 'filediv'
        }).fadeIn('slow').append($("<input/>", {
            name: 'file[]',
            type: 'file',
            id: 'new_item_name_image',
            class: 'form-control'
        }), $("<br/><br/>")));
    });
    
});


    



