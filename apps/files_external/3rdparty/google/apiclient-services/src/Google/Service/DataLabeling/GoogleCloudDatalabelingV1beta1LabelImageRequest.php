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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelImageRequest extends Google_Model
{
  protected $basicConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig';
  protected $basicConfigDataType = '';
  protected $boundingPolyConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPolyConfig';
  protected $boundingPolyConfigDataType = '';
  public $feature;
  protected $imageClassificationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationConfig';
  protected $imageClassificationConfigDataType = '';
  protected $polylineConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PolylineConfig';
  protected $polylineConfigDataType = '';
  protected $segmentationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SegmentationConfig';
  protected $segmentationConfigDataType = '';

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function setBasicConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig $basicConfig)
  {
    $this->basicConfig = $basicConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function getBasicConfig()
  {
    return $this->basicConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPolyConfig
   */
  public function setBoundingPolyConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPolyConfig $boundingPolyConfig)
  {
    $this->boundingPolyConfig = $boundingPolyConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPolyConfig
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
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationConfig
   */
  public function setImageClassificationConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationConfig $imageClassificationConfig)
  {
    $this->imageClassificationConfig = $imageClassificationConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationConfig
   */
  public function getImageClassificationConfig()
  {
    return $this->imageClassificationConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PolylineConfig
   */
  public function setPolylineConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PolylineConfig $polylineConfig)
  {
    $this->polylineConfig = $polylineConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PolylineConfig
   */
  public function getPolylineConfig()
  {
    return $this->polylineConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SegmentationConfig
   */
  public function setSegmentationConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SegmentationConfig $segmentationConfig)
  {
    $this->segmentationConfig = $segmentationConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1SegmentationConfig
   */
  public function getSegmentationConfig()
  {
    return $this->segmentationConfig;
  }
}
