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

class GoogleCloudDialogflowCxV3ContinuousTestResult extends \Google\Collection
{
  protected $collection_key = 'testCaseResults';
  public $name;
  public $result;
  public $runTime;
  public $testCaseResults;

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setResult($result)
  {
    $this->result = $result;
  }
  public function getResult()
  {
    return $this->result;
  }
  public function setRunTime($runTime)
  {
    $this->runTime = $runTime;
  }
  public function getRunTime()
  {
    return $this->runTime;
  }
  public function setTestCaseResults($testCaseResults)
  {
    $this->testCaseResults = $testCaseResults;
  }
  public function getTestCaseResults()
  {
    return $this->testCaseResults;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3ContinuousTestResult::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ContinuousTestResult');
