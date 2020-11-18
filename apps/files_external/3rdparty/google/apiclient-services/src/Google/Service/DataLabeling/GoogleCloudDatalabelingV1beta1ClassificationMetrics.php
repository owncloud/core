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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ClassificationMetrics extends Google_Model
{
  protected $confusionMatrixType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ConfusionMatrix';
  protected $confusionMatrixDataType = '';
  protected $prCurveType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PrCurve';
  protected $prCurveDataType = '';

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ConfusionMatrix
   */
  public function setConfusionMatrix(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ConfusionMatrix $confusionMatrix)
  {
    $this->confusionMatrix = $confusionMatrix;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ConfusionMatrix
   */
  public function getConfusionMatrix()
  {
    return $this->confusionMatrix;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PrCurve
   */
  public function setPrCurve(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PrCurve $prCurve)
  {
    $this->prCurve = $prCurve;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PrCurve
   */
  public function getPrCurve()
  {
    return $this->prCurve;
  }
}
