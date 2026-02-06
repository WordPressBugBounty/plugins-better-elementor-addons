<?php
namespace BetterWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world. 
 *
 * @since 1.0.0
 */
class Better_Services extends Widget_Base {

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
		return 'better-services';
	}
	
	//script depend
	public function get_script_depends() { return [ 'swiper','wow','isotope','youtubepopup-js','bootstrap-js','splitting','parallaxie','simpleParallax','justifiedgallery','better-el-addons']; }
	
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
		return __( 'Services', 'better-elementor-addons' );
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
		return 'eicon-image-before-after bea-widget-badge';
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
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		// start of the Content tab section
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content Settings', 'better-elementor-addons' ),
			]
		);

		$this->add_control(
			'better_services_style',
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
					'better_services_style' => array('5')
				],
			]
		);

		$this->add_control(
			'title_first_letter',
			[
				'label' => __( 'Title First Letter', 'better-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Insert your first letter here..', 'better-elementor-addons' ),
				'default' => __( 'W' , 'better-elementor-addons'  ),
				'condition' => [
					'better_services_style' => array('1')
				],
			]
        );

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'better-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Insert your title here..', 'better-elementor-addons' ),
				'default' => __( 'EB DEVELOPMENT' , 'better-elementor-addons'  ),
				'condition' => [
					'better_services_style' => array('1','2','5')
				],
			]
		);

        $this->add_responsive_control(
            'title_alignment',
            [
                'label' => __('Title Alignment', 'better-elementor-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'better-elementor-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'better-elementor-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'better-elementor-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .better-services .better-services-title' => 'text-align: {{VALUE}};',
                ],
				'condition' => [
					'better_services_style' => array('1','2','5')
				],
            ]
        );

		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Sub-Title', 'better-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Insert your title here..', 'better-elementor-addons' ),
				'default' => __( 'Our creative Ad agency is ranked among the finest in the US. We cultivate smart ideas for start-ups and seasoned players.' , 'better-elementor-addons'  ),
				'condition' => [
					'better_services_style' => array('2')
				],
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'better-elementor-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => __( 'Insert your slider subtitle here..', 'better-elementor-addons' ),
				'default' => __( 'The design teams use to create products that provide meaningful.' , 'better-elementor-addons'  ),
				'condition' => [
					'better_services_style' => array('1','5')
				],
			]
		);

        $this->add_responsive_control(
            'text_alignment',
            [
                'label' => __('Text Alignment', 'better-elementor-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'better-elementor-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'better-elementor-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'better-elementor-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .better-services .better-services-text' => 'text-align: {{VALUE}};',
                ],
				'condition' => [
					'better_services_style' => array('1','5')
				],
            ]
        );

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'better-elementor-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'Leave link url',
				'condition' => [
					'better_services_style' => array('1','5')
				],
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text', 'better-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Read More', 'better-elementor-addons' ),
				'default' => __( 'Read More' , 'better-elementor-addons'  ),
				'condition' => [
					'better_services_style' => array('5')
				],
			]
		);

		$this->add_control(
			'first_letter_image',
			[
				'label' => __( 'First Letter Image', 'better-elementor-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'better_services_style' => array('1')
				],
			]
		);

		$this->add_control(
			'better_services2_image',
			[
				'label' => __( 'First Letter Image', 'better-elementor-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'better_services_style' => array('2')
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'better-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => [
					'better_services_style' => array('1')
				],
			]
		);

		$this->add_control(
			'show_readmore_btn',
			[
				'label' => esc_html__( 'Show Read More Button', 'better-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'better-elementor-addons' ),
				'label_off' => esc_html__( 'Hide', 'better-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'better_services_style' => array('1')
				],
			]
		);

		$this->add_control(
			'style4_item_icon',
			[
				'label' => __( 'Icon', 'better-elementor-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'pe-7s-map-marker' => __( 'map marker', 'better-elementor-addons' ),
					'pe-7s-mail' => __( 'mail', 'better-elementor-addons' ),
					'pe-7s-call' => __( 'call', 'better-elementor-addons' ),
					'pe-7s-refresh' => __( 'refresh', 'better-elementor-addons' ),
					'pe-7s-refresh-2' => __( 'refresh 2', 'better-elementor-addons' ),
					'pe-7s-cloud-upload' => __( 'cloud upload', 'better-elementor-addons' ),
					'pe-7s-close' => __( 'close', 'better-elementor-addons' ),
					'pe-7s-photo' => __( 'photo', 'better-elementor-addons' ),
					'pe-7s-users' => __( 'users', 'better-elementor-addons' ),
					'pe-7s-angle-right' => __( 'angle right', 'better-elementor-addons' ),
					'pe-7s-angle-left' => __( 'angle left', 'better-elementor-addons' ),
					'pe-7s-angle-up' => __( 'angle up', 'better-elementor-addons' ),
					'pe-7s-angle-down' => __( 'angle down', 'better-elementor-addons' ),
					'pe-7s-paint-bucket' => __( 'paint bucket', 'better-elementor-addons' ),
					'pe-7s-gleam' => __( 'gleam', 'better-elementor-addons' ),
					'pe-7s-vector' => __( 'vector', 'better-elementor-addons' ),
					'pe-7s-drop' => __( 'drop', 'better-elementor-addons' ),
					'pe-7s-glasses' => __( 'glasses', 'better-elementor-addons' ),
					'pe-7s-music' => __( 'music', 'better-elementor-addons' ),
					'pe-7s-way' => __( 'way', 'better-elementor-addons' ),
					'pe-7s-settings' => __( 'settings', 'better-elementor-addons' ),
				],
				'default' => 'pe-7s-map-marker',
				'condition' => [
					'better_services_style' => array('4','5')
				],
			]
		);

        $this->add_responsive_control(
            'style4_item_icon_alignment',
            [
                'label' => __('Text Alignment', 'better-elementor-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'better-elementor-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'better-elementor-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'better-elementor-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .better-services .better-services-icon' => 'text-align: {{VALUE}};',
                ],
				'condition' => [
					'better_services_style' => array('4','5')
				],
            ]
        );

		$this->add_control(
			'style4_item_title',
			[
				'label' => __( 'Item Title', 'better-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Modern Design', 'better-elementor-addons' ),
				'default' => __( 'Modern Design', 'better-elementor-addons' ),
				'condition' => [
					'better_services_style' => array('4')
				],
			]
		);

		$this->add_control(
			'style4_item_text',
			[
				'label' => __( 'Item Text', 'better-elementor-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => __( 'Enter your text', 'better-elementor-addons' ),
				'default' => __( 'luctus massa ipsum at tempus eleifend congue lectus bibendum', 'better-elementor-addons' ),
				'condition' => [
					'better_services_style' => array('4')
				],
			]
		);

		$this->add_control(
			'services_list',
			[
				'label' => __( 'Services List', 'better-elementor-addons' ),
				'type' => Controls_Manager::REPEATER,
				'condition' => [
					'better_services_style' => array('2')
				],
				'default' => [
					[
						'item_title' => 'Modern Design',
						'item_text' => 'luctus massa ipsum at tempus eleifend congue lectus bibendum',
					],
					[
						'item_title' => 'Fully Customization',
						'item_text' => 'luctus massa ipsum at tempus eleifend congue lectus bibendum',
					],
					[
						'item_title' => 'Retina ready',
						'item_text' => 'luctus massa ipsum at tempus eleifend congue lectus bibendum',
					],
				],
				'fields' => [
					[
						'name' => 'item_title',
						'label' => __( 'Item Title', 'better-elementor-addons' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Modern Design', 'better-elementor-addons' ),
						'default' => __( 'Modern Design', 'better-elementor-addons' ),
					],
					[
						'name' => 'item_text',
						'label' => __( 'Item Text', 'better-elementor-addons' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'placeholder' => __( 'Enter your text', 'better-elementor-addons' ),
						'default' => __( 'luctus massa ipsum at tempus eleifend congue lectus bibendum', 'better-elementor-addons' ),
					],
				],
				'title_field' => '{{ item_title }}',
			]
		);

		$this->add_control(
			'style3_services_list',
			[
				'label' => __( 'Services List', 'better-elementor-addons' ),
				'type' => Controls_Manager::REPEATER,
				'condition' => [
					'better_services_style' => array('3')
				],
				'default' => [
					[
						'style3_item_title' => 'Modern Design',
						'style3_item_text' => 'luctus massa ipsum at tempus eleifend congue lectus bibendum',
						'style3_item_link' => '#0'
					],
					[
						'style3_item_title' => 'Fully Customization',
						'style3_item_text' => 'luctus massa ipsum at tempus eleifend congue lectus bibendum',
						'style3_item_link' => '#0'
					],
					[
						'style3_item_title' => 'Retina ready',
						'style3_item_text' => 'luctus massa ipsum at tempus eleifend congue lectus bibendum',
						'style3_item_link' => '#0'
					],
				],
				'fields' => [
					[
						'name' => 'style3_item_icon',
						'label' => __( 'Icon', 'better-elementor-addons' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'pe-7s-map-marker' => __( 'map marker', 'better-elementor-addons' ),
							'pe-7s-mail' => __( 'mail', 'better-elementor-addons' ),
							'pe-7s-call' => __( 'call', 'better-elementor-addons' ),
							'pe-7s-refresh' => __( 'refresh', 'better-elementor-addons' ),
							'pe-7s-refresh-2' => __( 'refresh 2', 'better-elementor-addons' ),
							'pe-7s-cloud-upload' => __( 'cloud upload', 'better-elementor-addons' ),
							'pe-7s-close' => __( 'close', 'better-elementor-addons' ),
							'pe-7s-photo' => __( 'photo', 'better-elementor-addons' ),
							'pe-7s-users' => __( 'users', 'better-elementor-addons' ),
							'pe-7s-angle-right' => __( 'angle right', 'better-elementor-addons' ),
							'pe-7s-angle-left' => __( 'angle left', 'better-elementor-addons' ),
							'pe-7s-angle-up' => __( 'angle up', 'better-elementor-addons' ),
							'pe-7s-angle-down' => __( 'angle down', 'better-elementor-addons' ),
							'pe-7s-paint-bucket' => __( 'paint bucket', 'better-elementor-addons' ),
							'pe-7s-gleam' => __( 'gleam', 'better-elementor-addons' ),
							'pe-7s-vector' => __( 'vector', 'better-elementor-addons' ),
							'pe-7s-drop' => __( 'drop', 'better-elementor-addons' ),
							'pe-7s-glasses' => __( 'glasses', 'better-elementor-addons' ),
							'pe-7s-music' => __( 'music', 'better-elementor-addons' ),
							'pe-7s-way' => __( 'way', 'better-elementor-addons' ),
							'pe-7s-settings' => __( 'settings', 'better-elementor-addons' ),
						],
						'default' => 'pe-7s-map-marker',
					],
					[
						'name' => 'style3_item_title',
						'label' => __( 'Item Title', 'better-elementor-addons' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Modern Design', 'better-elementor-addons' ),
						'default' => __( 'Modern Design', 'better-elementor-addons' ),
					],
					[
						'name' => 'style3_item_text',
						'label' => __( 'Item Text', 'better-elementor-addons' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'placeholder' => __( 'Enter your text', 'better-elementor-addons' ),
						'default' => __( 'luctus massa ipsum at tempus eleifend congue lectus bibendum', 'better-elementor-addons' ),
					],
					[
						'name' => 'style3_item_link',
						'label' => __( 'Link', 'better-elementor-addons' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => 'Leave link url',
					],
				],
				'title_field' => '{{ style3_item_title }}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Content Style', 'better-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'box_padding_all',
			[
				'label' => __( 'Padding', 'better-elementor-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .better-services .item' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'better_services_style' => array('1','5')
				],
			]
		);

		$this->add_control(
			'box_color',
			[
				'label' => __( 'Background Color', 'better-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .better-services' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'box_color_hover',
			[
				'label' => __( 'Background Color Hover', 'better-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .better-services:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'better_service_title_typography',
				'label' => esc_html__( 'Service Title Typography', 'better-elementor-addons' ), 
				'selector' => '{{WRAPPER}} .better-services .item h6',
				'condition' => [
					'better_services_style' => array('1','5')
				],
			]
        );

		$this->add_control(
			'better_service_title_color',
			[
				'label' => esc_html__( 'Service Title Color', 'better-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .better-services .item h6' => 'color: {{VALUE}}',
				],
				'condition' => [
					'better_services_style' => array('1','5')
				],
			]
        );
        
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'better_service_text_typography',
				'label' => esc_html__( 'Service Text Typography', 'better-elementor-addons' ), 
				'selector' => '{{WRAPPER}} .better-services .item p',
				'condition' => [
					'better_services_style' => array('1','5')
				],
			]
		);

		$this->add_control(
			'better_service_text_color',
			[
				'label' => esc_html__( 'Service Text Color', 'better-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .better-services .item p' => 'color: {{VALUE}}',
				],
				'condition' => [
					'better_services_style' => array('1','5')
				],
			]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'better_service2_title_typography',
				'label' => esc_html__( 'Main Title Typography', 'better-elementor-addons' ), 
				'selector' => '{{WRAPPER}} .better-services.style-2 .content h4',
				'condition' => [
					'better_services_style' => array('2')
				],
			]
		);

		$this->add_control(
			'better_service2_title_color',
			[
				'label' => esc_html__( 'Main Title Color', 'better-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .better-services.style-2 .content h4' => 'color: {{VALUE}}',
				],
				'condition' => [
					'better_services_style' => array('2')
				],
			]
        );
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'better_service2_subtitle_typography',
				'label' => esc_html__( 'Main Sub-Title Typography', 'better-elementor-addons' ), 
				'selector' => '{{WRAPPER}} .better-services.style-2 .content p',
				'condition' => [
					'better_services_style' => array('2')
				],
			]
        );

		$this->add_control(
			'better_service2_subtitle_color',
			[
				'label' => esc_html__( 'Main Sub-Title Color', 'better-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .better-services.style-2 .content p' => 'color: {{VALUE}}',
				],
				'condition' => [
					'better_services_style' => array('2')
				],
			]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'better_service2_item_title_typography',
				'label' => esc_html__( 'Service Item Title Typography', 'better-elementor-addons' ), 
				'selector' => '{{WRAPPER}} .better-services.style-2 .content ul.feat li h6',
				'condition' => [
					'better_services_style' => array('2')
				],
			]
		);

		$this->add_control(
			'better_service2_item_title_color',
			[
				'label' => esc_html__( 'Service Item Title Color', 'better-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .better-services.style-2 .content ul.feat li h6' => 'color: {{VALUE}}',
				],
				'condition' => [
					'better_services_style' => array('2')
				],
			]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'better_service2_item_text_typography',
				'label' => esc_html__( 'Service Text Typography', 'better-elementor-addons' ), 
				'selector' => '{{WRAPPER}} .better-services.style-2 .content ul.feat li p',
				'condition' => [
					'better_services_style' => array('2')
				],
			]
		);

		$this->add_control(
			'better_service2_item_text_color',
			[
				'label' => esc_html__( 'Service Text Color', 'better-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
				'{{WRAPPER}} .better-services.style-2 .content ul.feat li p' => 'color: {{VALUE}}',
				],
				'condition' => [
					'better_services_style' => array('2')
				],
			]
        );

		$this->add_control(
			'better_service2_count_color',
			[
				'label' => esc_html__( 'Service Count Color', 'better-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .better-services.style-2 .content h6 span' => 'color: {{VALUE}};border-color: {{VALUE}}',
				],
				'condition' => [
					'better_services_style' => array('2')
				],
			]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'better_readmore_btn_typography',
				'label' => esc_html__( 'Read More Button Typography', 'better-elementor-addons' ), 
				'selector' => '{{WRAPPER}} .better-services .item .more',
				'condition' => [
					'better_services_style' => array('1','5')
				],
			]
		);
        
        $this->add_control(
			'better_readmore_btn_color',
			[
				'label' => esc_html__( 'Read More Button Color', 'better-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
				'{{WRAPPER}} .better-services .item .more' => 'color: {{VALUE}}',
				],
				'condition' => [
					'better_services_style' => array('1','5')
				],
			]
        );
        
        $this->add_control(
			'better_readmore_btn_color_hover',
			[
				'label' => esc_html__( 'Read More Button Color Hover', 'better-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
				'{{WRAPPER}} .better-services .item .more:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'better_services_style' => array('1','5')
				],
			]
		);

		$this->end_controls_section();
		

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$style = $settings['better_services_style'];	
		// Define an array of allowed styles
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