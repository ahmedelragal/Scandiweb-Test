$(document).ready(function () {
    $("#delete-product-btn").click(function () {
        let checkboxes = $("input[type=checkbox]:checked");
        if (checkboxes.length == 0) {
            alert('No Products Selected!');
            return;
        }
        else {
            $("#delete-form").submit();
        }
    })

    $("#add-product-btn").click(function () {
        console.log("clicked");
        window.location.href = "src/view/add_product.php";
    })

});