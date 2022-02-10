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

class PrimaryStep extends \Google\Collection
{
  protected $collection_key = 'individualOutcome';
  protected $individualOutcomeType = IndividualOutcome::class;
  protected $individualOutcomeDataType = 'array';
  /**
   * @var string
   */
  public $rollUp;

  /**
   * @param IndividualOutcome[]
   */
  public function setIndividualOutcome($individualOutcome)
  {
    $this->individualOutcome = $individualOutcome;
  }
  /**
   * @return IndividualOutcome[]
   */
  public function getIndividualOutcome()
  {
    return $this->individualOutcome;
  }
  /**
   * @param string
   */
  public function setRollUp($rollUp)
  {
    $this->rollUp = $rollUp;
  }
  /**
   * @return string
   */
  public function getRollUp()
  {
    return $this->rollUp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrimaryStep::class, 'Google_Service_ToolResults_PrimaryStep');
