
     
       $(document).ready(function(){

            $(window).scroll(function(){

                if($(window).scrollTop() >= 180){
                    $('.header').addClass('fadeInDown');
                    $('.header').addClass('header-scroll');
                    $('.box-logo').removeClass('pulse');
                    $('.header-top').css('display' , 'none');
                    $('.header-bot .box-logo').css('display' , 'flex');
                    $('.header-bot .header-menu-left').css('display' , 'flex');
                    $('.header-bot-wrapper').css('justifyContent' , 'space-between');
                }
    
                if($(window).scrollTop() == 0){
                    $('.header').removeClass('fadeInDown');
                    $('.header').removeClass('header-scroll');
                    $('.box-logo').addClass('pulse');
                    $('.header-top').fadeIn();
                    $('.header-bot .box-logo').css('display' , 'none');
                    $('.header-bot .header-menu-left').css('display' , 'none');
                    $('.header-bot-wrapper').css('justifyContent' , 'center');
                    $('#scroll-top').attr('class', 'fadeOutDown');
                    $('#scroll-top').css('display', 'none');
                }

                if($(window).scrollTop() >= 1500){
                    $('#scroll-top').attr('class', 'fadeInUp');
                    $('#scroll-top').css('display', 'flex');
                }
            })


            $('#scroll-top').click(function(){
                $("html, body").delay().animate({ scrollTop: 0 } , 'fast');
            })



            $('.header-bot nav ul > li').mouseenter(function(){
                var className = $(this).attr('class');
                $('.header-bot nav ul > li[class!="'+ className +'"]').children().css('color', 'white')
                $(this).children().css('color', '#f7b5b6')
                if($(this).attr('class') == 'menu-sanpham'){
                    $(this).children().last().attr('class' , 'fas fa-angle-up')
                    $('.sub-menu-sanpham').css('display', 'flex');
                    $('.sub-menu-baiviet').css('display', 'none');
                    $('.sub-menu-sanpham').mouseleave(function(){
                        $('.sub-menu-sanpham').fadeOut('fast');
                        $('.header-bot nav ul > li i').attr('class', 'fas fa-angle-down')
                        $('.header-bot nav ul > li').children().css('color', 'white')
                    })
                }
                else if($(this).attr('class') == 'menu-baiviet'){
                    $(this).children().last().attr('class' , 'fas fa-angle-up')
                    $('.sub-menu-baiviet').css('display', 'flex');
                    $('.sub-menu-sanpham').css('display', 'none');
                    $('.sub-menu-baiviet').mouseleave(function(){
                        $('.sub-menu-baiviet').fadeOut('fast');
                        $('.header-bot nav ul > li i').attr('class', 'fas fa-angle-down')
                        $('.header-bot nav ul > li').children().css('color', 'white')
                    })
                } else{
                    $('.sub-menu-sanpham').css('display', 'none');
                    $('.sub-menu-baiviet').css('display', 'none');
                }
            }).mouseleave(function(){
                    var className = $(this).attr('class');
                    if(className != 'menu-sanpham' && className != 'menu-baiviet'){
                        $(this).children().css('color', 'white')
                    }else{
                        $('.header-bot nav ul > li[class="'+ className +'"]').children().last().attr('class', 'fas fa-angle-down')
                    }
            })

             //search ajax

             $('.cart').click(function(){
                $('.show-cart').toggle();
            })
        
            $('.show-box-search').click(function(){
                $('#search').val('');
                $('.box-change-search').css('display','none');
                $('.box-search').slideToggle('fast');
                $('.box-search').animate({top : '100%'} ,'fast')
            })
            
            $('.close-search').click(function(){
                $('.box-search').fadeOut('fast');
                $('.box-search').animate({top : '10%'})
                $('.box-change-search').css('display','none');
                $('#search').val('');
            })



            $('#search').on('input' , function(){
                $('.box-change-search').fadeIn('slow');
                var search = $(this).val();
                
                $.ajax({
                    url : 'search/search_ajax',
                    type : 'post',
                    data :{ 
                        search : search
                    }
                }).done(function(res){
                    console.log(res)
                    if(res != ''){
                        $('.search-null').css('display' , 'none');
                        $('.search-result').css('display' ,'block');
                        $('.search-result').html(res);
                    }else{
                        $('.search-null').css('display' , 'block')
                        $('.search-result').css('display' ,'none');
                    }
                })
            })


            
            $('.user').click(function(){
                var login = $(this).data('login');
                if(login == false){
                    $('.form-login').css('display' , 'flex');
                }else{
                    if($(this).attr('show-user-connect') == 'false'){
                        $('.user-connect').fadeIn('fast');
                        $('.user').attr('show-user-connect' , 'true');
                    }else{
                        $('.user-connect').fadeOut('fast');
                        $('.user').attr('show-user-connect' , 'false');
                    }
                }
            })

        

            
            $('.form-login-item').click(function(){
                var id = $(this).attr('id');
                console.log(id)
                switch(id){
                    case 'login-with-email' :
                        $('.form-login-action > .back').css('display' , 'block');
                        $('.wrapper-input input').css('display' , 'block');
                        $('.form-login-item').css('display' , 'none');
                        $('.form-login-action > .back').click(function(){
                            $('.form-login-action > .back').css('display' , 'none');
                            $('.wrapper-input input').css('display' , 'none');
                            $('.form-login-item').css('display' , 'flex');
                        })

                        $('#submit-login').click(function(){
                             email = $('#email-login').val();
                             matkhau =  $('#password-login').val();
                             $.ajax({
                                 url : 'user/dangnhap',
                                 type : 'post',
                                 data :{
                                     email : email,
                                     matkhau : matkhau
                                 }
                             }).done(function(res){
                                 if(res == 'Email hoặc mật khẩu không đúng!'){
                                     $('.erro-login').html(res)
                                 }else{
                                    $('section#load').css('display' , 'inline-block');
                                    setTimeout(()=> {
                                        window.location.href = location.href;
                                        $('section#load').css('display' , 'none');
                                    } , 500);
                                 } 
                             })
                        })
                        break;

                    case 'login-with-google' :
                        window.location.href = '/loginfb.php?login_with=google';
                        // New_window =  window.open (res, "poop", "height = 700, width = 525, modal = yes, alwaysRaised = yes");
                        // New_window.moveTo(500,130);
                        break; 

                    case 'login-with-facebook' :
                        window.location.href = '/loginfb.php';   
                        break; 
                    
                }
            })

            

                
            $('.dangxuat').click(function(){
                $('section#load').css('display' , 'inline-block');
                $.ajax({
                    url : 'user/DangXuat_ajax'
                }).done(function(res){
                    setTimeout( ()=>  window.location.href = '/' , 300)
                })
            
            })

            $('body ,html').click(function(e){
                if(e.target.id == 'form-login'){
                    $('#form-login').fadeOut('fast');
                }
              
            })
            

         

   
       })