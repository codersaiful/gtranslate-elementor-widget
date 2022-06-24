<?php

namespace Elementor_GT_Addon;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

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
class gt_widget extends Widget_Base {

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
		return 'gt_widget';
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
		return __( 'GT Widget', 'gtew' );
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
		return 'eicon-globe';
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
		return [ 'Gt', 'lang', 'language', 'menu' ];
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

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Dropdown Settings', 'gtew' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'gt_hide_flag',
			[
				'label' => esc_html__( 'Flag Image', 'gtew' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'gtew' ),
				'label_off' => esc_html__( 'Hide', 'gtew' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'gt_hide_text',
			[
				'label' => esc_html__( 'Flag Text', 'gtew' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'gtew' ),
				'label_off' => esc_html__( 'Hide', 'gtew' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		

		$this->add_responsive_control(
			'gt_dropdown_width',
			[
				'label' => esc_html__( 'Dropdown Width', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 200,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .switcher .option' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'inline_section',
			[
				'label' => esc_html__( 'Inline Settings', 'gtew' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'gt_inliene_text',
			[
				'label' => esc_html__( 'Inline Lang Codes', 'gtew' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'gtew' ),
				'label_off' => esc_html__( 'Hide', 'gtew' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'gt_inliene_flag',
			[
				'label' => esc_html__( 'Inline Flags', 'gtew' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'gtew' ),
				'label_off' => esc_html__( 'Hide', 'gtew' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->end_controls_section();
		//STYLE
		
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'General', 'gtew' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'gt_typography',
				'selector' => '{{WRAPPER}} .gt-wrap .switcher a, .gt-wrap a.glink',
			]
		);
		$this->add_control(
			'gt_text_color',
			[
				'label' => esc_html__( 'Text Color', 'gtew' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .switcher a, .gt-wrap a.glink' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'gt_text_hover_color',
			[
				'label' => esc_html__( 'Text Hover Color', 'gtew' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .switcher a:hover, .gt-wrap a.glink:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'dropdown_section',
			[
				'label' => esc_html__( 'Dropdown', 'gtew' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
	
		$this->add_control(
			'gt_dropdown_bg',
			[
				'label' => esc_html__( 'Dropdown Background', 'gtew' ),
				'type' => Controls_Manager::COLOR,
				'separator'=>'before',
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .switcher .option a' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'gt_dropdown_hover_bg',
			[
				'label' => esc_html__( 'Dropdown Hover Background', 'gtew' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .switcher .option a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'gt_flag_size',
			[
				'label' => esc_html__( 'Flag Size', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 24,
				],
				'separator'=>'before',
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .switcher a img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'gt_flag_margin',
			[
				'label' => esc_html__( 'Flag Space', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .switcher a img' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'gt_scrollbar_bg',
			[
				'label' => esc_html__( 'Scrollbar Background', 'gtew' ),
				'type' => Controls_Manager::COLOR,
				'separator'=>'before',
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .switcher .option::-webkit-scrollbar-thumb' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'gt_scrollbar_thikness',
			[
				'label' => esc_html__( 'Scrollbar Thikness', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .switcher .option::-webkit-scrollbar' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
	
		
		$this->end_controls_section();

		$this->start_controls_section(
			'inline_section_style',
			[
				'label' => esc_html__( 'Inline Flags', 'gtew' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'gt_inline_flag_size',
			[
				'label' => esc_html__( 'Inline Flag Size', 'gtew' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 24,
				],
				'separator'=>'before',
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .lang-list img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'gt_inline_flag_margin',
			[
				'label' => esc_html__( 'Margin', 'gtew' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .lang-list img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		//print_r($settings);
		echo '<script>
		jQuery(function() {
			var get_lang = localStorage.getItem("lang");
			if(!get_lang){
				localStorage.setItem("lang", "English");
				jQuery(".switcher").attr("data-lang", "English");
			}else{
				jQuery(".switcher").attr("data-lang", get_lang);
			}
			jQuery(".switcher .nturl").on("click", function(){
				var country = jQuery(this).attr("title");
				localStorage.setItem("lang", country);
				var get_lang = localStorage.getItem("lang");
				jQuery(".switcher").attr("data-lang", get_lang);
			});
		});
		</script>';
		$flag_hide_class="";
		$text_hide_class ="";

		if($settings['gt_hide_flag']!='yes'){
			$flag_hide_class= 'gt-flag-hide';
		}
		if($settings['gt_hide_text']!='yes'){
			$text_hide_class= 'gt-text-hide';
		}
		?>
		<div class="gt-wrap <?php echo $flag_hide_class; ?> <?php echo $text_hide_class; ?>">
		
			<div style="display:none">
				<?php  echo do_shortcode('[gtranslate]'); ?>
			</div>
		
			<div class="lang-list">
				<?php 
				if($settings['gt_inliene_flag']=='yes'){
					echo do_shortcode('[gt_only_flag]');
				}
				if($settings['gt_inliene_text']=='yes'){
					echo do_shortcode('[gt_only_lang_codes]');
				}
				?>
			</div>
		</div>
	<?php 
	}

}