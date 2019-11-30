<?php
namespace App\Helpers;

class FileHelper
{

	public static function sanitizeFileName($string)
	{

		$noGoChars = array(" ", '"', "'", "&", "/", "\\", "?", "#");

		return str_replace($noGoChars, '_', $string);
	}

}
