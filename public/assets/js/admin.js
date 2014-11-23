/**
 * Created by AngieDurley on 22/11/14.
 */
$(window).ready(function () {

    if ( $ ('.btn-delete').length)
    {
        $('.btn-delete').click(function () {
            var id = $(this).data('id');
            $(this).parents('tr').fadeOut(1000);
        });
    }

});