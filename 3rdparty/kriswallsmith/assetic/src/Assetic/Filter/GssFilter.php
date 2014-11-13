<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Filter;

use Assetic\Asset\AssetInterface;
use Assetic\Exception\FilterException;

/**
 * Filter for the Google Closure Stylesheets Compiler JAR.
 *
 * @link http://code.google.com/p/closure-stylesheets/
 * @author Matthias Krauser <matthias@krauser.eu>
 */
class GssFilter extends BaseProcessFilter
{
    private $jarPath;
    private $javaPath;
    private $allowUnrecognizedFunctions;
    private $allowedNonStandardFunctions;
    private $copyrightNotice;
    private $define;
    private $gssFunctionMapProvider;
    private $inputOrientation;
    private $outputOrientation;
    private $prettyPrint;

    public function __construct($jarPath, $javaPath = '/usr/bin/java')
    {
        $this->jarPath = $jarPath;
        $this->javaPath = $javaPath;
    }

    public function setAllowUnrecognizedFunctions($allowUnrecognizedFunctions)
    {
        $this->allowUnrecognizedFunctions = $allowUnrecognizedFunctions;
    }

    public function setAllowedNonStandardFunctions($allowNonStandardFunctions)
    {
        $this->allowedNonStandardFunctions = $allowNonStandardFunctions;
    }

    public function setCopyrightNotice($copyrightNotice)
    {
        $this->copyrightNotice = $copyrightNotice;
    }

    public function setDefine($define)
    {
        $this->define = $define;
    }

    public function setGssFunctionMapProvider($gssFunctionMapProvider)
    {
        $this->gssFunctionMapProvider = $gssFunctionMapProvider;
    }

    public function setInputOrientation($inputOrientation)
    {
        $this->inputOrientation = $inputOrientation;
    }

    public function setOutputOrientation($outputOrientation)
    {
        $this->outputOrientation = $outputOrientation;
    }

    public function setPrettyPrint($prettyPrint)
    {
        $this->prettyPrint = $prettyPrint;
    }

    public function filterLoad(AssetInterface $asset)
    {
        $cleanup = array();

        $pb = $this->createProcessBuilder(array(
            $this->javaPath,
            '-jar',
            $this->jarPath,
        ));

        if (null !== $this->allowUnrecognizedFunctions) {
            $pb->add('--allow-unrecognized-functions');
        }

        if (null !== $this->allowedNonStandardFunctions) {
            $pb->add('--allowed_non_standard_functions')->add($this->allowedNonStandardFunctions);
        }

        if (null !== $this->copyrightNotice) {
            $pb->add('--copyright-notice')->add($this->copyrightNotice);
        }

        if (null !== $this->define) {
            $pb->add('--define')->add($this->define);
        }

        if (null !== $this->gssFunctionMapProvider) {
            $pb->add('--gss-function-map-provider')->add($this->gssFunctionMapProvider);
        }

        if (null !== $this->inputOrientation) {
            $pb->add('--input-orientation')->add($this->inputOrientation);
        }

        if (null !== $this->outputOrientation) {
            $pb->add('--output-orientation')->add($this->outputOrientation);
        }

        if (null !== $this->prettyPrint) {
            $pb->add('--pretty-print');
        }

        $pb->add($cleanup[] = $input = tempnam(sys_get_temp_dir(), 'assetic_google_closure_stylesheets_compiler'));
        file_put_contents($input, $asset->getContent());

        $proc = $pb->getProcess();
        $code = $proc->run();
        array_map('unlink', $cleanup);

        if (0 !== $code) {
            throw FilterException::fromProcess($proc)->setInput($asset->getContent());
        }

        $asset->setContent($proc->getOutput());
    }

    public function filterDump(AssetInterface $asset)
    {
    }
}
