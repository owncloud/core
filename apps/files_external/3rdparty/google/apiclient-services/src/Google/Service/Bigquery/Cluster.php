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

class Google_Service_Bigquery_Cluster extends Google_Collection
{
  protected $collection_key = 'featureValues';
  public $centroidId;
  public $count;
  protected $featureValuesType = 'Google_Service_Bigquery_FeatureValue';
  protected $featureValuesDataType = 'array';

  public function setCentroidId($centroidId)
  {
    $this->centroidId = $centroidId;
  }
  public function getCentroidId()
  {
    return $this->centroidId;
  }
  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param Google_Service_Bigquery_FeatureValue
   */
  public function setFeatureValues($featureValues)
  {
    $this->featureValues = $featureValues;
  }
  /**
   * @return Google_Service_Bigquery_FeatureValue
   */
  public function getFeatureValues()
  {
    return $this->featureValues;
  }
}
