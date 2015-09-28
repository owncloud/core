<?php

/**
 * Copyright (c) 2010-2014 OpenSky Project Inc
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:

 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.

 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * This file is just a copy of Assetic's JSqueezeFilter following
 * https://github.com/kriswallsmith/assetic/pull/698, with the class
 * renamed to JSqueeze2Filter, namespace changed, and use statements
 * adjusted. It can be dropped as soon as OC's bundled Assetic is updated
 * to a version containing the JSqueezeFilter that works with JSqueeze 2.x.
 */

namespace OC\Assetic;

use Assetic\Filter\FilterInterface;
use Assetic\Asset\AssetInterface;

/**
 * JSqueeze filter.
 *
 * @link https://github.com/nicolas-grekas/JSqueeze
 * @author Nicolas Grekas <p@tchwork.com>
 */
class JSqueeze2Filter implements FilterInterface
{
    private $singleLine = true;
    private $keepImportantComments = true;
    private $className;
    private $specialVarRx = false;
    private $defaultRx;

    public function __construct()
    {
        // JSqueeze is namespaced since 2.x, this works with both 1.x and 2.x
        if (class_exists('\\Patchwork\\JSqueeze')) {
            $this->className = '\\Patchwork\\JSqueeze';
            $this->defaultRx = \Patchwork\JSqueeze::SPECIAL_VAR_PACKER;
        } else {
            $this->className = '\\JSqueeze';
            $this->defaultRx = \JSqueeze::SPECIAL_VAR_RX;
        }
    }

    public function setSingleLine($bool)
    {
        $this->singleLine = (bool) $bool;
    }

    // call setSpecialVarRx(true) to enable global var/method/property
    // renaming with the default regex (for 1.x or 2.x)
    public function setSpecialVarRx($specialVarRx)
    {
        if (true === $specialVarRx) {
            $this->specialVarRx = $this->defaultRx;
        } else {
            $this->specialVarRx = $specialVarRx;
        }
    }

    public function keepImportantComments($bool)
    {
        $this->keepImportantComments = (bool) $bool;
    }

    public function filterLoad(AssetInterface $asset)
    {
    }

    public function filterDump(AssetInterface $asset)
    {
        $parser = new $this->className();
        $asset->setContent($parser->squeeze(
            $asset->getContent(),
            $this->singleLine,
            $this->keepImportantComments,
            $this->specialVarRx
        ));
    }
}
