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

class FaceAnnotation extends \Google\Collection
{
  protected $collection_key = 'landmarks';
  public $angerLikelihood;
  public $blurredLikelihood;
  protected $boundingPolyType = BoundingPoly::class;
  protected $boundingPolyDataType = '';
  public $detectionConfidence;
  protected $fdBoundingPolyType = BoundingPoly::class;
  protected $fdBoundingPolyDataType = '';
  public $headwearLikelihood;
  public $joyLikelihood;
  public $landmarkingConfidence;
  protected $landmarksType = Landmark::class;
  protected $landmarksDataType = 'array';
  public $panAngle;
  public $rollAngle;
  public $sorrowLikelihood;
  public $surpriseLikelihood;
  public $tiltAngle;
  public $underExposedLikelihood;

  public function setAngerLikelihood($angerLikelihood)
  {
    $this->angerLikelihood = $angerLikelihood;
  }
  public function getAngerLikelihood()
  {
    return $this->angerLikelihood;
  }
  public function setBlurredLikelihood($blurredLikelihood)
  {
    $this->blurredLikelihood = $blurredLikelihood;
  }
  public function getBlurredLikelihood()
  {
    return $this->blurredLikelihood;
  }
  /**
   * @param BoundingPoly
   */
  public function setBoundingPoly(BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  /**
   * @return BoundingPoly
   */
  public function getBoundingPoly()
  {
    return $this->boundingPoly;
  }
  public function setDetectionConfidence($detectionConfidence)
  {
    $this->detectionConfidence = $detectionConfidence;
  }
  public function getDetectionConfidence()
  {
    return $this->detectionConfidence;
  }
  /**
   * @param BoundingPoly
   */
  public function setFdBoundingPoly(BoundingPoly $fdBoundingPoly)
  {
    $this->fdBoundingPoly = $fdBoundingPoly;
  }
  /**
   * @return BoundingPoly
   */
  public function getFdBoundingPoly()
  {
    return $this->fdBoundingPoly;
  }
  public function setHeadwearLikelihood($headwearLikelihood)
  {
    $this->headwearLikelihood = $headwearLikelihood;
  }
  public function getHeadwearLikelihood()
  {
    return $this->headwearLikelihood;
  }
  public function setJoyLikelihood($joyLikelihood)
  {
    $this->joyLikelihood = $joyLikelihood;
  }
  public function getJoyLikelihood()
  {
    return $this->joyLikelihood;
  }
  public function setLandmarkingConfidence($landmarkingConfidence)
  {
    $this->landmarkingConfidence = $landmarkingConfidence;
  }
  public function getLandmarkingConfidence()
  {
    return $this->landmarkingConfidence;
  }
  /**
   * @param Landmark[]
   */
  public function setLandmarks($landmarks)
  {
    $this->landmarks = $landmarks;
  }
  /**
   * @return Landmark[]
   */
  public function getLandmarks()
  {
    return $this->landmarks;
  }
  public function setPanAngle($panAngle)
  {
    $this->panAngle = $panAngle;
  }
  public function getPanAngle()
  {
    return $this->panAngle;
  }
  public function setRollAngle($rollAngle)
  {
    $this->rollAngle = $rollAngle;
  }
  public function getRollAngle()
  {
    return $this->rollAngle;
  }
  public function setSorrowLikelihood($sorrowLikelihood)
  {
    $this->sorrowLikelihood = $sorrowLikelihood;
  }
  public function getSorrowLikelihood()
  {
    return $this->sorrowLikelihood;
  }
  public function setSurpriseLikelihood($surpriseLikelihood)
  {
    $this->surpriseLikelihood = $surpriseLikelihood;
  }
  public function getSurpriseLikelihood()
  {
    return $this->surpriseLikelihood;
  }
  public function setTiltAngle($tiltAngle)
  {
    $this->tiltAngle = $tiltAngle;
  }
  public function getTiltAngle()
  {
    return $this->tiltAngle;
  }
  public function setUnderExposedLikelihood($underExposedLikelihood)
  {
    $this->underExposedLikelihood = $underExposedLikelihood;
  }
  public function getUnderExposedLikelihood()
  {
    return $this->underExposedLikelihood;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FaceAnnotation::class, 'Google_Service_Vision_FaceAnnotation');
