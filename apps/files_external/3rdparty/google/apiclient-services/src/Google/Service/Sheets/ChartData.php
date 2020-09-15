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

class Google_Service_Sheets_ChartData extends Google_Model
{
  public $aggregateType;
  protected $columnReferenceType = 'Google_Service_Sheets_DataSourceColumnReference';
  protected $columnReferenceDataType = '';
  protected $groupRuleType = 'Google_Service_Sheets_ChartGroupRule';
  protected $groupRuleDataType = '';
  protected $sourceRangeType = 'Google_Service_Sheets_ChartSourceRange';
  protected $sourceRangeDataType = '';

  public function setAggregateType($aggregateType)
  {
    $this->aggregateType = $aggregateType;
  }
  public function getAggregateType()
  {
    return $this->aggregateType;
  }
  /**
   * @param Google_Service_Sheets_DataSourceColumnReference
   */
  public function setColumnReference(Google_Service_Sheets_DataSourceColumnReference $columnReference)
  {
    $this->columnReference = $columnReference;
  }
  /**
   * @return Google_Service_Sheets_DataSourceColumnReference
   */
  public function getColumnReference()
  {
    return $this->columnReference;
  }
  /**
   * @param Google_Service_Sheets_ChartGroupRule
   */
  public function setGroupRule(Google_Service_Sheets_ChartGroupRule $groupRule)
  {
    $this->groupRule = $groupRule;
  }
  /**
   * @return Google_Service_Sheets_ChartGroupRule
   */
  public function getGroupRule()
  {
    return $this->groupRule;
  }
  /**
   * @param Google_Service_Sheets_ChartSourceRange
   */
  public function setSourceRange(Google_Service_Sheets_ChartSourceRange $sourceRange)
  {
    $this->sourceRange = $sourceRange;
  }
  /**
   * @return Google_Service_Sheets_ChartSourceRange
   */
  public function getSourceRange()
  {
    return $this->sourceRange;
  }
}
