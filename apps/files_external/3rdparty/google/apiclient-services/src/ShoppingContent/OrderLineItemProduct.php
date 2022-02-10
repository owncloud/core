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

class OrderLineItemProduct extends \Google\Collection
{
  protected $collection_key = 'variantAttributes';
  /**
   * @var string
   */
  public $brand;
  /**
   * @var string
   */
  public $condition;
  /**
   * @var string
   */
  public $contentLanguage;
  protected $feesType = OrderLineItemProductFee::class;
  protected $feesDataType = 'array';
  /**
   * @var string
   */
  public $gtin;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $imageLink;
  /**
   * @var string
   */
  public $itemGroupId;
  /**
   * @var string
   */
  public $mpn;
  /**
   * @var string
   */
  public $offerId;
  protected $priceType = Price::class;
  protected $priceDataType = '';
  /**
   * @var string
   */
  public $shownImage;
  /**
   * @var string
   */
  public $targetCountry;
  /**
   * @var string
   */
  public $title;
  protected $variantAttributesType = OrderLineItemProductVariantAttribute::class;
  protected $variantAttributesDataType = 'array';

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
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setGtin($gtin)
  {
    $this->gtin = $gtin;
  }
  /**
   * @return string
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
  public function setImageLink($imageLink)
  {
    $this->imageLink = $imageLink;
  }
  /**
   * @return string
   */
  public function getImageLink()
  {
    return $this->imageLink;
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
   * @param string
   */
  public function setMpn($mpn)
  {
    $this->mpn = $mpn;
  }
  /**
   * @return string
   */
  public function getMpn()
  {
    return $this->mpn;
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
  /**
   * @param string
   */
  public function setShownImage($shownImage)
  {
    $this->shownImage = $shownImage;
  }
  /**
   * @return string
   */
  public function getShownImage()
  {
    return $this->shownImage;
  }
  /**
   * @param string
   */
  public function setTargetCountry($targetCountry)
  {
    $this->targetCountry = $targetCountry;
  }
  /**
   * @return string
   */
  public function getTargetCountry()
  {
    return $this->targetCountry;
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
class_alias(OrderLineItemProduct::class, 'Google_Service_ShoppingContent_OrderLineItemProduct');
