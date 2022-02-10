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

namespace Google\Service\DriveActivity;

class FileComment extends \Google\Model
{
  /**
   * @var string
   */
  public $legacyCommentId;
  /**
   * @var string
   */
  public $legacyDiscussionId;
  /**
   * @var string
   */
  public $linkToDiscussion;
  protected $parentType = DriveItem::class;
  protected $parentDataType = '';

  /**
   * @param string
   */
  public function setLegacyCommentId($legacyCommentId)
  {
    $this->legacyCommentId = $legacyCommentId;
  }
  /**
   * @return string
   */
  public function getLegacyCommentId()
  {
    return $this->legacyCommentId;
  }
  /**
   * @param string
   */
  public function setLegacyDiscussionId($legacyDiscussionId)
  {
    $this->legacyDiscussionId = $legacyDiscussionId;
  }
  /**
   * @return string
   */
  public function getLegacyDiscussionId()
  {
    return $this->legacyDiscussionId;
  }
  /**
   * @param string
   */
  public function setLinkToDiscussion($linkToDiscussion)
  {
    $this->linkToDiscussion = $linkToDiscussion;
  }
  /**
   * @return string
   */
  public function getLinkToDiscussion()
  {
    return $this->linkToDiscussion;
  }
  /**
   * @param DriveItem
   */
  public function setParent(DriveItem $parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return DriveItem
   */
  public function getParent()
  {
    return $this->parent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FileComment::class, 'Google_Service_DriveActivity_FileComment');
