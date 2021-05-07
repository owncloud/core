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

class Google_Service_CloudFilestore_Backup extends Google_Model
{
  public $capacityGb;
  public $createTime;
  public $description;
  public $downloadBytes;
  public $labels;
  public $name;
  public $satisfiesPzs;
  public $sourceFileShare;
  public $sourceInstance;
  public $sourceInstanceTier;
  public $state;
  public $storageBytes;

  public function setCapacityGb($capacityGb)
  {
    $this->capacityGb = $capacityGb;
  }
  public function getCapacityGb()
  {
    return $this->capacityGb;
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
  public function setDownloadBytes($downloadBytes)
  {
    $this->downloadBytes = $downloadBytes;
  }
  public function getDownloadBytes()
  {
    return $this->downloadBytes;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSatisfiesPzs($satisfiesPzs)
  {
    $this->satisfiesPzs = $satisfiesPzs;
  }
  public function getSatisfiesPzs()
  {
    return $this->satisfiesPzs;
  }
  public function setSourceFileShare($sourceFileShare)
  {
    $this->sourceFileShare = $sourceFileShare;
  }
  public function getSourceFileShare()
  {
    return $this->sourceFileShare;
  }
  public function setSourceInstance($sourceInstance)
  {
    $this->sourceInstance = $sourceInstance;
  }
  public function getSourceInstance()
  {
    return $this->sourceInstance;
  }
  public function setSourceInstanceTier($sourceInstanceTier)
  {
    $this->sourceInstanceTier = $sourceInstanceTier;
  }
  public function getSourceInstanceTier()
  {
    return $this->sourceInstanceTier;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStorageBytes($storageBytes)
  {
    $this->storageBytes = $storageBytes;
  }
  public function getStorageBytes()
  {
    return $this->storageBytes;
  }
}
