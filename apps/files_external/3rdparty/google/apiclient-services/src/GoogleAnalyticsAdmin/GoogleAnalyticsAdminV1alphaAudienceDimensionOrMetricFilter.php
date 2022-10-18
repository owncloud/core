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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilter extends \Google\Model
{
  /**
   * @var bool
   */
  public $atAnyPointInTime;
  protected $betweenFilterType = GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterBetweenFilter::class;
  protected $betweenFilterDataType = '';
  /**
   * @var string
   */
  public $fieldName;
  /**
   * @var int
   */
  public $inAnyNDayPeriod;
  protected $inListFilterType = GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterInListFilter::class;
  protected $inListFilterDataType = '';
  protected $numericFilterType = GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterNumericFilter::class;
  protected $numericFilterDataType = '';
  protected $stringFilterType = GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterStringFilter::class;
  protected $stringFilterDataType = '';

  /**
   * @param bool
   */
  public function setAtAnyPointInTime($atAnyPointInTime)
  {
    $this->atAnyPointInTime = $atAnyPointInTime;
  }
  /**
   * @return bool
   */
  public function getAtAnyPointInTime()
  {
    return $this->atAnyPointInTime;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterBetweenFilter
   */
  public function setBetweenFilter(GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterBetweenFilter $betweenFilter)
  {
    $this->betweenFilter = $betweenFilter;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterBetweenFilter
   */
  public function getBetweenFilter()
  {
    return $this->betweenFilter;
  }
  /**
   * @param string
   */
  public function setFieldName($fieldName)
  {
    $this->fieldName = $fieldName;
  }
  /**
   * @return string
   */
  public function getFieldName()
  {
    return $this->fieldName;
  }
  /**
   * @param int
   */
  public function setInAnyNDayPeriod($inAnyNDayPeriod)
  {
    $this->inAnyNDayPeriod = $inAnyNDayPeriod;
  }
  /**
   * @return int
   */
  public function getInAnyNDayPeriod()
  {
    return $this->inAnyNDayPeriod;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterInListFilter
   */
  public function setInListFilter(GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterInListFilter $inListFilter)
  {
    $this->inListFilter = $inListFilter;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterInListFilter
   */
  public function getInListFilter()
  {
    return $this->inListFilter;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterNumericFilter
   */
  public function setNumericFilter(GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterNumericFilter $numericFilter)
  {
    $this->numericFilter = $numericFilter;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterNumericFilter
   */
  public function getNumericFilter()
  {
    return $this->numericFilter;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterStringFilter
   */
  public function setStringFilter(GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterStringFilter $stringFilter)
  {
    $this->stringFilter = $stringFilter;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilterStringFilter
   */
  public function getStringFilter()
  {
    return $this->stringFilter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilter::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAudienceDimensionOrMetricFilter');
