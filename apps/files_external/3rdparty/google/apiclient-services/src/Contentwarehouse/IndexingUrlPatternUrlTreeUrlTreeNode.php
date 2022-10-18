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

class IndexingUrlPatternUrlTreeUrlTreeNode extends \Google\Model
{
  /**
   * @var int
   */
  public $indexOfSubTreeWithSplittingFeature;
  /**
   * @var int
   */
  public $indexOfSubTreeWithoutSplittingFeature;
  /**
   * @var int
   */
  public $parent;
  /**
   * @var string
   */
  public $pathFromRoot;
  /**
   * @var string
   */
  public $patternId;
  protected $payloadType = Proto2BridgeMessageSet::class;
  protected $payloadDataType = '';
  protected $splittingFeatureType = IndexingUrlPatternUrlTreeUrlFeature::class;
  protected $splittingFeatureDataType = '';
  public $splittingFeatureScore;

  /**
   * @param int
   */
  public function setIndexOfSubTreeWithSplittingFeature($indexOfSubTreeWithSplittingFeature)
  {
    $this->indexOfSubTreeWithSplittingFeature = $indexOfSubTreeWithSplittingFeature;
  }
  /**
   * @return int
   */
  public function getIndexOfSubTreeWithSplittingFeature()
  {
    return $this->indexOfSubTreeWithSplittingFeature;
  }
  /**
   * @param int
   */
  public function setIndexOfSubTreeWithoutSplittingFeature($indexOfSubTreeWithoutSplittingFeature)
  {
    $this->indexOfSubTreeWithoutSplittingFeature = $indexOfSubTreeWithoutSplittingFeature;
  }
  /**
   * @return int
   */
  public function getIndexOfSubTreeWithoutSplittingFeature()
  {
    return $this->indexOfSubTreeWithoutSplittingFeature;
  }
  /**
   * @param int
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return int
   */
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param string
   */
  public function setPathFromRoot($pathFromRoot)
  {
    $this->pathFromRoot = $pathFromRoot;
  }
  /**
   * @return string
   */
  public function getPathFromRoot()
  {
    return $this->pathFromRoot;
  }
  /**
   * @param string
   */
  public function setPatternId($patternId)
  {
    $this->patternId = $patternId;
  }
  /**
   * @return string
   */
  public function getPatternId()
  {
    return $this->patternId;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setPayload(Proto2BridgeMessageSet $payload)
  {
    $this->payload = $payload;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getPayload()
  {
    return $this->payload;
  }
  /**
   * @param IndexingUrlPatternUrlTreeUrlFeature
   */
  public function setSplittingFeature(IndexingUrlPatternUrlTreeUrlFeature $splittingFeature)
  {
    $this->splittingFeature = $splittingFeature;
  }
  /**
   * @return IndexingUrlPatternUrlTreeUrlFeature
   */
  public function getSplittingFeature()
  {
    return $this->splittingFeature;
  }
  public function setSplittingFeatureScore($splittingFeatureScore)
  {
    $this->splittingFeatureScore = $splittingFeatureScore;
  }
  public function getSplittingFeatureScore()
  {
    return $this->splittingFeatureScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingUrlPatternUrlTreeUrlTreeNode::class, 'Google_Service_Contentwarehouse_IndexingUrlPatternUrlTreeUrlTreeNode');
