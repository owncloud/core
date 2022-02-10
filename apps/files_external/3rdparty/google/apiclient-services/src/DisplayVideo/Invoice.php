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

class Invoice extends \Google\Collection
{
  protected $collection_key = 'replacedInvoiceIds';
  /**
   * @var string
   */
  public $budgetInvoiceGroupingId;
  protected $budgetSummariesType = BudgetSummary::class;
  protected $budgetSummariesDataType = 'array';
  /**
   * @var string
   */
  public $correctedInvoiceId;
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var string
   */
  public $displayName;
  protected $dueDateType = Date::class;
  protected $dueDateDataType = '';
  /**
   * @var string
   */
  public $invoiceId;
  /**
   * @var string
   */
  public $invoiceType;
  protected $issueDateType = Date::class;
  protected $issueDateDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $nonBudgetMicros;
  /**
   * @var string
   */
  public $paymentsAccountId;
  /**
   * @var string
   */
  public $paymentsProfileId;
  /**
   * @var string
   */
  public $pdfUrl;
  /**
   * @var string
   */
  public $purchaseOrderNumber;
  /**
   * @var string[]
   */
  public $replacedInvoiceIds;
  protected $serviceDateRangeType = DateRange::class;
  protected $serviceDateRangeDataType = '';
  /**
   * @var string
   */
  public $subtotalAmountMicros;
  /**
   * @var string
   */
  public $totalAmountMicros;
  /**
   * @var string
   */
  public $totalTaxAmountMicros;

  /**
   * @param string
   */
  public function setBudgetInvoiceGroupingId($budgetInvoiceGroupingId)
  {
    $this->budgetInvoiceGroupingId = $budgetInvoiceGroupingId;
  }
  /**
   * @return string
   */
  public function getBudgetInvoiceGroupingId()
  {
    return $this->budgetInvoiceGroupingId;
  }
  /**
   * @param BudgetSummary[]
   */
  public function setBudgetSummaries($budgetSummaries)
  {
    $this->budgetSummaries = $budgetSummaries;
  }
  /**
   * @return BudgetSummary[]
   */
  public function getBudgetSummaries()
  {
    return $this->budgetSummaries;
  }
  /**
   * @param string
   */
  public function setCorrectedInvoiceId($correctedInvoiceId)
  {
    $this->correctedInvoiceId = $correctedInvoiceId;
  }
  /**
   * @return string
   */
  public function getCorrectedInvoiceId()
  {
    return $this->correctedInvoiceId;
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
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Date
   */
  public function setDueDate(Date $dueDate)
  {
    $this->dueDate = $dueDate;
  }
  /**
   * @return Date
   */
  public function getDueDate()
  {
    return $this->dueDate;
  }
  /**
   * @param string
   */
  public function setInvoiceId($invoiceId)
  {
    $this->invoiceId = $invoiceId;
  }
  /**
   * @return string
   */
  public function getInvoiceId()
  {
    return $this->invoiceId;
  }
  /**
   * @param string
   */
  public function setInvoiceType($invoiceType)
  {
    $this->invoiceType = $invoiceType;
  }
  /**
   * @return string
   */
  public function getInvoiceType()
  {
    return $this->invoiceType;
  }
  /**
   * @param Date
   */
  public function setIssueDate(Date $issueDate)
  {
    $this->issueDate = $issueDate;
  }
  /**
   * @return Date
   */
  public function getIssueDate()
  {
    return $this->issueDate;
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
  public function setNonBudgetMicros($nonBudgetMicros)
  {
    $this->nonBudgetMicros = $nonBudgetMicros;
  }
  /**
   * @return string
   */
  public function getNonBudgetMicros()
  {
    return $this->nonBudgetMicros;
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
  public function setPaymentsProfileId($paymentsProfileId)
  {
    $this->paymentsProfileId = $paymentsProfileId;
  }
  /**
   * @return string
   */
  public function getPaymentsProfileId()
  {
    return $this->paymentsProfileId;
  }
  /**
   * @param string
   */
  public function setPdfUrl($pdfUrl)
  {
    $this->pdfUrl = $pdfUrl;
  }
  /**
   * @return string
   */
  public function getPdfUrl()
  {
    return $this->pdfUrl;
  }
  /**
   * @param string
   */
  public function setPurchaseOrderNumber($purchaseOrderNumber)
  {
    $this->purchaseOrderNumber = $purchaseOrderNumber;
  }
  /**
   * @return string
   */
  public function getPurchaseOrderNumber()
  {
    return $this->purchaseOrderNumber;
  }
  /**
   * @param string[]
   */
  public function setReplacedInvoiceIds($replacedInvoiceIds)
  {
    $this->replacedInvoiceIds = $replacedInvoiceIds;
  }
  /**
   * @return string[]
   */
  public function getReplacedInvoiceIds()
  {
    return $this->replacedInvoiceIds;
  }
  /**
   * @param DateRange
   */
  public function setServiceDateRange(DateRange $serviceDateRange)
  {
    $this->serviceDateRange = $serviceDateRange;
  }
  /**
   * @return DateRange
   */
  public function getServiceDateRange()
  {
    return $this->serviceDateRange;
  }
  /**
   * @param string
   */
  public function setSubtotalAmountMicros($subtotalAmountMicros)
  {
    $this->subtotalAmountMicros = $subtotalAmountMicros;
  }
  /**
   * @return string
   */
  public function getSubtotalAmountMicros()
  {
    return $this->subtotalAmountMicros;
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
  /**
   * @param string
   */
  public function setTotalTaxAmountMicros($totalTaxAmountMicros)
  {
    $this->totalTaxAmountMicros = $totalTaxAmountMicros;
  }
  /**
   * @return string
   */
  public function getTotalTaxAmountMicros()
  {
    return $this->totalTaxAmountMicros;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Invoice::class, 'Google_Service_DisplayVideo_Invoice');
