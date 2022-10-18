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

class AbuseiamVideoReviewData extends \Google\Collection
{
  protected $collection_key = 'referenceFragment';
  /**
   * @var string[]
   */
  public $referenceFragment;
  protected $reviewerType = AbuseiamVideoReviewer::class;
  protected $reviewerDataType = '';
  /**
   * @var string
   */
  public $videoId;

  /**
   * @param string[]
   */
  public function setReferenceFragment($referenceFragment)
  {
    $this->referenceFragment = $referenceFragment;
  }
  /**
   * @return string[]
   */
  public function getReferenceFragment()
  {
    return $this->referenceFragment;
  }
  /**
   * @param AbuseiamVideoReviewer
   */
  public function setReviewer(AbuseiamVideoReviewer $reviewer)
  {
    $this->reviewer = $reviewer;
  }
  /**
   * @return AbuseiamVideoReviewer
   */
  public function getReviewer()
  {
    return $this->reviewer;
  }
  /**
   * @param string
   */
  public function setVideoId($videoId)
  {
    $this->videoId = $videoId;
  }
  /**
   * @return string
   */
  public function getVideoId()
  {
    return $this->videoId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AbuseiamVideoReviewData::class, 'Google_Service_Contentwarehouse_AbuseiamVideoReviewData');
