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

class Google_Service_ShoppingContent_ProductStatus extends Google_Collection
{
  protected $collection_key = 'itemLevelIssues';
  public $creationDate;
  protected $destinationStatusesType = 'Google_Service_ShoppingContent_ProductStatusDestinationStatus';
  protected $destinationStatusesDataType = 'array';
  public $googleExpirationDate;
  protected $itemLevelIssuesType = 'Google_Service_ShoppingContent_ProductStatusItemLevelIssue';
  protected $itemLevelIssuesDataType = 'array';
  public $kind;
  public $lastUpdateDate;
  public $link;
  public $productId;
  public $title;

  public function setCreationDate($creationDate)
  {
    $this->creationDate = $creationDate;
  }
  public function getCreationDate()
  {
    return $this->creationDate;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductStatusDestinationStatus
   */
  public function setDestinationStatuses($destinationStatuses)
  {
    $this->destinationStatuses = $destinationStatuses;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductStatusDestinationStatus
   */
  public function getDestinationStatuses()
  {
    return $this->destinationStatuses;
  }
  public function setGoogleExpirationDate($googleExpirationDate)
  {
    $this->googleExpirationDate = $googleExpirationDate;
  }
  public function getGoogleExpirationDate()
  {
    return $this->googleExpirationDate;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductStatusItemLevelIssue
   */
  public function setItemLevelIssues($itemLevelIssues)
  {
    $this->itemLevelIssues = $itemLevelIssues;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductStatusItemLevelIssue
   */
  public function getItemLevelIssues()
  {
    return $this->itemLevelIssues;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLastUpdateDate($lastUpdateDate)
  {
    $this->lastUpdateDate = $lastUpdateDate;
  }
  public function getLastUpdateDate()
  {
    return $this->lastUpdateDate;
  }
  public function setLink($link)
  {
    $this->link = $link;
  }
  public function getLink()
  {
    return $this->link;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
