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

class VideoGetRatingResponse extends \Google\Collection
{
  protected $collection_key = 'items';
  public $etag;
  public $eventId;
  protected $itemsType = VideoRating::class;
  protected $itemsDataType = 'array';
  public $kind;
  public $visitorId;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setEventId($eventId)
  {
    $this->eventId = $eventId;
  }
  public function getEventId()
  {
    return $this->eventId;
  }
  /**
   * @param VideoRating[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return VideoRating[]
   */
  public function getItems()
  {
    return $this->items;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setVisitorId($visitorId)
  {
    $this->visitorId = $visitorId;
  }
  public function getVisitorId()
  {
    return $this->visitorId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoGetRatingResponse::class, 'Google_Service_YouTube_VideoGetRatingResponse');
