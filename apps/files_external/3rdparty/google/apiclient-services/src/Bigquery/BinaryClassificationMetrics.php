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

namespace Google\Service\Bigquery;

class BinaryClassificationMetrics extends \Google\Collection
{
  protected $collection_key = 'binaryConfusionMatrixList';
  protected $aggregateClassificationMetricsType = AggregateClassificationMetrics::class;
  protected $aggregateClassificationMetricsDataType = '';
  protected $binaryConfusionMatrixListType = BinaryConfusionMatrix::class;
  protected $binaryConfusionMatrixListDataType = 'array';
  /**
   * @var string
   */
  public $negativeLabel;
  /**
   * @var string
   */
  public $positiveLabel;

  /**
   * @param AggregateClassificationMetrics
   */
  public function setAggregateClassificationMetrics(AggregateClassificationMetrics $aggregateClassificationMetrics)
  {
    $this->aggregateClassificationMetrics = $aggregateClassificationMetrics;
  }
  /**
   * @return AggregateClassificationMetrics
   */
  public function getAggregateClassificationMetrics()
  {
    return $this->aggregateClassificationMetrics;
  }
  /**
   * @param BinaryConfusionMatrix[]
   */
  public function setBinaryConfusionMatrixList($binaryConfusionMatrixList)
  {
    $this->binaryConfusionMatrixList = $binaryConfusionMatrixList;
  }
  /**
   * @return BinaryConfusionMatrix[]
   */
  public function getBinaryConfusionMatrixList()
  {
    return $this->binaryConfusionMatrixList;
  }
  /**
   * @param string
   */
  public function setNegativeLabel($negativeLabel)
  {
    $this->negativeLabel = $negativeLabel;
  }
  /**
   * @return string
   */
  public function getNegativeLabel()
  {
    return $this->negativeLabel;
  }
  /**
   * @param string
   */
  public function setPositiveLabel($positiveLabel)
  {
    $this->positiveLabel = $positiveLabel;
  }
  /**
   * @return string
   */
  public function getPositiveLabel()
  {
    return $this->positiveLabel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BinaryClassificationMetrics::class, 'Google_Service_Bigquery_BinaryClassificationMetrics');
