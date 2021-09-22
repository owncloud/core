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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1IssueModel extends \Google\Model
{
  public $createTime;
  public $displayName;
  protected $inputDataConfigType = GoogleCloudContactcenterinsightsV1IssueModelInputDataConfig::class;
  protected $inputDataConfigDataType = '';
  public $name;
  public $state;
  protected $trainingStatsType = GoogleCloudContactcenterinsightsV1IssueModelLabelStats::class;
  protected $trainingStatsDataType = '';
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
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
   * @param GoogleCloudContactcenterinsightsV1IssueModelInputDataConfig
   */
  public function setInputDataConfig(GoogleCloudContactcenterinsightsV1IssueModelInputDataConfig $inputDataConfig)
  {
    $this->inputDataConfig = $inputDataConfig;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1IssueModelInputDataConfig
   */
  public function getInputDataConfig()
  {
    return $this->inputDataConfig;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1IssueModelLabelStats
   */
  public function setTrainingStats(GoogleCloudContactcenterinsightsV1IssueModelLabelStats $trainingStats)
  {
    $this->trainingStats = $trainingStats;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1IssueModelLabelStats
   */
  public function getTrainingStats()
  {
    return $this->trainingStats;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1IssueModel::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1IssueModel');
