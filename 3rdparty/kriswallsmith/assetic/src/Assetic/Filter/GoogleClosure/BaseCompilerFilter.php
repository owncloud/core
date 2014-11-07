<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Filter\GoogleClosure;

use Assetic\Asset\AssetInterface;
use Assetic\Filter\FilterInterface;

/**
 * Base filter for the Google Closure Compiler implementations.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
abstract class BaseCompilerFilter implements FilterInterface
{
    // compilation levels
    const COMPILE_WHITESPACE_ONLY = 'WHITESPACE_ONLY';
    const COMPILE_SIMPLE_OPTIMIZATIONS = 'SIMPLE_OPTIMIZATIONS';
    const COMPILE_ADVANCED_OPTIMIZATIONS = 'ADVANCED_OPTIMIZATIONS';

    // formatting modes
    const FORMAT_PRETTY_PRINT = 'pretty_print';
    const FORMAT_PRINT_INPUT_DELIMITER = 'print_input_delimiter';

    // warning levels
    const LEVEL_QUIET = 'QUIET';
    const LEVEL_DEFAULT = 'DEFAULT';
    const LEVEL_VERBOSE = 'VERBOSE';

    // languages
    const LANGUAGE_ECMASCRIPT3 = 'ECMASCRIPT3';
    const LANGUAGE_ECMASCRIPT5 = 'ECMASCRIPT5';
    const LANGUAGE_ECMASCRIPT5_STRICT = 'ECMASCRIPT5_STRICT';

    protected $timeout;
    protected $compilationLevel;
    protected $jsExterns;
    protected $externsUrl;
    protected $excludeDefaultExterns;
    protected $formatting;
    protected $useClosureLibrary;
    protected $warningLevel;
    protected $language;

    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    public function setCompilationLevel($compilationLevel)
    {
        $this->compilationLevel = $compilationLevel;
    }

    public function setJsExterns($jsExterns)
    {
        $this->jsExterns = $jsExterns;
    }

    public function setExternsUrl($externsUrl)
    {
        $this->externsUrl = $externsUrl;
    }

    public function setExcludeDefaultExterns($excludeDefaultExterns)
    {
        $this->excludeDefaultExterns = $excludeDefaultExterns;
    }

    public function setFormatting($formatting)
    {
        $this->formatting = $formatting;
    }

    public function setUseClosureLibrary($useClosureLibrary)
    {
        $this->useClosureLibrary = $useClosureLibrary;
    }

    public function setWarningLevel($warningLevel)
    {
        $this->warningLevel = $warningLevel;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function filterLoad(AssetInterface $asset)
    {
    }
}
