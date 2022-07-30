;(function ($, w) {
    
    'use strict';
var $window = $(w);

$window.on( 'elementor/frontend/init', function() {

    var EF = elementorFrontend,
        EM = elementorModules;
    
    var ModuleBase = elementorModules.frontend.handlers.Base;

    var Product_Slider = EM.frontend.handlers.Base.extend({
        onInit: function(){
            this.run();
        },
        onChange: function(){
            this.run();
        },
        run: function(){

            var $scope = this.$element;
             var $id        = $scope[0].dataset.id;
            /**
             * get data on editor mode
             */
            var $settings = this.getElementSettings();
            
            //console.log($id);
            var slider = new Swiper('.slider-'+ $id, {
                slidesPerView: 1,
                centeredSlides: $settings.centeredSlides=='yes' ? true : false,
                loop: $settings.loop=='yes' ? true : false,
                loopedSlides: 6,
                speed: $settings.speed,
                autoHeight: $settings.autoHeight=='yes' ? true : false,
                autoplay:$settings.autoplay=='yes' ? true : false,
                //lazy: $settings.lazy =='yes' ? true : false,
                pagination: {
                  el: ".swiper-pagination",
                  type:$settings.pagination_type,
                  clickable: true,
                },

                navigation: {
                    nextEl: '.slidePrev-btn',
                    prevEl: '.slideNext-btn',
                },
              });
              var thumbs = new Swiper ('.thumb-'+$id, {
                slidesPerView: $settings.slidesPerView,
                centeredSlides: $settings.centeredSlides=='yes' ? true : false,
                loop: $settings.loop=='yes' ? true : false,
                slideToClickedSlide: true,
                direction: $settings.direction,
                slideToClickedSlide: true,
                spaceBetween:$settings.spaceBetween
            });
            slider.controller.control = thumbs;
            thumbs.controller.control = slider;
        }
    });

    

    /**
     * Hero Slider Finalized Here
     * 
     * Actually most of the part of this Widget has done by B M Rafiul Alam but
     * JS part had developed by(Me) Saiful Islam
     * 
     * @author Saiful Islam <codersaiful@gmail.com>
     * @since 1.0.3
     */

    // Moving_Letters Hooked Here
    EF.hooks.addAction(
        'frontend/element_ready/slider.default',
        function ($scope) {
                EF.elementsHandler.addHandler(Product_Slider, {
                        $element: $scope,
                });
        }
    );
});



} (jQuery, window));