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

class ListLosingBidsResponse extends \Google\Collection
{
  protected $collection_key = 'creativeStatusRows';
  protected $creativeStatusRowsType = CreativeStatusRow::class;
  protected $creativeStatusRowsDataType = 'array';
  public $nextPageToken;

  /**
   * @param CreativeStatusRow[]
   */
  public function setCreativeStatusRows($creativeStatusRows)
  {
    $this->creativeStatusRows = $creativeStatusRows;
  }
  /**
   * @return CreativeStatusRow[]
   */
  public function getCreativeStatusRows()
  {
    return $this->creativeStatusRows;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListLosingBidsResponse::class, 'Google_Service_AdExchangeBuyerII_ListLosingBidsResponse');
