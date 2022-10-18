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

class NlpSemanticParsingDatetimeTargetToFetch extends \Google\Collection
{
  protected $collection_key = 'weekday';
  protected $eventType = NlpSemanticParsingDatetimeEvent::class;
  protected $eventDataType = '';
  /**
   * @var string
   */
  public $fuzzyRange;
  /**
   * @var string
   */
  public $month;
  /**
   * @var string
   */
  public $quarter;
  /**
   * @var string
   */
  public $reference;
  /**
   * @var string
   */
  public $season;
  /**
   * @var string
   */
  public $unit;
  /**
   * @var string[]
   */
  public $weekday;

  /**
   * @param NlpSemanticParsingDatetimeEvent
   */
  public function setEvent(NlpSemanticParsingDatetimeEvent $event)
  {
    $this->event = $event;
  }
  /**
   * @return NlpSemanticParsingDatetimeEvent
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param string
   */
  public function setFuzzyRange($fuzzyRange)
  {
    $this->fuzzyRange = $fuzzyRange;
  }
  /**
   * @return string
   */
  public function getFuzzyRange()
  {
    return $this->fuzzyRange;
  }
  /**
   * @param string
   */
  public function setMonth($month)
  {
    $this->month = $month;
  }
  /**
   * @return string
   */
  public function getMonth()
  {
    return $this->month;
  }
  /**
   * @param string
   */
  public function setQuarter($quarter)
  {
    $this->quarter = $quarter;
  }
  /**
   * @return string
   */
  public function getQuarter()
  {
    return $this->quarter;
  }
  /**
   * @param string
   */
  public function setReference($reference)
  {
    $this->reference = $reference;
  }
  /**
   * @return string
   */
  public function getReference()
  {
    return $this->reference;
  }
  /**
   * @param string
   */
  public function setSeason($season)
  {
    $this->season = $season;
  }
  /**
   * @return string
   */
  public function getSeason()
  {
    return $this->season;
  }
  /**
   * @param string
   */
  public function setUnit($unit)
  {
    $this->unit = $unit;
  }
  /**
   * @return string
   */
  public function getUnit()
  {
    return $this->unit;
  }
  /**
   * @param string[]
   */
  public function setWeekday($weekday)
  {
    $this->weekday = $weekday;
  }
  /**
   * @return string[]
   */
  public function getWeekday()
  {
    return $this->weekday;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeTargetToFetch::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeTargetToFetch');
