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

class TrawlerFetchBodyData extends \Google\Model
{
  /**
   * @var string
   */
  public $compression;
  /**
   * @var string
   */
  public $content;
  /**
   * @var string
   */
  public $uncompressedSize;

  /**
   * @param string
   */
  public function setCompression($compression)
  {
    $this->compression = $compression;
  }
  /**
   * @return string
   */
  public function getCompression()
  {
    return $this->compression;
  }
  /**
   * @param string
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param string
   */
  public function setUncompressedSize($uncompressedSize)
  {
    $this->uncompressedSize = $uncompressedSize;
  }
  /**
   * @return string
   */
  public function getUncompressedSize()
  {
    return $this->uncompressedSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerFetchBodyData::class, 'Google_Service_Contentwarehouse_TrawlerFetchBodyData');
