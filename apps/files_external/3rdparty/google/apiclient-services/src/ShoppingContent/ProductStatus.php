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

class ProductStatus extends \Google\Collection
{
  protected $collection_key = 'itemLevelIssues';
  /**
   * @var string
   */
  public $creationDate;
  protected $destinationStatusesType = ProductStatusDestinationStatus::class;
  protected $destinationStatusesDataType = 'array';
  /**
   * @var string
   */
  public $googleExpirationDate;
  protected $itemLevelIssuesType = ProductStatusItemLevelIssue::class;
  protected $itemLevelIssuesDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $lastUpdateDate;
  /**
   * @var string
   */
  public $link;
  /**
   * @var string
   */
  public $productId;
  /**
   * @var string
   */
  public $title;

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
   * @param ProductStatusDestinationStatus[]
   */
  public function setDestinationStatuses($destinationStatuses)
  {
    $this->destinationStatuses = $destinationStatuses;
  }
  /**
   * @return ProductStatusDestinationStatus[]
   */
  public function getDestinationStatuses()
  {
    return $this->destinationStatuses;
  }
  /**
   * @param string
   */
  public function setGoogleExpirationDate($googleExpirationDate)
  {
    $this->googleExpirationDate = $googleExpirationDate;
  }
  /**
   * @return string
   */
  public function getGoogleExpirationDate()
  {
    return $this->googleExpirationDate;
  }
  /**
   * @param ProductStatusItemLevelIssue[]
   */
  public function setItemLevelIssues($itemLevelIssues)
  {
    $this->itemLevelIssues = $itemLevelIssues;
  }
  /**
   * @return ProductStatusItemLevelIssue[]
   */
  public function getItemLevelIssues()
  {
    return $this->itemLevelIssues;
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
  /**
   * @param string
   */
  public function setLink($link)
  {
    $this->link = $link;
  }
  /**
   * @return string
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param string
   */
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  /**
   * @return string
   */
  public function getProductId()
  {
    return $this->productId;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductStatus::class, 'Google_Service_ShoppingContent_ProductStatus');
