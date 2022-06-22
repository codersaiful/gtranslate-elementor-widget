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
				'label' => esc_html__( 'Settings', 'gtew' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'gt_icon',
			[
				'label' => esc_html__( 'Icon', 'gtew' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-globe',
					'library' => 'solid',
				],
			]
		);

		$this->end_controls_section();
		//STYLE
		
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'gtew' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'gt_typography',
				'selector' => '{{WRAPPER}} .gt-wrap .switcher a',
			]
		);
		$this->add_control(
			'gt_text_color',
			[
				'label' => esc_html__( 'Text Color', 'gtew' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gt-wrap .switcher a' => 'color: {{VALUE}}',
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
		echo '<style>';
			echo '.switcher .selected a:after {
			
			}';
		echo '</style>';

	?>
		<div class="gt-wrap">
			<?php  echo do_shortcode('[gtranslate]'); ?>
		</div>
	<?php 
	}

}