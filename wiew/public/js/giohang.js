

     $(document).ready(function(){
         
          
         function load_event(){
            $('.xoa').click(function(){
                var id = $(this).attr('id');
                console.log(id);
                Swal.fire({
                    title: 'Xóa sản phẩm này khỏi giỏ hàng!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Xóa thành công',
                            showConfirmButton: false,
                            timer: 800,
                          })
                      $.ajax({
                        url : 'giohang/delete_item',
                        type : 'post',
                        data :{
                            id : id
                        }
                    }).done(function(res){
                        $('#card-loaded').html(res);
                        load_event();        
                    })
                    }
                })
               
            })

            $('.btn-tru').click(function(){
                var id = $(this).attr('id');
                console.log(id);
                $.ajax({
                    url : 'giohang/giam_soluong',
                    type : 'post',
                    data :{
                        id : id
                    }
                }).done(function(res){
                    $('#card-loaded').html(res);
                    load_event();
                    animate_load();
                  
                })
            })

            $('.btn-cong').click(function(){
                var id = $(this).attr('id');
                console.log(id);
                $.ajax({
                    url : 'giohang/tang_soluong',
                    type : 'post',
                    data :{
                        id : id
                    }
                }).done(function(res){
                    $('#card-loaded').html(res);
                    load_event();
                    animate_load();         
                })
            })

            load_soluong();
            load_tongtien();
            show_giohang_header();
         }

         load_event();

         function load_soluong(){
             $.ajax({
                 url : 'giohang/show_soluong',
                 type : 'post',
             }).done(function(res){
                 $('.SoLuongCart').html(res)
             })
         }

         function load_tongtien(){
            $.ajax({
                url : 'giohang/show_tongtien',
                type : 'post'
            }).done(function(res){
                $('#TamTinh').html(res)
                $('#TongTien').html(res)
            })
         }

         function show_giohang_header(){
            $.ajax({
                url : 'giohang/show_giohang_header',
                type : 'post'
            }).done(function(res){
                $('.show-cart').html(res);
            })
         }
         
        //  load_tongtien();

         function animate_load(){
            setTimeout( ()=> {
                $('section#load').fadeIn();         
                $("html, body").animate({ scrollTop: 0 } , 'fast');     
                setTimeout( () => $('section#load').css('display' , 'none') , 500)
            }, 1000)
         }
     })