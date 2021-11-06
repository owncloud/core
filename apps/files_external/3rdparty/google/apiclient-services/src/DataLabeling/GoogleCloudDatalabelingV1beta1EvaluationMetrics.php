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

class GoogleCloudDatalabelingV1beta1EvaluationMetrics extends \Google\Model
{
  protected $classificationMetricsType = GoogleCloudDatalabelingV1beta1ClassificationMetrics::class;
  protected $classificationMetricsDataType = '';
  protected $objectDetectionMetricsType = GoogleCloudDatalabelingV1beta1ObjectDetectionMetrics::class;
  protected $objectDetectionMetricsDataType = '';

  /**
   * @param GoogleCloudDatalabelingV1beta1ClassificationMetrics
   */
  public function setClassificationMetrics(GoogleCloudDatalabelingV1beta1ClassificationMetrics $classificationMetrics)
  {
    $this->classificationMetrics = $classificationMetrics;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1ClassificationMetrics
   */
  public function getClassificationMetrics()
  {
    return $this->classificationMetrics;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1ObjectDetectionMetrics
   */
  public function setObjectDetectionMetrics(GoogleCloudDatalabelingV1beta1ObjectDetectionMetrics $objectDetectionMetrics)
  {
    $this->objectDetectionMetrics = $objectDetectionMetrics;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1ObjectDetectionMetrics
   */
  public function getObjectDetectionMetrics()
  {
    return $this->objectDetectionMetrics;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1EvaluationMetrics::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationMetrics');
