$(document).ready(function(){
    $('#heroBanner').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        arrows:false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
       

    });

    $('#testimonial').slick({
        prevArrow: '<button type="button" class="btn slick-prev border-0 fs-3"><i class="fi-xnllxl-arrow-simple"></i></button>',
        nextArrow: '<button type="button" class="btn slick-prev border-0 fs-3 position-absolute top-0 start-50"><i class="fi-xnlrxl-arrow-simple"></i></button>',
        
       

    });


    //   ISOTOPE

// let $work = $('#works').isotope({
//   // // options
//   itemSelector: '.work',
//   layoutMode: 'fitRows'
// });

// $('#worksFilter').on('click','button',function(){
//   let value = $(this).attr('data-filter');
//   console.log(value)
//   $work.isotope({ filter: value });
// })

    
  });


// SINGLE PRODUCT
const displayImg = document.getElementById('displayImg')

const changeDisplayImg =(e)=>{
    console.log('clicked')
    displayImg.src = e.src
}

