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

class Playlist extends \Google\Model
{
  protected $contentDetailsType = PlaylistContentDetails::class;
  protected $contentDetailsDataType = '';
  public $etag;
  public $id;
  public $kind;
  protected $localizationsType = PlaylistLocalization::class;
  protected $localizationsDataType = 'map';
  protected $playerType = PlaylistPlayer::class;
  protected $playerDataType = '';
  protected $snippetType = PlaylistSnippet::class;
  protected $snippetDataType = '';
  protected $statusType = PlaylistStatus::class;
  protected $statusDataType = '';

  /**
   * @param PlaylistContentDetails
   */
  public function setContentDetails(PlaylistContentDetails $contentDetails)
  {
    $this->contentDetails = $contentDetails;
  }
  /**
   * @return PlaylistContentDetails
   */
  public function getContentDetails()
  {
    return $this->contentDetails;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param PlaylistLocalization[]
   */
  public function setLocalizations($localizations)
  {
    $this->localizations = $localizations;
  }
  /**
   * @return PlaylistLocalization[]
   */
  public function getLocalizations()
  {
    return $this->localizations;
  }
  /**
   * @param PlaylistPlayer
   */
  public function setPlayer(PlaylistPlayer $player)
  {
    $this->player = $player;
  }
  /**
   * @return PlaylistPlayer
   */
  public function getPlayer()
  {
    return $this->player;
  }
  /**
   * @param PlaylistSnippet
   */
  public function setSnippet(PlaylistSnippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return PlaylistSnippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param PlaylistStatus
   */
  public function setStatus(PlaylistStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return PlaylistStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Playlist::class, 'Google_Service_YouTube_Playlist');
