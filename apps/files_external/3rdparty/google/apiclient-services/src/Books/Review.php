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

class Review extends \Google\Model
{
  protected $authorType = ReviewAuthor::class;
  protected $authorDataType = '';
  /**
   * @var string
   */
  public $content;
  /**
   * @var string
   */
  public $date;
  /**
   * @var string
   */
  public $fullTextUrl;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $rating;
  protected $sourceType = ReviewSource::class;
  protected $sourceDataType = '';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $volumeId;

  /**
   * @param ReviewAuthor
   */
  public function setAuthor(ReviewAuthor $author)
  {
    $this->author = $author;
  }
  /**
   * @return ReviewAuthor
   */
  public function getAuthor()
  {
    return $this->author;
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
  public function setDate($date)
  {
    $this->date = $date;
  }
  /**
   * @return string
   */
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param string
   */
  public function setFullTextUrl($fullTextUrl)
  {
    $this->fullTextUrl = $fullTextUrl;
  }
  /**
   * @return string
   */
  public function getFullTextUrl()
  {
    return $this->fullTextUrl;
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
   * @param string
   */
  public function setRating($rating)
  {
    $this->rating = $rating;
  }
  /**
   * @return string
   */
  public function getRating()
  {
    return $this->rating;
  }
  /**
   * @param ReviewSource
   */
  public function setSource(ReviewSource $source)
  {
    $this->source = $source;
  }
  /**
   * @return ReviewSource
   */
  public function getSource()
  {
    return $this->source;
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
  public function setVolumeId($volumeId)
  {
    $this->volumeId = $volumeId;
  }
  /**
   * @return string
   */
  public function getVolumeId()
  {
    return $this->volumeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Review::class, 'Google_Service_Books_Review');
