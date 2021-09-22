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

class NotificationChannel extends \Google\Collection
{
  protected $collection_key = 'mutationRecords';
  protected $creationRecordType = MutationRecord::class;
  protected $creationRecordDataType = '';
  public $description;
  public $displayName;
  public $enabled;
  public $labels;
  protected $mutationRecordsType = MutationRecord::class;
  protected $mutationRecordsDataType = 'array';
  public $name;
  public $type;
  public $userLabels;
  public $verificationStatus;

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
   * @param MutationRecord[]
   */
  public function setMutationRecords($mutationRecords)
  {
    $this->mutationRecords = $mutationRecords;
  }
  /**
   * @return MutationRecord[]
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NotificationChannel::class, 'Google_Service_Monitoring_NotificationChannel');
