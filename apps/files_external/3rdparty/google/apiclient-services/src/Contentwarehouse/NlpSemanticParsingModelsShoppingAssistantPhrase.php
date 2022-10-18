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

class NlpSemanticParsingModelsShoppingAssistantPhrase extends \Google\Model
{
  protected $brandType = NlpSemanticParsingModelsShoppingAssistantBrandPhrase::class;
  protected $brandDataType = '';
  protected $offerType = NlpSemanticParsingModelsShoppingAssistantOffer::class;
  protected $offerDataType = '';
  protected $productType = NlpSemanticParsingModelsShoppingAssistantProductPhrase::class;
  protected $productDataType = '';
  protected $unrecognizedType = NlpSemanticParsingModelsShoppingAssistantUnrecognizedPhrase::class;
  protected $unrecognizedDataType = '';

  /**
   * @param NlpSemanticParsingModelsShoppingAssistantBrandPhrase
   */
  public function setBrand(NlpSemanticParsingModelsShoppingAssistantBrandPhrase $brand)
  {
    $this->brand = $brand;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantBrandPhrase
   */
  public function getBrand()
  {
    return $this->brand;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantOffer
   */
  public function setOffer(NlpSemanticParsingModelsShoppingAssistantOffer $offer)
  {
    $this->offer = $offer;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantOffer
   */
  public function getOffer()
  {
    return $this->offer;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantProductPhrase
   */
  public function setProduct(NlpSemanticParsingModelsShoppingAssistantProductPhrase $product)
  {
    $this->product = $product;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantProductPhrase
   */
  public function getProduct()
  {
    return $this->product;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantUnrecognizedPhrase
   */
  public function setUnrecognized(NlpSemanticParsingModelsShoppingAssistantUnrecognizedPhrase $unrecognized)
  {
    $this->unrecognized = $unrecognized;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantUnrecognizedPhrase
   */
  public function getUnrecognized()
  {
    return $this->unrecognized;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsShoppingAssistantPhrase::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsShoppingAssistantPhrase');
