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

class QualityNsrNsrData extends \Google\Collection
{
  protected $collection_key = 'versionedData';
  /**
   * @var float
   */
  public $articleScore;
  /**
   * @var float
   */
  public $articleScoreV2;
  /**
   * @var int
   */
  public $clusterId;
  protected $clusterUpliftType = QualityNsrNsrDataClusterUplift::class;
  protected $clusterUpliftDataType = '';
  /**
   * @var float
   */
  public $clutterScore;
  /**
   * @var string
   */
  public $host;
  /**
   * @var bool
   */
  public $isCovidLocalAuthority;
  /**
   * @var bool
   */
  public $isElectionAuthority;
  /**
   * @var bool
   */
  public $isVideoFocusedSite;
  /**
   * @var float
   */
  public $localityScore;
  protected $metadataType = QualityNsrNsrDataMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var float
   */
  public $newNsr;
  /**
   * @var float
   */
  public $nsr;
  /**
   * @var float
   */
  public $nsrOverrideBid;
  /**
   * @var float
   */
  public $nsrVariance;
  /**
   * @var bool
   */
  public $nsrdataFromFallbackPatternKey;
  /**
   * @var string
   */
  public $secondarySiteChunk;
  /**
   * @var float
   */
  public $siteAutopilotScore;
  /**
   * @var string
   */
  public $siteChunk;
  /**
   * @var string
   */
  public $siteChunkSource;
  /**
   * @var float
   */
  public $siteLinkIn;
  /**
   * @var float
   */
  public $siteLinkOut;
  /**
   * @var float
   */
  public $sitePr;
  /**
   * @var float
   */
  public $siteQualityStddev;
  /**
   * @var float
   */
  public $spambrainLavcScore;
  /**
   * @var string
   */
  public $url;
  protected $versionedDataType = QualityNsrNSRVersionedData::class;
  protected $versionedDataDataType = 'array';
  /**
   * @var float
   */
  public $vlqNsr;

  /**
   * @param float
   */
  public function setArticleScore($articleScore)
  {
    $this->articleScore = $articleScore;
  }
  /**
   * @return float
   */
  public function getArticleScore()
  {
    return $this->articleScore;
  }
  /**
   * @param float
   */
  public function setArticleScoreV2($articleScoreV2)
  {
    $this->articleScoreV2 = $articleScoreV2;
  }
  /**
   * @return float
   */
  public function getArticleScoreV2()
  {
    return $this->articleScoreV2;
  }
  /**
   * @param int
   */
  public function setClusterId($clusterId)
  {
    $this->clusterId = $clusterId;
  }
  /**
   * @return int
   */
  public function getClusterId()
  {
    return $this->clusterId;
  }
  /**
   * @param QualityNsrNsrDataClusterUplift
   */
  public function setClusterUplift(QualityNsrNsrDataClusterUplift $clusterUplift)
  {
    $this->clusterUplift = $clusterUplift;
  }
  /**
   * @return QualityNsrNsrDataClusterUplift
   */
  public function getClusterUplift()
  {
    return $this->clusterUplift;
  }
  /**
   * @param float
   */
  public function setClutterScore($clutterScore)
  {
    $this->clutterScore = $clutterScore;
  }
  /**
   * @return float
   */
  public function getClutterScore()
  {
    return $this->clutterScore;
  }
  /**
   * @param string
   */
  public function setHost($host)
  {
    $this->host = $host;
  }
  /**
   * @return string
   */
  public function getHost()
  {
    return $this->host;
  }
  /**
   * @param bool
   */
  public function setIsCovidLocalAuthority($isCovidLocalAuthority)
  {
    $this->isCovidLocalAuthority = $isCovidLocalAuthority;
  }
  /**
   * @return bool
   */
  public function getIsCovidLocalAuthority()
  {
    return $this->isCovidLocalAuthority;
  }
  /**
   * @param bool
   */
  public function setIsElectionAuthority($isElectionAuthority)
  {
    $this->isElectionAuthority = $isElectionAuthority;
  }
  /**
   * @return bool
   */
  public function getIsElectionAuthority()
  {
    return $this->isElectionAuthority;
  }
  /**
   * @param bool
   */
  public function setIsVideoFocusedSite($isVideoFocusedSite)
  {
    $this->isVideoFocusedSite = $isVideoFocusedSite;
  }
  /**
   * @return bool
   */
  public function getIsVideoFocusedSite()
  {
    return $this->isVideoFocusedSite;
  }
  /**
   * @param float
   */
  public function setLocalityScore($localityScore)
  {
    $this->localityScore = $localityScore;
  }
  /**
   * @return float
   */
  public function getLocalityScore()
  {
    return $this->localityScore;
  }
  /**
   * @param QualityNsrNsrDataMetadata
   */
  public function setMetadata(QualityNsrNsrDataMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return QualityNsrNsrDataMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param float
   */
  public function setNewNsr($newNsr)
  {
    $this->newNsr = $newNsr;
  }
  /**
   * @return float
   */
  public function getNewNsr()
  {
    return $this->newNsr;
  }
  /**
   * @param float
   */
  public function setNsr($nsr)
  {
    $this->nsr = $nsr;
  }
  /**
   * @return float
   */
  public function getNsr()
  {
    return $this->nsr;
  }
  /**
   * @param float
   */
  public function setNsrOverrideBid($nsrOverrideBid)
  {
    $this->nsrOverrideBid = $nsrOverrideBid;
  }
  /**
   * @return float
   */
  public function getNsrOverrideBid()
  {
    return $this->nsrOverrideBid;
  }
  /**
   * @param float
   */
  public function setNsrVariance($nsrVariance)
  {
    $this->nsrVariance = $nsrVariance;
  }
  /**
   * @return float
   */
  public function getNsrVariance()
  {
    return $this->nsrVariance;
  }
  /**
   * @param bool
   */
  public function setNsrdataFromFallbackPatternKey($nsrdataFromFallbackPatternKey)
  {
    $this->nsrdataFromFallbackPatternKey = $nsrdataFromFallbackPatternKey;
  }
  /**
   * @return bool
   */
  public function getNsrdataFromFallbackPatternKey()
  {
    return $this->nsrdataFromFallbackPatternKey;
  }
  /**
   * @param string
   */
  public function setSecondarySiteChunk($secondarySiteChunk)
  {
    $this->secondarySiteChunk = $secondarySiteChunk;
  }
  /**
   * @return string
   */
  public function getSecondarySiteChunk()
  {
    return $this->secondarySiteChunk;
  }
  /**
   * @param float
   */
  public function setSiteAutopilotScore($siteAutopilotScore)
  {
    $this->siteAutopilotScore = $siteAutopilotScore;
  }
  /**
   * @return float
   */
  public function getSiteAutopilotScore()
  {
    return $this->siteAutopilotScore;
  }
  /**
   * @param string
   */
  public function setSiteChunk($siteChunk)
  {
    $this->siteChunk = $siteChunk;
  }
  /**
   * @return string
   */
  public function getSiteChunk()
  {
    return $this->siteChunk;
  }
  /**
   * @param string
   */
  public function setSiteChunkSource($siteChunkSource)
  {
    $this->siteChunkSource = $siteChunkSource;
  }
  /**
   * @return string
   */
  public function getSiteChunkSource()
  {
    return $this->siteChunkSource;
  }
  /**
   * @param float
   */
  public function setSiteLinkIn($siteLinkIn)
  {
    $this->siteLinkIn = $siteLinkIn;
  }
  /**
   * @return float
   */
  public function getSiteLinkIn()
  {
    return $this->siteLinkIn;
  }
  /**
   * @param float
   */
  public function setSiteLinkOut($siteLinkOut)
  {
    $this->siteLinkOut = $siteLinkOut;
  }
  /**
   * @return float
   */
  public function getSiteLinkOut()
  {
    return $this->siteLinkOut;
  }
  /**
   * @param float
   */
  public function setSitePr($sitePr)
  {
    $this->sitePr = $sitePr;
  }
  /**
   * @return float
   */
  public function getSitePr()
  {
    return $this->sitePr;
  }
  /**
   * @param float
   */
  public function setSiteQualityStddev($siteQualityStddev)
  {
    $this->siteQualityStddev = $siteQualityStddev;
  }
  /**
   * @return float
   */
  public function getSiteQualityStddev()
  {
    return $this->siteQualityStddev;
  }
  /**
   * @param float
   */
  public function setSpambrainLavcScore($spambrainLavcScore)
  {
    $this->spambrainLavcScore = $spambrainLavcScore;
  }
  /**
   * @return float
   */
  public function getSpambrainLavcScore()
  {
    return $this->spambrainLavcScore;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param QualityNsrNSRVersionedData[]
   */
  public function setVersionedData($versionedData)
  {
    $this->versionedData = $versionedData;
  }
  /**
   * @return QualityNsrNSRVersionedData[]
   */
  public function getVersionedData()
  {
    return $this->versionedData;
  }
  /**
   * @param float
   */
  public function setVlqNsr($vlqNsr)
  {
    $this->vlqNsr = $vlqNsr;
  }
  /**
   * @return float
   */
  public function getVlqNsr()
  {
    return $this->vlqNsr;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityNsrNsrData::class, 'Google_Service_Contentwarehouse_QualityNsrNsrData');
