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

namespace Google\Service\AuthorizedBuyersMarketplace;

class PublisherProfile extends \Google\Collection
{
  protected $collection_key = 'topHeadlines';
  public $audienceDescription;
  public $directDealsContact;
  public $displayName;
  public $domains;
  public $isParent;
  public $logoUrl;
  public $mediaKitUrl;
  protected $mobileAppsType = PublisherProfileMobileApplication::class;
  protected $mobileAppsDataType = 'array';
  public $name;
  public $overview;
  public $pitchStatement;
  public $programmaticDealsContact;
  public $publisherCode;
  public $samplePageUrl;
  public $topHeadlines;

  public function setAudienceDescription($audienceDescription)
  {
    $this->audienceDescription = $audienceDescription;
  }
  public function getAudienceDescription()
  {
    return $this->audienceDescription;
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
  public function setPitchStatement($pitchStatement)
  {
    $this->pitchStatement = $pitchStatement;
  }
  public function getPitchStatement()
  {
    return $this->pitchStatement;
  }
  public function setProgrammaticDealsContact($programmaticDealsContact)
  {
    $this->programmaticDealsContact = $programmaticDealsContact;
  }
  public function getProgrammaticDealsContact()
  {
    return $this->programmaticDealsContact;
  }
  public function setPublisherCode($publisherCode)
  {
    $this->publisherCode = $publisherCode;
  }
  public function getPublisherCode()
  {
    return $this->publisherCode;
  }
  public function setSamplePageUrl($samplePageUrl)
  {
    $this->samplePageUrl = $samplePageUrl;
  }
  public function getSamplePageUrl()
  {
    return $this->samplePageUrl;
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
class_alias(PublisherProfile::class, 'Google_Service_AuthorizedBuyersMarketplace_PublisherProfile');
