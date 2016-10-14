<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Lang extends CI_Lang
{
	/**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
	public function __construct()
	{
		parent::__construct();
	}
	
	// ------------------------------------------------------------------------

    /**
     * 重写lang加载
     *
     * @access  public
     * @return  void
     */
	public function lang_load($langfile, $idiom = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '')
	{	

		if (is_array($langfile))
		{
			foreach ($langfile as $value)
			{
				$this->load($value, $idiom, $return, $add_suffix, $alt_path);
			}

			return;
		}

		$langfile = str_replace('.php', '', $langfile);

		if ($add_suffix === TRUE)
		{
			$langfile = preg_replace('/_lang$/', '', $langfile).'_lang';
		}

		$langfile .= '.php';

		if (empty($idiom) OR ! preg_match('/^[a-z_-]+$/i', $idiom))
		{
			$config =& get_config();
			$idiom = empty($config['language']) ? 'english' : $config['language'];
		}

		if ($return === FALSE && isset($this->is_loaded[$langfile]) && $this->is_loaded[$langfile] === $idiom)
		{
			return;
		}

		// Load the base file, so any others found can override it
		$basepath = FCPATH.'language/'.$idiom.'/'.$langfile;
		if (($found = file_exists($basepath)) === TRUE)
		{
			include($basepath);
			$found = TRUE;
		}

		// Do we have an alternative path to look in?

		if ($found !== TRUE)
		{	
			show_error('Unable to load the requested language file: language/'.$idiom.'/'.$langfile);
		}

		if ( ! isset($lang) OR ! is_array($lang))
		{
			log_message('error', 'Language file contains no data: language/'.$idiom.'/'.$langfile);

			if ($return === TRUE)
			{
				return array();
			}
			return;
		}

		if ($return === TRUE)
		{
			return $lang;
		}

		$this->is_loaded[$langfile] = $idiom;
		$this->language = array_merge($this->language, $lang);

		log_message('info', 'Language file loaded: language/'.$idiom.'/'.$langfile);
		return TRUE;
	}
	
	// ------------------------------------------------------------------------

}

function CI()
{
    $CI = & get_instance();
    return $CI;
}

/* End of file Dili_Loader.php */
/* Location: ./admin/core/Dili_Loader.php */