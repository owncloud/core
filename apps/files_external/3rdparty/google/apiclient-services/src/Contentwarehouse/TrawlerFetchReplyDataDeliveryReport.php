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

class TrawlerFetchReplyDataDeliveryReport extends \Google\Collection
{
  protected $collection_key = 'events';
  protected $eventsType = TrawlerEvent::class;
  protected $eventsDataType = 'array';
  /**
   * @var string
   */
  public $filePath;
  /**
   * @var string
   */
  public $status;

  /**
   * @param TrawlerEvent[]
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return TrawlerEvent[]
   */
  public function getEvents()
  {
    return $this->events;
  }
  /**
   * @param string
   */
  public function setFilePath($filePath)
  {
    $this->filePath = $filePath;
  }
  /**
   * @return string
   */
  public function getFilePath()
  {
    return $this->filePath;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerFetchReplyDataDeliveryReport::class, 'Google_Service_Contentwarehouse_TrawlerFetchReplyDataDeliveryReport');
