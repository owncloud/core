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

namespace Google\Service\FirebaseDynamicLinks;

class GetIosPostInstallAttributionResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $appMinimumVersion;
  /**
   * @var string
   */
  public $attributionConfidence;
  /**
   * @var string
   */
  public $deepLink;
  /**
   * @var string
   */
  public $externalBrowserDestinationLink;
  /**
   * @var string
   */
  public $fallbackLink;
  /**
   * @var string
   */
  public $invitationId;
  /**
   * @var bool
   */
  public $isStrongMatchExecutable;
  /**
   * @var string
   */
  public $matchMessage;
  /**
   * @var string
   */
  public $requestIpVersion;
  /**
   * @var string
   */
  public $requestedLink;
  /**
   * @var string
   */
  public $resolvedLink;
  /**
   * @var string
   */
  public $utmCampaign;
  /**
   * @var string
   */
  public $utmContent;
  /**
   * @var string
   */
  public $utmMedium;
  /**
   * @var string
   */
  public $utmSource;
  /**
   * @var string
   */
  public $utmTerm;

  /**
   * @param string
   */
  public function setAppMinimumVersion($appMinimumVersion)
  {
    $this->appMinimumVersion = $appMinimumVersion;
  }
  /**
   * @return string
   */
  public function getAppMinimumVersion()
  {
    return $this->appMinimumVersion;
  }
  /**
   * @param string
   */
  public function setAttributionConfidence($attributionConfidence)
  {
    $this->attributionConfidence = $attributionConfidence;
  }
  /**
   * @return string
   */
  public function getAttributionConfidence()
  {
    return $this->attributionConfidence;
  }
  /**
   * @param string
   */
  public function setDeepLink($deepLink)
  {
    $this->deepLink = $deepLink;
  }
  /**
   * @return string
   */
  public function getDeepLink()
  {
    return $this->deepLink;
  }
  /**
   * @param string
   */
  public function setExternalBrowserDestinationLink($externalBrowserDestinationLink)
  {
    $this->externalBrowserDestinationLink = $externalBrowserDestinationLink;
  }
  /**
   * @return string
   */
  public function getExternalBrowserDestinationLink()
  {
    return $this->externalBrowserDestinationLink;
  }
  /**
   * @param string
   */
  public function setFallbackLink($fallbackLink)
  {
    $this->fallbackLink = $fallbackLink;
  }
  /**
   * @return string
   */
  public function getFallbackLink()
  {
    return $this->fallbackLink;
  }
  /**
   * @param string
   */
  public function setInvitationId($invitationId)
  {
    $this->invitationId = $invitationId;
  }
  /**
   * @return string
   */
  public function getInvitationId()
  {
    return $this->invitationId;
  }
  /**
   * @param bool
   */
  public function setIsStrongMatchExecutable($isStrongMatchExecutable)
  {
    $this->isStrongMatchExecutable = $isStrongMatchExecutable;
  }
  /**
   * @return bool
   */
  public function getIsStrongMatchExecutable()
  {
    return $this->isStrongMatchExecutable;
  }
  /**
   * @param string
   */
  public function setMatchMessage($matchMessage)
  {
    $this->matchMessage = $matchMessage;
  }
  /**
   * @return string
   */
  public function getMatchMessage()
  {
    return $this->matchMessage;
  }
  /**
   * @param string
   */
  public function setRequestIpVersion($requestIpVersion)
  {
    $this->requestIpVersion = $requestIpVersion;
  }
  /**
   * @return string
   */
  public function getRequestIpVersion()
  {
    return $this->requestIpVersion;
  }
  /**
   * @param string
   */
  public function setRequestedLink($requestedLink)
  {
    $this->requestedLink = $requestedLink;
  }
  /**
   * @return string
   */
  public function getRequestedLink()
  {
    return $this->requestedLink;
  }
  /**
   * @param string
   */
  public function setResolvedLink($resolvedLink)
  {
    $this->resolvedLink = $resolvedLink;
  }
  /**
   * @return string
   */
  public function getResolvedLink()
  {
    return $this->resolvedLink;
  }
  /**
   * @param string
   */
  public function setUtmCampaign($utmCampaign)
  {
    $this->utmCampaign = $utmCampaign;
  }
  /**
   * @return string
   */
  public function getUtmCampaign()
  {
    return $this->utmCampaign;
  }
  /**
   * @param string
   */
  public function setUtmContent($utmContent)
  {
    $this->utmContent = $utmContent;
  }
  /**
   * @return string
   */
  public function getUtmContent()
  {
    return $this->utmContent;
  }
  /**
   * @param string
   */
  public function setUtmMedium($utmMedium)
  {
    $this->utmMedium = $utmMedium;
  }
  /**
   * @return string
   */
  public function getUtmMedium()
  {
    return $this->utmMedium;
  }
  /**
   * @param string
   */
  public function setUtmSource($utmSource)
  {
    $this->utmSource = $utmSource;
  }
  /**
   * @return string
   */
  public function getUtmSource()
  {
    return $this->utmSource;
  }
  /**
   * @param string
   */
  public function setUtmTerm($utmTerm)
  {
    $this->utmTerm = $utmTerm;
  }
  /**
   * @return string
   */
  public function getUtmTerm()
  {
    return $this->utmTerm;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GetIosPostInstallAttributionResponse::class, 'Google_Service_FirebaseDynamicLinks_GetIosPostInstallAttributionResponse');
