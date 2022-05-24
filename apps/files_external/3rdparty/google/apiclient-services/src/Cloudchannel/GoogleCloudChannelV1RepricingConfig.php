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

class GoogleCloudChannelV1RepricingConfig extends \Google\Model
{
  protected $adjustmentType = GoogleCloudChannelV1RepricingAdjustment::class;
  protected $adjustmentDataType = '';
  protected $channelPartnerGranularityType = GoogleCloudChannelV1RepricingConfigChannelPartnerGranularity::class;
  protected $channelPartnerGranularityDataType = '';
  protected $effectiveInvoiceMonthType = GoogleTypeDate::class;
  protected $effectiveInvoiceMonthDataType = '';
  protected $entitlementGranularityType = GoogleCloudChannelV1RepricingConfigEntitlementGranularity::class;
  protected $entitlementGranularityDataType = '';
  /**
   * @var string
   */
  public $rebillingBasis;

  /**
   * @param GoogleCloudChannelV1RepricingAdjustment
   */
  public function setAdjustment(GoogleCloudChannelV1RepricingAdjustment $adjustment)
  {
    $this->adjustment = $adjustment;
  }
  /**
   * @return GoogleCloudChannelV1RepricingAdjustment
   */
  public function getAdjustment()
  {
    return $this->adjustment;
  }
  /**
   * @param GoogleCloudChannelV1RepricingConfigChannelPartnerGranularity
   */
  public function setChannelPartnerGranularity(GoogleCloudChannelV1RepricingConfigChannelPartnerGranularity $channelPartnerGranularity)
  {
    $this->channelPartnerGranularity = $channelPartnerGranularity;
  }
  /**
   * @return GoogleCloudChannelV1RepricingConfigChannelPartnerGranularity
   */
  public function getChannelPartnerGranularity()
  {
    return $this->channelPartnerGranularity;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setEffectiveInvoiceMonth(GoogleTypeDate $effectiveInvoiceMonth)
  {
    $this->effectiveInvoiceMonth = $effectiveInvoiceMonth;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getEffectiveInvoiceMonth()
  {
    return $this->effectiveInvoiceMonth;
  }
  /**
   * @param GoogleCloudChannelV1RepricingConfigEntitlementGranularity
   */
  public function setEntitlementGranularity(GoogleCloudChannelV1RepricingConfigEntitlementGranularity $entitlementGranularity)
  {
    $this->entitlementGranularity = $entitlementGranularity;
  }
  /**
   * @return GoogleCloudChannelV1RepricingConfigEntitlementGranularity
   */
  public function getEntitlementGranularity()
  {
    return $this->entitlementGranularity;
  }
  /**
   * @param string
   */
  public function setRebillingBasis($rebillingBasis)
  {
    $this->rebillingBasis = $rebillingBasis;
  }
  /**
   * @return string
   */
  public function getRebillingBasis()
  {
    return $this->rebillingBasis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1RepricingConfig::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1RepricingConfig');
