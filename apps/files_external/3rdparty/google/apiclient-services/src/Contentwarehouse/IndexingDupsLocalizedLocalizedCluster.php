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

class IndexingDupsLocalizedLocalizedCluster extends \Google\Collection
{
  protected $collection_key = 'warningMessage';
  /**
   * @var bool
   */
  public $boostSourceBlocker;
  protected $clusterType = IndexingDupsLocalizedLocalizedClusterCluster::class;
  protected $clusterDataType = 'array';
  protected $deprecatedHreflangInfoType = IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfo::class;
  protected $deprecatedHreflangInfoDataType = '';
  protected $deprecatedOutlinksInfoType = IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfo::class;
  protected $deprecatedOutlinksInfoDataType = '';
  /**
   * @var string
   */
  public $documentLanguage;
  protected $hreflangTargetLinkType = IndexingDupsLocalizedLocalizedClusterTargetLinkSets::class;
  protected $hreflangTargetLinkDataType = '';
  protected $inbodyTargetLinkType = IndexingDupsLocalizedLocalizedClusterTargetLinkSets::class;
  protected $inbodyTargetLinkDataType = '';
  protected $outlinksTargetLinkType = IndexingDupsLocalizedLocalizedClusterTargetLinkSets::class;
  protected $outlinksTargetLinkDataType = '';
  /**
   * @var string[]
   */
  public $sitedupRuleId;
  /**
   * @var string[]
   */
  public $warningMessage;

  /**
   * @param bool
   */
  public function setBoostSourceBlocker($boostSourceBlocker)
  {
    $this->boostSourceBlocker = $boostSourceBlocker;
  }
  /**
   * @return bool
   */
  public function getBoostSourceBlocker()
  {
    return $this->boostSourceBlocker;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedClusterCluster[]
   */
  public function setCluster($cluster)
  {
    $this->cluster = $cluster;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterCluster[]
   */
  public function getCluster()
  {
    return $this->cluster;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfo
   */
  public function setDeprecatedHreflangInfo(IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfo $deprecatedHreflangInfo)
  {
    $this->deprecatedHreflangInfo = $deprecatedHreflangInfo;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfo
   */
  public function getDeprecatedHreflangInfo()
  {
    return $this->deprecatedHreflangInfo;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfo
   */
  public function setDeprecatedOutlinksInfo(IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfo $deprecatedOutlinksInfo)
  {
    $this->deprecatedOutlinksInfo = $deprecatedOutlinksInfo;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterLinkBasedClusterInfo
   */
  public function getDeprecatedOutlinksInfo()
  {
    return $this->deprecatedOutlinksInfo;
  }
  /**
   * @param string
   */
  public function setDocumentLanguage($documentLanguage)
  {
    $this->documentLanguage = $documentLanguage;
  }
  /**
   * @return string
   */
  public function getDocumentLanguage()
  {
    return $this->documentLanguage;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedClusterTargetLinkSets
   */
  public function setHreflangTargetLink(IndexingDupsLocalizedLocalizedClusterTargetLinkSets $hreflangTargetLink)
  {
    $this->hreflangTargetLink = $hreflangTargetLink;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterTargetLinkSets
   */
  public function getHreflangTargetLink()
  {
    return $this->hreflangTargetLink;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedClusterTargetLinkSets
   */
  public function setInbodyTargetLink(IndexingDupsLocalizedLocalizedClusterTargetLinkSets $inbodyTargetLink)
  {
    $this->inbodyTargetLink = $inbodyTargetLink;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterTargetLinkSets
   */
  public function getInbodyTargetLink()
  {
    return $this->inbodyTargetLink;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedClusterTargetLinkSets
   */
  public function setOutlinksTargetLink(IndexingDupsLocalizedLocalizedClusterTargetLinkSets $outlinksTargetLink)
  {
    $this->outlinksTargetLink = $outlinksTargetLink;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterTargetLinkSets
   */
  public function getOutlinksTargetLink()
  {
    return $this->outlinksTargetLink;
  }
  /**
   * @param string[]
   */
  public function setSitedupRuleId($sitedupRuleId)
  {
    $this->sitedupRuleId = $sitedupRuleId;
  }
  /**
   * @return string[]
   */
  public function getSitedupRuleId()
  {
    return $this->sitedupRuleId;
  }
  /**
   * @param string[]
   */
  public function setWarningMessage($warningMessage)
  {
    $this->warningMessage = $warningMessage;
  }
  /**
   * @return string[]
   */
  public function getWarningMessage()
  {
    return $this->warningMessage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDupsLocalizedLocalizedCluster::class, 'Google_Service_Contentwarehouse_IndexingDupsLocalizedLocalizedCluster');
