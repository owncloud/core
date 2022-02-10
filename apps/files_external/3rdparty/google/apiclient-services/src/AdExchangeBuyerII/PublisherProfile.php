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

namespace Google\Service\AdExchangeBuyerII;

class PublisherProfile extends \Google\Collection
{
  protected $collection_key = 'topHeadlines';
  /**
   * @var string
   */
  public $audienceDescription;
  /**
   * @var string
   */
  public $buyerPitchStatement;
  /**
   * @var string
   */
  public $directDealsContact;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $domains;
  /**
   * @var string
   */
  public $googlePlusUrl;
  /**
   * @var bool
   */
  public $isParent;
  /**
   * @var string
   */
  public $logoUrl;
  /**
   * @var string
   */
  public $mediaKitUrl;
  protected $mobileAppsType = PublisherProfileMobileApplication::class;
  protected $mobileAppsDataType = 'array';
  /**
   * @var string
   */
  public $overview;
  /**
   * @var string
   */
  public $programmaticDealsContact;
  /**
   * @var string
   */
  public $publisherProfileId;
  /**
   * @var string
   */
  public $rateCardInfoUrl;
  /**
   * @var string
   */
  public $samplePageUrl;
  protected $sellerType = Seller::class;
  protected $sellerDataType = '';
  /**
   * @var string[]
   */
  public $topHeadlines;

  /**
   * @param string
   */
  public function setAudienceDescription($audienceDescription)
  {
    $this->audienceDescription = $audienceDescription;
  }
  /**
   * @return string
   */
  public function getAudienceDescription()
  {
    return $this->audienceDescription;
  }
  /**
   * @param string
   */
  public function setBuyerPitchStatement($buyerPitchStatement)
  {
    $this->buyerPitchStatement = $buyerPitchStatement;
  }
  /**
   * @return string
   */
  public function getBuyerPitchStatement()
  {
    return $this->buyerPitchStatement;
  }
  /**
   * @param string
   */
  public function setDirectDealsContact($directDealsContact)
  {
    $this->directDealsContact = $directDealsContact;
  }
  /**
   * @return string
   */
  public function getDirectDealsContact()
  {
    return $this->directDealsContact;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string[]
   */
  public function setDomains($domains)
  {
    $this->domains = $domains;
  }
  /**
   * @return string[]
   */
  public function getDomains()
  {
    return $this->domains;
  }
  /**
   * @param string
   */
  public function setGooglePlusUrl($googlePlusUrl)
  {
    $this->googlePlusUrl = $googlePlusUrl;
  }
  /**
   * @return string
   */
  public function getGooglePlusUrl()
  {
    return $this->googlePlusUrl;
  }
  /**
   * @param bool
   */
  public function setIsParent($isParent)
  {
    $this->isParent = $isParent;
  }
  /**
   * @return bool
   */
  public function getIsParent()
  {
    return $this->isParent;
  }
  /**
   * @param string
   */
  public function setLogoUrl($logoUrl)
  {
    $this->logoUrl = $logoUrl;
  }
  /**
   * @return string
   */
  public function getLogoUrl()
  {
    return $this->logoUrl;
  }
  /**
   * @param string
   */
  public function setMediaKitUrl($mediaKitUrl)
  {
    $this->mediaKitUrl = $mediaKitUrl;
  }
  /**
   * @return string
   */
  public function getMediaKitUrl()
  {
    return $this->mediaKitUrl;
  }
  /**
   * @param PublisherProfileMobileApplication[]
   */
  public function setMobileApps($mobileApps)
  {
    $this->mobileApps = $mobileApps;
  }
  /**
   * @return PublisherProfileMobileApplication[]
   */
  public function getMobileApps()
  {
    return $this->mobileApps;
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
  public function setProgrammaticDealsContact($programmaticDealsContact)
  {
    $this->programmaticDealsContact = $programmaticDealsContact;
  }
  /**
   * @return string
   */
  public function getProgrammaticDealsContact()
  {
    return $this->programmaticDealsContact;
  }
  /**
   * @param string
   */
  public function setPublisherProfileId($publisherProfileId)
  {
    $this->publisherProfileId = $publisherProfileId;
  }
  /**
   * @return string
   */
  public function getPublisherProfileId()
  {
    return $this->publisherProfileId;
  }
  /**
   * @param string
   */
  public function setRateCardInfoUrl($rateCardInfoUrl)
  {
    $this->rateCardInfoUrl = $rateCardInfoUrl;
  }
  /**
   * @return string
   */
  public function getRateCardInfoUrl()
  {
    return $this->rateCardInfoUrl;
  }
  /**
   * @param string
   */
  public function setSamplePageUrl($samplePageUrl)
  {
    $this->samplePageUrl = $samplePageUrl;
  }
  /**
   * @return string
   */
  public function getSamplePageUrl()
  {
    return $this->samplePageUrl;
  }
  /**
   * @param Seller
   */
  public function setSeller(Seller $seller)
  {
    $this->seller = $seller;
  }
  /**
   * @return Seller
   */
  public function getSeller()
  {
    return $this->seller;
  }
  /**
   * @param string[]
   */
  public function setTopHeadlines($topHeadlines)
  {
    $this->topHeadlines = $topHeadlines;
  }
  /**
   * @return string[]
   */
  public function getTopHeadlines()
  {
    return $this->topHeadlines;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PublisherProfile::class, 'Google_Service_AdExchangeBuyerII_PublisherProfile');
