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

class Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1AccountReport extends Google_Model
{
  public $accountId;
  public $averageFiveStarRating;
  public $averageWeeklyBudget;
  public $businessName;
  public $currencyCode;
  public $currentPeriodChargedLeads;
  public $currentPeriodConnectedPhoneCalls;
  public $currentPeriodPhoneCalls;
  public $currentPeriodTotalCost;
  public $phoneLeadResponsiveness;
  public $previousPeriodChargedLeads;
  public $previousPeriodConnectedPhoneCalls;
  public $previousPeriodPhoneCalls;
  public $previousPeriodTotalCost;
  public $totalReview;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
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
  public function setBusinessName($businessName)
  {
    $this->businessName = $businessName;
  }
  public function getBusinessName()
  {
    return $this->businessName;
  }
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  public function setCurrentPeriodChargedLeads($currentPeriodChargedLeads)
  {
    $this->currentPeriodChargedLeads = $currentPeriodChargedLeads;
  }
  public function getCurrentPeriodChargedLeads()
  {
    return $this->currentPeriodChargedLeads;
  }
  public function setCurrentPeriodConnectedPhoneCalls($currentPeriodConnectedPhoneCalls)
  {
    $this->currentPeriodConnectedPhoneCalls = $currentPeriodConnectedPhoneCalls;
  }
  public function getCurrentPeriodConnectedPhoneCalls()
  {
    return $this->currentPeriodConnectedPhoneCalls;
  }
  public function setCurrentPeriodPhoneCalls($currentPeriodPhoneCalls)
  {
    $this->currentPeriodPhoneCalls = $currentPeriodPhoneCalls;
  }
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
  public function setPhoneLeadResponsiveness($phoneLeadResponsiveness)
  {
    $this->phoneLeadResponsiveness = $phoneLeadResponsiveness;
  }
  public function getPhoneLeadResponsiveness()
  {
    return $this->phoneLeadResponsiveness;
  }
  public function setPreviousPeriodChargedLeads($previousPeriodChargedLeads)
  {
    $this->previousPeriodChargedLeads = $previousPeriodChargedLeads;
  }
  public function getPreviousPeriodChargedLeads()
  {
    return $this->previousPeriodChargedLeads;
  }
  public function setPreviousPeriodConnectedPhoneCalls($previousPeriodConnectedPhoneCalls)
  {
    $this->previousPeriodConnectedPhoneCalls = $previousPeriodConnectedPhoneCalls;
  }
  public function getPreviousPeriodConnectedPhoneCalls()
  {
    return $this->previousPeriodConnectedPhoneCalls;
  }
  public function setPreviousPeriodPhoneCalls($previousPeriodPhoneCalls)
  {
    $this->previousPeriodPhoneCalls = $previousPeriodPhoneCalls;
  }
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
  public function setTotalReview($totalReview)
  {
    $this->totalReview = $totalReview;
  }
  public function getTotalReview()
  {
    return $this->totalReview;
  }
}
