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

class BooksAnnotationsRange extends \Google\Model
{
  /**
   * @var string
   */
  public $endOffset;
  /**
   * @var string
   */
  public $endPosition;
  /**
   * @var string
   */
  public $startOffset;
  /**
   * @var string
   */
  public $startPosition;

  /**
   * @param string
   */
  public function setEndOffset($endOffset)
  {
    $this->endOffset = $endOffset;
  }
  /**
   * @return string
   */
  public function getEndOffset()
  {
    return $this->endOffset;
  }
  /**
   * @param string
   */
  public function setEndPosition($endPosition)
  {
    $this->endPosition = $endPosition;
  }
  /**
   * @return string
   */
  public function getEndPosition()
  {
    return $this->endPosition;
  }
  /**
   * @param string
   */
  public function setStartOffset($startOffset)
  {
    $this->startOffset = $startOffset;
  }
  /**
   * @return string
   */
  public function getStartOffset()
  {
    return $this->startOffset;
  }
  /**
   * @param string
   */
  public function setStartPosition($startPosition)
  {
    $this->startPosition = $startPosition;
  }
  /**
   * @return string
   */
  public function getStartPosition()
  {
    return $this->startPosition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BooksAnnotationsRange::class, 'Google_Service_Books_BooksAnnotationsRange');
