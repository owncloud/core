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

namespace Google\Service\CloudFilestore;

class Backup extends \Google\Model
{
  /**
   * @var string
   */
  public $capacityGb;
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
  public $downloadBytes;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $satisfiesPzs;
  /**
   * @var string
   */
  public $sourceFileShare;
  /**
   * @var string
   */
  public $sourceInstance;
  /**
   * @var string
   */
  public $sourceInstanceTier;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $storageBytes;

  /**
   * @param string
   */
  public function setCapacityGb($capacityGb)
  {
    $this->capacityGb = $capacityGb;
  }
  /**
   * @return string
   */
  public function getCapacityGb()
  {
    return $this->capacityGb;
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
  public function setDownloadBytes($downloadBytes)
  {
    $this->downloadBytes = $downloadBytes;
  }
  /**
   * @return string
   */
  public function getDownloadBytes()
  {
    return $this->downloadBytes;
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
   * @param bool
   */
  public function setSatisfiesPzs($satisfiesPzs)
  {
    $this->satisfiesPzs = $satisfiesPzs;
  }
  /**
   * @return bool
   */
  public function getSatisfiesPzs()
  {
    return $this->satisfiesPzs;
  }
  /**
   * @param string
   */
  public function setSourceFileShare($sourceFileShare)
  {
    $this->sourceFileShare = $sourceFileShare;
  }
  /**
   * @return string
   */
  public function getSourceFileShare()
  {
    return $this->sourceFileShare;
  }
  /**
   * @param string
   */
  public function setSourceInstance($sourceInstance)
  {
    $this->sourceInstance = $sourceInstance;
  }
  /**
   * @return string
   */
  public function getSourceInstance()
  {
    return $this->sourceInstance;
  }
  /**
   * @param string
   */
  public function setSourceInstanceTier($sourceInstanceTier)
  {
    $this->sourceInstanceTier = $sourceInstanceTier;
  }
  /**
   * @return string
   */
  public function getSourceInstanceTier()
  {
    return $this->sourceInstanceTier;
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
  public function setStorageBytes($storageBytes)
  {
    $this->storageBytes = $storageBytes;
  }
  /**
   * @return string
   */
  public function getStorageBytes()
  {
    return $this->storageBytes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Backup::class, 'Google_Service_CloudFilestore_Backup');
