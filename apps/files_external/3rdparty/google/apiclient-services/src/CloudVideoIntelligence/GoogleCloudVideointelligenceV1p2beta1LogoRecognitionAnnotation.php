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

class GoogleCloudVideointelligenceV1p2beta1LogoRecognitionAnnotation extends \Google\Collection
{
  protected $collection_key = 'tracks';
  protected $entityType = GoogleCloudVideointelligenceV1p2beta1Entity::class;
  protected $entityDataType = '';
  protected $segmentsType = GoogleCloudVideointelligenceV1p2beta1VideoSegment::class;
  protected $segmentsDataType = 'array';
  protected $tracksType = GoogleCloudVideointelligenceV1p2beta1Track::class;
  protected $tracksDataType = 'array';

  /**
   * @param GoogleCloudVideointelligenceV1p2beta1Entity
   */
  public function setEntity(GoogleCloudVideointelligenceV1p2beta1Entity $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p2beta1Entity
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p2beta1VideoSegment[]
   */
  public function setSegments($segments)
  {
    $this->segments = $segments;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p2beta1VideoSegment[]
   */
  public function getSegments()
  {
    return $this->segments;
  }
  /**
   * @param GoogleCloudVideointelligenceV1p2beta1Track[]
   */
  public function setTracks($tracks)
  {
    $this->tracks = $tracks;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p2beta1Track[]
   */
  public function getTracks()
  {
    return $this->tracks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1p2beta1LogoRecognitionAnnotation::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p2beta1LogoRecognitionAnnotation');
