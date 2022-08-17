 
  
     $(document).ready(function(){
        $('#chontatca').click(function(){
            $('.input-checkbox').prop( "checked", true );
       })

       $('#bochontatca').click(function(){
           $('.input-checkbox').prop( "checked", false );
       })   

       $('#xoa').click(function(){
        Swal.fire({
            title: 'Xóa nhũng danh mục này?',
            text: "Danh sách danh mục được chọn sẽ bị xóa khỏi hệ thống!",
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
              $('.input-checkbox').each(function(){
                var id = $(this).data('id');
                if($(this).prop('checked') == true){
                    $.ajax({
                        url : 'admin/xoa_danhmuc',
                        type : 'post',
                        data : {
                            id : id
                        }
                    }).done(function(res){
                         setTimeout(()=> window.location.href = location.href , 500);
                    })
                }
              })
            }
        })          
       })

     })
       