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

class CollectionStatus extends \Google\Collection
{
  protected $collection_key = 'destinationStatuses';
  protected $collectionLevelIssusesType = CollectionStatusItemLevelIssue::class;
  protected $collectionLevelIssusesDataType = 'array';
  /**
   * @var string
   */
  public $creationDate;
  protected $destinationStatusesType = CollectionStatusDestinationStatus::class;
  protected $destinationStatusesDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $lastUpdateDate;

  /**
   * @param CollectionStatusItemLevelIssue[]
   */
  public function setCollectionLevelIssuses($collectionLevelIssuses)
  {
    $this->collectionLevelIssuses = $collectionLevelIssuses;
  }
  /**
   * @return CollectionStatusItemLevelIssue[]
   */
  public function getCollectionLevelIssuses()
  {
    return $this->collectionLevelIssuses;
  }
  /**
   * @param string
   */
  public function setCreationDate($creationDate)
  {
    $this->creationDate = $creationDate;
  }
  /**
   * @return string
   */
  public function getCreationDate()
  {
    return $this->creationDate;
  }
  /**
   * @param CollectionStatusDestinationStatus[]
   */
  public function setDestinationStatuses($destinationStatuses)
  {
    $this->destinationStatuses = $destinationStatuses;
  }
  /**
   * @return CollectionStatusDestinationStatus[]
   */
  public function getDestinationStatuses()
  {
    return $this->destinationStatuses;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setLastUpdateDate($lastUpdateDate)
  {
    $this->lastUpdateDate = $lastUpdateDate;
  }
  /**
   * @return string
   */
  public function getLastUpdateDate()
  {
    return $this->lastUpdateDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CollectionStatus::class, 'Google_Service_ShoppingContent_CollectionStatus');
