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

namespace Google\Service\Sheets;

class ChartData extends \Google\Model
{
  public $aggregateType;
  protected $columnReferenceType = DataSourceColumnReference::class;
  protected $columnReferenceDataType = '';
  protected $groupRuleType = ChartGroupRule::class;
  protected $groupRuleDataType = '';
  protected $sourceRangeType = ChartSourceRange::class;
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
   * @param DataSourceColumnReference
   */
  public function setColumnReference(DataSourceColumnReference $columnReference)
  {
    $this->columnReference = $columnReference;
  }
  /**
   * @return DataSourceColumnReference
   */
  public function getColumnReference()
  {
    return $this->columnReference;
  }
  /**
   * @param ChartGroupRule
   */
  public function setGroupRule(ChartGroupRule $groupRule)
  {
    $this->groupRule = $groupRule;
  }
  /**
   * @return ChartGroupRule
   */
  public function getGroupRule()
  {
    return $this->groupRule;
  }
  /**
   * @param ChartSourceRange
   */
  public function setSourceRange(ChartSourceRange $sourceRange)
  {
    $this->sourceRange = $sourceRange;
  }
  /**
   * @return ChartSourceRange
   */
  public function getSourceRange()
  {
    return $this->sourceRange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChartData::class, 'Google_Service_Sheets_ChartData');
