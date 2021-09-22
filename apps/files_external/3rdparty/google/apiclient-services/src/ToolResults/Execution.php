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

class Execution extends \Google\Collection
{
  protected $collection_key = 'dimensionDefinitions';
  protected $completionTimeType = Timestamp::class;
  protected $completionTimeDataType = '';
  protected $creationTimeType = Timestamp::class;
  protected $creationTimeDataType = '';
  protected $dimensionDefinitionsType = MatrixDimensionDefinition::class;
  protected $dimensionDefinitionsDataType = 'array';
  public $executionId;
  protected $outcomeType = Outcome::class;
  protected $outcomeDataType = '';
  protected $specificationType = Specification::class;
  protected $specificationDataType = '';
  public $state;
  public $testExecutionMatrixId;

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
  /**
   * @param MatrixDimensionDefinition[]
   */
  public function setDimensionDefinitions($dimensionDefinitions)
  {
    $this->dimensionDefinitions = $dimensionDefinitions;
  }
  /**
   * @return MatrixDimensionDefinition[]
   */
  public function getDimensionDefinitions()
  {
    return $this->dimensionDefinitions;
  }
  public function setExecutionId($executionId)
  {
    $this->executionId = $executionId;
  }
  public function getExecutionId()
  {
    return $this->executionId;
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
   * @param Specification
   */
  public function setSpecification(Specification $specification)
  {
    $this->specification = $specification;
  }
  /**
   * @return Specification
   */
  public function getSpecification()
  {
    return $this->specification;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTestExecutionMatrixId($testExecutionMatrixId)
  {
    $this->testExecutionMatrixId = $testExecutionMatrixId;
  }
  public function getTestExecutionMatrixId()
  {
    return $this->testExecutionMatrixId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Execution::class, 'Google_Service_ToolResults_Execution');
