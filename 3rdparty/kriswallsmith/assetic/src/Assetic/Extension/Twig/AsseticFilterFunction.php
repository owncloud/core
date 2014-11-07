<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Extension\Twig;

class AsseticFilterFunction extends \Twig_Function
{
    private $filter;

    public function __construct($filter, $options = array())
    {
        $this->filter = $filter;

        parent::__construct($options);
    }

    public function compile()
    {
        return sprintf('$this->env->getExtension(\'assetic\')->getFilterInvoker(\'%s\')->invoke', $this->filter);
    }
}
