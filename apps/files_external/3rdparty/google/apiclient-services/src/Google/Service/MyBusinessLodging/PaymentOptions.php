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

class Google_Service_MyBusinessLodging_PaymentOptions extends Google_Model
{
  public $cash;
  public $cashException;
  public $cheque;
  public $chequeException;
  public $creditCard;
  public $creditCardException;
  public $debitCard;
  public $debitCardException;
  public $mobileNfc;
  public $mobileNfcException;

  public function setCash($cash)
  {
    $this->cash = $cash;
  }
  public function getCash()
  {
    return $this->cash;
  }
  public function setCashException($cashException)
  {
    $this->cashException = $cashException;
  }
  public function getCashException()
  {
    return $this->cashException;
  }
  public function setCheque($cheque)
  {
    $this->cheque = $cheque;
  }
  public function getCheque()
  {
    return $this->cheque;
  }
  public function setChequeException($chequeException)
  {
    $this->chequeException = $chequeException;
  }
  public function getChequeException()
  {
    return $this->chequeException;
  }
  public function setCreditCard($creditCard)
  {
    $this->creditCard = $creditCard;
  }
  public function getCreditCard()
  {
    return $this->creditCard;
  }
  public function setCreditCardException($creditCardException)
  {
    $this->creditCardException = $creditCardException;
  }
  public function getCreditCardException()
  {
    return $this->creditCardException;
  }
  public function setDebitCard($debitCard)
  {
    $this->debitCard = $debitCard;
  }
  public function getDebitCard()
  {
    return $this->debitCard;
  }
  public function setDebitCardException($debitCardException)
  {
    $this->debitCardException = $debitCardException;
  }
  public function getDebitCardException()
  {
    return $this->debitCardException;
  }
  public function setMobileNfc($mobileNfc)
  {
    $this->mobileNfc = $mobileNfc;
  }
  public function getMobileNfc()
  {
    return $this->mobileNfc;
  }
  public function setMobileNfcException($mobileNfcException)
  {
    $this->mobileNfcException = $mobileNfcException;
  }
  public function getMobileNfcException()
  {
    return $this->mobileNfcException;
  }
}
