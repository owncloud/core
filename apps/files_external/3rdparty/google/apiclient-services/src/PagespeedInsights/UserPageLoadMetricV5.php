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

namespace Google\Service\PagespeedInsights;

class UserPageLoadMetricV5 extends \Google\Collection
{
  protected $collection_key = 'distributions';
  /**
   * @var string
   */
  public $category;
  protected $distributionsType = Bucket::class;
  protected $distributionsDataType = 'array';
  /**
   * @var string
   */
  public $formFactor;
  /**
   * @var int
   */
  public $median;
  /**
   * @var string
   */
  public $metricId;
  /**
   * @var int
   */
  public $percentile;

  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param Bucket[]
   */
  public function setDistributions($distributions)
  {
    $this->distributions = $distributions;
  }
  /**
   * @return Bucket[]
   */
  public function getDistributions()
  {
    return $this->distributions;
  }
  /**
   * @param string
   */
  public function setFormFactor($formFactor)
  {
    $this->formFactor = $formFactor;
  }
  /**
   * @return string
   */
  public function getFormFactor()
  {
    return $this->formFactor;
  }
  /**
   * @param int
   */
  public function setMedian($median)
  {
    $this->median = $median;
  }
  /**
   * @return int
   */
  public function getMedian()
  {
    return $this->median;
  }
  /**
   * @param string
   */
  public function setMetricId($metricId)
  {
    $this->metricId = $metricId;
  }
  /**
   * @return string
   */
  public function getMetricId()
  {
    return $this->metricId;
  }
  /**
   * @param int
   */
  public function setPercentile($percentile)
  {
    $this->percentile = $percentile;
  }
  /**
   * @return int
   */
  public function getPercentile()
  {
    return $this->percentile;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserPageLoadMetricV5::class, 'Google_Service_PagespeedInsights_UserPageLoadMetricV5');
