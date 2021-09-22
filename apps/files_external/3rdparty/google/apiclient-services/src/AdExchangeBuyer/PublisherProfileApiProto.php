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

namespace Google\Service\AdExchangeBuyer;

class PublisherProfileApiProto extends \Google\Collection
{
  protected $collection_key = 'topHeadlines';
  public $audience;
  public $buyerPitchStatement;
  public $directContact;
  public $exchange;
  public $forecastInventory;
  public $googlePlusLink;
  public $isParent;
  public $isPublished;
  public $kind;
  public $logoUrl;
  public $mediaKitLink;
  public $name;
  public $overview;
  public $profileId;
  public $programmaticContact;
  public $publisherAppIds;
  protected $publisherAppsType = MobileApplication::class;
  protected $publisherAppsDataType = 'array';
  public $publisherDomains;
  public $publisherProfileId;
  protected $publisherProvidedForecastType = PublisherProvidedForecast::class;
  protected $publisherProvidedForecastDataType = '';
  public $rateCardInfoLink;
  public $samplePageLink;
  protected $sellerType = Seller::class;
  protected $sellerDataType = '';
  public $state;
  public $topHeadlines;

  public function setAudience($audience)
  {
    $this->audience = $audience;
  }
  public function getAudience()
  {
    return $this->audience;
  }
  public function setBuyerPitchStatement($buyerPitchStatement)
  {
    $this->buyerPitchStatement = $buyerPitchStatement;
  }
  public function getBuyerPitchStatement()
  {
    return $this->buyerPitchStatement;
  }
  public function setDirectContact($directContact)
  {
    $this->directContact = $directContact;
  }
  public function getDirectContact()
  {
    return $this->directContact;
  }
  public function setExchange($exchange)
  {
    $this->exchange = $exchange;
  }
  public function getExchange()
  {
    return $this->exchange;
  }
  public function setForecastInventory($forecastInventory)
  {
    $this->forecastInventory = $forecastInventory;
  }
  public function getForecastInventory()
  {
    return $this->forecastInventory;
  }
  public function setGooglePlusLink($googlePlusLink)
  {
    $this->googlePlusLink = $googlePlusLink;
  }
  public function getGooglePlusLink()
  {
    return $this->googlePlusLink;
  }
  public function setIsParent($isParent)
  {
    $this->isParent = $isParent;
  }
  public function getIsParent()
  {
    return $this->isParent;
  }
  public function setIsPublished($isPublished)
  {
    $this->isPublished = $isPublished;
  }
  public function getIsPublished()
  {
    return $this->isPublished;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLogoUrl($logoUrl)
  {
    $this->logoUrl = $logoUrl;
  }
  public function getLogoUrl()
  {
    return $this->logoUrl;
  }
  public function setMediaKitLink($mediaKitLink)
  {
    $this->mediaKitLink = $mediaKitLink;
  }
  public function getMediaKitLink()
  {
    return $this->mediaKitLink;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOverview($overview)
  {
    $this->overview = $overview;
  }
  public function getOverview()
  {
    return $this->overview;
  }
  public function setProfileId($profileId)
  {
    $this->profileId = $profileId;
  }
  public function getProfileId()
  {
    return $this->profileId;
  }
  public function setProgrammaticContact($programmaticContact)
  {
    $this->programmaticContact = $programmaticContact;
  }
  public function getProgrammaticContact()
  {
    return $this->programmaticContact;
  }
  public function setPublisherAppIds($publisherAppIds)
  {
    $this->publisherAppIds = $publisherAppIds;
  }
  public function getPublisherAppIds()
  {
    return $this->publisherAppIds;
  }
  /**
   * @param MobileApplication[]
   */
  public function setPublisherApps($publisherApps)
  {
    $this->publisherApps = $publisherApps;
  }
  /**
   * @return MobileApplication[]
   */
  public function getPublisherApps()
  {
    return $this->publisherApps;
  }
  public function setPublisherDomains($publisherDomains)
  {
    $this->publisherDomains = $publisherDomains;
  }
  public function getPublisherDomains()
  {
    return $this->publisherDomains;
  }
  public function setPublisherProfileId($publisherProfileId)
  {
    $this->publisherProfileId = $publisherProfileId;
  }
  public function getPublisherProfileId()
  {
    return $this->publisherProfileId;
  }
  /**
   * @param PublisherProvidedForecast
   */
  public function setPublisherProvidedForecast(PublisherProvidedForecast $publisherProvidedForecast)
  {
    $this->publisherProvidedForecast = $publisherProvidedForecast;
  }
  /**
   * @return PublisherProvidedForecast
   */
  public function getPublisherProvidedForecast()
  {
    return $this->publisherProvidedForecast;
  }
  public function setRateCardInfoLink($rateCardInfoLink)
  {
    $this->rateCardInfoLink = $rateCardInfoLink;
  }
  public function getRateCardInfoLink()
  {
    return $this->rateCardInfoLink;
  }
  public function setSamplePageLink($samplePageLink)
  {
    $this->samplePageLink = $samplePageLink;
  }
  public function getSamplePageLink()
  {
    return $this->samplePageLink;
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
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PublisherProfileApiProto::class, 'Google_Service_AdExchangeBuyer_PublisherProfileApiProto');
