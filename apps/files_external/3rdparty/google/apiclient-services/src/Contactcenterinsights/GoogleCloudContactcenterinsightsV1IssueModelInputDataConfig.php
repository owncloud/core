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

class GoogleCloudContactcenterinsightsV1IssueModelInputDataConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $filter;
  /**
   * @var string
   */
  public $medium;
  /**
   * @var string
   */
  public $trainingConversationsCount;

  /**
   * @param string
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return string
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param string
   */
  public function setMedium($medium)
  {
    $this->medium = $medium;
  }
  /**
   * @return string
   */
  public function getMedium()
  {
    return $this->medium;
  }
  /**
   * @param string
   */
  public function setTrainingConversationsCount($trainingConversationsCount)
  {
    $this->trainingConversationsCount = $trainingConversationsCount;
  }
  /**
   * @return string
   */
  public function getTrainingConversationsCount()
  {
    return $this->trainingConversationsCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1IssueModelInputDataConfig::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1IssueModelInputDataConfig');
