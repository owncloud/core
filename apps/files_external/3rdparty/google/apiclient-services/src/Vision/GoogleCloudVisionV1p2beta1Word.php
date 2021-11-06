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

class GoogleCloudVisionV1p2beta1Word extends \Google\Collection
{
  protected $collection_key = 'symbols';
  protected $boundingBoxType = GoogleCloudVisionV1p2beta1BoundingPoly::class;
  protected $boundingBoxDataType = '';
  public $confidence;
  protected $propertyType = GoogleCloudVisionV1p2beta1TextAnnotationTextProperty::class;
  protected $propertyDataType = '';
  protected $symbolsType = GoogleCloudVisionV1p2beta1Symbol::class;
  protected $symbolsDataType = 'array';

  /**
   * @param GoogleCloudVisionV1p2beta1BoundingPoly
   */
  public function setBoundingBox(GoogleCloudVisionV1p2beta1BoundingPoly $boundingBox)
  {
    $this->boundingBox = $boundingBox;
  }
  /**
   * @return GoogleCloudVisionV1p2beta1BoundingPoly
   */
  public function getBoundingBox()
  {
    return $this->boundingBox;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param GoogleCloudVisionV1p2beta1TextAnnotationTextProperty
   */
  public function setProperty(GoogleCloudVisionV1p2beta1TextAnnotationTextProperty $property)
  {
    $this->property = $property;
  }
  /**
   * @return GoogleCloudVisionV1p2beta1TextAnnotationTextProperty
   */
  public function getProperty()
  {
    return $this->property;
  }
  /**
   * @param GoogleCloudVisionV1p2beta1Symbol[]
   */
  public function setSymbols($symbols)
  {
    $this->symbols = $symbols;
  }
  /**
   * @return GoogleCloudVisionV1p2beta1Symbol[]
   */
  public function getSymbols()
  {
    return $this->symbols;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p2beta1Word::class, 'Google_Service_Vision_GoogleCloudVisionV1p2beta1Word');
