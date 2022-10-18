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

namespace Google\Service\CloudSearch;

class UrlMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $domain;
  protected $gwsUrlType = SafeUrlProto::class;
  protected $gwsUrlDataType = '';
  /**
   * @var string
   */
  public $gwsUrlExpirationTimestamp;
  /**
   * @var string
   */
  public $imageHeight;
  /**
   * @var string
   */
  public $imageUrl;
  /**
   * @var string
   */
  public $imageWidth;
  /**
   * @var int
   */
  public $intImageHeight;
  /**
   * @var int
   */
  public $intImageWidth;
  /**
   * @var string
   */
  public $mimeType;
  protected $redirectUrlType = SafeUrlProto::class;
  protected $redirectUrlDataType = '';
  /**
   * @var bool
   */
  public $shouldNotRender;
  /**
   * @var string
   */
  public $snippet;
  /**
   * @var string
   */
  public $title;
  protected $urlType = SafeUrlProto::class;
  protected $urlDataType = '';
  /**
   * @var string
   */
  public $urlSource;

  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param SafeUrlProto
   */
  public function setGwsUrl(SafeUrlProto $gwsUrl)
  {
    $this->gwsUrl = $gwsUrl;
  }
  /**
   * @return SafeUrlProto
   */
  public function getGwsUrl()
  {
    return $this->gwsUrl;
  }
  /**
   * @param string
   */
  public function setGwsUrlExpirationTimestamp($gwsUrlExpirationTimestamp)
  {
    $this->gwsUrlExpirationTimestamp = $gwsUrlExpirationTimestamp;
  }
  /**
   * @return string
   */
  public function getGwsUrlExpirationTimestamp()
  {
    return $this->gwsUrlExpirationTimestamp;
  }
  /**
   * @param string
   */
  public function setImageHeight($imageHeight)
  {
    $this->imageHeight = $imageHeight;
  }
  /**
   * @return string
   */
  public function getImageHeight()
  {
    return $this->imageHeight;
  }
  /**
   * @param string
   */
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  /**
   * @return string
   */
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  /**
   * @param string
   */
  public function setImageWidth($imageWidth)
  {
    $this->imageWidth = $imageWidth;
  }
  /**
   * @return string
   */
  public function getImageWidth()
  {
    return $this->imageWidth;
  }
  /**
   * @param int
   */
  public function setIntImageHeight($intImageHeight)
  {
    $this->intImageHeight = $intImageHeight;
  }
  /**
   * @return int
   */
  public function getIntImageHeight()
  {
    return $this->intImageHeight;
  }
  /**
   * @param int
   */
  public function setIntImageWidth($intImageWidth)
  {
    $this->intImageWidth = $intImageWidth;
  }
  /**
   * @return int
   */
  public function getIntImageWidth()
  {
    return $this->intImageWidth;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param SafeUrlProto
   */
  public function setRedirectUrl(SafeUrlProto $redirectUrl)
  {
    $this->redirectUrl = $redirectUrl;
  }
  /**
   * @return SafeUrlProto
   */
  public function getRedirectUrl()
  {
    return $this->redirectUrl;
  }
  /**
   * @param bool
   */
  public function setShouldNotRender($shouldNotRender)
  {
    $this->shouldNotRender = $shouldNotRender;
  }
  /**
   * @return bool
   */
  public function getShouldNotRender()
  {
    return $this->shouldNotRender;
  }
  /**
   * @param string
   */
  public function setSnippet($snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return string
   */
  public function getSnippet()
  {
    return $this->snippet;
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
   * @param SafeUrlProto
   */
  public function setUrl(SafeUrlProto $url)
  {
    $this->url = $url;
  }
  /**
   * @return SafeUrlProto
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param string
   */
  public function setUrlSource($urlSource)
  {
    $this->urlSource = $urlSource;
  }
  /**
   * @return string
   */
  public function getUrlSource()
  {
    return $this->urlSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UrlMetadata::class, 'Google_Service_CloudSearch_UrlMetadata');
