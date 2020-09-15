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

class Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1DetailedLeadReport extends Google_Model
{
  public $accountId;
  protected $aggregatorInfoType = 'Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1AggregatorInfo';
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
  protected $messageLeadType = 'Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1MessageLead';
  protected $messageLeadDataType = '';
  protected $phoneLeadType = 'Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1PhoneLead';
  protected $phoneLeadDataType = '';
  protected $timezoneType = 'Google_Service_Localservices_GoogleTypeTimeZone';
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
   * @param Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1AggregatorInfo
   */
  public function setAggregatorInfo(Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1AggregatorInfo $aggregatorInfo)
  {
    $this->aggregatorInfo = $aggregatorInfo;
  }
  /**
   * @return Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1AggregatorInfo
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
   * @param Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1MessageLead
   */
  public function setMessageLead(Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1MessageLead $messageLead)
  {
    $this->messageLead = $messageLead;
  }
  /**
   * @return Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1MessageLead
   */
  public function getMessageLead()
  {
    return $this->messageLead;
  }
  /**
   * @param Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1PhoneLead
   */
  public function setPhoneLead(Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1PhoneLead $phoneLead)
  {
    $this->phoneLead = $phoneLead;
  }
  /**
   * @return Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1PhoneLead
   */
  public function getPhoneLead()
  {
    return $this->phoneLead;
  }
  /**
   * @param Google_Service_Localservices_GoogleTypeTimeZone
   */
  public function setTimezone(Google_Service_Localservices_GoogleTypeTimeZone $timezone)
  {
    $this->timezone = $timezone;
  }
  /**
   * @return Google_Service_Localservices_GoogleTypeTimeZone
   */
  public function getTimezone()
  {
    return $this->timezone;
  }
}
