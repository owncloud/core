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

class GetIosReopenAttributionResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $deepLink;
  /**
   * @var string
   */
  public $invitationId;
  /**
   * @var string
   */
  public $iosMinAppVersion;
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
   * @param string
   */
  public function setIosMinAppVersion($iosMinAppVersion)
  {
    $this->iosMinAppVersion = $iosMinAppVersion;
  }
  /**
   * @return string
   */
  public function getIosMinAppVersion()
  {
    return $this->iosMinAppVersion;
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
class_alias(GetIosReopenAttributionResponse::class, 'Google_Service_FirebaseDynamicLinks_GetIosReopenAttributionResponse');
