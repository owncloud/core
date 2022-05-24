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

class GoogleCloudVideointelligenceV1p3beta1CelebrityTrack extends \Google\Collection
{
  protected $collection_key = 'celebrities';
  protected $celebritiesType = GoogleCloudVideointelligenceV1p3beta1RecognizedCelebrity::class;
  protected $celebritiesDataType = 'array';
  protected $faceTrackType = GoogleCloudVideointelligenceV1p3beta1Track::class;
  protected $faceTrackDataType = '';

  /**
   * @param GoogleCloudVideointelligenceV1p3beta1RecognizedCelebrity[]
   */
  public function setCelebrities($celebrities)
  {
    $this->celebrities = $celebrities;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p3beta1RecognizedCelebrity[]
   */
  public function getCelebrities()
  {
    return $this->celebrities;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p3beta1Track
   */
  public function setFaceTrack(GoogleCloudVideointelligenceV1p3beta1Track $faceTrack)
  {
    $this->faceTrack = $faceTrack;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p3beta1Track
   */
  public function getFaceTrack()
  {
    return $this->faceTrack;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1p3beta1CelebrityTrack::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1CelebrityTrack');
