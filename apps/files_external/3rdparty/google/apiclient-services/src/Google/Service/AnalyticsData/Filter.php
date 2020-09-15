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

class Google_Service_AnalyticsData_Filter extends Google_Model
{
  protected $betweenFilterType = 'Google_Service_AnalyticsData_BetweenFilter';
  protected $betweenFilterDataType = '';
  public $fieldName;
  protected $inListFilterType = 'Google_Service_AnalyticsData_InListFilter';
  protected $inListFilterDataType = '';
  public $nullFilter;
  protected $numericFilterType = 'Google_Service_AnalyticsData_NumericFilter';
  protected $numericFilterDataType = '';
  protected $stringFilterType = 'Google_Service_AnalyticsData_StringFilter';
  protected $stringFilterDataType = '';

  /**
   * @param Google_Service_AnalyticsData_BetweenFilter
   */
  public function setBetweenFilter(Google_Service_AnalyticsData_BetweenFilter $betweenFilter)
  {
    $this->betweenFilter = $betweenFilter;
  }
  /**
   * @return Google_Service_AnalyticsData_BetweenFilter
   */
  public function getBetweenFilter()
  {
    return $this->betweenFilter;
  }
  public function setFieldName($fieldName)
  {
    $this->fieldName = $fieldName;
  }
  public function getFieldName()
  {
    return $this->fieldName;
  }
  /**
   * @param Google_Service_AnalyticsData_InListFilter
   */
  public function setInListFilter(Google_Service_AnalyticsData_InListFilter $inListFilter)
  {
    $this->inListFilter = $inListFilter;
  }
  /**
   * @return Google_Service_AnalyticsData_InListFilter
   */
  public function getInListFilter()
  {
    return $this->inListFilter;
  }
  public function setNullFilter($nullFilter)
  {
    $this->nullFilter = $nullFilter;
  }
  public function getNullFilter()
  {
    return $this->nullFilter;
  }
  /**
   * @param Google_Service_AnalyticsData_NumericFilter
   */
  public function setNumericFilter(Google_Service_AnalyticsData_NumericFilter $numericFilter)
  {
    $this->numericFilter = $numericFilter;
  }
  /**
   * @return Google_Service_AnalyticsData_NumericFilter
   */
  public function getNumericFilter()
  {
    return $this->numericFilter;
  }
  /**
   * @param Google_Service_AnalyticsData_StringFilter
   */
  public function setStringFilter(Google_Service_AnalyticsData_StringFilter $stringFilter)
  {
    $this->stringFilter = $stringFilter;
  }
  /**
   * @return Google_Service_AnalyticsData_StringFilter
   */
  public function getStringFilter()
  {
    return $this->stringFilter;
  }
}
