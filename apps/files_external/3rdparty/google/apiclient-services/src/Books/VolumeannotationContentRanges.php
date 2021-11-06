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

class VolumeannotationContentRanges extends \Google\Model
{
  protected $cfiRangeType = BooksAnnotationsRange::class;
  protected $cfiRangeDataType = '';
  public $contentVersion;
  protected $gbImageRangeType = BooksAnnotationsRange::class;
  protected $gbImageRangeDataType = '';
  protected $gbTextRangeType = BooksAnnotationsRange::class;
  protected $gbTextRangeDataType = '';

  /**
   * @param BooksAnnotationsRange
   */
  public function setCfiRange(BooksAnnotationsRange $cfiRange)
  {
    $this->cfiRange = $cfiRange;
  }
  /**
   * @return BooksAnnotationsRange
   */
  public function getCfiRange()
  {
    return $this->cfiRange;
  }
  public function setContentVersion($contentVersion)
  {
    $this->contentVersion = $contentVersion;
  }
  public function getContentVersion()
  {
    return $this->contentVersion;
  }
  /**
   * @param BooksAnnotationsRange
   */
  public function setGbImageRange(BooksAnnotationsRange $gbImageRange)
  {
    $this->gbImageRange = $gbImageRange;
  }
  /**
   * @return BooksAnnotationsRange
   */
  public function getGbImageRange()
  {
    return $this->gbImageRange;
  }
  /**
   * @param BooksAnnotationsRange
   */
  public function setGbTextRange(BooksAnnotationsRange $gbTextRange)
  {
    $this->gbTextRange = $gbTextRange;
  }
  /**
   * @return BooksAnnotationsRange
   */
  public function getGbTextRange()
  {
    return $this->gbTextRange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeannotationContentRanges::class, 'Google_Service_Books_VolumeannotationContentRanges');
