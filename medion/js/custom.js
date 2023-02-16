$(document).ready(function ()
{
    $('.increment-btn').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty,10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });
    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty,10);
        value = isNaN(value) ? 0 : value;
        if(value > 0)
        {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
   });
   
    $('.addtocart').click(function (e) {
    e.preventDefault();

    var qty = $(this).closest('.product_data').find('.input-qty').val(); 
    var prod_id=$(this).val();
        
    $.ajax({
        method: "POST",
        url:"function/handlecart.php",
        data: {
            "prod_id":prod_id,
            "prod_qty":qty,
            "scope":"add"
        },
        
        success: function(response){
           if(response ==401)
           {
            alert("login to continue");
           }
        }
    }); 

}); 
});