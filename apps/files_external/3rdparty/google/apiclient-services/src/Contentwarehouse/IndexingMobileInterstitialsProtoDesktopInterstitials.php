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

class IndexingMobileInterstitialsProtoDesktopInterstitials extends \Google\Collection
{
  protected $collection_key = 'details';
  protected $detailsType = IndexingMobileInterstitialsProtoDesktopInterstitialsDetails::class;
  protected $detailsDataType = 'array';
  /**
   * @var string
   */
  public $pipelineEpoch;
  /**
   * @var string
   */
  public $pipelinePattern;
  protected $urlTreeType = IndexingUrlPatternUrlTreeUrlTree::class;
  protected $urlTreeDataType = '';
  /**
   * @var bool
   */
  public $violatesDesktopInterstitialPolicy;

  /**
   * @param IndexingMobileInterstitialsProtoDesktopInterstitialsDetails[]
   */
  public function setDetails($details)
  {
    $this->details = $details;
  }
  /**
   * @return IndexingMobileInterstitialsProtoDesktopInterstitialsDetails[]
   */
  public function getDetails()
  {
    return $this->details;
  }
  /**
   * @param string
   */
  public function setPipelineEpoch($pipelineEpoch)
  {
    $this->pipelineEpoch = $pipelineEpoch;
  }
  /**
   * @return string
   */
  public function getPipelineEpoch()
  {
    return $this->pipelineEpoch;
  }
  /**
   * @param string
   */
  public function setPipelinePattern($pipelinePattern)
  {
    $this->pipelinePattern = $pipelinePattern;
  }
  /**
   * @return string
   */
  public function getPipelinePattern()
  {
    return $this->pipelinePattern;
  }
  /**
   * @param IndexingUrlPatternUrlTreeUrlTree
   */
  public function setUrlTree(IndexingUrlPatternUrlTreeUrlTree $urlTree)
  {
    $this->urlTree = $urlTree;
  }
  /**
   * @return IndexingUrlPatternUrlTreeUrlTree
   */
  public function getUrlTree()
  {
    return $this->urlTree;
  }
  /**
   * @param bool
   */
  public function setViolatesDesktopInterstitialPolicy($violatesDesktopInterstitialPolicy)
  {
    $this->violatesDesktopInterstitialPolicy = $violatesDesktopInterstitialPolicy;
  }
  /**
   * @return bool
   */
  public function getViolatesDesktopInterstitialPolicy()
  {
    return $this->violatesDesktopInterstitialPolicy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingMobileInterstitialsProtoDesktopInterstitials::class, 'Google_Service_Contentwarehouse_IndexingMobileInterstitialsProtoDesktopInterstitials');
