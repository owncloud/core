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

class ProductView extends \Google\Collection
{
  protected $collection_key = 'itemIssues';
  /**
   * @var string
   */
  public $aggregatedDestinationStatus;
  /**
   * @var string
   */
  public $availability;
  /**
   * @var string
   */
  public $brand;
  /**
   * @var string
   */
  public $channel;
  /**
   * @var string
   */
  public $condition;
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $currencyCode;
  protected $expirationDateType = Date::class;
  protected $expirationDateDataType = '';
  /**
   * @var string[]
   */
  public $gtin;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $itemGroupId;
  protected $itemIssuesType = ProductViewItemIssue::class;
  protected $itemIssuesDataType = 'array';
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $offerId;
  /**
   * @var string
   */
  public $priceMicros;
  /**
   * @var string
   */
  public $shippingLabel;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setAggregatedDestinationStatus($aggregatedDestinationStatus)
  {
    $this->aggregatedDestinationStatus = $aggregatedDestinationStatus;
  }
  /**
   * @return string
   */
  public function getAggregatedDestinationStatus()
  {
    return $this->aggregatedDestinationStatus;
  }
  /**
   * @param string
   */
  public function setAvailability($availability)
  {
    $this->availability = $availability;
  }
  /**
   * @return string
   */
  public function getAvailability()
  {
    return $this->availability;
  }
  /**
   * @param string
   */
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  /**
   * @return string
   */
  public function getBrand()
  {
    return $this->brand;
  }
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
  public function setCondition($condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return string
   */
  public function getCondition()
  {
    return $this->condition;
  }
  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param string
   */
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  /**
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param Date
   */
  public function setExpirationDate(Date $expirationDate)
  {
    $this->expirationDate = $expirationDate;
  }
  /**
   * @return Date
   */
  public function getExpirationDate()
  {
    return $this->expirationDate;
  }
  /**
   * @param string[]
   */
  public function setGtin($gtin)
  {
    $this->gtin = $gtin;
  }
  /**
   * @return string[]
   */
  public function getGtin()
  {
    return $this->gtin;
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
  public function setItemGroupId($itemGroupId)
  {
    $this->itemGroupId = $itemGroupId;
  }
  /**
   * @return string
   */
  public function getItemGroupId()
  {
    return $this->itemGroupId;
  }
  /**
   * @param ProductViewItemIssue[]
   */
  public function setItemIssues($itemIssues)
  {
    $this->itemIssues = $itemIssues;
  }
  /**
   * @return ProductViewItemIssue[]
   */
  public function getItemIssues()
  {
    return $this->itemIssues;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string
   */
  public function setOfferId($offerId)
  {
    $this->offerId = $offerId;
  }
  /**
   * @return string
   */
  public function getOfferId()
  {
    return $this->offerId;
  }
  /**
   * @param string
   */
  public function setPriceMicros($priceMicros)
  {
    $this->priceMicros = $priceMicros;
  }
  /**
   * @return string
   */
  public function getPriceMicros()
  {
    return $this->priceMicros;
  }
  /**
   * @param string
   */
  public function setShippingLabel($shippingLabel)
  {
    $this->shippingLabel = $shippingLabel;
  }
  /**
   * @return string
   */
  public function getShippingLabel()
  {
    return $this->shippingLabel;
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
class_alias(ProductView::class, 'Google_Service_ShoppingContent_ProductView');
