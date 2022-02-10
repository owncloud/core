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

namespace Google\Service\Analytics;

class RemarketingAudiences extends \Google\Collection
{
  protected $collection_key = 'items';
  protected $itemsType = RemarketingAudience::class;
  protected $itemsDataType = 'array';
  /**
   * @var int
   */
  public $itemsPerPage;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $nextLink;
  /**
   * @var string
   */
  public $previousLink;
  /**
   * @var int
   */
  public $startIndex;
  /**
   * @var int
   */
  public $totalResults;
  /**
   * @var string
   */
  public $username;

  /**
   * @param RemarketingAudience[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return RemarketingAudience[]
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param int
   */
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  /**
   * @return int
   */
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  /**
   * @return string
   */
  public function getNextLink()
  {
    return $this->nextLink;
  }
  /**
   * @param string
   */
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  /**
   * @return string
   */
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  /**
   * @param int
   */
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  /**
   * @return int
   */
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  /**
   * @param int
   */
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  /**
   * @return int
   */
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  /**
   * @param string
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }
  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RemarketingAudiences::class, 'Google_Service_Analytics_RemarketingAudiences');
