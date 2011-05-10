(function($) {
    // These first three lines of code compensate for Javascript being turned on and off. 
    // It simply changes the submit input field from a type of "submit" to a type of "button".
$(document).ready(function(){

    var paraTag = $('#contact-form input#submit').parent('p');
    $(paraTag).children('input').remove();
    $(paraTag).append('<input type="button" name="submit" id="submit" value="Send Message" />');

    $('#contact-form input#submit').click(function() {
        $('#contact-form').append('<class="loaderIcon" alt="Loading..." />');

        var name = $('input#name').val();
        var email = $('input#email').val();
        var comments = $('textarea#comments').val();
        var to = $('input#to').val();
        var subject = $('input#subject').val();

		var path = $("meta[name=temp_url]").attr('content');

        $.ajax({
            type: 'post',
            url: path + '/scripts/contact_form/sendEmail.php',
            data: 'name=' + name + '&email=' + email + '&comments=' + comments + '&to=' + to + '&subject=' + subject,

            success: function(results) {
                $('#contact-form img.loaderIcon').fadeOut(1000);
                $('ul#response').html(results);
            }
        }); // end ajax
		return false;
    });
});
})(jQuery);
		