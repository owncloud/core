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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3RolloutConfig extends \Google\Collection
{
  protected $collection_key = 'rolloutSteps';
  /**
   * @var string
   */
  public $failureCondition;
  /**
   * @var string
   */
  public $rolloutCondition;
  protected $rolloutStepsType = GoogleCloudDialogflowCxV3RolloutConfigRolloutStep::class;
  protected $rolloutStepsDataType = 'array';

  /**
   * @param string
   */
  public function setFailureCondition($failureCondition)
  {
    $this->failureCondition = $failureCondition;
  }
  /**
   * @return string
   */
  public function getFailureCondition()
  {
    return $this->failureCondition;
  }
  /**
   * @param string
   */
  public function setRolloutCondition($rolloutCondition)
  {
    $this->rolloutCondition = $rolloutCondition;
  }
  /**
   * @return string
   */
  public function getRolloutCondition()
  {
    return $this->rolloutCondition;
  }
  /**
   * @param GoogleCloudDialogflowCxV3RolloutConfigRolloutStep[]
   */
  public function setRolloutSteps($rolloutSteps)
  {
    $this->rolloutSteps = $rolloutSteps;
  }
  /**
   * @return GoogleCloudDialogflowCxV3RolloutConfigRolloutStep[]
   */
  public function getRolloutSteps()
  {
    return $this->rolloutSteps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3RolloutConfig::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3RolloutConfig');
