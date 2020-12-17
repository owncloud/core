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

class Google_Service_ShoppingContent_AccountStatusProducts extends Google_Collection
{
  protected $collection_key = 'itemLevelIssues';
  public $channel;
  public $country;
  public $destination;
  protected $itemLevelIssuesType = 'Google_Service_ShoppingContent_AccountStatusItemLevelIssue';
  protected $itemLevelIssuesDataType = 'array';
  protected $statisticsType = 'Google_Service_ShoppingContent_AccountStatusStatistics';
  protected $statisticsDataType = '';

  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  public function getChannel()
  {
    return $this->channel;
  }
  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  public function getDestination()
  {
    return $this->destination;
  }
  /**
   * @param Google_Service_ShoppingContent_AccountStatusItemLevelIssue[]
   */
  public function setItemLevelIssues($itemLevelIssues)
  {
    $this->itemLevelIssues = $itemLevelIssues;
  }
  /**
   * @return Google_Service_ShoppingContent_AccountStatusItemLevelIssue[]
   */
  public function getItemLevelIssues()
  {
    return $this->itemLevelIssues;
  }
  /**
   * @param Google_Service_ShoppingContent_AccountStatusStatistics
   */
  public function setStatistics(Google_Service_ShoppingContent_AccountStatusStatistics $statistics)
  {
    $this->statistics = $statistics;
  }
  /**
   * @return Google_Service_ShoppingContent_AccountStatusStatistics
   */
  public function getStatistics()
  {
    return $this->statistics;
  }
}
