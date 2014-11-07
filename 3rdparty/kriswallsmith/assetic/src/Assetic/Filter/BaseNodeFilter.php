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

abstract class BaseNodeFilter extends BaseProcessFilter
{
    private $nodePaths = array();

    public function getNodePaths()
    {
        return $this->nodePaths;
    }

    public function setNodePaths(array $nodePaths)
    {
        $this->nodePaths = $nodePaths;
    }

    public function addNodePath($nodePath)
    {
        $this->nodePaths[] = $nodePath;
    }

    protected function createProcessBuilder(array $arguments = array())
    {
        $pb = parent::createProcessBuilder($arguments);

        if ($this->nodePaths) {
            $this->mergeEnv($pb);
            $pb->setEnv('NODE_PATH', implode(PATH_SEPARATOR, $this->nodePaths));
        }

        return $pb;
    }
}
