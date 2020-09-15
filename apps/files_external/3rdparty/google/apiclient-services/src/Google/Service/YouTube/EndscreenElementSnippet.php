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

class Google_Service_YouTube_EndscreenElementSnippet extends Google_Model
{
  protected $channelElementType = 'Google_Service_YouTube_ChannelElement';
  protected $channelElementDataType = '';
  public $duration;
  public $left;
  protected $linkElementType = 'Google_Service_YouTube_LinkElement';
  protected $linkElementDataType = '';
  protected $merchandiseElementType = 'Google_Service_YouTube_MerchandiseElement';
  protected $merchandiseElementDataType = '';
  protected $playlistElementType = 'Google_Service_YouTube_PlaylistElement';
  protected $playlistElementDataType = '';
  public $startOffset;
  protected $subscribeElementType = 'Google_Service_YouTube_SubscribeElement';
  protected $subscribeElementDataType = '';
  public $top;
  protected $videoElementType = 'Google_Service_YouTube_VideoElement';
  protected $videoElementDataType = '';
  public $width;

  /**
   * @param Google_Service_YouTube_ChannelElement
   */
  public function setChannelElement(Google_Service_YouTube_ChannelElement $channelElement)
  {
    $this->channelElement = $channelElement;
  }
  /**
   * @return Google_Service_YouTube_ChannelElement
   */
  public function getChannelElement()
  {
    return $this->channelElement;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function setLeft($left)
  {
    $this->left = $left;
  }
  public function getLeft()
  {
    return $this->left;
  }
  /**
   * @param Google_Service_YouTube_LinkElement
   */
  public function setLinkElement(Google_Service_YouTube_LinkElement $linkElement)
  {
    $this->linkElement = $linkElement;
  }
  /**
   * @return Google_Service_YouTube_LinkElement
   */
  public function getLinkElement()
  {
    return $this->linkElement;
  }
  /**
   * @param Google_Service_YouTube_MerchandiseElement
   */
  public function setMerchandiseElement(Google_Service_YouTube_MerchandiseElement $merchandiseElement)
  {
    $this->merchandiseElement = $merchandiseElement;
  }
  /**
   * @return Google_Service_YouTube_MerchandiseElement
   */
  public function getMerchandiseElement()
  {
    return $this->merchandiseElement;
  }
  /**
   * @param Google_Service_YouTube_PlaylistElement
   */
  public function setPlaylistElement(Google_Service_YouTube_PlaylistElement $playlistElement)
  {
    $this->playlistElement = $playlistElement;
  }
  /**
   * @return Google_Service_YouTube_PlaylistElement
   */
  public function getPlaylistElement()
  {
    return $this->playlistElement;
  }
  public function setStartOffset($startOffset)
  {
    $this->startOffset = $startOffset;
  }
  public function getStartOffset()
  {
    return $this->startOffset;
  }
  /**
   * @param Google_Service_YouTube_SubscribeElement
   */
  public function setSubscribeElement(Google_Service_YouTube_SubscribeElement $subscribeElement)
  {
    $this->subscribeElement = $subscribeElement;
  }
  /**
   * @return Google_Service_YouTube_SubscribeElement
   */
  public function getSubscribeElement()
  {
    return $this->subscribeElement;
  }
  public function setTop($top)
  {
    $this->top = $top;
  }
  public function getTop()
  {
    return $this->top;
  }
  /**
   * @param Google_Service_YouTube_VideoElement
   */
  public function setVideoElement(Google_Service_YouTube_VideoElement $videoElement)
  {
    $this->videoElement = $videoElement;
  }
  /**
   * @return Google_Service_YouTube_VideoElement
   */
  public function getVideoElement()
  {
    return $this->videoElement;
  }
  public function setWidth($width)
  {
    $this->width = $width;
  }
  public function getWidth()
  {
    return $this->width;
  }
}
