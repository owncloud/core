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
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $displayName;
  protected $inputDataConfigType = GoogleCloudContactcenterinsightsV1IssueModelInputDataConfig::class;
  protected $inputDataConfigDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $state;
  protected $trainingStatsType = GoogleCloudContactcenterinsightsV1IssueModelLabelStats::class;
  protected $trainingStatsDataType = '';
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
class_alias(GoogleCloudContactcenterinsightsV1IssueModel::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1IssueModel');
