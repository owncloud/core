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

class NlpSemanticParsingModelsMediaPaidOfferDetail extends \Google\Collection
{
  protected $collection_key = 'cost';
  protected $costType = NlpSemanticParsingModelsMediaCost::class;
  protected $costDataType = 'array';
  /**
   * @var string
   */
  public $paidOfferType;

  /**
   * @param NlpSemanticParsingModelsMediaCost[]
   */
  public function setCost($cost)
  {
    $this->cost = $cost;
  }
  /**
   * @return NlpSemanticParsingModelsMediaCost[]
   */
  public function getCost()
  {
    return $this->cost;
  }
  /**
   * @param string
   */
  public function setPaidOfferType($paidOfferType)
  {
    $this->paidOfferType = $paidOfferType;
  }
  /**
   * @return string
   */
  public function getPaidOfferType()
  {
    return $this->paidOfferType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaPaidOfferDetail::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaPaidOfferDetail');
