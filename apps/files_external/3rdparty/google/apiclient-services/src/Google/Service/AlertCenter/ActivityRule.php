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

class Google_Service_AlertCenter_ActivityRule extends Google_Collection
{
  protected $collection_key = 'supersededAlerts';
  public $actionNames;
  public $createTime;
  public $description;
  public $displayName;
  public $name;
  public $query;
  public $supersededAlerts;
  public $supersedingAlert;
  public $threshold;
  public $triggerSource;
  public $updateTime;
  public $windowSize;

  public function setActionNames($actionNames)
  {
    $this->actionNames = $actionNames;
  }
  public function getActionNames()
  {
    return $this->actionNames;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setQuery($query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  public function setSupersededAlerts($supersededAlerts)
  {
    $this->supersededAlerts = $supersededAlerts;
  }
  public function getSupersededAlerts()
  {
    return $this->supersededAlerts;
  }
  public function setSupersedingAlert($supersedingAlert)
  {
    $this->supersedingAlert = $supersedingAlert;
  }
  public function getSupersedingAlert()
  {
    return $this->supersedingAlert;
  }
  public function setThreshold($threshold)
  {
    $this->threshold = $threshold;
  }
  public function getThreshold()
  {
    return $this->threshold;
  }
  public function setTriggerSource($triggerSource)
  {
    $this->triggerSource = $triggerSource;
  }
  public function getTriggerSource()
  {
    return $this->triggerSource;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setWindowSize($windowSize)
  {
    $this->windowSize = $windowSize;
  }
  public function getWindowSize()
  {
    return $this->windowSize;
  }
}
