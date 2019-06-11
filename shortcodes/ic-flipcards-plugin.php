<?php

if ( !class_exists( 'ec_flipcards' ) )
{
	class ec_flipcards extends aviaShortcodeTemplate
	{
		function shortcode_insert_button()
		{
			$this->config['name']		= __('Flipbox', 'avia_framework' );
			$this->config['icon']		= plugin_dir_url(__FILE__) . '../images/ic-template-icon.png';
			$this->config['target']		= 'avia-target-insert';
			$this->config['shortcode'] 	= 'ec_flipcards';
			$this->config['shortcode_nested'] = array('ec_flipbards_card');
			$this->config['tooltip'] 	= __('Displays flip cards', 'avia_framework' );
			$this->config['preview'] 	= false;
		}

		function popup_elements()
		{
			$this->elements = array(
				array(
					"type" => "tab_container",
					"nodescription" => true,
				),

				array(
					"type" => "tab",
					"name" => __("Content", "avia_framework"),
					"nodescription" => true
				),

				array(
					"name" => __("Add/Edit Cards", "avia_framework"),
					"desc" => __("Here you can add, remove and edit the cards you want to display.", "avia_framework"),
					"type" => "modal_group",
					"id" => "content",
					"modal_title" => __("Edit Form Element", "avia_framework"),
					"std" => array(
						array("title" => __("Card 1", "avia_framework"), "tags" => ""),
						array("title" => __("Card 2", "avia_framework"), "tags" => ""),
					),
					"subelements" => array(
						array(
							"name" => __("Front Card Title"),
							"desc" => __("Enter the front card title here", "avia_framework"),
							"id" => "title",
							"std" => "Front Title",
							"type" => "input",
						),
						array(
							"name" => __("Front Card Text"),
							"desc" => __("Enter the front card text here", "avia_framework"),
							"id" => "content",
							"type" => "tiny_mce",
							"std" => __("Front card content goes here", "avia_framework"),
						),
						array(
							"name" 	=> __("Append Front Card Button?", "avia_framework" ),
							"desc" 	=> __("Append a button with link in the card", "avia_framework" ),
							"id" 	=> "front_link",
							"type" 	=> "linkpicker",
							"fetchTMPL"	=> true,
							"std" 	=> "",
							"subtype" => array(
									__('No Link', 'avia_framework' ) =>'',
									__('Set Manually', 'avia_framework' ) =>'manually',
									__('Single Entry', 'avia_framework' ) =>'single',
									__('Taxonomy Overview Page',  'avia_framework' )=>'taxonomy',
							),
						),
						array(
							"name" => __("Front Button Label"),
							"desc" => __("Enter the front button label here", "avia_framework"),
							"id" => "front_button_label",
							"required" 	=> array('front_link', 'not', ''),
							"std" => "Read More",
							"type" => "input",
						),
						array(
								"name" 	=> __("Open front link in new window", 'avia_framework' ),
								"desc" 	=> __("Do you want to open the link in a new window", 'avia_framework' ),
								"id" 	=> "front_linktarget",
								"required" 	=> array('front_link', 'not', ''),
								"type" 	=> "select",
								"std" 	=> "",
								"subtype" => AviaHtmlHelper::linking_options(),
						),
						array(
							"name" => __("Back Card Title"),
							"desc" => __("Enter the back card title here", "avia_framework"),
							"id" => "back_title",
							"std" => "Back Title",
							"type" => "input",
						),
						array(
							"name" => __("Back Card Text"),
							"desc" => __("Enter the back card text here", "avia_framework"),
							"id" => "back_content",
							"type" => "textarea",
							"std" => __("Back card content goes here", "avia_framework"),
						),
						array(
							"name" 	=> __("Append Back Card Button?", "avia_framework" ),
							"desc" 	=> __("Append a button with link in the card", "avia_framework" ),
							"id" 	=> "back_link",
							"type" 	=> "linkpicker",
							"fetchTMPL"	=> true,
							"std" 	=> "",
							"subtype" => array(
									__('No Link', 'avia_framework' ) =>'',
									__('Set Manually', 'avia_framework' ) =>'manually',
									__('Single Entry', 'avia_framework' ) =>'single',
									__('Taxonomy Overview Page',  'avia_framework' )=>'taxonomy',
							),
						),
						array(
							"name" => __("Back Button Label"),
							"desc" => __("Enter the front button label here", "avia_framework"),
							"id" => "back_button_label",
							"required" 	=> array('back_link', 'not', ''),
							"std" => "Read More",
							"type" => "input",
						),
						array(
								"name" 	=> __("Open back link in new window", 'avia_framework' ),
								"desc" 	=> __("Do you want to open the link in a new window", 'avia_framework' ),
								"id" 	=> "back_linktarget",
								"required" 	=> array('back_link', 'not', ''),
								"type" 	=> "select",
								"std" 	=> "",
								"subtype" => AviaHtmlHelper::linking_options(),
						),
					)
				),

				array(
					"name" => __("Columns", "avia_framework"),
					"desc" => __("How many Card columns should be displayed?", "avia_framework" ),
					"id" => "columns",
					"type" => "select",
					"std" => "1",
					"subtype" => array(
						__("1 Columns", "avia_framework") => "1",
						__("2 Columns", "avia_framework") => "2",
						__("3 Columns", "avia_framework") => "3",
						__("4 Columns", "avia_framework") => "4",
						__("5 Columns", "avia_framework") => "5",
						__("6 Columns", "avia_framework") => "6",
					),
				),

				array(
					"type" => "close_div",
					"nodescription" => true,
				),

				array(
					"type" => "tab",
					"name" => __("Colors", "avia_framework"),
					"nodescription" => true,
				),

				array(
					"name" 	=> __("Front Font Colors", "avia_framework" ),
					"desc" 	=> __("Either use the themes default colors or apply some custom ones", "avia_framework" ),
					"id" 	=> "front_font_color",
					"type" 	=> "select",
					"std" 	=> "",
					"subtype" => array(
						__("Default", "avia_framework" ) => "",
						__("Define Custom Colors", "avia_framework" ) => "custom"),
				),

				array(
					"name" 	=> __("Custom Front Font Color", "avia_framework" ),
					"desc" 	=> __("Select a custom font color. Leave empty to use the default", "avia_framework" ),
					"id" 	=> "front_font_custom_color",
					"type" 	=> "colorpicker",
					"std" 	=> "",
					"container_class" => "av_half av_half_first",
					"required" => array("front_font_color","equals","custom")
				),

				array(
					"name" 	=> __("Back Font Colors", "avia_framework" ),
					"desc" 	=> __("Either use the themes default colors or apply some custom ones", "avia_framework" ),
					"id" 	=> "back_font_color",
					"type" 	=> "select",
					"std" 	=> "",
					"subtype" => array(
						__("Default", "avia_framework" ) => "",
						__("Define Custom Colors", "avia_framework" ) => "custom"),
				),

				array(
					"name" 	=> __("Custom Back Font Color", "avia_framework" ),
					"desc" 	=> __("Select a custom font color. Leave empty to use the default", "avia_framework" ),
					"id" 	=> "back_font_custom_color",
					"type" 	=> "colorpicker",
					"std" 	=> "",
					"container_class" => "av_half av_half_first",
					"required" => array("back_font_color","equals","custom")
				),

				array(
					"name" 	=> __("Back Background Colors", "avia_framework" ),
					"desc" 	=> __("Either use the themes default colors or apply some custom ones", "avia_framework" ),
					"id" 	=> "back_bg_color",
					"type" 	=> "select",
					"std" 	=> "",
					"subtype" => array(
						__("Default", "avia_framework" ) => "",
						__("Define Custom Colors", "avia_framework" ) => "custom"),
				),

				array(
					"name" 	=> __("Custom Back Background Color", "avia_framework" ),
					"desc" 	=> __("Select a custom font color. Leave empty to use the default", "avia_framework" ),
					"id" 	=> "back_bg_custom_color",
					"type" 	=> "colorpicker",
					"std" 	=> "",
					"container_class" => "av_half av_half_first",
					"required" => array("back_bg_color","equals","custom")
				),

				array(
					"type" 	=> "close_div",
					"nodescription" => true
				),

				array(
					"type" 	=> "close_div",
					"nodescription" => true
				),

			);
		}

		function editor_element($params)
		{
			$heading  = "";
			$template = $this->update_template("heading", " - <strong>{{heading}}</strong>");

			$params['innerHtml'] = "<img src='".$this->config['icon']."' title='".$this->config['name']."' />";
			$params['innerHtml'].= "<div class='avia-element-label'>".$this->config['name']."</div>";
			$params['innerHtml'].= "<div class='avia-element-label' {$template}>".$heading."</div>";
			return $params;
		}

		function editor_sub_element($params)
		{
				$template = $this->update_template("title", "{{title}}");

				$params['innerHtml']  = "";
				$params['innerHtml'] .= "<div class='avia_title_container' {$template}>".$params['args']['title']."</div>";


				return $params;
		}

		function shortcode_handler($atts, $content = "", $shortcodename = "", $meta = "")
		{
			$atts = shortcode_atts(array(
				'content'=> ShortcodeHelper::shortcode2array($content),
				'front_font_color' => '',
				'front_font_custom_color' => '',
				'front_link' => '',
				'front_linktarget' => '',
				'back_font_color' => '',
				'back_font_custom_color' => '',
				'back_bg_color' => '',
				'back_bg_custom_color' => '',
				'back_link' => '',
				'back_linktarget' => '',
				'columns' => 3,
				'class'	=> $meta['el_class'],
				'custom_class' => '',
				'custom_markup' => $meta['custom_markup'],

			), $atts, $this->config['shortcode']);

			if (empty($atts['content'])) return;

			extract($atts);
			$custom_class = $custom_class?" $custom_class":"";

			if(!isset($GLOBALS['flipcard-count'])) {
				$GLOBALS['flipcard-count'] = 0;
			}

			$flipcardInstanceCount = $GLOBALS['flipcard-count']++;
			$flipInstClass = "flipcards-instance-$flipcardInstanceCount";

			// Enqueue VueJS
			wp_enqueue_script('vuejs', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.min.js', array(), '2.4.4');
			
			// Enqueue ic-flipbox component
			wp_enqueue_script('ic-flipbox', plugin_dir_url(__FILE__).'../js/ic-flipbox.min.js', array('vuejs'), '0.0.1', true);
			wp_enqueue_style('ic-flipbox', plugin_dir_url(__FILE__) . '../css/ic-flipbox.min.css');

			// Enqueue js of this component
			wp_enqueue_script('flipcards', plugin_dir_url(__FILE__).'../js/flipcards.js', array('ic-flipbox', 'vuejs'), '0.0.1', true);
			wp_add_inline_script('flipcards', "window.initFlipcardInstance('." . $flipInstClass . "');");

			ob_start();
			?>
			<div class="flipcards-container<?php echo $custom_class . " " . $flipInstClass; ?>">
				<?php foreach($content as $index => $card): ?>
					<?php
					/*
						Creates $title, $content,
						$back_title, $back_content
					 */
					extract($card['attr']);

					// TODO: Add color styles available in attr
					$grid = 'one_third';
					$first = $index==0?' first':'';
					$front_content = $card['content'];
					$front_button_html = "";
					if (!empty($front_link)) {
						$front_blank = (strpos($front_linktarget, '_blank') !== false || $front_linktarget == 'yes') ? ' target="_blank" ' : "";
						$front_blank .= strpos($front_linktarget, 'nofollow') !== false ? ' rel="nofollow" ' : "";

						$front_link = AviaHelper::get_url($front_link);

						$front_button_html .= "<a href='{$front_link}' {$front_blank} class='avia-button avia-color-theme-color avia-size-large avia-position-center'>";
						$front_button_html .= $front_button_label;
						$front_button_html .= "</a>";
					}

					$back_button_html = "";
					if (!empty($back_link)) {
						$back_blank = (strpos($back_linktarget, '_blank') !== false || $back_linktarget == 'yes') ? ' target="_blank" ' : "";
						$back_blank .= strpos($back_linktarget, 'nofollow') !== false ? ' rel="nofollow" ' : "";

						$back_link = AviaHelper::get_url($back_link);

						$back_button_html .= "<a href='{$back_link}' {$back_blank} class='avia-button avia-color-theme-color avia-size-large avia-position-center'>";
						$back_button_html .= $back_button_label;
						$back_button_html .= "</a>";
					}

					switch($columns)
					{
							case "1": $grid = 'av_fullwidth'; break;
							case "2": $grid = 'av_one_half'; break;
							case "3": $grid = 'av_one_third'; break;
							case "4": $grid = 'av_one_fourth'; break;
							case "5": $grid = 'av_one_fifth'; break;
							case "6": $grid = 'av_one_sixth'; break;
					}

					?>
					<div class="flipcard flex_column <?php echo $grid . $first; ?>">
						<ic-flipbox ref="box<?php echo $grid; ?>">
							<div slot="front-content" class="flipcard-front">
								<h3 class="flipcard-title"><?php echo $title; ?></h3>
								<div class="flipcard-content">
									<?php echo ShortcodeHelper::avia_apply_autop(ShortcodeHelper::avia_remove_autop($front_content)); ?>
								</div>
								<div class="flipcard-footer">
									<?php echo $front_button_html; ?>
								</div>
							</div>
							<div slot="back-content" class="flipcard-back">
								<h3 class="flipcard-title"><?php echo $back_title; ?></h3>
								<div class="flipcard-content">
									<?php echo ShortcodeHelper::avia_apply_autop(ShortcodeHelper::avia_remove_autop($back_content)); ?>
								</div>
								<div class="flipcard-footer">
									<?php echo $back_button_html; ?>
								</div>
							</div>
						</ic-flipbox>
					</div>
				<?php endforeach; ?>
			</div>
			<?php
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		}
	}
}
