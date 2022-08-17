    
    import load_event  from './muahang.js';

      $(document).ready(function(){
          

           var value_max  = $('#range-left').attr('max');
           var value_min  = $('#range-left').attr('min');
           var value_left  = 0;
           var value_right  = 1000000;
           var list_color = [];
           var size = '';
           var page = 1;
           var tieuchi = 'macdinh';
           var idSP = 0;
           var SoLuongSize = 0;

            
           // Xử lý nút thumb-left
           $('#range-left').on('input' , function(){
                if(value_right - $(this).val() <= 50000 ) return;
                value_left = $(this).val();
                $('#Gia-BatDau').html(new Intl.NumberFormat().format(value_left) + 'đ')
                console.log('value left : ' + value_left)
                var value_thumb_left = (value_left / value_max) * 100;
              
                $('#thumb-left').css({
                    "left" : value_thumb_left + '%',
                    "border" : "5px solid rgba(224, 224, 224, 0.57)",
                    "width" : "20px",
                    "height" : "20px"
                })
                $('.value-input').css('left' , value_thumb_left + '%');
           }).mouseleave(function(){
                $('#thumb-left').css({
                    "border" : "none",
                    "width" : "16px",
                    "height" : "16px"
                });
                $('#range-left').val(value_left)
           })
 

           // Xử lý nút thumb-right
           $('#range-right').on('input' , function(){
                if($(this).val() - value_left <= 50000 ) return;
                value_right = $(this).val();       
                $('#Gia-KetThuc').html(new Intl.NumberFormat().format(value_right) + 'đ')  
                console.log( 'value right :' +value_right)  
                var value_thumb_right = (value_right / value_max) * 100;
               
                $('#thumb-right').css({
                    "left" : value_thumb_right + '%',
                    "border" : "5px solid rgba(224, 224, 224, 0.57)",
                    "width" : "20px",
                    "height" : "20px"
                })
                $('.value-input').css('right' , (100 - value_thumb_right) + '%');
           }).mouseleave(function(){
               $('#thumb-right').css({
                   "border" : "none",
                   "width" : "16px",
                   "height" : "16px"
               });
               $('#range-right').val(value_right)
           })


           //

           $('.show-sub-danhmuc').click(function(){
                $(this).parent().next().slideToggle();
                if($(this).attr('style') == undefined ){
                    $(this).attr('style' , 'transform:rotate(-180deg)');
                }else{
                    $(this).removeAttr('style');
                }
           })

       
       
           // function khai báo sự kiện cho Element sau khi load bằng ajax
           function fetch(){
               
                $('.btn-phantrang').click(function(){
                    $('section#load').css('display' , 'inline-block');
                    page = $(this).data('page');
                    $.ajax({
                        url : 'sanpham/show_sanpham_ajax',
                        type : 'post',
                        data : {
                            page : page,
                            tieuchi : tieuchi,
                            GiaMin : value_left,
                            GiaMax : value_right,
                            list_color : list_color,
                            size : size
                        }
                    }).done(function(res){
                        $('.main .right .content').html(res);
                        create_btn_phantrang(page)
                        show_soluongsp_hienthi(page)
                        setTimeout( () => $('section#load').css('display' , 'none') , 100)
                        $("html, body").delay(100).animate({ scrollTop: 0 } , 'fast');
                    })
                })     
                   

           }

           fetch()
           
           function show_soluongsp_hienthi(page){
                $.ajax({
                    url : 'sanpham/show_soluongsp_hienthi',
                    type :'post',
                    data : {
                        page : page
                    }
                }).done(function(res){
                    $('#show_soluongsp_hienthi').html(res);
                })
           }
           show_soluongsp_hienthi(1)

           // tạo btn phân trang danh mục
           function create_btn_phantrang(page){
                $.ajax({
                    url : 'sanpham/create_btn_ajax',
                    type : 'post',
                    data : {
                        page : page
                    }
                }).done(function(res){
                    $('.main .right .box-btn').html(res)
                    fetch()     
                    load_event()
                })
       
           }    
           create_btn_phantrang(1)

          
          // lọc sản phẩm theo giá
          $('#btn-loc-gia').click(function(){    
                $('#tieuchi').val('macdinh')
                page = 1;         
                $.ajax({
                    url :'sanpham/show_sanpham_ajax',
                    type : 'post',
                    data : {
                    page : page,
                    tieuchi : tieuchi,
                    GiaMin : value_left,
                    GiaMax : value_right,
                    list_color : list_color,
                    size : size
                }
                }).done(function(res){
                    $('.main .right .content').html(res)
                    fetch();
                    load_event()
                    create_btn_phantrang(page)
                    show_soluongsp_hienthi(page)
                })
          })
          
         
          // show sản phẩm theo màu sắc
          $('.show-sanpham-color').click(function(){  
              $('#tieuchi').val('macdinh')
              page = 1;
              var color = $(this).data('color');
              var boolean = false;
              for(var i=0; i<list_color.length ; i++){
                  if(list_color[i] ==  color){
                      boolean = true;
                      list_color.splice(i, 1)
                  }
              }
              if(boolean == false){
                list_color.push(color)
              }
              console.log(list_color)

              $.ajax({
                  url :'sanpham/show_sanpham_ajax',
                  type : 'post',
                  data : {
                    page : page,
                    tieuchi : tieuchi,
                    GiaMin : value_left,
                    GiaMax : value_right,
                    list_color : list_color,
                    size : size
                }
              }).done(function(res){
                  $('.main .right .content').html(res)
                  fetch();
                  load_event()
                  create_btn_phantrang(page)
                  show_soluongsp_hienthi(page)
              })
              
          })

          

          //show sản phẩm theo size
          $('.show-sanpham-size').click(function(){
               page = 1;
               size = $(this).data('size');

               $.ajax({
                    url :'sanpham/show_sanpham_ajax',
                    type : 'post',
                    data : {
                    page : page,
                    tieuchi : tieuchi,
                    GiaMin : value_left,
                    GiaMax : value_right,
                    list_color : list_color,
                    size : size
                    }
                }).done(function(res){
                    $('.main .right .content').html(res)
                    fetch();
                    load_event()
                    create_btn_phantrang(page)
                    show_soluongsp_hienthi(page)
                })
          })




          
           // lọc theo tiêu chí
           $('#tieuchi').change(function(){
            $(".input-checkbox").prop("checked", false);
            page = 1;
            list_color = [];
            tieuchi = $('#tieuchi option:selected').val();
            console.log(tieuchi)
            $('section#load').css('display' , 'inline-block');
            setTimeout ( () => {
                 $.ajax({
                     url : 'sanpham/show_sanpham_ajax',
                     type : 'post',
                     data : {
                        tieuchi : tieuchi,
                        page : page,
                        GiaMin : value_left,
                        GiaMax : value_right,
                        list_color : list_color,
                        size : size
                    }
                 }).done(function(res){
                     $('.main .right .content').html(res)
                     $('section#load').css('display' , 'none')
                     fetch();
                     load_event()
                     create_btn_phantrang(page)
                 })
            } , 300)
           
        })
          
               
    })