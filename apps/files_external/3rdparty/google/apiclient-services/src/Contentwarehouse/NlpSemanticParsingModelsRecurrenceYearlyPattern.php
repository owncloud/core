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

class NlpSemanticParsingModelsRecurrenceYearlyPattern extends \Google\Collection
{
  protected $collection_key = 'yearMonth';
  protected $monthlyPatternType = NlpSemanticParsingModelsRecurrenceMonthlyPattern::class;
  protected $monthlyPatternDataType = '';
  /**
   * @var string[]
   */
  public $yearMonth;

  /**
   * @param NlpSemanticParsingModelsRecurrenceMonthlyPattern
   */
  public function setMonthlyPattern(NlpSemanticParsingModelsRecurrenceMonthlyPattern $monthlyPattern)
  {
    $this->monthlyPattern = $monthlyPattern;
  }
  /**
   * @return NlpSemanticParsingModelsRecurrenceMonthlyPattern
   */
  public function getMonthlyPattern()
  {
    return $this->monthlyPattern;
  }
  /**
   * @param string[]
   */
  public function setYearMonth($yearMonth)
  {
    $this->yearMonth = $yearMonth;
  }
  /**
   * @return string[]
   */
  public function getYearMonth()
  {
    return $this->yearMonth;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsRecurrenceYearlyPattern::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsRecurrenceYearlyPattern');
