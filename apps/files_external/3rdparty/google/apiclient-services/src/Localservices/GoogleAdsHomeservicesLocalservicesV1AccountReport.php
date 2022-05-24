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

class GoogleAdsHomeservicesLocalservicesV1AccountReport extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  protected $aggregatorInfoType = GoogleAdsHomeservicesLocalservicesV1AggregatorInfo::class;
  protected $aggregatorInfoDataType = '';
  public $averageFiveStarRating;
  public $averageWeeklyBudget;
  /**
   * @var string
   */
  public $businessName;
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var string
   */
  public $currentPeriodChargedLeads;
  /**
   * @var string
   */
  public $currentPeriodConnectedPhoneCalls;
  /**
   * @var string
   */
  public $currentPeriodPhoneCalls;
  public $currentPeriodTotalCost;
  /**
   * @var string
   */
  public $impressionsLastTwoDays;
  public $phoneLeadResponsiveness;
  /**
   * @var string
   */
  public $previousPeriodChargedLeads;
  /**
   * @var string
   */
  public $previousPeriodConnectedPhoneCalls;
  /**
   * @var string
   */
  public $previousPeriodPhoneCalls;
  public $previousPeriodTotalCost;
  /**
   * @var int
   */
  public $totalReview;

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
  public function setAverageFiveStarRating($averageFiveStarRating)
  {
    $this->averageFiveStarRating = $averageFiveStarRating;
  }
  public function getAverageFiveStarRating()
  {
    return $this->averageFiveStarRating;
  }
  public function setAverageWeeklyBudget($averageWeeklyBudget)
  {
    $this->averageWeeklyBudget = $averageWeeklyBudget;
  }
  public function getAverageWeeklyBudget()
  {
    return $this->averageWeeklyBudget;
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
  public function setCurrentPeriodChargedLeads($currentPeriodChargedLeads)
  {
    $this->currentPeriodChargedLeads = $currentPeriodChargedLeads;
  }
  /**
   * @return string
   */
  public function getCurrentPeriodChargedLeads()
  {
    return $this->currentPeriodChargedLeads;
  }
  /**
   * @param string
   */
  public function setCurrentPeriodConnectedPhoneCalls($currentPeriodConnectedPhoneCalls)
  {
    $this->currentPeriodConnectedPhoneCalls = $currentPeriodConnectedPhoneCalls;
  }
  /**
   * @return string
   */
  public function getCurrentPeriodConnectedPhoneCalls()
  {
    return $this->currentPeriodConnectedPhoneCalls;
  }
  /**
   * @param string
   */
  public function setCurrentPeriodPhoneCalls($currentPeriodPhoneCalls)
  {
    $this->currentPeriodPhoneCalls = $currentPeriodPhoneCalls;
  }
  /**
   * @return string
   */
  public function getCurrentPeriodPhoneCalls()
  {
    return $this->currentPeriodPhoneCalls;
  }
  public function setCurrentPeriodTotalCost($currentPeriodTotalCost)
  {
    $this->currentPeriodTotalCost = $currentPeriodTotalCost;
  }
  public function getCurrentPeriodTotalCost()
  {
    return $this->currentPeriodTotalCost;
  }
  /**
   * @param string
   */
  public function setImpressionsLastTwoDays($impressionsLastTwoDays)
  {
    $this->impressionsLastTwoDays = $impressionsLastTwoDays;
  }
  /**
   * @return string
   */
  public function getImpressionsLastTwoDays()
  {
    return $this->impressionsLastTwoDays;
  }
  public function setPhoneLeadResponsiveness($phoneLeadResponsiveness)
  {
    $this->phoneLeadResponsiveness = $phoneLeadResponsiveness;
  }
  public function getPhoneLeadResponsiveness()
  {
    return $this->phoneLeadResponsiveness;
  }
  /**
   * @param string
   */
  public function setPreviousPeriodChargedLeads($previousPeriodChargedLeads)
  {
    $this->previousPeriodChargedLeads = $previousPeriodChargedLeads;
  }
  /**
   * @return string
   */
  public function getPreviousPeriodChargedLeads()
  {
    return $this->previousPeriodChargedLeads;
  }
  /**
   * @param string
   */
  public function setPreviousPeriodConnectedPhoneCalls($previousPeriodConnectedPhoneCalls)
  {
    $this->previousPeriodConnectedPhoneCalls = $previousPeriodConnectedPhoneCalls;
  }
  /**
   * @return string
   */
  public function getPreviousPeriodConnectedPhoneCalls()
  {
    return $this->previousPeriodConnectedPhoneCalls;
  }
  /**
   * @param string
   */
  public function setPreviousPeriodPhoneCalls($previousPeriodPhoneCalls)
  {
    $this->previousPeriodPhoneCalls = $previousPeriodPhoneCalls;
  }
  /**
   * @return string
   */
  public function getPreviousPeriodPhoneCalls()
  {
    return $this->previousPeriodPhoneCalls;
  }
  public function setPreviousPeriodTotalCost($previousPeriodTotalCost)
  {
    $this->previousPeriodTotalCost = $previousPeriodTotalCost;
  }
  public function getPreviousPeriodTotalCost()
  {
    return $this->previousPeriodTotalCost;
  }
  /**
   * @param int
   */
  public function setTotalReview($totalReview)
  {
    $this->totalReview = $totalReview;
  }
  /**
   * @return int
   */
  public function getTotalReview()
  {
    return $this->totalReview;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAdsHomeservicesLocalservicesV1AccountReport::class, 'Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1AccountReport');
