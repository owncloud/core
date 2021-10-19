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

namespace Google\Service\Dfareporting;

class SiteVideoSettings extends \Google\Model
{
  protected $companionSettingsType = SiteCompanionSetting::class;
  protected $companionSettingsDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var bool
   */
  public $obaEnabled;
  protected $obaSettingsType = ObaIcon::class;
  protected $obaSettingsDataType = '';
  /**
   * @var string
   */
  public $orientation;
  /**
   * @var string
   */
  public $publisherSpecificationId;
  protected $skippableSettingsType = SiteSkippableSetting::class;
  protected $skippableSettingsDataType = '';
  protected $transcodeSettingsType = SiteTranscodeSetting::class;
  protected $transcodeSettingsDataType = '';

  /**
   * @param SiteCompanionSetting
   */
  public function setCompanionSettings(SiteCompanionSetting $companionSettings)
  {
    $this->companionSettings = $companionSettings;
  }
  /**
   * @return SiteCompanionSetting
   */
  public function getCompanionSettings()
  {
    return $this->companionSettings;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param bool
   */
  public function setObaEnabled($obaEnabled)
  {
    $this->obaEnabled = $obaEnabled;
  }
  /**
   * @return bool
   */
  public function getObaEnabled()
  {
    return $this->obaEnabled;
  }
  /**
   * @param ObaIcon
   */
  public function setObaSettings(ObaIcon $obaSettings)
  {
    $this->obaSettings = $obaSettings;
  }
  /**
   * @return ObaIcon
   */
  public function getObaSettings()
  {
    return $this->obaSettings;
  }
  /**
   * @param string
   */
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  /**
   * @return string
   */
  public function getOrientation()
  {
    return $this->orientation;
  }
  /**
   * @param string
   */
  public function setPublisherSpecificationId($publisherSpecificationId)
  {
    $this->publisherSpecificationId = $publisherSpecificationId;
  }
  /**
   * @return string
   */
  public function getPublisherSpecificationId()
  {
    return $this->publisherSpecificationId;
  }
  /**
   * @param SiteSkippableSetting
   */
  public function setSkippableSettings(SiteSkippableSetting $skippableSettings)
  {
    $this->skippableSettings = $skippableSettings;
  }
  /**
   * @return SiteSkippableSetting
   */
  public function getSkippableSettings()
  {
    return $this->skippableSettings;
  }
  /**
   * @param SiteTranscodeSetting
   */
  public function setTranscodeSettings(SiteTranscodeSetting $transcodeSettings)
  {
    $this->transcodeSettings = $transcodeSettings;
  }
  /**
   * @return SiteTranscodeSetting
   */
  public function getTranscodeSettings()
  {
    return $this->transcodeSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SiteVideoSettings::class, 'Google_Service_Dfareporting_SiteVideoSettings');
