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

class Google_Service_ShoppingContent_InvoiceSummary extends Google_Collection
{
  protected $collection_key = 'additionalChargeSummaries';
  protected $additionalChargeSummariesType = 'Google_Service_ShoppingContent_InvoiceSummaryAdditionalChargeSummary';
  protected $additionalChargeSummariesDataType = 'array';
  protected $productTotalType = 'Google_Service_ShoppingContent_Amount';
  protected $productTotalDataType = '';

  /**
   * @param Google_Service_ShoppingContent_InvoiceSummaryAdditionalChargeSummary[]
   */
  public function setAdditionalChargeSummaries($additionalChargeSummaries)
  {
    $this->additionalChargeSummaries = $additionalChargeSummaries;
  }
  /**
   * @return Google_Service_ShoppingContent_InvoiceSummaryAdditionalChargeSummary[]
   */
  public function getAdditionalChargeSummaries()
  {
    return $this->additionalChargeSummaries;
  }
  /**
   * @param Google_Service_ShoppingContent_Amount
   */
  public function setProductTotal(Google_Service_ShoppingContent_Amount $productTotal)
  {
    $this->productTotal = $productTotal;
  }
  /**
   * @return Google_Service_ShoppingContent_Amount
   */
  public function getProductTotal()
  {
    return $this->productTotal;
  }
}
