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

namespace Google\Service\CloudVideoIntelligence;

class GoogleCloudVideointelligenceV1p2beta1TimestampedObject extends \Google\Collection
{
  protected $collection_key = 'landmarks';
  protected $attributesType = GoogleCloudVideointelligenceV1p2beta1DetectedAttribute::class;
  protected $attributesDataType = 'array';
  protected $landmarksType = GoogleCloudVideointelligenceV1p2beta1DetectedLandmark::class;
  protected $landmarksDataType = 'array';
  protected $normalizedBoundingBoxType = GoogleCloudVideointelligenceV1p2beta1NormalizedBoundingBox::class;
  protected $normalizedBoundingBoxDataType = '';
  /**
   * @var string
   */
  public $timeOffset;

  /**
   * @param GoogleCloudVideointelligenceV1p2beta1DetectedAttribute[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p2beta1DetectedAttribute[]
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p2beta1DetectedLandmark[]
   */
  public function setLandmarks($landmarks)
  {
    $this->landmarks = $landmarks;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p2beta1DetectedLandmark[]
   */
  public function getLandmarks()
  {
    return $this->landmarks;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p2beta1NormalizedBoundingBox
   */
  public function setNormalizedBoundingBox(GoogleCloudVideointelligenceV1p2beta1NormalizedBoundingBox $normalizedBoundingBox)
  {
    $this->normalizedBoundingBox = $normalizedBoundingBox;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p2beta1NormalizedBoundingBox
   */
  public function getNormalizedBoundingBox()
  {
    return $this->normalizedBoundingBox;
  }
  /**
   * @param string
   */
  public function setTimeOffset($timeOffset)
  {
    $this->timeOffset = $timeOffset;
  }
  /**
   * @return string
   */
  public function getTimeOffset()
  {
    return $this->timeOffset;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1p2beta1TimestampedObject::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p2beta1TimestampedObject');
