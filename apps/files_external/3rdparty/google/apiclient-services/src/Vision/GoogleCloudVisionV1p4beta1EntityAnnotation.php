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

class GoogleCloudVisionV1p4beta1EntityAnnotation extends \Google\Collection
{
  protected $collection_key = 'properties';
  protected $boundingPolyType = GoogleCloudVisionV1p4beta1BoundingPoly::class;
  protected $boundingPolyDataType = '';
  public $confidence;
  public $description;
  public $locale;
  protected $locationsType = GoogleCloudVisionV1p4beta1LocationInfo::class;
  protected $locationsDataType = 'array';
  public $mid;
  protected $propertiesType = GoogleCloudVisionV1p4beta1Property::class;
  protected $propertiesDataType = 'array';
  public $score;
  public $topicality;

  /**
   * @param GoogleCloudVisionV1p4beta1BoundingPoly
   */
  public function setBoundingPoly(GoogleCloudVisionV1p4beta1BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  /**
   * @return GoogleCloudVisionV1p4beta1BoundingPoly
   */
  public function getBoundingPoly()
  {
    return $this->boundingPoly;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param GoogleCloudVisionV1p4beta1LocationInfo[]
   */
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  /**
   * @return GoogleCloudVisionV1p4beta1LocationInfo[]
   */
  public function getLocations()
  {
    return $this->locations;
  }
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param GoogleCloudVisionV1p4beta1Property[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleCloudVisionV1p4beta1Property[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
  public function setTopicality($topicality)
  {
    $this->topicality = $topicality;
  }
  public function getTopicality()
  {
    return $this->topicality;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p4beta1EntityAnnotation::class, 'Google_Service_Vision_GoogleCloudVisionV1p4beta1EntityAnnotation');
