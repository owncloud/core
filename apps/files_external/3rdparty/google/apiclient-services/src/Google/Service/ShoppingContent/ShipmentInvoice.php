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

class Google_Service_ShoppingContent_ShipmentInvoice extends Google_Collection
{
  protected $collection_key = 'lineItemInvoices';
  protected $invoiceSummaryType = 'Google_Service_ShoppingContent_InvoiceSummary';
  protected $invoiceSummaryDataType = '';
  protected $lineItemInvoicesType = 'Google_Service_ShoppingContent_ShipmentInvoiceLineItemInvoice';
  protected $lineItemInvoicesDataType = 'array';
  public $shipmentGroupId;

  /**
   * @param Google_Service_ShoppingContent_InvoiceSummary
   */
  public function setInvoiceSummary(Google_Service_ShoppingContent_InvoiceSummary $invoiceSummary)
  {
    $this->invoiceSummary = $invoiceSummary;
  }
  /**
   * @return Google_Service_ShoppingContent_InvoiceSummary
   */
  public function getInvoiceSummary()
  {
    return $this->invoiceSummary;
  }
  /**
   * @param Google_Service_ShoppingContent_ShipmentInvoiceLineItemInvoice[]
   */
  public function setLineItemInvoices($lineItemInvoices)
  {
    $this->lineItemInvoices = $lineItemInvoices;
  }
  /**
   * @return Google_Service_ShoppingContent_ShipmentInvoiceLineItemInvoice[]
   */
  public function getLineItemInvoices()
  {
    return $this->lineItemInvoices;
  }
  public function setShipmentGroupId($shipmentGroupId)
  {
    $this->shipmentGroupId = $shipmentGroupId;
  }
  public function getShipmentGroupId()
  {
    return $this->shipmentGroupId;
  }
}
