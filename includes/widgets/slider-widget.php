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
use Elementor\Group_Control_Css_Filter;
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
        $this->slider_thumb_style();
       // $this->slider_pagination_style();
       $this->main_image_style();
	   $this->icon_style();
    }
	protected function slider_settings_controls(){
        $this->start_controls_section(
            'slider_settings',
            [
                'label'     => esc_html__( 'Slider Settings', 'gtew' ),
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
		
	/* 	$this->add_control(
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
		); */
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
		
	
       $this->add_control(
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
		);

      /* $this->add_control(
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
       /* $this->add_control(
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
				'label' => esc_html__( 'Previous Icon', 'gtew' ),
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
				'skin'=>'inline',
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
				'skin'=>'inline',
			]
		);


	
        $this->end_controls_section();
    }
     /**
     * General Section for Content Controls
     * 
     * @since 1.0.0.9
     */
 function slider_thumb_style() {
        $this->start_controls_section(
            'thumb_style',
            [
                'label'     => esc_html__( 'Thumbnail Style', 'gtew' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->start_controls_tabs(
			'thumb_style_tabs'
		);
		/*** Normal Tab ***/
		$this->start_controls_tab(
			'thumb_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'gtew' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'thumb_normal_border',
				'label' => esc_html__( 'Border', 'gtew' ),
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide img',
			]
		);
		$this->add_responsive_control(
			'_thumb_normal_radius',
			[
				'label'       => esc_html__( 'Border Radius', 'gtew' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => [ 'px', '%' ],
				'placeholder' => [
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
				],
				'selectors'   => [
					'{{WRAPPER}} .gallery-thumbs .swiper-slide img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'thumb_normal_scale',
			[
				'label' => esc_html__( 'Scale', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
		
				'range' => [
					'px' => [
						'min' => .1,
						'max' => 10,
						'step' => .1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .gallery-thumbs .swiper-slide' => 'transform:scale({{SIZE}});',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_normal_shadow',
				'label' => esc_html__( 'Box Shadow', 'gtew' ),
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide',
			]
		);
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumb_normal_css_filter',
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide img',
			]
		);

		/** Thumbnail Overlay Section **/
		$this->add_control(
			'thumbnail_overlay',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( '<h2 style="font-size:13px;color:#495157; font-weight:700">Thumbnail Overlay</h2>', 'gtew' ),
				'content_classes' => 'your-class',
				'separator'=> 'before'
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'thumb_normal_background',
				'label' => esc_html__( 'Background', 'gtew' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude'=> ['image'],
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide::after',
			]
		);


		$this->end_controls_tab();

		/*** Hover Tab ***/
		$this->start_controls_tab(
			'thumb_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'gtew' ),
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'thumb_hover_border',
				'label' => esc_html__( 'Border', 'gtew' ),
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide:hover',
			]
		);
		$this->add_responsive_control(
			'_thumb_hover_radius',
			[
				'label'       => esc_html__( 'Border Radius', 'gtew' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => [ 'px', '%' ],
				'placeholder' => [
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
				],
				'selectors'   => [
					'{{WRAPPER}} .gallery-thumbs .swiper-slide img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'thumb_hover_scale',
			[
				'label' => esc_html__( 'Scale', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
		
				'range' => [
					'px' => [
						'min' => .1,
						'max' => 2,
						'step' => .1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .gallery-thumbs .swiper-slide:hover' => 'transform:scale({{SIZE}});',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'gtew' ),
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumb_hover_css_filter',
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide img:hover',
			]
		);
		/** Thumbnail Overlay Section **/
		$this->add_control(
			'thumbnail_hover_overlay',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( '<h2 style="font-size:13px;color:#495157; font-weight:700">Thumbnail Hover Overlay</h2>', 'gtew' ),
				'content_classes' => 'your-class',
				'separator'=> 'before'
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'thumb_hover_background',
				'label' => esc_html__( 'Background', 'gtew' ),
				'types' => [ 'classic', 'gradient' ],
				 'exclude'=> ['image'],	
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide:hover::after',
			]
		);


		$this->end_controls_tab();

		/*** Active ***/
		$this->start_controls_tab(
			'thumb_active_tab',
			[
				'label' => esc_html__( 'Active', 'gtew' ),
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'thumb_active_border',
				'label' => esc_html__( 'Border', 'gtew' ),
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide.swiper-slide-active img',
			]
		);
		$this->add_responsive_control(
			'_thumb_active_radius',
			[
				'label'       => esc_html__( 'Border Radius', 'gtew' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => [ 'px', '%' ],
				'placeholder' => [
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
				],
				'selectors'   => [
					'{{WRAPPER}} .gallery-thumbs .swiper-slide.swiper-slide-active img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'thumb_active_scale',
			[
				'label' => esc_html__( 'Scale', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
		
				'range' => [
					'px' => [
						'min' => .1,
						'max' => 2,
						'step' => .1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .gallery-thumbs .swiper-slide' => 'transform:scale({{SIZE}});',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_active_shadow',
				'label' => esc_html__( 'Box Shadow', 'gtew' ),
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide.swiper-slide-active',
			]
		);
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumb_active_css_filter',
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide.swiper-slide-active img',
			]
		);

		/** Thumbnail Overlay Section **/
		$this->add_control(
			'thumbnail_active_overlay',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( '<h2 style="font-size:13px;color:#495157; font-weight:700">Thumbnail Active Overlay</h2>', 'gtew' ),
				'content_classes' => 'your-class',
				'separator'=> 'before'
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'thumb_active_background',
				'label' => esc_html__( 'Background', 'gtew' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude'=> ['image'],
				'selector' => '{{WRAPPER}} .gallery-thumbs .swiper-slide.swiper-slide-active::after',
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}
		/** Main Image Style **/

		protected function main_image_style() {
			$this->start_controls_section(
				'main_image_style',
				[
					'label'     => esc_html__( 'Main Image', 'gtew' ),
					'tab'       => Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_control(
				'direction',
				[
					'label' => __( 'Direction', 'gtew' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'horizontal',
					'frontend_available' => true,
					'options' => [
						'horizontal' => __( 'Horizontal', 'gtew' ),
						'vertical'  => __( 'Vertical', 'gtew' ),
					],
				]
			);
			/*$this->add_control(
				'thumb_direction_',
				[
					'label' => __( 'Thumbnail Direction', 'gtew' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'right',
					'frontend_available' => true,
					'options' => [
						'left' => __( 'Left', 'gtew' ),
						'right' => __( 'Right', 'gtew' ),
					],
					'condition'=>['direction'=>'vertical']
				]
			); */
			$this->add_control(
				'thumb_direction',
				[
					'label' => esc_html__( 'Alignment', 'plugin-name' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'plugin-name' ),
							'icon' => ' eicon-h-align-left',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'plugin-name' ),
							'icon' => ' eicon-h-align-right',
						],
					],
					'toggle' => true,
					'condition'=>['direction'=>'vertical']
				]
			);
			$this->add_responsive_control(
				'main_image_width',
				[
					'label' => esc_html__( 'Image Width', 'gtew' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 100,
					],
					'selectors' => [
						'{{WRAPPER}} .swiper-slide.main-slide img' => 'width:{{SIZE}}{{UNIT}};',
					],
				]
			);
	
			$this->add_responsive_control(
				'main_image_spacing',
				[
					'label'       => esc_html__( 'Space Between', 'gtew' ),
					'type'        => Controls_Manager::DIMENSIONS,
					'size_units'  => [ 'px', '%' ],
					'placeholder' => [
						'top'    => '',
						'right'  => '',
						'bottom' => '',
						'left'   => '',
					],
					'isLinked' => '',
					'selectors'   => [
						'{{WRAPPER}} .swiper-container.gallery-slider ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'main_image_border',
					'label' => esc_html__( 'Border', 'gtew' ),
					'selector' => '{{WRAPPER}} .swiper-container.gallery-slider',
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'main_image_shadow',
					'label' => esc_html__( 'Image Shadow', 'gtew' ),
					'selector' => '{{WRAPPER}} .swiper-container.gallery-slider',
				]
			);


			$this->end_controls_section();
		}
	/** Icon Style **/
    protected function icon_style() {
        $this->start_controls_section(
            'icon_style',
            [
                'label'     => esc_html__( 'Icon Style', 'gtew' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 26,
				],
				'selectors' => [
					'{{WRAPPER}} .slide-arrow svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .slide-arrow i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
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
			'slider_icon_bg', [
				'label' => __( 'Background', 'gtew' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} .slide-arrow' => 'background: {{VALUE}};',
				]
			]
        );
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'gtew' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-arrow svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .slide-arrow i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'slider_btn_border',
				'label' => esc_html__( 'Border', 'gtew' ),
				'selector' => '{{WRAPPER}} .slide-arrow',
			]
		);
		
		$this->add_responsive_control(
			'_slide_btn_radius',
			[
				'label'       => esc_html__( 'Radius', 'gtew' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => [ 'px', '%' ],
				'placeholder' => [
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
				],
				'selectors'   => [
					'{{WRAPPER}} .slide-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'nav_margin',
			[
				'label' => esc_html__( 'Margin', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 400,
						'step' => 1,
					],
				],
				'default' => [
					'size' => '44',
				],
				'selectors' => [
					'{{WRAPPER}} .slide-arrow__prev' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .slide-arrow__next' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'_slide_btn_padding',
			[
				'label'       => esc_html__( 'Padding', 'gtew' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => [ 'px', '%' ],
				'placeholder' => [
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
				],
				'selectors'   => [
					'{{WRAPPER}} .slide-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'nav_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'gtew' ),
				'selector' => '{{WRAPPER}} .slide-arrow',
			]
		);
		
		$this->end_controls_tab();
		
		/**
		 *  Hover tab
		 */
		$this->start_controls_tab(
			'slide_btn_hover_tabs',
			[
				'label' => __( 'Hover', 'gtew' ),
			]
		);

		$this->add_control(
			'_ua_slide_btn_hover_bg', [
				'label' => __( 'Background', 'gtew' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} .slide-arrow:hover' => 'background: {{VALUE}};',
				]
			]
        );
		$this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__( 'Icon Color', 'gtew' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-arrow svg:hover' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .slide-arrow i:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'slider_btn_hover_border',
				'label' => esc_html__( 'Button Border', 'gtew' ),
				'selector' => '{{WRAPPER}} .slide-arrow:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'nav_box_shadow_hover',
				'label' => esc_html__( 'Box Shadow', 'gtew' ),
				'selector' => '{{WRAPPER}} .slide-arrow:hover',
			]
		);
	
		$this->end_controls_tab();
		$this->end_controls_tabs();
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
		//print_r($settings['direction']);
		$id= $this->get_id();
        ?>
		
	<div class="gallery gallery-<?php echo $settings['direction']; ?>" >  
	    <?php
		if($settings['thumb_direction']=='left'){
		?>
		<div class="swiper-container gallery-thumbs thumb-<?php echo $id?>">
			<div class="swiper-wrapper">
				<?php
				foreach ( $settings['gallery'] as $image ) {?>
				<div class="swiper-slide"><?php echo '<img src="' . esc_attr( $image['url'] ) . '">'; ?></div>
				<?php } ?>
			</div>
		</div>
		<?php }?>	
		<div class="swiper-container gallery-slider slider-<?php echo $id;?>">
			<div class="swiper-wrapper">
				<?php
				foreach ( $settings['gallery'] as $image ) {?>
				<div class="swiper-slide main-slide">
					<?php echo '<img src="' . esc_attr( $image['url'] ) . '">'; ?>
				</div>
				<?php } ?>
			</div>
			<div class="slide-arrow slide-arrow__prev slidePrev-btn">
				<?php \Elementor\Icons_Manager::render_icon( $settings['prev_icon'], [ 'aria-hidden' => 'true' ] ); ?></i>
			</div>
			<div class="slide-arrow slide-arrow__next slideNext-btn">
				<?php \Elementor\Icons_Manager::render_icon( $settings['next_icon'], [ 'aria-hidden' => 'true' ] ); ?></i>
			</div>
		</div>
		
		<?php
		if($settings['thumb_direction']=='right'){
		?>
			<div class="swiper-container gallery-thumbs thumb-<?php echo $id?>">
				<div class="swiper-wrapper">
				<?php
					foreach ( $settings['gallery'] as $image ) {?>
					<div class="swiper-slide"><?php echo '<img src="' . esc_attr( $image['url'] ) . '">'; ?></div>
					<?php } ?>
				</div>
			</div>
		<?php }?>

		<?php
		if($settings['direction']=='horizontal'){
		?>
			<div class="swiper-container gallery-thumbs thumb-<?php echo $id?>">
				<div class="swiper-wrapper">
				<?php
					foreach ( $settings['gallery'] as $image ) {?>
					<div class="swiper-slide"><?php echo '<img src="' . esc_attr( $image['url'] ) . '">'; ?></div>
					<?php } ?>
				</div>
			</div>
		<?php }?>
	</div>
	
    <?php
        
    }

}