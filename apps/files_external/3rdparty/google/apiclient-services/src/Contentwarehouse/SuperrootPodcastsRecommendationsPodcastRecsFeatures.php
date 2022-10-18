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

class SuperrootPodcastsRecommendationsPodcastRecsFeatures extends \Google\Collection
{
  protected $collection_key = 'userLanguage';
  /**
   * @var string
   */
  public $averageDurationSecondsEpisode;
  /**
   * @var string
   */
  public $averageDurationSecondsShow;
  public $averageFractionEpisode;
  public $averageFractionShow;
  public $balancedLift;
  public $categoryMatch;
  /**
   * @var string
   */
  public $clusterFeedMinutes;
  /**
   * @var float
   */
  public $colistenedShowColistenAffinity;
  /**
   * @var string
   */
  public $colistenedShowLevelRank;
  /**
   * @var float
   */
  public $convAiToxicitySevereScore;
  public $csaiScore;
  /**
   * @var string
   */
  public $dnnShowLevelRank;
  /**
   * @var float
   */
  public $dnnV2aScore;
  /**
   * @var float
   */
  public $dnnV2aScoreSigmoid;
  /**
   * @var string
   */
  public $durationTotalSecondsEpisode;
  /**
   * @var string
   */
  public $durationTotalSecondsShow;
  /**
   * @var string
   */
  public $episodeDurationSec;
  /**
   * @var string
   */
  public $episodeImpressions;
  /**
   * @var string
   */
  public $episodeImpressionsPastWeek;
  /**
   * @var string
   */
  public $episodesPublishedPerMonth;
  /**
   * @var string
   */
  public $explicitShow;
  public $feedPagerank;
  /**
   * @var float
   */
  public $finalReactionBoostScore;
  public $fractionTotalEpisode;
  public $fractionTotalShow;
  public $fringeScore;
  public $globalProb;
  public $inClusterProb;
  /**
   * @var bool
   */
  public $isCanonical;
  /**
   * @var string
   */
  public $kmeansShowLevelRank;
  public $languageMatch;
  /**
   * @var bool
   */
  public $linkOwnershipVerified;
  /**
   * @var int
   */
  public $listenTimeMin;
  /**
   * @var string
   */
  public $listenedShowLevelRank;
  /**
   * @var float
   */
  public $listenedShowListeningAffinity;
  /**
   * @var string
   */
  public $locationFeatureId;
  public $longUserListeningWebrefSimilarity;
  public $medicalScore;
  public $mediumUserListeningWebrefSimilarity;
  /**
   * @var float
   */
  public $negativeReactionBoostScore;
  public $nicheLift;
  /**
   * @var string
   */
  public $numListenersInKmeansCluster;
  /**
   * @var string
   */
  public $numListenersToShowInKmeansCluster;
  /**
   * @var int
   */
  public $numListens;
  /**
   * @var string
   */
  public $numSubscribersShow;
  /**
   * @var string
   */
  public $numUniqueListenersShow;
  public $offensiveScore;
  /**
   * @var float
   */
  public $peDurationScoreEpisode;
  /**
   * @var float
   */
  public $peDurationScoreShow;
  /**
   * @var float
   */
  public $peDurationTotalScoreEpisode;
  /**
   * @var float
   */
  public $peDurationTotalScoreShow;
  /**
   * @var float
   */
  public $peFractionScoreEpisode;
  /**
   * @var float
   */
  public $peFractionScoreShow;
  /**
   * @var float
   */
  public $peFractionTotalScoreEpisode;
  /**
   * @var float
   */
  public $peFractionTotalScoreShow;
  /**
   * @var float
   */
  public $peListenScoreEpisode;
  /**
   * @var float
   */
  public $peListenScoreShow;
  /**
   * @var float
   */
  public $peListenTotalScoreEpisode;
  /**
   * @var float
   */
  public $peListenTotalScoreShow;
  public $popularLift;
  public $pornScore;
  /**
   * @var float
   */
  public $positiveReactionBoostScore;
  /**
   * @var string
   */
  public $queryLanguage;
  /**
   * @var string
   */
  public $rank;
  public $rankPercentContrib;
  public $recentUserListeningWebrefSimilarity;
  /**
   * @var string
   */
  public $secondsSincePublication;
  public $showBaseQuality;
  /**
   * @var string
   */
  public $showImpressions;
  /**
   * @var string
   */
  public $showImpressionsPastWeek;
  /**
   * @var string
   */
  public $showLanguage;
  /**
   * @var string
   */
  public $showOnlyImpressions;
  /**
   * @var string
   */
  public $showOnlyImpressionsPastWeek;
  /**
   * @var string
   */
  public $showPopularRank;
  public $spoofScore;
  /**
   * @var float
   */
  public $subscribedShowListeningAffinity;
  /**
   * @var string
   */
  public $subscriptionShowLevelRank;
  /**
   * @var string
   */
  public $surface;
  /**
   * @var string
   */
  public $trendingScorePercent;
  protected $ulpLanguageType = SuperrootPodcastsRecommendationsPodcastRecsFeaturesUserLanguage::class;
  protected $ulpLanguageDataType = 'array';
  /**
   * @var float
   */
  public $ulpLanguageMatch;
  /**
   * @var float
   */
  public $userClusterDistance;
  public $userInterestsSalientSimilarity;
  public $userInterestsWebrefSimilarity;
  protected $userLanguageType = SuperrootPodcastsRecommendationsPodcastRecsFeaturesUserLanguage::class;
  protected $userLanguageDataType = 'array';
  public $violenceScore;
  public $vulgarScore;

  /**
   * @param string
   */
  public function setAverageDurationSecondsEpisode($averageDurationSecondsEpisode)
  {
    $this->averageDurationSecondsEpisode = $averageDurationSecondsEpisode;
  }
  /**
   * @return string
   */
  public function getAverageDurationSecondsEpisode()
  {
    return $this->averageDurationSecondsEpisode;
  }
  /**
   * @param string
   */
  public function setAverageDurationSecondsShow($averageDurationSecondsShow)
  {
    $this->averageDurationSecondsShow = $averageDurationSecondsShow;
  }
  /**
   * @return string
   */
  public function getAverageDurationSecondsShow()
  {
    return $this->averageDurationSecondsShow;
  }
  public function setAverageFractionEpisode($averageFractionEpisode)
  {
    $this->averageFractionEpisode = $averageFractionEpisode;
  }
  public function getAverageFractionEpisode()
  {
    return $this->averageFractionEpisode;
  }
  public function setAverageFractionShow($averageFractionShow)
  {
    $this->averageFractionShow = $averageFractionShow;
  }
  public function getAverageFractionShow()
  {
    return $this->averageFractionShow;
  }
  public function setBalancedLift($balancedLift)
  {
    $this->balancedLift = $balancedLift;
  }
  public function getBalancedLift()
  {
    return $this->balancedLift;
  }
  public function setCategoryMatch($categoryMatch)
  {
    $this->categoryMatch = $categoryMatch;
  }
  public function getCategoryMatch()
  {
    return $this->categoryMatch;
  }
  /**
   * @param string
   */
  public function setClusterFeedMinutes($clusterFeedMinutes)
  {
    $this->clusterFeedMinutes = $clusterFeedMinutes;
  }
  /**
   * @return string
   */
  public function getClusterFeedMinutes()
  {
    return $this->clusterFeedMinutes;
  }
  /**
   * @param float
   */
  public function setColistenedShowColistenAffinity($colistenedShowColistenAffinity)
  {
    $this->colistenedShowColistenAffinity = $colistenedShowColistenAffinity;
  }
  /**
   * @return float
   */
  public function getColistenedShowColistenAffinity()
  {
    return $this->colistenedShowColistenAffinity;
  }
  /**
   * @param string
   */
  public function setColistenedShowLevelRank($colistenedShowLevelRank)
  {
    $this->colistenedShowLevelRank = $colistenedShowLevelRank;
  }
  /**
   * @return string
   */
  public function getColistenedShowLevelRank()
  {
    return $this->colistenedShowLevelRank;
  }
  /**
   * @param float
   */
  public function setConvAiToxicitySevereScore($convAiToxicitySevereScore)
  {
    $this->convAiToxicitySevereScore = $convAiToxicitySevereScore;
  }
  /**
   * @return float
   */
  public function getConvAiToxicitySevereScore()
  {
    return $this->convAiToxicitySevereScore;
  }
  public function setCsaiScore($csaiScore)
  {
    $this->csaiScore = $csaiScore;
  }
  public function getCsaiScore()
  {
    return $this->csaiScore;
  }
  /**
   * @param string
   */
  public function setDnnShowLevelRank($dnnShowLevelRank)
  {
    $this->dnnShowLevelRank = $dnnShowLevelRank;
  }
  /**
   * @return string
   */
  public function getDnnShowLevelRank()
  {
    return $this->dnnShowLevelRank;
  }
  /**
   * @param float
   */
  public function setDnnV2aScore($dnnV2aScore)
  {
    $this->dnnV2aScore = $dnnV2aScore;
  }
  /**
   * @return float
   */
  public function getDnnV2aScore()
  {
    return $this->dnnV2aScore;
  }
  /**
   * @param float
   */
  public function setDnnV2aScoreSigmoid($dnnV2aScoreSigmoid)
  {
    $this->dnnV2aScoreSigmoid = $dnnV2aScoreSigmoid;
  }
  /**
   * @return float
   */
  public function getDnnV2aScoreSigmoid()
  {
    return $this->dnnV2aScoreSigmoid;
  }
  /**
   * @param string
   */
  public function setDurationTotalSecondsEpisode($durationTotalSecondsEpisode)
  {
    $this->durationTotalSecondsEpisode = $durationTotalSecondsEpisode;
  }
  /**
   * @return string
   */
  public function getDurationTotalSecondsEpisode()
  {
    return $this->durationTotalSecondsEpisode;
  }
  /**
   * @param string
   */
  public function setDurationTotalSecondsShow($durationTotalSecondsShow)
  {
    $this->durationTotalSecondsShow = $durationTotalSecondsShow;
  }
  /**
   * @return string
   */
  public function getDurationTotalSecondsShow()
  {
    return $this->durationTotalSecondsShow;
  }
  /**
   * @param string
   */
  public function setEpisodeDurationSec($episodeDurationSec)
  {
    $this->episodeDurationSec = $episodeDurationSec;
  }
  /**
   * @return string
   */
  public function getEpisodeDurationSec()
  {
    return $this->episodeDurationSec;
  }
  /**
   * @param string
   */
  public function setEpisodeImpressions($episodeImpressions)
  {
    $this->episodeImpressions = $episodeImpressions;
  }
  /**
   * @return string
   */
  public function getEpisodeImpressions()
  {
    return $this->episodeImpressions;
  }
  /**
   * @param string
   */
  public function setEpisodeImpressionsPastWeek($episodeImpressionsPastWeek)
  {
    $this->episodeImpressionsPastWeek = $episodeImpressionsPastWeek;
  }
  /**
   * @return string
   */
  public function getEpisodeImpressionsPastWeek()
  {
    return $this->episodeImpressionsPastWeek;
  }
  /**
   * @param string
   */
  public function setEpisodesPublishedPerMonth($episodesPublishedPerMonth)
  {
    $this->episodesPublishedPerMonth = $episodesPublishedPerMonth;
  }
  /**
   * @return string
   */
  public function getEpisodesPublishedPerMonth()
  {
    return $this->episodesPublishedPerMonth;
  }
  /**
   * @param string
   */
  public function setExplicitShow($explicitShow)
  {
    $this->explicitShow = $explicitShow;
  }
  /**
   * @return string
   */
  public function getExplicitShow()
  {
    return $this->explicitShow;
  }
  public function setFeedPagerank($feedPagerank)
  {
    $this->feedPagerank = $feedPagerank;
  }
  public function getFeedPagerank()
  {
    return $this->feedPagerank;
  }
  /**
   * @param float
   */
  public function setFinalReactionBoostScore($finalReactionBoostScore)
  {
    $this->finalReactionBoostScore = $finalReactionBoostScore;
  }
  /**
   * @return float
   */
  public function getFinalReactionBoostScore()
  {
    return $this->finalReactionBoostScore;
  }
  public function setFractionTotalEpisode($fractionTotalEpisode)
  {
    $this->fractionTotalEpisode = $fractionTotalEpisode;
  }
  public function getFractionTotalEpisode()
  {
    return $this->fractionTotalEpisode;
  }
  public function setFractionTotalShow($fractionTotalShow)
  {
    $this->fractionTotalShow = $fractionTotalShow;
  }
  public function getFractionTotalShow()
  {
    return $this->fractionTotalShow;
  }
  public function setFringeScore($fringeScore)
  {
    $this->fringeScore = $fringeScore;
  }
  public function getFringeScore()
  {
    return $this->fringeScore;
  }
  public function setGlobalProb($globalProb)
  {
    $this->globalProb = $globalProb;
  }
  public function getGlobalProb()
  {
    return $this->globalProb;
  }
  public function setInClusterProb($inClusterProb)
  {
    $this->inClusterProb = $inClusterProb;
  }
  public function getInClusterProb()
  {
    return $this->inClusterProb;
  }
  /**
   * @param bool
   */
  public function setIsCanonical($isCanonical)
  {
    $this->isCanonical = $isCanonical;
  }
  /**
   * @return bool
   */
  public function getIsCanonical()
  {
    return $this->isCanonical;
  }
  /**
   * @param string
   */
  public function setKmeansShowLevelRank($kmeansShowLevelRank)
  {
    $this->kmeansShowLevelRank = $kmeansShowLevelRank;
  }
  /**
   * @return string
   */
  public function getKmeansShowLevelRank()
  {
    return $this->kmeansShowLevelRank;
  }
  public function setLanguageMatch($languageMatch)
  {
    $this->languageMatch = $languageMatch;
  }
  public function getLanguageMatch()
  {
    return $this->languageMatch;
  }
  /**
   * @param bool
   */
  public function setLinkOwnershipVerified($linkOwnershipVerified)
  {
    $this->linkOwnershipVerified = $linkOwnershipVerified;
  }
  /**
   * @return bool
   */
  public function getLinkOwnershipVerified()
  {
    return $this->linkOwnershipVerified;
  }
  /**
   * @param int
   */
  public function setListenTimeMin($listenTimeMin)
  {
    $this->listenTimeMin = $listenTimeMin;
  }
  /**
   * @return int
   */
  public function getListenTimeMin()
  {
    return $this->listenTimeMin;
  }
  /**
   * @param string
   */
  public function setListenedShowLevelRank($listenedShowLevelRank)
  {
    $this->listenedShowLevelRank = $listenedShowLevelRank;
  }
  /**
   * @return string
   */
  public function getListenedShowLevelRank()
  {
    return $this->listenedShowLevelRank;
  }
  /**
   * @param float
   */
  public function setListenedShowListeningAffinity($listenedShowListeningAffinity)
  {
    $this->listenedShowListeningAffinity = $listenedShowListeningAffinity;
  }
  /**
   * @return float
   */
  public function getListenedShowListeningAffinity()
  {
    return $this->listenedShowListeningAffinity;
  }
  /**
   * @param string
   */
  public function setLocationFeatureId($locationFeatureId)
  {
    $this->locationFeatureId = $locationFeatureId;
  }
  /**
   * @return string
   */
  public function getLocationFeatureId()
  {
    return $this->locationFeatureId;
  }
  public function setLongUserListeningWebrefSimilarity($longUserListeningWebrefSimilarity)
  {
    $this->longUserListeningWebrefSimilarity = $longUserListeningWebrefSimilarity;
  }
  public function getLongUserListeningWebrefSimilarity()
  {
    return $this->longUserListeningWebrefSimilarity;
  }
  public function setMedicalScore($medicalScore)
  {
    $this->medicalScore = $medicalScore;
  }
  public function getMedicalScore()
  {
    return $this->medicalScore;
  }
  public function setMediumUserListeningWebrefSimilarity($mediumUserListeningWebrefSimilarity)
  {
    $this->mediumUserListeningWebrefSimilarity = $mediumUserListeningWebrefSimilarity;
  }
  public function getMediumUserListeningWebrefSimilarity()
  {
    return $this->mediumUserListeningWebrefSimilarity;
  }
  /**
   * @param float
   */
  public function setNegativeReactionBoostScore($negativeReactionBoostScore)
  {
    $this->negativeReactionBoostScore = $negativeReactionBoostScore;
  }
  /**
   * @return float
   */
  public function getNegativeReactionBoostScore()
  {
    return $this->negativeReactionBoostScore;
  }
  public function setNicheLift($nicheLift)
  {
    $this->nicheLift = $nicheLift;
  }
  public function getNicheLift()
  {
    return $this->nicheLift;
  }
  /**
   * @param string
   */
  public function setNumListenersInKmeansCluster($numListenersInKmeansCluster)
  {
    $this->numListenersInKmeansCluster = $numListenersInKmeansCluster;
  }
  /**
   * @return string
   */
  public function getNumListenersInKmeansCluster()
  {
    return $this->numListenersInKmeansCluster;
  }
  /**
   * @param string
   */
  public function setNumListenersToShowInKmeansCluster($numListenersToShowInKmeansCluster)
  {
    $this->numListenersToShowInKmeansCluster = $numListenersToShowInKmeansCluster;
  }
  /**
   * @return string
   */
  public function getNumListenersToShowInKmeansCluster()
  {
    return $this->numListenersToShowInKmeansCluster;
  }
  /**
   * @param int
   */
  public function setNumListens($numListens)
  {
    $this->numListens = $numListens;
  }
  /**
   * @return int
   */
  public function getNumListens()
  {
    return $this->numListens;
  }
  /**
   * @param string
   */
  public function setNumSubscribersShow($numSubscribersShow)
  {
    $this->numSubscribersShow = $numSubscribersShow;
  }
  /**
   * @return string
   */
  public function getNumSubscribersShow()
  {
    return $this->numSubscribersShow;
  }
  /**
   * @param string
   */
  public function setNumUniqueListenersShow($numUniqueListenersShow)
  {
    $this->numUniqueListenersShow = $numUniqueListenersShow;
  }
  /**
   * @return string
   */
  public function getNumUniqueListenersShow()
  {
    return $this->numUniqueListenersShow;
  }
  public function setOffensiveScore($offensiveScore)
  {
    $this->offensiveScore = $offensiveScore;
  }
  public function getOffensiveScore()
  {
    return $this->offensiveScore;
  }
  /**
   * @param float
   */
  public function setPeDurationScoreEpisode($peDurationScoreEpisode)
  {
    $this->peDurationScoreEpisode = $peDurationScoreEpisode;
  }
  /**
   * @return float
   */
  public function getPeDurationScoreEpisode()
  {
    return $this->peDurationScoreEpisode;
  }
  /**
   * @param float
   */
  public function setPeDurationScoreShow($peDurationScoreShow)
  {
    $this->peDurationScoreShow = $peDurationScoreShow;
  }
  /**
   * @return float
   */
  public function getPeDurationScoreShow()
  {
    return $this->peDurationScoreShow;
  }
  /**
   * @param float
   */
  public function setPeDurationTotalScoreEpisode($peDurationTotalScoreEpisode)
  {
    $this->peDurationTotalScoreEpisode = $peDurationTotalScoreEpisode;
  }
  /**
   * @return float
   */
  public function getPeDurationTotalScoreEpisode()
  {
    return $this->peDurationTotalScoreEpisode;
  }
  /**
   * @param float
   */
  public function setPeDurationTotalScoreShow($peDurationTotalScoreShow)
  {
    $this->peDurationTotalScoreShow = $peDurationTotalScoreShow;
  }
  /**
   * @return float
   */
  public function getPeDurationTotalScoreShow()
  {
    return $this->peDurationTotalScoreShow;
  }
  /**
   * @param float
   */
  public function setPeFractionScoreEpisode($peFractionScoreEpisode)
  {
    $this->peFractionScoreEpisode = $peFractionScoreEpisode;
  }
  /**
   * @return float
   */
  public function getPeFractionScoreEpisode()
  {
    return $this->peFractionScoreEpisode;
  }
  /**
   * @param float
   */
  public function setPeFractionScoreShow($peFractionScoreShow)
  {
    $this->peFractionScoreShow = $peFractionScoreShow;
  }
  /**
   * @return float
   */
  public function getPeFractionScoreShow()
  {
    return $this->peFractionScoreShow;
  }
  /**
   * @param float
   */
  public function setPeFractionTotalScoreEpisode($peFractionTotalScoreEpisode)
  {
    $this->peFractionTotalScoreEpisode = $peFractionTotalScoreEpisode;
  }
  /**
   * @return float
   */
  public function getPeFractionTotalScoreEpisode()
  {
    return $this->peFractionTotalScoreEpisode;
  }
  /**
   * @param float
   */
  public function setPeFractionTotalScoreShow($peFractionTotalScoreShow)
  {
    $this->peFractionTotalScoreShow = $peFractionTotalScoreShow;
  }
  /**
   * @return float
   */
  public function getPeFractionTotalScoreShow()
  {
    return $this->peFractionTotalScoreShow;
  }
  /**
   * @param float
   */
  public function setPeListenScoreEpisode($peListenScoreEpisode)
  {
    $this->peListenScoreEpisode = $peListenScoreEpisode;
  }
  /**
   * @return float
   */
  public function getPeListenScoreEpisode()
  {
    return $this->peListenScoreEpisode;
  }
  /**
   * @param float
   */
  public function setPeListenScoreShow($peListenScoreShow)
  {
    $this->peListenScoreShow = $peListenScoreShow;
  }
  /**
   * @return float
   */
  public function getPeListenScoreShow()
  {
    return $this->peListenScoreShow;
  }
  /**
   * @param float
   */
  public function setPeListenTotalScoreEpisode($peListenTotalScoreEpisode)
  {
    $this->peListenTotalScoreEpisode = $peListenTotalScoreEpisode;
  }
  /**
   * @return float
   */
  public function getPeListenTotalScoreEpisode()
  {
    return $this->peListenTotalScoreEpisode;
  }
  /**
   * @param float
   */
  public function setPeListenTotalScoreShow($peListenTotalScoreShow)
  {
    $this->peListenTotalScoreShow = $peListenTotalScoreShow;
  }
  /**
   * @return float
   */
  public function getPeListenTotalScoreShow()
  {
    return $this->peListenTotalScoreShow;
  }
  public function setPopularLift($popularLift)
  {
    $this->popularLift = $popularLift;
  }
  public function getPopularLift()
  {
    return $this->popularLift;
  }
  public function setPornScore($pornScore)
  {
    $this->pornScore = $pornScore;
  }
  public function getPornScore()
  {
    return $this->pornScore;
  }
  /**
   * @param float
   */
  public function setPositiveReactionBoostScore($positiveReactionBoostScore)
  {
    $this->positiveReactionBoostScore = $positiveReactionBoostScore;
  }
  /**
   * @return float
   */
  public function getPositiveReactionBoostScore()
  {
    return $this->positiveReactionBoostScore;
  }
  /**
   * @param string
   */
  public function setQueryLanguage($queryLanguage)
  {
    $this->queryLanguage = $queryLanguage;
  }
  /**
   * @return string
   */
  public function getQueryLanguage()
  {
    return $this->queryLanguage;
  }
  /**
   * @param string
   */
  public function setRank($rank)
  {
    $this->rank = $rank;
  }
  /**
   * @return string
   */
  public function getRank()
  {
    return $this->rank;
  }
  public function setRankPercentContrib($rankPercentContrib)
  {
    $this->rankPercentContrib = $rankPercentContrib;
  }
  public function getRankPercentContrib()
  {
    return $this->rankPercentContrib;
  }
  public function setRecentUserListeningWebrefSimilarity($recentUserListeningWebrefSimilarity)
  {
    $this->recentUserListeningWebrefSimilarity = $recentUserListeningWebrefSimilarity;
  }
  public function getRecentUserListeningWebrefSimilarity()
  {
    return $this->recentUserListeningWebrefSimilarity;
  }
  /**
   * @param string
   */
  public function setSecondsSincePublication($secondsSincePublication)
  {
    $this->secondsSincePublication = $secondsSincePublication;
  }
  /**
   * @return string
   */
  public function getSecondsSincePublication()
  {
    return $this->secondsSincePublication;
  }
  public function setShowBaseQuality($showBaseQuality)
  {
    $this->showBaseQuality = $showBaseQuality;
  }
  public function getShowBaseQuality()
  {
    return $this->showBaseQuality;
  }
  /**
   * @param string
   */
  public function setShowImpressions($showImpressions)
  {
    $this->showImpressions = $showImpressions;
  }
  /**
   * @return string
   */
  public function getShowImpressions()
  {
    return $this->showImpressions;
  }
  /**
   * @param string
   */
  public function setShowImpressionsPastWeek($showImpressionsPastWeek)
  {
    $this->showImpressionsPastWeek = $showImpressionsPastWeek;
  }
  /**
   * @return string
   */
  public function getShowImpressionsPastWeek()
  {
    return $this->showImpressionsPastWeek;
  }
  /**
   * @param string
   */
  public function setShowLanguage($showLanguage)
  {
    $this->showLanguage = $showLanguage;
  }
  /**
   * @return string
   */
  public function getShowLanguage()
  {
    return $this->showLanguage;
  }
  /**
   * @param string
   */
  public function setShowOnlyImpressions($showOnlyImpressions)
  {
    $this->showOnlyImpressions = $showOnlyImpressions;
  }
  /**
   * @return string
   */
  public function getShowOnlyImpressions()
  {
    return $this->showOnlyImpressions;
  }
  /**
   * @param string
   */
  public function setShowOnlyImpressionsPastWeek($showOnlyImpressionsPastWeek)
  {
    $this->showOnlyImpressionsPastWeek = $showOnlyImpressionsPastWeek;
  }
  /**
   * @return string
   */
  public function getShowOnlyImpressionsPastWeek()
  {
    return $this->showOnlyImpressionsPastWeek;
  }
  /**
   * @param string
   */
  public function setShowPopularRank($showPopularRank)
  {
    $this->showPopularRank = $showPopularRank;
  }
  /**
   * @return string
   */
  public function getShowPopularRank()
  {
    return $this->showPopularRank;
  }
  public function setSpoofScore($spoofScore)
  {
    $this->spoofScore = $spoofScore;
  }
  public function getSpoofScore()
  {
    return $this->spoofScore;
  }
  /**
   * @param float
   */
  public function setSubscribedShowListeningAffinity($subscribedShowListeningAffinity)
  {
    $this->subscribedShowListeningAffinity = $subscribedShowListeningAffinity;
  }
  /**
   * @return float
   */
  public function getSubscribedShowListeningAffinity()
  {
    return $this->subscribedShowListeningAffinity;
  }
  /**
   * @param string
   */
  public function setSubscriptionShowLevelRank($subscriptionShowLevelRank)
  {
    $this->subscriptionShowLevelRank = $subscriptionShowLevelRank;
  }
  /**
   * @return string
   */
  public function getSubscriptionShowLevelRank()
  {
    return $this->subscriptionShowLevelRank;
  }
  /**
   * @param string
   */
  public function setSurface($surface)
  {
    $this->surface = $surface;
  }
  /**
   * @return string
   */
  public function getSurface()
  {
    return $this->surface;
  }
  /**
   * @param string
   */
  public function setTrendingScorePercent($trendingScorePercent)
  {
    $this->trendingScorePercent = $trendingScorePercent;
  }
  /**
   * @return string
   */
  public function getTrendingScorePercent()
  {
    return $this->trendingScorePercent;
  }
  /**
   * @param SuperrootPodcastsRecommendationsPodcastRecsFeaturesUserLanguage[]
   */
  public function setUlpLanguage($ulpLanguage)
  {
    $this->ulpLanguage = $ulpLanguage;
  }
  /**
   * @return SuperrootPodcastsRecommendationsPodcastRecsFeaturesUserLanguage[]
   */
  public function getUlpLanguage()
  {
    return $this->ulpLanguage;
  }
  /**
   * @param float
   */
  public function setUlpLanguageMatch($ulpLanguageMatch)
  {
    $this->ulpLanguageMatch = $ulpLanguageMatch;
  }
  /**
   * @return float
   */
  public function getUlpLanguageMatch()
  {
    return $this->ulpLanguageMatch;
  }
  /**
   * @param float
   */
  public function setUserClusterDistance($userClusterDistance)
  {
    $this->userClusterDistance = $userClusterDistance;
  }
  /**
   * @return float
   */
  public function getUserClusterDistance()
  {
    return $this->userClusterDistance;
  }
  public function setUserInterestsSalientSimilarity($userInterestsSalientSimilarity)
  {
    $this->userInterestsSalientSimilarity = $userInterestsSalientSimilarity;
  }
  public function getUserInterestsSalientSimilarity()
  {
    return $this->userInterestsSalientSimilarity;
  }
  public function setUserInterestsWebrefSimilarity($userInterestsWebrefSimilarity)
  {
    $this->userInterestsWebrefSimilarity = $userInterestsWebrefSimilarity;
  }
  public function getUserInterestsWebrefSimilarity()
  {
    return $this->userInterestsWebrefSimilarity;
  }
  /**
   * @param SuperrootPodcastsRecommendationsPodcastRecsFeaturesUserLanguage[]
   */
  public function setUserLanguage($userLanguage)
  {
    $this->userLanguage = $userLanguage;
  }
  /**
   * @return SuperrootPodcastsRecommendationsPodcastRecsFeaturesUserLanguage[]
   */
  public function getUserLanguage()
  {
    return $this->userLanguage;
  }
  public function setViolenceScore($violenceScore)
  {
    $this->violenceScore = $violenceScore;
  }
  public function getViolenceScore()
  {
    return $this->violenceScore;
  }
  public function setVulgarScore($vulgarScore)
  {
    $this->vulgarScore = $vulgarScore;
  }
  public function getVulgarScore()
  {
    return $this->vulgarScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SuperrootPodcastsRecommendationsPodcastRecsFeatures::class, 'Google_Service_Contentwarehouse_SuperrootPodcastsRecommendationsPodcastRecsFeatures');
