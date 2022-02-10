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

class Cluster extends \Google\Collection
{
  protected $collection_key = 'featureValues';
  /**
   * @var string
   */
  public $centroidId;
  /**
   * @var string
   */
  public $count;
  protected $featureValuesType = FeatureValue::class;
  protected $featureValuesDataType = 'array';

  /**
   * @param string
   */
  public function setCentroidId($centroidId)
  {
    $this->centroidId = $centroidId;
  }
  /**
   * @return string
   */
  public function getCentroidId()
  {
    return $this->centroidId;
  }
  /**
   * @param string
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return string
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param FeatureValue[]
   */
  public function setFeatureValues($featureValues)
  {
    $this->featureValues = $featureValues;
  }
  /**
   * @return FeatureValue[]
   */
  public function getFeatureValues()
  {
    return $this->featureValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Cluster::class, 'Google_Service_Bigquery_Cluster');
