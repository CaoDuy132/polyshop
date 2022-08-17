   

    import load_event from './muahang.js';

     
     $(document).ready(function(){


         $('#slide').slick({
             autoplay: true,
             autoplaySpeed: 5000,
             prevArrow :
             "<button type='button' class='slick-prev'><i class='fas fa-chevron-left'></i></button>",
             nextArrow :
             "<button type='button' class='slick-next'><i class='fas fa-chevron-right'></i></button>",
         });   


     
         $('.slick-arrow').css('display', 'none');

         $('#slide').mouseenter(function(){
              $('.slick-arrow').css('opacity' , '70%');
              $('.slick-arrow').css('display', 'block');
              $('.slick-next').addClass('fadeInLeft');
              $('.slick-prev').addClass('fadeInRight');
         }).mouseleave(function(){
              $('.slick-arrow').css('opacity' , '30%');
              $('.slick-next').removeClass('fadeInLeft');
              $('.slick-prev').removeClass('fadeInRight');
              $('.slick-arrow').css('display', 'none');
         })


         $('.slide-danhmuc > .content').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow : '',
            nextArrow : ''
         })


         $('.list-danhmuc h5').click(function(){
             var className = $(this).attr('id');
             $(this).css({
                "color": '#b80a0d',
                "borderBottom": '2px solid #b80a0d'
             })
             $('.list-danhmuc h5[id!="'+ className +'"]').css({
                "color": 'black',
                "borderBottom": 'none'
             })
         })




      
         function show_sanpham(value){
            $.ajax({
                url : '/trangchu/show_sanpham_ajax',
                type : 'post',
                data : {
                  value : value
                }
            }).done(function(res){
                $('#show-sanpham-content').html(res)
                $('section#load').css('display' , 'none');
                $('#show-sanpham-content').css('opacity' , '100%');
                load_event();
            })
         }
         show_sanpham('nữ');


         $('.show-sanpham').click(function(){
            var value = $(this).attr('id');
            $('section#load').css('display' , 'inline-block');
            $('#show-sanpham-content').css('opacity' , '80%');
            setTimeout(() => show_sanpham(value) , 200)
            $("html, body").animate({ scrollTop: 1030 } , 'fast');
       })



       $('.slide-baiviet-item').mouseenter(function(){
           $(this).css({
               'boxShadow' : '0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)',
           })
       }).mouseleave(function(){
            $(this).css({
                'boxShadow' : 'none',
            })
       })


      

     
     
    })

