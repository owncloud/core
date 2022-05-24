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

namespace Google\Service\FirebaseRules;

class TestRulesetResponse extends \Google\Collection
{
  protected $collection_key = 'testResults';
  protected $issuesType = Issue::class;
  protected $issuesDataType = 'array';
  protected $testResultsType = TestResult::class;
  protected $testResultsDataType = 'array';

  /**
   * @param Issue[]
   */
  public function setIssues($issues)
  {
    $this->issues = $issues;
  }
  /**
   * @return Issue[]
   */
  public function getIssues()
  {
    return $this->issues;
  }
  /**
   * @param TestResult[]
   */
  public function setTestResults($testResults)
  {
    $this->testResults = $testResults;
  }
  /**
   * @return TestResult[]
   */
  public function getTestResults()
  {
    return $this->testResults;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestRulesetResponse::class, 'Google_Service_FirebaseRules_TestRulesetResponse');
