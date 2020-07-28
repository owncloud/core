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

class Google_Service_YouTube_InfoCardSnippet extends Google_Model
{
  protected $channelInfocardType = 'Google_Service_YouTube_ChannelCard';
  protected $channelInfocardDataType = '';
  protected $linkInfocardType = 'Google_Service_YouTube_LinkCard';
  protected $linkInfocardDataType = '';
  protected $playlistInfocardType = 'Google_Service_YouTube_PlaylistCard';
  protected $playlistInfocardDataType = '';
  protected $teaserType = 'Google_Service_YouTube_InfoCardSnippetTeaser';
  protected $teaserDataType = '';
  protected $videoInfocardType = 'Google_Service_YouTube_VideoCard';
  protected $videoInfocardDataType = '';

  /**
   * @param Google_Service_YouTube_ChannelCard
   */
  public function setChannelInfocard(Google_Service_YouTube_ChannelCard $channelInfocard)
  {
    $this->channelInfocard = $channelInfocard;
  }
  /**
   * @return Google_Service_YouTube_ChannelCard
   */
  public function getChannelInfocard()
  {
    return $this->channelInfocard;
  }
  /**
   * @param Google_Service_YouTube_LinkCard
   */
  public function setLinkInfocard(Google_Service_YouTube_LinkCard $linkInfocard)
  {
    $this->linkInfocard = $linkInfocard;
  }
  /**
   * @return Google_Service_YouTube_LinkCard
   */
  public function getLinkInfocard()
  {
    return $this->linkInfocard;
  }
  /**
   * @param Google_Service_YouTube_PlaylistCard
   */
  public function setPlaylistInfocard(Google_Service_YouTube_PlaylistCard $playlistInfocard)
  {
    $this->playlistInfocard = $playlistInfocard;
  }
  /**
   * @return Google_Service_YouTube_PlaylistCard
   */
  public function getPlaylistInfocard()
  {
    return $this->playlistInfocard;
  }
  /**
   * @param Google_Service_YouTube_InfoCardSnippetTeaser
   */
  public function setTeaser(Google_Service_YouTube_InfoCardSnippetTeaser $teaser)
  {
    $this->teaser = $teaser;
  }
  /**
   * @return Google_Service_YouTube_InfoCardSnippetTeaser
   */
  public function getTeaser()
  {
    return $this->teaser;
  }
  /**
   * @param Google_Service_YouTube_VideoCard
   */
  public function setVideoInfocard(Google_Service_YouTube_VideoCard $videoInfocard)
  {
    $this->videoInfocard = $videoInfocard;
  }
  /**
   * @return Google_Service_YouTube_VideoCard
   */
  public function getVideoInfocard()
  {
    return $this->videoInfocard;
  }
}
