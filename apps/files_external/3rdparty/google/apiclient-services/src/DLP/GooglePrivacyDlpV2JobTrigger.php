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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2JobTrigger extends \Google\Collection
{
  protected $collection_key = 'triggers';
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
  protected $errorsType = GooglePrivacyDlpV2Error::class;
  protected $errorsDataType = 'array';
  protected $inspectJobType = GooglePrivacyDlpV2InspectJobConfig::class;
  protected $inspectJobDataType = '';
  /**
   * @var string
   */
  public $lastRunTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $status;
  protected $triggersType = GooglePrivacyDlpV2Trigger::class;
  protected $triggersDataType = 'array';
  /**
   * @var string
   */
  public $updateTime;

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
   * @param GooglePrivacyDlpV2Error[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return GooglePrivacyDlpV2Error[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param GooglePrivacyDlpV2InspectJobConfig
   */
  public function setInspectJob(GooglePrivacyDlpV2InspectJobConfig $inspectJob)
  {
    $this->inspectJob = $inspectJob;
  }
  /**
   * @return GooglePrivacyDlpV2InspectJobConfig
   */
  public function getInspectJob()
  {
    return $this->inspectJob;
  }
  /**
   * @param string
   */
  public function setLastRunTime($lastRunTime)
  {
    $this->lastRunTime = $lastRunTime;
  }
  /**
   * @return string
   */
  public function getLastRunTime()
  {
    return $this->lastRunTime;
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param GooglePrivacyDlpV2Trigger[]
   */
  public function setTriggers($triggers)
  {
    $this->triggers = $triggers;
  }
  /**
   * @return GooglePrivacyDlpV2Trigger[]
   */
  public function getTriggers()
  {
    return $this->triggers;
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
class_alias(GooglePrivacyDlpV2JobTrigger::class, 'Google_Service_DLP_GooglePrivacyDlpV2JobTrigger');
