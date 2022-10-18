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

class IndexingDocjoinerAnchorStatistics extends \Google\Collection
{
  protected $collection_key = 'redundantanchorinfoforphrasecap';
  /**
   * @var int
   */
  public $anchorCount;
  /**
   * @var int
   */
  public $anchorPhraseCount;
  protected $anchorSpamInfoType = IndexingDocjoinerAnchorSpamInfo::class;
  protected $anchorSpamInfoDataType = '';
  /**
   * @var int
   */
  public $anchorsWithDedupedImprovanchors;
  /**
   * @var bool
   */
  public $badbacklinksPenalized;
  /**
   * @var int
   */
  public $baseAnchorCount;
  /**
   * @var int
   */
  public $baseOffdomainAnchorCount;
  /**
   * @var int
   */
  public $droppedHomepageAnchorCount;
  /**
   * @var int
   */
  public $droppedLocalAnchorCount;
  /**
   * @var int
   */
  public $droppedNonLocalAnchorCount;
  /**
   * @var int
   */
  public $droppedRedundantAnchorCount;
  /**
   * @var int
   */
  public $fakeAnchorCount;
  /**
   * @var int
   */
  public $forwardedAnchorCount;
  /**
   * @var int
   */
  public $forwardedOffdomainAnchorCount;
  /**
   * @var int
   */
  public $globalAnchorDelta;
  /**
   * @var int
   */
  public $linkBeforeSitechangeTaggedAnchors;
  /**
   * @var int
   */
  public $localAnchorCount;
  /**
   * @var int
   */
  public $lowCorpusAnchorCount;
  /**
   * @var int
   */
  public $lowCorpusOffdomainAnchorCount;
  /**
   * @var int
   */
  public $mediumCorpusAnchorCount;
  /**
   * @var int
   */
  public $mediumCorpusOffdomainAnchorCount;
  /**
   * @var int
   */
  public $minDomainHomePageLocalOutdegree;
  /**
   * @var int
   */
  public $minHostHomePageLocalOutdegree;
  /**
   * @var int
   */
  public $nonLocalAnchorCount;
  /**
   * @var int
   */
  public $offdomainAnchorCount;
  /**
   * @var int
   */
  public $ondomainAnchorCount;
  /**
   * @var int
   */
  public $onsiteAnchorCount;
  /**
   * @var int
   */
  public $pageFromExpiredTaggedAnchors;
  /**
   * @var int
   */
  public $pageMismatchTaggedAnchors;
  /**
   * @var bool
   */
  public $penguinEarlyAnchorProtected;
  /**
   * @var int
   */
  public $penguinLastUpdate;
  /**
   * @var float
   */
  public $penguinPenalty;
  /**
   * @var bool
   */
  public $penguinTooManySources;
  protected $perdupstatsType = IndexingDocjoinerAnchorStatisticsPerDupStats::class;
  protected $perdupstatsDataType = 'array';
  protected $phraseAnchorSpamInfoType = IndexingDocjoinerAnchorPhraseSpamInfo::class;
  protected $phraseAnchorSpamInfoDataType = '';
  /**
   * @var int
   */
  public $redundantAnchorForPhraseCapCount;
  protected $redundantanchorinfoType = IndexingDocjoinerAnchorStatisticsRedundantAnchorInfo::class;
  protected $redundantanchorinfoDataType = 'array';
  protected $redundantanchorinfoforphrasecapType = IndexingDocjoinerAnchorStatisticsRedundantAnchorInfoForPhraseCap::class;
  protected $redundantanchorinfoforphrasecapDataType = 'array';
  /**
   * @var int
   */
  public $scannedAnchorCount;
  /**
   * @var int
   */
  public $skippedAccumulate;
  /**
   * @var string
   */
  public $skippedOrReusedReason;
  /**
   * @var float
   */
  public $spamLog10Odds;
  /**
   * @var int
   */
  public $timestamp;
  /**
   * @var int
   */
  public $topPrOffdomainAnchorCount;
  /**
   * @var int
   */
  public $topPrOndomainAnchorCount;
  /**
   * @var int
   */
  public $topPrOnsiteAnchorCount;
  /**
   * @var int
   */
  public $totalDomainPhrasePairsAboveLimit;
  /**
   * @var int
   */
  public $totalDomainPhrasePairsSeenApprox;
  /**
   * @var int
   */
  public $totalDomainsAbovePhraseCap;
  /**
   * @var int
   */
  public $totalDomainsSeen;

  /**
   * @param int
   */
  public function setAnchorCount($anchorCount)
  {
    $this->anchorCount = $anchorCount;
  }
  /**
   * @return int
   */
  public function getAnchorCount()
  {
    return $this->anchorCount;
  }
  /**
   * @param int
   */
  public function setAnchorPhraseCount($anchorPhraseCount)
  {
    $this->anchorPhraseCount = $anchorPhraseCount;
  }
  /**
   * @return int
   */
  public function getAnchorPhraseCount()
  {
    return $this->anchorPhraseCount;
  }
  /**
   * @param IndexingDocjoinerAnchorSpamInfo
   */
  public function setAnchorSpamInfo(IndexingDocjoinerAnchorSpamInfo $anchorSpamInfo)
  {
    $this->anchorSpamInfo = $anchorSpamInfo;
  }
  /**
   * @return IndexingDocjoinerAnchorSpamInfo
   */
  public function getAnchorSpamInfo()
  {
    return $this->anchorSpamInfo;
  }
  /**
   * @param int
   */
  public function setAnchorsWithDedupedImprovanchors($anchorsWithDedupedImprovanchors)
  {
    $this->anchorsWithDedupedImprovanchors = $anchorsWithDedupedImprovanchors;
  }
  /**
   * @return int
   */
  public function getAnchorsWithDedupedImprovanchors()
  {
    return $this->anchorsWithDedupedImprovanchors;
  }
  /**
   * @param bool
   */
  public function setBadbacklinksPenalized($badbacklinksPenalized)
  {
    $this->badbacklinksPenalized = $badbacklinksPenalized;
  }
  /**
   * @return bool
   */
  public function getBadbacklinksPenalized()
  {
    return $this->badbacklinksPenalized;
  }
  /**
   * @param int
   */
  public function setBaseAnchorCount($baseAnchorCount)
  {
    $this->baseAnchorCount = $baseAnchorCount;
  }
  /**
   * @return int
   */
  public function getBaseAnchorCount()
  {
    return $this->baseAnchorCount;
  }
  /**
   * @param int
   */
  public function setBaseOffdomainAnchorCount($baseOffdomainAnchorCount)
  {
    $this->baseOffdomainAnchorCount = $baseOffdomainAnchorCount;
  }
  /**
   * @return int
   */
  public function getBaseOffdomainAnchorCount()
  {
    return $this->baseOffdomainAnchorCount;
  }
  /**
   * @param int
   */
  public function setDroppedHomepageAnchorCount($droppedHomepageAnchorCount)
  {
    $this->droppedHomepageAnchorCount = $droppedHomepageAnchorCount;
  }
  /**
   * @return int
   */
  public function getDroppedHomepageAnchorCount()
  {
    return $this->droppedHomepageAnchorCount;
  }
  /**
   * @param int
   */
  public function setDroppedLocalAnchorCount($droppedLocalAnchorCount)
  {
    $this->droppedLocalAnchorCount = $droppedLocalAnchorCount;
  }
  /**
   * @return int
   */
  public function getDroppedLocalAnchorCount()
  {
    return $this->droppedLocalAnchorCount;
  }
  /**
   * @param int
   */
  public function setDroppedNonLocalAnchorCount($droppedNonLocalAnchorCount)
  {
    $this->droppedNonLocalAnchorCount = $droppedNonLocalAnchorCount;
  }
  /**
   * @return int
   */
  public function getDroppedNonLocalAnchorCount()
  {
    return $this->droppedNonLocalAnchorCount;
  }
  /**
   * @param int
   */
  public function setDroppedRedundantAnchorCount($droppedRedundantAnchorCount)
  {
    $this->droppedRedundantAnchorCount = $droppedRedundantAnchorCount;
  }
  /**
   * @return int
   */
  public function getDroppedRedundantAnchorCount()
  {
    return $this->droppedRedundantAnchorCount;
  }
  /**
   * @param int
   */
  public function setFakeAnchorCount($fakeAnchorCount)
  {
    $this->fakeAnchorCount = $fakeAnchorCount;
  }
  /**
   * @return int
   */
  public function getFakeAnchorCount()
  {
    return $this->fakeAnchorCount;
  }
  /**
   * @param int
   */
  public function setForwardedAnchorCount($forwardedAnchorCount)
  {
    $this->forwardedAnchorCount = $forwardedAnchorCount;
  }
  /**
   * @return int
   */
  public function getForwardedAnchorCount()
  {
    return $this->forwardedAnchorCount;
  }
  /**
   * @param int
   */
  public function setForwardedOffdomainAnchorCount($forwardedOffdomainAnchorCount)
  {
    $this->forwardedOffdomainAnchorCount = $forwardedOffdomainAnchorCount;
  }
  /**
   * @return int
   */
  public function getForwardedOffdomainAnchorCount()
  {
    return $this->forwardedOffdomainAnchorCount;
  }
  /**
   * @param int
   */
  public function setGlobalAnchorDelta($globalAnchorDelta)
  {
    $this->globalAnchorDelta = $globalAnchorDelta;
  }
  /**
   * @return int
   */
  public function getGlobalAnchorDelta()
  {
    return $this->globalAnchorDelta;
  }
  /**
   * @param int
   */
  public function setLinkBeforeSitechangeTaggedAnchors($linkBeforeSitechangeTaggedAnchors)
  {
    $this->linkBeforeSitechangeTaggedAnchors = $linkBeforeSitechangeTaggedAnchors;
  }
  /**
   * @return int
   */
  public function getLinkBeforeSitechangeTaggedAnchors()
  {
    return $this->linkBeforeSitechangeTaggedAnchors;
  }
  /**
   * @param int
   */
  public function setLocalAnchorCount($localAnchorCount)
  {
    $this->localAnchorCount = $localAnchorCount;
  }
  /**
   * @return int
   */
  public function getLocalAnchorCount()
  {
    return $this->localAnchorCount;
  }
  /**
   * @param int
   */
  public function setLowCorpusAnchorCount($lowCorpusAnchorCount)
  {
    $this->lowCorpusAnchorCount = $lowCorpusAnchorCount;
  }
  /**
   * @return int
   */
  public function getLowCorpusAnchorCount()
  {
    return $this->lowCorpusAnchorCount;
  }
  /**
   * @param int
   */
  public function setLowCorpusOffdomainAnchorCount($lowCorpusOffdomainAnchorCount)
  {
    $this->lowCorpusOffdomainAnchorCount = $lowCorpusOffdomainAnchorCount;
  }
  /**
   * @return int
   */
  public function getLowCorpusOffdomainAnchorCount()
  {
    return $this->lowCorpusOffdomainAnchorCount;
  }
  /**
   * @param int
   */
  public function setMediumCorpusAnchorCount($mediumCorpusAnchorCount)
  {
    $this->mediumCorpusAnchorCount = $mediumCorpusAnchorCount;
  }
  /**
   * @return int
   */
  public function getMediumCorpusAnchorCount()
  {
    return $this->mediumCorpusAnchorCount;
  }
  /**
   * @param int
   */
  public function setMediumCorpusOffdomainAnchorCount($mediumCorpusOffdomainAnchorCount)
  {
    $this->mediumCorpusOffdomainAnchorCount = $mediumCorpusOffdomainAnchorCount;
  }
  /**
   * @return int
   */
  public function getMediumCorpusOffdomainAnchorCount()
  {
    return $this->mediumCorpusOffdomainAnchorCount;
  }
  /**
   * @param int
   */
  public function setMinDomainHomePageLocalOutdegree($minDomainHomePageLocalOutdegree)
  {
    $this->minDomainHomePageLocalOutdegree = $minDomainHomePageLocalOutdegree;
  }
  /**
   * @return int
   */
  public function getMinDomainHomePageLocalOutdegree()
  {
    return $this->minDomainHomePageLocalOutdegree;
  }
  /**
   * @param int
   */
  public function setMinHostHomePageLocalOutdegree($minHostHomePageLocalOutdegree)
  {
    $this->minHostHomePageLocalOutdegree = $minHostHomePageLocalOutdegree;
  }
  /**
   * @return int
   */
  public function getMinHostHomePageLocalOutdegree()
  {
    return $this->minHostHomePageLocalOutdegree;
  }
  /**
   * @param int
   */
  public function setNonLocalAnchorCount($nonLocalAnchorCount)
  {
    $this->nonLocalAnchorCount = $nonLocalAnchorCount;
  }
  /**
   * @return int
   */
  public function getNonLocalAnchorCount()
  {
    return $this->nonLocalAnchorCount;
  }
  /**
   * @param int
   */
  public function setOffdomainAnchorCount($offdomainAnchorCount)
  {
    $this->offdomainAnchorCount = $offdomainAnchorCount;
  }
  /**
   * @return int
   */
  public function getOffdomainAnchorCount()
  {
    return $this->offdomainAnchorCount;
  }
  /**
   * @param int
   */
  public function setOndomainAnchorCount($ondomainAnchorCount)
  {
    $this->ondomainAnchorCount = $ondomainAnchorCount;
  }
  /**
   * @return int
   */
  public function getOndomainAnchorCount()
  {
    return $this->ondomainAnchorCount;
  }
  /**
   * @param int
   */
  public function setOnsiteAnchorCount($onsiteAnchorCount)
  {
    $this->onsiteAnchorCount = $onsiteAnchorCount;
  }
  /**
   * @return int
   */
  public function getOnsiteAnchorCount()
  {
    return $this->onsiteAnchorCount;
  }
  /**
   * @param int
   */
  public function setPageFromExpiredTaggedAnchors($pageFromExpiredTaggedAnchors)
  {
    $this->pageFromExpiredTaggedAnchors = $pageFromExpiredTaggedAnchors;
  }
  /**
   * @return int
   */
  public function getPageFromExpiredTaggedAnchors()
  {
    return $this->pageFromExpiredTaggedAnchors;
  }
  /**
   * @param int
   */
  public function setPageMismatchTaggedAnchors($pageMismatchTaggedAnchors)
  {
    $this->pageMismatchTaggedAnchors = $pageMismatchTaggedAnchors;
  }
  /**
   * @return int
   */
  public function getPageMismatchTaggedAnchors()
  {
    return $this->pageMismatchTaggedAnchors;
  }
  /**
   * @param bool
   */
  public function setPenguinEarlyAnchorProtected($penguinEarlyAnchorProtected)
  {
    $this->penguinEarlyAnchorProtected = $penguinEarlyAnchorProtected;
  }
  /**
   * @return bool
   */
  public function getPenguinEarlyAnchorProtected()
  {
    return $this->penguinEarlyAnchorProtected;
  }
  /**
   * @param int
   */
  public function setPenguinLastUpdate($penguinLastUpdate)
  {
    $this->penguinLastUpdate = $penguinLastUpdate;
  }
  /**
   * @return int
   */
  public function getPenguinLastUpdate()
  {
    return $this->penguinLastUpdate;
  }
  /**
   * @param float
   */
  public function setPenguinPenalty($penguinPenalty)
  {
    $this->penguinPenalty = $penguinPenalty;
  }
  /**
   * @return float
   */
  public function getPenguinPenalty()
  {
    return $this->penguinPenalty;
  }
  /**
   * @param bool
   */
  public function setPenguinTooManySources($penguinTooManySources)
  {
    $this->penguinTooManySources = $penguinTooManySources;
  }
  /**
   * @return bool
   */
  public function getPenguinTooManySources()
  {
    return $this->penguinTooManySources;
  }
  /**
   * @param IndexingDocjoinerAnchorStatisticsPerDupStats[]
   */
  public function setPerdupstats($perdupstats)
  {
    $this->perdupstats = $perdupstats;
  }
  /**
   * @return IndexingDocjoinerAnchorStatisticsPerDupStats[]
   */
  public function getPerdupstats()
  {
    return $this->perdupstats;
  }
  /**
   * @param IndexingDocjoinerAnchorPhraseSpamInfo
   */
  public function setPhraseAnchorSpamInfo(IndexingDocjoinerAnchorPhraseSpamInfo $phraseAnchorSpamInfo)
  {
    $this->phraseAnchorSpamInfo = $phraseAnchorSpamInfo;
  }
  /**
   * @return IndexingDocjoinerAnchorPhraseSpamInfo
   */
  public function getPhraseAnchorSpamInfo()
  {
    return $this->phraseAnchorSpamInfo;
  }
  /**
   * @param int
   */
  public function setRedundantAnchorForPhraseCapCount($redundantAnchorForPhraseCapCount)
  {
    $this->redundantAnchorForPhraseCapCount = $redundantAnchorForPhraseCapCount;
  }
  /**
   * @return int
   */
  public function getRedundantAnchorForPhraseCapCount()
  {
    return $this->redundantAnchorForPhraseCapCount;
  }
  /**
   * @param IndexingDocjoinerAnchorStatisticsRedundantAnchorInfo[]
   */
  public function setRedundantanchorinfo($redundantanchorinfo)
  {
    $this->redundantanchorinfo = $redundantanchorinfo;
  }
  /**
   * @return IndexingDocjoinerAnchorStatisticsRedundantAnchorInfo[]
   */
  public function getRedundantanchorinfo()
  {
    return $this->redundantanchorinfo;
  }
  /**
   * @param IndexingDocjoinerAnchorStatisticsRedundantAnchorInfoForPhraseCap[]
   */
  public function setRedundantanchorinfoforphrasecap($redundantanchorinfoforphrasecap)
  {
    $this->redundantanchorinfoforphrasecap = $redundantanchorinfoforphrasecap;
  }
  /**
   * @return IndexingDocjoinerAnchorStatisticsRedundantAnchorInfoForPhraseCap[]
   */
  public function getRedundantanchorinfoforphrasecap()
  {
    return $this->redundantanchorinfoforphrasecap;
  }
  /**
   * @param int
   */
  public function setScannedAnchorCount($scannedAnchorCount)
  {
    $this->scannedAnchorCount = $scannedAnchorCount;
  }
  /**
   * @return int
   */
  public function getScannedAnchorCount()
  {
    return $this->scannedAnchorCount;
  }
  /**
   * @param int
   */
  public function setSkippedAccumulate($skippedAccumulate)
  {
    $this->skippedAccumulate = $skippedAccumulate;
  }
  /**
   * @return int
   */
  public function getSkippedAccumulate()
  {
    return $this->skippedAccumulate;
  }
  /**
   * @param string
   */
  public function setSkippedOrReusedReason($skippedOrReusedReason)
  {
    $this->skippedOrReusedReason = $skippedOrReusedReason;
  }
  /**
   * @return string
   */
  public function getSkippedOrReusedReason()
  {
    return $this->skippedOrReusedReason;
  }
  /**
   * @param float
   */
  public function setSpamLog10Odds($spamLog10Odds)
  {
    $this->spamLog10Odds = $spamLog10Odds;
  }
  /**
   * @return float
   */
  public function getSpamLog10Odds()
  {
    return $this->spamLog10Odds;
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
   * @param int
   */
  public function setTopPrOffdomainAnchorCount($topPrOffdomainAnchorCount)
  {
    $this->topPrOffdomainAnchorCount = $topPrOffdomainAnchorCount;
  }
  /**
   * @return int
   */
  public function getTopPrOffdomainAnchorCount()
  {
    return $this->topPrOffdomainAnchorCount;
  }
  /**
   * @param int
   */
  public function setTopPrOndomainAnchorCount($topPrOndomainAnchorCount)
  {
    $this->topPrOndomainAnchorCount = $topPrOndomainAnchorCount;
  }
  /**
   * @return int
   */
  public function getTopPrOndomainAnchorCount()
  {
    return $this->topPrOndomainAnchorCount;
  }
  /**
   * @param int
   */
  public function setTopPrOnsiteAnchorCount($topPrOnsiteAnchorCount)
  {
    $this->topPrOnsiteAnchorCount = $topPrOnsiteAnchorCount;
  }
  /**
   * @return int
   */
  public function getTopPrOnsiteAnchorCount()
  {
    return $this->topPrOnsiteAnchorCount;
  }
  /**
   * @param int
   */
  public function setTotalDomainPhrasePairsAboveLimit($totalDomainPhrasePairsAboveLimit)
  {
    $this->totalDomainPhrasePairsAboveLimit = $totalDomainPhrasePairsAboveLimit;
  }
  /**
   * @return int
   */
  public function getTotalDomainPhrasePairsAboveLimit()
  {
    return $this->totalDomainPhrasePairsAboveLimit;
  }
  /**
   * @param int
   */
  public function setTotalDomainPhrasePairsSeenApprox($totalDomainPhrasePairsSeenApprox)
  {
    $this->totalDomainPhrasePairsSeenApprox = $totalDomainPhrasePairsSeenApprox;
  }
  /**
   * @return int
   */
  public function getTotalDomainPhrasePairsSeenApprox()
  {
    return $this->totalDomainPhrasePairsSeenApprox;
  }
  /**
   * @param int
   */
  public function setTotalDomainsAbovePhraseCap($totalDomainsAbovePhraseCap)
  {
    $this->totalDomainsAbovePhraseCap = $totalDomainsAbovePhraseCap;
  }
  /**
   * @return int
   */
  public function getTotalDomainsAbovePhraseCap()
  {
    return $this->totalDomainsAbovePhraseCap;
  }
  /**
   * @param int
   */
  public function setTotalDomainsSeen($totalDomainsSeen)
  {
    $this->totalDomainsSeen = $totalDomainsSeen;
  }
  /**
   * @return int
   */
  public function getTotalDomainsSeen()
  {
    return $this->totalDomainsSeen;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDocjoinerAnchorStatistics::class, 'Google_Service_Contentwarehouse_IndexingDocjoinerAnchorStatistics');
