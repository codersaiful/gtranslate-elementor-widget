;(function ($, w) {
    
    'use strict';
var $window = $(w);

$window.on( 'elementor/frontend/init', function() {

    var EF = elementorFrontend,
        EM = elementorModules;
    
    var ModuleBase = elementorModules.frontend.handlers.Base;

    var Hero_Slider = EM.frontend.handlers.Base.extend({
        onInit: function(){
            this.run();
        },
        onChange: function(){
            this.run();
        },
        run: function(){

            var $scope = this.$element;
           
             var $id        = $scope[0].dataset.id;
             console.log($id );
            /**
             * get data on editor mode
             */
            var $settings = this.getElementSettings();
            console.log($settings);
            var slider = new Swiper('.gallery-slider', {
               //spaceBetween: $settings.spaceBetween,
                effect: $settings.effect,
                speed: $settings.speed,
                loop: $settings.loop=='yes' ? true : false,
                autoHeight: $settings.autoHeight=='yes' ? true : false,
                rewind:true,
                autoplay: {
                    delay: $settings.delay,
                },
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
              var thumbs = new Swiper ('.gallery-thumbs', {
                slidesPerView: $settings.slidesPerView,
                spaceBetween: 10,
                centeredSlides: $settings.centeredSlides=='yes' ? true : false,
                loop: true,
                slideToClickedSlide: true,
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
     * @author B M Rafiul Alam <bmrafiul.alam@gmail.com>
     * @since 1.1.0.8
     */

    // Moving_Letters Hooked Here
    EF.hooks.addAction(
        'frontend/element_ready/slider.default',
        function ($scope) {
                EF.elementsHandler.addHandler(Hero_Slider, {
                        $element: $scope,
                });
        }
    );
});

} (jQuery, window));