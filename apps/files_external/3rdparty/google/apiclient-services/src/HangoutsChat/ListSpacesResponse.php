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

namespace Google\Service\HangoutsChat;

class ListSpacesResponse extends \Google\Collection
{
  protected $collection_key = 'spaces';
  /**
   * @var string
   */
  public $nextPageToken;
  protected $spacesType = Space::class;
  protected $spacesDataType = 'array';

  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param Space[]
   */
  public function setSpaces($spaces)
  {
    $this->spaces = $spaces;
  }
  /**
   * @return Space[]
   */
  public function getSpaces()
  {
    return $this->spaces;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListSpacesResponse::class, 'Google_Service_HangoutsChat_ListSpacesResponse');
