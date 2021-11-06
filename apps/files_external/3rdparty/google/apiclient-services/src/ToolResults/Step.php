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

namespace Google\Service\ToolResults;

class Step extends \Google\Collection
{
  protected $collection_key = 'labels';
  protected $completionTimeType = Timestamp::class;
  protected $completionTimeDataType = '';
  protected $creationTimeType = Timestamp::class;
  protected $creationTimeDataType = '';
  public $description;
  protected $deviceUsageDurationType = Duration::class;
  protected $deviceUsageDurationDataType = '';
  protected $dimensionValueType = StepDimensionValueEntry::class;
  protected $dimensionValueDataType = 'array';
  public $hasImages;
  protected $labelsType = StepLabelsEntry::class;
  protected $labelsDataType = 'array';
  protected $multiStepType = MultiStep::class;
  protected $multiStepDataType = '';
  public $name;
  protected $outcomeType = Outcome::class;
  protected $outcomeDataType = '';
  protected $runDurationType = Duration::class;
  protected $runDurationDataType = '';
  public $state;
  public $stepId;
  protected $testExecutionStepType = TestExecutionStep::class;
  protected $testExecutionStepDataType = '';
  protected $toolExecutionStepType = ToolExecutionStep::class;
  protected $toolExecutionStepDataType = '';

  /**
   * @param Timestamp
   */
  public function setCompletionTime(Timestamp $completionTime)
  {
    $this->completionTime = $completionTime;
  }
  /**
   * @return Timestamp
   */
  public function getCompletionTime()
  {
    return $this->completionTime;
  }
  /**
   * @param Timestamp
   */
  public function setCreationTime(Timestamp $creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return Timestamp
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Duration
   */
  public function setDeviceUsageDuration(Duration $deviceUsageDuration)
  {
    $this->deviceUsageDuration = $deviceUsageDuration;
  }
  /**
   * @return Duration
   */
  public function getDeviceUsageDuration()
  {
    return $this->deviceUsageDuration;
  }
  /**
   * @param StepDimensionValueEntry[]
   */
  public function setDimensionValue($dimensionValue)
  {
    $this->dimensionValue = $dimensionValue;
  }
  /**
   * @return StepDimensionValueEntry[]
   */
  public function getDimensionValue()
  {
    return $this->dimensionValue;
  }
  public function setHasImages($hasImages)
  {
    $this->hasImages = $hasImages;
  }
  public function getHasImages()
  {
    return $this->hasImages;
  }
  /**
   * @param StepLabelsEntry[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return StepLabelsEntry[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param MultiStep
   */
  public function setMultiStep(MultiStep $multiStep)
  {
    $this->multiStep = $multiStep;
  }
  /**
   * @return MultiStep
   */
  public function getMultiStep()
  {
    return $this->multiStep;
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
   * @param Outcome
   */
  public function setOutcome(Outcome $outcome)
  {
    $this->outcome = $outcome;
  }
  /**
   * @return Outcome
   */
  public function getOutcome()
  {
    return $this->outcome;
  }
  /**
   * @param Duration
   */
  public function setRunDuration(Duration $runDuration)
  {
    $this->runDuration = $runDuration;
  }
  /**
   * @return Duration
   */
  public function getRunDuration()
  {
    return $this->runDuration;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }
  public function getStepId()
  {
    return $this->stepId;
  }
  /**
   * @param TestExecutionStep
   */
  public function setTestExecutionStep(TestExecutionStep $testExecutionStep)
  {
    $this->testExecutionStep = $testExecutionStep;
  }
  /**
   * @return TestExecutionStep
   */
  public function getTestExecutionStep()
  {
    return $this->testExecutionStep;
  }
  /**
   * @param ToolExecutionStep
   */
  public function setToolExecutionStep(ToolExecutionStep $toolExecutionStep)
  {
    $this->toolExecutionStep = $toolExecutionStep;
  }
  /**
   * @return ToolExecutionStep
   */
  public function getToolExecutionStep()
  {
    return $this->toolExecutionStep;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Step::class, 'Google_Service_ToolResults_Step');
