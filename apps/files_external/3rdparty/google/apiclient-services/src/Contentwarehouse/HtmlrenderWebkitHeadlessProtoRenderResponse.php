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

class HtmlrenderWebkitHeadlessProtoRenderResponse extends \Google\Collection
{
  protected $collection_key = 'sessionStorage';
  protected $chromiumTraceType = HtmlrenderWebkitHeadlessProtoChromiumTrace::class;
  protected $chromiumTraceDataType = '';
  protected $cookieType = HtmlrenderWebkitHeadlessProtoCookie::class;
  protected $cookieDataType = 'array';
  protected $documentType = HtmlrenderWebkitHeadlessProtoDocument::class;
  protected $documentDataType = '';
  /**
   * @var string
   */
  public $exceptionDetail;
  /**
   * @var string
   */
  public $exceptions;
  protected $extensionResultType = HtmlrenderWebkitHeadlessProtoRenderExtensionResult::class;
  protected $extensionResultDataType = '';
  /**
   * @var string
   */
  public $finalClientUrl;
  protected $imageType = HtmlrenderWebkitHeadlessProtoImage::class;
  protected $imageDataType = 'array';
  protected $localStorageType = HtmlrenderWebkitHeadlessProtoDOMStorageItem::class;
  protected $localStorageDataType = 'array';
  protected $partialRenderType = HtmlrenderWebkitHeadlessProtoPartialRender::class;
  protected $partialRenderDataType = 'array';
  protected $pdfType = HtmlrenderWebkitHeadlessProtoPdf::class;
  protected $pdfDataType = '';
  protected $referencedResourceContentType = HtmlrenderWebkitHeadlessProtoResource::class;
  protected $referencedResourceContentDataType = 'array';
  protected $renderStatsType = HtmlrenderWebkitHeadlessProtoRenderStats::class;
  protected $renderStatsDataType = '';
  protected $sessionStorageType = HtmlrenderWebkitHeadlessProtoDOMStorageItem::class;
  protected $sessionStorageDataType = 'array';
  /**
   * @var string
   */
  public $title;

  /**
   * @param HtmlrenderWebkitHeadlessProtoChromiumTrace
   */
  public function setChromiumTrace(HtmlrenderWebkitHeadlessProtoChromiumTrace $chromiumTrace)
  {
    $this->chromiumTrace = $chromiumTrace;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoChromiumTrace
   */
  public function getChromiumTrace()
  {
    return $this->chromiumTrace;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoCookie[]
   */
  public function setCookie($cookie)
  {
    $this->cookie = $cookie;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoCookie[]
   */
  public function getCookie()
  {
    return $this->cookie;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoDocument
   */
  public function setDocument(HtmlrenderWebkitHeadlessProtoDocument $document)
  {
    $this->document = $document;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoDocument
   */
  public function getDocument()
  {
    return $this->document;
  }
  /**
   * @param string
   */
  public function setExceptionDetail($exceptionDetail)
  {
    $this->exceptionDetail = $exceptionDetail;
  }
  /**
   * @return string
   */
  public function getExceptionDetail()
  {
    return $this->exceptionDetail;
  }
  /**
   * @param string
   */
  public function setExceptions($exceptions)
  {
    $this->exceptions = $exceptions;
  }
  /**
   * @return string
   */
  public function getExceptions()
  {
    return $this->exceptions;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoRenderExtensionResult
   */
  public function setExtensionResult(HtmlrenderWebkitHeadlessProtoRenderExtensionResult $extensionResult)
  {
    $this->extensionResult = $extensionResult;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoRenderExtensionResult
   */
  public function getExtensionResult()
  {
    return $this->extensionResult;
  }
  /**
   * @param string
   */
  public function setFinalClientUrl($finalClientUrl)
  {
    $this->finalClientUrl = $finalClientUrl;
  }
  /**
   * @return string
   */
  public function getFinalClientUrl()
  {
    return $this->finalClientUrl;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoImage[]
   */
  public function setImage($image)
  {
    $this->image = $image;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoImage[]
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoDOMStorageItem[]
   */
  public function setLocalStorage($localStorage)
  {
    $this->localStorage = $localStorage;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoDOMStorageItem[]
   */
  public function getLocalStorage()
  {
    return $this->localStorage;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoPartialRender[]
   */
  public function setPartialRender($partialRender)
  {
    $this->partialRender = $partialRender;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoPartialRender[]
   */
  public function getPartialRender()
  {
    return $this->partialRender;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoPdf
   */
  public function setPdf(HtmlrenderWebkitHeadlessProtoPdf $pdf)
  {
    $this->pdf = $pdf;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoPdf
   */
  public function getPdf()
  {
    return $this->pdf;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoResource[]
   */
  public function setReferencedResourceContent($referencedResourceContent)
  {
    $this->referencedResourceContent = $referencedResourceContent;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoResource[]
   */
  public function getReferencedResourceContent()
  {
    return $this->referencedResourceContent;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoRenderStats
   */
  public function setRenderStats(HtmlrenderWebkitHeadlessProtoRenderStats $renderStats)
  {
    $this->renderStats = $renderStats;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoRenderStats
   */
  public function getRenderStats()
  {
    return $this->renderStats;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoDOMStorageItem[]
   */
  public function setSessionStorage($sessionStorage)
  {
    $this->sessionStorage = $sessionStorage;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoDOMStorageItem[]
   */
  public function getSessionStorage()
  {
    return $this->sessionStorage;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoRenderResponse::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoRenderResponse');
