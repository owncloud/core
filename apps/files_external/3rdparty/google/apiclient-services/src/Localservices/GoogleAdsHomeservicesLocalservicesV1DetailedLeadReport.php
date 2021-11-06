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

namespace Google\Service\Localservices;

class GoogleAdsHomeservicesLocalservicesV1DetailedLeadReport extends \Google\Model
{
  public $accountId;
  protected $aggregatorInfoType = GoogleAdsHomeservicesLocalservicesV1AggregatorInfo::class;
  protected $aggregatorInfoDataType = '';
  public $businessName;
  public $chargeStatus;
  public $currencyCode;
  public $disputeStatus;
  public $geo;
  public $leadCategory;
  public $leadCreationTimestamp;
  public $leadId;
  public $leadPrice;
  public $leadType;
  protected $messageLeadType = GoogleAdsHomeservicesLocalservicesV1MessageLead::class;
  protected $messageLeadDataType = '';
  protected $phoneLeadType = GoogleAdsHomeservicesLocalservicesV1PhoneLead::class;
  protected $phoneLeadDataType = '';
  protected $timezoneType = GoogleTypeTimeZone::class;
  protected $timezoneDataType = '';

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param GoogleAdsHomeservicesLocalservicesV1AggregatorInfo
   */
  public function setAggregatorInfo(GoogleAdsHomeservicesLocalservicesV1AggregatorInfo $aggregatorInfo)
  {
    $this->aggregatorInfo = $aggregatorInfo;
  }
  /**
   * @return GoogleAdsHomeservicesLocalservicesV1AggregatorInfo
   */
  public function getAggregatorInfo()
  {
    return $this->aggregatorInfo;
  }
  public function setBusinessName($businessName)
  {
    $this->businessName = $businessName;
  }
  public function getBusinessName()
  {
    return $this->businessName;
  }
  public function setChargeStatus($chargeStatus)
  {
    $this->chargeStatus = $chargeStatus;
  }
  public function getChargeStatus()
  {
    return $this->chargeStatus;
  }
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  public function setDisputeStatus($disputeStatus)
  {
    $this->disputeStatus = $disputeStatus;
  }
  public function getDisputeStatus()
  {
    return $this->disputeStatus;
  }
  public function setGeo($geo)
  {
    $this->geo = $geo;
  }
  public function getGeo()
  {
    return $this->geo;
  }
  public function setLeadCategory($leadCategory)
  {
    $this->leadCategory = $leadCategory;
  }
  public function getLeadCategory()
  {
    return $this->leadCategory;
  }
  public function setLeadCreationTimestamp($leadCreationTimestamp)
  {
    $this->leadCreationTimestamp = $leadCreationTimestamp;
  }
  public function getLeadCreationTimestamp()
  {
    return $this->leadCreationTimestamp;
  }
  public function setLeadId($leadId)
  {
    $this->leadId = $leadId;
  }
  public function getLeadId()
  {
    return $this->leadId;
  }
  public function setLeadPrice($leadPrice)
  {
    $this->leadPrice = $leadPrice;
  }
  public function getLeadPrice()
  {
    return $this->leadPrice;
  }
  public function setLeadType($leadType)
  {
    $this->leadType = $leadType;
  }
  public function getLeadType()
  {
    return $this->leadType;
  }
  /**
   * @param GoogleAdsHomeservicesLocalservicesV1MessageLead
   */
  public function setMessageLead(GoogleAdsHomeservicesLocalservicesV1MessageLead $messageLead)
  {
    $this->messageLead = $messageLead;
  }
  /**
   * @return GoogleAdsHomeservicesLocalservicesV1MessageLead
   */
  public function getMessageLead()
  {
    return $this->messageLead;
  }
  /**
   * @param GoogleAdsHomeservicesLocalservicesV1PhoneLead
   */
  public function setPhoneLead(GoogleAdsHomeservicesLocalservicesV1PhoneLead $phoneLead)
  {
    $this->phoneLead = $phoneLead;
  }
  /**
   * @return GoogleAdsHomeservicesLocalservicesV1PhoneLead
   */
  public function getPhoneLead()
  {
    return $this->phoneLead;
  }
  /**
   * @param GoogleTypeTimeZone
   */
  public function setTimezone(GoogleTypeTimeZone $timezone)
  {
    $this->timezone = $timezone;
  }
  /**
   * @return GoogleTypeTimeZone
   */
  public function getTimezone()
  {
    return $this->timezone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAdsHomeservicesLocalservicesV1DetailedLeadReport::class, 'Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1DetailedLeadReport');
