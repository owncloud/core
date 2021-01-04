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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1ObjectTrackingAnnotation extends Google_Collection
{
  protected $collection_key = 'frames';
  public $confidence;
  protected $entityType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Entity';
  protected $entityDataType = '';
  protected $framesType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1ObjectTrackingFrame';
  protected $framesDataType = 'array';
  protected $segmentType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1VideoSegment';
  protected $segmentDataType = '';
  public $trackId;
  public $version;

  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Entity
   */
  public function setEntity(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Entity $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1Entity
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1ObjectTrackingFrame[]
   */
  public function setFrames($frames)
  {
    $this->frames = $frames;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1ObjectTrackingFrame[]
   */
  public function getFrames()
  {
    return $this->frames;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1VideoSegment
   */
  public function setSegment(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1VideoSegment $segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1VideoSegment
   */
  public function getSegment()
  {
    return $this->segment;
  }
  public function setTrackId($trackId)
  {
    $this->trackId = $trackId;
  }
  public function getTrackId()
  {
    return $this->trackId;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
