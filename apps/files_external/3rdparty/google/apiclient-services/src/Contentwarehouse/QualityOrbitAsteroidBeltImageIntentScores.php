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

namespace Google\Service\Contentwarehouse;

class QualityOrbitAsteroidBeltImageIntentScores extends \Google\Collection
{
  protected $collection_key = 'scores';
  /**
   * @var string[]
   */
  public $intents;
  /**
   * @var int[]
   */
  public $scores;

  /**
   * @param string[]
   */
  public function setIntents($intents)
  {
    $this->intents = $intents;
  }
  /**
   * @return string[]
   */
  public function getIntents()
  {
    return $this->intents;
  }
  /**
   * @param int[]
   */
  public function setScores($scores)
  {
    $this->scores = $scores;
  }
  /**
   * @return int[]
   */
  public function getScores()
  {
    return $this->scores;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityOrbitAsteroidBeltImageIntentScores::class, 'Google_Service_Contentwarehouse_QualityOrbitAsteroidBeltImageIntentScores');
