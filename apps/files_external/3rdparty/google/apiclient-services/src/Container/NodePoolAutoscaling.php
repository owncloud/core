<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Container;

class NodePoolAutoscaling extends \Google\Model
{
  /**
   * @var bool
   */
  public $autoprovisioned;
  /**
   * @var bool
   */
  public $enabled;
  /**
   * @var string
   */
  public $locationPolicy;
  /**
   * @var int
   */
  public $maxNodeCount;
  /**
   * @var int
   */
  public $minNodeCount;
  /**
   * @var int
   */
  public $totalMaxNodeCount;
  /**
   * @var int
   */
  public $totalMinNodeCount;

  /**
   * @param bool
   */
  public function setAutoprovisioned($autoprovisioned)
  {
    $this->autoprovisioned = $autoprovisioned;
  }
  /**
   * @return bool
   */
  public function getAutoprovisioned()
  {
    return $this->autoprovisioned;
  }
  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param string
   */
  public function setLocationPolicy($locationPolicy)
  {
    $this->locationPolicy = $locationPolicy;
  }
  /**
   * @return string
   */
  public function getLocationPolicy()
  {
    return $this->locationPolicy;
  }
  /**
   * @param int
   */
  public function setMaxNodeCount($maxNodeCount)
  {
    $this->maxNodeCount = $maxNodeCount;
  }
  /**
   * @return int
   */
  public function getMaxNodeCount()
  {
    return $this->maxNodeCount;
  }
  /**
   * @param int
   */
  public function setMinNodeCount($minNodeCount)
  {
    $this->minNodeCount = $minNodeCount;
  }
  /**
   * @return int
   */
  public function getMinNodeCount()
  {
    return $this->minNodeCount;
  }
  /**
   * @param int
   */
  public function setTotalMaxNodeCount($totalMaxNodeCount)
  {
    $this->totalMaxNodeCount = $totalMaxNodeCount;
  }
  /**
   * @return int
   */
  public function getTotalMaxNodeCount()
  {
    return $this->totalMaxNodeCount;
  }
  /**
   * @param int
   */
  public function setTotalMinNodeCount($totalMinNodeCount)
  {
    $this->totalMinNodeCount = $totalMinNodeCount;
  }
  /**
   * @return int
   */
  public function getTotalMinNodeCount()
  {
    return $this->totalMinNodeCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NodePoolAutoscaling::class, 'Google_Service_Container_NodePoolAutoscaling');
