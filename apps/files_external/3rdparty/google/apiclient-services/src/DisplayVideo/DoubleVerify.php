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

class DoubleVerify extends \Google\Collection
{
  protected $collection_key = 'avoidedAgeRatings';
  protected $appStarRatingType = DoubleVerifyAppStarRating::class;
  protected $appStarRatingDataType = '';
  /**
   * @var string[]
   */
  public $avoidedAgeRatings;
  protected $brandSafetyCategoriesType = DoubleVerifyBrandSafetyCategories::class;
  protected $brandSafetyCategoriesDataType = '';
  /**
   * @var string
   */
  public $customSegmentId;
  protected $displayViewabilityType = DoubleVerifyDisplayViewability::class;
  protected $displayViewabilityDataType = '';
  protected $fraudInvalidTrafficType = DoubleVerifyFraudInvalidTraffic::class;
  protected $fraudInvalidTrafficDataType = '';
  protected $videoViewabilityType = DoubleVerifyVideoViewability::class;
  protected $videoViewabilityDataType = '';

  /**
   * @param DoubleVerifyAppStarRating
   */
  public function setAppStarRating(DoubleVerifyAppStarRating $appStarRating)
  {
    $this->appStarRating = $appStarRating;
  }
  /**
   * @return DoubleVerifyAppStarRating
   */
  public function getAppStarRating()
  {
    return $this->appStarRating;
  }
  /**
   * @param string[]
   */
  public function setAvoidedAgeRatings($avoidedAgeRatings)
  {
    $this->avoidedAgeRatings = $avoidedAgeRatings;
  }
  /**
   * @return string[]
   */
  public function getAvoidedAgeRatings()
  {
    return $this->avoidedAgeRatings;
  }
  /**
   * @param DoubleVerifyBrandSafetyCategories
   */
  public function setBrandSafetyCategories(DoubleVerifyBrandSafetyCategories $brandSafetyCategories)
  {
    $this->brandSafetyCategories = $brandSafetyCategories;
  }
  /**
   * @return DoubleVerifyBrandSafetyCategories
   */
  public function getBrandSafetyCategories()
  {
    return $this->brandSafetyCategories;
  }
  /**
   * @param string
   */
  public function setCustomSegmentId($customSegmentId)
  {
    $this->customSegmentId = $customSegmentId;
  }
  /**
   * @return string
   */
  public function getCustomSegmentId()
  {
    return $this->customSegmentId;
  }
  /**
   * @param DoubleVerifyDisplayViewability
   */
  public function setDisplayViewability(DoubleVerifyDisplayViewability $displayViewability)
  {
    $this->displayViewability = $displayViewability;
  }
  /**
   * @return DoubleVerifyDisplayViewability
   */
  public function getDisplayViewability()
  {
    return $this->displayViewability;
  }
  /**
   * @param DoubleVerifyFraudInvalidTraffic
   */
  public function setFraudInvalidTraffic(DoubleVerifyFraudInvalidTraffic $fraudInvalidTraffic)
  {
    $this->fraudInvalidTraffic = $fraudInvalidTraffic;
  }
  /**
   * @return DoubleVerifyFraudInvalidTraffic
   */
  public function getFraudInvalidTraffic()
  {
    return $this->fraudInvalidTraffic;
  }
  /**
   * @param DoubleVerifyVideoViewability
   */
  public function setVideoViewability(DoubleVerifyVideoViewability $videoViewability)
  {
    $this->videoViewability = $videoViewability;
  }
  /**
   * @return DoubleVerifyVideoViewability
   */
  public function getVideoViewability()
  {
    return $this->videoViewability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DoubleVerify::class, 'Google_Service_DisplayVideo_DoubleVerify');
