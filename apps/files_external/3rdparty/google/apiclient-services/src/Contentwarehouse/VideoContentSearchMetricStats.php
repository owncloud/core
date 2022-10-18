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

namespace Google\Service\Contentwarehouse;

class VideoContentSearchMetricStats extends \Google\Model
{
  /**
   * @var float
   */
  public $max;
  /**
   * @var float
   */
  public $mean;
  /**
   * @var float
   */
  public $median;
  /**
   * @var float
   */
  public $min;
  /**
   * @var float
   */
  public $stddev;
  /**
   * @var float
   */
  public $sum;

  /**
   * @param float
   */
  public function setMax($max)
  {
    $this->max = $max;
  }
  /**
   * @return float
   */
  public function getMax()
  {
    return $this->max;
  }
  /**
   * @param float
   */
  public function setMean($mean)
  {
    $this->mean = $mean;
  }
  /**
   * @return float
   */
  public function getMean()
  {
    return $this->mean;
  }
  /**
   * @param float
   */
  public function setMedian($median)
  {
    $this->median = $median;
  }
  /**
   * @return float
   */
  public function getMedian()
  {
    return $this->median;
  }
  /**
   * @param float
   */
  public function setMin($min)
  {
    $this->min = $min;
  }
  /**
   * @return float
   */
  public function getMin()
  {
    return $this->min;
  }
  /**
   * @param float
   */
  public function setStddev($stddev)
  {
    $this->stddev = $stddev;
  }
  /**
   * @return float
   */
  public function getStddev()
  {
    return $this->stddev;
  }
  /**
   * @param float
   */
  public function setSum($sum)
  {
    $this->sum = $sum;
  }
  /**
   * @return float
   */
  public function getSum()
  {
    return $this->sum;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchMetricStats::class, 'Google_Service_Contentwarehouse_VideoContentSearchMetricStats');
