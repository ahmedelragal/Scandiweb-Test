$(document).ready(function () {
    $("#save-btn").click(function (e) {
        e.preventDefault();
        validate();
    });
    $("#productType").change(function () {
        console.log("changed");
        var selectValue = $(this).val();
        console.log(selectValue);
        if (selectValue == "DVD") {
            $("#DVD").show();
            $("#Book").hide();
            $("#Furniture").hide();
        } else if (selectValue == "Book") {
            $("#DVD").hide();
            $("#Book").show();
            $("#Furniture").hide();
        } else if (selectValue == "Furniture") {
            $("#DVD").hide();
            $("#Book").hide();
            $("#Furniture").show();
        } else {
            $("#DVD").hide();
            $("#Book").hide();
            $("#Furniture").hide();
        }
    });
    $("#cancel-btn").click(function () {
        window.location.href = "../../";
    })
});

function validate() {
    var inputs = document.getElementsByClassName('inputs');
    var error = document.getElementsByClassName('error');
    if (inputs[0].value == "" || inputs[1].value == "" || inputs[2].value == "") {
        error[0].innerText = "Please, submit required data";
        return;
    }
    if (isNaN(Number(inputs[2].value))) {
        error[0].innerText = "Please, provide the data of the indicated type";
        return;
    }

    if (inputs[3].value == "DVD") {
        if (inputs[4].value == "") {
            error[0].innerText = "Please, submit required data";
            return;
        }
        if (isNaN(Number(inputs[4].value))) {
            error[0].innerText = "Please, provide the data of the indicated type";
            return;
        }
    }
    else if (inputs[3].value == "Book") {
        if (inputs[5].value == "") {
            console.log('empty');
            error[0].innerText = "Please, submit required data";
            return;
        }
        if (isNaN(Number(inputs[5].value))) {
            error[0].innerText = "Please, provide the data of the indicated type";
            return;
        }
    }

    else if (inputs[3].value == "Furniture") {
        if (inputs[6].value == "" || inputs[7].value == "" || inputs[8].value == "") {
            error[0].innerText = "Please, submit required data";
            return;
        }
        if (isNaN(Number(inputs[6].value)) || isNaN(Number(inputs[7].value)) || isNaN(Number(inputs[8].value))) {
            error[0].innerText = "Please, provide the data of the indicated type";
            return;
        }

    }
    $.ajax({
        type: "POST",
        url: "../controller/AddSubmit.php",
        data: {
            sku: inputs[0].value,
            name: inputs[1].value,
            price: inputs[2].value,
            type: inputs[3].value,
            size: inputs[4].value,
            weight: inputs[5].value,
            height: inputs[6].value,
            width: inputs[7].value,
            length: inputs[8].value,
            register: true
        },
        dataType: "text",
        success: function (response) {
            console.log(response);
            if (response === 'success') {
                window.location.href = "../../";
            } else if (response === 'sku') {
                error[0].innerText = "SKU Already Exists";
            } else if (response === 'sqlfailure') {
                error[0].innerText = "Error sql query failure";
            }
            else {
                error[0].innerText = "Error";
            }
        }
    });
}