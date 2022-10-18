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

class PerDocData extends \Google\Collection
{
  protected $collection_key = 'scienceHoldingsIds';
  protected $internal_gapi_mappings = [
        "blogData" => "BlogData",
        "bookCitationData" => "BookCitationData",
        "dEPRECATEDAuthorObfuscatedGaia" => "DEPRECATEDAuthorObfuscatedGaia",
        "dEPRECATEDQuarantineWhitelist" => "DEPRECATEDQuarantineWhitelist",
        "docLevelSpamScore" => "DocLevelSpamScore",
        "event" => "Event",
        "gibberishScore" => "GibberishScore",
        "groupsData" => "GroupsData",
        "isAnchorBayesSpam" => "IsAnchorBayesSpam",
        "keywordStuffingScore" => "KeywordStuffingScore",
        "mobileData" => "MobileData",
        "originalContentScore" => "OriginalContentScore",
        "premiumData" => "PremiumData",
        "quarantineInfo" => "QuarantineInfo",
        "scaledExptIndyRank" => "ScaledExptIndyRank",
        "scaledExptIndyRank2" => "ScaledExptIndyRank2",
        "scaledExptIndyRank3" => "ScaledExptIndyRank3",
        "scaledExptSpamScoreEric" => "ScaledExptSpamScoreEric",
        "scaledExptSpamScoreYoram" => "ScaledExptSpamScoreYoram",
        "scaledIndyRank" => "ScaledIndyRank",
        "scaledLinkAgeSpamScore" => "ScaledLinkAgeSpamScore",
        "scaledSpamScoreEric" => "ScaledSpamScoreEric",
        "scaledSpamScoreYoram" => "ScaledSpamScoreYoram",
        "scienceData" => "ScienceData",
        "spamWordScore" => "SpamWordScore",
        "tagPageScore" => "TagPageScore",
        "toolBarData" => "ToolBarData",
        "whirlpoolDiscount" => "WhirlpoolDiscount",
  ];
  protected $blogDataType = BlogPerDocData::class;
  protected $blogDataDataType = '';
  protected $bookCitationDataType = BookCitationPerDocData::class;
  protected $bookCitationDataDataType = '';
  /**
   * @var string[]
   */
  public $dEPRECATEDAuthorObfuscatedGaia;
  /**
   * @var bool
   */
  public $dEPRECATEDQuarantineWhitelist;
  /**
   * @var int
   */
  public $docLevelSpamScore;
  protected $eventType = PerDocDebugEvent::class;
  protected $eventDataType = 'array';
  /**
   * @var int
   */
  public $gibberishScore;
  protected $groupsDataType = GroupsPerDocData::class;
  protected $groupsDataDataType = '';
  /**
   * @var bool
   */
  public $isAnchorBayesSpam;
  /**
   * @var int
   */
  public $keywordStuffingScore;
  protected $mobileDataType = MobilePerDocData::class;
  protected $mobileDataDataType = '';
  /**
   * @var int
   */
  public $originalContentScore;
  protected $premiumDataType = PremiumPerDocData::class;
  protected $premiumDataDataType = '';
  /**
   * @var int
   */
  public $quarantineInfo;
  /**
   * @var int
   */
  public $scaledExptIndyRank;
  /**
   * @var int
   */
  public $scaledExptIndyRank2;
  /**
   * @var int
   */
  public $scaledExptIndyRank3;
  /**
   * @var int
   */
  public $scaledExptSpamScoreEric;
  /**
   * @var int
   */
  public $scaledExptSpamScoreYoram;
  /**
   * @var int
   */
  public $scaledIndyRank;
  /**
   * @var int
   */
  public $scaledLinkAgeSpamScore;
  /**
   * @var int
   */
  public $scaledSpamScoreEric;
  /**
   * @var int
   */
  public $scaledSpamScoreYoram;
  protected $scienceDataType = SciencePerDocData::class;
  protected $scienceDataDataType = '';
  /**
   * @var int
   */
  public $spamWordScore;
  /**
   * @var int
   */
  public $tagPageScore;
  protected $toolBarDataType = ToolBarPerDocData::class;
  protected $toolBarDataDataType = '';
  /**
   * @var float
   */
  public $whirlpoolDiscount;
  protected $appsLinkType = QualityCalypsoAppsLink::class;
  protected $appsLinkDataType = '';
  protected $asteroidBeltIntentsType = QualityOrbitAsteroidBeltDocumentIntentScores::class;
  protected $asteroidBeltIntentsDataType = '';
  /**
   * @var string[]
   */
  public $authorObfuscatedGaiaStr;
  protected $biasingdataType = BiasingPerDocData::class;
  protected $biasingdataDataType = '';
  protected $biasingdata2Type = BiasingPerDocData2::class;
  protected $biasingdata2DataType = '';
  /**
   * @var float
   */
  public $bodyWordsToTokensRatioBegin;
  /**
   * @var float
   */
  public $bodyWordsToTokensRatioTotal;
  protected $brainlocType = QualityGeoBrainlocBrainlocAttachment::class;
  protected $brainlocDataType = '';
  /**
   * @var float
   */
  public $commercialScore;
  protected $compressedQualitySignalsType = CompressedQualitySignals::class;
  protected $compressedQualitySignalsDataType = '';
  /**
   * @var string
   */
  public $compressedUrl;
  protected $contentAttributionsType = ContentAttributions::class;
  protected $contentAttributionsDataType = '';
  protected $countryInfoType = CountryCountryAttachment::class;
  protected $countryInfoDataType = '';
  /**
   * @var int
   */
  public $crawlPagerank;
  protected $crawlerIdProtoType = LogsProtoIndexingCrawlerIdCrawlerIdProto::class;
  protected $crawlerIdProtoDataType = '';
  protected $crowdingdataType = CrowdingPerDocData::class;
  protected $crowdingdataDataType = '';
  /**
   * @var string
   */
  public $datesInfo;
  protected $desktopInterstitialsType = IndexingMobileInterstitialsProtoDesktopInterstitials::class;
  protected $desktopInterstitialsDataType = '';
  /**
   * @var int
   */
  public $domainAge;
  /**
   * @var string[]
   */
  public $eventsDate;
  protected $extraDataType = Proto2BridgeMessageSet::class;
  protected $extraDataDataType = '';
  protected $fireflySiteSignalType = QualityCopiaFireflySiteSignal::class;
  protected $fireflySiteSignalDataType = '';
  /**
   * @var string
   */
  public $freshboxArticleScores;
  /**
   * @var string
   */
  public $freshnessEncodedSignals;
  protected $fringeQueryPriorType = QualityFringeFringeQueryPriorPerDocData::class;
  protected $fringeQueryPriorDataType = '';
  /**
   * @var string
   */
  public $geodata;
  /**
   * @var int
   */
  public $homePageInfo;
  /**
   * @var int
   */
  public $homepagePagerankNs;
  /**
   * @var int
   */
  public $hostAge;
  /**
   * @var string
   */
  public $hostNsr;
  protected $imagedataType = ImagePerDocData::class;
  protected $imagedataDataType = '';
  /**
   * @var bool
   */
  public $inNewsstand;
  /**
   * @var bool
   */
  public $isHotdoc;
  protected $kaltixdataType = KaltixPerDocData::class;
  protected $kaltixdataDataType = '';
  protected $knexAnnotationType = SocialPersonalizationKnexAnnotation::class;
  protected $knexAnnotationDataType = '';
  /**
   * @var int[]
   */
  public $languages;
  /**
   * @var string
   */
  public $lastSignificantUpdate;
  /**
   * @var string
   */
  public $lastSignificantUpdateInfo;
  protected $launchAppInfoType = QualityRichsnippetsAppsProtosLaunchAppInfoPerDocData::class;
  protected $launchAppInfoDataType = '';
  protected $liveResultsDataType = WeboftrustLiveResultsDocAttachments::class;
  protected $liveResultsDataDataType = '';
  protected $localizedClusterType = IndexingDupsLocalizedLocalizedCluster::class;
  protected $localizedClusterDataType = '';
  /**
   * @var int
   */
  public $noimageframeoverlayreason;
  protected $nsrDataProtoType = QualityNsrNsrData::class;
  protected $nsrDataProtoDataType = '';
  /**
   * @var bool
   */
  public $nsrIsCovidLocalAuthority;
  /**
   * @var bool
   */
  public $nsrIsElectionAuthority;
  /**
   * @var bool
   */
  public $nsrIsVideoFocusedSite;
  /**
   * @var string
   */
  public $nsrSitechunk;
  /**
   * @var int
   */
  public $numUrls;
  protected $oceandataType = OceanPerDocData::class;
  protected $oceandataDataType = '';
  /**
   * @var string
   */
  public $onsiteProminence;
  /**
   * @var int
   */
  public $origin;
  /**
   * @var int
   */
  public $originalTitleHardTokenCount;
  /**
   * @var int[]
   */
  public $pageTags;
  /**
   * @var float
   */
  public $pagerank;
  /**
   * @var float
   */
  public $pagerank0;
  /**
   * @var float
   */
  public $pagerank1;
  /**
   * @var float
   */
  public $pagerank2;
  /**
   * @var string
   */
  public $pageregions;
  protected $phildataType = PhilPerDocData::class;
  protected $phildataDataType = '';
  protected $productSitesInfoType = QualityProductProductSiteData::class;
  protected $productSitesInfoDataType = '';
  protected $queriesForWhichOfficialType = OfficialPagesQuerySet::class;
  protected $queriesForWhichOfficialDataType = '';
  /**
   * @var string[]
   */
  public $rosettaLanguages;
  protected $rsApplicationType = RepositoryAnnotationsRdfaRdfaRichSnippetsApplication::class;
  protected $rsApplicationDataType = '';
  /**
   * @var int[]
   */
  public $saftLanguageInt;
  /**
   * @var int
   */
  public $scaledSelectionTierRank;
  /**
   * @var int
   */
  public $scienceDoctype;
  /**
   * @var string[]
   */
  public $scienceHoldingsIds;
  /**
   * @var int
   */
  public $semanticDate;
  /**
   * @var int
   */
  public $semanticDateConfidence;
  /**
   * @var int
   */
  public $semanticDateInfo;
  protected $servingTimeClusterIdsType = IndexingDocjoinerServingTimeClusterIds::class;
  protected $servingTimeClusterIdsDataType = '';
  protected $shingleInfoType = ShingleInfoPerDocData::class;
  protected $shingleInfoDataType = '';
  protected $smartphoneDataType = SmartphonePerDocData::class;
  protected $smartphoneDataDataType = '';
  /**
   * @var int
   */
  public $smearingMaxTotalOffdomainAnchors;
  /**
   * @var string
   */
  public $socialgraphNodeNameFp;
  protected $spamCookbookActionType = SpamCookbookAction::class;
  protected $spamCookbookActionDataType = '';
  protected $spamMuppetSignalsType = SpamMuppetjoinsMuppetSignals::class;
  protected $spamMuppetSignalsDataType = '';
  /**
   * @var int
   */
  public $spamrank;
  /**
   * @var float
   */
  public $spamtokensContentScore;
  /**
   * @var string
   */
  public $timeSensitivity;
  /**
   * @var int
   */
  public $titleHardTokenCountWithoutStopwords;
  /**
   * @var int
   */
  public $toolbarPagerank;
  /**
   * @var int
   */
  public $topPetacatTaxId;
  /**
   * @var float
   */
  public $topPetacatWeight;
  protected $travelGoodSitesInfoType = QualityTravelGoodSitesData::class;
  protected $travelGoodSitesInfoDataType = '';
  /**
   * @var int
   */
  public $trendspamScore;
  /**
   * @var int
   */
  public $tundraClusterId;
  /**
   * @var int
   */
  public $uacSpamScore;
  /**
   * @var string
   */
  public $urlAfterRedirectsFp;
  protected $urlPoisoningDataType = UrlPoisoningData::class;
  protected $urlPoisoningDataDataType = '';
  protected $v2KnexAnnotationType = QualitySherlockKnexAnnotation::class;
  protected $v2KnexAnnotationDataType = '';
  /**
   * @var string
   */
  public $videoCorpusDocid;
  protected $videoLanguageType = QualityVidyaVideoLanguageVideoLanguage::class;
  protected $videoLanguageDataType = '';
  protected $videodataType = VideoPerDocData::class;
  protected $videodataDataType = '';
  protected $voltDataType = IndexingMobileVoltVoltPerDocData::class;
  protected $voltDataDataType = '';
  protected $watchpageLanguageResultType = WatchpageLanguageWatchPageLanguageResult::class;
  protected $watchpageLanguageResultDataType = '';
  /**
   * @var string
   */
  public $webmirrorEcnFp;
  protected $webrefEntitiesType = RepositoryWebrefWebrefMustangAttachment::class;
  protected $webrefEntitiesDataType = '';
  /**
   * @var string
   */
  public $ymylHealthScore;
  /**
   * @var string
   */
  public $ymylNewsScore;

  /**
   * @param BlogPerDocData
   */
  public function setBlogData(BlogPerDocData $blogData)
  {
    $this->blogData = $blogData;
  }
  /**
   * @return BlogPerDocData
   */
  public function getBlogData()
  {
    return $this->blogData;
  }
  /**
   * @param BookCitationPerDocData
   */
  public function setBookCitationData(BookCitationPerDocData $bookCitationData)
  {
    $this->bookCitationData = $bookCitationData;
  }
  /**
   * @return BookCitationPerDocData
   */
  public function getBookCitationData()
  {
    return $this->bookCitationData;
  }
  /**
   * @param string[]
   */
  public function setDEPRECATEDAuthorObfuscatedGaia($dEPRECATEDAuthorObfuscatedGaia)
  {
    $this->dEPRECATEDAuthorObfuscatedGaia = $dEPRECATEDAuthorObfuscatedGaia;
  }
  /**
   * @return string[]
   */
  public function getDEPRECATEDAuthorObfuscatedGaia()
  {
    return $this->dEPRECATEDAuthorObfuscatedGaia;
  }
  /**
   * @param bool
   */
  public function setDEPRECATEDQuarantineWhitelist($dEPRECATEDQuarantineWhitelist)
  {
    $this->dEPRECATEDQuarantineWhitelist = $dEPRECATEDQuarantineWhitelist;
  }
  /**
   * @return bool
   */
  public function getDEPRECATEDQuarantineWhitelist()
  {
    return $this->dEPRECATEDQuarantineWhitelist;
  }
  /**
   * @param int
   */
  public function setDocLevelSpamScore($docLevelSpamScore)
  {
    $this->docLevelSpamScore = $docLevelSpamScore;
  }
  /**
   * @return int
   */
  public function getDocLevelSpamScore()
  {
    return $this->docLevelSpamScore;
  }
  /**
   * @param PerDocDebugEvent[]
   */
  public function setEvent($event)
  {
    $this->event = $event;
  }
  /**
   * @return PerDocDebugEvent[]
   */
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param int
   */
  public function setGibberishScore($gibberishScore)
  {
    $this->gibberishScore = $gibberishScore;
  }
  /**
   * @return int
   */
  public function getGibberishScore()
  {
    return $this->gibberishScore;
  }
  /**
   * @param GroupsPerDocData
   */
  public function setGroupsData(GroupsPerDocData $groupsData)
  {
    $this->groupsData = $groupsData;
  }
  /**
   * @return GroupsPerDocData
   */
  public function getGroupsData()
  {
    return $this->groupsData;
  }
  /**
   * @param bool
   */
  public function setIsAnchorBayesSpam($isAnchorBayesSpam)
  {
    $this->isAnchorBayesSpam = $isAnchorBayesSpam;
  }
  /**
   * @return bool
   */
  public function getIsAnchorBayesSpam()
  {
    return $this->isAnchorBayesSpam;
  }
  /**
   * @param int
   */
  public function setKeywordStuffingScore($keywordStuffingScore)
  {
    $this->keywordStuffingScore = $keywordStuffingScore;
  }
  /**
   * @return int
   */
  public function getKeywordStuffingScore()
  {
    return $this->keywordStuffingScore;
  }
  /**
   * @param MobilePerDocData
   */
  public function setMobileData(MobilePerDocData $mobileData)
  {
    $this->mobileData = $mobileData;
  }
  /**
   * @return MobilePerDocData
   */
  public function getMobileData()
  {
    return $this->mobileData;
  }
  /**
   * @param int
   */
  public function setOriginalContentScore($originalContentScore)
  {
    $this->originalContentScore = $originalContentScore;
  }
  /**
   * @return int
   */
  public function getOriginalContentScore()
  {
    return $this->originalContentScore;
  }
  /**
   * @param PremiumPerDocData
   */
  public function setPremiumData(PremiumPerDocData $premiumData)
  {
    $this->premiumData = $premiumData;
  }
  /**
   * @return PremiumPerDocData
   */
  public function getPremiumData()
  {
    return $this->premiumData;
  }
  /**
   * @param int
   */
  public function setQuarantineInfo($quarantineInfo)
  {
    $this->quarantineInfo = $quarantineInfo;
  }
  /**
   * @return int
   */
  public function getQuarantineInfo()
  {
    return $this->quarantineInfo;
  }
  /**
   * @param int
   */
  public function setScaledExptIndyRank($scaledExptIndyRank)
  {
    $this->scaledExptIndyRank = $scaledExptIndyRank;
  }
  /**
   * @return int
   */
  public function getScaledExptIndyRank()
  {
    return $this->scaledExptIndyRank;
  }
  /**
   * @param int
   */
  public function setScaledExptIndyRank2($scaledExptIndyRank2)
  {
    $this->scaledExptIndyRank2 = $scaledExptIndyRank2;
  }
  /**
   * @return int
   */
  public function getScaledExptIndyRank2()
  {
    return $this->scaledExptIndyRank2;
  }
  /**
   * @param int
   */
  public function setScaledExptIndyRank3($scaledExptIndyRank3)
  {
    $this->scaledExptIndyRank3 = $scaledExptIndyRank3;
  }
  /**
   * @return int
   */
  public function getScaledExptIndyRank3()
  {
    return $this->scaledExptIndyRank3;
  }
  /**
   * @param int
   */
  public function setScaledExptSpamScoreEric($scaledExptSpamScoreEric)
  {
    $this->scaledExptSpamScoreEric = $scaledExptSpamScoreEric;
  }
  /**
   * @return int
   */
  public function getScaledExptSpamScoreEric()
  {
    return $this->scaledExptSpamScoreEric;
  }
  /**
   * @param int
   */
  public function setScaledExptSpamScoreYoram($scaledExptSpamScoreYoram)
  {
    $this->scaledExptSpamScoreYoram = $scaledExptSpamScoreYoram;
  }
  /**
   * @return int
   */
  public function getScaledExptSpamScoreYoram()
  {
    return $this->scaledExptSpamScoreYoram;
  }
  /**
   * @param int
   */
  public function setScaledIndyRank($scaledIndyRank)
  {
    $this->scaledIndyRank = $scaledIndyRank;
  }
  /**
   * @return int
   */
  public function getScaledIndyRank()
  {
    return $this->scaledIndyRank;
  }
  /**
   * @param int
   */
  public function setScaledLinkAgeSpamScore($scaledLinkAgeSpamScore)
  {
    $this->scaledLinkAgeSpamScore = $scaledLinkAgeSpamScore;
  }
  /**
   * @return int
   */
  public function getScaledLinkAgeSpamScore()
  {
    return $this->scaledLinkAgeSpamScore;
  }
  /**
   * @param int
   */
  public function setScaledSpamScoreEric($scaledSpamScoreEric)
  {
    $this->scaledSpamScoreEric = $scaledSpamScoreEric;
  }
  /**
   * @return int
   */
  public function getScaledSpamScoreEric()
  {
    return $this->scaledSpamScoreEric;
  }
  /**
   * @param int
   */
  public function setScaledSpamScoreYoram($scaledSpamScoreYoram)
  {
    $this->scaledSpamScoreYoram = $scaledSpamScoreYoram;
  }
  /**
   * @return int
   */
  public function getScaledSpamScoreYoram()
  {
    return $this->scaledSpamScoreYoram;
  }
  /**
   * @param SciencePerDocData
   */
  public function setScienceData(SciencePerDocData $scienceData)
  {
    $this->scienceData = $scienceData;
  }
  /**
   * @return SciencePerDocData
   */
  public function getScienceData()
  {
    return $this->scienceData;
  }
  /**
   * @param int
   */
  public function setSpamWordScore($spamWordScore)
  {
    $this->spamWordScore = $spamWordScore;
  }
  /**
   * @return int
   */
  public function getSpamWordScore()
  {
    return $this->spamWordScore;
  }
  /**
   * @param int
   */
  public function setTagPageScore($tagPageScore)
  {
    $this->tagPageScore = $tagPageScore;
  }
  /**
   * @return int
   */
  public function getTagPageScore()
  {
    return $this->tagPageScore;
  }
  /**
   * @param ToolBarPerDocData
   */
  public function setToolBarData(ToolBarPerDocData $toolBarData)
  {
    $this->toolBarData = $toolBarData;
  }
  /**
   * @return ToolBarPerDocData
   */
  public function getToolBarData()
  {
    return $this->toolBarData;
  }
  /**
   * @param float
   */
  public function setWhirlpoolDiscount($whirlpoolDiscount)
  {
    $this->whirlpoolDiscount = $whirlpoolDiscount;
  }
  /**
   * @return float
   */
  public function getWhirlpoolDiscount()
  {
    return $this->whirlpoolDiscount;
  }
  /**
   * @param QualityCalypsoAppsLink
   */
  public function setAppsLink(QualityCalypsoAppsLink $appsLink)
  {
    $this->appsLink = $appsLink;
  }
  /**
   * @return QualityCalypsoAppsLink
   */
  public function getAppsLink()
  {
    return $this->appsLink;
  }
  /**
   * @param QualityOrbitAsteroidBeltDocumentIntentScores
   */
  public function setAsteroidBeltIntents(QualityOrbitAsteroidBeltDocumentIntentScores $asteroidBeltIntents)
  {
    $this->asteroidBeltIntents = $asteroidBeltIntents;
  }
  /**
   * @return QualityOrbitAsteroidBeltDocumentIntentScores
   */
  public function getAsteroidBeltIntents()
  {
    return $this->asteroidBeltIntents;
  }
  /**
   * @param string[]
   */
  public function setAuthorObfuscatedGaiaStr($authorObfuscatedGaiaStr)
  {
    $this->authorObfuscatedGaiaStr = $authorObfuscatedGaiaStr;
  }
  /**
   * @return string[]
   */
  public function getAuthorObfuscatedGaiaStr()
  {
    return $this->authorObfuscatedGaiaStr;
  }
  /**
   * @param BiasingPerDocData
   */
  public function setBiasingdata(BiasingPerDocData $biasingdata)
  {
    $this->biasingdata = $biasingdata;
  }
  /**
   * @return BiasingPerDocData
   */
  public function getBiasingdata()
  {
    return $this->biasingdata;
  }
  /**
   * @param BiasingPerDocData2
   */
  public function setBiasingdata2(BiasingPerDocData2 $biasingdata2)
  {
    $this->biasingdata2 = $biasingdata2;
  }
  /**
   * @return BiasingPerDocData2
   */
  public function getBiasingdata2()
  {
    return $this->biasingdata2;
  }
  /**
   * @param float
   */
  public function setBodyWordsToTokensRatioBegin($bodyWordsToTokensRatioBegin)
  {
    $this->bodyWordsToTokensRatioBegin = $bodyWordsToTokensRatioBegin;
  }
  /**
   * @return float
   */
  public function getBodyWordsToTokensRatioBegin()
  {
    return $this->bodyWordsToTokensRatioBegin;
  }
  /**
   * @param float
   */
  public function setBodyWordsToTokensRatioTotal($bodyWordsToTokensRatioTotal)
  {
    $this->bodyWordsToTokensRatioTotal = $bodyWordsToTokensRatioTotal;
  }
  /**
   * @return float
   */
  public function getBodyWordsToTokensRatioTotal()
  {
    return $this->bodyWordsToTokensRatioTotal;
  }
  /**
   * @param QualityGeoBrainlocBrainlocAttachment
   */
  public function setBrainloc(QualityGeoBrainlocBrainlocAttachment $brainloc)
  {
    $this->brainloc = $brainloc;
  }
  /**
   * @return QualityGeoBrainlocBrainlocAttachment
   */
  public function getBrainloc()
  {
    return $this->brainloc;
  }
  /**
   * @param float
   */
  public function setCommercialScore($commercialScore)
  {
    $this->commercialScore = $commercialScore;
  }
  /**
   * @return float
   */
  public function getCommercialScore()
  {
    return $this->commercialScore;
  }
  /**
   * @param CompressedQualitySignals
   */
  public function setCompressedQualitySignals(CompressedQualitySignals $compressedQualitySignals)
  {
    $this->compressedQualitySignals = $compressedQualitySignals;
  }
  /**
   * @return CompressedQualitySignals
   */
  public function getCompressedQualitySignals()
  {
    return $this->compressedQualitySignals;
  }
  /**
   * @param string
   */
  public function setCompressedUrl($compressedUrl)
  {
    $this->compressedUrl = $compressedUrl;
  }
  /**
   * @return string
   */
  public function getCompressedUrl()
  {
    return $this->compressedUrl;
  }
  /**
   * @param ContentAttributions
   */
  public function setContentAttributions(ContentAttributions $contentAttributions)
  {
    $this->contentAttributions = $contentAttributions;
  }
  /**
   * @return ContentAttributions
   */
  public function getContentAttributions()
  {
    return $this->contentAttributions;
  }
  /**
   * @param CountryCountryAttachment
   */
  public function setCountryInfo(CountryCountryAttachment $countryInfo)
  {
    $this->countryInfo = $countryInfo;
  }
  /**
   * @return CountryCountryAttachment
   */
  public function getCountryInfo()
  {
    return $this->countryInfo;
  }
  /**
   * @param int
   */
  public function setCrawlPagerank($crawlPagerank)
  {
    $this->crawlPagerank = $crawlPagerank;
  }
  /**
   * @return int
   */
  public function getCrawlPagerank()
  {
    return $this->crawlPagerank;
  }
  /**
   * @param LogsProtoIndexingCrawlerIdCrawlerIdProto
   */
  public function setCrawlerIdProto(LogsProtoIndexingCrawlerIdCrawlerIdProto $crawlerIdProto)
  {
    $this->crawlerIdProto = $crawlerIdProto;
  }
  /**
   * @return LogsProtoIndexingCrawlerIdCrawlerIdProto
   */
  public function getCrawlerIdProto()
  {
    return $this->crawlerIdProto;
  }
  /**
   * @param CrowdingPerDocData
   */
  public function setCrowdingdata(CrowdingPerDocData $crowdingdata)
  {
    $this->crowdingdata = $crowdingdata;
  }
  /**
   * @return CrowdingPerDocData
   */
  public function getCrowdingdata()
  {
    return $this->crowdingdata;
  }
  /**
   * @param string
   */
  public function setDatesInfo($datesInfo)
  {
    $this->datesInfo = $datesInfo;
  }
  /**
   * @return string
   */
  public function getDatesInfo()
  {
    return $this->datesInfo;
  }
  /**
   * @param IndexingMobileInterstitialsProtoDesktopInterstitials
   */
  public function setDesktopInterstitials(IndexingMobileInterstitialsProtoDesktopInterstitials $desktopInterstitials)
  {
    $this->desktopInterstitials = $desktopInterstitials;
  }
  /**
   * @return IndexingMobileInterstitialsProtoDesktopInterstitials
   */
  public function getDesktopInterstitials()
  {
    return $this->desktopInterstitials;
  }
  /**
   * @param int
   */
  public function setDomainAge($domainAge)
  {
    $this->domainAge = $domainAge;
  }
  /**
   * @return int
   */
  public function getDomainAge()
  {
    return $this->domainAge;
  }
  /**
   * @param string[]
   */
  public function setEventsDate($eventsDate)
  {
    $this->eventsDate = $eventsDate;
  }
  /**
   * @return string[]
   */
  public function getEventsDate()
  {
    return $this->eventsDate;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setExtraData(Proto2BridgeMessageSet $extraData)
  {
    $this->extraData = $extraData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getExtraData()
  {
    return $this->extraData;
  }
  /**
   * @param QualityCopiaFireflySiteSignal
   */
  public function setFireflySiteSignal(QualityCopiaFireflySiteSignal $fireflySiteSignal)
  {
    $this->fireflySiteSignal = $fireflySiteSignal;
  }
  /**
   * @return QualityCopiaFireflySiteSignal
   */
  public function getFireflySiteSignal()
  {
    return $this->fireflySiteSignal;
  }
  /**
   * @param string
   */
  public function setFreshboxArticleScores($freshboxArticleScores)
  {
    $this->freshboxArticleScores = $freshboxArticleScores;
  }
  /**
   * @return string
   */
  public function getFreshboxArticleScores()
  {
    return $this->freshboxArticleScores;
  }
  /**
   * @param string
   */
  public function setFreshnessEncodedSignals($freshnessEncodedSignals)
  {
    $this->freshnessEncodedSignals = $freshnessEncodedSignals;
  }
  /**
   * @return string
   */
  public function getFreshnessEncodedSignals()
  {
    return $this->freshnessEncodedSignals;
  }
  /**
   * @param QualityFringeFringeQueryPriorPerDocData
   */
  public function setFringeQueryPrior(QualityFringeFringeQueryPriorPerDocData $fringeQueryPrior)
  {
    $this->fringeQueryPrior = $fringeQueryPrior;
  }
  /**
   * @return QualityFringeFringeQueryPriorPerDocData
   */
  public function getFringeQueryPrior()
  {
    return $this->fringeQueryPrior;
  }
  /**
   * @param string
   */
  public function setGeodata($geodata)
  {
    $this->geodata = $geodata;
  }
  /**
   * @return string
   */
  public function getGeodata()
  {
    return $this->geodata;
  }
  /**
   * @param int
   */
  public function setHomePageInfo($homePageInfo)
  {
    $this->homePageInfo = $homePageInfo;
  }
  /**
   * @return int
   */
  public function getHomePageInfo()
  {
    return $this->homePageInfo;
  }
  /**
   * @param int
   */
  public function setHomepagePagerankNs($homepagePagerankNs)
  {
    $this->homepagePagerankNs = $homepagePagerankNs;
  }
  /**
   * @return int
   */
  public function getHomepagePagerankNs()
  {
    return $this->homepagePagerankNs;
  }
  /**
   * @param int
   */
  public function setHostAge($hostAge)
  {
    $this->hostAge = $hostAge;
  }
  /**
   * @return int
   */
  public function getHostAge()
  {
    return $this->hostAge;
  }
  /**
   * @param string
   */
  public function setHostNsr($hostNsr)
  {
    $this->hostNsr = $hostNsr;
  }
  /**
   * @return string
   */
  public function getHostNsr()
  {
    return $this->hostNsr;
  }
  /**
   * @param ImagePerDocData
   */
  public function setImagedata(ImagePerDocData $imagedata)
  {
    $this->imagedata = $imagedata;
  }
  /**
   * @return ImagePerDocData
   */
  public function getImagedata()
  {
    return $this->imagedata;
  }
  /**
   * @param bool
   */
  public function setInNewsstand($inNewsstand)
  {
    $this->inNewsstand = $inNewsstand;
  }
  /**
   * @return bool
   */
  public function getInNewsstand()
  {
    return $this->inNewsstand;
  }
  /**
   * @param bool
   */
  public function setIsHotdoc($isHotdoc)
  {
    $this->isHotdoc = $isHotdoc;
  }
  /**
   * @return bool
   */
  public function getIsHotdoc()
  {
    return $this->isHotdoc;
  }
  /**
   * @param KaltixPerDocData
   */
  public function setKaltixdata(KaltixPerDocData $kaltixdata)
  {
    $this->kaltixdata = $kaltixdata;
  }
  /**
   * @return KaltixPerDocData
   */
  public function getKaltixdata()
  {
    return $this->kaltixdata;
  }
  /**
   * @param SocialPersonalizationKnexAnnotation
   */
  public function setKnexAnnotation(SocialPersonalizationKnexAnnotation $knexAnnotation)
  {
    $this->knexAnnotation = $knexAnnotation;
  }
  /**
   * @return SocialPersonalizationKnexAnnotation
   */
  public function getKnexAnnotation()
  {
    return $this->knexAnnotation;
  }
  /**
   * @param int[]
   */
  public function setLanguages($languages)
  {
    $this->languages = $languages;
  }
  /**
   * @return int[]
   */
  public function getLanguages()
  {
    return $this->languages;
  }
  /**
   * @param string
   */
  public function setLastSignificantUpdate($lastSignificantUpdate)
  {
    $this->lastSignificantUpdate = $lastSignificantUpdate;
  }
  /**
   * @return string
   */
  public function getLastSignificantUpdate()
  {
    return $this->lastSignificantUpdate;
  }
  /**
   * @param string
   */
  public function setLastSignificantUpdateInfo($lastSignificantUpdateInfo)
  {
    $this->lastSignificantUpdateInfo = $lastSignificantUpdateInfo;
  }
  /**
   * @return string
   */
  public function getLastSignificantUpdateInfo()
  {
    return $this->lastSignificantUpdateInfo;
  }
  /**
   * @param QualityRichsnippetsAppsProtosLaunchAppInfoPerDocData
   */
  public function setLaunchAppInfo(QualityRichsnippetsAppsProtosLaunchAppInfoPerDocData $launchAppInfo)
  {
    $this->launchAppInfo = $launchAppInfo;
  }
  /**
   * @return QualityRichsnippetsAppsProtosLaunchAppInfoPerDocData
   */
  public function getLaunchAppInfo()
  {
    return $this->launchAppInfo;
  }
  /**
   * @param WeboftrustLiveResultsDocAttachments
   */
  public function setLiveResultsData(WeboftrustLiveResultsDocAttachments $liveResultsData)
  {
    $this->liveResultsData = $liveResultsData;
  }
  /**
   * @return WeboftrustLiveResultsDocAttachments
   */
  public function getLiveResultsData()
  {
    return $this->liveResultsData;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedCluster
   */
  public function setLocalizedCluster(IndexingDupsLocalizedLocalizedCluster $localizedCluster)
  {
    $this->localizedCluster = $localizedCluster;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedCluster
   */
  public function getLocalizedCluster()
  {
    return $this->localizedCluster;
  }
  /**
   * @param int
   */
  public function setNoimageframeoverlayreason($noimageframeoverlayreason)
  {
    $this->noimageframeoverlayreason = $noimageframeoverlayreason;
  }
  /**
   * @return int
   */
  public function getNoimageframeoverlayreason()
  {
    return $this->noimageframeoverlayreason;
  }
  /**
   * @param QualityNsrNsrData
   */
  public function setNsrDataProto(QualityNsrNsrData $nsrDataProto)
  {
    $this->nsrDataProto = $nsrDataProto;
  }
  /**
   * @return QualityNsrNsrData
   */
  public function getNsrDataProto()
  {
    return $this->nsrDataProto;
  }
  /**
   * @param bool
   */
  public function setNsrIsCovidLocalAuthority($nsrIsCovidLocalAuthority)
  {
    $this->nsrIsCovidLocalAuthority = $nsrIsCovidLocalAuthority;
  }
  /**
   * @return bool
   */
  public function getNsrIsCovidLocalAuthority()
  {
    return $this->nsrIsCovidLocalAuthority;
  }
  /**
   * @param bool
   */
  public function setNsrIsElectionAuthority($nsrIsElectionAuthority)
  {
    $this->nsrIsElectionAuthority = $nsrIsElectionAuthority;
  }
  /**
   * @return bool
   */
  public function getNsrIsElectionAuthority()
  {
    return $this->nsrIsElectionAuthority;
  }
  /**
   * @param bool
   */
  public function setNsrIsVideoFocusedSite($nsrIsVideoFocusedSite)
  {
    $this->nsrIsVideoFocusedSite = $nsrIsVideoFocusedSite;
  }
  /**
   * @return bool
   */
  public function getNsrIsVideoFocusedSite()
  {
    return $this->nsrIsVideoFocusedSite;
  }
  /**
   * @param string
   */
  public function setNsrSitechunk($nsrSitechunk)
  {
    $this->nsrSitechunk = $nsrSitechunk;
  }
  /**
   * @return string
   */
  public function getNsrSitechunk()
  {
    return $this->nsrSitechunk;
  }
  /**
   * @param int
   */
  public function setNumUrls($numUrls)
  {
    $this->numUrls = $numUrls;
  }
  /**
   * @return int
   */
  public function getNumUrls()
  {
    return $this->numUrls;
  }
  /**
   * @param OceanPerDocData
   */
  public function setOceandata(OceanPerDocData $oceandata)
  {
    $this->oceandata = $oceandata;
  }
  /**
   * @return OceanPerDocData
   */
  public function getOceandata()
  {
    return $this->oceandata;
  }
  /**
   * @param string
   */
  public function setOnsiteProminence($onsiteProminence)
  {
    $this->onsiteProminence = $onsiteProminence;
  }
  /**
   * @return string
   */
  public function getOnsiteProminence()
  {
    return $this->onsiteProminence;
  }
  /**
   * @param int
   */
  public function setOrigin($origin)
  {
    $this->origin = $origin;
  }
  /**
   * @return int
   */
  public function getOrigin()
  {
    return $this->origin;
  }
  /**
   * @param int
   */
  public function setOriginalTitleHardTokenCount($originalTitleHardTokenCount)
  {
    $this->originalTitleHardTokenCount = $originalTitleHardTokenCount;
  }
  /**
   * @return int
   */
  public function getOriginalTitleHardTokenCount()
  {
    return $this->originalTitleHardTokenCount;
  }
  /**
   * @param int[]
   */
  public function setPageTags($pageTags)
  {
    $this->pageTags = $pageTags;
  }
  /**
   * @return int[]
   */
  public function getPageTags()
  {
    return $this->pageTags;
  }
  /**
   * @param float
   */
  public function setPagerank($pagerank)
  {
    $this->pagerank = $pagerank;
  }
  /**
   * @return float
   */
  public function getPagerank()
  {
    return $this->pagerank;
  }
  /**
   * @param float
   */
  public function setPagerank0($pagerank0)
  {
    $this->pagerank0 = $pagerank0;
  }
  /**
   * @return float
   */
  public function getPagerank0()
  {
    return $this->pagerank0;
  }
  /**
   * @param float
   */
  public function setPagerank1($pagerank1)
  {
    $this->pagerank1 = $pagerank1;
  }
  /**
   * @return float
   */
  public function getPagerank1()
  {
    return $this->pagerank1;
  }
  /**
   * @param float
   */
  public function setPagerank2($pagerank2)
  {
    $this->pagerank2 = $pagerank2;
  }
  /**
   * @return float
   */
  public function getPagerank2()
  {
    return $this->pagerank2;
  }
  /**
   * @param string
   */
  public function setPageregions($pageregions)
  {
    $this->pageregions = $pageregions;
  }
  /**
   * @return string
   */
  public function getPageregions()
  {
    return $this->pageregions;
  }
  /**
   * @param PhilPerDocData
   */
  public function setPhildata(PhilPerDocData $phildata)
  {
    $this->phildata = $phildata;
  }
  /**
   * @return PhilPerDocData
   */
  public function getPhildata()
  {
    return $this->phildata;
  }
  /**
   * @param QualityProductProductSiteData
   */
  public function setProductSitesInfo(QualityProductProductSiteData $productSitesInfo)
  {
    $this->productSitesInfo = $productSitesInfo;
  }
  /**
   * @return QualityProductProductSiteData
   */
  public function getProductSitesInfo()
  {
    return $this->productSitesInfo;
  }
  /**
   * @param OfficialPagesQuerySet
   */
  public function setQueriesForWhichOfficial(OfficialPagesQuerySet $queriesForWhichOfficial)
  {
    $this->queriesForWhichOfficial = $queriesForWhichOfficial;
  }
  /**
   * @return OfficialPagesQuerySet
   */
  public function getQueriesForWhichOfficial()
  {
    return $this->queriesForWhichOfficial;
  }
  /**
   * @param string[]
   */
  public function setRosettaLanguages($rosettaLanguages)
  {
    $this->rosettaLanguages = $rosettaLanguages;
  }
  /**
   * @return string[]
   */
  public function getRosettaLanguages()
  {
    return $this->rosettaLanguages;
  }
  /**
   * @param RepositoryAnnotationsRdfaRdfaRichSnippetsApplication
   */
  public function setRsApplication(RepositoryAnnotationsRdfaRdfaRichSnippetsApplication $rsApplication)
  {
    $this->rsApplication = $rsApplication;
  }
  /**
   * @return RepositoryAnnotationsRdfaRdfaRichSnippetsApplication
   */
  public function getRsApplication()
  {
    return $this->rsApplication;
  }
  /**
   * @param int[]
   */
  public function setSaftLanguageInt($saftLanguageInt)
  {
    $this->saftLanguageInt = $saftLanguageInt;
  }
  /**
   * @return int[]
   */
  public function getSaftLanguageInt()
  {
    return $this->saftLanguageInt;
  }
  /**
   * @param int
   */
  public function setScaledSelectionTierRank($scaledSelectionTierRank)
  {
    $this->scaledSelectionTierRank = $scaledSelectionTierRank;
  }
  /**
   * @return int
   */
  public function getScaledSelectionTierRank()
  {
    return $this->scaledSelectionTierRank;
  }
  /**
   * @param int
   */
  public function setScienceDoctype($scienceDoctype)
  {
    $this->scienceDoctype = $scienceDoctype;
  }
  /**
   * @return int
   */
  public function getScienceDoctype()
  {
    return $this->scienceDoctype;
  }
  /**
   * @param string[]
   */
  public function setScienceHoldingsIds($scienceHoldingsIds)
  {
    $this->scienceHoldingsIds = $scienceHoldingsIds;
  }
  /**
   * @return string[]
   */
  public function getScienceHoldingsIds()
  {
    return $this->scienceHoldingsIds;
  }
  /**
   * @param int
   */
  public function setSemanticDate($semanticDate)
  {
    $this->semanticDate = $semanticDate;
  }
  /**
   * @return int
   */
  public function getSemanticDate()
  {
    return $this->semanticDate;
  }
  /**
   * @param int
   */
  public function setSemanticDateConfidence($semanticDateConfidence)
  {
    $this->semanticDateConfidence = $semanticDateConfidence;
  }
  /**
   * @return int
   */
  public function getSemanticDateConfidence()
  {
    return $this->semanticDateConfidence;
  }
  /**
   * @param int
   */
  public function setSemanticDateInfo($semanticDateInfo)
  {
    $this->semanticDateInfo = $semanticDateInfo;
  }
  /**
   * @return int
   */
  public function getSemanticDateInfo()
  {
    return $this->semanticDateInfo;
  }
  /**
   * @param IndexingDocjoinerServingTimeClusterIds
   */
  public function setServingTimeClusterIds(IndexingDocjoinerServingTimeClusterIds $servingTimeClusterIds)
  {
    $this->servingTimeClusterIds = $servingTimeClusterIds;
  }
  /**
   * @return IndexingDocjoinerServingTimeClusterIds
   */
  public function getServingTimeClusterIds()
  {
    return $this->servingTimeClusterIds;
  }
  /**
   * @param ShingleInfoPerDocData
   */
  public function setShingleInfo(ShingleInfoPerDocData $shingleInfo)
  {
    $this->shingleInfo = $shingleInfo;
  }
  /**
   * @return ShingleInfoPerDocData
   */
  public function getShingleInfo()
  {
    return $this->shingleInfo;
  }
  /**
   * @param SmartphonePerDocData
   */
  public function setSmartphoneData(SmartphonePerDocData $smartphoneData)
  {
    $this->smartphoneData = $smartphoneData;
  }
  /**
   * @return SmartphonePerDocData
   */
  public function getSmartphoneData()
  {
    return $this->smartphoneData;
  }
  /**
   * @param int
   */
  public function setSmearingMaxTotalOffdomainAnchors($smearingMaxTotalOffdomainAnchors)
  {
    $this->smearingMaxTotalOffdomainAnchors = $smearingMaxTotalOffdomainAnchors;
  }
  /**
   * @return int
   */
  public function getSmearingMaxTotalOffdomainAnchors()
  {
    return $this->smearingMaxTotalOffdomainAnchors;
  }
  /**
   * @param string
   */
  public function setSocialgraphNodeNameFp($socialgraphNodeNameFp)
  {
    $this->socialgraphNodeNameFp = $socialgraphNodeNameFp;
  }
  /**
   * @return string
   */
  public function getSocialgraphNodeNameFp()
  {
    return $this->socialgraphNodeNameFp;
  }
  /**
   * @param SpamCookbookAction
   */
  public function setSpamCookbookAction(SpamCookbookAction $spamCookbookAction)
  {
    $this->spamCookbookAction = $spamCookbookAction;
  }
  /**
   * @return SpamCookbookAction
   */
  public function getSpamCookbookAction()
  {
    return $this->spamCookbookAction;
  }
  /**
   * @param SpamMuppetjoinsMuppetSignals
   */
  public function setSpamMuppetSignals(SpamMuppetjoinsMuppetSignals $spamMuppetSignals)
  {
    $this->spamMuppetSignals = $spamMuppetSignals;
  }
  /**
   * @return SpamMuppetjoinsMuppetSignals
   */
  public function getSpamMuppetSignals()
  {
    return $this->spamMuppetSignals;
  }
  /**
   * @param int
   */
  public function setSpamrank($spamrank)
  {
    $this->spamrank = $spamrank;
  }
  /**
   * @return int
   */
  public function getSpamrank()
  {
    return $this->spamrank;
  }
  /**
   * @param float
   */
  public function setSpamtokensContentScore($spamtokensContentScore)
  {
    $this->spamtokensContentScore = $spamtokensContentScore;
  }
  /**
   * @return float
   */
  public function getSpamtokensContentScore()
  {
    return $this->spamtokensContentScore;
  }
  /**
   * @param string
   */
  public function setTimeSensitivity($timeSensitivity)
  {
    $this->timeSensitivity = $timeSensitivity;
  }
  /**
   * @return string
   */
  public function getTimeSensitivity()
  {
    return $this->timeSensitivity;
  }
  /**
   * @param int
   */
  public function setTitleHardTokenCountWithoutStopwords($titleHardTokenCountWithoutStopwords)
  {
    $this->titleHardTokenCountWithoutStopwords = $titleHardTokenCountWithoutStopwords;
  }
  /**
   * @return int
   */
  public function getTitleHardTokenCountWithoutStopwords()
  {
    return $this->titleHardTokenCountWithoutStopwords;
  }
  /**
   * @param int
   */
  public function setToolbarPagerank($toolbarPagerank)
  {
    $this->toolbarPagerank = $toolbarPagerank;
  }
  /**
   * @return int
   */
  public function getToolbarPagerank()
  {
    return $this->toolbarPagerank;
  }
  /**
   * @param int
   */
  public function setTopPetacatTaxId($topPetacatTaxId)
  {
    $this->topPetacatTaxId = $topPetacatTaxId;
  }
  /**
   * @return int
   */
  public function getTopPetacatTaxId()
  {
    return $this->topPetacatTaxId;
  }
  /**
   * @param float
   */
  public function setTopPetacatWeight($topPetacatWeight)
  {
    $this->topPetacatWeight = $topPetacatWeight;
  }
  /**
   * @return float
   */
  public function getTopPetacatWeight()
  {
    return $this->topPetacatWeight;
  }
  /**
   * @param QualityTravelGoodSitesData
   */
  public function setTravelGoodSitesInfo(QualityTravelGoodSitesData $travelGoodSitesInfo)
  {
    $this->travelGoodSitesInfo = $travelGoodSitesInfo;
  }
  /**
   * @return QualityTravelGoodSitesData
   */
  public function getTravelGoodSitesInfo()
  {
    return $this->travelGoodSitesInfo;
  }
  /**
   * @param int
   */
  public function setTrendspamScore($trendspamScore)
  {
    $this->trendspamScore = $trendspamScore;
  }
  /**
   * @return int
   */
  public function getTrendspamScore()
  {
    return $this->trendspamScore;
  }
  /**
   * @param int
   */
  public function setTundraClusterId($tundraClusterId)
  {
    $this->tundraClusterId = $tundraClusterId;
  }
  /**
   * @return int
   */
  public function getTundraClusterId()
  {
    return $this->tundraClusterId;
  }
  /**
   * @param int
   */
  public function setUacSpamScore($uacSpamScore)
  {
    $this->uacSpamScore = $uacSpamScore;
  }
  /**
   * @return int
   */
  public function getUacSpamScore()
  {
    return $this->uacSpamScore;
  }
  /**
   * @param string
   */
  public function setUrlAfterRedirectsFp($urlAfterRedirectsFp)
  {
    $this->urlAfterRedirectsFp = $urlAfterRedirectsFp;
  }
  /**
   * @return string
   */
  public function getUrlAfterRedirectsFp()
  {
    return $this->urlAfterRedirectsFp;
  }
  /**
   * @param UrlPoisoningData
   */
  public function setUrlPoisoningData(UrlPoisoningData $urlPoisoningData)
  {
    $this->urlPoisoningData = $urlPoisoningData;
  }
  /**
   * @return UrlPoisoningData
   */
  public function getUrlPoisoningData()
  {
    return $this->urlPoisoningData;
  }
  /**
   * @param QualitySherlockKnexAnnotation
   */
  public function setV2KnexAnnotation(QualitySherlockKnexAnnotation $v2KnexAnnotation)
  {
    $this->v2KnexAnnotation = $v2KnexAnnotation;
  }
  /**
   * @return QualitySherlockKnexAnnotation
   */
  public function getV2KnexAnnotation()
  {
    return $this->v2KnexAnnotation;
  }
  /**
   * @param string
   */
  public function setVideoCorpusDocid($videoCorpusDocid)
  {
    $this->videoCorpusDocid = $videoCorpusDocid;
  }
  /**
   * @return string
   */
  public function getVideoCorpusDocid()
  {
    return $this->videoCorpusDocid;
  }
  /**
   * @param QualityVidyaVideoLanguageVideoLanguage
   */
  public function setVideoLanguage(QualityVidyaVideoLanguageVideoLanguage $videoLanguage)
  {
    $this->videoLanguage = $videoLanguage;
  }
  /**
   * @return QualityVidyaVideoLanguageVideoLanguage
   */
  public function getVideoLanguage()
  {
    return $this->videoLanguage;
  }
  /**
   * @param VideoPerDocData
   */
  public function setVideodata(VideoPerDocData $videodata)
  {
    $this->videodata = $videodata;
  }
  /**
   * @return VideoPerDocData
   */
  public function getVideodata()
  {
    return $this->videodata;
  }
  /**
   * @param IndexingMobileVoltVoltPerDocData
   */
  public function setVoltData(IndexingMobileVoltVoltPerDocData $voltData)
  {
    $this->voltData = $voltData;
  }
  /**
   * @return IndexingMobileVoltVoltPerDocData
   */
  public function getVoltData()
  {
    return $this->voltData;
  }
  /**
   * @param WatchpageLanguageWatchPageLanguageResult
   */
  public function setWatchpageLanguageResult(WatchpageLanguageWatchPageLanguageResult $watchpageLanguageResult)
  {
    $this->watchpageLanguageResult = $watchpageLanguageResult;
  }
  /**
   * @return WatchpageLanguageWatchPageLanguageResult
   */
  public function getWatchpageLanguageResult()
  {
    return $this->watchpageLanguageResult;
  }
  /**
   * @param string
   */
  public function setWebmirrorEcnFp($webmirrorEcnFp)
  {
    $this->webmirrorEcnFp = $webmirrorEcnFp;
  }
  /**
   * @return string
   */
  public function getWebmirrorEcnFp()
  {
    return $this->webmirrorEcnFp;
  }
  /**
   * @param RepositoryWebrefWebrefMustangAttachment
   */
  public function setWebrefEntities(RepositoryWebrefWebrefMustangAttachment $webrefEntities)
  {
    $this->webrefEntities = $webrefEntities;
  }
  /**
   * @return RepositoryWebrefWebrefMustangAttachment
   */
  public function getWebrefEntities()
  {
    return $this->webrefEntities;
  }
  /**
   * @param string
   */
  public function setYmylHealthScore($ymylHealthScore)
  {
    $this->ymylHealthScore = $ymylHealthScore;
  }
  /**
   * @return string
   */
  public function getYmylHealthScore()
  {
    return $this->ymylHealthScore;
  }
  /**
   * @param string
   */
  public function setYmylNewsScore($ymylNewsScore)
  {
    $this->ymylNewsScore = $ymylNewsScore;
  }
  /**
   * @return string
   */
  public function getYmylNewsScore()
  {
    return $this->ymylNewsScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PerDocData::class, 'Google_Service_Contentwarehouse_PerDocData');
