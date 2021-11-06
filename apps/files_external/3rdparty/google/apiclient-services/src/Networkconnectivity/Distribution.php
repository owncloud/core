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

namespace Google\Service\Networkconnectivity;

class Distribution extends \Google\Collection
{
  protected $collection_key = 'exemplars';
  public $bucketCounts;
  public $count;
  protected $exemplarsType = Exemplar::class;
  protected $exemplarsDataType = 'array';
  protected $explicitBucketsType = ExplicitBuckets::class;
  protected $explicitBucketsDataType = '';
  protected $exponentialBucketsType = ExponentialBuckets::class;
  protected $exponentialBucketsDataType = '';
  protected $linearBucketsType = LinearBuckets::class;
  protected $linearBucketsDataType = '';
  public $maximum;
  public $mean;
  public $minimum;
  public $sumOfSquaredDeviation;

  public function setBucketCounts($bucketCounts)
  {
    $this->bucketCounts = $bucketCounts;
  }
  public function getBucketCounts()
  {
    return $this->bucketCounts;
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
   * @param Exemplar[]
   */
  public function setExemplars($exemplars)
  {
    $this->exemplars = $exemplars;
  }
  /**
   * @return Exemplar[]
   */
  public function getExemplars()
  {
    return $this->exemplars;
  }
  /**
   * @param ExplicitBuckets
   */
  public function setExplicitBuckets(ExplicitBuckets $explicitBuckets)
  {
    $this->explicitBuckets = $explicitBuckets;
  }
  /**
   * @return ExplicitBuckets
   */
  public function getExplicitBuckets()
  {
    return $this->explicitBuckets;
  }
  /**
   * @param ExponentialBuckets
   */
  public function setExponentialBuckets(ExponentialBuckets $exponentialBuckets)
  {
    $this->exponentialBuckets = $exponentialBuckets;
  }
  /**
   * @return ExponentialBuckets
   */
  public function getExponentialBuckets()
  {
    return $this->exponentialBuckets;
  }
  /**
   * @param LinearBuckets
   */
  public function setLinearBuckets(LinearBuckets $linearBuckets)
  {
    $this->linearBuckets = $linearBuckets;
  }
  /**
   * @return LinearBuckets
   */
  public function getLinearBuckets()
  {
    return $this->linearBuckets;
  }
  public function setMaximum($maximum)
  {
    $this->maximum = $maximum;
  }
  public function getMaximum()
  {
    return $this->maximum;
  }
  public function setMean($mean)
  {
    $this->mean = $mean;
  }
  public function getMean()
  {
    return $this->mean;
  }
  public function setMinimum($minimum)
  {
    $this->minimum = $minimum;
  }
  public function getMinimum()
  {
    return $this->minimum;
  }
  public function setSumOfSquaredDeviation($sumOfSquaredDeviation)
  {
    $this->sumOfSquaredDeviation = $sumOfSquaredDeviation;
  }
  public function getSumOfSquaredDeviation()
  {
    return $this->sumOfSquaredDeviation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Distribution::class, 'Google_Service_Networkconnectivity_Distribution');
