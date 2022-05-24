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

namespace Google\Service\YouTube;

class CommentThreadSnippet extends \Google\Model
{
  /**
   * @var bool
   */
  public $canReply;
  /**
   * @var string
   */
  public $channelId;
  /**
   * @var bool
   */
  public $isPublic;
  protected $topLevelCommentType = Comment::class;
  protected $topLevelCommentDataType = '';
  /**
   * @var string
   */
  public $totalReplyCount;
  /**
   * @var string
   */
  public $videoId;

  /**
   * @param bool
   */
  public function setCanReply($canReply)
  {
    $this->canReply = $canReply;
  }
  /**
   * @return bool
   */
  public function getCanReply()
  {
    return $this->canReply;
  }
  /**
   * @param string
   */
  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  /**
   * @return string
   */
  public function getChannelId()
  {
    return $this->channelId;
  }
  /**
   * @param bool
   */
  public function setIsPublic($isPublic)
  {
    $this->isPublic = $isPublic;
  }
  /**
   * @return bool
   */
  public function getIsPublic()
  {
    return $this->isPublic;
  }
  /**
   * @param Comment
   */
  public function setTopLevelComment(Comment $topLevelComment)
  {
    $this->topLevelComment = $topLevelComment;
  }
  /**
   * @return Comment
   */
  public function getTopLevelComment()
  {
    return $this->topLevelComment;
  }
  /**
   * @param string
   */
  public function setTotalReplyCount($totalReplyCount)
  {
    $this->totalReplyCount = $totalReplyCount;
  }
  /**
   * @return string
   */
  public function getTotalReplyCount()
  {
    return $this->totalReplyCount;
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
class_alias(CommentThreadSnippet::class, 'Google_Service_YouTube_CommentThreadSnippet');
