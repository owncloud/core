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

class NlpSemanticParsingModelsRecurrence extends \Google\Model
{
  protected $dailyPatternType = NlpSemanticParsingModelsRecurrenceDailyPattern::class;
  protected $dailyPatternDataType = '';
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  /**
   * @var int
   */
  public $every;
  /**
   * @var string
   */
  public $frequency;
  protected $monthlyPatternType = NlpSemanticParsingModelsRecurrenceMonthlyPattern::class;
  protected $monthlyPatternDataType = '';
  /**
   * @var int
   */
  public $numInstancesInFrequency;
  protected $recurrenceEndType = NlpSemanticParsingModelsRecurrenceRecurrenceEnd::class;
  protected $recurrenceEndDataType = '';
  protected $recurrenceStartType = NlpSemanticParsingModelsRecurrenceRecurrenceStart::class;
  protected $recurrenceStartDataType = '';
  protected $timeType = NlpSemanticParsingDatetimeDateTime::class;
  protected $timeDataType = '';
  protected $weeklyPatternType = NlpSemanticParsingModelsRecurrenceWeeklyPattern::class;
  protected $weeklyPatternDataType = '';
  protected $yearlyPatternType = NlpSemanticParsingModelsRecurrenceYearlyPattern::class;
  protected $yearlyPatternDataType = '';

  /**
   * @param NlpSemanticParsingModelsRecurrenceDailyPattern
   */
  public function setDailyPattern(NlpSemanticParsingModelsRecurrenceDailyPattern $dailyPattern)
  {
    $this->dailyPattern = $dailyPattern;
  }
  /**
   * @return NlpSemanticParsingModelsRecurrenceDailyPattern
   */
  public function getDailyPattern()
  {
    return $this->dailyPattern;
  }
  /**
   * @param NlpSemanticParsingAnnotationEvalData
   */
  public function setEvalData(NlpSemanticParsingAnnotationEvalData $evalData)
  {
    $this->evalData = $evalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData
   */
  public function getEvalData()
  {
    return $this->evalData;
  }
  /**
   * @param int
   */
  public function setEvery($every)
  {
    $this->every = $every;
  }
  /**
   * @return int
   */
  public function getEvery()
  {
    return $this->every;
  }
  /**
   * @param string
   */
  public function setFrequency($frequency)
  {
    $this->frequency = $frequency;
  }
  /**
   * @return string
   */
  public function getFrequency()
  {
    return $this->frequency;
  }
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
   * @param int
   */
  public function setNumInstancesInFrequency($numInstancesInFrequency)
  {
    $this->numInstancesInFrequency = $numInstancesInFrequency;
  }
  /**
   * @return int
   */
  public function getNumInstancesInFrequency()
  {
    return $this->numInstancesInFrequency;
  }
  /**
   * @param NlpSemanticParsingModelsRecurrenceRecurrenceEnd
   */
  public function setRecurrenceEnd(NlpSemanticParsingModelsRecurrenceRecurrenceEnd $recurrenceEnd)
  {
    $this->recurrenceEnd = $recurrenceEnd;
  }
  /**
   * @return NlpSemanticParsingModelsRecurrenceRecurrenceEnd
   */
  public function getRecurrenceEnd()
  {
    return $this->recurrenceEnd;
  }
  /**
   * @param NlpSemanticParsingModelsRecurrenceRecurrenceStart
   */
  public function setRecurrenceStart(NlpSemanticParsingModelsRecurrenceRecurrenceStart $recurrenceStart)
  {
    $this->recurrenceStart = $recurrenceStart;
  }
  /**
   * @return NlpSemanticParsingModelsRecurrenceRecurrenceStart
   */
  public function getRecurrenceStart()
  {
    return $this->recurrenceStart;
  }
  /**
   * @param NlpSemanticParsingDatetimeDateTime
   */
  public function setTime(NlpSemanticParsingDatetimeDateTime $time)
  {
    $this->time = $time;
  }
  /**
   * @return NlpSemanticParsingDatetimeDateTime
   */
  public function getTime()
  {
    return $this->time;
  }
  /**
   * @param NlpSemanticParsingModelsRecurrenceWeeklyPattern
   */
  public function setWeeklyPattern(NlpSemanticParsingModelsRecurrenceWeeklyPattern $weeklyPattern)
  {
    $this->weeklyPattern = $weeklyPattern;
  }
  /**
   * @return NlpSemanticParsingModelsRecurrenceWeeklyPattern
   */
  public function getWeeklyPattern()
  {
    return $this->weeklyPattern;
  }
  /**
   * @param NlpSemanticParsingModelsRecurrenceYearlyPattern
   */
  public function setYearlyPattern(NlpSemanticParsingModelsRecurrenceYearlyPattern $yearlyPattern)
  {
    $this->yearlyPattern = $yearlyPattern;
  }
  /**
   * @return NlpSemanticParsingModelsRecurrenceYearlyPattern
   */
  public function getYearlyPattern()
  {
    return $this->yearlyPattern;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsRecurrence::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsRecurrence');
