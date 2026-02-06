<?php
namespace BetterWidgets\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Utils;
use Elementor\Plugin;
use Elementor\Frontend;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Image_Size;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		 
/**
 * @since 1.0.0
 */
class Better_Image extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'better-image';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Image', 'better-elementor-addons' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-sun-o bea-widget-badge';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'better-category' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
	
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Settings', 'better-elementor-addons' ),
			]
		);
		
		$this->add_control(
			'image_style',
			[
				'label' => __( 'Style', 'better-elementor-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1' => __( 'Style 1', 'better-elementor-addons' ),
					'2' => __( 'Style 2', 'better-elementor-addons' ),
					'3' => __( 'Style 3', 'better-elementor-addons' ),
					'4' => __( 'Style 4', 'better-elementor-addons' ),
					'5' => __( 'Style 5', 'better-elementor-addons' ),
				],
				'default' => '1',
			]
		);

		$this->add_control(
            'image',
            [
                'label' => __( 'Image', 'better-elementor-addons' ),
                'type' => Controls_Manager::MEDIA,
				'default' => [
				'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'image_style' => array('1','2','3','4','5')
				],

            ]
        );
		

		
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'better-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'This is the heading', 'better-elementor-addons' ),
				'condition' => [
					'image_style' => array( '1','2','3','5' )
				],
			]
		);
		
		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Subtitle', 'better-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => 'Leave it blank if you don\'t want to use this subtitle',
				'condition' => [
					'image_style' => array( '1','2','5' )
				],
			]
		);
		$this->add_control(
			'link',
			[
				'label' => __( 'Button Link', 'better-elementor-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'Leave video link here',
				'condition' => [
					'image_style' => array('','3' )
				],
			]
		); 


		$this->add_responsive_control(
			'width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => __( 'Width', 'better-elementor-addons' ),
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1140,
					],
					'%' => [
						'min' => 50,
					],
				],
				'size_units' => [ '%', 'px' ],
				'default' => [
					'unit' => '%',
				],
				'selectors' => [
					'{{WRAPPER}} .better-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'image_style' => array( '1','2','5' )
				],
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => __( 'Height', 'better-elementor-addons' ),
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000,
					],
					'vh' => [
						'min' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .better-image img' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'image_style' => array( '1','2','5' )
				],
			]
		);
		
		
		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

       // Styles selections.
		$style = $settings['image_style'];
		$allowed_styles = array('1', '2', '3', '4', '5'); // Add more styles as needed


	    // Check if the selected style is in the allowed list
	    if (in_array($style, $allowed_styles)) {
	        // If the style is allowed, include the corresponding file
	        include( 'styles/style'.$style.'.php' );
	    } else {
	        // If the style is not selected
	        echo "Invalid style selected";
	    }
    }

}


