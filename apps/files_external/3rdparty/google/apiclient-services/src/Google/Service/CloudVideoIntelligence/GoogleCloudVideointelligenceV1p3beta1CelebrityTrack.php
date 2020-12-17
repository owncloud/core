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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1CelebrityTrack extends Google_Collection
{
  protected $collection_key = 'celebrities';
  protected $celebritiesType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1RecognizedCelebrity';
  protected $celebritiesDataType = 'array';
  protected $faceTrackType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Track';
  protected $faceTrackDataType = '';

  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1RecognizedCelebrity[]
   */
  public function setCelebrities($celebrities)
  {
    $this->celebrities = $celebrities;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1RecognizedCelebrity[]
   */
  public function getCelebrities()
  {
    return $this->celebrities;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Track
   */
  public function setFaceTrack(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Track $faceTrack)
  {
    $this->faceTrack = $faceTrack;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Track
   */
  public function getFaceTrack()
  {
    return $this->faceTrack;
  }
}
