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

class GoogleCloudVisionV1p1beta1CropHint extends \Google\Model
{
  protected $boundingPolyType = GoogleCloudVisionV1p1beta1BoundingPoly::class;
  protected $boundingPolyDataType = '';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var float
   */
  public $importanceFraction;

  /**
   * @param GoogleCloudVisionV1p1beta1BoundingPoly
   */
  public function setBoundingPoly(GoogleCloudVisionV1p1beta1BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  /**
   * @return GoogleCloudVisionV1p1beta1BoundingPoly
   */
  public function getBoundingPoly()
  {
    return $this->boundingPoly;
  }
  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param float
   */
  public function setImportanceFraction($importanceFraction)
  {
    $this->importanceFraction = $importanceFraction;
  }
  /**
   * @return float
   */
  public function getImportanceFraction()
  {
    return $this->importanceFraction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p1beta1CropHint::class, 'Google_Service_Vision_GoogleCloudVisionV1p1beta1CropHint');
