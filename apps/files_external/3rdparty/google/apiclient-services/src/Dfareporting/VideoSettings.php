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

class VideoSettings extends \Google\Model
{
  protected $companionSettingsType = CompanionSetting::class;
  protected $companionSettingsDataType = '';
  /**
   * @var int
   */
  public $durationSeconds;
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
  protected $skippableSettingsType = SkippableSetting::class;
  protected $skippableSettingsDataType = '';
  protected $transcodeSettingsType = TranscodeSetting::class;
  protected $transcodeSettingsDataType = '';

  /**
   * @param CompanionSetting
   */
  public function setCompanionSettings(CompanionSetting $companionSettings)
  {
    $this->companionSettings = $companionSettings;
  }
  /**
   * @return CompanionSetting
   */
  public function getCompanionSettings()
  {
    return $this->companionSettings;
  }
  /**
   * @param int
   */
  public function setDurationSeconds($durationSeconds)
  {
    $this->durationSeconds = $durationSeconds;
  }
  /**
   * @return int
   */
  public function getDurationSeconds()
  {
    return $this->durationSeconds;
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
   * @param SkippableSetting
   */
  public function setSkippableSettings(SkippableSetting $skippableSettings)
  {
    $this->skippableSettings = $skippableSettings;
  }
  /**
   * @return SkippableSetting
   */
  public function getSkippableSettings()
  {
    return $this->skippableSettings;
  }
  /**
   * @param TranscodeSetting
   */
  public function setTranscodeSettings(TranscodeSetting $transcodeSettings)
  {
    $this->transcodeSettings = $transcodeSettings;
  }
  /**
   * @return TranscodeSetting
   */
  public function getTranscodeSettings()
  {
    return $this->transcodeSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoSettings::class, 'Google_Service_Dfareporting_VideoSettings');
