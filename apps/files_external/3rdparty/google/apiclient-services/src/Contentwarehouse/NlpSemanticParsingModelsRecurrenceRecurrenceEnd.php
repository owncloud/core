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

class NlpSemanticParsingModelsRecurrenceRecurrenceEnd extends \Google\Model
{
  /**
   * @var bool
   */
  public $autoRenew;
  protected $autoRenewUntilType = NlpSemanticParsingDateTimeAnnotation::class;
  protected $autoRenewUntilDataType = '';
  protected $endDateTimeType = NlpSemanticParsingDateTimeAnnotation::class;
  protected $endDateTimeDataType = '';
  /**
   * @var string
   */
  public $endMillis;
  /**
   * @var int
   */
  public $numOccurrences;

  /**
   * @param bool
   */
  public function setAutoRenew($autoRenew)
  {
    $this->autoRenew = $autoRenew;
  }
  /**
   * @return bool
   */
  public function getAutoRenew()
  {
    return $this->autoRenew;
  }
  /**
   * @param NlpSemanticParsingDateTimeAnnotation
   */
  public function setAutoRenewUntil(NlpSemanticParsingDateTimeAnnotation $autoRenewUntil)
  {
    $this->autoRenewUntil = $autoRenewUntil;
  }
  /**
   * @return NlpSemanticParsingDateTimeAnnotation
   */
  public function getAutoRenewUntil()
  {
    return $this->autoRenewUntil;
  }
  /**
   * @param NlpSemanticParsingDateTimeAnnotation
   */
  public function setEndDateTime(NlpSemanticParsingDateTimeAnnotation $endDateTime)
  {
    $this->endDateTime = $endDateTime;
  }
  /**
   * @return NlpSemanticParsingDateTimeAnnotation
   */
  public function getEndDateTime()
  {
    return $this->endDateTime;
  }
  /**
   * @param string
   */
  public function setEndMillis($endMillis)
  {
    $this->endMillis = $endMillis;
  }
  /**
   * @return string
   */
  public function getEndMillis()
  {
    return $this->endMillis;
  }
  /**
   * @param int
   */
  public function setNumOccurrences($numOccurrences)
  {
    $this->numOccurrences = $numOccurrences;
  }
  /**
   * @return int
   */
  public function getNumOccurrences()
  {
    return $this->numOccurrences;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsRecurrenceRecurrenceEnd::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsRecurrenceRecurrenceEnd');
