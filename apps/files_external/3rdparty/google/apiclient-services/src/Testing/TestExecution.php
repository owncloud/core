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

namespace Google\Service\Testing;

class TestExecution extends \Google\Model
{
  protected $environmentType = Environment::class;
  protected $environmentDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $matrixId;
  /**
   * @var string
   */
  public $projectId;
  protected $shardType = Shard::class;
  protected $shardDataType = '';
  /**
   * @var string
   */
  public $state;
  protected $testDetailsType = TestDetails::class;
  protected $testDetailsDataType = '';
  protected $testSpecificationType = TestSpecification::class;
  protected $testSpecificationDataType = '';
  /**
   * @var string
   */
  public $timestamp;
  protected $toolResultsStepType = ToolResultsStep::class;
  protected $toolResultsStepDataType = '';

  /**
   * @param Environment
   */
  public function setEnvironment(Environment $environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return Environment
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setMatrixId($matrixId)
  {
    $this->matrixId = $matrixId;
  }
  /**
   * @return string
   */
  public function getMatrixId()
  {
    return $this->matrixId;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param Shard
   */
  public function setShard(Shard $shard)
  {
    $this->shard = $shard;
  }
  /**
   * @return Shard
   */
  public function getShard()
  {
    return $this->shard;
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
   * @param TestDetails
   */
  public function setTestDetails(TestDetails $testDetails)
  {
    $this->testDetails = $testDetails;
  }
  /**
   * @return TestDetails
   */
  public function getTestDetails()
  {
    return $this->testDetails;
  }
  /**
   * @param TestSpecification
   */
  public function setTestSpecification(TestSpecification $testSpecification)
  {
    $this->testSpecification = $testSpecification;
  }
  /**
   * @return TestSpecification
   */
  public function getTestSpecification()
  {
    return $this->testSpecification;
  }
  /**
   * @param string
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param ToolResultsStep
   */
  public function setToolResultsStep(ToolResultsStep $toolResultsStep)
  {
    $this->toolResultsStep = $toolResultsStep;
  }
  /**
   * @return ToolResultsStep
   */
  public function getToolResultsStep()
  {
    return $this->toolResultsStep;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestExecution::class, 'Google_Service_Testing_TestExecution');
