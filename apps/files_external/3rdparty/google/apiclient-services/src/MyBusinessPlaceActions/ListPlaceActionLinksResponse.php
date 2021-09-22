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

namespace Google\Service\MyBusinessPlaceActions;

class ListPlaceActionLinksResponse extends \Google\Collection
{
  protected $collection_key = 'placeActionLinks';
  public $nextPageToken;
  protected $placeActionLinksType = PlaceActionLink::class;
  protected $placeActionLinksDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param PlaceActionLink[]
   */
  public function setPlaceActionLinks($placeActionLinks)
  {
    $this->placeActionLinks = $placeActionLinks;
  }
  /**
   * @return PlaceActionLink[]
   */
  public function getPlaceActionLinks()
  {
    return $this->placeActionLinks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListPlaceActionLinksResponse::class, 'Google_Service_MyBusinessPlaceActions_ListPlaceActionLinksResponse');
