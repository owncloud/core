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

class WWWSnippetResponse extends \Google\Collection
{
  protected $collection_key = 'titleRenderedToken';
  /**
   * @var int[]
   */
  public $answerDocMatches;
  /**
   * @var int[]
   */
  public $chosenBodyTidbits;
  protected $docInfoType = WWWDocInfo::class;
  protected $docInfoDataType = '';
  protected $docPreviewRestrictionsType = QualityDniDocPreviewRestrictions::class;
  protected $docPreviewRestrictionsDataType = '';
  protected $docPreviewRestrictionsForAmpType = QualityDniDocPreviewRestrictions::class;
  protected $docPreviewRestrictionsForAmpDataType = '';
  /**
   * @var string
   */
  public $events;
  protected $extraInfoType = ExtraSnippetInfoResponse::class;
  protected $extraInfoDataType = '';
  /**
   * @var int
   */
  public $findyTidbits;
  /**
   * @var int[]
   */
  public $hasMessageType;
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  /**
   * @var bool
   */
  public $isLoginPage;
  /**
   * @var bool
   */
  public $isValidResult;
  /**
   * @var string[]
   */
  public $keyword;
  protected $listSnippetType = ListSnippetResponse::class;
  protected $listSnippetDataType = '';
  /**
   * @var string
   */
  public $listSummary;
  protected $longStructuredSnippetType = LongStructuredSnippet::class;
  protected $longStructuredSnippetDataType = '';
  /**
   * @var string
   */
  public $matchesBitmapEncoded;
  /**
   * @var int
   */
  public $matchesBitmapSize;
  protected $metaTagsType = WWWMetaTag::class;
  protected $metaTagsDataType = 'array';
  /**
   * @var int
   */
  public $numTokensSkippedByInDocRestrictionsInPrinting;
  /**
   * @var int
   */
  public $numTokensSkippedByInDocRestrictionsInScoring;
  /**
   * @var int
   */
  public $numberOfPages;
  /**
   * @var string
   */
  public $obsoleteLocalinfo;
  /**
   * @var string
   */
  public $obsoleteManybox;
  /**
   * @var string
   */
  public $obsoleteSitemap;
  /**
   * @var bool
   */
  public $odp;
  protected $orionEntitiesType = OrionDocEntitiesProto::class;
  protected $orionEntitiesDataType = '';
  protected $scienceInfoType = ScienceIndexSignal::class;
  protected $scienceInfoDataType = '';
  /**
   * @var string
   */
  public $sectionHeadingAnchorName;
  /**
   * @var string
   */
  public $sectionHeadingText;
  /**
   * @var bool
   */
  public $seenNotTerm;
  protected $sentimentSnippetsType = RepositoryAnnotationsMustangSentimentSnippetAnnotations::class;
  protected $sentimentSnippetsDataType = 'array';
  /**
   * @var string
   */
  public $siteDisplayName;
  /**
   * @var string
   */
  public $snippetBylineDate;
  protected $snippetExtraInfoType = SnippetExtraInfo::class;
  protected $snippetExtraInfoDataType = '';
  protected $snippetHighlightMatchesBitmapType = WWWSnippetResponseBitmapPB::class;
  protected $snippetHighlightMatchesBitmapDataType = 'array';
  /**
   * @var int
   */
  public $snippetPageNumber;
  /**
   * @var int
   */
  public $snippetPrefixCharCount;
  protected $snippetRenderedTokenType = MustangSnippetsRenderedToken::class;
  protected $snippetRenderedTokenDataType = 'array';
  /**
   * @var string
   */
  public $snippethash;
  protected $snippetsRanklabFeaturesType = MustangReposWwwSnippetsSnippetsRanklabFeatures::class;
  protected $snippetsRanklabFeaturesDataType = '';
  /**
   * @var string
   */
  public $squeryFingerprint;
  /**
   * @var bool
   */
  public $titleLengthAdjustedForBrowserWidth;
  protected $titleRenderedTokenType = MustangSnippetsRenderedToken::class;
  protected $titleRenderedTokenDataType = 'array';
  protected $titleSizeParamsType = TitleSizeParams::class;
  protected $titleSizeParamsDataType = '';
  /**
   * @var string
   */
  public $truncatedTitle;

  /**
   * @param int[]
   */
  public function setAnswerDocMatches($answerDocMatches)
  {
    $this->answerDocMatches = $answerDocMatches;
  }
  /**
   * @return int[]
   */
  public function getAnswerDocMatches()
  {
    return $this->answerDocMatches;
  }
  /**
   * @param int[]
   */
  public function setChosenBodyTidbits($chosenBodyTidbits)
  {
    $this->chosenBodyTidbits = $chosenBodyTidbits;
  }
  /**
   * @return int[]
   */
  public function getChosenBodyTidbits()
  {
    return $this->chosenBodyTidbits;
  }
  /**
   * @param WWWDocInfo
   */
  public function setDocInfo(WWWDocInfo $docInfo)
  {
    $this->docInfo = $docInfo;
  }
  /**
   * @return WWWDocInfo
   */
  public function getDocInfo()
  {
    return $this->docInfo;
  }
  /**
   * @param QualityDniDocPreviewRestrictions
   */
  public function setDocPreviewRestrictions(QualityDniDocPreviewRestrictions $docPreviewRestrictions)
  {
    $this->docPreviewRestrictions = $docPreviewRestrictions;
  }
  /**
   * @return QualityDniDocPreviewRestrictions
   */
  public function getDocPreviewRestrictions()
  {
    return $this->docPreviewRestrictions;
  }
  /**
   * @param QualityDniDocPreviewRestrictions
   */
  public function setDocPreviewRestrictionsForAmp(QualityDniDocPreviewRestrictions $docPreviewRestrictionsForAmp)
  {
    $this->docPreviewRestrictionsForAmp = $docPreviewRestrictionsForAmp;
  }
  /**
   * @return QualityDniDocPreviewRestrictions
   */
  public function getDocPreviewRestrictionsForAmp()
  {
    return $this->docPreviewRestrictionsForAmp;
  }
  /**
   * @param string
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return string
   */
  public function getEvents()
  {
    return $this->events;
  }
  /**
   * @param ExtraSnippetInfoResponse
   */
  public function setExtraInfo(ExtraSnippetInfoResponse $extraInfo)
  {
    $this->extraInfo = $extraInfo;
  }
  /**
   * @return ExtraSnippetInfoResponse
   */
  public function getExtraInfo()
  {
    return $this->extraInfo;
  }
  /**
   * @param int
   */
  public function setFindyTidbits($findyTidbits)
  {
    $this->findyTidbits = $findyTidbits;
  }
  /**
   * @return int
   */
  public function getFindyTidbits()
  {
    return $this->findyTidbits;
  }
  /**
   * @param int[]
   */
  public function setHasMessageType($hasMessageType)
  {
    $this->hasMessageType = $hasMessageType;
  }
  /**
   * @return int[]
   */
  public function getHasMessageType()
  {
    return $this->hasMessageType;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setInfo(Proto2BridgeMessageSet $info)
  {
    $this->info = $info;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param bool
   */
  public function setIsLoginPage($isLoginPage)
  {
    $this->isLoginPage = $isLoginPage;
  }
  /**
   * @return bool
   */
  public function getIsLoginPage()
  {
    return $this->isLoginPage;
  }
  /**
   * @param bool
   */
  public function setIsValidResult($isValidResult)
  {
    $this->isValidResult = $isValidResult;
  }
  /**
   * @return bool
   */
  public function getIsValidResult()
  {
    return $this->isValidResult;
  }
  /**
   * @param string[]
   */
  public function setKeyword($keyword)
  {
    $this->keyword = $keyword;
  }
  /**
   * @return string[]
   */
  public function getKeyword()
  {
    return $this->keyword;
  }
  /**
   * @param ListSnippetResponse
   */
  public function setListSnippet(ListSnippetResponse $listSnippet)
  {
    $this->listSnippet = $listSnippet;
  }
  /**
   * @return ListSnippetResponse
   */
  public function getListSnippet()
  {
    return $this->listSnippet;
  }
  /**
   * @param string
   */
  public function setListSummary($listSummary)
  {
    $this->listSummary = $listSummary;
  }
  /**
   * @return string
   */
  public function getListSummary()
  {
    return $this->listSummary;
  }
  /**
   * @param LongStructuredSnippet
   */
  public function setLongStructuredSnippet(LongStructuredSnippet $longStructuredSnippet)
  {
    $this->longStructuredSnippet = $longStructuredSnippet;
  }
  /**
   * @return LongStructuredSnippet
   */
  public function getLongStructuredSnippet()
  {
    return $this->longStructuredSnippet;
  }
  /**
   * @param string
   */
  public function setMatchesBitmapEncoded($matchesBitmapEncoded)
  {
    $this->matchesBitmapEncoded = $matchesBitmapEncoded;
  }
  /**
   * @return string
   */
  public function getMatchesBitmapEncoded()
  {
    return $this->matchesBitmapEncoded;
  }
  /**
   * @param int
   */
  public function setMatchesBitmapSize($matchesBitmapSize)
  {
    $this->matchesBitmapSize = $matchesBitmapSize;
  }
  /**
   * @return int
   */
  public function getMatchesBitmapSize()
  {
    return $this->matchesBitmapSize;
  }
  /**
   * @param WWWMetaTag[]
   */
  public function setMetaTags($metaTags)
  {
    $this->metaTags = $metaTags;
  }
  /**
   * @return WWWMetaTag[]
   */
  public function getMetaTags()
  {
    return $this->metaTags;
  }
  /**
   * @param int
   */
  public function setNumTokensSkippedByInDocRestrictionsInPrinting($numTokensSkippedByInDocRestrictionsInPrinting)
  {
    $this->numTokensSkippedByInDocRestrictionsInPrinting = $numTokensSkippedByInDocRestrictionsInPrinting;
  }
  /**
   * @return int
   */
  public function getNumTokensSkippedByInDocRestrictionsInPrinting()
  {
    return $this->numTokensSkippedByInDocRestrictionsInPrinting;
  }
  /**
   * @param int
   */
  public function setNumTokensSkippedByInDocRestrictionsInScoring($numTokensSkippedByInDocRestrictionsInScoring)
  {
    $this->numTokensSkippedByInDocRestrictionsInScoring = $numTokensSkippedByInDocRestrictionsInScoring;
  }
  /**
   * @return int
   */
  public function getNumTokensSkippedByInDocRestrictionsInScoring()
  {
    return $this->numTokensSkippedByInDocRestrictionsInScoring;
  }
  /**
   * @param int
   */
  public function setNumberOfPages($numberOfPages)
  {
    $this->numberOfPages = $numberOfPages;
  }
  /**
   * @return int
   */
  public function getNumberOfPages()
  {
    return $this->numberOfPages;
  }
  /**
   * @param string
   */
  public function setObsoleteLocalinfo($obsoleteLocalinfo)
  {
    $this->obsoleteLocalinfo = $obsoleteLocalinfo;
  }
  /**
   * @return string
   */
  public function getObsoleteLocalinfo()
  {
    return $this->obsoleteLocalinfo;
  }
  /**
   * @param string
   */
  public function setObsoleteManybox($obsoleteManybox)
  {
    $this->obsoleteManybox = $obsoleteManybox;
  }
  /**
   * @return string
   */
  public function getObsoleteManybox()
  {
    return $this->obsoleteManybox;
  }
  /**
   * @param string
   */
  public function setObsoleteSitemap($obsoleteSitemap)
  {
    $this->obsoleteSitemap = $obsoleteSitemap;
  }
  /**
   * @return string
   */
  public function getObsoleteSitemap()
  {
    return $this->obsoleteSitemap;
  }
  /**
   * @param bool
   */
  public function setOdp($odp)
  {
    $this->odp = $odp;
  }
  /**
   * @return bool
   */
  public function getOdp()
  {
    return $this->odp;
  }
  /**
   * @param OrionDocEntitiesProto
   */
  public function setOrionEntities(OrionDocEntitiesProto $orionEntities)
  {
    $this->orionEntities = $orionEntities;
  }
  /**
   * @return OrionDocEntitiesProto
   */
  public function getOrionEntities()
  {
    return $this->orionEntities;
  }
  /**
   * @param ScienceIndexSignal
   */
  public function setScienceInfo(ScienceIndexSignal $scienceInfo)
  {
    $this->scienceInfo = $scienceInfo;
  }
  /**
   * @return ScienceIndexSignal
   */
  public function getScienceInfo()
  {
    return $this->scienceInfo;
  }
  /**
   * @param string
   */
  public function setSectionHeadingAnchorName($sectionHeadingAnchorName)
  {
    $this->sectionHeadingAnchorName = $sectionHeadingAnchorName;
  }
  /**
   * @return string
   */
  public function getSectionHeadingAnchorName()
  {
    return $this->sectionHeadingAnchorName;
  }
  /**
   * @param string
   */
  public function setSectionHeadingText($sectionHeadingText)
  {
    $this->sectionHeadingText = $sectionHeadingText;
  }
  /**
   * @return string
   */
  public function getSectionHeadingText()
  {
    return $this->sectionHeadingText;
  }
  /**
   * @param bool
   */
  public function setSeenNotTerm($seenNotTerm)
  {
    $this->seenNotTerm = $seenNotTerm;
  }
  /**
   * @return bool
   */
  public function getSeenNotTerm()
  {
    return $this->seenNotTerm;
  }
  /**
   * @param RepositoryAnnotationsMustangSentimentSnippetAnnotations[]
   */
  public function setSentimentSnippets($sentimentSnippets)
  {
    $this->sentimentSnippets = $sentimentSnippets;
  }
  /**
   * @return RepositoryAnnotationsMustangSentimentSnippetAnnotations[]
   */
  public function getSentimentSnippets()
  {
    return $this->sentimentSnippets;
  }
  /**
   * @param string
   */
  public function setSiteDisplayName($siteDisplayName)
  {
    $this->siteDisplayName = $siteDisplayName;
  }
  /**
   * @return string
   */
  public function getSiteDisplayName()
  {
    return $this->siteDisplayName;
  }
  /**
   * @param string
   */
  public function setSnippetBylineDate($snippetBylineDate)
  {
    $this->snippetBylineDate = $snippetBylineDate;
  }
  /**
   * @return string
   */
  public function getSnippetBylineDate()
  {
    return $this->snippetBylineDate;
  }
  /**
   * @param SnippetExtraInfo
   */
  public function setSnippetExtraInfo(SnippetExtraInfo $snippetExtraInfo)
  {
    $this->snippetExtraInfo = $snippetExtraInfo;
  }
  /**
   * @return SnippetExtraInfo
   */
  public function getSnippetExtraInfo()
  {
    return $this->snippetExtraInfo;
  }
  /**
   * @param WWWSnippetResponseBitmapPB[]
   */
  public function setSnippetHighlightMatchesBitmap($snippetHighlightMatchesBitmap)
  {
    $this->snippetHighlightMatchesBitmap = $snippetHighlightMatchesBitmap;
  }
  /**
   * @return WWWSnippetResponseBitmapPB[]
   */
  public function getSnippetHighlightMatchesBitmap()
  {
    return $this->snippetHighlightMatchesBitmap;
  }
  /**
   * @param int
   */
  public function setSnippetPageNumber($snippetPageNumber)
  {
    $this->snippetPageNumber = $snippetPageNumber;
  }
  /**
   * @return int
   */
  public function getSnippetPageNumber()
  {
    return $this->snippetPageNumber;
  }
  /**
   * @param int
   */
  public function setSnippetPrefixCharCount($snippetPrefixCharCount)
  {
    $this->snippetPrefixCharCount = $snippetPrefixCharCount;
  }
  /**
   * @return int
   */
  public function getSnippetPrefixCharCount()
  {
    return $this->snippetPrefixCharCount;
  }
  /**
   * @param MustangSnippetsRenderedToken[]
   */
  public function setSnippetRenderedToken($snippetRenderedToken)
  {
    $this->snippetRenderedToken = $snippetRenderedToken;
  }
  /**
   * @return MustangSnippetsRenderedToken[]
   */
  public function getSnippetRenderedToken()
  {
    return $this->snippetRenderedToken;
  }
  /**
   * @param string
   */
  public function setSnippethash($snippethash)
  {
    $this->snippethash = $snippethash;
  }
  /**
   * @return string
   */
  public function getSnippethash()
  {
    return $this->snippethash;
  }
  /**
   * @param MustangReposWwwSnippetsSnippetsRanklabFeatures
   */
  public function setSnippetsRanklabFeatures(MustangReposWwwSnippetsSnippetsRanklabFeatures $snippetsRanklabFeatures)
  {
    $this->snippetsRanklabFeatures = $snippetsRanklabFeatures;
  }
  /**
   * @return MustangReposWwwSnippetsSnippetsRanklabFeatures
   */
  public function getSnippetsRanklabFeatures()
  {
    return $this->snippetsRanklabFeatures;
  }
  /**
   * @param string
   */
  public function setSqueryFingerprint($squeryFingerprint)
  {
    $this->squeryFingerprint = $squeryFingerprint;
  }
  /**
   * @return string
   */
  public function getSqueryFingerprint()
  {
    return $this->squeryFingerprint;
  }
  /**
   * @param bool
   */
  public function setTitleLengthAdjustedForBrowserWidth($titleLengthAdjustedForBrowserWidth)
  {
    $this->titleLengthAdjustedForBrowserWidth = $titleLengthAdjustedForBrowserWidth;
  }
  /**
   * @return bool
   */
  public function getTitleLengthAdjustedForBrowserWidth()
  {
    return $this->titleLengthAdjustedForBrowserWidth;
  }
  /**
   * @param MustangSnippetsRenderedToken[]
   */
  public function setTitleRenderedToken($titleRenderedToken)
  {
    $this->titleRenderedToken = $titleRenderedToken;
  }
  /**
   * @return MustangSnippetsRenderedToken[]
   */
  public function getTitleRenderedToken()
  {
    return $this->titleRenderedToken;
  }
  /**
   * @param TitleSizeParams
   */
  public function setTitleSizeParams(TitleSizeParams $titleSizeParams)
  {
    $this->titleSizeParams = $titleSizeParams;
  }
  /**
   * @return TitleSizeParams
   */
  public function getTitleSizeParams()
  {
    return $this->titleSizeParams;
  }
  /**
   * @param string
   */
  public function setTruncatedTitle($truncatedTitle)
  {
    $this->truncatedTitle = $truncatedTitle;
  }
  /**
   * @return string
   */
  public function getTruncatedTitle()
  {
    return $this->truncatedTitle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WWWSnippetResponse::class, 'Google_Service_Contentwarehouse_WWWSnippetResponse');
