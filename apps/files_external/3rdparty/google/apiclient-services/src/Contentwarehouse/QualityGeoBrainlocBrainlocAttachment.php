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

class QualityGeoBrainlocBrainlocAttachment extends \Google\Collection
{
  protected $collection_key = 'topStatesVocabIds';
  /**
   * @var int
   */
  public $brainlocVersion;
  /**
   * @var int[]
   */
  public $topCitiesRawScores;
  /**
   * @var int[]
   */
  public $topCitiesVocabIds;
  /**
   * @var int[]
   */
  public $topCountiesRawScores;
  /**
   * @var int[]
   */
  public $topCountiesVocabIds;
  /**
   * @var int[]
   */
  public $topCountriesRawScores;
  /**
   * @var int[]
   */
  public $topCountriesVocabIds;
  /**
   * @var int[]
   */
  public $topStatesRawScores;
  /**
   * @var int[]
   */
  public $topStatesVocabIds;

  /**
   * @param int
   */
  public function setBrainlocVersion($brainlocVersion)
  {
    $this->brainlocVersion = $brainlocVersion;
  }
  /**
   * @return int
   */
  public function getBrainlocVersion()
  {
    return $this->brainlocVersion;
  }
  /**
   * @param int[]
   */
  public function setTopCitiesRawScores($topCitiesRawScores)
  {
    $this->topCitiesRawScores = $topCitiesRawScores;
  }
  /**
   * @return int[]
   */
  public function getTopCitiesRawScores()
  {
    return $this->topCitiesRawScores;
  }
  /**
   * @param int[]
   */
  public function setTopCitiesVocabIds($topCitiesVocabIds)
  {
    $this->topCitiesVocabIds = $topCitiesVocabIds;
  }
  /**
   * @return int[]
   */
  public function getTopCitiesVocabIds()
  {
    return $this->topCitiesVocabIds;
  }
  /**
   * @param int[]
   */
  public function setTopCountiesRawScores($topCountiesRawScores)
  {
    $this->topCountiesRawScores = $topCountiesRawScores;
  }
  /**
   * @return int[]
   */
  public function getTopCountiesRawScores()
  {
    return $this->topCountiesRawScores;
  }
  /**
   * @param int[]
   */
  public function setTopCountiesVocabIds($topCountiesVocabIds)
  {
    $this->topCountiesVocabIds = $topCountiesVocabIds;
  }
  /**
   * @return int[]
   */
  public function getTopCountiesVocabIds()
  {
    return $this->topCountiesVocabIds;
  }
  /**
   * @param int[]
   */
  public function setTopCountriesRawScores($topCountriesRawScores)
  {
    $this->topCountriesRawScores = $topCountriesRawScores;
  }
  /**
   * @return int[]
   */
  public function getTopCountriesRawScores()
  {
    return $this->topCountriesRawScores;
  }
  /**
   * @param int[]
   */
  public function setTopCountriesVocabIds($topCountriesVocabIds)
  {
    $this->topCountriesVocabIds = $topCountriesVocabIds;
  }
  /**
   * @return int[]
   */
  public function getTopCountriesVocabIds()
  {
    return $this->topCountriesVocabIds;
  }
  /**
   * @param int[]
   */
  public function setTopStatesRawScores($topStatesRawScores)
  {
    $this->topStatesRawScores = $topStatesRawScores;
  }
  /**
   * @return int[]
   */
  public function getTopStatesRawScores()
  {
    return $this->topStatesRawScores;
  }
  /**
   * @param int[]
   */
  public function setTopStatesVocabIds($topStatesVocabIds)
  {
    $this->topStatesVocabIds = $topStatesVocabIds;
  }
  /**
   * @return int[]
   */
  public function getTopStatesVocabIds()
  {
    return $this->topStatesVocabIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityGeoBrainlocBrainlocAttachment::class, 'Google_Service_Contentwarehouse_QualityGeoBrainlocBrainlocAttachment');
