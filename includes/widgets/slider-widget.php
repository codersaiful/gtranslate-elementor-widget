<?php

namespace Elementor_GT_Addon;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Plugin;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Bootstrap Elementor Pack alert widget.
 *
 * Elementor widget that displays a collapsible display of content in an toggle
 * style, allowing the user to open multiple items.
 *
 * @since 1.0.0
 */
class slider extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve alert widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'slider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve alert widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Product Gallery', 'gtew' );
	}
	public function get_categories() {
		return [ 'basic' ];
	}
	/**
	 * Get widget icon.
	 *
	 * Retrieve alert widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'slider', 'carousel','image', 'slide' ];
	}

	/**
	 * Register alert widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	 
	protected function register_controls() {
        //For General Section
        $this->content_general_controls();
        $this->slider_settings_controls();
        $this->slider_general_style();
        //$this->slider_btn_style();
       // $this->slider_pagination_style();
       // $this->slider_navigation_style();
    }
	protected function slider_settings_controls(){
        $this->start_controls_section(
            'slider_settings',
            [
                'label'     => esc_html__( 'Slider Settings . ', 'gtew' ),
            ]
        );

		$this->add_control(
			'loop',
			[
				'label' => __( 'Infinite Loop', 'gtew' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'gtew' ),
				'label_off' => __( 'No', 'gtew' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'frontend_available' => true,
			]
		);	
		
		$this->add_control(
			'speed',
			[
				'label' => __( 'Animation Speed', 'gtew' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 500,
				'max' => 3000,
				'step' => 500,
				'default' => 1000,
				'frontend_available' => true,
			]
		);
        $this->add_control(
			'delay',
			[
				'label' => __( 'Delay', 'gtew' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1000,
				'max' => 7000,
				'step' => 1000,
				'default' => 5000,
				'frontend_available' => true,
			]
		);
	

        $this->add_control(
			'stopOnHover',
			[
				'label' => __( 'Pause On Hover', 'gtew' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'gtew' ),
				'label_off' => __( 'No', 'gtew' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'frontend_available' => true,
			]
		);
        $this->add_control(
			'autoHeight',
			[
				'label' => __( 'Adaptive Height', 'gtew' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'gtew' ),
				'label_off' => __( 'No', 'gtew' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'frontend_available' => true,
			]
		);
		
		$this->add_control(
			'effect',
			[
				'label' => __( 'Effects', 'gtew' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fade',
				'frontend_available' => true,
				'options' => [
					'fade'  => __( 'Fade', 'gtew' ),
					//'flip' => __( 'Flip', 'gtew' ),
				],
			]
		);
		$this->add_control(
			'thumbnail_section',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( '<h2 style="font-size:13px;color:#495157; font-weight:700">Thumbnail</h2>', 'gtew' ),
				'content_classes' => 'your-class',
				'separator'=> 'before'
			]
		);
         $this->add_control(
			'slidesPerView',
			[
				'label' => __( 'Slides View', 'gtew' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'auto',
				'frontend_available' => true,
				'options' => [
                    'auto'  => __( 'Auto', 'gtew' ),
					'1'  => __( '1', 'gtew' ),
					'2' => __( '2', 'gtew' ),
					'3' => __( '3', 'gtew' ),
					'4' => __( '4', 'gtew' ),
				],
				'separator'=> 'before'
			]
		); 
		$this->add_control(
			'centeredSlides',
			[
				'label' => __( 'Centered Slides', 'gtew' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'gtew' ),
				'label_off' => __( 'No', 'gtew' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'frontend_available' => true,
			]
		);
       /*  $this->add_control(
			'spaceBetween',
			[
				'label' => __( 'Space Between', 'gtew' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 2,
				'default' => 50,
				'frontend_available' => true,
                'condition' => [
                    'slidesPerView!' => 'default',
                ],
			]
		); */
		/* $this->add_control(
			'direction',
			[
				'label' => __( 'Direction', 'gtew' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'vertical',
				'frontend_available' => true,
				'options' => [
					'vertical'  => __( 'Vertical', 'gtew' ),
					'horizontal' => __( 'Horizontal', 'gtew' ),
				],
			]
		); */
       /*  $this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'gtew' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'gtew' ),
				'label_off' => __( 'No', 'gtew' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'frontend_available' => true,
			]
		);
        $this->add_control(
			'pagination',
			[
				'label' => __( 'Pagination', 'gtew' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'gtew' ),
				'label_off' => __( 'No', 'gtew' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'frontend_available' => true,
			]
		);
        //'bullets' | 'fraction' | 'progressbar' | 'custom'
        $this->add_control(
			'pagination_type',
			[
				'label' => __( 'Pagination Type', 'gtew' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bullets',
				'frontend_available' => true,
				'options' => [
					'bullets'  => __( 'Bullets', 'gtew' ),
					'fraction' => __( 'Fraction', 'gtew' ),
					'progressbar' => __( 'Progressbar', 'gtew' ),
				],
			]
		); */

        $this->end_controls_section();
    }
        
    /**
     * General Section for Content Controls
     * 
     * @since 1.0.0.9
     */
    protected function content_general_controls() {
        $this->start_controls_section(
            'general_content',
            [
                'label'     => esc_html__( 'General', 'gtew' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Images', 'gtew' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
			]
		);

	
		$this->add_control(
			'prev_icon',
			[
				'label' => esc_html__( 'Prev Icon', 'gtew' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-alt-circle-left',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle-left',
						'arrow-left',
						'arrow-alt-circle-left',
						'long-arrow-alt-left',
					],
					'fa-regular' => [
						'circle-left',
						'arrow-left',
						'arrow-alt-circle-left',
						'long-arrow-alt-left',
					],
				],
			]
		);
		$this->add_control(
			'next_icon',
			[
				'label' => esc_html__( 'Next Icon', 'gtew' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-alt-circle-right',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle-right',
						'arrow-right',
						'arrow-alt-circle-right',
						'long-arrow-alt-right',
					],
					'fa-regular' => [
						'circle-right',
						'arrow-right',
						'arrow-alt-circle-right',
						'long-arrow-alt-right',
					],
				],
			]
		);


	
        $this->end_controls_section();
    }
     /**
     * General Section for Content Controls
     * 
     * @since 1.0.0.9
     */
    protected function slider_general_style() {
        $this->start_controls_section(
            'general_style',
            [
                'label'     => esc_html__( 'Thumbnail Style', 'gtew' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        $this->end_controls_section();
    }
    /**
	 * Button Style.
	 */
	protected function slider_btn_style(){
		$this->start_controls_section(
            'slide_btn_style',
            [
                'label'     => esc_html__( 'Button', 'gtew' ),
				'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->start_controls_tabs(
			'slide_btn_normal_tabs'
		);
		/**
		 * Normal tab
		 */
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => __( 'Normal', 'gtew' ),
			]
		);
		$this->add_control(
			'_ua_slide_btn_bg', [
				'label' => __( 'Button Background', 'gtew' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} .ua-hero .ua-slider-container .ua-slider-buttton' => 'background: {{VALUE}};',
				]
			]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'slider_btn_border',
				'label' => esc_html__( 'Button Border', 'gtew' ),
				'selector' => '{{WRAPPER}} .ua-hero .ua-slider-buttton',
			]
		);
		$this->add_control(
			'_ua_slide_btn_color', [
				'label' => __( 'Button Text Color', 'gtew' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} .ua-slider-container .ua-slider-buttton, i.uicon.uicon-cart' => 'color: {{VALUE}};',
				]
			]
        );
	
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
					'name' => 'slide_btn_typography',
					'label' => 'Button Typography',
					'selector' => '{{WRAPPER}} .ua-slider-buttton',
			]
        );
		$this->add_responsive_control(
			'_slide_btn_radius',
			[
				'label'       => esc_html__( 'Button Radius', 'gtew' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => [ 'px', '%' ],
				'placeholder' => [
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
				],
				'selectors'   => [
					'{{WRAPPER}} .ua-hero .ua-slider-container .ua-slider-buttton' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .ua-hero .ua-slider-container .ua-slider-buttton:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'_slide_btn_padding',
			[
				'label'       => esc_html__( 'Button Padding', 'gtew' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => [ 'px', '%' ],
				'placeholder' => [
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
				],
				'selectors'   => [
					'{{WRAPPER}} .ua-slider-container .ua-slider-buttton' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_tab();
		/**
		 * Button Hover tab
		 */
		$this->start_controls_tab(
			'slide_btn_hover_tabs',
			[
				'label' => __( 'Hover', 'gtew' ),
			]
		);
		$this->add_control(
			'_ua_btn_animation',
			[
				'label' => esc_html__( 'Select Animation', 'gtew' ),
				'type' => Controls_Manager::SELECT,
				//'options' => ultraaddons_button_hover(),
				'default' => 'hvr-fade',
			]
		);
		$this->add_control(
			'_ua_slide_btn_hover_bg', [
				'label' => __( 'Button Background', 'gtew' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} .ua-hero .ua-slider-container .ua-slider-buttton:before, .ua-slider-container .ua-slider-buttton:hover' => 'background: {{VALUE}};',
				]
			]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'slider_btn_hover_border',
				'label' => esc_html__( 'Button Border', 'gtew' ),
				'selector' => '{{WRAPPER}} .ua-slider-container a.ua-slider-buttton:hover',
			]
		);
		$this->add_control(
			'_ua_slide_btn_hover_color', [
				'label' => __( 'Button Text Color', 'gtew' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} .ua-slider-container .ua-slider-buttton' => 'color: {{VALUE}};',
				]
			]
        );

	
		$this->end_controls_tabs();
		
		$this->end_controls_tab();
		
		$this->end_controls_section();
	}
	protected function slider_pagination_style() {
		$id = $this->get_id();
        $this->start_controls_section(
            'pagination_style',
            [
                'label'     => esc_html__( 'Pagination', 'gtew' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_responsive_control(
			'slider_bullet_radius',
			[
				'label'       => esc_html__( 'Bullets Radius', 'gtew' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => [ 'px', '%' ],
				'placeholder' => [
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
				],
				'selectors'   => [
					'{{WRAPPER}} .ua-hero .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'pagination_type' => 'bullets'
				],
			]
		);
		$this->add_control(
			'slider_bullet_height',
			[
				'label' => esc_html__( 'Bullets Height', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'size' => '12',
				],
				'selectors' => [
					'{{WRAPPER}} .ua-hero .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'pagination_type' => 'bullets'
				],
			]
		);
		$this->add_control(
			'slider_bullet_width',
			[
				'label' => esc_html__( 'Bullets Width', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'size' => '12',
				],
				'selectors' => [
					'{{WRAPPER}} .ua-hero .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'pagination_type' => 'bullets'
				],
			]
		);

		$this->add_control(
			'slider_bullet_color', [
				'label' => __( 'Bullet Color', 'gtew' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} .ua-hero .swiper-pagination-bullet' => 'background: {{VALUE}};',
				],
				'condition' => [
					'pagination_type' => 'bullets'
				],
			]
        );
	
		$this->add_control(
			'slider_progress_fill_color', [
				'label' => __( 'Progress Fill Color', 'gtew' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} .ua-hero .swiper-pagination-progressbar .swiper-pagination-progressbar-fill' => 'background: {{VALUE}};',
				],
				'condition' => [
					'pagination_type' => 'progressbar'
				],
			
			]
        );
		$this->add_control(
			'slider_progress_color', [
				'label' => __( 'Progress Color', 'gtew' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} .ua-hero .swiper-pagination-progressbar' => 'background: {{VALUE}};',
				],
				'condition' => [
					'pagination_type' => 'progressbar'
				],
			]
        );
		$this->add_control(
			'slider_fraction_color', [
				'label' => __( 'Fraction Color', 'gtew' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} .ua-hero .swiper-pagination-fraction' => 'color: {{VALUE}};',
				],
				'condition' => [
					'pagination_type' => 'fraction'
				],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'name' => 'fraction_typo',
                'label' => 'Fraction Typography',
                'selector' => '{{WRAPPER}} .ua-hero .swiper-pagination-fraction',
				'condition' => [
					'pagination_type' => 'fraction'
				],
			]
			
        );
		

        $this->end_controls_section();
    }
	protected function slider_navigation_style() {
		$id = $this->get_id();
        $this->start_controls_section(
            'navigation_style',
            [
                'label'     => esc_html__( 'Navigation', 'gtew' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'slider_navigation_color', [
				'label' => __( 'Navigation Color', 'gtew' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} .swiper-button-next:after, .swiper-button-prev:after' => 'color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
						'step' => 10,
					],
				],
				'default' => [
					'size' => '44',
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next:after, .swiper-button-prev:after' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		

        $this->end_controls_section();
    }
	/**
	 * Render alert widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings_for_display();
		$id= $this->get_id();
        ?>
		
   	 <div class="gallery">                
    <div class="swiper-container gallery-slider">
        <div class="swiper-wrapper">
			<?php
			foreach ( $settings['gallery'] as $image ) {
			?>
            <div class="swiper-slide"><?php echo '<img src="' . esc_attr( $image['url'] ) . '">'; ?></div>
			
			<?php } ?>
           
        </div>
		<div class="slide-arrow slide-arrow__prev slidePrev-btn">
			<?php \Elementor\Icons_Manager::render_icon( $settings['prev_icon'], [ 'aria-hidden' => 'true' ] ); ?></i>
		</div>
		<div class="slide-arrow slide-arrow__next slideNext-btn">
		<?php \Elementor\Icons_Manager::render_icon( $settings['next_icon'], [ 'aria-hidden' => 'true' ] ); ?></i>
		</div>
    </div>

    <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
		<?php
			foreach ( $settings['gallery'] as $image ) {
			?>
            <div class="swiper-slide"><?php echo '<img src="' . esc_attr( $image['url'] ) . '">'; ?></div>
			
			<?php } ?>
        </div>
    </div>
</div>
        <?php
        
    }

}