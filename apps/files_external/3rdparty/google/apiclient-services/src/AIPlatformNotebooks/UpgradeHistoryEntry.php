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
  public $action;
  public $containerImage;
  public $createTime;
  public $framework;
  public $snapshot;
  public $state;
  public $targetImage;
  public $targetVersion;
  public $version;
  public $vmImage;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setContainerImage($containerImage)
  {
    $this->containerImage = $containerImage;
  }
  public function getContainerImage()
  {
    return $this->containerImage;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setFramework($framework)
  {
    $this->framework = $framework;
  }
  public function getFramework()
  {
    return $this->framework;
  }
  public function setSnapshot($snapshot)
  {
    $this->snapshot = $snapshot;
  }
  public function getSnapshot()
  {
    return $this->snapshot;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTargetImage($targetImage)
  {
    $this->targetImage = $targetImage;
  }
  public function getTargetImage()
  {
    return $this->targetImage;
  }
  public function setTargetVersion($targetVersion)
  {
    $this->targetVersion = $targetVersion;
  }
  public function getTargetVersion()
  {
    return $this->targetVersion;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
  public function setVmImage($vmImage)
  {
    $this->vmImage = $vmImage;
  }
  public function getVmImage()
  {
    return $this->vmImage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpgradeHistoryEntry::class, 'Google_Service_AIPlatformNotebooks_UpgradeHistoryEntry');
