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

namespace Google\Service\Analytics;

class GoalUrlDestinationDetails extends \Google\Collection
{
  protected $collection_key = 'steps';
  /**
   * @var bool
   */
  public $caseSensitive;
  /**
   * @var bool
   */
  public $firstStepRequired;
  /**
   * @var string
   */
  public $matchType;
  protected $stepsType = GoalUrlDestinationDetailsSteps::class;
  protected $stepsDataType = 'array';
  /**
   * @var string
   */
  public $url;

  /**
   * @param bool
   */
  public function setCaseSensitive($caseSensitive)
  {
    $this->caseSensitive = $caseSensitive;
  }
  /**
   * @return bool
   */
  public function getCaseSensitive()
  {
    return $this->caseSensitive;
  }
  /**
   * @param bool
   */
  public function setFirstStepRequired($firstStepRequired)
  {
    $this->firstStepRequired = $firstStepRequired;
  }
  /**
   * @return bool
   */
  public function getFirstStepRequired()
  {
    return $this->firstStepRequired;
  }
  /**
   * @param string
   */
  public function setMatchType($matchType)
  {
    $this->matchType = $matchType;
  }
  /**
   * @return string
   */
  public function getMatchType()
  {
    return $this->matchType;
  }
  /**
   * @param GoalUrlDestinationDetailsSteps[]
   */
  public function setSteps($steps)
  {
    $this->steps = $steps;
  }
  /**
   * @return GoalUrlDestinationDetailsSteps[]
   */
  public function getSteps()
  {
    return $this->steps;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoalUrlDestinationDetails::class, 'Google_Service_Analytics_GoalUrlDestinationDetails');
