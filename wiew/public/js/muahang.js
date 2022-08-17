  
    
        var idSP = 0;
        var SoLuongSize = 0;
        var idSize = 0;

        function load_event(){

                $('.themvaogio').click(function(){
                    $('#submit-muahang').html('Thêm vào giỏ')
                    $('#submit-muahang').attr('data-submit' , 'themvaogio')
                    SoLuongSize = 0;
                    idSize = 0;
                    idSP = $(this).data('id');
                    $('.wrapper-themvaogio').css('display' , 'flex');
                    show_chitietsanpham(idSP , 0);
                })


                $('.muangay').click(function(){
                    $('#submit-muahang').html('Thanh toán')
                    $('#submit-muahang').attr('data-submit' , 'thanhtoan')
                    SoLuongSize = 0;
                    idSize = 0;
                    idSP = $(this).data('id');
                    $('.wrapper-themvaogio').css('display' , 'flex');
                    show_chitietsanpham(idSP , 0);
                })

                $('#chonsize').change(function(){
                    idSize = $('#chonsize option:selected').data('id');
                    console.log(idSize);
                    $.ajax({
                        url : 'sanpham/show_size',
                        type : 'post',
                        data : {
                            idSize : idSize
                        }
                    }).done(function(res){
                        SoLuongSize = parseInt(res);
                        $('#SoLuongSize').html('(' + res + ') có sẵn');
                        $('#SoLuongSP').val(1)
                        $('#SoLuongToiDa').html('');
                    })
                })


                $('.show-color-detail').click(function(){
                    SoLuongSize = 0;
                    idSize = 0;
                    var idCTSP = $(this).data('id');
                    $.ajax({
                        url : 'sanpham/show_chitietsanpham',
                        type :'post',
                        data : {
                            idSP : idSP ,
                            idCTSP : idCTSP
                        }
                    }).done(function(res){
                        $('.wrapper-themvaogio .box-themvaogio > .content').html(res)
                        load_event();
                    })
            })

            $('#TangSoLuong').click(function(){
                    if(SoLuongSize == 0){
                        $('#SoLuongToiDa').html('Hãy chọn size cho sản phẩm!');
                        $(this).val(1)
                        return;
                    }
                    if($('#SoLuongSP').val() >=  SoLuongSize) return;
                    var SoLuong = parseInt($('#SoLuongSP').val()) + 1;
                    $('#SoLuongSP').val(SoLuong);
                    $('#SoLuongToiDa').html('Tối đa ' + SoLuongSize + ' sản phẩm!')
            })

            $('#GiamSoLuong').click(function(){
                if(SoLuongSize == 0){
                        $('#SoLuongToiDa').html('Hãy chọn size cho sản phẩm!');
                        $(this).val(1)
                        return;
                    }
                    if($('#SoLuongSP').val() <= 1) return;
                    var SoLuong = parseInt($('#SoLuongSP').val()) - 1;
                    console.log(SoLuong)
                    $('#SoLuongSP').val(SoLuong);
            })

            
            $('#SoLuongSP').change(function(){
                if(SoLuongSize == 0){
                        $('#SoLuongToiDa').html('Hãy chọn size cho sản phẩm!');
                        $(this).val(1)
                        return;
                }
                if( $(this).val() == '' || $(this).val() < 1){
                    $(this).val(1)
                }
                if($(this).val() > SoLuongSize){
                    $('#SoLuongToiDa').html('Tối đa ' + SoLuongSize + ' sản phẩm!')
                    $(this).val(SoLuongSize)
                }else{
                    $('#SoLuongToiDa').html('')
                }
            })

        }
        load_event()


        function show_chitietsanpham(idSP , idCTSP){
            $.ajax({
                url : 'sanpham/show_chitietsanpham',
                type :'post',
                data : {
                    idSP : idSP ,
                    idCTSP : idCTSP
                }
            }).done(function(res){
                $('.wrapper-themvaogio .box-themvaogio > .content').html(res)
                load_event()
            })
        }

       
        $('#close-themvaogio').click(function(){
             $('.wrapper-themvaogio').fadeOut('fast');
        })



        $('#submit-muahang').click(function(){
             if(idSize != 0){
                var SoLuong = $('#SoLuongSP').val();
                muahang(idSize , SoLuong);
                if($(this).attr('data-submit') == 'thanhtoan'){
                    setTimeout( ()=>  window.location.href = '/thanhtoan', 1000)
                }
             }else{
                $('#SoLuongToiDa').html('Hãy chọn size cho sản phẩm!');
             }
        })

        export function muahang(idSize , SoLuong){
            $.ajax({
                url : 'giohang/add_item',
                type : 'post',
                data : {
                    idSize : idSize,
                    SoLuong : SoLuong
                }
            }).done(function(res){
                $('.show-cart').html(res);
                $('#SoLuongSP').val(1)
                idSize = 0;
                $('.wrapper-themvaogio').fadeOut();
                load_soluong();
            })
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Thêm vào giỏ thành công',
                showConfirmButton: false,
                timer: 800,
                width : '350px',
                height : '150px'
            })
        }


        function load_soluong(){
            $.ajax({
                url : 'giohang/show_soluong',
                type : 'post',
            }).done(function(res){
                console.log(res)
                $('.SoLuongCart').html(res)
            })
        }

      

        export default load_event;

    


