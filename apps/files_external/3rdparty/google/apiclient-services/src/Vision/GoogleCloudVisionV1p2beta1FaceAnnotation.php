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

namespace Google\Service\Vision;

class GoogleCloudVisionV1p2beta1FaceAnnotation extends \Google\Collection
{
  protected $collection_key = 'landmarks';
  /**
   * @var string
   */
  public $angerLikelihood;
  /**
   * @var string
   */
  public $blurredLikelihood;
  protected $boundingPolyType = GoogleCloudVisionV1p2beta1BoundingPoly::class;
  protected $boundingPolyDataType = '';
  /**
   * @var float
   */
  public $detectionConfidence;
  protected $fdBoundingPolyType = GoogleCloudVisionV1p2beta1BoundingPoly::class;
  protected $fdBoundingPolyDataType = '';
  /**
   * @var string
   */
  public $headwearLikelihood;
  /**
   * @var string
   */
  public $joyLikelihood;
  /**
   * @var float
   */
  public $landmarkingConfidence;
  protected $landmarksType = GoogleCloudVisionV1p2beta1FaceAnnotationLandmark::class;
  protected $landmarksDataType = 'array';
  /**
   * @var float
   */
  public $panAngle;
  /**
   * @var float
   */
  public $rollAngle;
  /**
   * @var string
   */
  public $sorrowLikelihood;
  /**
   * @var string
   */
  public $surpriseLikelihood;
  /**
   * @var float
   */
  public $tiltAngle;
  /**
   * @var string
   */
  public $underExposedLikelihood;

  /**
   * @param string
   */
  public function setAngerLikelihood($angerLikelihood)
  {
    $this->angerLikelihood = $angerLikelihood;
  }
  /**
   * @return string
   */
  public function getAngerLikelihood()
  {
    return $this->angerLikelihood;
  }
  /**
   * @param string
   */
  public function setBlurredLikelihood($blurredLikelihood)
  {
    $this->blurredLikelihood = $blurredLikelihood;
  }
  /**
   * @return string
   */
  public function getBlurredLikelihood()
  {
    return $this->blurredLikelihood;
  }
  /**
   * @param GoogleCloudVisionV1p2beta1BoundingPoly
   */
  public function setBoundingPoly(GoogleCloudVisionV1p2beta1BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  /**
   * @return GoogleCloudVisionV1p2beta1BoundingPoly
   */
  public function getBoundingPoly()
  {
    return $this->boundingPoly;
  }
  /**
   * @param float
   */
  public function setDetectionConfidence($detectionConfidence)
  {
    $this->detectionConfidence = $detectionConfidence;
  }
  /**
   * @return float
   */
  public function getDetectionConfidence()
  {
    return $this->detectionConfidence;
  }
  /**
   * @param GoogleCloudVisionV1p2beta1BoundingPoly
   */
  public function setFdBoundingPoly(GoogleCloudVisionV1p2beta1BoundingPoly $fdBoundingPoly)
  {
    $this->fdBoundingPoly = $fdBoundingPoly;
  }
  /**
   * @return GoogleCloudVisionV1p2beta1BoundingPoly
   */
  public function getFdBoundingPoly()
  {
    return $this->fdBoundingPoly;
  }
  /**
   * @param string
   */
  public function setHeadwearLikelihood($headwearLikelihood)
  {
    $this->headwearLikelihood = $headwearLikelihood;
  }
  /**
   * @return string
   */
  public function getHeadwearLikelihood()
  {
    return $this->headwearLikelihood;
  }
  /**
   * @param string
   */
  public function setJoyLikelihood($joyLikelihood)
  {
    $this->joyLikelihood = $joyLikelihood;
  }
  /**
   * @return string
   */
  public function getJoyLikelihood()
  {
    return $this->joyLikelihood;
  }
  /**
   * @param float
   */
  public function setLandmarkingConfidence($landmarkingConfidence)
  {
    $this->landmarkingConfidence = $landmarkingConfidence;
  }
  /**
   * @return float
   */
  public function getLandmarkingConfidence()
  {
    return $this->landmarkingConfidence;
  }
  /**
   * @param GoogleCloudVisionV1p2beta1FaceAnnotationLandmark[]
   */
  public function setLandmarks($landmarks)
  {
    $this->landmarks = $landmarks;
  }
  /**
   * @return GoogleCloudVisionV1p2beta1FaceAnnotationLandmark[]
   */
  public function getLandmarks()
  {
    return $this->landmarks;
  }
  /**
   * @param float
   */
  public function setPanAngle($panAngle)
  {
    $this->panAngle = $panAngle;
  }
  /**
   * @return float
   */
  public function getPanAngle()
  {
    return $this->panAngle;
  }
  /**
   * @param float
   */
  public function setRollAngle($rollAngle)
  {
    $this->rollAngle = $rollAngle;
  }
  /**
   * @return float
   */
  public function getRollAngle()
  {
    return $this->rollAngle;
  }
  /**
   * @param string
   */
  public function setSorrowLikelihood($sorrowLikelihood)
  {
    $this->sorrowLikelihood = $sorrowLikelihood;
  }
  /**
   * @return string
   */
  public function getSorrowLikelihood()
  {
    return $this->sorrowLikelihood;
  }
  /**
   * @param string
   */
  public function setSurpriseLikelihood($surpriseLikelihood)
  {
    $this->surpriseLikelihood = $surpriseLikelihood;
  }
  /**
   * @return string
   */
  public function getSurpriseLikelihood()
  {
    return $this->surpriseLikelihood;
  }
  /**
   * @param float
   */
  public function setTiltAngle($tiltAngle)
  {
    $this->tiltAngle = $tiltAngle;
  }
  /**
   * @return float
   */
  public function getTiltAngle()
  {
    return $this->tiltAngle;
  }
  /**
   * @param string
   */
  public function setUnderExposedLikelihood($underExposedLikelihood)
  {
    $this->underExposedLikelihood = $underExposedLikelihood;
  }
  /**
   * @return string
   */
  public function getUnderExposedLikelihood()
  {
    return $this->underExposedLikelihood;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p2beta1FaceAnnotation::class, 'Google_Service_Vision_GoogleCloudVisionV1p2beta1FaceAnnotation');
