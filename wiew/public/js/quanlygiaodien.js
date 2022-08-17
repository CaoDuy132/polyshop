 

  
     $(document).ready(function(){
       

         $('#input-banner').change(function(){
            var banner = $(this).prop('files')[0];
            if(banner.type != 'image/jpeg' && banner.type != 'image/png' && banner.type != 'image/gif'){
                $('#banner-erro').show('fast');
                $('#banner-erro').html('Chỉ được tải ảnh!');
            }else{
                $('section#load').fadeIn();         
                $('#banner-erro').hide('fast');
                var formData = new FormData();
                formData.append('banner' ,banner );
                $.ajax({
                    url: 'giaodien/them_banner',
                    type :'post',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data : formData
                }).done(function(res){
                    setTimeout(()=> window.location.href = location.href , 1000)
                })
            }
        })

        $('.xoa-banner').click(function(){
             Swal.fire({
                title: 'Xóa banner này?',
                text: "Banner này sẽ bị xóa và sẽ không hiển thị ở trang chủ!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
              }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Xóa thành công!',
                        showConfirmButton: false,
                        timer: 500
                    })
                    $('section#load').fadeIn();         
                    var id = $(this).data('id');       
                    $.ajax({
                        url : 'giaodien/xoa_giaodien',
                        type : 'post',
                        data : {
                            id : id
                        }
                    }).done(function(res){
                        setTimeout(()=> window.location.href = location.href , 1000)
                    })
                }
            })  
        })

     })