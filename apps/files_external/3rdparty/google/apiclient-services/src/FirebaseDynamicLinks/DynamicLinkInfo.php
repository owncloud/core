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

class DynamicLinkInfo extends \Google\Model
{
  protected $analyticsInfoType = AnalyticsInfo::class;
  protected $analyticsInfoDataType = '';
  protected $androidInfoType = AndroidInfo::class;
  protected $androidInfoDataType = '';
  protected $desktopInfoType = DesktopInfo::class;
  protected $desktopInfoDataType = '';
  public $domainUriPrefix;
  public $dynamicLinkDomain;
  protected $iosInfoType = IosInfo::class;
  protected $iosInfoDataType = '';
  public $link;
  protected $navigationInfoType = NavigationInfo::class;
  protected $navigationInfoDataType = '';
  protected $socialMetaTagInfoType = SocialMetaTagInfo::class;
  protected $socialMetaTagInfoDataType = '';

  /**
   * @param AnalyticsInfo
   */
  public function setAnalyticsInfo(AnalyticsInfo $analyticsInfo)
  {
    $this->analyticsInfo = $analyticsInfo;
  }
  /**
   * @return AnalyticsInfo
   */
  public function getAnalyticsInfo()
  {
    return $this->analyticsInfo;
  }
  /**
   * @param AndroidInfo
   */
  public function setAndroidInfo(AndroidInfo $androidInfo)
  {
    $this->androidInfo = $androidInfo;
  }
  /**
   * @return AndroidInfo
   */
  public function getAndroidInfo()
  {
    return $this->androidInfo;
  }
  /**
   * @param DesktopInfo
   */
  public function setDesktopInfo(DesktopInfo $desktopInfo)
  {
    $this->desktopInfo = $desktopInfo;
  }
  /**
   * @return DesktopInfo
   */
  public function getDesktopInfo()
  {
    return $this->desktopInfo;
  }
  public function setDomainUriPrefix($domainUriPrefix)
  {
    $this->domainUriPrefix = $domainUriPrefix;
  }
  public function getDomainUriPrefix()
  {
    return $this->domainUriPrefix;
  }
  public function setDynamicLinkDomain($dynamicLinkDomain)
  {
    $this->dynamicLinkDomain = $dynamicLinkDomain;
  }
  public function getDynamicLinkDomain()
  {
    return $this->dynamicLinkDomain;
  }
  /**
   * @param IosInfo
   */
  public function setIosInfo(IosInfo $iosInfo)
  {
    $this->iosInfo = $iosInfo;
  }
  /**
   * @return IosInfo
   */
  public function getIosInfo()
  {
    return $this->iosInfo;
  }
  public function setLink($link)
  {
    $this->link = $link;
  }
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param NavigationInfo
   */
  public function setNavigationInfo(NavigationInfo $navigationInfo)
  {
    $this->navigationInfo = $navigationInfo;
  }
  /**
   * @return NavigationInfo
   */
  public function getNavigationInfo()
  {
    return $this->navigationInfo;
  }
  /**
   * @param SocialMetaTagInfo
   */
  public function setSocialMetaTagInfo(SocialMetaTagInfo $socialMetaTagInfo)
  {
    $this->socialMetaTagInfo = $socialMetaTagInfo;
  }
  /**
   * @return SocialMetaTagInfo
   */
  public function getSocialMetaTagInfo()
  {
    return $this->socialMetaTagInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DynamicLinkInfo::class, 'Google_Service_FirebaseDynamicLinks_DynamicLinkInfo');
