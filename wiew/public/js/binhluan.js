 

  

       $(document).ready(function(){

         
           function fetch(){
                   // show action theo bình luận
                $('.show-action').click(function(){
                    $(this).next().slideToggle('fast');
                })

                $('.phanhoi').click(function(){
                    var id = $(this).attr('id');
                    var tenNguoiDung = $('.TenNguoiDung[id=' + id + ']').html();
                    $.ajax({
                        url : 'user/check_login',
                        type : 'post',
                    }).done(function(res){
                        if(res == 'false'){
                            $('.form-login').css('display' , 'flex');
                        }else{
                            // $(this).parent().hide();
                            $('.action[id=' + id + ']').hide();
                            $('.box-phanhoi[id=' + id + ']').css('display' , 'flex');
                            $('.input-phanhoi[id=' + id + ']').attr('placeholder' , 'Trả lời ' + tenNguoiDung);
                        }
                    })           
                   
                                    
                })

                // đóng input phản hồi
                $('.close-phanhoi').click(function(){
                    $(this).parent().hide();
                })
                
                
                // xử lý trả lời bình luận
                $('.input-phanhoi').keyup(function(e){
                        if(e.keyCode == 13){
                            var id = $(this).attr('id');
                            var binhluan = $(this).val();
                            $('.box-phanhoi[id=' + id + ']').css('display' , 'none');
                            
                            $.ajax({
                                url : 'chitietsanpham/them_binhluan',
                                type : 'post',
                                data : {
                                    parentId : id,
                                    NoiDungBL : binhluan
                                }
                            }).done(function(res){
                                $('.binhluan-action .content').html(res)
                                fetch()
                            })
                        }
                    
                })

                // xóa bình luận
                $('.xoa').click(function(){
                    $(this).parent().hide();
                    Swal.fire({
                        title: 'Bạn có muốn xóa?',
                        text: "",
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
                                title: 'Xóa thành công',
                                showConfirmButton: false,
                                timer: 500,
                                width : '350px',
                                height : '150px'
                            })
                          var id = $(this).attr('id');
                          $.ajax({
                              url : 'chitietsanpham/xoa_binhluan',
                              type : 'post',
                              data : {
                                  id : id
                              }
                          }).done(function(res){
                              $('.binhluan-action .content').html(res)
                              fetch()
                          })
                        }
                    
                    })  
                })

                // chỉnh sửa bl
                $('.chinhsua').click(function(){
                    $(this).parent().hide();
                    var id = $(this).attr('id');
                    var value = $('.NoiDungBL[id=' + id + ']').html();
                    $('.chinhsua-bl[id=' + id + ']').val(value);
                    $('.box-chinhsua[id=' + id + ']').show();
                    $('.noidung[id=' + id + ']').hide();
                })

                // tắt chỉnh sửa

                $('.close-chinhsua-bl').click(function(){
                    var id = $(this).attr('id');
                    $('.box-chinhsua[id=' + id + ']').hide();
                    $('.noidung[id=' + id + ']').show();
                })

                // input chỉnh sửa 
                $('.chinhsua-bl').keyup(function(e){
                    if(e.keyCode == 13){
                        var id = $(this).attr('id');
                        var value = $(this).val();
                        if(value != ''){
                             $.ajax({
                                 url : 'chitietsanpham/chinhsua_binhluan',
                                 type : 'post',
                                 data : {
                                     id : id,
                                     value : value
                                 }
                             }).done(function(res){
                                $('.binhluan-action .content').html(res)
                                fetch()
                            })
                        }
                    }
                })
            }


            fetch()



            // thêm bình luận = enter
            $('#value-binhluan').keyup(function(e){

                if(e.keyCode == 13){
                    $('#list-bl').animate({ scrollTop: 200000000 }, "slow");
                    var binhluan = $(this).val();
                    if(binhluan == '') return;
                    $(this).val('');
                    $.ajax({
                        url : 'chitietsanpham/them_binhluan',
                        type : 'post',
                        data : {
                            parentId : 0,
                            NoiDungBL : binhluan
                        }
                    }).done(function(res){
                        $('.binhluan-action .content').html(res)
                        fetch()
                    })

                }
            })

            // thêm bình luận = submit
            $('#submit-binhluan').click(function(){
                var binhluan = $('#value-binhluan').val();
                if(binhluan == '') return;
                $('#value-binhluan').val('');
                $.ajax({
                    url : 'chitietsanpham/them_binhluan',
                    type : 'post',
                    data : {
                        parentId : 0,
                        NoiDungBL : binhluan
                    }
                }).done(function(res){
                    $('.binhluan-action .content').html(res)
                    fetch()
                })
            })
       })