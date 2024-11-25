<?php

use Elementor\Widget_Base;

class imaj_product_header_widget extends Widget_Base
{

    public $domain = 'imaj';


    public function get_name()
    {
        return 'imaj_product_header_widget';
    }

    public function get_title()
    {
        return __('imaj_product_header_widget', $this->domain);
    }

    public function get_icon()
    {
        return 'eicon-post-slider';
    }

    protected function  register_controls()
    {

        $this->start_controls_section(
            'slide1',
            [
                'label' => __('slide1', '$this->domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Repeater List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [

                    [
                        'name' => 'list_img',
                        'label' => esc_html__('Img', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'settings' => array(
                            'type' => 'video',
                            'library' => 'native',
                            'sources' => array(
                                array(
                                    'type' => 'video/webm',
                                    'src' => '',
                                    'mimeType' => 'video/webm',
                                ),
                                array(
                                    'type' => 'video/mp4',
                                    'src' => '',
                                    'mimeType' => 'video/mp4',
                                ),
                            ),
                        ),
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],

                ],
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'textdomain'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'textdomain'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );
        $this->end_controls_section();
    }
    public function get_script_depends()
    {
        return ['swiper-custom'];
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $uniqID = $this->get_id();
        $list = $settings['list'];
        $items = @get_post_meta(get_query_var("pid"), "product-gallery",true);
?>
<style>
	h2.dynamicvar{
			opacity:0;
		position: absolute;
  color: #fff;
  top: -48px;
  margin: auto;
  right: 0;
  left: 0;
  font-size: 16px;	
	}
	.swiper-pagination-bullet-active h2{
		transition:all 0.5s ease-in;
		opacity:1;
	}
</style>
        <div class="swiper imaj_slider_head product">
            <div class="swiper-wrapper">
                <?php
                if(is_array($items)){
                foreach ($items as $item) : ?>
                    <!-- ,wp_get_attachment_image_url('219') -->
                    <div class="swiper-slide" attr-nmb="<?= $item['product-image-label'] ?>">
                        <img src="<?= wp_get_attachment_image_url($item['product-image'], 'full')  ?>">
                        
                    </div>
                <?php endforeach; 
                }
                ?>

            </div>
            <div class="imaj_slider_paginate mb-0 d-none d-md-flex">
                    <div class="swiper-button-prev-imaj-slider_product float-left"><img alt="prev" src="<?= get_stylesheet_directory_uri() . '/images/left.svg'  ?>" aria-disabled="true"></div>
                    <div class="swiper-button-next-imaj-slider_product float-right"><img alt="next" src="<?= get_stylesheet_directory_uri() . '/images/right.svg'  ?>" aria-disabled="true"></div>
                </div>
            <div class="swiper-pagination-product"></div>
        </div>

        <script>
            var items = <?= json_encode($items);  ?>;
            const uppercaseAlphabet = [...Array(26)].map((_, i) => String.fromCharCode(i + 65));
            new Swiper(".imaj_slider_head", {
                spaceBetween: 0,
                slidesPerView: 1,

				  mousewheel: {
 				   releaseOnEdges: true
 				 },
                breakpoints: {
                    // when window width is >= 320px
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 0
                    },
                    // when window width is >= 480px
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 0
                    },
                    // when window width is >= 640px
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 0
                    }
                },
                pagination: {
                    el: ".swiper-pagination-product",
                    clickable: true,
                    renderBullet: function(index, className) {
                        var t = "";
                        <?php
		$i=0;
                        foreach ($items as $item) :
		
		if($i< 5){
                        ?>
							 
						if (window.innerWidth < 768) {
							    t = '<span class="' + className + '"><p>'+uppercaseAlphabet[index] +'</p><h2 class="dynamicvar d-md-none d-flex" >'+ items[index]['product-image-label']  +'</h2> </span>';
						}else{
							console.log(items[index]['luminous-flux-lm'] != "");
						
                            t = '<span attr-nominal="'+items[index]['nominal-power-w']+'" attr-luminous="'+items[index]['luminous-flux-lm']+'"   class="' + className + '"><p>'+uppercaseAlphabet[index] +'</p>'+ items[index]['product-image-label'] + '</span>';
						 
							 
							
						}
							 
                        <?php 
		}
			$i++;
			endforeach; ?>
                        return t

                    },
                },
                navigation: {
                    nextEl: ".swiper-button-next-imaj-slider_product",
                    prevEl: ".swiper-button-prev-imaj-slider_product",
                },
				    on: {
        slideChange: function () {
           updateDynamicValues(this.activeIndex);
        },
        init: function() {
           console.log("s");
        }
    }

            });

			function updateDynamicValues(index) {
    if (index >= 0 && index < items.length) {
        var dynamicvar1 = items[index]['nominal-power-w'];
        var dynamicvar2 = items[index]['luminous-flux-lm'];
        jQuery("#dynamicvar1 td:last-child").html(dynamicvar1);
        jQuery("#dynamicvar2 td:last-child").html(dynamicvar2);
    }
			}
			jQuery(".swiper-pagination-bullet").on("click",function(){
				var dynamicvar1=jQuery(this).attr("attr-nominal");
				var dynamicvar2=jQuery(this).attr("attr-luminous");
				jQuery("#dynamicvar1 td:last-child").html(dynamicvar1);
				jQuery("#dynamicvar2 td:last-child").html(dynamicvar2);
			})
        </script>
<?php
    }
}
