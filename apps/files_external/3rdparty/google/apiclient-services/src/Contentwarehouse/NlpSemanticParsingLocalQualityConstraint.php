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

class NlpSemanticParsingLocalQualityConstraint extends \Google\Model
{
  /**
   * @var bool
   */
  public $best;
  /**
   * @var bool
   */
  public $highlyRated;
  /**
   * @var string
   */
  public $starType;
  protected $starsType = NlpSemanticParsingLocalStarRatings::class;
  protected $starsDataType = '';
  /**
   * @var bool
   */
  public $unspecified;

  /**
   * @param bool
   */
  public function setBest($best)
  {
    $this->best = $best;
  }
  /**
   * @return bool
   */
  public function getBest()
  {
    return $this->best;
  }
  /**
   * @param bool
   */
  public function setHighlyRated($highlyRated)
  {
    $this->highlyRated = $highlyRated;
  }
  /**
   * @return bool
   */
  public function getHighlyRated()
  {
    return $this->highlyRated;
  }
  /**
   * @param string
   */
  public function setStarType($starType)
  {
    $this->starType = $starType;
  }
  /**
   * @return string
   */
  public function getStarType()
  {
    return $this->starType;
  }
  /**
   * @param NlpSemanticParsingLocalStarRatings
   */
  public function setStars(NlpSemanticParsingLocalStarRatings $stars)
  {
    $this->stars = $stars;
  }
  /**
   * @return NlpSemanticParsingLocalStarRatings
   */
  public function getStars()
  {
    return $this->stars;
  }
  /**
   * @param bool
   */
  public function setUnspecified($unspecified)
  {
    $this->unspecified = $unspecified;
  }
  /**
   * @return bool
   */
  public function getUnspecified()
  {
    return $this->unspecified;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalQualityConstraint::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalQualityConstraint');
