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
  public $customSegmentId;
  public $displayViewability;
  public $excludeUnrateable;
  public $excludedAdFraudRisk;
  public $excludedAdultRisk;
  public $excludedAlcoholRisk;
  public $excludedDrugsRisk;
  public $excludedGamblingRisk;
  public $excludedHateSpeechRisk;
  public $excludedIllegalDownloadsRisk;
  public $excludedOffensiveLanguageRisk;
  public $excludedViolenceRisk;
  public $traqScoreOption;
  public $videoViewability;

  public function setCustomSegmentId($customSegmentId)
  {
    $this->customSegmentId = $customSegmentId;
  }
  public function getCustomSegmentId()
  {
    return $this->customSegmentId;
  }
  public function setDisplayViewability($displayViewability)
  {
    $this->displayViewability = $displayViewability;
  }
  public function getDisplayViewability()
  {
    return $this->displayViewability;
  }
  public function setExcludeUnrateable($excludeUnrateable)
  {
    $this->excludeUnrateable = $excludeUnrateable;
  }
  public function getExcludeUnrateable()
  {
    return $this->excludeUnrateable;
  }
  public function setExcludedAdFraudRisk($excludedAdFraudRisk)
  {
    $this->excludedAdFraudRisk = $excludedAdFraudRisk;
  }
  public function getExcludedAdFraudRisk()
  {
    return $this->excludedAdFraudRisk;
  }
  public function setExcludedAdultRisk($excludedAdultRisk)
  {
    $this->excludedAdultRisk = $excludedAdultRisk;
  }
  public function getExcludedAdultRisk()
  {
    return $this->excludedAdultRisk;
  }
  public function setExcludedAlcoholRisk($excludedAlcoholRisk)
  {
    $this->excludedAlcoholRisk = $excludedAlcoholRisk;
  }
  public function getExcludedAlcoholRisk()
  {
    return $this->excludedAlcoholRisk;
  }
  public function setExcludedDrugsRisk($excludedDrugsRisk)
  {
    $this->excludedDrugsRisk = $excludedDrugsRisk;
  }
  public function getExcludedDrugsRisk()
  {
    return $this->excludedDrugsRisk;
  }
  public function setExcludedGamblingRisk($excludedGamblingRisk)
  {
    $this->excludedGamblingRisk = $excludedGamblingRisk;
  }
  public function getExcludedGamblingRisk()
  {
    return $this->excludedGamblingRisk;
  }
  public function setExcludedHateSpeechRisk($excludedHateSpeechRisk)
  {
    $this->excludedHateSpeechRisk = $excludedHateSpeechRisk;
  }
  public function getExcludedHateSpeechRisk()
  {
    return $this->excludedHateSpeechRisk;
  }
  public function setExcludedIllegalDownloadsRisk($excludedIllegalDownloadsRisk)
  {
    $this->excludedIllegalDownloadsRisk = $excludedIllegalDownloadsRisk;
  }
  public function getExcludedIllegalDownloadsRisk()
  {
    return $this->excludedIllegalDownloadsRisk;
  }
  public function setExcludedOffensiveLanguageRisk($excludedOffensiveLanguageRisk)
  {
    $this->excludedOffensiveLanguageRisk = $excludedOffensiveLanguageRisk;
  }
  public function getExcludedOffensiveLanguageRisk()
  {
    return $this->excludedOffensiveLanguageRisk;
  }
  public function setExcludedViolenceRisk($excludedViolenceRisk)
  {
    $this->excludedViolenceRisk = $excludedViolenceRisk;
  }
  public function getExcludedViolenceRisk()
  {
    return $this->excludedViolenceRisk;
  }
  public function setTraqScoreOption($traqScoreOption)
  {
    $this->traqScoreOption = $traqScoreOption;
  }
  public function getTraqScoreOption()
  {
    return $this->traqScoreOption;
  }
  public function setVideoViewability($videoViewability)
  {
    $this->videoViewability = $videoViewability;
  }
  public function getVideoViewability()
  {
    return $this->videoViewability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IntegralAdScience::class, 'Google_Service_DisplayVideo_IntegralAdScience');
