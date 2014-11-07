<?php
namespace Punic;

/**
 * Territory-related stuff
 */
class Territory
{

    /**
     * Retrieve the name of a territory (country, continent, ...)
     * @param string $territoryCode The territory code
     * @param string $locale = '' The locale to use. If empty we'll use the default locale set in \Punic\Data
     * @return string Returns the localized territory name (returns $territoryCode if not found)
     */
    public static function getName($territoryCode, $locale = '')
    {
        $result = $territoryCode;
        if (preg_match('/^[a-z0-9]{2,3}$/i', $territoryCode)) {
            $territoryCode = strtoupper($territoryCode);
            $data = Data::get('territories', $locale);
            if (array_key_exists($territoryCode, $data)) {
                $result = $data[$territoryCode];
            }
        }

        return $result;
    }

    /**
     * Return the list of continents in the form of an array with key=ID, value=name
     * @param string $locale = '' The locale to use. If empty we'll use the default locale set in \Punic\Data
     * @return array
     */
    public static function getContinents($locale = '')
    {
        return static::getList('C', $locale);
    }

    /**
     * Return the list of countries in the form of an array with key=ID, value=name
     * @param string $locale = '' The locale to use. If empty we'll use the default locale set in \Punic\Data
     * @return array
     */
    public static function getCountries($locale = '')
    {
        return static::getList('c', $locale);
    }

    /**
     * Return a list of continents and relative countries. The resulting array is in the following form (JSON representation):
     * <code>
     * {
     *     "002": {
     *         "name": "Africa",
     *         "children": {
     *             "DZ": {"name": "Algeria"},
     *             "AO": {"name": "Angola"},
     *             ...
     *         }
     *     },
     *     "150": {
     *         "name": "Europe",
     *         "children": {
     *             "AL": {"name": "Albania"},
     *             "AD": {"name": "Andorra"},
     *             ...
     *         }
     *     }
     *     ...
     * }
     * </code>
     * The arrays are sorted by territory name
     * @param string $locale = '' The locale to use. If empty we'll use the default locale set in \Punic\Data
     * @return array
     */
    public static function getContinentsAndCountries($locale = '')
    {
        return static::getList('Cc', $locale);
    }

    /**
     * Return a list of some specified territory, structured or not.
     * $levels control which data you want to retrieve. It can be one or more of the following values:
     * <ul>
     *     <li>'W': world</li>
     *     <li>'C': continents</li>
     *     <li>'S': sub-continents</li>
     *     <li>'c': countries</li>
     * </ul>
     * If only one level is specified you'll get a flat list (like the one returned by {@link getContinents}).
     * If one or more levels are specified, you'll get a structured list (like the one returned by {@link getContinentsAndCountries}).
     * @param string $levels A string with one or more of the characters: 'W' (for world), 'C' (for continents), 'S' (for sub-continents), 'c' (for countries)
     * @param string $locale = '' The locale to use. If empty we'll use the default locale set in \Punic\Data
     * @return array
     * @link http://www.unicode.org/cldr/charts/latest/supplemental/territory_containment_un_m_49.html
     */
    public static function getList($levels = 'W', $locale = '')
    {
        static $levelMap = array('W' => 0, 'C' => 1, 'S' => 2, 'c' => 3);
        $decodedLevels = array();
        $n = is_string($levels) ? strlen($levels) : 0;
        if ($n > 0) {
            for ($i = 0; $i < $n; $i++) {
                $l = substr($levels, $i, 1);
                if (!array_key_exists($l, $levelMap)) {
                    $decodedLevels = array();
                    break;
                }
                if (!in_array($levelMap[$l], $decodedLevels, true)) {
                    $decodedLevels[] = $levelMap[$l];
                }
            }
        }
        if (count($decodedLevels) === 0) {
            throw new \Punic\Exception\BadArgumentType($levels, "list of territory kinds: it should be a list of one or more of the codes '" . implode("', '", array_keys($levelMap)) . "'");
        }
        $struct = self::filterStructure(self::getStructure(), $decodedLevels, 0);
        $flatList = (count($decodedLevels) > 1) ? false : true;
        $finalized = self::finalizeWithNames(Data::get('territories', $locale), $struct, $flatList);

        if ($flatList) {
            natcasesort($finalized);
        } else {
            $finalized = static::sort($finalized);
        }

        return $finalized;
    }

    protected static function getStructure()
    {
        static $cache = null;
        if (is_null($cache)) {
            $data = Data::getGeneric('territoryContainment');
            $result = static::fillStructure($data, '001', 0);
            $cache = $result;
        } else {
            $result = $cache;
        }

        return $result;
    }

    protected static function fillStructure($data, $id, $level)
    {
        $item = array('id' => $id, 'level' => $level, 'children' => array());
        if (array_key_exists($id, $data)) {
            foreach ($data[$id]['contains'] as $childID) {
                $item['children'][] = static::fillStructure($data, $childID, $level + 1);
            }
        }

        return $item;
    }

    protected static function finalizeWithNames($data, $list, $flatList)
    {
        $result = array();
        foreach ($list as $item) {
            $name = $data[$item['id']];
            if ($flatList) {
                $result[$item['id']] = $name;
            } else {
                $result[$item['id']] = array('name' => $name);
                if (count($item['children']) > 0) {
                    $result[$item['id']]['children'] = static::finalizeWithNames($data, $item['children'], $flatList);
                }
            }
        }

        return $result;
    }

    protected static function filterStructure($parent, $levels)
    {
        $thisResult = array();
        if (in_array($parent['level'], $levels, true)) {
            $thisResult[0] = $parent;
            $thisResult[0]['children'] = array();
            $addToSub = true;
        } else {
            $addToSub = false;
        }

        $subList = array();
        foreach ($parent['children'] as $child) {
            $subList = array_merge($subList, static::filterStructure($child, $levels));
        }
        if ($addToSub) {
            $thisResult[0]['children'] = $subList;
        } else {
            $thisResult = $subList;
        }

        return $thisResult;
    }

    protected static function sort($list)
    {
        foreach (array_keys($list) as $i) {
            if (array_key_exists('children', $list[$i])) {
                $list[$i]['children'] = static::sort($list[$i]['children']);
            }
        }
        uasort($list, function ($a, $b) {
            return strcasecmp($a['name'], $b['name']);
        });

        return $list;
    }

}
