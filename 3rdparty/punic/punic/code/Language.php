<?php
namespace Punic;

/**
 * Language-related stuff
 */
class Language
{

    /**
     * Retrieve the name of a language
     * @param string $languageCode The language code. If it contails also a terrotory code (eg: 'en-US'), the result will contain also the territory code (eg 'English (United States)')
     * @param string $locale = '' The locale to use. If empty we'll use the default locale set in \Punic\Data
     * @return string Returns the localized language name (returns $languageCode if not found)
     */
    public static function getName($languageCode, $locale = '')
    {
        $result = $languageCode;
        $info = Data::explodeLocale($languageCode);
        if (!is_null($info)) {
            extract($info);
            $lookFor = array();
            if (strlen($script)) {
                if (strlen($territory)) {
                    $lookFor[] = "$language-$script-$territory";
                }
                $lookFor[] = "$language-$script";
            } elseif (strlen($territory)) {
                $lookFor[] = "$language-$territory";
            }
            $lookFor[] = $language;
            $data = Data::get('languages', $locale);
            foreach ($lookFor as $key) {
                if (array_key_exists($key, $data)) {
                    $result = $data[$key];
                    break;
                }
            }
            if (strlen($territory)) {
                $territoryName = Territory::getName($territory, $locale);
                if (strlen($territoryName)) {
                    $patternData = Data::get('localeDisplayNames');
                    $pattern = $patternData['localeDisplayPattern']['localePattern'];
                    $result = sprintf($pattern, $result, $territoryName);
                }
            }
        }

        return $result;
    }
}
