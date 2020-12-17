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

class Google_Service_Monitoring_AlertPolicy extends Google_Collection
{
  protected $collection_key = 'notificationChannels';
  public $combiner;
  protected $conditionsType = 'Google_Service_Monitoring_Condition';
  protected $conditionsDataType = 'array';
  protected $creationRecordType = 'Google_Service_Monitoring_MutationRecord';
  protected $creationRecordDataType = '';
  public $displayName;
  protected $documentationType = 'Google_Service_Monitoring_Documentation';
  protected $documentationDataType = '';
  public $enabled;
  protected $mutationRecordType = 'Google_Service_Monitoring_MutationRecord';
  protected $mutationRecordDataType = '';
  public $name;
  public $notificationChannels;
  public $userLabels;
  protected $validityType = 'Google_Service_Monitoring_Status';
  protected $validityDataType = '';

  public function setCombiner($combiner)
  {
    $this->combiner = $combiner;
  }
  public function getCombiner()
  {
    return $this->combiner;
  }
  /**
   * @param Google_Service_Monitoring_Condition[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return Google_Service_Monitoring_Condition[]
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  /**
   * @param Google_Service_Monitoring_MutationRecord
   */
  public function setCreationRecord(Google_Service_Monitoring_MutationRecord $creationRecord)
  {
    $this->creationRecord = $creationRecord;
  }
  /**
   * @return Google_Service_Monitoring_MutationRecord
   */
  public function getCreationRecord()
  {
    return $this->creationRecord;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_Monitoring_Documentation
   */
  public function setDocumentation(Google_Service_Monitoring_Documentation $documentation)
  {
    $this->documentation = $documentation;
  }
  /**
   * @return Google_Service_Monitoring_Documentation
   */
  public function getDocumentation()
  {
    return $this->documentation;
  }
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param Google_Service_Monitoring_MutationRecord
   */
  public function setMutationRecord(Google_Service_Monitoring_MutationRecord $mutationRecord)
  {
    $this->mutationRecord = $mutationRecord;
  }
  /**
   * @return Google_Service_Monitoring_MutationRecord
   */
  public function getMutationRecord()
  {
    return $this->mutationRecord;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNotificationChannels($notificationChannels)
  {
    $this->notificationChannels = $notificationChannels;
  }
  public function getNotificationChannels()
  {
    return $this->notificationChannels;
  }
  public function setUserLabels($userLabels)
  {
    $this->userLabels = $userLabels;
  }
  public function getUserLabels()
  {
    return $this->userLabels;
  }
  /**
   * @param Google_Service_Monitoring_Status
   */
  public function setValidity(Google_Service_Monitoring_Status $validity)
  {
    $this->validity = $validity;
  }
  /**
   * @return Google_Service_Monitoring_Status
   */
  public function getValidity()
  {
    return $this->validity;
  }
}
