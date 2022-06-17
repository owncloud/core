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

namespace Google\Service\Dfareporting;

class BillingProfile extends \Google\Model
{
  /**
   * @var bool
   */
  public $consolidatedInvoice;
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $invoiceLevel;
  /**
   * @var bool
   */
  public $isDefault;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $paymentsAccountId;
  /**
   * @var string
   */
  public $paymentsCustomerId;
  /**
   * @var string
   */
  public $purchaseOrder;
  /**
   * @var string
   */
  public $secondaryPaymentsCustomerId;
  /**
   * @var string
   */
  public $status;

  /**
   * @param bool
   */
  public function setConsolidatedInvoice($consolidatedInvoice)
  {
    $this->consolidatedInvoice = $consolidatedInvoice;
  }
  /**
   * @return bool
   */
  public function getConsolidatedInvoice()
  {
    return $this->consolidatedInvoice;
  }
  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param string
   */
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  /**
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->currencyCode;
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
  public function setInvoiceLevel($invoiceLevel)
  {
    $this->invoiceLevel = $invoiceLevel;
  }
  /**
   * @return string
   */
  public function getInvoiceLevel()
  {
    return $this->invoiceLevel;
  }
  /**
   * @param bool
   */
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  /**
   * @return bool
   */
  public function getIsDefault()
  {
    return $this->isDefault;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPaymentsAccountId($paymentsAccountId)
  {
    $this->paymentsAccountId = $paymentsAccountId;
  }
  /**
   * @return string
   */
  public function getPaymentsAccountId()
  {
    return $this->paymentsAccountId;
  }
  /**
   * @param string
   */
  public function setPaymentsCustomerId($paymentsCustomerId)
  {
    $this->paymentsCustomerId = $paymentsCustomerId;
  }
  /**
   * @return string
   */
  public function getPaymentsCustomerId()
  {
    return $this->paymentsCustomerId;
  }
  /**
   * @param string
   */
  public function setPurchaseOrder($purchaseOrder)
  {
    $this->purchaseOrder = $purchaseOrder;
  }
  /**
   * @return string
   */
  public function getPurchaseOrder()
  {
    return $this->purchaseOrder;
  }
  /**
   * @param string
   */
  public function setSecondaryPaymentsCustomerId($secondaryPaymentsCustomerId)
  {
    $this->secondaryPaymentsCustomerId = $secondaryPaymentsCustomerId;
  }
  /**
   * @return string
   */
  public function getSecondaryPaymentsCustomerId()
  {
    return $this->secondaryPaymentsCustomerId;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BillingProfile::class, 'Google_Service_Dfareporting_BillingProfile');
