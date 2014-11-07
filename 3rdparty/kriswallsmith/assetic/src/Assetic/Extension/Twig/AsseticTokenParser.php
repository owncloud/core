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
use Assetic\Factory\AssetFactory;

class AsseticTokenParser extends \Twig_TokenParser
{
    private $factory;
    private $tag;
    private $output;
    private $single;
    private $extensions;

    /**
     * Constructor.
     *
     * Attributes can be added to the tag by passing names as the options
     * array. These values, if found, will be passed to the factory and node.
     *
     * @param AssetFactory $factory    The asset factory
     * @param string       $tag        The tag name
     * @param string       $output     The default output string
     * @param Boolean      $single     Whether to force a single asset
     * @param array        $extensions Additional attribute names to look for
     */
    public function __construct(AssetFactory $factory, $tag, $output, $single = false, array $extensions = array())
    {
        $this->factory    = $factory;
        $this->tag        = $tag;
        $this->output     = $output;
        $this->single     = $single;
        $this->extensions = $extensions;
    }

    public function parse(\Twig_Token $token)
    {
        $inputs = array();
        $filters = array();
        $name = null;
        $attributes = array(
            'output'   => $this->output,
            'var_name' => 'asset_url',
            'vars'     => array(),
        );

        $stream = $this->parser->getStream();
        while (!$stream->test(\Twig_Token::BLOCK_END_TYPE)) {
            if ($stream->test(\Twig_Token::STRING_TYPE)) {
                // '@jquery', 'js/src/core/*', 'js/src/extra.js'
                $inputs[] = $stream->next()->getValue();
            } elseif ($stream->test(\Twig_Token::NAME_TYPE, 'filter')) {
                // filter='yui_js'
                $stream->next();
                $stream->expect(\Twig_Token::OPERATOR_TYPE, '=');
                $filters = array_merge($filters, array_filter(array_map('trim', explode(',', $stream->expect(\Twig_Token::STRING_TYPE)->getValue()))));
            } elseif ($stream->test(\Twig_Token::NAME_TYPE, 'output')) {
                // output='js/packed/*.js' OR output='js/core.js'
                $stream->next();
                $stream->expect(\Twig_Token::OPERATOR_TYPE, '=');
                $attributes['output'] = $stream->expect(\Twig_Token::STRING_TYPE)->getValue();
            } elseif ($stream->test(\Twig_Token::NAME_TYPE, 'name')) {
                // name='core_js'
                $stream->next();
                $stream->expect(\Twig_Token::OPERATOR_TYPE, '=');
                $name = $stream->expect(\Twig_Token::STRING_TYPE)->getValue();
            } elseif ($stream->test(\Twig_Token::NAME_TYPE, 'as')) {
                // as='the_url'
                $stream->next();
                $stream->expect(\Twig_Token::OPERATOR_TYPE, '=');
                $attributes['var_name'] = $stream->expect(\Twig_Token::STRING_TYPE)->getValue();
            } elseif ($stream->test(\Twig_Token::NAME_TYPE, 'debug')) {
                // debug=true
                $stream->next();
                $stream->expect(\Twig_Token::OPERATOR_TYPE, '=');
                $attributes['debug'] = 'true' == $stream->expect(\Twig_Token::NAME_TYPE, array('true', 'false'))->getValue();
            } elseif ($stream->test(\Twig_Token::NAME_TYPE, 'combine')) {
                // combine=true
                $stream->next();
                $stream->expect(\Twig_Token::OPERATOR_TYPE, '=');
                $attributes['combine'] = 'true' == $stream->expect(\Twig_Token::NAME_TYPE, array('true', 'false'))->getValue();
            } elseif ($stream->test(\Twig_Token::NAME_TYPE, 'vars')) {
                // vars=['locale','browser']
                $stream->next();
                $stream->expect(\Twig_Token::OPERATOR_TYPE, '=');
                $stream->expect(\Twig_Token::PUNCTUATION_TYPE, '[');

                while ($stream->test(\Twig_Token::STRING_TYPE)) {
                    $attributes['vars'][] = $stream->expect(\Twig_Token::STRING_TYPE)->getValue();

                    if (!$stream->test(\Twig_Token::PUNCTUATION_TYPE, ',')) {
                        break;
                    }

                    $stream->next();
                }

                $stream->expect(\Twig_Token::PUNCTUATION_TYPE, ']');
            } elseif ($stream->test(\Twig_Token::NAME_TYPE, $this->extensions)) {
                // an arbitrary configured attribute
                $key = $stream->next()->getValue();
                $stream->expect(\Twig_Token::OPERATOR_TYPE, '=');
                $attributes[$key] = $stream->expect(\Twig_Token::STRING_TYPE)->getValue();
            } else {
                $token = $stream->getCurrent();
                throw new \Twig_Error_Syntax(sprintf('Unexpected token "%s" of value "%s"', \Twig_Token::typeToEnglish($token->getType(), $token->getLine()), $token->getValue()), $token->getLine());
            }
        }

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        $body = $this->parser->subparse(array($this, 'testEndTag'), true);

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        if ($this->single && 1 < count($inputs)) {
            $inputs = array_slice($inputs, -1);
        }

        if (!$name) {
            $name = $this->factory->generateAssetName($inputs, $filters, $attributes);
        }

        $asset = $this->factory->createAsset($inputs, $filters, $attributes + array('name' => $name));

        return $this->createNode($asset, $body, $inputs, $filters, $name, $attributes, $token->getLine(), $this->getTag());
    }

    public function getTag()
    {
        return $this->tag;
    }

    public function testEndTag(\Twig_Token $token)
    {
        return $token->test(array('end'.$this->getTag()));
    }

    protected function createNode(AssetInterface $asset, \Twig_NodeInterface $body, array $inputs, array $filters, $name, array $attributes = array(), $lineno = 0, $tag = null)
    {
        return new AsseticNode($asset, $body, $inputs, $filters, $name, $attributes, $lineno, $tag);
    }
}
