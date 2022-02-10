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

class TestMatrix extends \Google\Collection
{
  protected $collection_key = 'testExecutions';
  protected $clientInfoType = ClientInfo::class;
  protected $clientInfoDataType = '';
  protected $environmentMatrixType = EnvironmentMatrix::class;
  protected $environmentMatrixDataType = '';
  /**
   * @var bool
   */
  public $failFast;
  /**
   * @var int
   */
  public $flakyTestAttempts;
  /**
   * @var string
   */
  public $invalidMatrixDetails;
  /**
   * @var string
   */
  public $outcomeSummary;
  /**
   * @var string
   */
  public $projectId;
  protected $resultStorageType = ResultStorage::class;
  protected $resultStorageDataType = '';
  /**
   * @var string
   */
  public $state;
  protected $testExecutionsType = TestExecution::class;
  protected $testExecutionsDataType = 'array';
  /**
   * @var string
   */
  public $testMatrixId;
  protected $testSpecificationType = TestSpecification::class;
  protected $testSpecificationDataType = '';
  /**
   * @var string
   */
  public $timestamp;

  /**
   * @param ClientInfo
   */
  public function setClientInfo(ClientInfo $clientInfo)
  {
    $this->clientInfo = $clientInfo;
  }
  /**
   * @return ClientInfo
   */
  public function getClientInfo()
  {
    return $this->clientInfo;
  }
  /**
   * @param EnvironmentMatrix
   */
  public function setEnvironmentMatrix(EnvironmentMatrix $environmentMatrix)
  {
    $this->environmentMatrix = $environmentMatrix;
  }
  /**
   * @return EnvironmentMatrix
   */
  public function getEnvironmentMatrix()
  {
    return $this->environmentMatrix;
  }
  /**
   * @param bool
   */
  public function setFailFast($failFast)
  {
    $this->failFast = $failFast;
  }
  /**
   * @return bool
   */
  public function getFailFast()
  {
    return $this->failFast;
  }
  /**
   * @param int
   */
  public function setFlakyTestAttempts($flakyTestAttempts)
  {
    $this->flakyTestAttempts = $flakyTestAttempts;
  }
  /**
   * @return int
   */
  public function getFlakyTestAttempts()
  {
    return $this->flakyTestAttempts;
  }
  /**
   * @param string
   */
  public function setInvalidMatrixDetails($invalidMatrixDetails)
  {
    $this->invalidMatrixDetails = $invalidMatrixDetails;
  }
  /**
   * @return string
   */
  public function getInvalidMatrixDetails()
  {
    return $this->invalidMatrixDetails;
  }
  /**
   * @param string
   */
  public function setOutcomeSummary($outcomeSummary)
  {
    $this->outcomeSummary = $outcomeSummary;
  }
  /**
   * @return string
   */
  public function getOutcomeSummary()
  {
    return $this->outcomeSummary;
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
   * @param ResultStorage
   */
  public function setResultStorage(ResultStorage $resultStorage)
  {
    $this->resultStorage = $resultStorage;
  }
  /**
   * @return ResultStorage
   */
  public function getResultStorage()
  {
    return $this->resultStorage;
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
   * @param TestExecution[]
   */
  public function setTestExecutions($testExecutions)
  {
    $this->testExecutions = $testExecutions;
  }
  /**
   * @return TestExecution[]
   */
  public function getTestExecutions()
  {
    return $this->testExecutions;
  }
  /**
   * @param string
   */
  public function setTestMatrixId($testMatrixId)
  {
    $this->testMatrixId = $testMatrixId;
  }
  /**
   * @return string
   */
  public function getTestMatrixId()
  {
    return $this->testMatrixId;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestMatrix::class, 'Google_Service_Testing_TestMatrix');
