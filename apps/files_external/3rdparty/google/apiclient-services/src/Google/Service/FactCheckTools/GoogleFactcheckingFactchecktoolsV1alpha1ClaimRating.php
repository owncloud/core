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

class Google_Service_FactCheckTools_GoogleFactcheckingFactchecktoolsV1alpha1ClaimRating extends Google_Model
{
  public $bestRating;
  public $imageUrl;
  public $ratingExplanation;
  public $ratingValue;
  public $textualRating;
  public $worstRating;

  public function setBestRating($bestRating)
  {
    $this->bestRating = $bestRating;
  }
  public function getBestRating()
  {
    return $this->bestRating;
  }
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  public function setRatingExplanation($ratingExplanation)
  {
    $this->ratingExplanation = $ratingExplanation;
  }
  public function getRatingExplanation()
  {
    return $this->ratingExplanation;
  }
  public function setRatingValue($ratingValue)
  {
    $this->ratingValue = $ratingValue;
  }
  public function getRatingValue()
  {
    return $this->ratingValue;
  }
  public function setTextualRating($textualRating)
  {
    $this->textualRating = $textualRating;
  }
  public function getTextualRating()
  {
    return $this->textualRating;
  }
  public function setWorstRating($worstRating)
  {
    $this->worstRating = $worstRating;
  }
  public function getWorstRating()
  {
    return $this->worstRating;
  }
}
