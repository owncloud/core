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

class HtmlrenderWebkitHeadlessProtoPartialRender extends \Google\Collection
{
  protected $collection_key = 'cookie';
  protected $cookieType = HtmlrenderWebkitHeadlessProtoCookie::class;
  protected $cookieDataType = 'array';
  /**
   * @var string
   */
  public $currentClientUrl;
  protected $documentType = HtmlrenderWebkitHeadlessProtoDocument::class;
  protected $documentDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $imageType = HtmlrenderWebkitHeadlessProtoImage::class;
  protected $imageDataType = '';

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
   * @param string
   */
  public function setCurrentClientUrl($currentClientUrl)
  {
    $this->currentClientUrl = $currentClientUrl;
  }
  /**
   * @return string
   */
  public function getCurrentClientUrl()
  {
    return $this->currentClientUrl;
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
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoImage
   */
  public function setImage(HtmlrenderWebkitHeadlessProtoImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoImage
   */
  public function getImage()
  {
    return $this->image;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoPartialRender::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoPartialRender');
