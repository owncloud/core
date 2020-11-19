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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationMetrics extends Google_Model
{
  protected $classificationMetricsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ClassificationMetrics';
  protected $classificationMetricsDataType = '';
  protected $objectDetectionMetricsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectDetectionMetrics';
  protected $objectDetectionMetricsDataType = '';

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ClassificationMetrics
   */
  public function setClassificationMetrics(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ClassificationMetrics $classificationMetrics)
  {
    $this->classificationMetrics = $classificationMetrics;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ClassificationMetrics
   */
  public function getClassificationMetrics()
  {
    return $this->classificationMetrics;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectDetectionMetrics
   */
  public function setObjectDetectionMetrics(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectDetectionMetrics $objectDetectionMetrics)
  {
    $this->objectDetectionMetrics = $objectDetectionMetrics;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ObjectDetectionMetrics
   */
  public function getObjectDetectionMetrics()
  {
    return $this->objectDetectionMetrics;
  }
}
