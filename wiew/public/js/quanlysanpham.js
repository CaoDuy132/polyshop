 

      $(document).ready(function(){

         
           
           $('#chontatca').click(function(){
                $('.input-checkbox').prop( "checked", true );
           })

           $('#bochontatca').click(function(){
               $('.input-checkbox').prop( "checked", false );
           })   

           $('#xoa').click(function(){
            Swal.fire({
                title: 'Xóa nhũng sản phẩm này?',
                text: "Danh sách sản phẩm được chọn sẽ bị xóa khỏi hệ thống!",
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
                            url :'admin/xoa_sanpham',
                            type : 'post',
                            data : {
                                id : id
                            }
                        }).done(function(res){
                            console.log(res)
                            setTimeout( ()=> window.location.href = location.href , 1000)
                        })
                    }
                  })
                }
            })          
           })


           function load_event(){
                $('.btn_phantrang').click(function(){
                    var page = $(this).data('page');
                    var value = $('#select').val();
                    $.ajax({
                        url : 'admin/locsp',
                        type :'post',
                        data : {
                            value : value,
                            page : page
                        }
                    }).done(function(res){
                        $('#hienthisanpham').html(res)
                        create_btn_phantrang(page);
                    })
                })
           }

           load_event();

           $('#select').change(function(){
                var value  = $(this).val();
                $.ajax({
                    url : 'admin/locsp',
                    type :'post',
                    data : {
                        value : value,
                        page : 1
                    }
                }).done(function(res){
                    $('#hienthisanpham').html(res)
                    create_btn_phantrang(1);
                })
           })


           function create_btn_phantrang(page){
                $.ajax({
                    url : 'admin/create_btn_phantrang',
                    type :'post',
                    data : {
                        page : page
                    }
                }).done(function(res){
                    $('#phantrang').html(res)
                    load_event()
                })
            }

            $('#input-search').keyup(function(e){
                if(e.keyCode == 13){
                    if($(this).val() != ''){
                        $.ajax({
                            url : 'admin/timkiem_sanpham',
                            type : 'post',
                            data : {
                                value : $(this).val()
                            }
                        }).done(function(res){
                            $('#hienthisanpham').html(res)
                            $('#phantrang').css('display' , 'none');
                        })
                    }else{
                        window.location.href = location.href;
                    }
                }
            })
      })