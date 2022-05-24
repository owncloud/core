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

namespace Google\Service\ServiceUsage;

class UsageRule extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowUnregisteredCalls;
  /**
   * @var string
   */
  public $selector;
  /**
   * @var bool
   */
  public $skipServiceControl;

  /**
   * @param bool
   */
  public function setAllowUnregisteredCalls($allowUnregisteredCalls)
  {
    $this->allowUnregisteredCalls = $allowUnregisteredCalls;
  }
  /**
   * @return bool
   */
  public function getAllowUnregisteredCalls()
  {
    return $this->allowUnregisteredCalls;
  }
  /**
   * @param string
   */
  public function setSelector($selector)
  {
    $this->selector = $selector;
  }
  /**
   * @return string
   */
  public function getSelector()
  {
    return $this->selector;
  }
  /**
   * @param bool
   */
  public function setSkipServiceControl($skipServiceControl)
  {
    $this->skipServiceControl = $skipServiceControl;
  }
  /**
   * @return bool
   */
  public function getSkipServiceControl()
  {
    return $this->skipServiceControl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsageRule::class, 'Google_Service_ServiceUsage_UsageRule');
