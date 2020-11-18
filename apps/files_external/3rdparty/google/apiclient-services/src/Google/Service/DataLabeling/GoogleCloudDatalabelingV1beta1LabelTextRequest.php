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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelTextRequest extends Google_Model
{
  protected $basicConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig';
  protected $basicConfigDataType = '';
  public $feature;
  protected $textClassificationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationConfig';
  protected $textClassificationConfigDataType = '';
  protected $textEntityExtractionConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig';
  protected $textEntityExtractionConfigDataType = '';

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
  public function setFeature($feature)
  {
    $this->feature = $feature;
  }
  public function getFeature()
  {
    return $this->feature;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationConfig
   */
  public function setTextClassificationConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationConfig $textClassificationConfig)
  {
    $this->textClassificationConfig = $textClassificationConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationConfig
   */
  public function getTextClassificationConfig()
  {
    return $this->textClassificationConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig
   */
  public function setTextEntityExtractionConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig $textEntityExtractionConfig)
  {
    $this->textEntityExtractionConfig = $textEntityExtractionConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextEntityExtractionConfig
   */
  public function getTextEntityExtractionConfig()
  {
    return $this->textEntityExtractionConfig;
  }
}
