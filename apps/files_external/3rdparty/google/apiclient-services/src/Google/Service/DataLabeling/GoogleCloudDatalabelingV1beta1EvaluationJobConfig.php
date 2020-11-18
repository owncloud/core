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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJobConfig extends Google_Model
{
  public $bigqueryImportKeys;
  protected $boundingPolyConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1BoundingPolyConfig';
  protected $boundingPolyConfigDataType = '';
  protected $evaluationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationConfig';
  protected $evaluationConfigDataType = '';
  protected $evaluationJobAlertConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJobAlertConfig';
  protected $evaluationJobAlertConfigDataType = '';
  public $exampleCount;
  public $exampleSamplePercentage;
  protected $humanAnnotationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig';
  protected $humanAnnotationConfigDataType = '';
  protected $imageClassificationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImageClassificationConfig';
  protected $imageClassificationConfigDataType = '';
  protected $inputConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1InputConfig';
  protected $inputConfigDataType = '';
  protected $textClassificationConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextClassificationConfig';
  protected $textClassificationConfigDataType = '';

  public function setBigqueryImportKeys($bigqueryImportKeys)
  {
    $this->bigqueryImportKeys = $bigqueryImportKeys;
  }
  public function getBigqueryImportKeys()
  {
    return $this->bigqueryImportKeys;
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
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationConfig
   */
  public function setEvaluationConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationConfig $evaluationConfig)
  {
    $this->evaluationConfig = $evaluationConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationConfig
   */
  public function getEvaluationConfig()
  {
    return $this->evaluationConfig;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJobAlertConfig
   */
  public function setEvaluationJobAlertConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJobAlertConfig $evaluationJobAlertConfig)
  {
    $this->evaluationJobAlertConfig = $evaluationJobAlertConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJobAlertConfig
   */
  public function getEvaluationJobAlertConfig()
  {
    return $this->evaluationJobAlertConfig;
  }
  public function setExampleCount($exampleCount)
  {
    $this->exampleCount = $exampleCount;
  }
  public function getExampleCount()
  {
    return $this->exampleCount;
  }
  public function setExampleSamplePercentage($exampleSamplePercentage)
  {
    $this->exampleSamplePercentage = $exampleSamplePercentage;
  }
  public function getExampleSamplePercentage()
  {
    return $this->exampleSamplePercentage;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function setHumanAnnotationConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig $humanAnnotationConfig)
  {
    $this->humanAnnotationConfig = $humanAnnotationConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function getHumanAnnotationConfig()
  {
    return $this->humanAnnotationConfig;
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
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1InputConfig
   */
  public function setInputConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1InputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1InputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
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
}
