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

namespace Google\Service\Dfareporting;

class Project extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string
   */
  public $audienceAgeGroup;
  /**
   * @var string
   */
  public $audienceGender;
  /**
   * @var string
   */
  public $budget;
  /**
   * @var string
   */
  public $clientBillingCode;
  /**
   * @var string
   */
  public $clientName;
  /**
   * @var string
   */
  public $endDate;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $lastModifiedInfoType = LastModifiedInfo::class;
  protected $lastModifiedInfoDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $overview;
  /**
   * @var string
   */
  public $startDate;
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var string
   */
  public $targetClicks;
  /**
   * @var string
   */
  public $targetConversions;
  /**
   * @var string
   */
  public $targetCpaNanos;
  /**
   * @var string
   */
  public $targetCpcNanos;
  /**
   * @var string
   */
  public $targetCpmActiveViewNanos;
  /**
   * @var string
   */
  public $targetCpmNanos;
  /**
   * @var string
   */
  public $targetImpressions;

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
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param string
   */
  public function setAudienceAgeGroup($audienceAgeGroup)
  {
    $this->audienceAgeGroup = $audienceAgeGroup;
  }
  /**
   * @return string
   */
  public function getAudienceAgeGroup()
  {
    return $this->audienceAgeGroup;
  }
  /**
   * @param string
   */
  public function setAudienceGender($audienceGender)
  {
    $this->audienceGender = $audienceGender;
  }
  /**
   * @return string
   */
  public function getAudienceGender()
  {
    return $this->audienceGender;
  }
  /**
   * @param string
   */
  public function setBudget($budget)
  {
    $this->budget = $budget;
  }
  /**
   * @return string
   */
  public function getBudget()
  {
    return $this->budget;
  }
  /**
   * @param string
   */
  public function setClientBillingCode($clientBillingCode)
  {
    $this->clientBillingCode = $clientBillingCode;
  }
  /**
   * @return string
   */
  public function getClientBillingCode()
  {
    return $this->clientBillingCode;
  }
  /**
   * @param string
   */
  public function setClientName($clientName)
  {
    $this->clientName = $clientName;
  }
  /**
   * @return string
   */
  public function getClientName()
  {
    return $this->clientName;
  }
  /**
   * @param string
   */
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return string
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param LastModifiedInfo
   */
  public function setLastModifiedInfo(LastModifiedInfo $lastModifiedInfo)
  {
    $this->lastModifiedInfo = $lastModifiedInfo;
  }
  /**
   * @return LastModifiedInfo
   */
  public function getLastModifiedInfo()
  {
    return $this->lastModifiedInfo;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setOverview($overview)
  {
    $this->overview = $overview;
  }
  /**
   * @return string
   */
  public function getOverview()
  {
    return $this->overview;
  }
  /**
   * @param string
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return string
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  /**
   * @param string
   */
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  /**
   * @return string
   */
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  /**
   * @param string
   */
  public function setTargetClicks($targetClicks)
  {
    $this->targetClicks = $targetClicks;
  }
  /**
   * @return string
   */
  public function getTargetClicks()
  {
    return $this->targetClicks;
  }
  /**
   * @param string
   */
  public function setTargetConversions($targetConversions)
  {
    $this->targetConversions = $targetConversions;
  }
  /**
   * @return string
   */
  public function getTargetConversions()
  {
    return $this->targetConversions;
  }
  /**
   * @param string
   */
  public function setTargetCpaNanos($targetCpaNanos)
  {
    $this->targetCpaNanos = $targetCpaNanos;
  }
  /**
   * @return string
   */
  public function getTargetCpaNanos()
  {
    return $this->targetCpaNanos;
  }
  /**
   * @param string
   */
  public function setTargetCpcNanos($targetCpcNanos)
  {
    $this->targetCpcNanos = $targetCpcNanos;
  }
  /**
   * @return string
   */
  public function getTargetCpcNanos()
  {
    return $this->targetCpcNanos;
  }
  /**
   * @param string
   */
  public function setTargetCpmActiveViewNanos($targetCpmActiveViewNanos)
  {
    $this->targetCpmActiveViewNanos = $targetCpmActiveViewNanos;
  }
  /**
   * @return string
   */
  public function getTargetCpmActiveViewNanos()
  {
    return $this->targetCpmActiveViewNanos;
  }
  /**
   * @param string
   */
  public function setTargetCpmNanos($targetCpmNanos)
  {
    $this->targetCpmNanos = $targetCpmNanos;
  }
  /**
   * @return string
   */
  public function getTargetCpmNanos()
  {
    return $this->targetCpmNanos;
  }
  /**
   * @param string
   */
  public function setTargetImpressions($targetImpressions)
  {
    $this->targetImpressions = $targetImpressions;
  }
  /**
   * @return string
   */
  public function getTargetImpressions()
  {
    return $this->targetImpressions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Project::class, 'Google_Service_Dfareporting_Project');
