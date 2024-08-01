$( document ).ready(function() {
    
    //Start main slider in home page
    $(".main-home-slider").owlCarousel({
        items: 1,
        dots: true,
        // autoplay: true,
        // loop: true,   
        autoplayTimeout: 10000,     
    });
    $(".reviews-slider").owlCarousel({
        items: 1,
        dots: true,
        autoplay: true,
        loop: true,
        animateIn: 'fadeIn', // add this
        animateOut: 'fadeOut', // and this
    });

    //Start widget close and open
    $('.sidebar-widget-title').click(function() {
        $(this).find('.arrow-img').toggleClass('rotate-90');
        $(this).next('.widget-content').slideToggle()
    });  
    if ($(window).width() < 767) {
      $(this).find('.arrow-img').addClass('rotate-90');
    }  

    ////mobile menu
    // $('.nav-btn, .close-menu').click(function() {
    //     $('.nav-btn').find('.nav-icon').toggleClass('hidden');
    //     $('.nav-links-wrap').toggleClass('open')        
    // });
    $('html').click(function(e) {
      if($(e.target).is('.nav-links-wrap') )
      {
        $('.nav-links-wrap').addClass('open')                            
      } else if($(e.target).is('.nav-btn *')) {
        $('.nav-links-wrap').toggleClass('open')
        $('.nav-btn').find('.nav-icon').toggleClass('hidden');  
        console.log('one');
      } else if($(".nav-links-wrap").hasClass("open") && !$(e.target).is('.nav-link') && !$(e.target).is('.drop-icon *') ) {
        console.log('tow');
        $('.nav-links-wrap').removeClass('open')
        $('.nav-btn').find('.nav-icon').toggleClass('hidden');
      }                        
    });

    //Add to favorit button
    $('.add-favorit').click(function() {
      $(this).toggleClass('active');
    })

    //single product page

    //change image when click color
    $('.checkbox-color-circle input[name="color"]').click(function() {
      // var id =  $(this).val();
      // var images = JSON.parse($(id).val());
      // $('.main-image').attr('src', location.origin+"/storage/product/"+images[0]);   
     
      var images = $(this).data("image");
      $('.main-image').attr('src', location.origin+"/storage/product/"+images[0]); 
       
      
    })
    
    $('.expand-btn').click(function() {
      $(this).parent().siblings('.desc-wrap').slideToggle();
      $(this).find('svg').toggleClass('rotate-90')
    });

    // //change image when click color
    // $('.checkbox-color-circle input[name="color"]').click(function() {
    //   console.log($(this).data('key'))
    //   if($(this).data('key') == 0) {
    //     $('img[data-image="0"]').click()
    //   } else if($(this).data('key') == 1) {
    //     $('img[data-image="1"]').click()
    //   } else if($(this).data('key') == 2) {
    //     $('img[data-image="2"]').click()
    //   } else {
    //     $('img[data-image="3"]').click()
    //   }
    // }); 


  

    $('.img-anchor').click(function() {

      var colors = document.getElementsByClassName("checkbox-color-circle")[0].getElementsByTagName("li");
      
      var srcImage = $(this).find('img').attr('src');
      var filter1 = srcImage.substring(srcImage.indexOf('product'))
      var nameImage = filter1.substring(filter1.indexOf('/')+1)
      console.log(nameImage);
      if(colors != null) {
       
        for(var i=0;i<colors.length;i++){
          var inputColor = colors[i].getElementsByTagName('input')[0];
          if(inputColor != null) {
            var colorID = inputColor.id;
            var images = $("#"+colorID).data("image");

            var result =  $.inArray(nameImage,images);
            console.log(images);
            if(result != -1){
              
              $('#'+colorID).prop("checked", true).change()
            }
            
          
          }
         
        }
      }
     
      
      var imageUrl = $(this).find('img').attr('src');
      $('.main-image').attr('src', imageUrl);
      $('.main-image').data('zoom', imageUrl);
       
    });

    //Start accordion code
    $('.accordion-item:first-child').addClass('open');
    $('.run-accordion').click(function() {
      
      $(this).next('.accordion-content').slideToggle()
      $(this).parent('.accordion-item').siblings('.accordion-item').find('.accordion-content').slideUp();
      $(this).parent('.accordion-item').toggleClass('open').siblings().removeClass('open')
    })
    
    //show and hide search box
    $('.search-btn').click(function(e) {
      e.preventDefault();
      $('.search-box').fadeToggle();
      $(this).find('svg').toggleClass('hidden')
    })    
    $('.search-input-wrap, .modal-con').click(function(e){
      e.stopPropagation();
   });
   $('.overlay-element').click(function() {      
      $('.search-box').hide();
      $('.search-btn').find('.search-ic').removeClass('hidden')
      $('.search-btn').find('.close-ic').addClass('hidden')
    })
    
    //Start modal popup
    $('.modal-wrap-pop').click(function() {
      $(this).fadeOut()
    })
    
    $( ".custom-nav-drop" ).hover(
      function() {
        $( '.overlay-element' ).addClass('show')
      }, function() {
        $( '.overlay-element' ).removeClass('show')
      }
    );

    // Start links
    $('.stop-link').click(function(e) {
      e.preventDefault();
    })
    
    $('.toggle-filter-btn').click(function() {
      $('.wrap-filters').slideToggle();
    });
   

});


//Menu On Hover
$('body').on('mouseenter mouseleave click','.nav-item',function(e){
        // if ($(window).width() > 750) {
            var _d=$(e.target).closest('.nav-item');_d.addClass('show');
            setTimeout(function(){
            _d[_d.is(':hover')?'addClass':'removeClass']('show');
            },1);
        // }
});	



// Start custom select option js code
// var x, i, j, l, ll, selElmnt, a, b, c;
// /* Look for any elements with the class "custom-select": */
// x = document.getElementsByClassName("custom-select");
// l = x.length;
// for (i = 0; i < l; i++) {
//   selElmnt = x[i].getElementsByTagName("select")[0];
//   ll = selElmnt.length;
//   /* For each element, create a new DIV that will act as the selected item: */
//   a = document.createElement("DIV");
//   a.setAttribute("class", "select-selected");
//   a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
//   x[i].appendChild(a);
//   /* For each element, create a new DIV that will contain the option list: */
//   b = document.createElement("DIV");
//   b.setAttribute("class", "select-items select-hide");
//   for (j = 1; j < ll; j++) {
//     /* For each option in the original select element,
//     create a new DIV that will act as an option item: */
//     c = document.createElement("DIV");
//     c.innerHTML = selElmnt.options[j].innerHTML;
//     c.addEventListener("click", function(e) {
//         /* When an item is clicked, update the original select box,
//         and the selected item: */
//         var y, i, k, s, h, sl, yl;
//         s = this.parentNode.parentNode.getElementsByTagName("select")[0];
//         sl = s.length;
//         h = this.parentNode.previousSibling;
//         for (i = 0; i < sl; i++) {
//           if (s.options[i].innerHTML == this.innerHTML) {
//             s.selectedIndex = i;
//             h.innerHTML = this.innerHTML;
//             y = this.parentNode.getElementsByClassName("same-as-selected");
//             yl = y.length;
//             for (k = 0; k < yl; k++) {
//               y[k].removeAttribute("class");
//             }
//             this.setAttribute("class", "same-as-selected");
//             break;
//           }
//         }
//         h.click();
//     });
//     b.appendChild(c);
//   }
//   x[i].appendChild(b);
//   a.addEventListener("click", function(e) {
//     /* When the select box is clicked, close any other select boxes,
//     and open/close the current select box: */
//     e.stopPropagation();
//     closeAllSelect(this);
//     this.nextSibling.classList.toggle("select-hide");
//     this.classList.toggle("select-arrow-active");
//   });
// }

// function closeAllSelect(elmnt) {
//   /* A function that will close all select boxes in the document,
//   except the current select box: */
//   var x, y, i, xl, yl, arrNo = [];
//   x = document.getElementsByClassName("select-items");
//   y = document.getElementsByClassName("select-selected");
//   xl = x.length;
//   yl = y.length;
//   for (i = 0; i < yl; i++) {
//     if (elmnt == y[i]) {
//       arrNo.push(i)
//     } else {
//       y[i].classList.remove("select-arrow-active");
//     }
//   }
//   for (i = 0; i < xl; i++) {
//     if (arrNo.indexOf(i)) {
//       x[i].classList.add("select-hide");
//     }
//   }
// }

// /* If the user clicks anywhere outside the select box,
// then close all select boxes: */
// document.addEventListener("click", closeAllSelect);

// End custom select option js code

// Start range price function
const rangeInputs = document.querySelectorAll('input[type="range"]')
const numberInput = document.querySelector('input[type="number"]')


  

function handleInputChange(e) {
  let target = e.target
  if (e.target.type !== 'range') {
    target = document.getElementById('range')
  } 
  const min = target.min
  const max = target.max
  const val = target.value
  
  target.style.backgroundSize = (val - min) * 100 / (max - min) + '% 100%'
}

rangeInputs.forEach(input => {
  input.addEventListener('input', handleInputChange);
});

numberInput.addEventListener('input', handleInputChange);
// End range price function



