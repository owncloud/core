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

class Invoice extends \Google\Collection
{
  protected $collection_key = 'replacedInvoiceIds';
  protected $internal_gapi_mappings = [
        "campaignSummaries" => "campaign_summaries",
  ];
  protected $campaignSummariesType = CampaignSummary::class;
  protected $campaignSummariesDataType = 'array';
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
  public $dueDate;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $invoiceType;
  /**
   * @var string
   */
  public $issueDate;
  /**
   * @var string
   */
  public $kind;
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
  /**
   * @var string
   */
  public $serviceEndDate;
  /**
   * @var string
   */
  public $serviceStartDate;
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
   * @param CampaignSummary[]
   */
  public function setCampaignSummaries($campaignSummaries)
  {
    $this->campaignSummaries = $campaignSummaries;
  }
  /**
   * @return CampaignSummary[]
   */
  public function getCampaignSummaries()
  {
    return $this->campaignSummaries;
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
  public function setDueDate($dueDate)
  {
    $this->dueDate = $dueDate;
  }
  /**
   * @return string
   */
  public function getDueDate()
  {
    return $this->dueDate;
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
   * @param string
   */
  public function setIssueDate($issueDate)
  {
    $this->issueDate = $issueDate;
  }
  /**
   * @return string
   */
  public function getIssueDate()
  {
    return $this->issueDate;
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
   * @param string
   */
  public function setServiceEndDate($serviceEndDate)
  {
    $this->serviceEndDate = $serviceEndDate;
  }
  /**
   * @return string
   */
  public function getServiceEndDate()
  {
    return $this->serviceEndDate;
  }
  /**
   * @param string
   */
  public function setServiceStartDate($serviceStartDate)
  {
    $this->serviceStartDate = $serviceStartDate;
  }
  /**
   * @return string
   */
  public function getServiceStartDate()
  {
    return $this->serviceStartDate;
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
class_alias(Invoice::class, 'Google_Service_Dfareporting_Invoice');
