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

namespace Google\Service\Doubleclicksearch;

class ReportRequestReportScope extends \Google\Model
{
  /**
   * @var string
   */
  public $adGroupId;
  /**
   * @var string
   */
  public $adId;
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string
   */
  public $agencyId;
  /**
   * @var string
   */
  public $campaignId;
  /**
   * @var string
   */
  public $engineAccountId;
  /**
   * @var string
   */
  public $keywordId;

  /**
   * @param string
   */
  public function setAdGroupId($adGroupId)
  {
    $this->adGroupId = $adGroupId;
  }
  /**
   * @return string
   */
  public function getAdGroupId()
  {
    return $this->adGroupId;
  }
  /**
   * @param string
   */
  public function setAdId($adId)
  {
    $this->adId = $adId;
  }
  /**
   * @return string
   */
  public function getAdId()
  {
    return $this->adId;
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
  public function setAgencyId($agencyId)
  {
    $this->agencyId = $agencyId;
  }
  /**
   * @return string
   */
  public function getAgencyId()
  {
    return $this->agencyId;
  }
  /**
   * @param string
   */
  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
  /**
   * @return string
   */
  public function getCampaignId()
  {
    return $this->campaignId;
  }
  /**
   * @param string
   */
  public function setEngineAccountId($engineAccountId)
  {
    $this->engineAccountId = $engineAccountId;
  }
  /**
   * @return string
   */
  public function getEngineAccountId()
  {
    return $this->engineAccountId;
  }
  /**
   * @param string
   */
  public function setKeywordId($keywordId)
  {
    $this->keywordId = $keywordId;
  }
  /**
   * @return string
   */
  public function getKeywordId()
  {
    return $this->keywordId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportRequestReportScope::class, 'Google_Service_Doubleclicksearch_ReportRequestReportScope');
