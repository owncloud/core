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

class NlpSemanticParsingModelsMoneyMoney extends \Google\Model
{
  protected $amountType = NlpSemanticParsingNumberNumber::class;
  protected $amountDataType = '';
  protected $currencyType = NlpSemanticParsingModelsMoneyCurrency::class;
  protected $currencyDataType = '';

  /**
   * @param NlpSemanticParsingNumberNumber
   */
  public function setAmount(NlpSemanticParsingNumberNumber $amount)
  {
    $this->amount = $amount;
  }
  /**
   * @return NlpSemanticParsingNumberNumber
   */
  public function getAmount()
  {
    return $this->amount;
  }
  /**
   * @param NlpSemanticParsingModelsMoneyCurrency
   */
  public function setCurrency(NlpSemanticParsingModelsMoneyCurrency $currency)
  {
    $this->currency = $currency;
  }
  /**
   * @return NlpSemanticParsingModelsMoneyCurrency
   */
  public function getCurrency()
  {
    return $this->currency;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMoneyMoney::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMoneyMoney');
