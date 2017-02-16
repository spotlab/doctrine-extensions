<?php

namespace Spotlab\Helper;

use Symfony\Component\Intl\Locale;


class SpotlabHelper
{
	const NATIONALITY_DIR = 'nationalities';

	public static function getNationalities($displayLocale = null)
	{
		if (empty($displayLocale)) {
			$locale = Locale::getDefault();
		}
		else {
			$locale = $displayLocale;
		}

		$nationalityFile = SpotlabHelper::getDataDirectory().'/'.SpotlabHelper::NATIONALITY_DIR.'/'.$locale.'.json';
		if (!file_exists($nationalityFile)) {
			throw new \Exception('Nationality file does not exist for locale '.$locale);
		}

		$nationalities = json_decode(file_get_contents($nationalityFile), true);

		asort($nationalities);

		return array_flip($nationalities);
	}

	public static function getDataDirectory()
    {
        return __DIR__.'/Resources/data';
    }
}