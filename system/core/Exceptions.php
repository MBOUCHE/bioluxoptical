<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Exceptions Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Exceptions
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/exceptions.html
 */
class CI_Exceptions {

	/**
	 * Nesting level of the output buffering mechanism
	 *
	 * @var	int
	 */
	public $ob_level;

	/**
	 * List of available error levels
	 *
	 * @var	array
	 */
	public $levels = array(
		E_ERROR			=>	'Error',
		E_WARNING		=>	'Warning',
		E_PARSE			=>	'Parsing Error',
		E_NOTICE		=>	'Notice',
		E_CORE_ERROR		=>	'Core Error',
		E_CORE_WARNING		=>	'Core Warning',
		E_COMPILE_ERROR		=>	'Compile Error',
		E_COMPILE_WARNING	=>	'Compile Warning',
		E_USER_ERROR		=>	'User Error',
		E_USER_WARNING		=>	'User Warning',
		E_USER_NOTICE		=>	'User Notice',
		E_STRICT		=>	'Runtime Notice'
	);

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		$this->ob_level = ob_get_level();
		// Note: Do not log messages from this constructor.
	}

	// --------------------------------------------------------------------

	/**
	 * Exception Logger
	 *
	 * Logs PHP generated error messages
	 *
	 * @param	int	$severity	Log level
	 * @param	string	$message	Error message
	 * @param	string	$filepath	File path
	 * @param	int	$line		Line number
	 * @return	void
	 */
	public function log_exception($severity, $message, $filepath, $line)
	{
		$severity = isset($this->levels[$severity]) ? $this->levels[$severity] : $severity;
		log_message('error', 'Severity: '.$severity.' --> '.$message.' '.$filepath.' '.$line);
	}

	// --------------------------------------------------------------------

	// fonction par ajout de moi meme : copie de config.php

	public function slash_item($item)
	{
		if ( ! isset($this->config[$item]))
		{
			return NULL;
		}
		elseif (trim($this->config[$item]) === '')
		{
			return '';
		}

		return rtrim($this->config[$item], '/').'/';
	}


	protected function _uri_string($uri)
	{
		if ($this->item('enable_query_strings') === FALSE)
		{
			is_array($uri) && $uri = implode('/', $uri);
			return ltrim($uri, '/');
		}
		elseif (is_array($uri))
		{
			return http_build_query($uri);
		}

		return $uri;
	}

	public function item($item, $index = '')
	{
		if ($index == '')
		{
			return isset($this->config[$item]) ? $this->config[$item] : NULL;
		}

		return isset($this->config[$index], $this->config[$index][$item]) ? $this->config[$index][$item] : NULL;
	}


	public function base_url($uri = '', $protocol = NULL)
	{
		$base_url = $this->slash_item('base_url');

		if (isset($protocol))
		{
			// For protocol-relative links
			if ($protocol === '')
			{
				$base_url = substr($base_url, strpos($base_url, '//'));
			}
			else
			{
				$base_url = $protocol.substr($base_url, strpos($base_url, '://'));
			}
		}

		return $base_url.$this->_uri_string($uri);
	}

	// --------------------------------------------------------------------

	/**
	 * 404 Error Handler
	 *
	 * @uses	CI_Exceptions::show_error()
	 *
	 * @param	string	$page		Page URI
	 * @param 	bool	$log_error	Whether to log the error
	 * @return	void
	 */
	public function show_404($page = '', $log_error = TRUE)
	{
		if (is_cli())
		{
			$heading = 'Not Found';
			$message = 'The controller/method pair you requested was not found.';
		}
		else
		{
			$heading = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>BIOLUX OPTICAL | 404</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="'.$this->base_url('assets/img/').'favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="'.$this->base_url('assets/css/').'font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="'.$this->base_url('assets/css/').'bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="'.$this->base_url('assets/css/').'slick.css">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="'.$this->base_url('assets/css/').'jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="'.$this->base_url('assets/css/').'theme-color/default-theme.css" rel="stylesheet">  

    <!-- Main style sheet -->
    <link href="'.$this->base_url('assets/css/').'style.css" rel="stylesheet">    


  </head>
  <body>
  
  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form">
              <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->
 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container" style="text-align: center">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           
	           	<a href="'.$this->base_url('index').'">
	           		<img src="'.$this->base_url('assets/img/').'logo.png" alt="BIOLUX OPTICAL" style="border-radius: 1%; width:80%" />
	        	</a>
           <ol class="breadcrumb" style="font-size: 17px">
            <li><a href="'.$this->base_url('index').'">Acceuil</a></li>            
            <li class="active">404</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

  <!-- Start error section  -->
  <section id="mu-error" style="margin-top: -4%">
    <div class="container">
      <div class="row">
       <div class="col-md-12">
          <div class="mu-error-area" style="font-size: 17px"	>
            <p>Oops! La page sollicitée n\'existe pas !</p>
            <span>La page actuelle indique une indiponibilité, un retrait ou un changement de destination de l\'information recherchée.</span>
            <h2>404</h2>
            <a class="mu-post-btn" href="'.$this->base_url('index').'">Retour à l\'acceuil !</a>
          </div>
        </div>
      </div>
    </div>
  </section>
 <!-- End error section  -->
 ';
			$message = '';
		}

		// By default we log this, but allow a dev to skip it
		if ($log_error)
		{
			log_message('error', $heading.': '.$page);
		}

		echo $this->show_error($heading, $message, 'error_404', 404);
		exit(4); // EXIT_UNKNOWN_FILE
	}

	// --------------------------------------------------------------------

	/**
	 * General Error Page
	 *
	 * Takes an error message as input (either as a string or an array)
	 * and displays it using the specified template.
	 *
	 * @param	string		$heading	Page heading
	 * @param	string|string[]	$message	Error message
	 * @param	string		$template	Template name
	 * @param 	int		$status_code	(default: 500)
	 *
	 * @return	string	Error page output
	 */
	public function show_error($heading, $message, $template = 'error_general', $status_code = 500)
	{
		$templates_path = config_item('error_views_path');
		if (empty($templates_path))
		{
			$templates_path = VIEWPATH.'errors'.DIRECTORY_SEPARATOR;
		}

		if (is_cli())
		{
			$message = "\t".(is_array($message) ? implode("\n\t", $message) : $message);
			$template = 'cli'.DIRECTORY_SEPARATOR.$template;
		}
		else
		{
			set_status_header($status_code);
			$message = '<p>'.(is_array($message) ? implode('</p><p>', $message) : $message).'</p>';
			$template = 'html'.DIRECTORY_SEPARATOR.$template;
		}

		if (ob_get_level() > $this->ob_level + 1)
		{
			ob_end_flush();
		}
		ob_start();
		include($templates_path.$template.'.php');
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}

	// --------------------------------------------------------------------

	public function show_exception($exception)
	{
		$templates_path = config_item('error_views_path');
		if (empty($templates_path))
		{
			$templates_path = VIEWPATH.'errors'.DIRECTORY_SEPARATOR;
		}

		$message = $exception->getMessage();
		if (empty($message))
		{
			$message = '(null)';
		}

		if (is_cli())
		{
			$templates_path .= 'cli'.DIRECTORY_SEPARATOR;
		}
		else
		{
			$templates_path .= 'html'.DIRECTORY_SEPARATOR;
		}

		if (ob_get_level() > $this->ob_level + 1)
		{
			ob_end_flush();
		}

		ob_start();
		include($templates_path.'error_exception.php');
		$buffer = ob_get_contents();
		ob_end_clean();
		echo $buffer;
	}

	// --------------------------------------------------------------------

	/**
	 * Native PHP error handler
	 *
	 * @param	int	$severity	Error level
	 * @param	string	$message	Error message
	 * @param	string	$filepath	File path
	 * @param	int	$line		Line number
	 * @return	void
	 */
	public function show_php_error($severity, $message, $filepath, $line)
	{
		$templates_path = config_item('error_views_path');
		if (empty($templates_path))
		{
			$templates_path = VIEWPATH.'errors'.DIRECTORY_SEPARATOR;
		}

		$severity = isset($this->levels[$severity]) ? $this->levels[$severity] : $severity;

		// For safety reasons we don't show the full file path in non-CLI requests
		if ( ! is_cli())
		{
			$filepath = str_replace('\\', '/', $filepath);
			if (FALSE !== strpos($filepath, '/'))
			{
				$x = explode('/', $filepath);
				$filepath = $x[count($x)-2].'/'.end($x);
			}

			$template = 'html'.DIRECTORY_SEPARATOR.'error_php';
		}
		else
		{
			$template = 'cli'.DIRECTORY_SEPARATOR.'error_php';
		}

		if (ob_get_level() > $this->ob_level + 1)
		{
			ob_end_flush();
		}
		ob_start();
		include($templates_path.$template.'.php');
		$buffer = ob_get_contents();
		ob_end_clean();
		echo $buffer;
	}

}
