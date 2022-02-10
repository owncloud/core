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

namespace Google\Service\MyBusinessLodging;

class PaymentOptions extends \Google\Model
{
  /**
   * @var bool
   */
  public $cash;
  /**
   * @var string
   */
  public $cashException;
  /**
   * @var bool
   */
  public $cheque;
  /**
   * @var string
   */
  public $chequeException;
  /**
   * @var bool
   */
  public $creditCard;
  /**
   * @var string
   */
  public $creditCardException;
  /**
   * @var bool
   */
  public $debitCard;
  /**
   * @var string
   */
  public $debitCardException;
  /**
   * @var bool
   */
  public $mobileNfc;
  /**
   * @var string
   */
  public $mobileNfcException;

  /**
   * @param bool
   */
  public function setCash($cash)
  {
    $this->cash = $cash;
  }
  /**
   * @return bool
   */
  public function getCash()
  {
    return $this->cash;
  }
  /**
   * @param string
   */
  public function setCashException($cashException)
  {
    $this->cashException = $cashException;
  }
  /**
   * @return string
   */
  public function getCashException()
  {
    return $this->cashException;
  }
  /**
   * @param bool
   */
  public function setCheque($cheque)
  {
    $this->cheque = $cheque;
  }
  /**
   * @return bool
   */
  public function getCheque()
  {
    return $this->cheque;
  }
  /**
   * @param string
   */
  public function setChequeException($chequeException)
  {
    $this->chequeException = $chequeException;
  }
  /**
   * @return string
   */
  public function getChequeException()
  {
    return $this->chequeException;
  }
  /**
   * @param bool
   */
  public function setCreditCard($creditCard)
  {
    $this->creditCard = $creditCard;
  }
  /**
   * @return bool
   */
  public function getCreditCard()
  {
    return $this->creditCard;
  }
  /**
   * @param string
   */
  public function setCreditCardException($creditCardException)
  {
    $this->creditCardException = $creditCardException;
  }
  /**
   * @return string
   */
  public function getCreditCardException()
  {
    return $this->creditCardException;
  }
  /**
   * @param bool
   */
  public function setDebitCard($debitCard)
  {
    $this->debitCard = $debitCard;
  }
  /**
   * @return bool
   */
  public function getDebitCard()
  {
    return $this->debitCard;
  }
  /**
   * @param string
   */
  public function setDebitCardException($debitCardException)
  {
    $this->debitCardException = $debitCardException;
  }
  /**
   * @return string
   */
  public function getDebitCardException()
  {
    return $this->debitCardException;
  }
  /**
   * @param bool
   */
  public function setMobileNfc($mobileNfc)
  {
    $this->mobileNfc = $mobileNfc;
  }
  /**
   * @return bool
   */
  public function getMobileNfc()
  {
    return $this->mobileNfc;
  }
  /**
   * @param string
   */
  public function setMobileNfcException($mobileNfcException)
  {
    $this->mobileNfcException = $mobileNfcException;
  }
  /**
   * @return string
   */
  public function getMobileNfcException()
  {
    return $this->mobileNfcException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PaymentOptions::class, 'Google_Service_MyBusinessLodging_PaymentOptions');
