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

class DrishtiVesperMovingThumbnailScoreComponents extends \Google\Model
{
  /**
   * @var float
   */
  public $audienceRewindRatioScore;
  /**
   * @var float
   */
  public $iconicFaceScore;
  /**
   * @var float
   */
  public $matchingScore;
  /**
   * @var float
   */
  public $motionScore;
  /**
   * @var float
   */
  public $titleMatchingScore;
  /**
   * @var float
   */
  public $videoThumbQualityScore;

  /**
   * @param float
   */
  public function setAudienceRewindRatioScore($audienceRewindRatioScore)
  {
    $this->audienceRewindRatioScore = $audienceRewindRatioScore;
  }
  /**
   * @return float
   */
  public function getAudienceRewindRatioScore()
  {
    return $this->audienceRewindRatioScore;
  }
  /**
   * @param float
   */
  public function setIconicFaceScore($iconicFaceScore)
  {
    $this->iconicFaceScore = $iconicFaceScore;
  }
  /**
   * @return float
   */
  public function getIconicFaceScore()
  {
    return $this->iconicFaceScore;
  }
  /**
   * @param float
   */
  public function setMatchingScore($matchingScore)
  {
    $this->matchingScore = $matchingScore;
  }
  /**
   * @return float
   */
  public function getMatchingScore()
  {
    return $this->matchingScore;
  }
  /**
   * @param float
   */
  public function setMotionScore($motionScore)
  {
    $this->motionScore = $motionScore;
  }
  /**
   * @return float
   */
  public function getMotionScore()
  {
    return $this->motionScore;
  }
  /**
   * @param float
   */
  public function setTitleMatchingScore($titleMatchingScore)
  {
    $this->titleMatchingScore = $titleMatchingScore;
  }
  /**
   * @return float
   */
  public function getTitleMatchingScore()
  {
    return $this->titleMatchingScore;
  }
  /**
   * @param float
   */
  public function setVideoThumbQualityScore($videoThumbQualityScore)
  {
    $this->videoThumbQualityScore = $videoThumbQualityScore;
  }
  /**
   * @return float
   */
  public function getVideoThumbQualityScore()
  {
    return $this->videoThumbQualityScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DrishtiVesperMovingThumbnailScoreComponents::class, 'Google_Service_Contentwarehouse_DrishtiVesperMovingThumbnailScoreComponents');
