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
use Assetic\Exception\FilterException;
use Symfony\Component\Process\ProcessBuilder;

/**
 * Filter for the Google Closure Compiler JAR.
 *
 * @link https://developers.google.com/closure/compiler/
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class CompilerJarFilter extends BaseCompilerFilter
{
    private $jarPath;
    private $javaPath;
    private $flagFile;

    public function __construct($jarPath, $javaPath = '/usr/bin/java')
    {
        $this->jarPath = $jarPath;
        $this->javaPath = $javaPath;
    }

    public function setFlagFile($flagFile)
    {
        $this->flagFile = $flagFile;
    }

    public function filterDump(AssetInterface $asset)
    {
        $is64bit = PHP_INT_SIZE === 8;
        $cleanup = array();

        $pb = new ProcessBuilder(array_merge(
            array($this->javaPath),
            $is64bit
                ? array('-server', '-XX:+TieredCompilation')
                : array('-client', '-d32'),
            array('-jar', $this->jarPath)
        ));

        if (null !== $this->timeout) {
            $pb->setTimeout($this->timeout);
        }

        if (null !== $this->compilationLevel) {
            $pb->add('--compilation_level')->add($this->compilationLevel);
        }

        if (null !== $this->jsExterns) {
            $cleanup[] = $externs = tempnam(sys_get_temp_dir(), 'assetic_google_closure_compiler');
            file_put_contents($externs, $this->jsExterns);
            $pb->add('--externs')->add($externs);
        }

        if (null !== $this->externsUrl) {
            $cleanup[] = $externs = tempnam(sys_get_temp_dir(), 'assetic_google_closure_compiler');
            file_put_contents($externs, file_get_contents($this->externsUrl));
            $pb->add('--externs')->add($externs);
        }

        if (null !== $this->excludeDefaultExterns) {
            $pb->add('--use_only_custom_externs');
        }

        if (null !== $this->formatting) {
            $pb->add('--formatting')->add($this->formatting);
        }

        if (null !== $this->useClosureLibrary) {
            $pb->add('--manage_closure_dependencies');
        }

        if (null !== $this->warningLevel) {
            $pb->add('--warning_level')->add($this->warningLevel);
        }

        if (null !== $this->language) {
            $pb->add('--language_in')->add($this->language);
        }

        if (null !== $this->flagFile) {
            $pb->add('--flagfile')->add($this->flagFile);
        }

        $pb->add('--js')->add($cleanup[] = $input = tempnam(sys_get_temp_dir(), 'assetic_google_closure_compiler'));
        file_put_contents($input, $asset->getContent());

        $proc = $pb->getProcess();
        $code = $proc->run();
        array_map('unlink', $cleanup);

        if (0 !== $code) {
            throw FilterException::fromProcess($proc)->setInput($asset->getContent());
        }

        $asset->setContent($proc->getOutput());
    }
}
