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
   * @var int
   */
  public $maxNodeCount;
  /**
   * @var int
   */
  public $minNodeCount;

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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NodePoolAutoscaling::class, 'Google_Service_Container_NodePoolAutoscaling');
