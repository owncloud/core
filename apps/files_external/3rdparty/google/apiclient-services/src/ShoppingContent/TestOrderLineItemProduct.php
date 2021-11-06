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

class TestOrderLineItemProduct extends \Google\Collection
{
  protected $collection_key = 'variantAttributes';
  public $brand;
  public $condition;
  public $contentLanguage;
  protected $feesType = OrderLineItemProductFee::class;
  protected $feesDataType = 'array';
  public $gtin;
  public $imageLink;
  public $itemGroupId;
  public $mpn;
  public $offerId;
  protected $priceType = Price::class;
  protected $priceDataType = '';
  public $targetCountry;
  public $title;
  protected $variantAttributesType = OrderLineItemProductVariantAttribute::class;
  protected $variantAttributesDataType = 'array';

  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  public function getBrand()
  {
    return $this->brand;
  }
  public function setCondition($condition)
  {
    $this->condition = $condition;
  }
  public function getCondition()
  {
    return $this->condition;
  }
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  /**
   * @param OrderLineItemProductFee[]
   */
  public function setFees($fees)
  {
    $this->fees = $fees;
  }
  /**
   * @return OrderLineItemProductFee[]
   */
  public function getFees()
  {
    return $this->fees;
  }
  public function setGtin($gtin)
  {
    $this->gtin = $gtin;
  }
  public function getGtin()
  {
    return $this->gtin;
  }
  public function setImageLink($imageLink)
  {
    $this->imageLink = $imageLink;
  }
  public function getImageLink()
  {
    return $this->imageLink;
  }
  public function setItemGroupId($itemGroupId)
  {
    $this->itemGroupId = $itemGroupId;
  }
  public function getItemGroupId()
  {
    return $this->itemGroupId;
  }
  public function setMpn($mpn)
  {
    $this->mpn = $mpn;
  }
  public function getMpn()
  {
    return $this->mpn;
  }
  public function setOfferId($offerId)
  {
    $this->offerId = $offerId;
  }
  public function getOfferId()
  {
    return $this->offerId;
  }
  /**
   * @param Price
   */
  public function setPrice(Price $price)
  {
    $this->price = $price;
  }
  /**
   * @return Price
   */
  public function getPrice()
  {
    return $this->price;
  }
  public function setTargetCountry($targetCountry)
  {
    $this->targetCountry = $targetCountry;
  }
  public function getTargetCountry()
  {
    return $this->targetCountry;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param OrderLineItemProductVariantAttribute[]
   */
  public function setVariantAttributes($variantAttributes)
  {
    $this->variantAttributes = $variantAttributes;
  }
  /**
   * @return OrderLineItemProductVariantAttribute[]
   */
  public function getVariantAttributes()
  {
    return $this->variantAttributes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestOrderLineItemProduct::class, 'Google_Service_ShoppingContent_TestOrderLineItemProduct');
