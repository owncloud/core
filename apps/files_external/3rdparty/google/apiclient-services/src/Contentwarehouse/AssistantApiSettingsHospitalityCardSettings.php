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

namespace Google\Service\Contentwarehouse;

class AssistantApiSettingsHospitalityCardSettings extends \Google\Collection
{
  protected $collection_key = 'youtubeCardConfig';
  protected $cardConfigType = AssistantApiSettingsHospitalityCardSettingsCardConfig::class;
  protected $cardConfigDataType = 'array';
  /**
   * @var bool
   */
  public $showMediaTapGestureTutorial;
  /**
   * @var bool
   */
  public $showPhotoSwipeGestureTutorial;
  protected $youtubeCardConfigType = AssistantApiSettingsHospitalityCardSettingsYouTubeCardConfig::class;
  protected $youtubeCardConfigDataType = 'array';

  /**
   * @param AssistantApiSettingsHospitalityCardSettingsCardConfig[]
   */
  public function setCardConfig($cardConfig)
  {
    $this->cardConfig = $cardConfig;
  }
  /**
   * @return AssistantApiSettingsHospitalityCardSettingsCardConfig[]
   */
  public function getCardConfig()
  {
    return $this->cardConfig;
  }
  /**
   * @param bool
   */
  public function setShowMediaTapGestureTutorial($showMediaTapGestureTutorial)
  {
    $this->showMediaTapGestureTutorial = $showMediaTapGestureTutorial;
  }
  /**
   * @return bool
   */
  public function getShowMediaTapGestureTutorial()
  {
    return $this->showMediaTapGestureTutorial;
  }
  /**
   * @param bool
   */
  public function setShowPhotoSwipeGestureTutorial($showPhotoSwipeGestureTutorial)
  {
    $this->showPhotoSwipeGestureTutorial = $showPhotoSwipeGestureTutorial;
  }
  /**
   * @return bool
   */
  public function getShowPhotoSwipeGestureTutorial()
  {
    return $this->showPhotoSwipeGestureTutorial;
  }
  /**
   * @param AssistantApiSettingsHospitalityCardSettingsYouTubeCardConfig[]
   */
  public function setYoutubeCardConfig($youtubeCardConfig)
  {
    $this->youtubeCardConfig = $youtubeCardConfig;
  }
  /**
   * @return AssistantApiSettingsHospitalityCardSettingsYouTubeCardConfig[]
   */
  public function getYoutubeCardConfig()
  {
    return $this->youtubeCardConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSettingsHospitalityCardSettings::class, 'Google_Service_Contentwarehouse_AssistantApiSettingsHospitalityCardSettings');
