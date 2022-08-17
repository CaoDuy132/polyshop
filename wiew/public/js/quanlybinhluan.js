

    $(document).ready(function(){
         $('#select').change(function(){
             var orderby = $(this).val();
             console.log(orderby)
             $.ajax({
                 url : 'admin/orderby_binhluan_ajax',
                 type : 'post',
                 data : {
                    orderby : orderby
                 }
             }).done(function(res){
                 $('#hienthibinhluan').html(res)
             })
         })
    })