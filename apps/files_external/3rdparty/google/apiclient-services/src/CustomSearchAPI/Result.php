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

namespace Google\Service\CustomSearchAPI;

class Result extends \Google\Collection
{
  protected $collection_key = 'labels';
  /**
   * @var string
   */
  public $cacheId;
  /**
   * @var string
   */
  public $displayLink;
  /**
   * @var string
   */
  public $fileFormat;
  /**
   * @var string
   */
  public $formattedUrl;
  /**
   * @var string
   */
  public $htmlFormattedUrl;
  /**
   * @var string
   */
  public $htmlSnippet;
  /**
   * @var string
   */
  public $htmlTitle;
  protected $imageType = ResultImage::class;
  protected $imageDataType = '';
  /**
   * @var string
   */
  public $kind;
  protected $labelsType = ResultLabels::class;
  protected $labelsDataType = 'array';
  /**
   * @var string
   */
  public $link;
  /**
   * @var string
   */
  public $mime;
  /**
   * @var array[]
   */
  public $pagemap;
  /**
   * @var string
   */
  public $snippet;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setCacheId($cacheId)
  {
    $this->cacheId = $cacheId;
  }
  /**
   * @return string
   */
  public function getCacheId()
  {
    return $this->cacheId;
  }
  /**
   * @param string
   */
  public function setDisplayLink($displayLink)
  {
    $this->displayLink = $displayLink;
  }
  /**
   * @return string
   */
  public function getDisplayLink()
  {
    return $this->displayLink;
  }
  /**
   * @param string
   */
  public function setFileFormat($fileFormat)
  {
    $this->fileFormat = $fileFormat;
  }
  /**
   * @return string
   */
  public function getFileFormat()
  {
    return $this->fileFormat;
  }
  /**
   * @param string
   */
  public function setFormattedUrl($formattedUrl)
  {
    $this->formattedUrl = $formattedUrl;
  }
  /**
   * @return string
   */
  public function getFormattedUrl()
  {
    return $this->formattedUrl;
  }
  /**
   * @param string
   */
  public function setHtmlFormattedUrl($htmlFormattedUrl)
  {
    $this->htmlFormattedUrl = $htmlFormattedUrl;
  }
  /**
   * @return string
   */
  public function getHtmlFormattedUrl()
  {
    return $this->htmlFormattedUrl;
  }
  /**
   * @param string
   */
  public function setHtmlSnippet($htmlSnippet)
  {
    $this->htmlSnippet = $htmlSnippet;
  }
  /**
   * @return string
   */
  public function getHtmlSnippet()
  {
    return $this->htmlSnippet;
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
   * @param ResultImage
   */
  public function setImage(ResultImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return ResultImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param ResultLabels[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return ResultLabels[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setLink($link)
  {
    $this->link = $link;
  }
  /**
   * @return string
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param string
   */
  public function setMime($mime)
  {
    $this->mime = $mime;
  }
  /**
   * @return string
   */
  public function getMime()
  {
    return $this->mime;
  }
  /**
   * @param array[]
   */
  public function setPagemap($pagemap)
  {
    $this->pagemap = $pagemap;
  }
  /**
   * @return array[]
   */
  public function getPagemap()
  {
    return $this->pagemap;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Result::class, 'Google_Service_CustomSearchAPI_Result');
