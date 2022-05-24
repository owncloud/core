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

namespace Google\Service\FactCheckTools;

class GoogleFactcheckingFactchecktoolsV1alpha1ClaimRating extends \Google\Model
{
  /**
   * @var int
   */
  public $bestRating;
  /**
   * @var string
   */
  public $imageUrl;
  /**
   * @var string
   */
  public $ratingExplanation;
  /**
   * @var int
   */
  public $ratingValue;
  /**
   * @var string
   */
  public $textualRating;
  /**
   * @var int
   */
  public $worstRating;

  /**
   * @param int
   */
  public function setBestRating($bestRating)
  {
    $this->bestRating = $bestRating;
  }
  /**
   * @return int
   */
  public function getBestRating()
  {
    return $this->bestRating;
  }
  /**
   * @param string
   */
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  /**
   * @return string
   */
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  /**
   * @param string
   */
  public function setRatingExplanation($ratingExplanation)
  {
    $this->ratingExplanation = $ratingExplanation;
  }
  /**
   * @return string
   */
  public function getRatingExplanation()
  {
    return $this->ratingExplanation;
  }
  /**
   * @param int
   */
  public function setRatingValue($ratingValue)
  {
    $this->ratingValue = $ratingValue;
  }
  /**
   * @return int
   */
  public function getRatingValue()
  {
    return $this->ratingValue;
  }
  /**
   * @param string
   */
  public function setTextualRating($textualRating)
  {
    $this->textualRating = $textualRating;
  }
  /**
   * @return string
   */
  public function getTextualRating()
  {
    return $this->textualRating;
  }
  /**
   * @param int
   */
  public function setWorstRating($worstRating)
  {
    $this->worstRating = $worstRating;
  }
  /**
   * @return int
   */
  public function getWorstRating()
  {
    return $this->worstRating;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFactcheckingFactchecktoolsV1alpha1ClaimRating::class, 'Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1ClaimRating');
