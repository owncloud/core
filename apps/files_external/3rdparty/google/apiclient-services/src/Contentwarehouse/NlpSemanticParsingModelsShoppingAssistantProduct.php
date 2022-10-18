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

class NlpSemanticParsingModelsShoppingAssistantProduct extends \Google\Model
{
  /**
   * @var string
   */
  public $catalogId;
  protected $maxPriceType = NlpSemanticParsingModelsMoneyMoney::class;
  protected $maxPriceDataType = '';
  protected $mediaProductType = NlpSemanticParsingModelsShoppingAssistantProductMediaProduct::class;
  protected $mediaProductDataType = '';
  /**
   * @var string
   */
  public $mid;
  protected $minPriceType = NlpSemanticParsingModelsMoneyMoney::class;
  protected $minPriceDataType = '';
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setCatalogId($catalogId)
  {
    $this->catalogId = $catalogId;
  }
  /**
   * @return string
   */
  public function getCatalogId()
  {
    return $this->catalogId;
  }
  /**
   * @param NlpSemanticParsingModelsMoneyMoney
   */
  public function setMaxPrice(NlpSemanticParsingModelsMoneyMoney $maxPrice)
  {
    $this->maxPrice = $maxPrice;
  }
  /**
   * @return NlpSemanticParsingModelsMoneyMoney
   */
  public function getMaxPrice()
  {
    return $this->maxPrice;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantProductMediaProduct
   */
  public function setMediaProduct(NlpSemanticParsingModelsShoppingAssistantProductMediaProduct $mediaProduct)
  {
    $this->mediaProduct = $mediaProduct;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantProductMediaProduct
   */
  public function getMediaProduct()
  {
    return $this->mediaProduct;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param NlpSemanticParsingModelsMoneyMoney
   */
  public function setMinPrice(NlpSemanticParsingModelsMoneyMoney $minPrice)
  {
    $this->minPrice = $minPrice;
  }
  /**
   * @return NlpSemanticParsingModelsMoneyMoney
   */
  public function getMinPrice()
  {
    return $this->minPrice;
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
class_alias(NlpSemanticParsingModelsShoppingAssistantProduct::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsShoppingAssistantProduct');
