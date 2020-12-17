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

class Google_Service_Bigquery_BinaryClassificationMetrics extends Google_Collection
{
  protected $collection_key = 'binaryConfusionMatrixList';
  protected $aggregateClassificationMetricsType = 'Google_Service_Bigquery_AggregateClassificationMetrics';
  protected $aggregateClassificationMetricsDataType = '';
  protected $binaryConfusionMatrixListType = 'Google_Service_Bigquery_BinaryConfusionMatrix';
  protected $binaryConfusionMatrixListDataType = 'array';
  public $negativeLabel;
  public $positiveLabel;

  /**
   * @param Google_Service_Bigquery_AggregateClassificationMetrics
   */
  public function setAggregateClassificationMetrics(Google_Service_Bigquery_AggregateClassificationMetrics $aggregateClassificationMetrics)
  {
    $this->aggregateClassificationMetrics = $aggregateClassificationMetrics;
  }
  /**
   * @return Google_Service_Bigquery_AggregateClassificationMetrics
   */
  public function getAggregateClassificationMetrics()
  {
    return $this->aggregateClassificationMetrics;
  }
  /**
   * @param Google_Service_Bigquery_BinaryConfusionMatrix[]
   */
  public function setBinaryConfusionMatrixList($binaryConfusionMatrixList)
  {
    $this->binaryConfusionMatrixList = $binaryConfusionMatrixList;
  }
  /**
   * @return Google_Service_Bigquery_BinaryConfusionMatrix[]
   */
  public function getBinaryConfusionMatrixList()
  {
    return $this->binaryConfusionMatrixList;
  }
  public function setNegativeLabel($negativeLabel)
  {
    $this->negativeLabel = $negativeLabel;
  }
  public function getNegativeLabel()
  {
    return $this->negativeLabel;
  }
  public function setPositiveLabel($positiveLabel)
  {
    $this->positiveLabel = $positiveLabel;
  }
  public function getPositiveLabel()
  {
    return $this->positiveLabel;
  }
}
