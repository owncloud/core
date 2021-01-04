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

class Google_Service_ToolResults_MergedResult extends Google_Collection
{
  protected $collection_key = 'testSuiteOverviews';
  protected $outcomeType = 'Google_Service_ToolResults_Outcome';
  protected $outcomeDataType = '';
  public $state;
  protected $testSuiteOverviewsType = 'Google_Service_ToolResults_TestSuiteOverview';
  protected $testSuiteOverviewsDataType = 'array';

  /**
   * @param Google_Service_ToolResults_Outcome
   */
  public function setOutcome(Google_Service_ToolResults_Outcome $outcome)
  {
    $this->outcome = $outcome;
  }
  /**
   * @return Google_Service_ToolResults_Outcome
   */
  public function getOutcome()
  {
    return $this->outcome;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param Google_Service_ToolResults_TestSuiteOverview[]
   */
  public function setTestSuiteOverviews($testSuiteOverviews)
  {
    $this->testSuiteOverviews = $testSuiteOverviews;
  }
  /**
   * @return Google_Service_ToolResults_TestSuiteOverview[]
   */
  public function getTestSuiteOverviews()
  {
    return $this->testSuiteOverviews;
  }
}
