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

namespace Google\Service\ToolResults;

class GraphicsStats extends \Google\Collection
{
  protected $collection_key = 'buckets';
  protected $bucketsType = GraphicsStatsBucket::class;
  protected $bucketsDataType = 'array';
  /**
   * @var string
   */
  public $highInputLatencyCount;
  /**
   * @var string
   */
  public $jankyFrames;
  /**
   * @var string
   */
  public $missedVsyncCount;
  /**
   * @var string
   */
  public $p50Millis;
  /**
   * @var string
   */
  public $p90Millis;
  /**
   * @var string
   */
  public $p95Millis;
  /**
   * @var string
   */
  public $p99Millis;
  /**
   * @var string
   */
  public $slowBitmapUploadCount;
  /**
   * @var string
   */
  public $slowDrawCount;
  /**
   * @var string
   */
  public $slowUiThreadCount;
  /**
   * @var string
   */
  public $totalFrames;

  /**
   * @param GraphicsStatsBucket[]
   */
  public function setBuckets($buckets)
  {
    $this->buckets = $buckets;
  }
  /**
   * @return GraphicsStatsBucket[]
   */
  public function getBuckets()
  {
    return $this->buckets;
  }
  /**
   * @param string
   */
  public function setHighInputLatencyCount($highInputLatencyCount)
  {
    $this->highInputLatencyCount = $highInputLatencyCount;
  }
  /**
   * @return string
   */
  public function getHighInputLatencyCount()
  {
    return $this->highInputLatencyCount;
  }
  /**
   * @param string
   */
  public function setJankyFrames($jankyFrames)
  {
    $this->jankyFrames = $jankyFrames;
  }
  /**
   * @return string
   */
  public function getJankyFrames()
  {
    return $this->jankyFrames;
  }
  /**
   * @param string
   */
  public function setMissedVsyncCount($missedVsyncCount)
  {
    $this->missedVsyncCount = $missedVsyncCount;
  }
  /**
   * @return string
   */
  public function getMissedVsyncCount()
  {
    return $this->missedVsyncCount;
  }
  /**
   * @param string
   */
  public function setP50Millis($p50Millis)
  {
    $this->p50Millis = $p50Millis;
  }
  /**
   * @return string
   */
  public function getP50Millis()
  {
    return $this->p50Millis;
  }
  /**
   * @param string
   */
  public function setP90Millis($p90Millis)
  {
    $this->p90Millis = $p90Millis;
  }
  /**
   * @return string
   */
  public function getP90Millis()
  {
    return $this->p90Millis;
  }
  /**
   * @param string
   */
  public function setP95Millis($p95Millis)
  {
    $this->p95Millis = $p95Millis;
  }
  /**
   * @return string
   */
  public function getP95Millis()
  {
    return $this->p95Millis;
  }
  /**
   * @param string
   */
  public function setP99Millis($p99Millis)
  {
    $this->p99Millis = $p99Millis;
  }
  /**
   * @return string
   */
  public function getP99Millis()
  {
    return $this->p99Millis;
  }
  /**
   * @param string
   */
  public function setSlowBitmapUploadCount($slowBitmapUploadCount)
  {
    $this->slowBitmapUploadCount = $slowBitmapUploadCount;
  }
  /**
   * @return string
   */
  public function getSlowBitmapUploadCount()
  {
    return $this->slowBitmapUploadCount;
  }
  /**
   * @param string
   */
  public function setSlowDrawCount($slowDrawCount)
  {
    $this->slowDrawCount = $slowDrawCount;
  }
  /**
   * @return string
   */
  public function getSlowDrawCount()
  {
    return $this->slowDrawCount;
  }
  /**
   * @param string
   */
  public function setSlowUiThreadCount($slowUiThreadCount)
  {
    $this->slowUiThreadCount = $slowUiThreadCount;
  }
  /**
   * @return string
   */
  public function getSlowUiThreadCount()
  {
    return $this->slowUiThreadCount;
  }
  /**
   * @param string
   */
  public function setTotalFrames($totalFrames)
  {
    $this->totalFrames = $totalFrames;
  }
  /**
   * @return string
   */
  public function getTotalFrames()
  {
    return $this->totalFrames;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GraphicsStats::class, 'Google_Service_ToolResults_GraphicsStats');
