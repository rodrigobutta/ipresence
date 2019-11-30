<?php
namespace App\Helpers;

class FileHelper
{

	public static function sanitizeFileName($string)
	{

		$noGoChars = array('"',',','!', '%', "'", '&', '/', '\\', '?','@', '#');

		$string = str_replace(' ', '_', $string);

		return str_replace($noGoChars, '', $string);
	}

}
