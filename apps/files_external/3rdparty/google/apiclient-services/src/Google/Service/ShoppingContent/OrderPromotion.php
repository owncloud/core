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

class Google_Service_ShoppingContent_OrderPromotion extends Google_Collection
{
  protected $collection_key = 'appliedItems';
  protected $applicableItemsType = 'Google_Service_ShoppingContent_OrderPromotionItem';
  protected $applicableItemsDataType = 'array';
  protected $appliedItemsType = 'Google_Service_ShoppingContent_OrderPromotionItem';
  protected $appliedItemsDataType = 'array';
  public $endTime;
  public $funder;
  public $merchantPromotionId;
  protected $priceValueType = 'Google_Service_ShoppingContent_Price';
  protected $priceValueDataType = '';
  public $shortTitle;
  public $startTime;
  public $subtype;
  protected $taxValueType = 'Google_Service_ShoppingContent_Price';
  protected $taxValueDataType = '';
  public $title;
  public $type;

  /**
   * @param Google_Service_ShoppingContent_OrderPromotionItem[]
   */
  public function setApplicableItems($applicableItems)
  {
    $this->applicableItems = $applicableItems;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderPromotionItem[]
   */
  public function getApplicableItems()
  {
    return $this->applicableItems;
  }
  /**
   * @param Google_Service_ShoppingContent_OrderPromotionItem[]
   */
  public function setAppliedItems($appliedItems)
  {
    $this->appliedItems = $appliedItems;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderPromotionItem[]
   */
  public function getAppliedItems()
  {
    return $this->appliedItems;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setFunder($funder)
  {
    $this->funder = $funder;
  }
  public function getFunder()
  {
    return $this->funder;
  }
  public function setMerchantPromotionId($merchantPromotionId)
  {
    $this->merchantPromotionId = $merchantPromotionId;
  }
  public function getMerchantPromotionId()
  {
    return $this->merchantPromotionId;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setPriceValue(Google_Service_ShoppingContent_Price $priceValue)
  {
    $this->priceValue = $priceValue;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getPriceValue()
  {
    return $this->priceValue;
  }
  public function setShortTitle($shortTitle)
  {
    $this->shortTitle = $shortTitle;
  }
  public function getShortTitle()
  {
    return $this->shortTitle;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setSubtype($subtype)
  {
    $this->subtype = $subtype;
  }
  public function getSubtype()
  {
    return $this->subtype;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setTaxValue(Google_Service_ShoppingContent_Price $taxValue)
  {
    $this->taxValue = $taxValue;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getTaxValue()
  {
    return $this->taxValue;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
