 

   
     
       $(document).ready(function(){

           var idTrangThaiDonHang = 0;
           var date = new Date();
           var thang = date.getMonth()+1;


           $('.show-trangthai').click(function(){
               $('.wrapper-list-trangthai').slideToggle('fast');
           })


           function load_event(){
            $('.huy-don').click(function(){
                Swal.fire({
                    title: 'Xác nhận hủy đơn hàng này?',
                    text: "Đơn hàng này sẽ được đưa vào danh sách hủy!",
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
                            title: 'Hủy thành công!',
                            showConfirmButton: false,
                            timer: 500
                    })
                    //   $('section#load').fadeIn();         
                      var id = $(this).data('id-delete');
                      var id_donhang = $(this).attr('id-donhang');
                      $('section#load').fadeIn();         
                      console.log(id);
                      $.ajax({
                          url : 'donhang/huydonhang_api',
                          type : 'post',
                          data : {
                              id : id,
                              id_donhang : id_donhang
                          }
                      }).done(function(res){
                          console.log(res)
                          setTimeout(()=> window.location.href = location.href , 1000)
                      })
                    }
                })           
               })
           }
           load_event();


           $('.box-item-trangthai').click(function(){
               $('#phantrang').css('display' , 'none');
               $("html, body").animate({ scrollTop: 200 } , 'fast');
               $('section#load').fadeIn();         
               $('.box-item-trangthai').css('background-color' , '#ebeced');
               $('.box-item-trangthai').children().css('color' , 'black');
               $(this).css('background-color' , '#35bd9a');
               $(this).children().css('color' , 'white');
               //
               idTrangThaiDonHang = $(this).data('trangthai');
               $.ajax({
                   url : 'donhang/trangthai_donhang',
                   type : 'post',
                   data : {
                       trangthai : idTrangThaiDonHang
                   }
               }).done(function(res){
                   console.log(res)
                   $('section#load').fadeOut();         
                   if(res != ''){
                       $('.table').fadeIn();
                       $('.dohang-null').css('display' , 'none');
                       $('#donhang-content').html(res)
                   }else{
                       $('.dohang-null').css('display' , 'block');
                       $('.table').css('display' , 'none');
                   }
                   load_event();
               })
           })

          
           $('.btn_phantrang').click(function(){
               $('section#load').fadeIn();         
           })



          $('#select').change(function(){
               $('.box-item-trangthai').css('background-color' , '#ebeced');
               $('.box-item-trangthai').children().css('color' , 'black');
               $("html, body").animate({ scrollTop: 200 } , 'fast');
               var thang = $(this).val();
               $('#thang').html( ' ' + 'tháng ' + thang)
               get_donghang_theothang(thang)
               tongtientheothang(thang)
          })
           
          
           function get_donghang_theothang(thang){
                $('section#load').fadeIn();    
                $.ajax({
                    url : 'donhang/get_donhang_theothang',
                    type : 'post',
                    data : {
                        thang : thang
                    }
                }).done(function(res){
                    $('section#load').fadeOut();    
                    if(res != ''){
                        $('.table').fadeIn();
                        $('.dohang-null').css('display' , 'none');
                        $('#donhang-content').html(res)
                    }else{
                        $('.dohang-null').css('display' , 'block');
                        $('.table').css('display' , 'none');
                    }
                    load_event();
                })
           } 
           
           function tongtientheothang(thang) {
                $.ajax({
                    url : 'donhang/tongtien_theothang',
                    type : 'post',
                    data : {
                        thang : thang
                    }
                }).done(function(res){
                    $('#tongtien').html(res + ' VND');
                })
           }
       })