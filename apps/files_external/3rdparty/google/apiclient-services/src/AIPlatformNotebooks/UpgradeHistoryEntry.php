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

namespace Google\Service\AIPlatformNotebooks;

class UpgradeHistoryEntry extends \Google\Model
{
  /**
   * @var string
   */
  public $action;
  /**
   * @var string
   */
  public $containerImage;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $framework;
  /**
   * @var string
   */
  public $snapshot;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $targetImage;
  /**
   * @var string
   */
  public $targetVersion;
  /**
   * @var string
   */
  public $version;
  /**
   * @var string
   */
  public $vmImage;

  /**
   * @param string
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param string
   */
  public function setContainerImage($containerImage)
  {
    $this->containerImage = $containerImage;
  }
  /**
   * @return string
   */
  public function getContainerImage()
  {
    return $this->containerImage;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setFramework($framework)
  {
    $this->framework = $framework;
  }
  /**
   * @return string
   */
  public function getFramework()
  {
    return $this->framework;
  }
  /**
   * @param string
   */
  public function setSnapshot($snapshot)
  {
    $this->snapshot = $snapshot;
  }
  /**
   * @return string
   */
  public function getSnapshot()
  {
    return $this->snapshot;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setTargetImage($targetImage)
  {
    $this->targetImage = $targetImage;
  }
  /**
   * @return string
   */
  public function getTargetImage()
  {
    return $this->targetImage;
  }
  /**
   * @param string
   */
  public function setTargetVersion($targetVersion)
  {
    $this->targetVersion = $targetVersion;
  }
  /**
   * @return string
   */
  public function getTargetVersion()
  {
    return $this->targetVersion;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
  /**
   * @param string
   */
  public function setVmImage($vmImage)
  {
    $this->vmImage = $vmImage;
  }
  /**
   * @return string
   */
  public function getVmImage()
  {
    return $this->vmImage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpgradeHistoryEntry::class, 'Google_Service_AIPlatformNotebooks_UpgradeHistoryEntry');
