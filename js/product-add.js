function updateProductData (e) {
    var name = $(document.getElementById("name")).val();
    var quantity = $(document.getElementById("number")).val();

    var formData = {
        updatedName: name,
        updateQuantity: quantity
    };

    $.ajax({
        url: '../view/productUpdate.php',
        type: 'POST',
        data: formData,
        success: function (response) {
            // alert(response);
        },
    });

}