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

class LensDiscoveryStylePersonAttributes extends \Google\Model
{
  /**
   * @var int
   */
  public $discretizedFaceVisibilityScore;
  /**
   * @var int
   */
  public $discretizedFemaleConfidence;
  /**
   * @var int
   */
  public $discretizedMaleConfidence;
  /**
   * @var int
   */
  public $discretizedPredictedAge;
  /**
   * @var int
   */
  public $discretizedVisualSaliencyScore;
  protected $iconicPersonBoundingBoxType = PhotosVisionGroundtruthdbNormalizedBoundingBox::class;
  protected $iconicPersonBoundingBoxDataType = '';
  protected $personBoundingBoxType = LensDiscoveryStyleBoundingBox::class;
  protected $personBoundingBoxDataType = '';
  protected $personVisibilityScoresType = LensDiscoveryStylePersonAttributesPersonVisibilityScores::class;
  protected $personVisibilityScoresDataType = '';
  /**
   * @var string
   */
  public $predictedAgeBucket;
  /**
   * @var string
   */
  public $version;

  /**
   * @param int
   */
  public function setDiscretizedFaceVisibilityScore($discretizedFaceVisibilityScore)
  {
    $this->discretizedFaceVisibilityScore = $discretizedFaceVisibilityScore;
  }
  /**
   * @return int
   */
  public function getDiscretizedFaceVisibilityScore()
  {
    return $this->discretizedFaceVisibilityScore;
  }
  /**
   * @param int
   */
  public function setDiscretizedFemaleConfidence($discretizedFemaleConfidence)
  {
    $this->discretizedFemaleConfidence = $discretizedFemaleConfidence;
  }
  /**
   * @return int
   */
  public function getDiscretizedFemaleConfidence()
  {
    return $this->discretizedFemaleConfidence;
  }
  /**
   * @param int
   */
  public function setDiscretizedMaleConfidence($discretizedMaleConfidence)
  {
    $this->discretizedMaleConfidence = $discretizedMaleConfidence;
  }
  /**
   * @return int
   */
  public function getDiscretizedMaleConfidence()
  {
    return $this->discretizedMaleConfidence;
  }
  /**
   * @param int
   */
  public function setDiscretizedPredictedAge($discretizedPredictedAge)
  {
    $this->discretizedPredictedAge = $discretizedPredictedAge;
  }
  /**
   * @return int
   */
  public function getDiscretizedPredictedAge()
  {
    return $this->discretizedPredictedAge;
  }
  /**
   * @param int
   */
  public function setDiscretizedVisualSaliencyScore($discretizedVisualSaliencyScore)
  {
    $this->discretizedVisualSaliencyScore = $discretizedVisualSaliencyScore;
  }
  /**
   * @return int
   */
  public function getDiscretizedVisualSaliencyScore()
  {
    return $this->discretizedVisualSaliencyScore;
  }
  /**
   * @param PhotosVisionGroundtruthdbNormalizedBoundingBox
   */
  public function setIconicPersonBoundingBox(PhotosVisionGroundtruthdbNormalizedBoundingBox $iconicPersonBoundingBox)
  {
    $this->iconicPersonBoundingBox = $iconicPersonBoundingBox;
  }
  /**
   * @return PhotosVisionGroundtruthdbNormalizedBoundingBox
   */
  public function getIconicPersonBoundingBox()
  {
    return $this->iconicPersonBoundingBox;
  }
  /**
   * @param LensDiscoveryStyleBoundingBox
   */
  public function setPersonBoundingBox(LensDiscoveryStyleBoundingBox $personBoundingBox)
  {
    $this->personBoundingBox = $personBoundingBox;
  }
  /**
   * @return LensDiscoveryStyleBoundingBox
   */
  public function getPersonBoundingBox()
  {
    return $this->personBoundingBox;
  }
  /**
   * @param LensDiscoveryStylePersonAttributesPersonVisibilityScores
   */
  public function setPersonVisibilityScores(LensDiscoveryStylePersonAttributesPersonVisibilityScores $personVisibilityScores)
  {
    $this->personVisibilityScores = $personVisibilityScores;
  }
  /**
   * @return LensDiscoveryStylePersonAttributesPersonVisibilityScores
   */
  public function getPersonVisibilityScores()
  {
    return $this->personVisibilityScores;
  }
  /**
   * @param string
   */
  public function setPredictedAgeBucket($predictedAgeBucket)
  {
    $this->predictedAgeBucket = $predictedAgeBucket;
  }
  /**
   * @return string
   */
  public function getPredictedAgeBucket()
  {
    return $this->predictedAgeBucket;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LensDiscoveryStylePersonAttributes::class, 'Google_Service_Contentwarehouse_LensDiscoveryStylePersonAttributes');
