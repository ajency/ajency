<?php  if ( ! defined('AVIA_FW')) exit('No direct script access allowed');
/**
 * This file holds the class that creates styles for the theme based on the backend options
 *
 *
 * @author		Ajency.in
 * @copyright	Copyright (c) Lokus
 * @link		http://ajency.in
 * @link		http://aviathemes.com
 * @since		Version 1.0
 * @package 	AviaFramework
 */

/**
 *
 */


if( !class_exists( 'avia_style_generator' ) )
{


	/**
	 *  The avia_style_generator class holds all methods necessary to create and overwrite the default css styles with those set in the wordpress backend
	 *  @package 	AviaFramework
	 */
 
	class avia_style_generator
	{
	
		/**
		 * This array hold all styledata defined for the theme that should be overwriten dynamically
		 * @var array
		 */
		var $rules;
		
		/**
		 * $output contains the html string that is printed in the frontend
		 * @var string
		 */
		var $output = "";
		
		/**
		 * $extra_output contains html content that should be printed after the actual css rules. for example a javascript with cufon rules
		 * @var string
		 */
		var $extra_output = "";
		var $webfont_count = 1;
	
		function avia_style_generator(&$avia_superobject)
		{
			add_action('wp_head',array(&$this, 'create_styles'),1000);
		}
		
		
		function create_styles()
		{
			global $avia_config;
			if(!isset($avia_config['font_stack'])) $avia_config['font_stack'] = "";
			if(!isset($avia_config['style'])) return;
			
			$avia_config['style'] = apply_filters('avia_style_filter',$avia_config['style']);
			$this->rules = $avia_config['style'];
			
			if(is_array($this->rules))
			{
			
				foreach($this->rules as $rule)
				{
					
					//check if a executing method was passed, if not simply put the string together based on the key and value array
					if(isset($rule['key']) && method_exists($this, $rule['key']) && $rule['value'] != "")
					{
						$this->output .= $this->$rule['key']($rule)."\n";
					}
					else if($rule['value'] != "")
					{
						$this->output .= $rule['elements']."{\n".$rule['key'].":".$rule['value'].";\n}\n\n";
					}
					
				}
				
				if($this->output != "") $this->print_styles();
			}
		}
		
		
		
		
		function print_styles()
		{
			echo "\n<!-- custom styles set at your backend-->\n";
			echo "<style type='text/css' id='dynamic-styles'>\n";
			echo $this->output;
			echo "</style>\n";
			echo "\n<!-- end custom styles-->\n\n";
			echo $this->extra_output;
		}
		

		
		function cufon($rule)
		{
			$rule_split = explode('__',$rule['value']);
			if(!isset($rule_split[1])) $rule_split[1] = 1;
			$this->extra_output .= "\n<!-- cufon font replacement -->\n";
			$this->extra_output .= "<script type='text/javascript' src='".AVIA_JS_URL."fonts/cufon.js'></script>\n";
			$this->extra_output .= "<script type='text/javascript' src='".AVIA_JS_URL."fonts/".$rule_split[0].".font.js'></script>\n";
			$this->extra_output .= "<script type='text/javascript'>\n\tvar avia_cufon_size_mod = '".$rule_split[1]."'; \n\tCufon.replace('".$rule['elements']."',{  fontFamily: 'cufon', hover:'true' }); \n</script>\n";
		}
		
		function google_webfont($rule)
		{
			global $avia_config;
		
			$rule_split = explode('__',$rule['value']);
			if(!isset($rule_split[1])) $rule_split[1] = 1;
			
			if(strpos($rule_split[0], 'websave') !== false)
			{
				
				$rule_split = explode(',',$rule_split[0]);
				$rule_split = strtolower(" ".$rule_split[0]);
				$rule_split = str_replace('"','',$rule_split);
				$rule_split = str_replace("'",'',$rule_split);
				$rule_split = str_replace("-websave",'',$rule_split);
				
				$avia_config['font_stack'] .= $rule_split.'-websave';
				return;
			}
		
			$this->extra_output .= "\n<!-- google webfont font replacement -->\n";
			//$this->extra_output .= '<link id="google_webfont_'.$this->webfont_count.'" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.str_replace(' ','+',$rule_split[0]).'" />';
			
			$this->webfont_count++;
			$this->output .= $rule['elements']."{\nfont-family:".$rule_split[0].";\n}\n\n";
			if($rule_split[1] !== 1) $this->output .= $rule['elements']."{\nfont-size:".$rule_split[1]."em;\n}\n\n";
		}
		
		function direct_input($rule)
		{
			return $rule['value'];
		}
		
		function backgroundImage($rule)
		{
			return $rule['elements']."{\nbackground-image:url(".$rule['value'].");\n}\n\n";
		}
		
		
	}
}


