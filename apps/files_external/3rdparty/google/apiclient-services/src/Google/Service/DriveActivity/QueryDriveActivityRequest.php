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

class Google_Service_DriveActivity_QueryDriveActivityRequest extends Google_Model
{
  public $ancestorName;
  protected $consolidationStrategyType = 'Google_Service_DriveActivity_ConsolidationStrategy';
  protected $consolidationStrategyDataType = '';
  public $filter;
  public $itemName;
  public $pageSize;
  public $pageToken;

  public function setAncestorName($ancestorName)
  {
    $this->ancestorName = $ancestorName;
  }
  public function getAncestorName()
  {
    return $this->ancestorName;
  }
  /**
   * @param Google_Service_DriveActivity_ConsolidationStrategy
   */
  public function setConsolidationStrategy(Google_Service_DriveActivity_ConsolidationStrategy $consolidationStrategy)
  {
    $this->consolidationStrategy = $consolidationStrategy;
  }
  /**
   * @return Google_Service_DriveActivity_ConsolidationStrategy
   */
  public function getConsolidationStrategy()
  {
    return $this->consolidationStrategy;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setItemName($itemName)
  {
    $this->itemName = $itemName;
  }
  public function getItemName()
  {
    return $this->itemName;
  }
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  public function getPageSize()
  {
    return $this->pageSize;
  }
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  public function getPageToken()
  {
    return $this->pageToken;
  }
}
