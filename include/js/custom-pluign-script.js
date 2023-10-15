/* Custom Plugin Script Codes */
(function ($) {
    var product_maindiv  = document.querySelectorAll( '.woo_pro_img' );
    var product_img_2  = document.querySelectorAll( '.product_img_2' );    
    product_img_2.forEach( pro_img => { pro_img.style.display = 'none' });
    product_maindiv.forEach( div => {
        div.onmouseover = function(){
            setTimeout(function(){
                var img1 = div.querySelector('.product-img');
                var img2 = div.querySelector('.product_img_2');
                img1.style.display = 'none';
                img2.style.display = 'block';
            }, 0);
        }
        div.onmouseleave = function(){
            setTimeout(function(){
                var img1 = div.querySelector('.product-img');
                var img2 = div.querySelector('.product_img_2');
                img1.style.display = 'block';
                img2.style.display = 'none';
            }, 0);
        }
    } );
})(jQuery);