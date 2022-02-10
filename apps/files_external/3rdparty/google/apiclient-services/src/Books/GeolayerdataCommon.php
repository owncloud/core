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

namespace Google\Service\Books;

class GeolayerdataCommon extends \Google\Model
{
  /**
   * @var string
   */
  public $lang;
  /**
   * @var string
   */
  public $previewImageUrl;
  /**
   * @var string
   */
  public $snippet;
  /**
   * @var string
   */
  public $snippetUrl;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setLang($lang)
  {
    $this->lang = $lang;
  }
  /**
   * @return string
   */
  public function getLang()
  {
    return $this->lang;
  }
  /**
   * @param string
   */
  public function setPreviewImageUrl($previewImageUrl)
  {
    $this->previewImageUrl = $previewImageUrl;
  }
  /**
   * @return string
   */
  public function getPreviewImageUrl()
  {
    return $this->previewImageUrl;
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
  public function setSnippetUrl($snippetUrl)
  {
    $this->snippetUrl = $snippetUrl;
  }
  /**
   * @return string
   */
  public function getSnippetUrl()
  {
    return $this->snippetUrl;
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
class_alias(GeolayerdataCommon::class, 'Google_Service_Books_GeolayerdataCommon');
