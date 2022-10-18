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

class BookCitationPerDocData extends \Google\Model
{
  /**
   * @var string
   */
  public $bookId;
  /**
   * @var int
   */
  public $discretizedCitationScore;
  /**
   * @var bool
   */
  public $previewable;
  /**
   * @var string
   */
  public $secondBookId;
  /**
   * @var int
   */
  public $secondDiscretizedCitationScore;

  /**
   * @param string
   */
  public function setBookId($bookId)
  {
    $this->bookId = $bookId;
  }
  /**
   * @return string
   */
  public function getBookId()
  {
    return $this->bookId;
  }
  /**
   * @param int
   */
  public function setDiscretizedCitationScore($discretizedCitationScore)
  {
    $this->discretizedCitationScore = $discretizedCitationScore;
  }
  /**
   * @return int
   */
  public function getDiscretizedCitationScore()
  {
    return $this->discretizedCitationScore;
  }
  /**
   * @param bool
   */
  public function setPreviewable($previewable)
  {
    $this->previewable = $previewable;
  }
  /**
   * @return bool
   */
  public function getPreviewable()
  {
    return $this->previewable;
  }
  /**
   * @param string
   */
  public function setSecondBookId($secondBookId)
  {
    $this->secondBookId = $secondBookId;
  }
  /**
   * @return string
   */
  public function getSecondBookId()
  {
    return $this->secondBookId;
  }
  /**
   * @param int
   */
  public function setSecondDiscretizedCitationScore($secondDiscretizedCitationScore)
  {
    $this->secondDiscretizedCitationScore = $secondDiscretizedCitationScore;
  }
  /**
   * @return int
   */
  public function getSecondDiscretizedCitationScore()
  {
    return $this->secondDiscretizedCitationScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BookCitationPerDocData::class, 'Google_Service_Contentwarehouse_BookCitationPerDocData');
