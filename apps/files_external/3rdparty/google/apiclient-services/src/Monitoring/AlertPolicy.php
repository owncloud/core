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

namespace Google\Service\Monitoring;

class AlertPolicy extends \Google\Collection
{
  protected $collection_key = 'notificationChannels';
  protected $alertStrategyType = AlertStrategy::class;
  protected $alertStrategyDataType = '';
  /**
   * @var string
   */
  public $combiner;
  protected $conditionsType = Condition::class;
  protected $conditionsDataType = 'array';
  protected $creationRecordType = MutationRecord::class;
  protected $creationRecordDataType = '';
  /**
   * @var string
   */
  public $displayName;
  protected $documentationType = Documentation::class;
  protected $documentationDataType = '';
  /**
   * @var bool
   */
  public $enabled;
  protected $mutationRecordType = MutationRecord::class;
  protected $mutationRecordDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $notificationChannels;
  /**
   * @var string[]
   */
  public $userLabels;
  protected $validityType = Status::class;
  protected $validityDataType = '';

  /**
   * @param AlertStrategy
   */
  public function setAlertStrategy(AlertStrategy $alertStrategy)
  {
    $this->alertStrategy = $alertStrategy;
  }
  /**
   * @return AlertStrategy
   */
  public function getAlertStrategy()
  {
    return $this->alertStrategy;
  }
  /**
   * @param string
   */
  public function setCombiner($combiner)
  {
    $this->combiner = $combiner;
  }
  /**
   * @return string
   */
  public function getCombiner()
  {
    return $this->combiner;
  }
  /**
   * @param Condition[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return Condition[]
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  /**
   * @param MutationRecord
   */
  public function setCreationRecord(MutationRecord $creationRecord)
  {
    $this->creationRecord = $creationRecord;
  }
  /**
   * @return MutationRecord
   */
  public function getCreationRecord()
  {
    return $this->creationRecord;
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
   * @param Documentation
   */
  public function setDocumentation(Documentation $documentation)
  {
    $this->documentation = $documentation;
  }
  /**
   * @return Documentation
   */
  public function getDocumentation()
  {
    return $this->documentation;
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
   * @param MutationRecord
   */
  public function setMutationRecord(MutationRecord $mutationRecord)
  {
    $this->mutationRecord = $mutationRecord;
  }
  /**
   * @return MutationRecord
   */
  public function getMutationRecord()
  {
    return $this->mutationRecord;
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
   * @param string[]
   */
  public function setNotificationChannels($notificationChannels)
  {
    $this->notificationChannels = $notificationChannels;
  }
  /**
   * @return string[]
   */
  public function getNotificationChannels()
  {
    return $this->notificationChannels;
  }
  /**
   * @param string[]
   */
  public function setUserLabels($userLabels)
  {
    $this->userLabels = $userLabels;
  }
  /**
   * @return string[]
   */
  public function getUserLabels()
  {
    return $this->userLabels;
  }
  /**
   * @param Status
   */
  public function setValidity(Status $validity)
  {
    $this->validity = $validity;
  }
  /**
   * @return Status
   */
  public function getValidity()
  {
    return $this->validity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AlertPolicy::class, 'Google_Service_Monitoring_AlertPolicy');
