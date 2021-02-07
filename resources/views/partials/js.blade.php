<script>
    $(document).on("click",".basket",function(){
        var product_id = $(this).attr('id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('addproduct') }}',
            data:{product_id:product_id},
            success:function(data) {
                $("#prodcut_count").text(data.count);
            }
        });
    });

    $(document).on("click",".heart",function(){
        var product_id = $(this).attr('id');
        //alert(product_id);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('addfavorite') }}',
            data:{product_id:product_id},
            success:function(data) {
                $("#favorite_count").text(data.count);
                if(data.type){
                    $(this).addClass('add');
                }else{
                    $(this).removeClass('add');
                }
            }
        });
    });

    $(document).on("click",".remove",function(){
        var product_id = $(this).attr('id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('remove') }}',
            data:{product_id:product_id},
            success:function(data) {
                $("#favorite_count").text(data.count);
                $("#remove_"+data.product_id).remove();
            }
        });
    });

    $(document).on("click","#show-more-product",function (){
        var value = parseInt($(this).attr('value'));
        $("#show-more-product").attr("value",value+1);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('showproduct') }}',
            data:{value:value},
            success:function(data){
                if(data.status == 1){
                    $("#show-more-product-result").append(data.result);
                }else if(data.status == 0){
                    $("#show-more-product").css("visibility","hidden");
                }
            }
        });
    });

    $(document).on("click","#remove_basket",function(){
        var product_id = $(this).attr('product_id');
        var count = $(this).attr('count');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('removebasket') }}',
            data:{product_id:product_id,count:count},
            success:function(data){
                $("#prodcut_count").text(data.count);
                $(".all").html(data.text);
            }
        });
    });

    $(document).on("click",".inc",function(){
        var id = $(this).parent('.pro-qty').attr('product_id');
        var count =  $(this).parent('.pro-qty').attr('count');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('basketadd') }}',
            data:{id:id,count:count,type:1},
            success:function(data){
                $("#prodcut_count").text(data.all_count);
                $("#product_"+data.product_id).attr('count',data.product_count);
                $(".all").html(data.text);
                $("#price-"+data.product_id).text(data.price_product_text);
                $(".remove_"+data.product_id).attr("count",data.product_count);
            }
        });
    });

    $(document).on("click",".dec",function(){
        var id = $(this).parent('.pro-qty').attr('product_id');
        var count =  $(this).parent('.pro-qty').attr('count');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('basketadd') }}',
            data:{id:id,count:count,type:0},
            success:function(data){
                $("#prodcut_count").text(data.all_count);
                $("#product_"+data.product_id).attr('count',data.product_count);
                $(".all").html(data.text);
                $("#price-"+data.product_id).text(data.price_product_text);
                $(".remove_"+data.product_id).attr("count",data.product_count);
            }
        });
    });

    $(document).on("click","#popular",function(){
        var value = parseInt($(this).attr('value'));
        $("#popular").attr("value",value+1);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('addpopular') }}',
            data:{value:value},
            success:function(data){
                if(data.status == 1){
                    $("#result-popular").append(data.result);
                }else if(data.status == 0){
                    $("#popular").css("visibility","hidden");
                }
            }
        });
    });

    $(document).on("click","#recomend",function(){
        var value = parseInt($(this).attr('value'));
        $("#recomend").attr("value",value+1);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('recomend') }}',
            data:{value:value},
            success:function(data){
                if(data.status == 1){
                    $("#result-recomend").append(data.result);
                }else if(data.status == 0){
                    $("#recomend").css("visibility","hidden");
                }
            }
        });
    });

    $(document).on("click","#discount",function(){
        var value = parseInt($(this).attr('value'));
        $("#discount").attr("value",value+1);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('discount') }}',
            data:{value:value},
            success:function(data){
                if(data.status == 1){
                    $("#result-discount").append(data.result);
                }else if(data.status == 0){
                    $("#discount").css("visibility","hidden");
                }
            }
        });
    });

    $(document).on("click","#all",function(){
        var value = parseInt($(this).attr('value'));
        $("#all").attr("value",value+1);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('all') }}',
            data:{value:value},
            success:function(data){
                if(data.status == 1){
                    $("#result-all").append(data.result);
                }else if(data.status == 0){
                    $("#all").css("visibility","hidden");
                }
            }
        });
    });

    $(document).on("click","#show-news",function(){
        var value = parseInt($(this).attr('value'));
        $("#show-news").attr("value",value+1);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('shownews') }}',
            data:{value:value},
            success:function(data){
                if(data.status == 1){
                    $("#result-show-news").append(data.result);
                }else if(data.status == 0){
                    $("#show-news").css("visibility","hidden");
                }
            }
        });
    });

    $(document).on("click","#show-category",function(){
        var value = parseInt($(this).attr('value'));
        $("#show-category").attr("value",value+1);
        var category_id = $(this).attr('category_id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'{{ route('showcategory') }}',
            data:{value:value,category_id:category_id},
            success:function(data){
                if(data.status == 1){
                    $("#result-show-category").append(data.result);
                }else if(data.status == 0){
                    $("#show-category").css("visibility","hidden");
                }
            }
        });
    });

    $(document).on("click","#edit-image",function(){
        $('#file').trigger('click');
    });

    $(document).ready(function(){
        $("#file").change(function(){
            var fd = new FormData();
            var files = $('#file')[0].files;
            var user_id = $(this).attr('user_id');

            // Check file selected or not
            if(files.length > 0 ){
                fd.append('file',files[0]);
                $.ajax({
                    url:'{{ route('imageupload') }}',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    dataType: "json",
                    data: fd,
                    mimeType: 'multipart/form-data',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response){
                        $("#edit-image").attr("src",response.is);
                        //alert(response.is);
                    }
                });
            }

        });
    });
</script>
