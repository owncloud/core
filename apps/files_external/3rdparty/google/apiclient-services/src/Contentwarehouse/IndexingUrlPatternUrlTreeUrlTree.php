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

class IndexingUrlPatternUrlTreeUrlTree extends \Google\Collection
{
  protected $collection_key = 'node';
  protected $bigBranchType = IndexingUrlPatternUrlTreeBigTreeBranch::class;
  protected $bigBranchDataType = 'array';
  protected $debugInfoType = IndexingUrlPatternUrlTreeUrlTreeDebugInfo::class;
  protected $debugInfoDataType = '';
  protected $keyType = IndexingUrlPatternUrlTreeUrlTreeKey::class;
  protected $keyDataType = '';
  protected $nodeType = IndexingUrlPatternUrlTreeUrlTreeNode::class;
  protected $nodeDataType = 'array';
  /**
   * @var string
   */
  public $retrievalTimestamp;
  /**
   * @var string
   */
  public $site;
  /**
   * @var int
   */
  public $timestamp;
  protected $treeInfoType = Proto2BridgeMessageSet::class;
  protected $treeInfoDataType = '';

  /**
   * @param IndexingUrlPatternUrlTreeBigTreeBranch[]
   */
  public function setBigBranch($bigBranch)
  {
    $this->bigBranch = $bigBranch;
  }
  /**
   * @return IndexingUrlPatternUrlTreeBigTreeBranch[]
   */
  public function getBigBranch()
  {
    return $this->bigBranch;
  }
  /**
   * @param IndexingUrlPatternUrlTreeUrlTreeDebugInfo
   */
  public function setDebugInfo(IndexingUrlPatternUrlTreeUrlTreeDebugInfo $debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return IndexingUrlPatternUrlTreeUrlTreeDebugInfo
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  /**
   * @param IndexingUrlPatternUrlTreeUrlTreeKey
   */
  public function setKey(IndexingUrlPatternUrlTreeUrlTreeKey $key)
  {
    $this->key = $key;
  }
  /**
   * @return IndexingUrlPatternUrlTreeUrlTreeKey
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param IndexingUrlPatternUrlTreeUrlTreeNode[]
   */
  public function setNode($node)
  {
    $this->node = $node;
  }
  /**
   * @return IndexingUrlPatternUrlTreeUrlTreeNode[]
   */
  public function getNode()
  {
    return $this->node;
  }
  /**
   * @param string
   */
  public function setRetrievalTimestamp($retrievalTimestamp)
  {
    $this->retrievalTimestamp = $retrievalTimestamp;
  }
  /**
   * @return string
   */
  public function getRetrievalTimestamp()
  {
    return $this->retrievalTimestamp;
  }
  /**
   * @param string
   */
  public function setSite($site)
  {
    $this->site = $site;
  }
  /**
   * @return string
   */
  public function getSite()
  {
    return $this->site;
  }
  /**
   * @param int
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return int
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setTreeInfo(Proto2BridgeMessageSet $treeInfo)
  {
    $this->treeInfo = $treeInfo;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getTreeInfo()
  {
    return $this->treeInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingUrlPatternUrlTreeUrlTree::class, 'Google_Service_Contentwarehouse_IndexingUrlPatternUrlTreeUrlTree');
