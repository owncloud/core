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

class IosInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $iosAppStoreId;
  /**
   * @var string
   */
  public $iosBundleId;
  /**
   * @var string
   */
  public $iosCustomScheme;
  /**
   * @var string
   */
  public $iosFallbackLink;
  /**
   * @var string
   */
  public $iosIpadBundleId;
  /**
   * @var string
   */
  public $iosIpadFallbackLink;
  /**
   * @var string
   */
  public $iosMinimumVersion;

  /**
   * @param string
   */
  public function setIosAppStoreId($iosAppStoreId)
  {
    $this->iosAppStoreId = $iosAppStoreId;
  }
  /**
   * @return string
   */
  public function getIosAppStoreId()
  {
    return $this->iosAppStoreId;
  }
  /**
   * @param string
   */
  public function setIosBundleId($iosBundleId)
  {
    $this->iosBundleId = $iosBundleId;
  }
  /**
   * @return string
   */
  public function getIosBundleId()
  {
    return $this->iosBundleId;
  }
  /**
   * @param string
   */
  public function setIosCustomScheme($iosCustomScheme)
  {
    $this->iosCustomScheme = $iosCustomScheme;
  }
  /**
   * @return string
   */
  public function getIosCustomScheme()
  {
    return $this->iosCustomScheme;
  }
  /**
   * @param string
   */
  public function setIosFallbackLink($iosFallbackLink)
  {
    $this->iosFallbackLink = $iosFallbackLink;
  }
  /**
   * @return string
   */
  public function getIosFallbackLink()
  {
    return $this->iosFallbackLink;
  }
  /**
   * @param string
   */
  public function setIosIpadBundleId($iosIpadBundleId)
  {
    $this->iosIpadBundleId = $iosIpadBundleId;
  }
  /**
   * @return string
   */
  public function getIosIpadBundleId()
  {
    return $this->iosIpadBundleId;
  }
  /**
   * @param string
   */
  public function setIosIpadFallbackLink($iosIpadFallbackLink)
  {
    $this->iosIpadFallbackLink = $iosIpadFallbackLink;
  }
  /**
   * @return string
   */
  public function getIosIpadFallbackLink()
  {
    return $this->iosIpadFallbackLink;
  }
  /**
   * @param string
   */
  public function setIosMinimumVersion($iosMinimumVersion)
  {
    $this->iosMinimumVersion = $iosMinimumVersion;
  }
  /**
   * @return string
   */
  public function getIosMinimumVersion()
  {
    return $this->iosMinimumVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IosInfo::class, 'Google_Service_FirebaseDynamicLinks_IosInfo');
