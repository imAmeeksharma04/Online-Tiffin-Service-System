$(document).ready(function () {
    
    
        $(document).on('click', '.increment-btn', function (e) {
        e.preventDefault();
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

        $(document).on('click', '.decrement-btn', function (e) {
        e.preventDefault();
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    
        $(document).on('click', '.AddToCart-btn', function (e) {
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var T_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "Functions/handlecart.php",
            data: {
                "T_id": T_id,
                "T_qty":qty,
                "scope": "add"
            }, 
            success: function (response) {
                if(response == "already")
                    {
                        alertify.set('notifier','position', 'top-right');
                        alertify.error("Already Exists in cart");
                    }
                    else if(response == 201)
                        {
                            alertify.set('notifier','position', 'top-right');
                            alertify.success("Successfully added");
                        }
                    else if(response == 401)
                    {
                        alertify.set('notifier','position', 'top-right');
                        alertify.error("Login to continue");
                    }
                    else if(response == 500)
                    {
                        alertify.set('notifier','position', 'top-right');
                        alertify.error("Something went wrong");
                    }
            }
            
        });
        
    });


    $(document).on('click', '.updateQty', function () {
    
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var T_id = $(this).closest('.product_data').find('.tId').val();


        $.ajax({
            type: "POST",
            url: "Functions/handlecart.php",
            data: {
                "T_id": T_id,
                "T_qty":qty,
                "scope": "update"
            }, 
            success: function (response) {
                if(response == 200)
                    {
                        alertify.set('notifier','position', 'top-right');
                        // alertify.success(response);
                    }
            }
        });

    });


        $(document).on('click', '.deleteItem', function () {
            var Cart_id = $(this).val();
            // alert(Cart_id);

            $.ajax({
                type: "POST",
                url: "Functions/handlecart.php",
                data: {
                    "Cart_id": Cart_id,
                    "scope": "delete"
                }, 
                success: function (response) {
                    if(response == 200)
                        {
                            alertify.set('notifier','position', 'top-right');
                            alertify.success("Tiffin Removed");
                            $('#mycart').load(location.href + " #mycart")
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response);
                        }
                }
            });
        });

});