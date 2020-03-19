
$('.clear').on('click',function(){

    let _del = $(this).closest("tr")[0].cells[0].innerText;
    let _th = $(this).closest("tr")[0];
    let configg=confirm("Are you want to delete?");
    if (configg) {
        $.ajax({
            url: '../delProduct.php',
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
            url: '../del.php',
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
            url: '../deleteMod.php',
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