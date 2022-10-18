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

class QualityViewsExtractionClusterInfo extends \Google\Collection
{
  protected $collection_key = 'subCluster';
  /**
   * @var string
   */
  public $clusterId;
  /**
   * @var float
   */
  public $clusterSetScore;
  /**
   * @var string[]
   */
  public $clusterSiblingMid;
  /**
   * @var float
   */
  public $score;
  protected $subClusterType = QualityViewsExtractionClusterInfo::class;
  protected $subClusterDataType = 'array';

  /**
   * @param string
   */
  public function setClusterId($clusterId)
  {
    $this->clusterId = $clusterId;
  }
  /**
   * @return string
   */
  public function getClusterId()
  {
    return $this->clusterId;
  }
  /**
   * @param float
   */
  public function setClusterSetScore($clusterSetScore)
  {
    $this->clusterSetScore = $clusterSetScore;
  }
  /**
   * @return float
   */
  public function getClusterSetScore()
  {
    return $this->clusterSetScore;
  }
  /**
   * @param string[]
   */
  public function setClusterSiblingMid($clusterSiblingMid)
  {
    $this->clusterSiblingMid = $clusterSiblingMid;
  }
  /**
   * @return string[]
   */
  public function getClusterSiblingMid()
  {
    return $this->clusterSiblingMid;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param QualityViewsExtractionClusterInfo[]
   */
  public function setSubCluster($subCluster)
  {
    $this->subCluster = $subCluster;
  }
  /**
   * @return QualityViewsExtractionClusterInfo[]
   */
  public function getSubCluster()
  {
    return $this->subCluster;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityViewsExtractionClusterInfo::class, 'Google_Service_Contentwarehouse_QualityViewsExtractionClusterInfo');
