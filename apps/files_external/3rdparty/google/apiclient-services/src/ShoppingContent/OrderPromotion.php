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

class OrderPromotion extends \Google\Collection
{
  protected $collection_key = 'appliedItems';
  protected $applicableItemsType = OrderPromotionItem::class;
  protected $applicableItemsDataType = 'array';
  protected $appliedItemsType = OrderPromotionItem::class;
  protected $appliedItemsDataType = 'array';
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $funder;
  /**
   * @var string
   */
  public $merchantPromotionId;
  protected $priceValueType = Price::class;
  protected $priceValueDataType = '';
  /**
   * @var string
   */
  public $shortTitle;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $subtype;
  protected $taxValueType = Price::class;
  protected $taxValueDataType = '';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $type;

  /**
   * @param OrderPromotionItem[]
   */
  public function setApplicableItems($applicableItems)
  {
    $this->applicableItems = $applicableItems;
  }
  /**
   * @return OrderPromotionItem[]
   */
  public function getApplicableItems()
  {
    return $this->applicableItems;
  }
  /**
   * @param OrderPromotionItem[]
   */
  public function setAppliedItems($appliedItems)
  {
    $this->appliedItems = $appliedItems;
  }
  /**
   * @return OrderPromotionItem[]
   */
  public function getAppliedItems()
  {
    return $this->appliedItems;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param string
   */
  public function setFunder($funder)
  {
    $this->funder = $funder;
  }
  /**
   * @return string
   */
  public function getFunder()
  {
    return $this->funder;
  }
  /**
   * @param string
   */
  public function setMerchantPromotionId($merchantPromotionId)
  {
    $this->merchantPromotionId = $merchantPromotionId;
  }
  /**
   * @return string
   */
  public function getMerchantPromotionId()
  {
    return $this->merchantPromotionId;
  }
  /**
   * @param Price
   */
  public function setPriceValue(Price $priceValue)
  {
    $this->priceValue = $priceValue;
  }
  /**
   * @return Price
   */
  public function getPriceValue()
  {
    return $this->priceValue;
  }
  /**
   * @param string
   */
  public function setShortTitle($shortTitle)
  {
    $this->shortTitle = $shortTitle;
  }
  /**
   * @return string
   */
  public function getShortTitle()
  {
    return $this->shortTitle;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setSubtype($subtype)
  {
    $this->subtype = $subtype;
  }
  /**
   * @return string
   */
  public function getSubtype()
  {
    return $this->subtype;
  }
  /**
   * @param Price
   */
  public function setTaxValue(Price $taxValue)
  {
    $this->taxValue = $taxValue;
  }
  /**
   * @return Price
   */
  public function getTaxValue()
  {
    return $this->taxValue;
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
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderPromotion::class, 'Google_Service_ShoppingContent_OrderPromotion');
