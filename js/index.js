
$('.clear').on('click',function(){

    let _del = $(this).closest("tr")[0].cells[0].innerText;
    let _th = $(this).closest("tr")[0];
    let configg=confirm("Are you want to delete?");
    if (configg) {
        $.ajax({
            url: '../products/delProduct.php',
            type: 'POST',
            data: {id: _del},
            success: function (data) {
                if (data){
                    _th.remove();
                }

            }
        });
    }

});

$('.delete').on('click',function(){

    let _idd = $(this).closest("tr")[0].cells[0].innerText;
    let _thiss = $(this).closest("tr")[0];
    let config=confirm("Are you want to delete?");
    if (config) {
        $.ajax({
            url: '../categories/del.php',
            type: 'POST',
            data: {id: _idd},
            success: function (data) {
                if (data){
                    _thiss.remove();
                }

            }
        });
    }

});
$('.del').on('click',function(){

    let _id = $(this).closest("tr")[0].cells[0].innerText;
    let _this = $(this).closest("tr")[0];
    let conf=confirm("Are you want to delete?");
    if (conf) {
        $.ajax({
            url: '../model/deleteMod.php',
            type: 'POST',
            data: {id: _id},
            success: function (data) {
                if (data){
                    _this.remove();
                }

            }
        });
    }

});

$('#catSearch').keyup(function () {
    let txt=$(this).val();
    if(txt != '') {
        $.ajax({
            url: '../categories/searchCategory.php',
            type: 'POST',
            data: {text: txt},
            success: function (data) {
                if (data){
                    $('#table').html(data);
                } else{
                    $('#table').html('Name is not found');
                }

            }
        });
    } else {
        $('#table_data').html('Name is not found');
    }
})

$('#search').keyup(function () {
    let text=$(this).val();
    if(text != '') {
        $.ajax({
            url: '../model/searchMod.php',
            type: 'POST',
            data: {text: text},
            success: function (data) {
                if (data){
                    $('#table_data').html(data);
                } else{
                    $('#table_data').html('Name is not found');
                }

            }
        });
    } else {
        alert("Name is nor found");
    }
})

$('#prSearch').keyup(function () {
    let name=$(this).val();
    if(name != '') {
        $.ajax({
            url: '../products/searchProduct.php',
            type: 'POST',
            data: {txt: name},
            success: function (data) {
                if (data){
                    $('#table_data').html(data);
                } else{
                    $('#table_data').html('Name is not found');
                }

            }
        });
    } else {
        alert("Name is nor found");
    }
})
