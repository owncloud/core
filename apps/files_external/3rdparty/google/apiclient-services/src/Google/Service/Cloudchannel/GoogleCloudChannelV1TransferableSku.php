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

class Google_Service_Cloudchannel_GoogleCloudChannelV1TransferableSku extends Google_Model
{
  protected $skuType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1Sku';
  protected $skuDataType = '';
  protected $transferEligibilityType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1TransferEligibility';
  protected $transferEligibilityDataType = '';

  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1Sku
   */
  public function setSku(Google_Service_Cloudchannel_GoogleCloudChannelV1Sku $sku)
  {
    $this->sku = $sku;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Sku
   */
  public function getSku()
  {
    return $this->sku;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1TransferEligibility
   */
  public function setTransferEligibility(Google_Service_Cloudchannel_GoogleCloudChannelV1TransferEligibility $transferEligibility)
  {
    $this->transferEligibility = $transferEligibility;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1TransferEligibility
   */
  public function getTransferEligibility()
  {
    return $this->transferEligibility;
  }
}
