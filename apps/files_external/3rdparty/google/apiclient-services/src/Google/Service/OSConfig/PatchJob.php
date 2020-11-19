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

class Google_Service_OSConfig_PatchJob extends Google_Model
{
  public $createTime;
  public $description;
  public $displayName;
  public $dryRun;
  public $duration;
  public $errorMessage;
  protected $instanceDetailsSummaryType = 'Google_Service_OSConfig_PatchJobInstanceDetailsSummary';
  protected $instanceDetailsSummaryDataType = '';
  protected $instanceFilterType = 'Google_Service_OSConfig_PatchInstanceFilter';
  protected $instanceFilterDataType = '';
  public $name;
  protected $patchConfigType = 'Google_Service_OSConfig_PatchConfig';
  protected $patchConfigDataType = '';
  public $patchDeployment;
  public $percentComplete;
  protected $rolloutType = 'Google_Service_OSConfig_PatchRollout';
  protected $rolloutDataType = '';
  public $state;
  public $updateTime;

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
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDryRun($dryRun)
  {
    $this->dryRun = $dryRun;
  }
  public function getDryRun()
  {
    return $this->dryRun;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  /**
   * @param Google_Service_OSConfig_PatchJobInstanceDetailsSummary
   */
  public function setInstanceDetailsSummary(Google_Service_OSConfig_PatchJobInstanceDetailsSummary $instanceDetailsSummary)
  {
    $this->instanceDetailsSummary = $instanceDetailsSummary;
  }
  /**
   * @return Google_Service_OSConfig_PatchJobInstanceDetailsSummary
   */
  public function getInstanceDetailsSummary()
  {
    return $this->instanceDetailsSummary;
  }
  /**
   * @param Google_Service_OSConfig_PatchInstanceFilter
   */
  public function setInstanceFilter(Google_Service_OSConfig_PatchInstanceFilter $instanceFilter)
  {
    $this->instanceFilter = $instanceFilter;
  }
  /**
   * @return Google_Service_OSConfig_PatchInstanceFilter
   */
  public function getInstanceFilter()
  {
    return $this->instanceFilter;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_OSConfig_PatchConfig
   */
  public function setPatchConfig(Google_Service_OSConfig_PatchConfig $patchConfig)
  {
    $this->patchConfig = $patchConfig;
  }
  /**
   * @return Google_Service_OSConfig_PatchConfig
   */
  public function getPatchConfig()
  {
    return $this->patchConfig;
  }
  public function setPatchDeployment($patchDeployment)
  {
    $this->patchDeployment = $patchDeployment;
  }
  public function getPatchDeployment()
  {
    return $this->patchDeployment;
  }
  public function setPercentComplete($percentComplete)
  {
    $this->percentComplete = $percentComplete;
  }
  public function getPercentComplete()
  {
    return $this->percentComplete;
  }
  /**
   * @param Google_Service_OSConfig_PatchRollout
   */
  public function setRollout(Google_Service_OSConfig_PatchRollout $rollout)
  {
    $this->rollout = $rollout;
  }
  /**
   * @return Google_Service_OSConfig_PatchRollout
   */
  public function getRollout()
  {
    return $this->rollout;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
