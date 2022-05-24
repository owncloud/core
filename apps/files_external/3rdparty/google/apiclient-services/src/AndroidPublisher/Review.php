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

namespace Google\Service\AndroidPublisher;

class Review extends \Google\Collection
{
  protected $collection_key = 'comments';
  /**
   * @var string
   */
  public $authorName;
  protected $commentsType = Comment::class;
  protected $commentsDataType = 'array';
  /**
   * @var string
   */
  public $reviewId;

  /**
   * @param string
   */
  public function setAuthorName($authorName)
  {
    $this->authorName = $authorName;
  }
  /**
   * @return string
   */
  public function getAuthorName()
  {
    return $this->authorName;
  }
  /**
   * @param Comment[]
   */
  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  /**
   * @return Comment[]
   */
  public function getComments()
  {
    return $this->comments;
  }
  /**
   * @param string
   */
  public function setReviewId($reviewId)
  {
    $this->reviewId = $reviewId;
  }
  /**
   * @return string
   */
  public function getReviewId()
  {
    return $this->reviewId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Review::class, 'Google_Service_AndroidPublisher_Review');
