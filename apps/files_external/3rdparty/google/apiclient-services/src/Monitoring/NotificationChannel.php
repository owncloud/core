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
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $enabled;
  /**
   * @var string[]
   */
  public $labels;
  protected $mutationRecordsType = MutationRecord::class;
  protected $mutationRecordsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string[]
   */
  public $userLabels;
  /**
   * @var string
   */
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
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
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
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
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
   * @param string
   */
  public function setVerificationStatus($verificationStatus)
  {
    $this->verificationStatus = $verificationStatus;
  }
  /**
   * @return string
   */
  public function getVerificationStatus()
  {
    return $this->verificationStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NotificationChannel::class, 'Google_Service_Monitoring_NotificationChannel');
