$(document).on("click",".basket",function(){
    var product_id = $(this).attr('id');
    var token = $(this).attr('token');
    $.ajax({
        type:'POST',
        url:'/basket',
        data:'_token = csrf_token',
        success:function(data) {
            $("#msg").html(data.msg);
        }
    });
});
