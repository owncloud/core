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

namespace Google\Service\AlertCenter;

class ActivityRule extends \Google\Collection
{
  protected $collection_key = 'supersededAlerts';
  /**
   * @var string[]
   */
  public $actionNames;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $query;
  /**
   * @var string[]
   */
  public $supersededAlerts;
  /**
   * @var string
   */
  public $supersedingAlert;
  /**
   * @var string
   */
  public $threshold;
  /**
   * @var string
   */
  public $triggerSource;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $windowSize;

  /**
   * @param string[]
   */
  public function setActionNames($actionNames)
  {
    $this->actionNames = $actionNames;
  }
  /**
   * @return string[]
   */
  public function getActionNames()
  {
    return $this->actionNames;
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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setQuery($query)
  {
    $this->query = $query;
  }
  /**
   * @return string
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param string[]
   */
  public function setSupersededAlerts($supersededAlerts)
  {
    $this->supersededAlerts = $supersededAlerts;
  }
  /**
   * @return string[]
   */
  public function getSupersededAlerts()
  {
    return $this->supersededAlerts;
  }
  /**
   * @param string
   */
  public function setSupersedingAlert($supersedingAlert)
  {
    $this->supersedingAlert = $supersedingAlert;
  }
  /**
   * @return string
   */
  public function getSupersedingAlert()
  {
    return $this->supersedingAlert;
  }
  /**
   * @param string
   */
  public function setThreshold($threshold)
  {
    $this->threshold = $threshold;
  }
  /**
   * @return string
   */
  public function getThreshold()
  {
    return $this->threshold;
  }
  /**
   * @param string
   */
  public function setTriggerSource($triggerSource)
  {
    $this->triggerSource = $triggerSource;
  }
  /**
   * @return string
   */
  public function getTriggerSource()
  {
    return $this->triggerSource;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setWindowSize($windowSize)
  {
    $this->windowSize = $windowSize;
  }
  /**
   * @return string
   */
  public function getWindowSize()
  {
    return $this->windowSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ActivityRule::class, 'Google_Service_AlertCenter_ActivityRule');
