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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1PrCurve extends Google_Collection
{
  protected $collection_key = 'confidenceMetricsEntries';
  protected $annotationSpecType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec';
  protected $annotationSpecDataType = '';
  public $areaUnderCurve;
  protected $confidenceMetricsEntriesType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ConfidenceMetricsEntry';
  protected $confidenceMetricsEntriesDataType = 'array';
  public $meanAveragePrecision;

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec
   */
  public function setAnnotationSpec(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec $annotationSpec)
  {
    $this->annotationSpec = $annotationSpec;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec
   */
  public function getAnnotationSpec()
  {
    return $this->annotationSpec;
  }
  public function setAreaUnderCurve($areaUnderCurve)
  {
    $this->areaUnderCurve = $areaUnderCurve;
  }
  public function getAreaUnderCurve()
  {
    return $this->areaUnderCurve;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ConfidenceMetricsEntry
   */
  public function setConfidenceMetricsEntries($confidenceMetricsEntries)
  {
    $this->confidenceMetricsEntries = $confidenceMetricsEntries;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ConfidenceMetricsEntry
   */
  public function getConfidenceMetricsEntries()
  {
    return $this->confidenceMetricsEntries;
  }
  public function setMeanAveragePrecision($meanAveragePrecision)
  {
    $this->meanAveragePrecision = $meanAveragePrecision;
  }
  public function getMeanAveragePrecision()
  {
    return $this->meanAveragePrecision;
  }
}
