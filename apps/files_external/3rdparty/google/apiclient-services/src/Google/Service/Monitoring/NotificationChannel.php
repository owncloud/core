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

class Google_Service_Monitoring_NotificationChannel extends Google_Collection
{
  protected $collection_key = 'mutationRecords';
  protected $creationRecordType = 'Google_Service_Monitoring_MutationRecord';
  protected $creationRecordDataType = '';
  public $description;
  public $displayName;
  public $enabled;
  public $labels;
  protected $mutationRecordsType = 'Google_Service_Monitoring_MutationRecord';
  protected $mutationRecordsDataType = 'array';
  public $name;
  public $type;
  public $userLabels;
  public $verificationStatus;

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
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Google_Service_Monitoring_MutationRecord[]
   */
  public function setMutationRecords($mutationRecords)
  {
    $this->mutationRecords = $mutationRecords;
  }
  /**
   * @return Google_Service_Monitoring_MutationRecord[]
   */
  public function getMutationRecords()
  {
    return $this->mutationRecords;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUserLabels($userLabels)
  {
    $this->userLabels = $userLabels;
  }
  public function getUserLabels()
  {
    return $this->userLabels;
  }
  public function setVerificationStatus($verificationStatus)
  {
    $this->verificationStatus = $verificationStatus;
  }
  public function getVerificationStatus()
  {
    return $this->verificationStatus;
  }
}
