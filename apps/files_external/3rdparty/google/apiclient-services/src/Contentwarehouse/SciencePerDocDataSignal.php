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

class SciencePerDocDataSignal extends \Google\Model
{
  /**
   * @var float
   */
  public $avgCitations;
  /**
   * @var int
   */
  public $count;
  /**
   * @var int
   */
  public $geThres1Count;
  /**
   * @var int
   */
  public $geThres2Count;
  /**
   * @var int
   */
  public $index;
  /**
   * @var float
   */
  public $medianCitations;
  /**
   * @var int
   */
  public $type;
  /**
   * @var float
   */
  public $weight;

  /**
   * @param float
   */
  public function setAvgCitations($avgCitations)
  {
    $this->avgCitations = $avgCitations;
  }
  /**
   * @return float
   */
  public function getAvgCitations()
  {
    return $this->avgCitations;
  }
  /**
   * @param int
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return int
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param int
   */
  public function setGeThres1Count($geThres1Count)
  {
    $this->geThres1Count = $geThres1Count;
  }
  /**
   * @return int
   */
  public function getGeThres1Count()
  {
    return $this->geThres1Count;
  }
  /**
   * @param int
   */
  public function setGeThres2Count($geThres2Count)
  {
    $this->geThres2Count = $geThres2Count;
  }
  /**
   * @return int
   */
  public function getGeThres2Count()
  {
    return $this->geThres2Count;
  }
  /**
   * @param int
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return int
   */
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param float
   */
  public function setMedianCitations($medianCitations)
  {
    $this->medianCitations = $medianCitations;
  }
  /**
   * @return float
   */
  public function getMedianCitations()
  {
    return $this->medianCitations;
  }
  /**
   * @param int
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return int
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param float
   */
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return float
   */
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SciencePerDocDataSignal::class, 'Google_Service_Contentwarehouse_SciencePerDocDataSignal');
