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

class TestExecutionStep extends \Google\Collection
{
  protected $collection_key = 'testSuiteOverviews';
  protected $testIssuesType = TestIssue::class;
  protected $testIssuesDataType = 'array';
  protected $testSuiteOverviewsType = TestSuiteOverview::class;
  protected $testSuiteOverviewsDataType = 'array';
  protected $testTimingType = TestTiming::class;
  protected $testTimingDataType = '';
  protected $toolExecutionType = ToolExecution::class;
  protected $toolExecutionDataType = '';

  /**
   * @param TestIssue[]
   */
  public function setTestIssues($testIssues)
  {
    $this->testIssues = $testIssues;
  }
  /**
   * @return TestIssue[]
   */
  public function getTestIssues()
  {
    return $this->testIssues;
  }
  /**
   * @param TestSuiteOverview[]
   */
  public function setTestSuiteOverviews($testSuiteOverviews)
  {
    $this->testSuiteOverviews = $testSuiteOverviews;
  }
  /**
   * @return TestSuiteOverview[]
   */
  public function getTestSuiteOverviews()
  {
    return $this->testSuiteOverviews;
  }
  /**
   * @param TestTiming
   */
  public function setTestTiming(TestTiming $testTiming)
  {
    $this->testTiming = $testTiming;
  }
  /**
   * @return TestTiming
   */
  public function getTestTiming()
  {
    return $this->testTiming;
  }
  /**
   * @param ToolExecution
   */
  public function setToolExecution(ToolExecution $toolExecution)
  {
    $this->toolExecution = $toolExecution;
  }
  /**
   * @return ToolExecution
   */
  public function getToolExecution()
  {
    return $this->toolExecution;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestExecutionStep::class, 'Google_Service_ToolResults_TestExecutionStep');
