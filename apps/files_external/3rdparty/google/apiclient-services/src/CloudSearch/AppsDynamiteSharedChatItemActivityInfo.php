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

namespace Google\Service\CloudSearch;

class AppsDynamiteSharedChatItemActivityInfo extends \Google\Model
{
  protected $feedItemNudgeType = AppsDynamiteSharedChatItemActivityInfoFeedItemNudge::class;
  protected $feedItemNudgeDataType = '';
  protected $feedItemReactionsType = AppsDynamiteSharedChatItemActivityInfoFeedItemReactions::class;
  protected $feedItemReactionsDataType = '';
  protected $feedItemThreadReplyType = AppsDynamiteSharedChatItemActivityInfoFeedItemThreadReply::class;
  protected $feedItemThreadReplyDataType = '';
  protected $feedItemUserMentionType = AppsDynamiteSharedChatItemActivityInfoFeedItemUserMention::class;
  protected $feedItemUserMentionDataType = '';

  /**
   * @param AppsDynamiteSharedChatItemActivityInfoFeedItemNudge
   */
  public function setFeedItemNudge(AppsDynamiteSharedChatItemActivityInfoFeedItemNudge $feedItemNudge)
  {
    $this->feedItemNudge = $feedItemNudge;
  }
  /**
   * @return AppsDynamiteSharedChatItemActivityInfoFeedItemNudge
   */
  public function getFeedItemNudge()
  {
    return $this->feedItemNudge;
  }
  /**
   * @param AppsDynamiteSharedChatItemActivityInfoFeedItemReactions
   */
  public function setFeedItemReactions(AppsDynamiteSharedChatItemActivityInfoFeedItemReactions $feedItemReactions)
  {
    $this->feedItemReactions = $feedItemReactions;
  }
  /**
   * @return AppsDynamiteSharedChatItemActivityInfoFeedItemReactions
   */
  public function getFeedItemReactions()
  {
    return $this->feedItemReactions;
  }
  /**
   * @param AppsDynamiteSharedChatItemActivityInfoFeedItemThreadReply
   */
  public function setFeedItemThreadReply(AppsDynamiteSharedChatItemActivityInfoFeedItemThreadReply $feedItemThreadReply)
  {
    $this->feedItemThreadReply = $feedItemThreadReply;
  }
  /**
   * @return AppsDynamiteSharedChatItemActivityInfoFeedItemThreadReply
   */
  public function getFeedItemThreadReply()
  {
    return $this->feedItemThreadReply;
  }
  /**
   * @param AppsDynamiteSharedChatItemActivityInfoFeedItemUserMention
   */
  public function setFeedItemUserMention(AppsDynamiteSharedChatItemActivityInfoFeedItemUserMention $feedItemUserMention)
  {
    $this->feedItemUserMention = $feedItemUserMention;
  }
  /**
   * @return AppsDynamiteSharedChatItemActivityInfoFeedItemUserMention
   */
  public function getFeedItemUserMention()
  {
    return $this->feedItemUserMention;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedChatItemActivityInfo::class, 'Google_Service_CloudSearch_AppsDynamiteSharedChatItemActivityInfo');
