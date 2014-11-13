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
 * Runs assets through Sprockets.
 *
 * Requires Sprockets 1.0.x.
 *
 * @link http://getsprockets.org/
 * @link http://github.com/sstephenson/sprockets/tree/1.0.x
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class SprocketsFilter extends BaseProcessFilter implements DependencyExtractorInterface
{
    private $sprocketsLib;
    private $rubyBin;
    private $includeDirs;
    private $assetRoot;

    /**
     * Constructor.
     *
     * @param string $sprocketsLib Path to the Sprockets lib/ directory
     * @param string $rubyBin      Path to the ruby binary
     */
    public function __construct($sprocketsLib = null, $rubyBin = '/usr/bin/ruby')
    {
        $this->sprocketsLib = $sprocketsLib;
        $this->rubyBin = $rubyBin;
        $this->includeDirs = array();
    }

    public function addIncludeDir($directory)
    {
        $this->includeDirs[] = $directory;
    }

    public function setAssetRoot($assetRoot)
    {
        $this->assetRoot = $assetRoot;
    }

    /**
     * Hack around a bit, get the job done.
     */
    public function filterLoad(AssetInterface $asset)
    {
        static $format = <<<'EOF'
#!/usr/bin/env ruby

require %s
%s
options = { :load_path    => [],
            :source_files => [%s],
            :expand_paths => false }

%ssecretary = Sprockets::Secretary.new(options)
secretary.install_assets if options[:asset_root]
print secretary.concatenation

EOF;

        $more = '';

        foreach ($this->includeDirs as $directory) {
            $more .= 'options[:load_path] << '.var_export($directory, true)."\n";
        }

        if (null !== $this->assetRoot) {
            $more .= 'options[:asset_root] = '.var_export($this->assetRoot, true)."\n";
        }

        if ($more) {
            $more .= "\n";
        }

        $tmpAsset = tempnam(sys_get_temp_dir(), 'assetic_sprockets');
        file_put_contents($tmpAsset, $asset->getContent());

        $input = tempnam(sys_get_temp_dir(), 'assetic_sprockets');
        file_put_contents($input, sprintf($format,
            $this->sprocketsLib
                ? sprintf('File.join(%s, \'sprockets\')', var_export($this->sprocketsLib, true))
                : '\'sprockets\'',
            $this->getHack($asset),
            var_export($tmpAsset, true),
            $more
        ));

        $pb = $this->createProcessBuilder(array(
            $this->rubyBin,
            $input,
        ));

        $proc = $pb->getProcess();
        $code = $proc->run();
        unlink($tmpAsset);
        unlink($input);

        if (0 !== $code) {
            throw FilterException::fromProcess($proc)->setInput($asset->getContent());
        }

        $asset->setContent($proc->getOutput());
    }

    public function filterDump(AssetInterface $asset)
    {
    }

    public function getChildren(AssetFactory $factory, $content, $loadPath = null)
    {
        // todo
        return array();
    }

    private function getHack(AssetInterface $asset)
    {
        static $format = <<<'EOF'

module Sprockets
  class Preprocessor
    protected
    def pathname_for_relative_require_from(source_line)
      Sprockets::Pathname.new(@environment, File.join(%s, location_from(source_line)))
    end
  end
end

EOF;

        if ($dir = $asset->getSourceDirectory()) {
            return sprintf($format, var_export($dir, true));
        }
    }
}
