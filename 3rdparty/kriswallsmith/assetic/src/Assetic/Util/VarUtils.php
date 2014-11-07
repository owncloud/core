<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Util;

/**
 * Variable utilities.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
abstract class VarUtils
{
    /**
     * Resolves variable placeholders.
     *
     * @param string $template A template string
     * @param array  $vars     Variable names
     * @param array  $values   Variable values
     *
     * @return string The resolved string
     *
     * @throws \InvalidArgumentException If there is a variable with no value
     */
    public static function resolve($template, array $vars, array $values)
    {
        $map = array();
        foreach ($vars as $var) {
            if (false === strpos($template, '{'.$var.'}')) {
                continue;
            }

            if (!isset($values[$var])) {
                throw new \InvalidArgumentException(sprintf('The template "%s" contains the variable "%s", but was not given any value for it.', $template, $var));
            }

            $map['{'.$var.'}'] = $values[$var];
        }

        return strtr($template, $map);
    }

    public static function getCombinations(array $vars, array $values)
    {
        if (!$vars) {
            return array(array());
        }

        $combinations = array();
        $nbValues = array();
        foreach ($values as $var => $vals) {
            if (!in_array($var, $vars, true)) {
                continue;
            }

            $nbValues[$var] = count($vals);
        }

        for ($i = array_product($nbValues), $c = $i * 2; $i < $c; $i++) {
            $k = $i;
            $combination = array();

            foreach ($vars as $var) {
                $combination[$var] = $values[$var][$k % $nbValues[$var]];
                $k = intval($k / $nbValues[$var]);
            }

            $combinations[] = $combination;
        }

        return $combinations;
    }

    final private function __construct()
    {
    }
}
