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

class GoogleCloudVideointelligenceV1beta2LabelAnnotation extends \Google\Collection
{
  protected $collection_key = 'segments';
  protected $categoryEntitiesType = GoogleCloudVideointelligenceV1beta2Entity::class;
  protected $categoryEntitiesDataType = 'array';
  protected $entityType = GoogleCloudVideointelligenceV1beta2Entity::class;
  protected $entityDataType = '';
  protected $framesType = GoogleCloudVideointelligenceV1beta2LabelFrame::class;
  protected $framesDataType = 'array';
  protected $segmentsType = GoogleCloudVideointelligenceV1beta2LabelSegment::class;
  protected $segmentsDataType = 'array';
  /**
   * @var string
   */
  public $version;

  /**
   * @param GoogleCloudVideointelligenceV1beta2Entity[]
   */
  public function setCategoryEntities($categoryEntities)
  {
    $this->categoryEntities = $categoryEntities;
  }
  /**
   * @return GoogleCloudVideointelligenceV1beta2Entity[]
   */
  public function getCategoryEntities()
  {
    return $this->categoryEntities;
  }
  /**
   * @param GoogleCloudVideointelligenceV1beta2Entity
   */
  public function setEntity(GoogleCloudVideointelligenceV1beta2Entity $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return GoogleCloudVideointelligenceV1beta2Entity
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param GoogleCloudVideointelligenceV1beta2LabelFrame[]
   */
  public function setFrames($frames)
  {
    $this->frames = $frames;
  }
  /**
   * @return GoogleCloudVideointelligenceV1beta2LabelFrame[]
   */
  public function getFrames()
  {
    return $this->frames;
  }
  /**
   * @param GoogleCloudVideointelligenceV1beta2LabelSegment[]
   */
  public function setSegments($segments)
  {
    $this->segments = $segments;
  }
  /**
   * @return GoogleCloudVideointelligenceV1beta2LabelSegment[]
   */
  public function getSegments()
  {
    return $this->segments;
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
class_alias(GoogleCloudVideointelligenceV1beta2LabelAnnotation::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta2LabelAnnotation');
