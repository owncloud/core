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

class ActivityContentDetails extends \Google\Model
{
  protected $bulletinType = ActivityContentDetailsBulletin::class;
  protected $bulletinDataType = '';
  protected $channelItemType = ActivityContentDetailsChannelItem::class;
  protected $channelItemDataType = '';
  protected $commentType = ActivityContentDetailsComment::class;
  protected $commentDataType = '';
  protected $favoriteType = ActivityContentDetailsFavorite::class;
  protected $favoriteDataType = '';
  protected $likeType = ActivityContentDetailsLike::class;
  protected $likeDataType = '';
  protected $playlistItemType = ActivityContentDetailsPlaylistItem::class;
  protected $playlistItemDataType = '';
  protected $promotedItemType = ActivityContentDetailsPromotedItem::class;
  protected $promotedItemDataType = '';
  protected $recommendationType = ActivityContentDetailsRecommendation::class;
  protected $recommendationDataType = '';
  protected $socialType = ActivityContentDetailsSocial::class;
  protected $socialDataType = '';
  protected $subscriptionType = ActivityContentDetailsSubscription::class;
  protected $subscriptionDataType = '';
  protected $uploadType = ActivityContentDetailsUpload::class;
  protected $uploadDataType = '';

  /**
   * @param ActivityContentDetailsBulletin
   */
  public function setBulletin(ActivityContentDetailsBulletin $bulletin)
  {
    $this->bulletin = $bulletin;
  }
  /**
   * @return ActivityContentDetailsBulletin
   */
  public function getBulletin()
  {
    return $this->bulletin;
  }
  /**
   * @param ActivityContentDetailsChannelItem
   */
  public function setChannelItem(ActivityContentDetailsChannelItem $channelItem)
  {
    $this->channelItem = $channelItem;
  }
  /**
   * @return ActivityContentDetailsChannelItem
   */
  public function getChannelItem()
  {
    return $this->channelItem;
  }
  /**
   * @param ActivityContentDetailsComment
   */
  public function setComment(ActivityContentDetailsComment $comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return ActivityContentDetailsComment
   */
  public function getComment()
  {
    return $this->comment;
  }
  /**
   * @param ActivityContentDetailsFavorite
   */
  public function setFavorite(ActivityContentDetailsFavorite $favorite)
  {
    $this->favorite = $favorite;
  }
  /**
   * @return ActivityContentDetailsFavorite
   */
  public function getFavorite()
  {
    return $this->favorite;
  }
  /**
   * @param ActivityContentDetailsLike
   */
  public function setLike(ActivityContentDetailsLike $like)
  {
    $this->like = $like;
  }
  /**
   * @return ActivityContentDetailsLike
   */
  public function getLike()
  {
    return $this->like;
  }
  /**
   * @param ActivityContentDetailsPlaylistItem
   */
  public function setPlaylistItem(ActivityContentDetailsPlaylistItem $playlistItem)
  {
    $this->playlistItem = $playlistItem;
  }
  /**
   * @return ActivityContentDetailsPlaylistItem
   */
  public function getPlaylistItem()
  {
    return $this->playlistItem;
  }
  /**
   * @param ActivityContentDetailsPromotedItem
   */
  public function setPromotedItem(ActivityContentDetailsPromotedItem $promotedItem)
  {
    $this->promotedItem = $promotedItem;
  }
  /**
   * @return ActivityContentDetailsPromotedItem
   */
  public function getPromotedItem()
  {
    return $this->promotedItem;
  }
  /**
   * @param ActivityContentDetailsRecommendation
   */
  public function setRecommendation(ActivityContentDetailsRecommendation $recommendation)
  {
    $this->recommendation = $recommendation;
  }
  /**
   * @return ActivityContentDetailsRecommendation
   */
  public function getRecommendation()
  {
    return $this->recommendation;
  }
  /**
   * @param ActivityContentDetailsSocial
   */
  public function setSocial(ActivityContentDetailsSocial $social)
  {
    $this->social = $social;
  }
  /**
   * @return ActivityContentDetailsSocial
   */
  public function getSocial()
  {
    return $this->social;
  }
  /**
   * @param ActivityContentDetailsSubscription
   */
  public function setSubscription(ActivityContentDetailsSubscription $subscription)
  {
    $this->subscription = $subscription;
  }
  /**
   * @return ActivityContentDetailsSubscription
   */
  public function getSubscription()
  {
    return $this->subscription;
  }
  /**
   * @param ActivityContentDetailsUpload
   */
  public function setUpload(ActivityContentDetailsUpload $upload)
  {
    $this->upload = $upload;
  }
  /**
   * @return ActivityContentDetailsUpload
   */
  public function getUpload()
  {
    return $this->upload;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ActivityContentDetails::class, 'Google_Service_YouTube_ActivityContentDetails');
