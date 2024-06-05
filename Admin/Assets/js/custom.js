$(document).ready(function () {
    
    $(document).on('click', '.delete_product_btn', function (e){

        e.preventDefault();

        var id = $(this).val();
        // alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data:{
                        'tiffin_id':id,
                        'delete_product_btn':true,
                    },
                    success: function(response){
                        if(response == 200)
                            {
                                swal("Success!", "tiffin deleted successfully", "success");
                                $("#Tiffin_table").load(location.href + " #Tiffin_table");
                            }
                            else if(response == 500)
                                {
                                    swal("Error!", "Something went wrong", "error");
                                }
                    }
                });
            } 
        });
    })

    $(document).on('click', '.delete_cat_btn', function (e){

    
        
        e.preventDefault();

        var id = $(this).val();
        // alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data:{
                        'Cat_id':id,
                        'delete_cat_btn':true,
                    },
                    success: function(response){
                        if(response == 200)
                            {
                                swal("Success!", "tiffin deleted successfully", "success");
                                $("#Category_table").load(location.href + " #Category_table");
                            }
                            else if(response == 500)
                                {
                                    swal("Error!", "Something went wrong", "error");
                                }
                    }
                });
            } 
        });
    })

});

