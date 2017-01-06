



$(document).ready(function(){
            var submitIcon = $('.searchbox-icon');
            var inputBox = $('.searchbox-input');
            var searchBox = $('.searchbox');
            var isOpen = false;
            submitIcon.click(function(){
                if(isOpen == false){
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
             submitIcon.mouseup(function(){
                    return false;
                });
            searchBox.mouseup(function(){
                    return false;
                });
            $(document).mouseup(function(){
                    if(isOpen == true){
                        $('.searchbox-icon').css('display','block');
                        submitIcon.click();
                    }
                });




 var owl = $("#owl-demo");
     
      owl.owlCarousel({
          items : 3, //10 items above 1000px browser width
          itemsDesktop : [1000,3], //5 items between 1000px and 901px
          itemsDesktopSmall : [800,2], // betweem 900px and 601px
          itemsTablet: [480,1], //2 items between 600 and 0
          itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
          autoPlay: true
      });
     
      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })




            /*for mobile navigation button start*/
    $("#nav-toggle").click(function () {

        if (!($(this).hasClass('active'))) {
            $(this).addClass('active');
            $(".mobNav").animate({ right: "0" }, "med");
            $("#menu_overlay").css("display" , "block")
            $("#menu_overlay").animate(150, 'easeInSine');

            $('#mobNav a').click(function () {
                $(this).closest('nav').prev().removeClass('active');
                $(".mobNav").animate({ right: "-105%" }, "med");
                $("#menu_overlay").css("display" , "none")
            });
        }
        else {
            $(this).removeClass('active');
            $(".mobNav").animate({ right: "-105%" }, "med");
            $("#menu_overlay").css("display", "none")
        }
    });
    $('#menu_overlay').click(function() {
        $("#nav-toggle").removeClass('active');
        $(".mobNav").animate({ right: "-105%" }, "med");
        $(this).css("display", "none");
    }); 
/*for mobile navigation button end*/


/*for place holders IE  Start*/
 function add() {
        if($(this).val() === ''){
          $(this).val($(this).attr('placeholder')).addClass('placeholder');
        }
        }
        function remove() {
        if($(this).val() === $(this).attr('placeholder')){
          $(this).val('').removeClass('placeholder');
        }
        }
        // Create a dummy element for feature detection
        if (!('placeholder' in $('<input>')[0])) {

        // Select the elements that have a placeholder attribute
        $('input[placeholder], textarea[placeholder]').blur(add).focus(remove).each(add);

        // Remove the placeholder text before the form is submitted
        $('form').submit(function(){
          $(this).find('input[placeholder], textarea[placeholder]').each(remove);
        });
        }

        /*for place holders IE  End*/



        });


            function buttonUp(){
                var inputVal = $('.searchbox-input').val();
                inputVal = $.trim(inputVal).length;
                if( inputVal !== 0){
                    $('.searchbox-icon').css('display','none');
                } else {
                    $('.searchbox-input').val('');
                    $('.searchbox-icon').css('display','block');
                }
            }





            $(window).load(function(){
    
    $(".custom-select").change(function(){
        var selectedOption = $(this).find(":selected").text();
        $(this).next(".holder").text(selectedOption);
    }).trigger('change');

    $(".custom-select2").change(function(){
        var selectedOption = $(this).find(":selected").text();
        $(this).next(".holder2").text(selectedOption);
    }).trigger('change');

    $(".custom-select3").change(function(){
        var selectedOption = $(this).find(":selected").text();
        $(this).next(".holder3").text(selectedOption);
    }).trigger('change');

    $(".custom-select4").change(function(){
        var selectedOption = $(this).find(":selected").text();
        $(this).next(".holder4").text(selectedOption);
    }).trigger('change');
})



