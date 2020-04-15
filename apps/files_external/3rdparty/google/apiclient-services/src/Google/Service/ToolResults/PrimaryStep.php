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

class Google_Service_ToolResults_PrimaryStep extends Google_Collection
{
  protected $collection_key = 'individualOutcome';
  protected $individualOutcomeType = 'Google_Service_ToolResults_IndividualOutcome';
  protected $individualOutcomeDataType = 'array';
  public $rollUp;

  /**
   * @param Google_Service_ToolResults_IndividualOutcome
   */
  public function setIndividualOutcome($individualOutcome)
  {
    $this->individualOutcome = $individualOutcome;
  }
  /**
   * @return Google_Service_ToolResults_IndividualOutcome
   */
  public function getIndividualOutcome()
  {
    return $this->individualOutcome;
  }
  public function setRollUp($rollUp)
  {
    $this->rollUp = $rollUp;
  }
  public function getRollUp()
  {
    return $this->rollUp;
  }
}
