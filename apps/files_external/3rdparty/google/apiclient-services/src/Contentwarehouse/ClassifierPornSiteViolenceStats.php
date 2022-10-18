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

class ClassifierPornSiteViolenceStats extends \Google\Model
{
  /**
   * @var float
   */
  public $meanFinalViolenceScore;
  /**
   * @var string
   */
  public $numberOfImages;
  /**
   * @var string
   */
  public $numberOfVideos;
  /**
   * @var float
   */
  public $videoViolenceScore;

  /**
   * @param float
   */
  public function setMeanFinalViolenceScore($meanFinalViolenceScore)
  {
    $this->meanFinalViolenceScore = $meanFinalViolenceScore;
  }
  /**
   * @return float
   */
  public function getMeanFinalViolenceScore()
  {
    return $this->meanFinalViolenceScore;
  }
  /**
   * @param string
   */
  public function setNumberOfImages($numberOfImages)
  {
    $this->numberOfImages = $numberOfImages;
  }
  /**
   * @return string
   */
  public function getNumberOfImages()
  {
    return $this->numberOfImages;
  }
  /**
   * @param string
   */
  public function setNumberOfVideos($numberOfVideos)
  {
    $this->numberOfVideos = $numberOfVideos;
  }
  /**
   * @return string
   */
  public function getNumberOfVideos()
  {
    return $this->numberOfVideos;
  }
  /**
   * @param float
   */
  public function setVideoViolenceScore($videoViolenceScore)
  {
    $this->videoViolenceScore = $videoViolenceScore;
  }
  /**
   * @return float
   */
  public function getVideoViolenceScore()
  {
    return $this->videoViolenceScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClassifierPornSiteViolenceStats::class, 'Google_Service_Contentwarehouse_ClassifierPornSiteViolenceStats');
