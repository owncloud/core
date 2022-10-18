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

class NlpSemanticParsingQRefAnnotationSubCluster extends \Google\Collection
{
  protected $collection_key = 'clusterSiblingMid';
  /**
   * @var string
   */
  public $clusterId;
  public $clusterSetScore;
  /**
   * @var string[]
   */
  public $clusterSiblingMid;

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
  public function setClusterSetScore($clusterSetScore)
  {
    $this->clusterSetScore = $clusterSetScore;
  }
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingQRefAnnotationSubCluster::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingQRefAnnotationSubCluster');
