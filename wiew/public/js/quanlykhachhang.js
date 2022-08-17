


    $(document).ready(function(){

         $('#select').change(function(){
             var value = $(this).val();
             $.ajax({
                 url : 'admin/order_by_khachhang',
                 type : 'post',
                 data : {
                    orderby : value
                 }
             }).done(function(res){
                 $('#hienthikhachhang').html(res)
             })
         })
    })