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
  public $budgetInvoiceGroupingId;
  protected $budgetSummariesType = BudgetSummary::class;
  protected $budgetSummariesDataType = 'array';
  public $correctedInvoiceId;
  public $currencyCode;
  public $displayName;
  protected $dueDateType = Date::class;
  protected $dueDateDataType = '';
  public $invoiceId;
  public $invoiceType;
  protected $issueDateType = Date::class;
  protected $issueDateDataType = '';
  public $name;
  public $nonBudgetMicros;
  public $paymentsAccountId;
  public $paymentsProfileId;
  public $pdfUrl;
  public $purchaseOrderNumber;
  public $replacedInvoiceIds;
  protected $serviceDateRangeType = DateRange::class;
  protected $serviceDateRangeDataType = '';
  public $subtotalAmountMicros;
  public $totalAmountMicros;
  public $totalTaxAmountMicros;

  public function setBudgetInvoiceGroupingId($budgetInvoiceGroupingId)
  {
    $this->budgetInvoiceGroupingId = $budgetInvoiceGroupingId;
  }
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
  public function setCorrectedInvoiceId($correctedInvoiceId)
  {
    $this->correctedInvoiceId = $correctedInvoiceId;
  }
  public function getCorrectedInvoiceId()
  {
    return $this->correctedInvoiceId;
  }
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
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
  public function setInvoiceId($invoiceId)
  {
    $this->invoiceId = $invoiceId;
  }
  public function getInvoiceId()
  {
    return $this->invoiceId;
  }
  public function setInvoiceType($invoiceType)
  {
    $this->invoiceType = $invoiceType;
  }
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNonBudgetMicros($nonBudgetMicros)
  {
    $this->nonBudgetMicros = $nonBudgetMicros;
  }
  public function getNonBudgetMicros()
  {
    return $this->nonBudgetMicros;
  }
  public function setPaymentsAccountId($paymentsAccountId)
  {
    $this->paymentsAccountId = $paymentsAccountId;
  }
  public function getPaymentsAccountId()
  {
    return $this->paymentsAccountId;
  }
  public function setPaymentsProfileId($paymentsProfileId)
  {
    $this->paymentsProfileId = $paymentsProfileId;
  }
  public function getPaymentsProfileId()
  {
    return $this->paymentsProfileId;
  }
  public function setPdfUrl($pdfUrl)
  {
    $this->pdfUrl = $pdfUrl;
  }
  public function getPdfUrl()
  {
    return $this->pdfUrl;
  }
  public function setPurchaseOrderNumber($purchaseOrderNumber)
  {
    $this->purchaseOrderNumber = $purchaseOrderNumber;
  }
  public function getPurchaseOrderNumber()
  {
    return $this->purchaseOrderNumber;
  }
  public function setReplacedInvoiceIds($replacedInvoiceIds)
  {
    $this->replacedInvoiceIds = $replacedInvoiceIds;
  }
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
  public function setSubtotalAmountMicros($subtotalAmountMicros)
  {
    $this->subtotalAmountMicros = $subtotalAmountMicros;
  }
  public function getSubtotalAmountMicros()
  {
    return $this->subtotalAmountMicros;
  }
  public function setTotalAmountMicros($totalAmountMicros)
  {
    $this->totalAmountMicros = $totalAmountMicros;
  }
  public function getTotalAmountMicros()
  {
    return $this->totalAmountMicros;
  }
  public function setTotalTaxAmountMicros($totalTaxAmountMicros)
  {
    $this->totalTaxAmountMicros = $totalTaxAmountMicros;
  }
  public function getTotalTaxAmountMicros()
  {
    return $this->totalTaxAmountMicros;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Invoice::class, 'Google_Service_DisplayVideo_Invoice');
