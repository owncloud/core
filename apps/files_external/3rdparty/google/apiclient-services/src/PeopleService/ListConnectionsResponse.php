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

namespace Google\Service\PeopleService;

class ListConnectionsResponse extends \Google\Collection
{
  protected $collection_key = 'connections';
  protected $connectionsType = Person::class;
  protected $connectionsDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;
  /**
   * @var string
   */
  public $nextSyncToken;
  /**
   * @var int
   */
  public $totalItems;
  /**
   * @var int
   */
  public $totalPeople;

  /**
   * @param Person[]
   */
  public function setConnections($connections)
  {
    $this->connections = $connections;
  }
  /**
   * @return Person[]
   */
  public function getConnections()
  {
    return $this->connections;
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
  /**
   * @param string
   */
  public function setNextSyncToken($nextSyncToken)
  {
    $this->nextSyncToken = $nextSyncToken;
  }
  /**
   * @return string
   */
  public function getNextSyncToken()
  {
    return $this->nextSyncToken;
  }
  /**
   * @param int
   */
  public function setTotalItems($totalItems)
  {
    $this->totalItems = $totalItems;
  }
  /**
   * @return int
   */
  public function getTotalItems()
  {
    return $this->totalItems;
  }
  /**
   * @param int
   */
  public function setTotalPeople($totalPeople)
  {
    $this->totalPeople = $totalPeople;
  }
  /**
   * @return int
   */
  public function getTotalPeople()
  {
    return $this->totalPeople;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListConnectionsResponse::class, 'Google_Service_PeopleService_ListConnectionsResponse');
