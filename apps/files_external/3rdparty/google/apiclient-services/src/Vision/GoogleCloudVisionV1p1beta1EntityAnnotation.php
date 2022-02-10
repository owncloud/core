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

class GoogleCloudVisionV1p1beta1EntityAnnotation extends \Google\Collection
{
  protected $collection_key = 'properties';
  protected $boundingPolyType = GoogleCloudVisionV1p1beta1BoundingPoly::class;
  protected $boundingPolyDataType = '';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $locale;
  protected $locationsType = GoogleCloudVisionV1p1beta1LocationInfo::class;
  protected $locationsDataType = 'array';
  /**
   * @var string
   */
  public $mid;
  protected $propertiesType = GoogleCloudVisionV1p1beta1Property::class;
  protected $propertiesDataType = 'array';
  /**
   * @var float
   */
  public $score;
  /**
   * @var float
   */
  public $topicality;

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
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return string
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param GoogleCloudVisionV1p1beta1LocationInfo[]
   */
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  /**
   * @return GoogleCloudVisionV1p1beta1LocationInfo[]
   */
  public function getLocations()
  {
    return $this->locations;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param GoogleCloudVisionV1p1beta1Property[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleCloudVisionV1p1beta1Property[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param float
   */
  public function setTopicality($topicality)
  {
    $this->topicality = $topicality;
  }
  /**
   * @return float
   */
  public function getTopicality()
  {
    return $this->topicality;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p1beta1EntityAnnotation::class, 'Google_Service_Vision_GoogleCloudVisionV1p1beta1EntityAnnotation');
