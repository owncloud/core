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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1TransferableSku extends \Google\Model
{
  protected $legacySkuType = GoogleCloudChannelV1Sku::class;
  protected $legacySkuDataType = '';
  protected $skuType = GoogleCloudChannelV1Sku::class;
  protected $skuDataType = '';
  protected $transferEligibilityType = GoogleCloudChannelV1TransferEligibility::class;
  protected $transferEligibilityDataType = '';

  /**
   * @param GoogleCloudChannelV1Sku
   */
  public function setLegacySku(GoogleCloudChannelV1Sku $legacySku)
  {
    $this->legacySku = $legacySku;
  }
  /**
   * @return GoogleCloudChannelV1Sku
   */
  public function getLegacySku()
  {
    return $this->legacySku;
  }
  /**
   * @param GoogleCloudChannelV1Sku
   */
  public function setSku(GoogleCloudChannelV1Sku $sku)
  {
    $this->sku = $sku;
  }
  /**
   * @return GoogleCloudChannelV1Sku
   */
  public function getSku()
  {
    return $this->sku;
  }
  /**
   * @param GoogleCloudChannelV1TransferEligibility
   */
  public function setTransferEligibility(GoogleCloudChannelV1TransferEligibility $transferEligibility)
  {
    $this->transferEligibility = $transferEligibility;
  }
  /**
   * @return GoogleCloudChannelV1TransferEligibility
   */
  public function getTransferEligibility()
  {
    return $this->transferEligibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1TransferableSku::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1TransferableSku');
