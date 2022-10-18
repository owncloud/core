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

class IndexingConverterLocalizedAlternateName extends \Google\Model
{
  /**
   * @var string
   */
  public $annotationSource;
  /**
   * @var string
   */
  public $deviceMatchInfo;
  /**
   * @var string
   */
  public $ecnFp;
  /**
   * @var string
   */
  public $feedUrl;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $parsedLanguage;
  /**
   * @var int
   */
  public $parsedRegion;
  /**
   * @var string
   */
  public $url;
  /**
   * @var int
   */
  public $urlEncoding;

  /**
   * @param string
   */
  public function setAnnotationSource($annotationSource)
  {
    $this->annotationSource = $annotationSource;
  }
  /**
   * @return string
   */
  public function getAnnotationSource()
  {
    return $this->annotationSource;
  }
  /**
   * @param string
   */
  public function setDeviceMatchInfo($deviceMatchInfo)
  {
    $this->deviceMatchInfo = $deviceMatchInfo;
  }
  /**
   * @return string
   */
  public function getDeviceMatchInfo()
  {
    return $this->deviceMatchInfo;
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
   * @param string
   */
  public function setFeedUrl($feedUrl)
  {
    $this->feedUrl = $feedUrl;
  }
  /**
   * @return string
   */
  public function getFeedUrl()
  {
    return $this->feedUrl;
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
   * @param string
   */
  public function setParsedLanguage($parsedLanguage)
  {
    $this->parsedLanguage = $parsedLanguage;
  }
  /**
   * @return string
   */
  public function getParsedLanguage()
  {
    return $this->parsedLanguage;
  }
  /**
   * @param int
   */
  public function setParsedRegion($parsedRegion)
  {
    $this->parsedRegion = $parsedRegion;
  }
  /**
   * @return int
   */
  public function getParsedRegion()
  {
    return $this->parsedRegion;
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
  /**
   * @param int
   */
  public function setUrlEncoding($urlEncoding)
  {
    $this->urlEncoding = $urlEncoding;
  }
  /**
   * @return int
   */
  public function getUrlEncoding()
  {
    return $this->urlEncoding;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingConverterLocalizedAlternateName::class, 'Google_Service_Contentwarehouse_IndexingConverterLocalizedAlternateName');
