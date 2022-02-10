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
  /**
   * @var string
   */
  public $accountId;
  protected $aggregatorInfoType = GoogleAdsHomeservicesLocalservicesV1AggregatorInfo::class;
  protected $aggregatorInfoDataType = '';
  protected $bookingLeadType = GoogleAdsHomeservicesLocalservicesV1BookingLead::class;
  protected $bookingLeadDataType = '';
  /**
   * @var string
   */
  public $businessName;
  /**
   * @var string
   */
  public $chargeStatus;
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var string
   */
  public $disputeStatus;
  /**
   * @var string
   */
  public $geo;
  /**
   * @var string
   */
  public $leadCategory;
  /**
   * @var string
   */
  public $leadCreationTimestamp;
  /**
   * @var string
   */
  public $leadId;
  public $leadPrice;
  /**
   * @var string
   */
  public $leadType;
  protected $messageLeadType = GoogleAdsHomeservicesLocalservicesV1MessageLead::class;
  protected $messageLeadDataType = '';
  protected $phoneLeadType = GoogleAdsHomeservicesLocalservicesV1PhoneLead::class;
  protected $phoneLeadDataType = '';
  protected $timezoneType = GoogleTypeTimeZone::class;
  protected $timezoneDataType = '';

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
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
  /**
   * @param GoogleAdsHomeservicesLocalservicesV1BookingLead
   */
  public function setBookingLead(GoogleAdsHomeservicesLocalservicesV1BookingLead $bookingLead)
  {
    $this->bookingLead = $bookingLead;
  }
  /**
   * @return GoogleAdsHomeservicesLocalservicesV1BookingLead
   */
  public function getBookingLead()
  {
    return $this->bookingLead;
  }
  /**
   * @param string
   */
  public function setBusinessName($businessName)
  {
    $this->businessName = $businessName;
  }
  /**
   * @return string
   */
  public function getBusinessName()
  {
    return $this->businessName;
  }
  /**
   * @param string
   */
  public function setChargeStatus($chargeStatus)
  {
    $this->chargeStatus = $chargeStatus;
  }
  /**
   * @return string
   */
  public function getChargeStatus()
  {
    return $this->chargeStatus;
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
  public function setDisputeStatus($disputeStatus)
  {
    $this->disputeStatus = $disputeStatus;
  }
  /**
   * @return string
   */
  public function getDisputeStatus()
  {
    return $this->disputeStatus;
  }
  /**
   * @param string
   */
  public function setGeo($geo)
  {
    $this->geo = $geo;
  }
  /**
   * @return string
   */
  public function getGeo()
  {
    return $this->geo;
  }
  /**
   * @param string
   */
  public function setLeadCategory($leadCategory)
  {
    $this->leadCategory = $leadCategory;
  }
  /**
   * @return string
   */
  public function getLeadCategory()
  {
    return $this->leadCategory;
  }
  /**
   * @param string
   */
  public function setLeadCreationTimestamp($leadCreationTimestamp)
  {
    $this->leadCreationTimestamp = $leadCreationTimestamp;
  }
  /**
   * @return string
   */
  public function getLeadCreationTimestamp()
  {
    return $this->leadCreationTimestamp;
  }
  /**
   * @param string
   */
  public function setLeadId($leadId)
  {
    $this->leadId = $leadId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setLeadType($leadType)
  {
    $this->leadType = $leadType;
  }
  /**
   * @return string
   */
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
