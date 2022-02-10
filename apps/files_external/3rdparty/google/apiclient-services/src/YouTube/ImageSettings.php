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

namespace Google\Service\YouTube;

class ImageSettings extends \Google\Model
{
  protected $backgroundImageUrlType = LocalizedProperty::class;
  protected $backgroundImageUrlDataType = '';
  /**
   * @var string
   */
  public $bannerExternalUrl;
  /**
   * @var string
   */
  public $bannerImageUrl;
  /**
   * @var string
   */
  public $bannerMobileExtraHdImageUrl;
  /**
   * @var string
   */
  public $bannerMobileHdImageUrl;
  /**
   * @var string
   */
  public $bannerMobileImageUrl;
  /**
   * @var string
   */
  public $bannerMobileLowImageUrl;
  /**
   * @var string
   */
  public $bannerMobileMediumHdImageUrl;
  /**
   * @var string
   */
  public $bannerTabletExtraHdImageUrl;
  /**
   * @var string
   */
  public $bannerTabletHdImageUrl;
  /**
   * @var string
   */
  public $bannerTabletImageUrl;
  /**
   * @var string
   */
  public $bannerTabletLowImageUrl;
  /**
   * @var string
   */
  public $bannerTvHighImageUrl;
  /**
   * @var string
   */
  public $bannerTvImageUrl;
  /**
   * @var string
   */
  public $bannerTvLowImageUrl;
  /**
   * @var string
   */
  public $bannerTvMediumImageUrl;
  protected $largeBrandedBannerImageImapScriptType = LocalizedProperty::class;
  protected $largeBrandedBannerImageImapScriptDataType = '';
  protected $largeBrandedBannerImageUrlType = LocalizedProperty::class;
  protected $largeBrandedBannerImageUrlDataType = '';
  protected $smallBrandedBannerImageImapScriptType = LocalizedProperty::class;
  protected $smallBrandedBannerImageImapScriptDataType = '';
  protected $smallBrandedBannerImageUrlType = LocalizedProperty::class;
  protected $smallBrandedBannerImageUrlDataType = '';
  /**
   * @var string
   */
  public $trackingImageUrl;
  /**
   * @var string
   */
  public $watchIconImageUrl;

  /**
   * @param LocalizedProperty
   */
  public function setBackgroundImageUrl(LocalizedProperty $backgroundImageUrl)
  {
    $this->backgroundImageUrl = $backgroundImageUrl;
  }
  /**
   * @return LocalizedProperty
   */
  public function getBackgroundImageUrl()
  {
    return $this->backgroundImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerExternalUrl($bannerExternalUrl)
  {
    $this->bannerExternalUrl = $bannerExternalUrl;
  }
  /**
   * @return string
   */
  public function getBannerExternalUrl()
  {
    return $this->bannerExternalUrl;
  }
  /**
   * @param string
   */
  public function setBannerImageUrl($bannerImageUrl)
  {
    $this->bannerImageUrl = $bannerImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerImageUrl()
  {
    return $this->bannerImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerMobileExtraHdImageUrl($bannerMobileExtraHdImageUrl)
  {
    $this->bannerMobileExtraHdImageUrl = $bannerMobileExtraHdImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerMobileExtraHdImageUrl()
  {
    return $this->bannerMobileExtraHdImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerMobileHdImageUrl($bannerMobileHdImageUrl)
  {
    $this->bannerMobileHdImageUrl = $bannerMobileHdImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerMobileHdImageUrl()
  {
    return $this->bannerMobileHdImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerMobileImageUrl($bannerMobileImageUrl)
  {
    $this->bannerMobileImageUrl = $bannerMobileImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerMobileImageUrl()
  {
    return $this->bannerMobileImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerMobileLowImageUrl($bannerMobileLowImageUrl)
  {
    $this->bannerMobileLowImageUrl = $bannerMobileLowImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerMobileLowImageUrl()
  {
    return $this->bannerMobileLowImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerMobileMediumHdImageUrl($bannerMobileMediumHdImageUrl)
  {
    $this->bannerMobileMediumHdImageUrl = $bannerMobileMediumHdImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerMobileMediumHdImageUrl()
  {
    return $this->bannerMobileMediumHdImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerTabletExtraHdImageUrl($bannerTabletExtraHdImageUrl)
  {
    $this->bannerTabletExtraHdImageUrl = $bannerTabletExtraHdImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerTabletExtraHdImageUrl()
  {
    return $this->bannerTabletExtraHdImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerTabletHdImageUrl($bannerTabletHdImageUrl)
  {
    $this->bannerTabletHdImageUrl = $bannerTabletHdImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerTabletHdImageUrl()
  {
    return $this->bannerTabletHdImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerTabletImageUrl($bannerTabletImageUrl)
  {
    $this->bannerTabletImageUrl = $bannerTabletImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerTabletImageUrl()
  {
    return $this->bannerTabletImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerTabletLowImageUrl($bannerTabletLowImageUrl)
  {
    $this->bannerTabletLowImageUrl = $bannerTabletLowImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerTabletLowImageUrl()
  {
    return $this->bannerTabletLowImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerTvHighImageUrl($bannerTvHighImageUrl)
  {
    $this->bannerTvHighImageUrl = $bannerTvHighImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerTvHighImageUrl()
  {
    return $this->bannerTvHighImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerTvImageUrl($bannerTvImageUrl)
  {
    $this->bannerTvImageUrl = $bannerTvImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerTvImageUrl()
  {
    return $this->bannerTvImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerTvLowImageUrl($bannerTvLowImageUrl)
  {
    $this->bannerTvLowImageUrl = $bannerTvLowImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerTvLowImageUrl()
  {
    return $this->bannerTvLowImageUrl;
  }
  /**
   * @param string
   */
  public function setBannerTvMediumImageUrl($bannerTvMediumImageUrl)
  {
    $this->bannerTvMediumImageUrl = $bannerTvMediumImageUrl;
  }
  /**
   * @return string
   */
  public function getBannerTvMediumImageUrl()
  {
    return $this->bannerTvMediumImageUrl;
  }
  /**
   * @param LocalizedProperty
   */
  public function setLargeBrandedBannerImageImapScript(LocalizedProperty $largeBrandedBannerImageImapScript)
  {
    $this->largeBrandedBannerImageImapScript = $largeBrandedBannerImageImapScript;
  }
  /**
   * @return LocalizedProperty
   */
  public function getLargeBrandedBannerImageImapScript()
  {
    return $this->largeBrandedBannerImageImapScript;
  }
  /**
   * @param LocalizedProperty
   */
  public function setLargeBrandedBannerImageUrl(LocalizedProperty $largeBrandedBannerImageUrl)
  {
    $this->largeBrandedBannerImageUrl = $largeBrandedBannerImageUrl;
  }
  /**
   * @return LocalizedProperty
   */
  public function getLargeBrandedBannerImageUrl()
  {
    return $this->largeBrandedBannerImageUrl;
  }
  /**
   * @param LocalizedProperty
   */
  public function setSmallBrandedBannerImageImapScript(LocalizedProperty $smallBrandedBannerImageImapScript)
  {
    $this->smallBrandedBannerImageImapScript = $smallBrandedBannerImageImapScript;
  }
  /**
   * @return LocalizedProperty
   */
  public function getSmallBrandedBannerImageImapScript()
  {
    return $this->smallBrandedBannerImageImapScript;
  }
  /**
   * @param LocalizedProperty
   */
  public function setSmallBrandedBannerImageUrl(LocalizedProperty $smallBrandedBannerImageUrl)
  {
    $this->smallBrandedBannerImageUrl = $smallBrandedBannerImageUrl;
  }
  /**
   * @return LocalizedProperty
   */
  public function getSmallBrandedBannerImageUrl()
  {
    return $this->smallBrandedBannerImageUrl;
  }
  /**
   * @param string
   */
  public function setTrackingImageUrl($trackingImageUrl)
  {
    $this->trackingImageUrl = $trackingImageUrl;
  }
  /**
   * @return string
   */
  public function getTrackingImageUrl()
  {
    return $this->trackingImageUrl;
  }
  /**
   * @param string
   */
  public function setWatchIconImageUrl($watchIconImageUrl)
  {
    $this->watchIconImageUrl = $watchIconImageUrl;
  }
  /**
   * @return string
   */
  public function getWatchIconImageUrl()
  {
    return $this->watchIconImageUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageSettings::class, 'Google_Service_YouTube_ImageSettings');
