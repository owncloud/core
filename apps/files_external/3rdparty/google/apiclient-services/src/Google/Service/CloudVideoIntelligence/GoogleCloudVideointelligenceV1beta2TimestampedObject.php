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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2TimestampedObject extends Google_Collection
{
  protected $collection_key = 'landmarks';
  protected $attributesType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2DetectedAttribute';
  protected $attributesDataType = 'array';
  protected $landmarksType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2DetectedLandmark';
  protected $landmarksDataType = 'array';
  protected $normalizedBoundingBoxType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2NormalizedBoundingBox';
  protected $normalizedBoundingBoxDataType = '';
  public $timeOffset;

  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2DetectedAttribute
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2DetectedAttribute
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2DetectedLandmark
   */
  public function setLandmarks($landmarks)
  {
    $this->landmarks = $landmarks;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2DetectedLandmark
   */
  public function getLandmarks()
  {
    return $this->landmarks;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2NormalizedBoundingBox
   */
  public function setNormalizedBoundingBox(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2NormalizedBoundingBox $normalizedBoundingBox)
  {
    $this->normalizedBoundingBox = $normalizedBoundingBox;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2NormalizedBoundingBox
   */
  public function getNormalizedBoundingBox()
  {
    return $this->normalizedBoundingBox;
  }
  public function setTimeOffset($timeOffset)
  {
    $this->timeOffset = $timeOffset;
  }
  public function getTimeOffset()
  {
    return $this->timeOffset;
  }
}
