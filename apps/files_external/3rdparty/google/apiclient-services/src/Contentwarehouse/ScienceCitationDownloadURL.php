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

class ScienceCitationDownloadURL extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "brokenLandingPage" => "BrokenLandingPage",
        "canonicalUrlfp" => "CanonicalUrlfp",
        "contentChecksum" => "ContentChecksum",
        "contentType" => "ContentType",
        "crawlTimestamp" => "CrawlTimestamp",
        "dMCANotice" => "DMCANotice",
        "displayOrg" => "DisplayOrg",
        "displayPriority" => "DisplayPriority",
        "downloadDay" => "DownloadDay",
        "downloadMonth" => "DownloadMonth",
        "downloadYear" => "DownloadYear",
        "excerptContent" => "ExcerptContent",
        "excerptDebugLabel" => "ExcerptDebugLabel",
        "firstDiscovered" => "FirstDiscovered",
        "hostedNumPages" => "HostedNumPages",
        "hostedStartPage" => "HostedStartPage",
        "htmlTitle" => "HtmlTitle",
        "inPrevIndex" => "InPrevIndex",
        "indexPriority" => "IndexPriority",
        "legalMustInclude" => "LegalMustInclude",
        "likelyAheadPrint" => "LikelyAheadPrint",
        "likelyDifferentMetricsVenue" => "LikelyDifferentMetricsVenue",
        "likelyLegalJournal" => "LikelyLegalJournal",
        "likelyNoCache" => "LikelyNoCache",
        "likelyNoIndex" => "LikelyNoIndex",
        "likelyWorldViewable" => "LikelyWorldViewable",
        "longChunkCount" => "LongChunkCount",
        "maybeNoIndexReparse" => "MaybeNoIndexReparse",
        "metadataUrl" => "MetadataUrl",
        "mustInclude" => "MustInclude",
        "noArchive" => "NoArchive",
        "noIndex" => "NoIndex",
        "noSnippet" => "NoSnippet",
        "oceanView" => "OceanView",
        "outLinkCount" => "OutLinkCount",
        "pageCount" => "PageCount",
        "referencesInPrevIndex" => "ReferencesInPrevIndex",
        "type" => "Type",
        "urlAfterRedirects" => "UrlAfterRedirects",
        "urlStr" => "UrlStr",
        "wordCount" => "WordCount",
        "worldViewable" => "WorldViewable",
  ];
  /**
   * @var bool
   */
  public $brokenLandingPage;
  /**
   * @var string
   */
  public $canonicalUrlfp;
  /**
   * @var string
   */
  public $contentChecksum;
  /**
   * @var int
   */
  public $contentType;
  /**
   * @var string
   */
  public $crawlTimestamp;
  /**
   * @var string
   */
  public $dMCANotice;
  /**
   * @var string
   */
  public $displayOrg;
  /**
   * @var int
   */
  public $displayPriority;
  /**
   * @var int
   */
  public $downloadDay;
  /**
   * @var int
   */
  public $downloadMonth;
  /**
   * @var int
   */
  public $downloadYear;
  /**
   * @var string
   */
  public $excerptContent;
  /**
   * @var string
   */
  public $excerptDebugLabel;
  /**
   * @var string
   */
  public $firstDiscovered;
  /**
   * @var int
   */
  public $hostedNumPages;
  /**
   * @var int
   */
  public $hostedStartPage;
  /**
   * @var string
   */
  public $htmlTitle;
  /**
   * @var bool
   */
  public $inPrevIndex;
  /**
   * @var int
   */
  public $indexPriority;
  /**
   * @var bool
   */
  public $legalMustInclude;
  /**
   * @var bool
   */
  public $likelyAheadPrint;
  /**
   * @var bool
   */
  public $likelyDifferentMetricsVenue;
  /**
   * @var bool
   */
  public $likelyLegalJournal;
  /**
   * @var bool
   */
  public $likelyNoCache;
  /**
   * @var bool
   */
  public $likelyNoIndex;
  /**
   * @var bool
   */
  public $likelyWorldViewable;
  /**
   * @var int
   */
  public $longChunkCount;
  /**
   * @var bool
   */
  public $maybeNoIndexReparse;
  /**
   * @var string
   */
  public $metadataUrl;
  /**
   * @var bool
   */
  public $mustInclude;
  /**
   * @var bool
   */
  public $noArchive;
  /**
   * @var bool
   */
  public $noIndex;
  /**
   * @var bool
   */
  public $noSnippet;
  protected $oceanViewType = ScienceOceanView::class;
  protected $oceanViewDataType = '';
  /**
   * @var int
   */
  public $outLinkCount;
  /**
   * @var int
   */
  public $pageCount;
  /**
   * @var bool
   */
  public $referencesInPrevIndex;
  /**
   * @var int
   */
  public $type;
  /**
   * @var string
   */
  public $urlAfterRedirects;
  /**
   * @var string
   */
  public $urlStr;
  /**
   * @var int
   */
  public $wordCount;
  /**
   * @var bool
   */
  public $worldViewable;

  /**
   * @param bool
   */
  public function setBrokenLandingPage($brokenLandingPage)
  {
    $this->brokenLandingPage = $brokenLandingPage;
  }
  /**
   * @return bool
   */
  public function getBrokenLandingPage()
  {
    return $this->brokenLandingPage;
  }
  /**
   * @param string
   */
  public function setCanonicalUrlfp($canonicalUrlfp)
  {
    $this->canonicalUrlfp = $canonicalUrlfp;
  }
  /**
   * @return string
   */
  public function getCanonicalUrlfp()
  {
    return $this->canonicalUrlfp;
  }
  /**
   * @param string
   */
  public function setContentChecksum($contentChecksum)
  {
    $this->contentChecksum = $contentChecksum;
  }
  /**
   * @return string
   */
  public function getContentChecksum()
  {
    return $this->contentChecksum;
  }
  /**
   * @param int
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return int
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param string
   */
  public function setCrawlTimestamp($crawlTimestamp)
  {
    $this->crawlTimestamp = $crawlTimestamp;
  }
  /**
   * @return string
   */
  public function getCrawlTimestamp()
  {
    return $this->crawlTimestamp;
  }
  /**
   * @param string
   */
  public function setDMCANotice($dMCANotice)
  {
    $this->dMCANotice = $dMCANotice;
  }
  /**
   * @return string
   */
  public function getDMCANotice()
  {
    return $this->dMCANotice;
  }
  /**
   * @param string
   */
  public function setDisplayOrg($displayOrg)
  {
    $this->displayOrg = $displayOrg;
  }
  /**
   * @return string
   */
  public function getDisplayOrg()
  {
    return $this->displayOrg;
  }
  /**
   * @param int
   */
  public function setDisplayPriority($displayPriority)
  {
    $this->displayPriority = $displayPriority;
  }
  /**
   * @return int
   */
  public function getDisplayPriority()
  {
    return $this->displayPriority;
  }
  /**
   * @param int
   */
  public function setDownloadDay($downloadDay)
  {
    $this->downloadDay = $downloadDay;
  }
  /**
   * @return int
   */
  public function getDownloadDay()
  {
    return $this->downloadDay;
  }
  /**
   * @param int
   */
  public function setDownloadMonth($downloadMonth)
  {
    $this->downloadMonth = $downloadMonth;
  }
  /**
   * @return int
   */
  public function getDownloadMonth()
  {
    return $this->downloadMonth;
  }
  /**
   * @param int
   */
  public function setDownloadYear($downloadYear)
  {
    $this->downloadYear = $downloadYear;
  }
  /**
   * @return int
   */
  public function getDownloadYear()
  {
    return $this->downloadYear;
  }
  /**
   * @param string
   */
  public function setExcerptContent($excerptContent)
  {
    $this->excerptContent = $excerptContent;
  }
  /**
   * @return string
   */
  public function getExcerptContent()
  {
    return $this->excerptContent;
  }
  /**
   * @param string
   */
  public function setExcerptDebugLabel($excerptDebugLabel)
  {
    $this->excerptDebugLabel = $excerptDebugLabel;
  }
  /**
   * @return string
   */
  public function getExcerptDebugLabel()
  {
    return $this->excerptDebugLabel;
  }
  /**
   * @param string
   */
  public function setFirstDiscovered($firstDiscovered)
  {
    $this->firstDiscovered = $firstDiscovered;
  }
  /**
   * @return string
   */
  public function getFirstDiscovered()
  {
    return $this->firstDiscovered;
  }
  /**
   * @param int
   */
  public function setHostedNumPages($hostedNumPages)
  {
    $this->hostedNumPages = $hostedNumPages;
  }
  /**
   * @return int
   */
  public function getHostedNumPages()
  {
    return $this->hostedNumPages;
  }
  /**
   * @param int
   */
  public function setHostedStartPage($hostedStartPage)
  {
    $this->hostedStartPage = $hostedStartPage;
  }
  /**
   * @return int
   */
  public function getHostedStartPage()
  {
    return $this->hostedStartPage;
  }
  /**
   * @param string
   */
  public function setHtmlTitle($htmlTitle)
  {
    $this->htmlTitle = $htmlTitle;
  }
  /**
   * @return string
   */
  public function getHtmlTitle()
  {
    return $this->htmlTitle;
  }
  /**
   * @param bool
   */
  public function setInPrevIndex($inPrevIndex)
  {
    $this->inPrevIndex = $inPrevIndex;
  }
  /**
   * @return bool
   */
  public function getInPrevIndex()
  {
    return $this->inPrevIndex;
  }
  /**
   * @param int
   */
  public function setIndexPriority($indexPriority)
  {
    $this->indexPriority = $indexPriority;
  }
  /**
   * @return int
   */
  public function getIndexPriority()
  {
    return $this->indexPriority;
  }
  /**
   * @param bool
   */
  public function setLegalMustInclude($legalMustInclude)
  {
    $this->legalMustInclude = $legalMustInclude;
  }
  /**
   * @return bool
   */
  public function getLegalMustInclude()
  {
    return $this->legalMustInclude;
  }
  /**
   * @param bool
   */
  public function setLikelyAheadPrint($likelyAheadPrint)
  {
    $this->likelyAheadPrint = $likelyAheadPrint;
  }
  /**
   * @return bool
   */
  public function getLikelyAheadPrint()
  {
    return $this->likelyAheadPrint;
  }
  /**
   * @param bool
   */
  public function setLikelyDifferentMetricsVenue($likelyDifferentMetricsVenue)
  {
    $this->likelyDifferentMetricsVenue = $likelyDifferentMetricsVenue;
  }
  /**
   * @return bool
   */
  public function getLikelyDifferentMetricsVenue()
  {
    return $this->likelyDifferentMetricsVenue;
  }
  /**
   * @param bool
   */
  public function setLikelyLegalJournal($likelyLegalJournal)
  {
    $this->likelyLegalJournal = $likelyLegalJournal;
  }
  /**
   * @return bool
   */
  public function getLikelyLegalJournal()
  {
    return $this->likelyLegalJournal;
  }
  /**
   * @param bool
   */
  public function setLikelyNoCache($likelyNoCache)
  {
    $this->likelyNoCache = $likelyNoCache;
  }
  /**
   * @return bool
   */
  public function getLikelyNoCache()
  {
    return $this->likelyNoCache;
  }
  /**
   * @param bool
   */
  public function setLikelyNoIndex($likelyNoIndex)
  {
    $this->likelyNoIndex = $likelyNoIndex;
  }
  /**
   * @return bool
   */
  public function getLikelyNoIndex()
  {
    return $this->likelyNoIndex;
  }
  /**
   * @param bool
   */
  public function setLikelyWorldViewable($likelyWorldViewable)
  {
    $this->likelyWorldViewable = $likelyWorldViewable;
  }
  /**
   * @return bool
   */
  public function getLikelyWorldViewable()
  {
    return $this->likelyWorldViewable;
  }
  /**
   * @param int
   */
  public function setLongChunkCount($longChunkCount)
  {
    $this->longChunkCount = $longChunkCount;
  }
  /**
   * @return int
   */
  public function getLongChunkCount()
  {
    return $this->longChunkCount;
  }
  /**
   * @param bool
   */
  public function setMaybeNoIndexReparse($maybeNoIndexReparse)
  {
    $this->maybeNoIndexReparse = $maybeNoIndexReparse;
  }
  /**
   * @return bool
   */
  public function getMaybeNoIndexReparse()
  {
    return $this->maybeNoIndexReparse;
  }
  /**
   * @param string
   */
  public function setMetadataUrl($metadataUrl)
  {
    $this->metadataUrl = $metadataUrl;
  }
  /**
   * @return string
   */
  public function getMetadataUrl()
  {
    return $this->metadataUrl;
  }
  /**
   * @param bool
   */
  public function setMustInclude($mustInclude)
  {
    $this->mustInclude = $mustInclude;
  }
  /**
   * @return bool
   */
  public function getMustInclude()
  {
    return $this->mustInclude;
  }
  /**
   * @param bool
   */
  public function setNoArchive($noArchive)
  {
    $this->noArchive = $noArchive;
  }
  /**
   * @return bool
   */
  public function getNoArchive()
  {
    return $this->noArchive;
  }
  /**
   * @param bool
   */
  public function setNoIndex($noIndex)
  {
    $this->noIndex = $noIndex;
  }
  /**
   * @return bool
   */
  public function getNoIndex()
  {
    return $this->noIndex;
  }
  /**
   * @param bool
   */
  public function setNoSnippet($noSnippet)
  {
    $this->noSnippet = $noSnippet;
  }
  /**
   * @return bool
   */
  public function getNoSnippet()
  {
    return $this->noSnippet;
  }
  /**
   * @param ScienceOceanView
   */
  public function setOceanView(ScienceOceanView $oceanView)
  {
    $this->oceanView = $oceanView;
  }
  /**
   * @return ScienceOceanView
   */
  public function getOceanView()
  {
    return $this->oceanView;
  }
  /**
   * @param int
   */
  public function setOutLinkCount($outLinkCount)
  {
    $this->outLinkCount = $outLinkCount;
  }
  /**
   * @return int
   */
  public function getOutLinkCount()
  {
    return $this->outLinkCount;
  }
  /**
   * @param int
   */
  public function setPageCount($pageCount)
  {
    $this->pageCount = $pageCount;
  }
  /**
   * @return int
   */
  public function getPageCount()
  {
    return $this->pageCount;
  }
  /**
   * @param bool
   */
  public function setReferencesInPrevIndex($referencesInPrevIndex)
  {
    $this->referencesInPrevIndex = $referencesInPrevIndex;
  }
  /**
   * @return bool
   */
  public function getReferencesInPrevIndex()
  {
    return $this->referencesInPrevIndex;
  }
  /**
   * @param int
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return int
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUrlAfterRedirects($urlAfterRedirects)
  {
    $this->urlAfterRedirects = $urlAfterRedirects;
  }
  /**
   * @return string
   */
  public function getUrlAfterRedirects()
  {
    return $this->urlAfterRedirects;
  }
  /**
   * @param string
   */
  public function setUrlStr($urlStr)
  {
    $this->urlStr = $urlStr;
  }
  /**
   * @return string
   */
  public function getUrlStr()
  {
    return $this->urlStr;
  }
  /**
   * @param int
   */
  public function setWordCount($wordCount)
  {
    $this->wordCount = $wordCount;
  }
  /**
   * @return int
   */
  public function getWordCount()
  {
    return $this->wordCount;
  }
  /**
   * @param bool
   */
  public function setWorldViewable($worldViewable)
  {
    $this->worldViewable = $worldViewable;
  }
  /**
   * @return bool
   */
  public function getWorldViewable()
  {
    return $this->worldViewable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScienceCitationDownloadURL::class, 'Google_Service_Contentwarehouse_ScienceCitationDownloadURL');
