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

namespace Google\Service\AdExchangeBuyerII;

class ListCreativeStatusBreakdownByDetailResponse extends \Google\Collection
{
  protected $collection_key = 'filteredBidDetailRows';
  /**
   * @var string
   */
  public $detailType;
  protected $filteredBidDetailRowsType = FilteredBidDetailRow::class;
  protected $filteredBidDetailRowsDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;

  /**
   * @param string
   */
  public function setDetailType($detailType)
  {
    $this->detailType = $detailType;
  }
  /**
   * @return string
   */
  public function getDetailType()
  {
    return $this->detailType;
  }
  /**
   * @param FilteredBidDetailRow[]
   */
  public function setFilteredBidDetailRows($filteredBidDetailRows)
  {
    $this->filteredBidDetailRows = $filteredBidDetailRows;
  }
  /**
   * @return FilteredBidDetailRow[]
   */
  public function getFilteredBidDetailRows()
  {
    return $this->filteredBidDetailRows;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListCreativeStatusBreakdownByDetailResponse::class, 'Google_Service_AdExchangeBuyerII_ListCreativeStatusBreakdownByDetailResponse');
