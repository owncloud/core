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

namespace Google\Service\Logging;

class LogBucket extends \Google\Collection
{
  protected $collection_key = 'restrictedFields';
  protected $cmekSettingsType = CmekSettings::class;
  protected $cmekSettingsDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  protected $indexConfigsType = IndexConfig::class;
  protected $indexConfigsDataType = 'array';
  /**
   * @var string
   */
  public $lifecycleState;
  /**
   * @var bool
   */
  public $locked;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $restrictedFields;
  /**
   * @var int
   */
  public $retentionDays;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param CmekSettings
   */
  public function setCmekSettings(CmekSettings $cmekSettings)
  {
    $this->cmekSettings = $cmekSettings;
  }
  /**
   * @return CmekSettings
   */
  public function getCmekSettings()
  {
    return $this->cmekSettings;
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
   * @param IndexConfig[]
   */
  public function setIndexConfigs($indexConfigs)
  {
    $this->indexConfigs = $indexConfigs;
  }
  /**
   * @return IndexConfig[]
   */
  public function getIndexConfigs()
  {
    return $this->indexConfigs;
  }
  /**
   * @param string
   */
  public function setLifecycleState($lifecycleState)
  {
    $this->lifecycleState = $lifecycleState;
  }
  /**
   * @return string
   */
  public function getLifecycleState()
  {
    return $this->lifecycleState;
  }
  /**
   * @param bool
   */
  public function setLocked($locked)
  {
    $this->locked = $locked;
  }
  /**
   * @return bool
   */
  public function getLocked()
  {
    return $this->locked;
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
  public function setRestrictedFields($restrictedFields)
  {
    $this->restrictedFields = $restrictedFields;
  }
  /**
   * @return string[]
   */
  public function getRestrictedFields()
  {
    return $this->restrictedFields;
  }
  /**
   * @param int
   */
  public function setRetentionDays($retentionDays)
  {
    $this->retentionDays = $retentionDays;
  }
  /**
   * @return int
   */
  public function getRetentionDays()
  {
    return $this->retentionDays;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LogBucket::class, 'Google_Service_Logging_LogBucket');
