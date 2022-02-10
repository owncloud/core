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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal extends \Google\Model
{
  /**
   * @var bool
   */
  public $adsPersonalizationEnabled;
  /**
   * @var string
   */
  public $advertiserDisplayName;
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var bool
   */
  public $campaignDataSharingEnabled;
  /**
   * @var bool
   */
  public $costDataSharingEnabled;
  protected $linkProposalStatusDetailsType = GoogleAnalyticsAdminV1alphaLinkProposalStatusDetails::class;
  protected $linkProposalStatusDetailsDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $validationEmail;

  /**
   * @param bool
   */
  public function setAdsPersonalizationEnabled($adsPersonalizationEnabled)
  {
    $this->adsPersonalizationEnabled = $adsPersonalizationEnabled;
  }
  /**
   * @return bool
   */
  public function getAdsPersonalizationEnabled()
  {
    return $this->adsPersonalizationEnabled;
  }
  /**
   * @param string
   */
  public function setAdvertiserDisplayName($advertiserDisplayName)
  {
    $this->advertiserDisplayName = $advertiserDisplayName;
  }
  /**
   * @return string
   */
  public function getAdvertiserDisplayName()
  {
    return $this->advertiserDisplayName;
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
   * @param bool
   */
  public function setCampaignDataSharingEnabled($campaignDataSharingEnabled)
  {
    $this->campaignDataSharingEnabled = $campaignDataSharingEnabled;
  }
  /**
   * @return bool
   */
  public function getCampaignDataSharingEnabled()
  {
    return $this->campaignDataSharingEnabled;
  }
  /**
   * @param bool
   */
  public function setCostDataSharingEnabled($costDataSharingEnabled)
  {
    $this->costDataSharingEnabled = $costDataSharingEnabled;
  }
  /**
   * @return bool
   */
  public function getCostDataSharingEnabled()
  {
    return $this->costDataSharingEnabled;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaLinkProposalStatusDetails
   */
  public function setLinkProposalStatusDetails(GoogleAnalyticsAdminV1alphaLinkProposalStatusDetails $linkProposalStatusDetails)
  {
    $this->linkProposalStatusDetails = $linkProposalStatusDetails;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaLinkProposalStatusDetails
   */
  public function getLinkProposalStatusDetails()
  {
    return $this->linkProposalStatusDetails;
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
  public function setValidationEmail($validationEmail)
  {
    $this->validationEmail = $validationEmail;
  }
  /**
   * @return string
   */
  public function getValidationEmail()
  {
    return $this->validationEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLinkProposal');
