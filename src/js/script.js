//Slick slider//
$(document).ready(function(){
    // $('.carousel__inner').slick({
    //     infinite: true,
    //     speed: 1200,
    //     adaptiveHeight: true,
    //     autoplay: true,
    //     autoplayspeed: 2000,
    //     fade: true,
    //     cssFade: 'linear',
    //     arrows: false,
    //     dots: true        
    // });

    
    $('ul.info_docs__tabs').on('click', 'li:not(.info_docs__tab_active)', function() {
        $(this)
          .addClass('info_docs__tab_active').siblings().removeClass('info_docs__tab_active')
          .closest('div.info_docs').find('div.info_docs__content').removeClass('info_docs__content_active').eq($(this).index()).addClass('info_docs__content_active');
    });

    function toggleSlide(item) {
        $(item).each(function(i) {
            $(this).on('click', function(e) {
                e.preventDefault();
                $('.info_docs-item__content').eq(i).toggleClass('info_docs-item__content_active');
                $('.info_docs-item__list').eq(i).toggleClass('info_docs-item__list_active');
            })
        });
    };
    toggleSlide('.info_docs-item__link');
    toggleSlide('.info_docs-item__back');

    //MagnificPopup//

    $('.info_docs-item__img').magnificPopup({type:'image'});
    

    //Modal//

    $('[data-modal=contract]').on('click', function() {
        $('.overlay, #contract').fadeIn('slow');
    });
    $('.modal__close').on('click', function() {
        $('.overlay, #contract, #thanks').fadeOut('slow');
    });

    //Validate//

    function valideForms(form){
        $(form).validate({
            rules: {
                name: "required",
                phone: {
                    required: true,
                    minlength: 11
                },
                email: {
                    required: true,
                    email: true
                },
                passport: {
                    required: true,
                    minlength: 10
                },
                passportcode: {
                    required: true,
                    minlength: 7
                }
            },
            messages: {
                name: "Пожалуйста введите свое имя",
                passport: {
                    required: "Пожалуйста введите цифры без пробела",
                    minlength: jQuery.validator.format("Введите {0} символов без пробелов!")
                },
                passportcode: {
                    required: "Пожалуйста введите код со знаком тире",
                    minlength: jQuery.validator.format("Введите {0} цифр с учётом тире")
                },
                phone: {
                      required: "Пожалуйста введите номер телефона",
                      minlength: jQuery.validator.format("Введите {0} символов!")
                    },
                email: {
                    required: "Пожалуйста введите свю почту",
                    email: "Неправильно введён адрес почты"
                }
            }
        });
    };
    valideForms('#contract form');
    valideForms('#consultation-form');
    
            //Input Mask//

    $('input[name=passport]').mask("9999 999999");
    $('input[name=issuedate]').mask("99.99.9999");
    $('input[name=passportcode]').mask("999-999");
    $('input[name=phone]').mask("+7 (999) 999-99-99");
    $('input[name=birthdate]').mask("99.99.9999");
    $('input[name=birthdoc').mask("999-99 999999");
    $('input[name=weight]').mask("99");
    $('input[name=hieght]').mask("999");
    
            //Send form to server//
            
    $('form').submit(function(e) {
        e.preventDefault();

        if (!$(this).valid()) {
            return;
        }
        $.ajax({
            type: "POST",
            url: "mailer/smart.php",
            data: $(this).serialize()
        }).done(function() {
            $(this).find("input").val("");
            $('#consultation-form, #contract').fadeOut();
            $('.overlay, #thanks').fadeIn('slow');

            $('form').trigger('reset');
        });
        return false;
    });

    //SMOOTH SCROLL AND PAGEUP//

    $(window).scroll(function() {
        if ($(this).scrollTop() >1600) {
            $('.pageup').fadeIn();
        } else {
            $('.pageup').fadeOut();
        }
    });
    $("a[href^='#up']").click(function(){
        const _href = $(this).attr("href");
        $("html, body").animate({scrollTop: $(_href).offset().top+"px"});
        return false;
    });

    //WOW//

    new WOW().init();
});


//Hamburger from Uber//

// window.addEventListener('DOMContentLoaded', () => {
//     const menu = document.querySelector('.menu__list'),
//     menuItem = document.querySelectorAll('.menu__list-item'),
//     hamburger = document.querySelector('.hamburger');

//     hamburger.addEventListener('click', () => {
//         hamburger.classList.toggle('hamburger_active');
//         menu.classList.toggle('menu__list_active');
//     });

//     menuItem.forEach(item => {
//         item.addEventListener('click', () => {
//             hamburger.classList.toggle('hamburger_active');
//             menu.classList.toggle('menu_active');
//         })
//     })
// })

//Hamburger from Portfolio//

const hamburger = document.querySelector('.hamburger'),
      menu = document.querySelector('.menu-mobile'),
      closeElem = document.querySelector('.menu-mobile__close');

hamburger.addEventListener('click', () => {
    menu.classList.add('active');
});

closeElem.addEventListener('click', () => {
    menu.classList.remove('active');
});