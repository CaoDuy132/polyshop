
    import load_event  from './muahang.js';
    import {muahang} from  './muahang.js';
 
    $(document).ready(function(){

         var idCTSP = sessionStorage['idCTSP_default'];
         var idSize = 0;
         var SoLuongSP = 0;
         var SoLuongMax = 1;
        
         function fetch(){
            $('#img-zoom').elevateZoom({
               zoomType: "inner",
               cursor: "pointer",
               zoomWindowFadeIn: 300,
               zoomWindowFadeOut: 200,
               lensFadeIn: 300,
               lensFadeOut: 200,
               gallery : 'box-anhmota',
               // scrollZoom: true
           })

           if( $('.box-anhmota').children().length > 4){
              $('.box-anhmota').slick({
                  slidesToShow: 4,
                  slidesToScroll: 4,
                  prevArrow : '',
                  nextArrow : ''
              })
           }


            $('.box-anhmota .item img').click(function(){
               $('.box-anhmota .item img').css('border' , 'none')
               $(this).css('border' , '2px solid rgb(151, 151, 151)')
            })

            $('.item-size').click(function(){
                SoLuongSP = 1;
                console.log(SoLuongSP);
                $('#SLSP').val(1);
                $('.themvaogio-erro').css('display' , 'none');
                $('.item-size').css('border' , 'none');
                $(this).css('border' , '1px solid black');
                idSize = $(this).data('id');
                var TenSize = $(this).data('size');
                console.log(idSize)
                $.ajax({
                   url : 'chitietsanpham/show_soluong_size',
                   type : 'post',
                   data : {
                      idSize : idSize
                   }
                }).done(function(res){
                    SoLuongMax = parseInt(res);
                    $('.SoLuongSize').html('Hiện tại có sẵn ' + res + ' sản phẩm.');
                    $('#TenSize').html(TenSize)
                })
            })
         }
         fetch();

         ///

         $('.item-color').click(function(){
             idSize = 0;
             $('.SoLuongSize').html('');
             $('#SLSP').val(1);
             idCTSP = $(this).data('id');
             console.log(idCTSP);
            $('#TenMau').html($(this).data('tenmau'));
            $('#TenSize').html('')
            $('.item-color').css('border' , '1px solid rgb(235, 234, 234)');
            $(this).css('border' , '1px solid black');
            $.ajax({
               url : 'chitietsanpham/show_item_color',
               type : 'post',
               data : {
                  idCTSP : idCTSP
               }
            }).done(function(res){
               $('.main .box-left').html(res);
               show_list_size(idCTSP);
               fetch();
           })
         })


         function show_list_size(idCTSP){
             $.ajax({
                url : 'chitietsanpham/show_list_size',
                type : 'post',
                data: {
                   idCTSP : idCTSP
                }
             }).done(function(res){
                 $('.list-size').html(res);
                 fetch();
             })
         }


         /// xử lí form tăng giảm số lượng
         $('#TangSL').click(function(){
              if(idSize == 0) {
                   $('.themvaogio-erro').css('display' , 'block');
                   return;
              };
              if($('#SLSP').val() < SoLuongMax){
                  SoLuongSP = parseInt($('#SLSP').val()) + 1;
                  $('#SLSP').val(SoLuongSP);
                  console.log(SoLuongSP)
              }
         })

         $('#GiamSL').click(function(){
            if(idSize == 0) {
               $('.themvaogio-erro').css('display' , 'block');
               return;
            };
            if($('#SLSP').val() > 1){
                SoLuongSP = parseInt($('#SLSP').val()) - 1;      
                $('#SLSP').val(SoLuongSP);
                console.log(SoLuongSP)
            }
         })

         $('#SLSP').change(function(){
              if($(this).val() > SoLuongMax){
                  $(this).val(SoLuongMax)
              }
         })

         // show mô tả
         $('.mota > .tieude').click(function(){
            if($(this).children().first().attr('style') == undefined  ){
                 $(this).children().first().attr( 'style',' transform :rotate(-180deg);')
                 $(this).css('borderTop' , 'none')
            }          
             else{
               $(this).children().first().removeAttr('style');
               $(this).css('borderTop' , '1px solid rgb(214, 214, 214)')
             }
             $(this).next().slideToggle('fast');
         })

         // xử lý đánh giá
         $('.btn-show-action').click(function(){   
             var action = $(this).attr('action');
             if(action == 'danhgia'){
                  $('.sao-action').show();
                  $('.binhluan-action').hide();
             }else{
                 $('.sao-action').hide();
                 $('.binhluan-action').show();
             }
             $('.btn-show-action').attr('class' , 'btn-show-action show-action-top');
             $(this).attr('class' , 'btn-show-action button-active');
         })

         //
         // $('.sao-item').hover(function(){
         //     $('.sao-item').attr('src' , '/wiew/public/upload/chuadanhgia.ico')
         //     var index = $(this).data('index');
         //     var TrangThaiVote = $(this).data('dangthai');
         //     $('.trang-thai-vote').html(TrangThaiVote);
         //     for(var i=0 ;i<index; i++){
         //         $('.sao-item')[i].src = "/wiew/public/upload/danhgia100.ico"
         //     }
         // })
         
         var index_sao = 0;
         var idSanPham = 0;
         $('.sao-item').click(function(){
             $('.sao-item').attr('src' , '/wiew/public/upload/chuadanhgia.ico')
             index_sao = $(this).attr('data-index');
             idSanPham = $(this).attr('data-idSanPham');
             var TrangThaiVote = $(this).attr('data-dangthai');
             $('.trang-thai-vote').html(TrangThaiVote);
             for(var i=0 ;i<index_sao; i++){
                $('.sao-item')[i].src = "/wiew/public/upload/danhgia100.ico"
             }          
         })

         $('#gui-danh-gia').click(function(){
            console.log(index_sao);
            console.log(idSanPham);
            $.ajax({
               url : 'user/check_login',
               type : 'post',
            }).done(function(res){
                 if(res == 'true'){
                     $.ajax({
                        url : 'chitietsanpham/vote_sao',
                        type : 'post',
                        data : {
                           SoLuongSao : index_sao,
                           idSanPham : idSanPham
                        }
                     }).done(function(res){
                          $('section#load').css('display' , 'inline-block');
                          setTimeout(() => window.location.href = location.href , 1000)
                     })
                 }else{
                    $('.form-login').css('display' , 'flex');
                 }
            })            
         })



         $('#ThemVaoGio').click(function(){
             if(idSize == 0){
                $('.themvaogio-erro').css('display' , 'block');
             }else{
               var SoLuongSP = $('#SLSP').val();
               muahang(idSize , SoLuongSP);
               idSize = 0;
               $('.themvaogio-erro').css('display' , 'none');
               $('#SLSP').val(1);
               $('.item-size').css('border' , 'none');
             }
         })

      
    })