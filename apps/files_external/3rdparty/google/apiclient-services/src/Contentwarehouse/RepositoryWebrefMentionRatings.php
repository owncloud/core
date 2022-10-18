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

class RepositoryWebrefMentionRatings extends \Google\Collection
{
  protected $collection_key = 'singleMentionRating';
  /**
   * @var string
   */
  public $begin;
  /**
   * @var string
   */
  public $end;
  /**
   * @var string[]
   */
  public $mentionMatch;
  protected $singleMentionRatingType = RepositoryWebrefMentionRatingsSingleMentionRating::class;
  protected $singleMentionRatingDataType = 'array';

  /**
   * @param string
   */
  public function setBegin($begin)
  {
    $this->begin = $begin;
  }
  /**
   * @return string
   */
  public function getBegin()
  {
    return $this->begin;
  }
  /**
   * @param string
   */
  public function setEnd($end)
  {
    $this->end = $end;
  }
  /**
   * @return string
   */
  public function getEnd()
  {
    return $this->end;
  }
  /**
   * @param string[]
   */
  public function setMentionMatch($mentionMatch)
  {
    $this->mentionMatch = $mentionMatch;
  }
  /**
   * @return string[]
   */
  public function getMentionMatch()
  {
    return $this->mentionMatch;
  }
  /**
   * @param RepositoryWebrefMentionRatingsSingleMentionRating[]
   */
  public function setSingleMentionRating($singleMentionRating)
  {
    $this->singleMentionRating = $singleMentionRating;
  }
  /**
   * @return RepositoryWebrefMentionRatingsSingleMentionRating[]
   */
  public function getSingleMentionRating()
  {
    return $this->singleMentionRating;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefMentionRatings::class, 'Google_Service_Contentwarehouse_RepositoryWebrefMentionRatings');
