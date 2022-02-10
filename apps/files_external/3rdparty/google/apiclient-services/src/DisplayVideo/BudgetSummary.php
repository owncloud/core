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

namespace Google\Service\DisplayVideo;

class BudgetSummary extends \Google\Model
{
  /**
   * @var string
   */
  public $externalBudgetId;
  /**
   * @var string
   */
  public $preTaxAmountMicros;
  protected $prismaCpeCodeType = PrismaCpeCode::class;
  protected $prismaCpeCodeDataType = '';
  /**
   * @var string
   */
  public $taxAmountMicros;
  /**
   * @var string
   */
  public $totalAmountMicros;

  /**
   * @param string
   */
  public function setExternalBudgetId($externalBudgetId)
  {
    $this->externalBudgetId = $externalBudgetId;
  }
  /**
   * @return string
   */
  public function getExternalBudgetId()
  {
    return $this->externalBudgetId;
  }
  /**
   * @param string
   */
  public function setPreTaxAmountMicros($preTaxAmountMicros)
  {
    $this->preTaxAmountMicros = $preTaxAmountMicros;
  }
  /**
   * @return string
   */
  public function getPreTaxAmountMicros()
  {
    return $this->preTaxAmountMicros;
  }
  /**
   * @param PrismaCpeCode
   */
  public function setPrismaCpeCode(PrismaCpeCode $prismaCpeCode)
  {
    $this->prismaCpeCode = $prismaCpeCode;
  }
  /**
   * @return PrismaCpeCode
   */
  public function getPrismaCpeCode()
  {
    return $this->prismaCpeCode;
  }
  /**
   * @param string
   */
  public function setTaxAmountMicros($taxAmountMicros)
  {
    $this->taxAmountMicros = $taxAmountMicros;
  }
  /**
   * @return string
   */
  public function getTaxAmountMicros()
  {
    return $this->taxAmountMicros;
  }
  /**
   * @param string
   */
  public function setTotalAmountMicros($totalAmountMicros)
  {
    $this->totalAmountMicros = $totalAmountMicros;
  }
  /**
   * @return string
   */
  public function getTotalAmountMicros()
  {
    return $this->totalAmountMicros;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BudgetSummary::class, 'Google_Service_DisplayVideo_BudgetSummary');
