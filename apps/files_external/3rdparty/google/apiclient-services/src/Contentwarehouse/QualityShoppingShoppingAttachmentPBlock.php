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

namespace Google\Service\Contentwarehouse;

class QualityShoppingShoppingAttachmentPBlock extends \Google\Collection
{
  protected $collection_key = 'imageInfo';
  /**
   * @var string
   */
  public $fullTitle;
  /**
   * @var string[]
   */
  public $imageDocid;
  protected $imageInfoType = QualityShoppingShoppingAttachmentPBlockImageInfo::class;
  protected $imageInfoDataType = 'array';
  /**
   * @var bool
   */
  public $isFreeDelivery;
  /**
   * @var bool
   */
  public $isFreeReturn;
  /**
   * @var string
   */
  public $listTitle;
  /**
   * @var float
   */
  public $maxPriceValue;
  /**
   * @var float
   */
  public $minPriceValue;
  /**
   * @var string
   */
  public $price;
  /**
   * @var string
   */
  public $priceCurrency;
  /**
   * @var float
   */
  public $priceValue;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setFullTitle($fullTitle)
  {
    $this->fullTitle = $fullTitle;
  }
  /**
   * @return string
   */
  public function getFullTitle()
  {
    return $this->fullTitle;
  }
  /**
   * @param string[]
   */
  public function setImageDocid($imageDocid)
  {
    $this->imageDocid = $imageDocid;
  }
  /**
   * @return string[]
   */
  public function getImageDocid()
  {
    return $this->imageDocid;
  }
  /**
   * @param QualityShoppingShoppingAttachmentPBlockImageInfo[]
   */
  public function setImageInfo($imageInfo)
  {
    $this->imageInfo = $imageInfo;
  }
  /**
   * @return QualityShoppingShoppingAttachmentPBlockImageInfo[]
   */
  public function getImageInfo()
  {
    return $this->imageInfo;
  }
  /**
   * @param bool
   */
  public function setIsFreeDelivery($isFreeDelivery)
  {
    $this->isFreeDelivery = $isFreeDelivery;
  }
  /**
   * @return bool
   */
  public function getIsFreeDelivery()
  {
    return $this->isFreeDelivery;
  }
  /**
   * @param bool
   */
  public function setIsFreeReturn($isFreeReturn)
  {
    $this->isFreeReturn = $isFreeReturn;
  }
  /**
   * @return bool
   */
  public function getIsFreeReturn()
  {
    return $this->isFreeReturn;
  }
  /**
   * @param string
   */
  public function setListTitle($listTitle)
  {
    $this->listTitle = $listTitle;
  }
  /**
   * @return string
   */
  public function getListTitle()
  {
    return $this->listTitle;
  }
  /**
   * @param float
   */
  public function setMaxPriceValue($maxPriceValue)
  {
    $this->maxPriceValue = $maxPriceValue;
  }
  /**
   * @return float
   */
  public function getMaxPriceValue()
  {
    return $this->maxPriceValue;
  }
  /**
   * @param float
   */
  public function setMinPriceValue($minPriceValue)
  {
    $this->minPriceValue = $minPriceValue;
  }
  /**
   * @return float
   */
  public function getMinPriceValue()
  {
    return $this->minPriceValue;
  }
  /**
   * @param string
   */
  public function setPrice($price)
  {
    $this->price = $price;
  }
  /**
   * @return string
   */
  public function getPrice()
  {
    return $this->price;
  }
  /**
   * @param string
   */
  public function setPriceCurrency($priceCurrency)
  {
    $this->priceCurrency = $priceCurrency;
  }
  /**
   * @return string
   */
  public function getPriceCurrency()
  {
    return $this->priceCurrency;
  }
  /**
   * @param float
   */
  public function setPriceValue($priceValue)
  {
    $this->priceValue = $priceValue;
  }
  /**
   * @return float
   */
  public function getPriceValue()
  {
    return $this->priceValue;
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
class_alias(QualityShoppingShoppingAttachmentPBlock::class, 'Google_Service_Contentwarehouse_QualityShoppingShoppingAttachmentPBlock');
