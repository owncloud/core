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

namespace Google\Service\Contentwarehouse;

class GoogleAssistantEmbeddedV1FitnessActivity extends \Google\Model
{
  /**
   * @var string
   */
  public $activityId;
  /**
   * @var string
   */
  public $mostRecentStartTime;
  /**
   * @var string
   */
  public $previouslyAccumulatedDuration;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setActivityId($activityId)
  {
    $this->activityId = $activityId;
  }
  /**
   * @return string
   */
  public function getActivityId()
  {
    return $this->activityId;
  }
  /**
   * @param string
   */
  public function setMostRecentStartTime($mostRecentStartTime)
  {
    $this->mostRecentStartTime = $mostRecentStartTime;
  }
  /**
   * @return string
   */
  public function getMostRecentStartTime()
  {
    return $this->mostRecentStartTime;
  }
  /**
   * @param string
   */
  public function setPreviouslyAccumulatedDuration($previouslyAccumulatedDuration)
  {
    $this->previouslyAccumulatedDuration = $previouslyAccumulatedDuration;
  }
  /**
   * @return string
   */
  public function getPreviouslyAccumulatedDuration()
  {
    return $this->previouslyAccumulatedDuration;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAssistantEmbeddedV1FitnessActivity::class, 'Google_Service_Contentwarehouse_GoogleAssistantEmbeddedV1FitnessActivity');
