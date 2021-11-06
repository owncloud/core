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

class ActivityContentDetailsPlaylistItem extends \Google\Model
{
  public $playlistId;
  public $playlistItemId;
  protected $resourceIdType = ResourceId::class;
  protected $resourceIdDataType = '';

  public function setPlaylistId($playlistId)
  {
    $this->playlistId = $playlistId;
  }
  public function getPlaylistId()
  {
    return $this->playlistId;
  }
  public function setPlaylistItemId($playlistItemId)
  {
    $this->playlistItemId = $playlistItemId;
  }
  public function getPlaylistItemId()
  {
    return $this->playlistItemId;
  }
  /**
   * @param ResourceId
   */
  public function setResourceId(ResourceId $resourceId)
  {
    $this->resourceId = $resourceId;
  }
  /**
   * @return ResourceId
   */
  public function getResourceId()
  {
    return $this->resourceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ActivityContentDetailsPlaylistItem::class, 'Google_Service_YouTube_ActivityContentDetailsPlaylistItem');
