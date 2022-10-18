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

class IndexingEmbeddedContentEmbeddedLinksInfo extends \Google\Collection
{
  protected $collection_key = 'uncrawledLinkUrl';
  protected $embedderInfoType = IndexingEmbeddedContentEmbedderInfo::class;
  protected $embedderInfoDataType = '';
  protected $linkType = IndexingEmbeddedContentLinkInfo::class;
  protected $linkDataType = 'array';
  protected $pageSizeInfoType = IndexingEmbeddedContentPageSizeInfo::class;
  protected $pageSizeInfoDataType = '';
  /**
   * @var int
   */
  public $sumHttpResponseLength;
  /**
   * @var string[]
   */
  public $uncrawledLinkUrl;

  /**
   * @param IndexingEmbeddedContentEmbedderInfo
   */
  public function setEmbedderInfo(IndexingEmbeddedContentEmbedderInfo $embedderInfo)
  {
    $this->embedderInfo = $embedderInfo;
  }
  /**
   * @return IndexingEmbeddedContentEmbedderInfo
   */
  public function getEmbedderInfo()
  {
    return $this->embedderInfo;
  }
  /**
   * @param IndexingEmbeddedContentLinkInfo[]
   */
  public function setLink($link)
  {
    $this->link = $link;
  }
  /**
   * @return IndexingEmbeddedContentLinkInfo[]
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param IndexingEmbeddedContentPageSizeInfo
   */
  public function setPageSizeInfo(IndexingEmbeddedContentPageSizeInfo $pageSizeInfo)
  {
    $this->pageSizeInfo = $pageSizeInfo;
  }
  /**
   * @return IndexingEmbeddedContentPageSizeInfo
   */
  public function getPageSizeInfo()
  {
    return $this->pageSizeInfo;
  }
  /**
   * @param int
   */
  public function setSumHttpResponseLength($sumHttpResponseLength)
  {
    $this->sumHttpResponseLength = $sumHttpResponseLength;
  }
  /**
   * @return int
   */
  public function getSumHttpResponseLength()
  {
    return $this->sumHttpResponseLength;
  }
  /**
   * @param string[]
   */
  public function setUncrawledLinkUrl($uncrawledLinkUrl)
  {
    $this->uncrawledLinkUrl = $uncrawledLinkUrl;
  }
  /**
   * @return string[]
   */
  public function getUncrawledLinkUrl()
  {
    return $this->uncrawledLinkUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingEmbeddedContentEmbeddedLinksInfo::class, 'Google_Service_Contentwarehouse_IndexingEmbeddedContentEmbeddedLinksInfo');
