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

class GDocumentBase extends \Google\Collection
{
  protected $collection_key = 'directory';
  protected $internal_gapi_mappings = [
        "contentExpiryTime" => "ContentExpiryTime",
        "displayUrl" => "DisplayUrl",
        "docId" => "DocId",
        "externalFeedMetadata" => "ExternalFeedMetadata",
        "externalHttpMetadata" => "ExternalHttpMetadata",
        "filterForSafeSearch" => "FilterForSafeSearch",
        "iPAddr" => "IPAddr",
        "noArchiveReason" => "NoArchiveReason",
        "noFollowReason" => "NoFollowReason",
        "noImageIndexReason" => "NoImageIndexReason",
        "noImageframeOverlayReason" => "NoImageframeOverlayReason",
        "noIndexReason" => "NoIndexReason",
        "noPreviewReason" => "NoPreviewReason",
        "noSnippetReason" => "NoSnippetReason",
        "noTranslateReason" => "NoTranslateReason",
        "pagerank" => "Pagerank",
        "pagerankNS" => "PagerankNS",
        "repid" => "Repid",
        "scienceMetadata" => "ScienceMetadata",
        "uRL" => "URL",
        "uRLAfterRedirects" => "URLAfterRedirects",
        "uRLEncoding" => "URLEncoding",
  ];
  /**
   * @var int
   */
  public $contentExpiryTime;
  /**
   * @var string
   */
  public $displayUrl;
  /**
   * @var string
   */
  public $docId;
  /**
   * @var string
   */
  public $externalFeedMetadata;
  /**
   * @var string
   */
  public $externalHttpMetadata;
  /**
   * @var int
   */
  public $filterForSafeSearch;
  /**
   * @var string
   */
  public $iPAddr;
  /**
   * @var int
   */
  public $noArchiveReason;
  /**
   * @var int
   */
  public $noFollowReason;
  /**
   * @var int
   */
  public $noImageIndexReason;
  /**
   * @var int
   */
  public $noImageframeOverlayReason;
  /**
   * @var int
   */
  public $noIndexReason;
  /**
   * @var int
   */
  public $noPreviewReason;
  /**
   * @var int
   */
  public $noSnippetReason;
  /**
   * @var int
   */
  public $noTranslateReason;
  /**
   * @var int
   */
  public $pagerank;
  /**
   * @var int
   */
  public $pagerankNS;
  /**
   * @var string
   */
  public $repid;
  protected $scienceMetadataType = ScienceCitation::class;
  protected $scienceMetadataDataType = '';
  /**
   * @var string
   */
  public $uRL;
  /**
   * @var string
   */
  public $uRLAfterRedirects;
  /**
   * @var int
   */
  public $uRLEncoding;
  protected $contentType = GDocumentBaseContent::class;
  protected $contentDataType = '';
  protected $directoryType = GDocumentBaseDirectory::class;
  protected $directoryDataType = 'array';
  /**
   * @var string
   */
  public $ecnFp;
  protected $idType = IndexingCrawlerIdServingDocumentIdentifier::class;
  protected $idDataType = '';
  protected $localsearchDocInfoType = LocalsearchDocInfo::class;
  protected $localsearchDocInfoDataType = '';
  protected $oceanDocInfoType = OceanDocInfo::class;
  protected $oceanDocInfoDataType = '';
  protected $originalcontentType = GDocumentBaseOriginalContent::class;
  protected $originalcontentDataType = '';
  /**
   * @var string
   */
  public $userAgentName;

  /**
   * @param int
   */
  public function setContentExpiryTime($contentExpiryTime)
  {
    $this->contentExpiryTime = $contentExpiryTime;
  }
  /**
   * @return int
   */
  public function getContentExpiryTime()
  {
    return $this->contentExpiryTime;
  }
  /**
   * @param string
   */
  public function setDisplayUrl($displayUrl)
  {
    $this->displayUrl = $displayUrl;
  }
  /**
   * @return string
   */
  public function getDisplayUrl()
  {
    return $this->displayUrl;
  }
  /**
   * @param string
   */
  public function setDocId($docId)
  {
    $this->docId = $docId;
  }
  /**
   * @return string
   */
  public function getDocId()
  {
    return $this->docId;
  }
  /**
   * @param string
   */
  public function setExternalFeedMetadata($externalFeedMetadata)
  {
    $this->externalFeedMetadata = $externalFeedMetadata;
  }
  /**
   * @return string
   */
  public function getExternalFeedMetadata()
  {
    return $this->externalFeedMetadata;
  }
  /**
   * @param string
   */
  public function setExternalHttpMetadata($externalHttpMetadata)
  {
    $this->externalHttpMetadata = $externalHttpMetadata;
  }
  /**
   * @return string
   */
  public function getExternalHttpMetadata()
  {
    return $this->externalHttpMetadata;
  }
  /**
   * @param int
   */
  public function setFilterForSafeSearch($filterForSafeSearch)
  {
    $this->filterForSafeSearch = $filterForSafeSearch;
  }
  /**
   * @return int
   */
  public function getFilterForSafeSearch()
  {
    return $this->filterForSafeSearch;
  }
  /**
   * @param string
   */
  public function setIPAddr($iPAddr)
  {
    $this->iPAddr = $iPAddr;
  }
  /**
   * @return string
   */
  public function getIPAddr()
  {
    return $this->iPAddr;
  }
  /**
   * @param int
   */
  public function setNoArchiveReason($noArchiveReason)
  {
    $this->noArchiveReason = $noArchiveReason;
  }
  /**
   * @return int
   */
  public function getNoArchiveReason()
  {
    return $this->noArchiveReason;
  }
  /**
   * @param int
   */
  public function setNoFollowReason($noFollowReason)
  {
    $this->noFollowReason = $noFollowReason;
  }
  /**
   * @return int
   */
  public function getNoFollowReason()
  {
    return $this->noFollowReason;
  }
  /**
   * @param int
   */
  public function setNoImageIndexReason($noImageIndexReason)
  {
    $this->noImageIndexReason = $noImageIndexReason;
  }
  /**
   * @return int
   */
  public function getNoImageIndexReason()
  {
    return $this->noImageIndexReason;
  }
  /**
   * @param int
   */
  public function setNoImageframeOverlayReason($noImageframeOverlayReason)
  {
    $this->noImageframeOverlayReason = $noImageframeOverlayReason;
  }
  /**
   * @return int
   */
  public function getNoImageframeOverlayReason()
  {
    return $this->noImageframeOverlayReason;
  }
  /**
   * @param int
   */
  public function setNoIndexReason($noIndexReason)
  {
    $this->noIndexReason = $noIndexReason;
  }
  /**
   * @return int
   */
  public function getNoIndexReason()
  {
    return $this->noIndexReason;
  }
  /**
   * @param int
   */
  public function setNoPreviewReason($noPreviewReason)
  {
    $this->noPreviewReason = $noPreviewReason;
  }
  /**
   * @return int
   */
  public function getNoPreviewReason()
  {
    return $this->noPreviewReason;
  }
  /**
   * @param int
   */
  public function setNoSnippetReason($noSnippetReason)
  {
    $this->noSnippetReason = $noSnippetReason;
  }
  /**
   * @return int
   */
  public function getNoSnippetReason()
  {
    return $this->noSnippetReason;
  }
  /**
   * @param int
   */
  public function setNoTranslateReason($noTranslateReason)
  {
    $this->noTranslateReason = $noTranslateReason;
  }
  /**
   * @return int
   */
  public function getNoTranslateReason()
  {
    return $this->noTranslateReason;
  }
  /**
   * @param int
   */
  public function setPagerank($pagerank)
  {
    $this->pagerank = $pagerank;
  }
  /**
   * @return int
   */
  public function getPagerank()
  {
    return $this->pagerank;
  }
  /**
   * @param int
   */
  public function setPagerankNS($pagerankNS)
  {
    $this->pagerankNS = $pagerankNS;
  }
  /**
   * @return int
   */
  public function getPagerankNS()
  {
    return $this->pagerankNS;
  }
  /**
   * @param string
   */
  public function setRepid($repid)
  {
    $this->repid = $repid;
  }
  /**
   * @return string
   */
  public function getRepid()
  {
    return $this->repid;
  }
  /**
   * @param ScienceCitation
   */
  public function setScienceMetadata(ScienceCitation $scienceMetadata)
  {
    $this->scienceMetadata = $scienceMetadata;
  }
  /**
   * @return ScienceCitation
   */
  public function getScienceMetadata()
  {
    return $this->scienceMetadata;
  }
  /**
   * @param string
   */
  public function setURL($uRL)
  {
    $this->uRL = $uRL;
  }
  /**
   * @return string
   */
  public function getURL()
  {
    return $this->uRL;
  }
  /**
   * @param string
   */
  public function setURLAfterRedirects($uRLAfterRedirects)
  {
    $this->uRLAfterRedirects = $uRLAfterRedirects;
  }
  /**
   * @return string
   */
  public function getURLAfterRedirects()
  {
    return $this->uRLAfterRedirects;
  }
  /**
   * @param int
   */
  public function setURLEncoding($uRLEncoding)
  {
    $this->uRLEncoding = $uRLEncoding;
  }
  /**
   * @return int
   */
  public function getURLEncoding()
  {
    return $this->uRLEncoding;
  }
  /**
   * @param GDocumentBaseContent
   */
  public function setContent(GDocumentBaseContent $content)
  {
    $this->content = $content;
  }
  /**
   * @return GDocumentBaseContent
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param GDocumentBaseDirectory[]
   */
  public function setDirectory($directory)
  {
    $this->directory = $directory;
  }
  /**
   * @return GDocumentBaseDirectory[]
   */
  public function getDirectory()
  {
    return $this->directory;
  }
  /**
   * @param string
   */
  public function setEcnFp($ecnFp)
  {
    $this->ecnFp = $ecnFp;
  }
  /**
   * @return string
   */
  public function getEcnFp()
  {
    return $this->ecnFp;
  }
  /**
   * @param IndexingCrawlerIdServingDocumentIdentifier
   */
  public function setId(IndexingCrawlerIdServingDocumentIdentifier $id)
  {
    $this->id = $id;
  }
  /**
   * @return IndexingCrawlerIdServingDocumentIdentifier
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param LocalsearchDocInfo
   */
  public function setLocalsearchDocInfo(LocalsearchDocInfo $localsearchDocInfo)
  {
    $this->localsearchDocInfo = $localsearchDocInfo;
  }
  /**
   * @return LocalsearchDocInfo
   */
  public function getLocalsearchDocInfo()
  {
    return $this->localsearchDocInfo;
  }
  /**
   * @param OceanDocInfo
   */
  public function setOceanDocInfo(OceanDocInfo $oceanDocInfo)
  {
    $this->oceanDocInfo = $oceanDocInfo;
  }
  /**
   * @return OceanDocInfo
   */
  public function getOceanDocInfo()
  {
    return $this->oceanDocInfo;
  }
  /**
   * @param GDocumentBaseOriginalContent
   */
  public function setOriginalcontent(GDocumentBaseOriginalContent $originalcontent)
  {
    $this->originalcontent = $originalcontent;
  }
  /**
   * @return GDocumentBaseOriginalContent
   */
  public function getOriginalcontent()
  {
    return $this->originalcontent;
  }
  /**
   * @param string
   */
  public function setUserAgentName($userAgentName)
  {
    $this->userAgentName = $userAgentName;
  }
  /**
   * @return string
   */
  public function getUserAgentName()
  {
    return $this->userAgentName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GDocumentBase::class, 'Google_Service_Contentwarehouse_GDocumentBase');
