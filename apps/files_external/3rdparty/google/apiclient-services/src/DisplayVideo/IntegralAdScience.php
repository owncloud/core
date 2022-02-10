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

namespace Google\Service\DisplayVideo;

class IntegralAdScience extends \Google\Collection
{
  protected $collection_key = 'customSegmentId';
  /**
   * @var string[]
   */
  public $customSegmentId;
  /**
   * @var string
   */
  public $displayViewability;
  /**
   * @var bool
   */
  public $excludeUnrateable;
  /**
   * @var string
   */
  public $excludedAdFraudRisk;
  /**
   * @var string
   */
  public $excludedAdultRisk;
  /**
   * @var string
   */
  public $excludedAlcoholRisk;
  /**
   * @var string
   */
  public $excludedDrugsRisk;
  /**
   * @var string
   */
  public $excludedGamblingRisk;
  /**
   * @var string
   */
  public $excludedHateSpeechRisk;
  /**
   * @var string
   */
  public $excludedIllegalDownloadsRisk;
  /**
   * @var string
   */
  public $excludedOffensiveLanguageRisk;
  /**
   * @var string
   */
  public $excludedViolenceRisk;
  /**
   * @var string
   */
  public $traqScoreOption;
  /**
   * @var string
   */
  public $videoViewability;

  /**
   * @param string[]
   */
  public function setCustomSegmentId($customSegmentId)
  {
    $this->customSegmentId = $customSegmentId;
  }
  /**
   * @return string[]
   */
  public function getCustomSegmentId()
  {
    return $this->customSegmentId;
  }
  /**
   * @param string
   */
  public function setDisplayViewability($displayViewability)
  {
    $this->displayViewability = $displayViewability;
  }
  /**
   * @return string
   */
  public function getDisplayViewability()
  {
    return $this->displayViewability;
  }
  /**
   * @param bool
   */
  public function setExcludeUnrateable($excludeUnrateable)
  {
    $this->excludeUnrateable = $excludeUnrateable;
  }
  /**
   * @return bool
   */
  public function getExcludeUnrateable()
  {
    return $this->excludeUnrateable;
  }
  /**
   * @param string
   */
  public function setExcludedAdFraudRisk($excludedAdFraudRisk)
  {
    $this->excludedAdFraudRisk = $excludedAdFraudRisk;
  }
  /**
   * @return string
   */
  public function getExcludedAdFraudRisk()
  {
    return $this->excludedAdFraudRisk;
  }
  /**
   * @param string
   */
  public function setExcludedAdultRisk($excludedAdultRisk)
  {
    $this->excludedAdultRisk = $excludedAdultRisk;
  }
  /**
   * @return string
   */
  public function getExcludedAdultRisk()
  {
    return $this->excludedAdultRisk;
  }
  /**
   * @param string
   */
  public function setExcludedAlcoholRisk($excludedAlcoholRisk)
  {
    $this->excludedAlcoholRisk = $excludedAlcoholRisk;
  }
  /**
   * @return string
   */
  public function getExcludedAlcoholRisk()
  {
    return $this->excludedAlcoholRisk;
  }
  /**
   * @param string
   */
  public function setExcludedDrugsRisk($excludedDrugsRisk)
  {
    $this->excludedDrugsRisk = $excludedDrugsRisk;
  }
  /**
   * @return string
   */
  public function getExcludedDrugsRisk()
  {
    return $this->excludedDrugsRisk;
  }
  /**
   * @param string
   */
  public function setExcludedGamblingRisk($excludedGamblingRisk)
  {
    $this->excludedGamblingRisk = $excludedGamblingRisk;
  }
  /**
   * @return string
   */
  public function getExcludedGamblingRisk()
  {
    return $this->excludedGamblingRisk;
  }
  /**
   * @param string
   */
  public function setExcludedHateSpeechRisk($excludedHateSpeechRisk)
  {
    $this->excludedHateSpeechRisk = $excludedHateSpeechRisk;
  }
  /**
   * @return string
   */
  public function getExcludedHateSpeechRisk()
  {
    return $this->excludedHateSpeechRisk;
  }
  /**
   * @param string
   */
  public function setExcludedIllegalDownloadsRisk($excludedIllegalDownloadsRisk)
  {
    $this->excludedIllegalDownloadsRisk = $excludedIllegalDownloadsRisk;
  }
  /**
   * @return string
   */
  public function getExcludedIllegalDownloadsRisk()
  {
    return $this->excludedIllegalDownloadsRisk;
  }
  /**
   * @param string
   */
  public function setExcludedOffensiveLanguageRisk($excludedOffensiveLanguageRisk)
  {
    $this->excludedOffensiveLanguageRisk = $excludedOffensiveLanguageRisk;
  }
  /**
   * @return string
   */
  public function getExcludedOffensiveLanguageRisk()
  {
    return $this->excludedOffensiveLanguageRisk;
  }
  /**
   * @param string
   */
  public function setExcludedViolenceRisk($excludedViolenceRisk)
  {
    $this->excludedViolenceRisk = $excludedViolenceRisk;
  }
  /**
   * @return string
   */
  public function getExcludedViolenceRisk()
  {
    return $this->excludedViolenceRisk;
  }
  /**
   * @param string
   */
  public function setTraqScoreOption($traqScoreOption)
  {
    $this->traqScoreOption = $traqScoreOption;
  }
  /**
   * @return string
   */
  public function getTraqScoreOption()
  {
    return $this->traqScoreOption;
  }
  /**
   * @param string
   */
  public function setVideoViewability($videoViewability)
  {
    $this->videoViewability = $videoViewability;
  }
  /**
   * @return string
   */
  public function getVideoViewability()
  {
    return $this->videoViewability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IntegralAdScience::class, 'Google_Service_DisplayVideo_IntegralAdScience');
