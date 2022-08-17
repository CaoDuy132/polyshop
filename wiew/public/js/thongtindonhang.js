 

     
      $(document).ready(function(){
          $('.action-donhang').click(function(){
               var id = $(this).data('id');
               Swal.fire({
                title: 'Hủy đơn hàng này?',
                text: "Đơn hàng của bạn sẽ được admin xét duyệt trước khi hủy!",
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
                        title: 'Đã yêu cầu hủy đơn hàng!',
                        showConfirmButton: false,
                        timer: 700
                    })
                    $.ajax({
                        url : 'donhang/huydonhang_ajax',
                        type : 'post',
                        data : {
                            id : id
                        }
                    }).done(function(res){
                        console.log(res)
                        setTimeout( ()=> window.location.href = location.href , 1100)
                    })
                }
            })
              
          })

          $('#open-search').click(function(){
                New_window =  window.open ("https://i.ghtk.vn/", "poop", "height = 700, width = 700, modal = yes, alwaysRaised = yes");
                New_window.moveTo(450,100);
          })
      })