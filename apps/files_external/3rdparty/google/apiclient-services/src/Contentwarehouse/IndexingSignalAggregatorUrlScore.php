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

class IndexingSignalAggregatorUrlScore extends \Google\Model
{
  /**
   * @var int
   */
  public $dsacNumWeeklyPerfRecords;
  /**
   * @var string
   */
  public $eligibleExperimentalLayer;
  /**
   * @var string
   */
  public $firstServedTimestamp;
  /**
   * @var bool
   */
  public $isImportant;
  public $score;
  /**
   * @var string
   */
  public $url;
  public $weight;

  /**
   * @param int
   */
  public function setDsacNumWeeklyPerfRecords($dsacNumWeeklyPerfRecords)
  {
    $this->dsacNumWeeklyPerfRecords = $dsacNumWeeklyPerfRecords;
  }
  /**
   * @return int
   */
  public function getDsacNumWeeklyPerfRecords()
  {
    return $this->dsacNumWeeklyPerfRecords;
  }
  /**
   * @param string
   */
  public function setEligibleExperimentalLayer($eligibleExperimentalLayer)
  {
    $this->eligibleExperimentalLayer = $eligibleExperimentalLayer;
  }
  /**
   * @return string
   */
  public function getEligibleExperimentalLayer()
  {
    return $this->eligibleExperimentalLayer;
  }
  /**
   * @param string
   */
  public function setFirstServedTimestamp($firstServedTimestamp)
  {
    $this->firstServedTimestamp = $firstServedTimestamp;
  }
  /**
   * @return string
   */
  public function getFirstServedTimestamp()
  {
    return $this->firstServedTimestamp;
  }
  /**
   * @param bool
   */
  public function setIsImportant($isImportant)
  {
    $this->isImportant = $isImportant;
  }
  /**
   * @return bool
   */
  public function getIsImportant()
  {
    return $this->isImportant;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
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
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingSignalAggregatorUrlScore::class, 'Google_Service_Contentwarehouse_IndexingSignalAggregatorUrlScore');
