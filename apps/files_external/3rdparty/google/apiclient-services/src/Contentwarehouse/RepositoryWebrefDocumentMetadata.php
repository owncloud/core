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

class RepositoryWebrefDocumentMetadata extends \Google\Collection
{
  protected $collection_key = 'repeatedCdocAttachments';
  protected $cdocAttachmentsType = Proto2BridgeMessageSet::class;
  protected $cdocAttachmentsDataType = '';
  /**
   * @var string
   */
  public $crawlTime;
  /**
   * @var string
   */
  public $docFp;
  /**
   * @var string
   */
  public $docId;
  protected $forwardingUrlsType = RepositoryWebrefForwardingUrls::class;
  protected $forwardingUrlsDataType = '';
  /**
   * @var bool
   */
  public $isDisambiguationPage;
  /**
   * @var string
   */
  public $language;
  /**
   * @var float
   */
  public $numIncomingAnchors;
  protected $repeatedCdocAttachmentsType = Proto2BridgeMessageSet::class;
  protected $repeatedCdocAttachmentsDataType = 'array';
  protected $salientTermsType = QualitySalientTermsSalientTermSet::class;
  protected $salientTermsDataType = '';
  /**
   * @var string
   */
  public $title;
  /**
   * @var float
   */
  public $totalClicks;
  /**
   * @var string
   */
  public $url;

  /**
   * @param Proto2BridgeMessageSet
   */
  public function setCdocAttachments(Proto2BridgeMessageSet $cdocAttachments)
  {
    $this->cdocAttachments = $cdocAttachments;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getCdocAttachments()
  {
    return $this->cdocAttachments;
  }
  /**
   * @param string
   */
  public function setCrawlTime($crawlTime)
  {
    $this->crawlTime = $crawlTime;
  }
  /**
   * @return string
   */
  public function getCrawlTime()
  {
    return $this->crawlTime;
  }
  /**
   * @param string
   */
  public function setDocFp($docFp)
  {
    $this->docFp = $docFp;
  }
  /**
   * @return string
   */
  public function getDocFp()
  {
    return $this->docFp;
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
   * @param RepositoryWebrefForwardingUrls
   */
  public function setForwardingUrls(RepositoryWebrefForwardingUrls $forwardingUrls)
  {
    $this->forwardingUrls = $forwardingUrls;
  }
  /**
   * @return RepositoryWebrefForwardingUrls
   */
  public function getForwardingUrls()
  {
    return $this->forwardingUrls;
  }
  /**
   * @param bool
   */
  public function setIsDisambiguationPage($isDisambiguationPage)
  {
    $this->isDisambiguationPage = $isDisambiguationPage;
  }
  /**
   * @return bool
   */
  public function getIsDisambiguationPage()
  {
    return $this->isDisambiguationPage;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param float
   */
  public function setNumIncomingAnchors($numIncomingAnchors)
  {
    $this->numIncomingAnchors = $numIncomingAnchors;
  }
  /**
   * @return float
   */
  public function getNumIncomingAnchors()
  {
    return $this->numIncomingAnchors;
  }
  /**
   * @param Proto2BridgeMessageSet[]
   */
  public function setRepeatedCdocAttachments($repeatedCdocAttachments)
  {
    $this->repeatedCdocAttachments = $repeatedCdocAttachments;
  }
  /**
   * @return Proto2BridgeMessageSet[]
   */
  public function getRepeatedCdocAttachments()
  {
    return $this->repeatedCdocAttachments;
  }
  /**
   * @param QualitySalientTermsSalientTermSet
   */
  public function setSalientTerms(QualitySalientTermsSalientTermSet $salientTerms)
  {
    $this->salientTerms = $salientTerms;
  }
  /**
   * @return QualitySalientTermsSalientTermSet
   */
  public function getSalientTerms()
  {
    return $this->salientTerms;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param float
   */
  public function setTotalClicks($totalClicks)
  {
    $this->totalClicks = $totalClicks;
  }
  /**
   * @return float
   */
  public function getTotalClicks()
  {
    return $this->totalClicks;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefDocumentMetadata::class, 'Google_Service_Contentwarehouse_RepositoryWebrefDocumentMetadata');
