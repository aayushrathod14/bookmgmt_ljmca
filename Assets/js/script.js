$(document).ready(function () {
    $(".itemListQuantity").on('change', function () {
        var book_id = $(this).data('fid');
        $('#total_quantity'+ book_id).val($(this).val());
        console.log(book_id);
    });  
});