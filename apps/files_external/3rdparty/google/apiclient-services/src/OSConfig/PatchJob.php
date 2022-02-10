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

namespace Google\Service\OSConfig;

class PatchJob extends \Google\Model
{
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
  /**
   * @var bool
   */
  public $dryRun;
  /**
   * @var string
   */
  public $duration;
  /**
   * @var string
   */
  public $errorMessage;
  protected $instanceDetailsSummaryType = PatchJobInstanceDetailsSummary::class;
  protected $instanceDetailsSummaryDataType = '';
  protected $instanceFilterType = PatchInstanceFilter::class;
  protected $instanceFilterDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $patchConfigType = PatchConfig::class;
  protected $patchConfigDataType = '';
  /**
   * @var string
   */
  public $patchDeployment;
  public $percentComplete;
  protected $rolloutType = PatchRollout::class;
  protected $rolloutDataType = '';
  /**
   * @var string
   */
  public $state;
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
   * @param bool
   */
  public function setDryRun($dryRun)
  {
    $this->dryRun = $dryRun;
  }
  /**
   * @return bool
   */
  public function getDryRun()
  {
    return $this->dryRun;
  }
  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param string
   */
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  /**
   * @return string
   */
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  /**
   * @param PatchJobInstanceDetailsSummary
   */
  public function setInstanceDetailsSummary(PatchJobInstanceDetailsSummary $instanceDetailsSummary)
  {
    $this->instanceDetailsSummary = $instanceDetailsSummary;
  }
  /**
   * @return PatchJobInstanceDetailsSummary
   */
  public function getInstanceDetailsSummary()
  {
    return $this->instanceDetailsSummary;
  }
  /**
   * @param PatchInstanceFilter
   */
  public function setInstanceFilter(PatchInstanceFilter $instanceFilter)
  {
    $this->instanceFilter = $instanceFilter;
  }
  /**
   * @return PatchInstanceFilter
   */
  public function getInstanceFilter()
  {
    return $this->instanceFilter;
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
   * @param PatchConfig
   */
  public function setPatchConfig(PatchConfig $patchConfig)
  {
    $this->patchConfig = $patchConfig;
  }
  /**
   * @return PatchConfig
   */
  public function getPatchConfig()
  {
    return $this->patchConfig;
  }
  /**
   * @param string
   */
  public function setPatchDeployment($patchDeployment)
  {
    $this->patchDeployment = $patchDeployment;
  }
  /**
   * @return string
   */
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
   * @param PatchRollout
   */
  public function setRollout(PatchRollout $rollout)
  {
    $this->rollout = $rollout;
  }
  /**
   * @return PatchRollout
   */
  public function getRollout()
  {
    return $this->rollout;
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
class_alias(PatchJob::class, 'Google_Service_OSConfig_PatchJob');
