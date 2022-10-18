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

class QualityTimebasedSyntacticDate extends \Google\Model
{
  /**
   * @var string
   */
  public $bylineDate;
  /**
   * @var string
   */
  public $date;
  protected $daterangeType = QualityTimebasedSyntacticDateDateRange::class;
  protected $daterangeDataType = '';
  /**
   * @var string
   */
  public $debugInfo;
  /**
   * @var bool
   */
  public $fromExplicitTimeZone;
  /**
   * @var int
   */
  public $info;
  protected $positionType = QualityTimebasedSyntacticDatePosition::class;
  protected $positionDataType = '';
  /**
   * @var int
   */
  public $precisionMark;
  /**
   * @var bool
   */
  public $syntacticDateNotForRestrict;
  /**
   * @var string
   */
  public $timeZoneOffsetSeconds;
  /**
   * @var bool
   */
  public $trustSyntacticDateInRanking;
  /**
   * @var bool
   */
  public $useAsBylineDate;
  /**
   * @var bool
   */
  public $useInTimeZoneGuessingMode;
  /**
   * @var bool
   */
  public $useRangeInsteadOfDateForRestrict;

  /**
   * @param string
   */
  public function setBylineDate($bylineDate)
  {
    $this->bylineDate = $bylineDate;
  }
  /**
   * @return string
   */
  public function getBylineDate()
  {
    return $this->bylineDate;
  }
  /**
   * @param string
   */
  public function setDate($date)
  {
    $this->date = $date;
  }
  /**
   * @return string
   */
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param QualityTimebasedSyntacticDateDateRange
   */
  public function setDaterange(QualityTimebasedSyntacticDateDateRange $daterange)
  {
    $this->daterange = $daterange;
  }
  /**
   * @return QualityTimebasedSyntacticDateDateRange
   */
  public function getDaterange()
  {
    return $this->daterange;
  }
  /**
   * @param string
   */
  public function setDebugInfo($debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return string
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  /**
   * @param bool
   */
  public function setFromExplicitTimeZone($fromExplicitTimeZone)
  {
    $this->fromExplicitTimeZone = $fromExplicitTimeZone;
  }
  /**
   * @return bool
   */
  public function getFromExplicitTimeZone()
  {
    return $this->fromExplicitTimeZone;
  }
  /**
   * @param int
   */
  public function setInfo($info)
  {
    $this->info = $info;
  }
  /**
   * @return int
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param QualityTimebasedSyntacticDatePosition
   */
  public function setPosition(QualityTimebasedSyntacticDatePosition $position)
  {
    $this->position = $position;
  }
  /**
   * @return QualityTimebasedSyntacticDatePosition
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param int
   */
  public function setPrecisionMark($precisionMark)
  {
    $this->precisionMark = $precisionMark;
  }
  /**
   * @return int
   */
  public function getPrecisionMark()
  {
    return $this->precisionMark;
  }
  /**
   * @param bool
   */
  public function setSyntacticDateNotForRestrict($syntacticDateNotForRestrict)
  {
    $this->syntacticDateNotForRestrict = $syntacticDateNotForRestrict;
  }
  /**
   * @return bool
   */
  public function getSyntacticDateNotForRestrict()
  {
    return $this->syntacticDateNotForRestrict;
  }
  /**
   * @param string
   */
  public function setTimeZoneOffsetSeconds($timeZoneOffsetSeconds)
  {
    $this->timeZoneOffsetSeconds = $timeZoneOffsetSeconds;
  }
  /**
   * @return string
   */
  public function getTimeZoneOffsetSeconds()
  {
    return $this->timeZoneOffsetSeconds;
  }
  /**
   * @param bool
   */
  public function setTrustSyntacticDateInRanking($trustSyntacticDateInRanking)
  {
    $this->trustSyntacticDateInRanking = $trustSyntacticDateInRanking;
  }
  /**
   * @return bool
   */
  public function getTrustSyntacticDateInRanking()
  {
    return $this->trustSyntacticDateInRanking;
  }
  /**
   * @param bool
   */
  public function setUseAsBylineDate($useAsBylineDate)
  {
    $this->useAsBylineDate = $useAsBylineDate;
  }
  /**
   * @return bool
   */
  public function getUseAsBylineDate()
  {
    return $this->useAsBylineDate;
  }
  /**
   * @param bool
   */
  public function setUseInTimeZoneGuessingMode($useInTimeZoneGuessingMode)
  {
    $this->useInTimeZoneGuessingMode = $useInTimeZoneGuessingMode;
  }
  /**
   * @return bool
   */
  public function getUseInTimeZoneGuessingMode()
  {
    return $this->useInTimeZoneGuessingMode;
  }
  /**
   * @param bool
   */
  public function setUseRangeInsteadOfDateForRestrict($useRangeInsteadOfDateForRestrict)
  {
    $this->useRangeInsteadOfDateForRestrict = $useRangeInsteadOfDateForRestrict;
  }
  /**
   * @return bool
   */
  public function getUseRangeInsteadOfDateForRestrict()
  {
    return $this->useRangeInsteadOfDateForRestrict;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityTimebasedSyntacticDate::class, 'Google_Service_Contentwarehouse_QualityTimebasedSyntacticDate');
