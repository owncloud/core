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

use Assetic\Factory\AssetFactory;
use Assetic\ValueSupplierInterface;

class AsseticExtension extends \Twig_Extension
{
    protected $factory;
    protected $functions;
    protected $valueSupplier;

    public function __construct(AssetFactory $factory, $functions = array(), ValueSupplierInterface $valueSupplier = null)
    {
        $this->factory = $factory;
        $this->functions = array();
        $this->valueSupplier = $valueSupplier;

        foreach ($functions as $function => $options) {
            if (is_integer($function) && is_string($options)) {
                $this->functions[$options] = array('filter' => $options);
            } else {
                $this->functions[$function] = $options + array('filter' => $function);
            }
        }
    }

    public function getTokenParsers()
    {
        return array(
            new AsseticTokenParser($this->factory, 'javascripts', 'js/*.js'),
            new AsseticTokenParser($this->factory, 'stylesheets', 'css/*.css'),
            new AsseticTokenParser($this->factory, 'image', 'images/*', true),
        );
    }

    public function getFunctions()
    {
        $functions = array();
        foreach ($this->functions as $function => $filter) {
            $functions[$function] = new AsseticFilterFunction($function);
        }

        return $functions;
    }

    public function getGlobals()
    {
        return array(
            'assetic' => array(
                'debug' => $this->factory->isDebug(),
                'vars'  => null !== $this->valueSupplier ? new ValueContainer($this->valueSupplier) : array(),
            ),
        );
    }

    public function getFilterInvoker($function)
    {
        return new AsseticFilterInvoker($this->factory, $this->functions[$function]);
    }

    public function getName()
    {
        return 'assetic';
    }
}
