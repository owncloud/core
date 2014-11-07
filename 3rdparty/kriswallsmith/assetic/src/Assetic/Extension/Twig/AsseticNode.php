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

use Assetic\Asset\AssetInterface;

class AsseticNode extends \Twig_Node
{
    /**
     * Constructor.
     *
     * Available attributes:
     *
     *  * debug:    The debug mode
     *  * combine:  Whether to combine assets
     *  * var_name: The name of the variable to expose to the body node
     *
     * @param AssetInterface      $asset      The asset
     * @param \Twig_NodeInterface $body       The body node
     * @param array               $inputs     An array of input strings
     * @param array               $filters    An array of filter strings
     * @param string              $name       The name of the asset
     * @param array               $attributes An array of attributes
     * @param integer             $lineno     The line number
     * @param string              $tag        The tag name
     */
    public function __construct(AssetInterface $asset, \Twig_NodeInterface $body, array $inputs, array $filters, $name, array $attributes = array(), $lineno = 0, $tag = null)
    {
        $nodes = array('body' => $body);

        $attributes = array_replace(
            array('debug' => null, 'combine' => null, 'var_name' => 'asset_url'),
            $attributes,
            array('asset' => $asset, 'inputs' => $inputs, 'filters' => $filters, 'name' => $name)
        );

        parent::__construct($nodes, $attributes, $lineno, $tag);
    }

    public function compile(\Twig_Compiler $compiler)
    {
        $compiler->addDebugInfo($this);

        $combine = $this->getAttribute('combine');
        $debug = $this->getAttribute('debug');

        if (null === $combine && null !== $debug) {
            $combine = !$debug;
        }

        if (null === $combine) {
            $compiler
                ->write("if (isset(\$context['assetic']['debug']) && \$context['assetic']['debug']) {\n")
                ->indent()
            ;

            $this->compileDebug($compiler);

            $compiler
                ->outdent()
                ->write("} else {\n")
                ->indent()
            ;

            $this->compileAsset($compiler, $this->getAttribute('asset'), $this->getAttribute('name'));

            $compiler
                ->outdent()
                ->write("}\n")
            ;
        } elseif ($combine) {
            $this->compileAsset($compiler, $this->getAttribute('asset'), $this->getAttribute('name'));
        } else {
            $this->compileDebug($compiler);
        }

        $compiler
            ->write('unset($context[')
            ->repr($this->getAttribute('var_name'))
            ->raw("]);\n")
        ;
    }

    protected function compileDebug(\Twig_Compiler $compiler)
    {
        $i = 0;
        foreach ($this->getAttribute('asset') as $leaf) {
            $leafName = $this->getAttribute('name').'_'.$i++;
            $this->compileAsset($compiler, $leaf, $leafName);
        }
    }

    protected function compileAsset(\Twig_Compiler $compiler, AssetInterface $asset, $name)
    {
        if ($vars = $asset->getVars()) {
            $compiler->write("// check variable conditions\n");

            foreach ($vars as $var) {
                $compiler
                    ->write("if (!isset(\$context['assetic']['vars']['$var'])) {\n")
                    ->indent()
                    ->write("throw new \RuntimeException(sprintf('The asset \"".$name."\" expected variable \"".$var."\" to be set, but got only these vars: %s. Did you set-up a value supplier?', isset(\$context['assetic']['vars']) && \$context['assetic']['vars'] ? implode(', ', \$context['assetic']['vars']) : '# none #'));\n")
                    ->outdent()
                    ->write("}\n")
                ;
            }

            $compiler->raw("\n");
        }

        $compiler
            ->write("// asset \"$name\"\n")
            ->write('$context[')
            ->repr($this->getAttribute('var_name'))
            ->raw('] = ')
        ;

        $this->compileAssetUrl($compiler, $asset, $name);

        $compiler
            ->raw(";\n")
            ->subcompile($this->getNode('body'))
        ;
    }

    protected function compileAssetUrl(\Twig_Compiler $compiler, AssetInterface $asset, $name)
    {
        if (!$vars = $asset->getVars()) {
            $compiler->repr($asset->getTargetPath());

            return;
        }

        $compiler
            ->raw("strtr(")
            ->string($asset->getTargetPath())
            ->raw(", array(");

        $first = true;
        foreach ($vars as $var) {
            if (!$first) {
                $compiler->raw(", ");
            }
            $first = false;

            $compiler
                ->string("{".$var."}")
                ->raw(" => \$context['assetic']['vars']['$var']")
            ;
        }

        $compiler
            ->raw("))")
        ;
    }
}
