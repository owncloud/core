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

class VideoContentSearchCommentAnchorSetFeatures extends \Google\Collection
{
  protected $collection_key = 'replies';
  protected $repliesType = VideoContentSearchCommentAnchorSetFeaturesComment::class;
  protected $repliesDataType = 'array';
  protected $rootCommentType = VideoContentSearchCommentAnchorSetFeaturesComment::class;
  protected $rootCommentDataType = '';

  /**
   * @param VideoContentSearchCommentAnchorSetFeaturesComment[]
   */
  public function setReplies($replies)
  {
    $this->replies = $replies;
  }
  /**
   * @return VideoContentSearchCommentAnchorSetFeaturesComment[]
   */
  public function getReplies()
  {
    return $this->replies;
  }
  /**
   * @param VideoContentSearchCommentAnchorSetFeaturesComment
   */
  public function setRootComment(VideoContentSearchCommentAnchorSetFeaturesComment $rootComment)
  {
    $this->rootComment = $rootComment;
  }
  /**
   * @return VideoContentSearchCommentAnchorSetFeaturesComment
   */
  public function getRootComment()
  {
    return $this->rootComment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchCommentAnchorSetFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchCommentAnchorSetFeatures');
