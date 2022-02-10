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

namespace Google\Service\ToolResults;

class FailureDetail extends \Google\Model
{
  /**
   * @var bool
   */
  public $crashed;
  /**
   * @var bool
   */
  public $deviceOutOfMemory;
  /**
   * @var bool
   */
  public $failedRoboscript;
  /**
   * @var bool
   */
  public $notInstalled;
  /**
   * @var bool
   */
  public $otherNativeCrash;
  /**
   * @var bool
   */
  public $timedOut;
  /**
   * @var bool
   */
  public $unableToCrawl;

  /**
   * @param bool
   */
  public function setCrashed($crashed)
  {
    $this->crashed = $crashed;
  }
  /**
   * @return bool
   */
  public function getCrashed()
  {
    return $this->crashed;
  }
  /**
   * @param bool
   */
  public function setDeviceOutOfMemory($deviceOutOfMemory)
  {
    $this->deviceOutOfMemory = $deviceOutOfMemory;
  }
  /**
   * @return bool
   */
  public function getDeviceOutOfMemory()
  {
    return $this->deviceOutOfMemory;
  }
  /**
   * @param bool
   */
  public function setFailedRoboscript($failedRoboscript)
  {
    $this->failedRoboscript = $failedRoboscript;
  }
  /**
   * @return bool
   */
  public function getFailedRoboscript()
  {
    return $this->failedRoboscript;
  }
  /**
   * @param bool
   */
  public function setNotInstalled($notInstalled)
  {
    $this->notInstalled = $notInstalled;
  }
  /**
   * @return bool
   */
  public function getNotInstalled()
  {
    return $this->notInstalled;
  }
  /**
   * @param bool
   */
  public function setOtherNativeCrash($otherNativeCrash)
  {
    $this->otherNativeCrash = $otherNativeCrash;
  }
  /**
   * @return bool
   */
  public function getOtherNativeCrash()
  {
    return $this->otherNativeCrash;
  }
  /**
   * @param bool
   */
  public function setTimedOut($timedOut)
  {
    $this->timedOut = $timedOut;
  }
  /**
   * @return bool
   */
  public function getTimedOut()
  {
    return $this->timedOut;
  }
  /**
   * @param bool
   */
  public function setUnableToCrawl($unableToCrawl)
  {
    $this->unableToCrawl = $unableToCrawl;
  }
  /**
   * @return bool
   */
  public function getUnableToCrawl()
  {
    return $this->unableToCrawl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FailureDetail::class, 'Google_Service_ToolResults_FailureDetail');
