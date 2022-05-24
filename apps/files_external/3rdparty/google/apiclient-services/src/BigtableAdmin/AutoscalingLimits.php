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

namespace Google\Service\BigtableAdmin;

class AutoscalingLimits extends \Google\Model
{
  /**
   * @var int
   */
  public $maxServeNodes;
  /**
   * @var int
   */
  public $minServeNodes;

  /**
   * @param int
   */
  public function setMaxServeNodes($maxServeNodes)
  {
    $this->maxServeNodes = $maxServeNodes;
  }
  /**
   * @return int
   */
  public function getMaxServeNodes()
  {
    return $this->maxServeNodes;
  }
  /**
   * @param int
   */
  public function setMinServeNodes($minServeNodes)
  {
    $this->minServeNodes = $minServeNodes;
  }
  /**
   * @return int
   */
  public function getMinServeNodes()
  {
    return $this->minServeNodes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutoscalingLimits::class, 'Google_Service_BigtableAdmin_AutoscalingLimits');
