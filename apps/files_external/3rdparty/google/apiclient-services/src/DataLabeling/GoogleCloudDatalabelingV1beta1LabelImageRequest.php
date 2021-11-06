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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1LabelImageRequest extends \Google\Model
{
  protected $basicConfigType = GoogleCloudDatalabelingV1beta1HumanAnnotationConfig::class;
  protected $basicConfigDataType = '';
  protected $boundingPolyConfigType = GoogleCloudDatalabelingV1beta1BoundingPolyConfig::class;
  protected $boundingPolyConfigDataType = '';
  public $feature;
  protected $imageClassificationConfigType = GoogleCloudDatalabelingV1beta1ImageClassificationConfig::class;
  protected $imageClassificationConfigDataType = '';
  protected $polylineConfigType = GoogleCloudDatalabelingV1beta1PolylineConfig::class;
  protected $polylineConfigDataType = '';
  protected $segmentationConfigType = GoogleCloudDatalabelingV1beta1SegmentationConfig::class;
  protected $segmentationConfigDataType = '';

  /**
   * @param GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function setBasicConfig(GoogleCloudDatalabelingV1beta1HumanAnnotationConfig $basicConfig)
  {
    $this->basicConfig = $basicConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function getBasicConfig()
  {
    return $this->basicConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1BoundingPolyConfig
   */
  public function setBoundingPolyConfig(GoogleCloudDatalabelingV1beta1BoundingPolyConfig $boundingPolyConfig)
  {
    $this->boundingPolyConfig = $boundingPolyConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1BoundingPolyConfig
   */
  public function getBoundingPolyConfig()
  {
    return $this->boundingPolyConfig;
  }
  public function setFeature($feature)
  {
    $this->feature = $feature;
  }
  public function getFeature()
  {
    return $this->feature;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1ImageClassificationConfig
   */
  public function setImageClassificationConfig(GoogleCloudDatalabelingV1beta1ImageClassificationConfig $imageClassificationConfig)
  {
    $this->imageClassificationConfig = $imageClassificationConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1ImageClassificationConfig
   */
  public function getImageClassificationConfig()
  {
    return $this->imageClassificationConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1PolylineConfig
   */
  public function setPolylineConfig(GoogleCloudDatalabelingV1beta1PolylineConfig $polylineConfig)
  {
    $this->polylineConfig = $polylineConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1PolylineConfig
   */
  public function getPolylineConfig()
  {
    return $this->polylineConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1SegmentationConfig
   */
  public function setSegmentationConfig(GoogleCloudDatalabelingV1beta1SegmentationConfig $segmentationConfig)
  {
    $this->segmentationConfig = $segmentationConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1SegmentationConfig
   */
  public function getSegmentationConfig()
  {
    return $this->segmentationConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1LabelImageRequest::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageRequest');
