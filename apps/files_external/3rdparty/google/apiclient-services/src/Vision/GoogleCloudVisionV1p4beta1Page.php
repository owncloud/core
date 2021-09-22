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

class GoogleCloudVisionV1p4beta1Page extends \Google\Collection
{
  protected $collection_key = 'blocks';
  protected $blocksType = GoogleCloudVisionV1p4beta1Block::class;
  protected $blocksDataType = 'array';
  public $confidence;
  public $height;
  protected $propertyType = GoogleCloudVisionV1p4beta1TextAnnotationTextProperty::class;
  protected $propertyDataType = '';
  public $width;

  /**
   * @param GoogleCloudVisionV1p4beta1Block[]
   */
  public function setBlocks($blocks)
  {
    $this->blocks = $blocks;
  }
  /**
   * @return GoogleCloudVisionV1p4beta1Block[]
   */
  public function getBlocks()
  {
    return $this->blocks;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param GoogleCloudVisionV1p4beta1TextAnnotationTextProperty
   */
  public function setProperty(GoogleCloudVisionV1p4beta1TextAnnotationTextProperty $property)
  {
    $this->property = $property;
  }
  /**
   * @return GoogleCloudVisionV1p4beta1TextAnnotationTextProperty
   */
  public function getProperty()
  {
    return $this->property;
  }
  public function setWidth($width)
  {
    $this->width = $width;
  }
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p4beta1Page::class, 'Google_Service_Vision_GoogleCloudVisionV1p4beta1Page');
