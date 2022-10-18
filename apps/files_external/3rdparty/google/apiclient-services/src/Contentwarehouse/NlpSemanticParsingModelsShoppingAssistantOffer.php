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

class NlpSemanticParsingModelsShoppingAssistantOffer extends \Google\Model
{
  /**
   * @var string
   */
  public $docid;
  protected $merchantType = NlpSemanticParsingModelsShoppingAssistantMerchant::class;
  protected $merchantDataType = '';
  protected $priceType = NlpSemanticParsingModelsMoneyMoney::class;
  protected $priceDataType = '';
  protected $productType = NlpSemanticParsingModelsShoppingAssistantProduct::class;
  protected $productDataType = '';
  protected $storeType = NlpSemanticParsingModelsShoppingAssistantStore::class;
  protected $storeDataType = '';

  /**
   * @param string
   */
  public function setDocid($docid)
  {
    $this->docid = $docid;
  }
  /**
   * @return string
   */
  public function getDocid()
  {
    return $this->docid;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantMerchant
   */
  public function setMerchant(NlpSemanticParsingModelsShoppingAssistantMerchant $merchant)
  {
    $this->merchant = $merchant;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantMerchant
   */
  public function getMerchant()
  {
    return $this->merchant;
  }
  /**
   * @param NlpSemanticParsingModelsMoneyMoney
   */
  public function setPrice(NlpSemanticParsingModelsMoneyMoney $price)
  {
    $this->price = $price;
  }
  /**
   * @return NlpSemanticParsingModelsMoneyMoney
   */
  public function getPrice()
  {
    return $this->price;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantProduct
   */
  public function setProduct(NlpSemanticParsingModelsShoppingAssistantProduct $product)
  {
    $this->product = $product;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantProduct
   */
  public function getProduct()
  {
    return $this->product;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantStore
   */
  public function setStore(NlpSemanticParsingModelsShoppingAssistantStore $store)
  {
    $this->store = $store;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantStore
   */
  public function getStore()
  {
    return $this->store;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsShoppingAssistantOffer::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsShoppingAssistantOffer');
