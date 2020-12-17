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

class Google_Service_Bigquery_MultiClassClassificationMetrics extends Google_Collection
{
  protected $collection_key = 'confusionMatrixList';
  protected $aggregateClassificationMetricsType = 'Google_Service_Bigquery_AggregateClassificationMetrics';
  protected $aggregateClassificationMetricsDataType = '';
  protected $confusionMatrixListType = 'Google_Service_Bigquery_ConfusionMatrix';
  protected $confusionMatrixListDataType = 'array';

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
   * @param Google_Service_Bigquery_ConfusionMatrix[]
   */
  public function setConfusionMatrixList($confusionMatrixList)
  {
    $this->confusionMatrixList = $confusionMatrixList;
  }
  /**
   * @return Google_Service_Bigquery_ConfusionMatrix[]
   */
  public function getConfusionMatrixList()
  {
    return $this->confusionMatrixList;
  }
}
