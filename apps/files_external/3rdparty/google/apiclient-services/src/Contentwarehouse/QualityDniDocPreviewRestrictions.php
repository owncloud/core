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

class QualityDniDocPreviewRestrictions extends \Google\Model
{
  /**
   * @var string
   */
  public $bylineDateSecs;
  /**
   * @var string
   */
  public $crawlTsUsec;
  protected $extendedNewsPreviewsDomainType = QualityDniExtendedNewsPreviews::class;
  protected $extendedNewsPreviewsDomainDataType = '';
  /**
   * @var string
   */
  public $faviconDisplay;
  /**
   * @var int
   */
  public $firstseenDateSecs;
  /**
   * @var bool
   */
  public $isAmp;
  /**
   * @var bool
   */
  public $isEucdDomain;
  /**
   * @var int
   */
  public $maxSnippetLength;
  /**
   * @var int
   */
  public $maxSnippetLengthFromPublisher;
  /**
   * @var int
   */
  public $maxSnippetLengthPublisherDefault;
  /**
   * @var string
   */
  public $maxThumbnailSize;
  /**
   * @var string
   */
  public $maxThumbnailSizeFromPublisher;
  /**
   * @var int
   */
  public $maxThumbnailSizePublisherDefault;
  /**
   * @var int
   */
  public $maxVideoPreviewSecs;
  /**
   * @var int
   */
  public $maxVideoPreviewSecsFromPublisher;
  /**
   * @var int
   */
  public $maxVideoPreviewSecsPublisherDefault;

  /**
   * @param string
   */
  public function setBylineDateSecs($bylineDateSecs)
  {
    $this->bylineDateSecs = $bylineDateSecs;
  }
  /**
   * @return string
   */
  public function getBylineDateSecs()
  {
    return $this->bylineDateSecs;
  }
  /**
   * @param string
   */
  public function setCrawlTsUsec($crawlTsUsec)
  {
    $this->crawlTsUsec = $crawlTsUsec;
  }
  /**
   * @return string
   */
  public function getCrawlTsUsec()
  {
    return $this->crawlTsUsec;
  }
  /**
   * @param QualityDniExtendedNewsPreviews
   */
  public function setExtendedNewsPreviewsDomain(QualityDniExtendedNewsPreviews $extendedNewsPreviewsDomain)
  {
    $this->extendedNewsPreviewsDomain = $extendedNewsPreviewsDomain;
  }
  /**
   * @return QualityDniExtendedNewsPreviews
   */
  public function getExtendedNewsPreviewsDomain()
  {
    return $this->extendedNewsPreviewsDomain;
  }
  /**
   * @param string
   */
  public function setFaviconDisplay($faviconDisplay)
  {
    $this->faviconDisplay = $faviconDisplay;
  }
  /**
   * @return string
   */
  public function getFaviconDisplay()
  {
    return $this->faviconDisplay;
  }
  /**
   * @param int
   */
  public function setFirstseenDateSecs($firstseenDateSecs)
  {
    $this->firstseenDateSecs = $firstseenDateSecs;
  }
  /**
   * @return int
   */
  public function getFirstseenDateSecs()
  {
    return $this->firstseenDateSecs;
  }
  /**
   * @param bool
   */
  public function setIsAmp($isAmp)
  {
    $this->isAmp = $isAmp;
  }
  /**
   * @return bool
   */
  public function getIsAmp()
  {
    return $this->isAmp;
  }
  /**
   * @param bool
   */
  public function setIsEucdDomain($isEucdDomain)
  {
    $this->isEucdDomain = $isEucdDomain;
  }
  /**
   * @return bool
   */
  public function getIsEucdDomain()
  {
    return $this->isEucdDomain;
  }
  /**
   * @param int
   */
  public function setMaxSnippetLength($maxSnippetLength)
  {
    $this->maxSnippetLength = $maxSnippetLength;
  }
  /**
   * @return int
   */
  public function getMaxSnippetLength()
  {
    return $this->maxSnippetLength;
  }
  /**
   * @param int
   */
  public function setMaxSnippetLengthFromPublisher($maxSnippetLengthFromPublisher)
  {
    $this->maxSnippetLengthFromPublisher = $maxSnippetLengthFromPublisher;
  }
  /**
   * @return int
   */
  public function getMaxSnippetLengthFromPublisher()
  {
    return $this->maxSnippetLengthFromPublisher;
  }
  /**
   * @param int
   */
  public function setMaxSnippetLengthPublisherDefault($maxSnippetLengthPublisherDefault)
  {
    $this->maxSnippetLengthPublisherDefault = $maxSnippetLengthPublisherDefault;
  }
  /**
   * @return int
   */
  public function getMaxSnippetLengthPublisherDefault()
  {
    return $this->maxSnippetLengthPublisherDefault;
  }
  /**
   * @param string
   */
  public function setMaxThumbnailSize($maxThumbnailSize)
  {
    $this->maxThumbnailSize = $maxThumbnailSize;
  }
  /**
   * @return string
   */
  public function getMaxThumbnailSize()
  {
    return $this->maxThumbnailSize;
  }
  /**
   * @param string
   */
  public function setMaxThumbnailSizeFromPublisher($maxThumbnailSizeFromPublisher)
  {
    $this->maxThumbnailSizeFromPublisher = $maxThumbnailSizeFromPublisher;
  }
  /**
   * @return string
   */
  public function getMaxThumbnailSizeFromPublisher()
  {
    return $this->maxThumbnailSizeFromPublisher;
  }
  /**
   * @param int
   */
  public function setMaxThumbnailSizePublisherDefault($maxThumbnailSizePublisherDefault)
  {
    $this->maxThumbnailSizePublisherDefault = $maxThumbnailSizePublisherDefault;
  }
  /**
   * @return int
   */
  public function getMaxThumbnailSizePublisherDefault()
  {
    return $this->maxThumbnailSizePublisherDefault;
  }
  /**
   * @param int
   */
  public function setMaxVideoPreviewSecs($maxVideoPreviewSecs)
  {
    $this->maxVideoPreviewSecs = $maxVideoPreviewSecs;
  }
  /**
   * @return int
   */
  public function getMaxVideoPreviewSecs()
  {
    return $this->maxVideoPreviewSecs;
  }
  /**
   * @param int
   */
  public function setMaxVideoPreviewSecsFromPublisher($maxVideoPreviewSecsFromPublisher)
  {
    $this->maxVideoPreviewSecsFromPublisher = $maxVideoPreviewSecsFromPublisher;
  }
  /**
   * @return int
   */
  public function getMaxVideoPreviewSecsFromPublisher()
  {
    return $this->maxVideoPreviewSecsFromPublisher;
  }
  /**
   * @param int
   */
  public function setMaxVideoPreviewSecsPublisherDefault($maxVideoPreviewSecsPublisherDefault)
  {
    $this->maxVideoPreviewSecsPublisherDefault = $maxVideoPreviewSecsPublisherDefault;
  }
  /**
   * @return int
   */
  public function getMaxVideoPreviewSecsPublisherDefault()
  {
    return $this->maxVideoPreviewSecsPublisherDefault;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityDniDocPreviewRestrictions::class, 'Google_Service_Contentwarehouse_QualityDniDocPreviewRestrictions');
