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

class ImageRegionsImageRegions extends \Google\Collection
{
  protected $collection_key = 'region';
  /**
   * @var float
   */
  public $finalPornScore;
  /**
   * @var float
   */
  public $finalViolenceScore;
  protected $flowOutputType = ImageContentFlowProtoProd::class;
  protected $flowOutputDataType = '';
  /**
   * @var bool
   */
  public $has300kThumb;
  /**
   * @var bool
   */
  public $hasNavboost;
  /**
   * @var bool
   */
  public $isIuInappropriate;
  /**
   * @var float
   */
  public $pedoScore;
  protected $precomputedRestrictsType = PrecomputedRestricts::class;
  protected $precomputedRestrictsDataType = '';
  /**
   * @var float
   */
  public $racyScore;
  protected $regionType = ImageRegionsImageRegion::class;
  protected $regionDataType = 'array';

  /**
   * @param float
   */
  public function setFinalPornScore($finalPornScore)
  {
    $this->finalPornScore = $finalPornScore;
  }
  /**
   * @return float
   */
  public function getFinalPornScore()
  {
    return $this->finalPornScore;
  }
  /**
   * @param float
   */
  public function setFinalViolenceScore($finalViolenceScore)
  {
    $this->finalViolenceScore = $finalViolenceScore;
  }
  /**
   * @return float
   */
  public function getFinalViolenceScore()
  {
    return $this->finalViolenceScore;
  }
  /**
   * @param ImageContentFlowProtoProd
   */
  public function setFlowOutput(ImageContentFlowProtoProd $flowOutput)
  {
    $this->flowOutput = $flowOutput;
  }
  /**
   * @return ImageContentFlowProtoProd
   */
  public function getFlowOutput()
  {
    return $this->flowOutput;
  }
  /**
   * @param bool
   */
  public function setHas300kThumb($has300kThumb)
  {
    $this->has300kThumb = $has300kThumb;
  }
  /**
   * @return bool
   */
  public function getHas300kThumb()
  {
    return $this->has300kThumb;
  }
  /**
   * @param bool
   */
  public function setHasNavboost($hasNavboost)
  {
    $this->hasNavboost = $hasNavboost;
  }
  /**
   * @return bool
   */
  public function getHasNavboost()
  {
    return $this->hasNavboost;
  }
  /**
   * @param bool
   */
  public function setIsIuInappropriate($isIuInappropriate)
  {
    $this->isIuInappropriate = $isIuInappropriate;
  }
  /**
   * @return bool
   */
  public function getIsIuInappropriate()
  {
    return $this->isIuInappropriate;
  }
  /**
   * @param float
   */
  public function setPedoScore($pedoScore)
  {
    $this->pedoScore = $pedoScore;
  }
  /**
   * @return float
   */
  public function getPedoScore()
  {
    return $this->pedoScore;
  }
  /**
   * @param PrecomputedRestricts
   */
  public function setPrecomputedRestricts(PrecomputedRestricts $precomputedRestricts)
  {
    $this->precomputedRestricts = $precomputedRestricts;
  }
  /**
   * @return PrecomputedRestricts
   */
  public function getPrecomputedRestricts()
  {
    return $this->precomputedRestricts;
  }
  /**
   * @param float
   */
  public function setRacyScore($racyScore)
  {
    $this->racyScore = $racyScore;
  }
  /**
   * @return float
   */
  public function getRacyScore()
  {
    return $this->racyScore;
  }
  /**
   * @param ImageRegionsImageRegion[]
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return ImageRegionsImageRegion[]
   */
  public function getRegion()
  {
    return $this->region;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRegionsImageRegions::class, 'Google_Service_Contentwarehouse_ImageRegionsImageRegions');
