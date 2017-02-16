<?php

namespace Spotlab\Helper;

use Symfony\Component\Intl\Locale;


class SpotlabHelper
{
	const NATIONALITY_DIR = 'nationalities';

	public static function getNationalities($displayLocale = null)
	{
		$locale = SpotlabHelper::getLocale($displayLocale);

		$nationalities = SpotlabHelper::getData(SpotlabHelper::NATIONALITY_DIR, $locale);

		asort($nationalities);

		return array_flip($nationalities);
	}

	public static function getNationality($nationalityCode, $displayLocale = null)
	{
		$locale = SpotlabHelper::getLocale($displayLocale);

		$nationalities = SpotlabHelper::getData(SpotlabHelper::NATIONALITY_DIR, $locale);

		if (!isset($nationalities[$nationalityCode])) {
			throw new \Exception('No nationality for code '.$nationalityCode);
		}

		return $nationalities[$nationalityCode];
	}


	public static function getData($type, $locale)
	{
		$nationalityFile = SpotlabHelper::getDataDirectory().'/'.$type.'/'.$locale.'.json';
		if (!file_exists($nationalityFile)) {
			throw new \Exception('Nationality file does not exist for locale '.$locale);
		}

		return json_decode(file_get_contents($nationalityFile), true);
	}

	public static function getDataDirectory()
    {
        return __DIR__.'/Resources/data';
    }

    public static function getLocale($displayLocale = null)
    {
    	if (empty($displayLocale)) {
			return Locale::getDefault();
		}
		else {
			return $displayLocale;
		}
    }
}