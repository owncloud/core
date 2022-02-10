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

namespace Google\Service\ShoppingContent;

class AccountStatusProducts extends \Google\Collection
{
  protected $collection_key = 'itemLevelIssues';
  /**
   * @var string
   */
  public $channel;
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $destination;
  protected $itemLevelIssuesType = AccountStatusItemLevelIssue::class;
  protected $itemLevelIssuesDataType = 'array';
  protected $statisticsType = AccountStatusStatistics::class;
  protected $statisticsDataType = '';

  /**
   * @param string
   */
  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  /**
   * @return string
   */
  public function getChannel()
  {
    return $this->channel;
  }
  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return string
   */
  public function getDestination()
  {
    return $this->destination;
  }
  /**
   * @param AccountStatusItemLevelIssue[]
   */
  public function setItemLevelIssues($itemLevelIssues)
  {
    $this->itemLevelIssues = $itemLevelIssues;
  }
  /**
   * @return AccountStatusItemLevelIssue[]
   */
  public function getItemLevelIssues()
  {
    return $this->itemLevelIssues;
  }
  /**
   * @param AccountStatusStatistics
   */
  public function setStatistics(AccountStatusStatistics $statistics)
  {
    $this->statistics = $statistics;
  }
  /**
   * @return AccountStatusStatistics
   */
  public function getStatistics()
  {
    return $this->statistics;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountStatusProducts::class, 'Google_Service_ShoppingContent_AccountStatusProducts');
