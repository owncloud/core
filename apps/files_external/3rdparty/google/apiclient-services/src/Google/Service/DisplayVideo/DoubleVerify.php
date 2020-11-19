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

class Google_Service_DisplayVideo_DoubleVerify extends Google_Collection
{
  protected $collection_key = 'avoidedAgeRatings';
  protected $appStarRatingType = 'Google_Service_DisplayVideo_DoubleVerifyAppStarRating';
  protected $appStarRatingDataType = '';
  public $avoidedAgeRatings;
  protected $brandSafetyCategoriesType = 'Google_Service_DisplayVideo_DoubleVerifyBrandSafetyCategories';
  protected $brandSafetyCategoriesDataType = '';
  public $customSegmentId;
  protected $displayViewabilityType = 'Google_Service_DisplayVideo_DoubleVerifyDisplayViewability';
  protected $displayViewabilityDataType = '';
  protected $fraudInvalidTrafficType = 'Google_Service_DisplayVideo_DoubleVerifyFraudInvalidTraffic';
  protected $fraudInvalidTrafficDataType = '';
  protected $videoViewabilityType = 'Google_Service_DisplayVideo_DoubleVerifyVideoViewability';
  protected $videoViewabilityDataType = '';

  /**
   * @param Google_Service_DisplayVideo_DoubleVerifyAppStarRating
   */
  public function setAppStarRating(Google_Service_DisplayVideo_DoubleVerifyAppStarRating $appStarRating)
  {
    $this->appStarRating = $appStarRating;
  }
  /**
   * @return Google_Service_DisplayVideo_DoubleVerifyAppStarRating
   */
  public function getAppStarRating()
  {
    return $this->appStarRating;
  }
  public function setAvoidedAgeRatings($avoidedAgeRatings)
  {
    $this->avoidedAgeRatings = $avoidedAgeRatings;
  }
  public function getAvoidedAgeRatings()
  {
    return $this->avoidedAgeRatings;
  }
  /**
   * @param Google_Service_DisplayVideo_DoubleVerifyBrandSafetyCategories
   */
  public function setBrandSafetyCategories(Google_Service_DisplayVideo_DoubleVerifyBrandSafetyCategories $brandSafetyCategories)
  {
    $this->brandSafetyCategories = $brandSafetyCategories;
  }
  /**
   * @return Google_Service_DisplayVideo_DoubleVerifyBrandSafetyCategories
   */
  public function getBrandSafetyCategories()
  {
    return $this->brandSafetyCategories;
  }
  public function setCustomSegmentId($customSegmentId)
  {
    $this->customSegmentId = $customSegmentId;
  }
  public function getCustomSegmentId()
  {
    return $this->customSegmentId;
  }
  /**
   * @param Google_Service_DisplayVideo_DoubleVerifyDisplayViewability
   */
  public function setDisplayViewability(Google_Service_DisplayVideo_DoubleVerifyDisplayViewability $displayViewability)
  {
    $this->displayViewability = $displayViewability;
  }
  /**
   * @return Google_Service_DisplayVideo_DoubleVerifyDisplayViewability
   */
  public function getDisplayViewability()
  {
    return $this->displayViewability;
  }
  /**
   * @param Google_Service_DisplayVideo_DoubleVerifyFraudInvalidTraffic
   */
  public function setFraudInvalidTraffic(Google_Service_DisplayVideo_DoubleVerifyFraudInvalidTraffic $fraudInvalidTraffic)
  {
    $this->fraudInvalidTraffic = $fraudInvalidTraffic;
  }
  /**
   * @return Google_Service_DisplayVideo_DoubleVerifyFraudInvalidTraffic
   */
  public function getFraudInvalidTraffic()
  {
    return $this->fraudInvalidTraffic;
  }
  /**
   * @param Google_Service_DisplayVideo_DoubleVerifyVideoViewability
   */
  public function setVideoViewability(Google_Service_DisplayVideo_DoubleVerifyVideoViewability $videoViewability)
  {
    $this->videoViewability = $videoViewability;
  }
  /**
   * @return Google_Service_DisplayVideo_DoubleVerifyVideoViewability
   */
  public function getVideoViewability()
  {
    return $this->videoViewability;
  }
}
