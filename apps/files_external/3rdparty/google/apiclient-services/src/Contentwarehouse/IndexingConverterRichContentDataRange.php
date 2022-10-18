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

class IndexingConverterRichContentDataRange extends \Google\Model
{
  /**
   * @var string
   */
  public $rangeType;
  /**
   * @var int
   */
  public $size;
  /**
   * @var string
   */
  public $sourceType;
  /**
   * @var string
   */
  public $sourceUrl;
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $textCompressionMethod;

  /**
   * @param string
   */
  public function setRangeType($rangeType)
  {
    $this->rangeType = $rangeType;
  }
  /**
   * @return string
   */
  public function getRangeType()
  {
    return $this->rangeType;
  }
  /**
   * @param int
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return int
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string
   */
  public function setSourceType($sourceType)
  {
    $this->sourceType = $sourceType;
  }
  /**
   * @return string
   */
  public function getSourceType()
  {
    return $this->sourceType;
  }
  /**
   * @param string
   */
  public function setSourceUrl($sourceUrl)
  {
    $this->sourceUrl = $sourceUrl;
  }
  /**
   * @return string
   */
  public function getSourceUrl()
  {
    return $this->sourceUrl;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param string
   */
  public function setTextCompressionMethod($textCompressionMethod)
  {
    $this->textCompressionMethod = $textCompressionMethod;
  }
  /**
   * @return string
   */
  public function getTextCompressionMethod()
  {
    return $this->textCompressionMethod;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingConverterRichContentDataRange::class, 'Google_Service_Contentwarehouse_IndexingConverterRichContentDataRange');
