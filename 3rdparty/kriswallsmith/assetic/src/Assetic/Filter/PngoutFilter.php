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
 * Runs assets through pngout.
 *
 * @link http://advsys.net/ken/utils.htm#pngout
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class PngoutFilter extends BaseProcessFilter
{
    // -c#
    const COLOR_GREY       = '0';
    const COLOR_RGB        = '2';
    const COLOR_PAL        = '3';
    const COLOR_GRAY_ALPHA = '4';
    const COLOR_RGB_ALPHA  = '6';

    // -f#
    const FILTER_NONE  = '0';
    const FILTER_X     = '1';
    const FILTER_Y     = '2';
    const FILTER_X_Y   = '3';
    const FILTER_PAETH = '4';
    const FILTER_MIXED = '5';

    // -s#
    const STRATEGY_XTREME        = '0';
    const STRATEGY_INTENSE       = '1';
    const STRATEGY_LONGEST_MATCH = '2';
    const STRATEGY_HUFFMAN_ONLY  = '3';
    const STRATEGY_UNCOMPRESSED  = '4';

    private $pngoutBin;
    private $color;
    private $filter;
    private $strategy;
    private $blockSplitThreshold;

    /**
     * Constructor.
     *
     * @param string $pngoutBin Path to the pngout binary
     */
    public function __construct($pngoutBin = '/usr/bin/pngout')
    {
        $this->pngoutBin = $pngoutBin;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    }

    public function setBlockSplitThreshold($blockSplitThreshold)
    {
        $this->blockSplitThreshold = $blockSplitThreshold;
    }

    public function filterLoad(AssetInterface $asset)
    {
    }

    public function filterDump(AssetInterface $asset)
    {
        $pb = $this->createProcessBuilder(array($this->pngoutBin));

        if (null !== $this->color) {
            $pb->add('-c'.$this->color);
        }

        if (null !== $this->filter) {
            $pb->add('-f'.$this->filter);
        }

        if (null !== $this->strategy) {
            $pb->add('-s'.$this->strategy);
        }

        if (null !== $this->blockSplitThreshold) {
            $pb->add('-b'.$this->blockSplitThreshold);
        }

        $pb->add($input = tempnam(sys_get_temp_dir(), 'assetic_pngout'));
        file_put_contents($input, $asset->getContent());

        $output = tempnam(sys_get_temp_dir(), 'assetic_pngout');
        unlink($output);
        $pb->add($output .= '.png');

        $proc = $pb->getProcess();
        $code = $proc->run();

        if (0 !== $code) {
            unlink($input);
            throw FilterException::fromProcess($proc)->setInput($asset->getContent());
        }

        $asset->setContent(file_get_contents($output));

        unlink($input);
        unlink($output);
    }
}
