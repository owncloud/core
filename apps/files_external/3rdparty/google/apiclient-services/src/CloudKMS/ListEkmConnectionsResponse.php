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

namespace Google\Service\CloudKMS;

class ListEkmConnectionsResponse extends \Google\Collection
{
  protected $collection_key = 'ekmConnections';
  protected $ekmConnectionsType = EkmConnection::class;
  protected $ekmConnectionsDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;
  /**
   * @var int
   */
  public $totalSize;

  /**
   * @param EkmConnection[]
   */
  public function setEkmConnections($ekmConnections)
  {
    $this->ekmConnections = $ekmConnections;
  }
  /**
   * @return EkmConnection[]
   */
  public function getEkmConnections()
  {
    return $this->ekmConnections;
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
   * @param int
   */
  public function setTotalSize($totalSize)
  {
    $this->totalSize = $totalSize;
  }
  /**
   * @return int
   */
  public function getTotalSize()
  {
    return $this->totalSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListEkmConnectionsResponse::class, 'Google_Service_CloudKMS_ListEkmConnectionsResponse');
