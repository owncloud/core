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

namespace Google\Service\Contentwarehouse;

class ImageUnderstandingIndexingFeature extends \Google\Collection
{
  protected $collection_key = 'int32Value';
  /**
   * @var string
   */
  public $bytesValue;
  /**
   * @var float[]
   */
  public $floatValue;
  protected $imageTemplateType = PhotosVisionObjectrecImageTemplate::class;
  protected $imageTemplateDataType = '';
  /**
   * @var int[]
   */
  public $int32Value;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setBytesValue($bytesValue)
  {
    $this->bytesValue = $bytesValue;
  }
  /**
   * @return string
   */
  public function getBytesValue()
  {
    return $this->bytesValue;
  }
  /**
   * @param float[]
   */
  public function setFloatValue($floatValue)
  {
    $this->floatValue = $floatValue;
  }
  /**
   * @return float[]
   */
  public function getFloatValue()
  {
    return $this->floatValue;
  }
  /**
   * @param PhotosVisionObjectrecImageTemplate
   */
  public function setImageTemplate(PhotosVisionObjectrecImageTemplate $imageTemplate)
  {
    $this->imageTemplate = $imageTemplate;
  }
  /**
   * @return PhotosVisionObjectrecImageTemplate
   */
  public function getImageTemplate()
  {
    return $this->imageTemplate;
  }
  /**
   * @param int[]
   */
  public function setInt32Value($int32Value)
  {
    $this->int32Value = $int32Value;
  }
  /**
   * @return int[]
   */
  public function getInt32Value()
  {
    return $this->int32Value;
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
class_alias(ImageUnderstandingIndexingFeature::class, 'Google_Service_Contentwarehouse_ImageUnderstandingIndexingFeature');
