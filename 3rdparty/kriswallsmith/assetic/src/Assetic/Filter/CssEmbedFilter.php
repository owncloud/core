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
use Assetic\Factory\AssetFactory;

/**
 * CSSEmbed filter
 *
 * @link https://github.com/nzakas/cssembed
 * @author Maxime Thirouin <maxime.thirouin@gmail.com>
 */
class CssEmbedFilter extends BaseProcessFilter implements DependencyExtractorInterface
{
    private $jarPath;
    private $javaPath;
    private $charset;
    private $mhtml; // Enable MHTML mode.
    private $mhtmlRoot; // Use <root> as the MHTML root for the file.
    private $root; // Prepends <root> to all relative URLs.
    private $skipMissing; // Don't throw an error for missing image files.
    private $maxUriLength; // Maximum length for a data URI. Defaults to 32768.
    private $maxImageSize; // Maximum image size (in bytes) to convert.

    public function __construct($jarPath, $javaPath = '/usr/bin/java')
    {
        $this->jarPath = $jarPath;
        $this->javaPath = $javaPath;
    }

    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    public function setMhtml($mhtml)
    {
        $this->mhtml = $mhtml;
    }

    public function setMhtmlRoot($mhtmlRoot)
    {
        $this->mhtmlRoot = $mhtmlRoot;
    }

    public function setRoot($root)
    {
        $this->root = $root;
    }

    public function setSkipMissing($skipMissing)
    {
        $this->skipMissing = $skipMissing;
    }

    public function setMaxUriLength($maxUriLength)
    {
        $this->maxUriLength = $maxUriLength;
    }

    public function setMaxImageSize($maxImageSize)
    {
        $this->maxImageSize = $maxImageSize;
    }

    public function filterLoad(AssetInterface $asset)
    {
    }

    public function filterDump(AssetInterface $asset)
    {
        $pb = $this->createProcessBuilder(array(
            $this->javaPath,
            '-jar',
            $this->jarPath,
        ));

        if (null !== $this->charset) {
            $pb->add('--charset')->add($this->charset);
        }

        if ($this->mhtml) {
            $pb->add('--mhtml');
        }

        if (null !== $this->mhtmlRoot) {
            $pb->add('--mhtmlroot')->add($this->mhtmlRoot);
        }

        // automatically define root if not already defined
        if (null === $this->root) {
            if ($dir = $asset->getSourceDirectory()) {
                $pb->add('--root')->add($dir);
            }
        } else {
            $pb->add('--root')->add($this->root);
        }

        if ($this->skipMissing) {
            $pb->add('--skip-missing');
        }

        if (null !== $this->maxUriLength) {
            $pb->add('--max-uri-length')->add($this->maxUriLength);
        }

        if (null !== $this->maxImageSize) {
            $pb->add('--max-image-size')->add($this->maxImageSize);
        }

        // input
        $pb->add($input = tempnam(sys_get_temp_dir(), 'assetic_cssembed'));
        file_put_contents($input, $asset->getContent());

        $proc = $pb->getProcess();
        $code = $proc->run();
        unlink($input);

        if (0 !== $code) {
            throw FilterException::fromProcess($proc)->setInput($asset->getContent());
        }

        $asset->setContent($proc->getOutput());
    }

    public function getChildren(AssetFactory $factory, $content, $loadPath = null)
    {
        // todo
        return array();
    }
}
