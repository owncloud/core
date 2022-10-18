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

class VideoContentSearchCommentAnchorSetFeaturesComment extends \Google\Model
{
  /**
   * @var string
   */
  public $commentId;
  /**
   * @var int
   */
  public $likeCount;
  protected $miniStanzaType = YoutubeCommentsClusteringMiniStanza::class;
  protected $miniStanzaDataType = '';
  /**
   * @var string
   */
  public $publishedAt;
  /**
   * @var string
   */
  public $textDisplay;
  /**
   * @var string
   */
  public $textOriginal;
  /**
   * @var string
   */
  public $updatedAt;

  /**
   * @param string
   */
  public function setCommentId($commentId)
  {
    $this->commentId = $commentId;
  }
  /**
   * @return string
   */
  public function getCommentId()
  {
    return $this->commentId;
  }
  /**
   * @param int
   */
  public function setLikeCount($likeCount)
  {
    $this->likeCount = $likeCount;
  }
  /**
   * @return int
   */
  public function getLikeCount()
  {
    return $this->likeCount;
  }
  /**
   * @param YoutubeCommentsClusteringMiniStanza
   */
  public function setMiniStanza(YoutubeCommentsClusteringMiniStanza $miniStanza)
  {
    $this->miniStanza = $miniStanza;
  }
  /**
   * @return YoutubeCommentsClusteringMiniStanza
   */
  public function getMiniStanza()
  {
    return $this->miniStanza;
  }
  /**
   * @param string
   */
  public function setPublishedAt($publishedAt)
  {
    $this->publishedAt = $publishedAt;
  }
  /**
   * @return string
   */
  public function getPublishedAt()
  {
    return $this->publishedAt;
  }
  /**
   * @param string
   */
  public function setTextDisplay($textDisplay)
  {
    $this->textDisplay = $textDisplay;
  }
  /**
   * @return string
   */
  public function getTextDisplay()
  {
    return $this->textDisplay;
  }
  /**
   * @param string
   */
  public function setTextOriginal($textOriginal)
  {
    $this->textOriginal = $textOriginal;
  }
  /**
   * @return string
   */
  public function getTextOriginal()
  {
    return $this->textOriginal;
  }
  /**
   * @param string
   */
  public function setUpdatedAt($updatedAt)
  {
    $this->updatedAt = $updatedAt;
  }
  /**
   * @return string
   */
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchCommentAnchorSetFeaturesComment::class, 'Google_Service_Contentwarehouse_VideoContentSearchCommentAnchorSetFeaturesComment');
