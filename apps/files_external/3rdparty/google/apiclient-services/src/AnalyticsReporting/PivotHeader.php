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

namespace Google\Service\AnalyticsReporting;

class PivotHeader extends \Google\Collection
{
  protected $collection_key = 'pivotHeaderEntries';
  protected $pivotHeaderEntriesType = PivotHeaderEntry::class;
  protected $pivotHeaderEntriesDataType = 'array';
  /**
   * @var int
   */
  public $totalPivotGroupsCount;

  /**
   * @param PivotHeaderEntry[]
   */
  public function setPivotHeaderEntries($pivotHeaderEntries)
  {
    $this->pivotHeaderEntries = $pivotHeaderEntries;
  }
  /**
   * @return PivotHeaderEntry[]
   */
  public function getPivotHeaderEntries()
  {
    return $this->pivotHeaderEntries;
  }
  /**
   * @param int
   */
  public function setTotalPivotGroupsCount($totalPivotGroupsCount)
  {
    $this->totalPivotGroupsCount = $totalPivotGroupsCount;
  }
  /**
   * @return int
   */
  public function getTotalPivotGroupsCount()
  {
    return $this->totalPivotGroupsCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PivotHeader::class, 'Google_Service_AnalyticsReporting_PivotHeader');
