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

class Google_Service_AdExchangeBuyerII_PublisherProfile extends Google_Collection
{
  protected $collection_key = 'topHeadlines';
  public $audienceDescription;
  public $buyerPitchStatement;
  public $directDealsContact;
  public $displayName;
  public $domains;
  public $googlePlusUrl;
  public $isParent;
  public $logoUrl;
  public $mediaKitUrl;
  public $overview;
  public $programmaticDealsContact;
  public $publisherProfileId;
  public $rateCardInfoUrl;
  public $samplePageUrl;
  protected $sellerType = 'Google_Service_AdExchangeBuyerII_Seller';
  protected $sellerDataType = '';
  public $topHeadlines;

  public function setAudienceDescription($audienceDescription)
  {
    $this->audienceDescription = $audienceDescription;
  }
  public function getAudienceDescription()
  {
    return $this->audienceDescription;
  }
  public function setBuyerPitchStatement($buyerPitchStatement)
  {
    $this->buyerPitchStatement = $buyerPitchStatement;
  }
  public function getBuyerPitchStatement()
  {
    return $this->buyerPitchStatement;
  }
  public function setDirectDealsContact($directDealsContact)
  {
    $this->directDealsContact = $directDealsContact;
  }
  public function getDirectDealsContact()
  {
    return $this->directDealsContact;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDomains($domains)
  {
    $this->domains = $domains;
  }
  public function getDomains()
  {
    return $this->domains;
  }
  public function setGooglePlusUrl($googlePlusUrl)
  {
    $this->googlePlusUrl = $googlePlusUrl;
  }
  public function getGooglePlusUrl()
  {
    return $this->googlePlusUrl;
  }
  public function setIsParent($isParent)
  {
    $this->isParent = $isParent;
  }
  public function getIsParent()
  {
    return $this->isParent;
  }
  public function setLogoUrl($logoUrl)
  {
    $this->logoUrl = $logoUrl;
  }
  public function getLogoUrl()
  {
    return $this->logoUrl;
  }
  public function setMediaKitUrl($mediaKitUrl)
  {
    $this->mediaKitUrl = $mediaKitUrl;
  }
  public function getMediaKitUrl()
  {
    return $this->mediaKitUrl;
  }
  public function setOverview($overview)
  {
    $this->overview = $overview;
  }
  public function getOverview()
  {
    return $this->overview;
  }
  public function setProgrammaticDealsContact($programmaticDealsContact)
  {
    $this->programmaticDealsContact = $programmaticDealsContact;
  }
  public function getProgrammaticDealsContact()
  {
    return $this->programmaticDealsContact;
  }
  public function setPublisherProfileId($publisherProfileId)
  {
    $this->publisherProfileId = $publisherProfileId;
  }
  public function getPublisherProfileId()
  {
    return $this->publisherProfileId;
  }
  public function setRateCardInfoUrl($rateCardInfoUrl)
  {
    $this->rateCardInfoUrl = $rateCardInfoUrl;
  }
  public function getRateCardInfoUrl()
  {
    return $this->rateCardInfoUrl;
  }
  public function setSamplePageUrl($samplePageUrl)
  {
    $this->samplePageUrl = $samplePageUrl;
  }
  public function getSamplePageUrl()
  {
    return $this->samplePageUrl;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_Seller
   */
  public function setSeller(Google_Service_AdExchangeBuyerII_Seller $seller)
  {
    $this->seller = $seller;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_Seller
   */
  public function getSeller()
  {
    return $this->seller;
  }
  public function setTopHeadlines($topHeadlines)
  {
    $this->topHeadlines = $topHeadlines;
  }
  public function getTopHeadlines()
  {
    return $this->topHeadlines;
  }
}
