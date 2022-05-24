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

namespace Google\Service\SearchConsole;

class WmxSitemap extends \Google\Collection
{
  protected $collection_key = 'contents';
  protected $contentsType = WmxSitemapContent::class;
  protected $contentsDataType = 'array';
  /**
   * @var string
   */
  public $errors;
  /**
   * @var bool
   */
  public $isPending;
  /**
   * @var bool
   */
  public $isSitemapsIndex;
  /**
   * @var string
   */
  public $lastDownloaded;
  /**
   * @var string
   */
  public $lastSubmitted;
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $warnings;

  /**
   * @param WmxSitemapContent[]
   */
  public function setContents($contents)
  {
    $this->contents = $contents;
  }
  /**
   * @return WmxSitemapContent[]
   */
  public function getContents()
  {
    return $this->contents;
  }
  /**
   * @param string
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return string
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param bool
   */
  public function setIsPending($isPending)
  {
    $this->isPending = $isPending;
  }
  /**
   * @return bool
   */
  public function getIsPending()
  {
    return $this->isPending;
  }
  /**
   * @param bool
   */
  public function setIsSitemapsIndex($isSitemapsIndex)
  {
    $this->isSitemapsIndex = $isSitemapsIndex;
  }
  /**
   * @return bool
   */
  public function getIsSitemapsIndex()
  {
    return $this->isSitemapsIndex;
  }
  /**
   * @param string
   */
  public function setLastDownloaded($lastDownloaded)
  {
    $this->lastDownloaded = $lastDownloaded;
  }
  /**
   * @return string
   */
  public function getLastDownloaded()
  {
    return $this->lastDownloaded;
  }
  /**
   * @param string
   */
  public function setLastSubmitted($lastSubmitted)
  {
    $this->lastSubmitted = $lastSubmitted;
  }
  /**
   * @return string
   */
  public function getLastSubmitted()
  {
    return $this->lastSubmitted;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return string
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WmxSitemap::class, 'Google_Service_SearchConsole_WmxSitemap');
