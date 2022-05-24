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

namespace Google\Service\Games;

class EventUpdateResponse extends \Google\Collection
{
  protected $collection_key = 'playerEvents';
  protected $batchFailuresType = EventBatchRecordFailure::class;
  protected $batchFailuresDataType = 'array';
  protected $eventFailuresType = EventRecordFailure::class;
  protected $eventFailuresDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  protected $playerEventsType = PlayerEvent::class;
  protected $playerEventsDataType = 'array';

  /**
   * @param EventBatchRecordFailure[]
   */
  public function setBatchFailures($batchFailures)
  {
    $this->batchFailures = $batchFailures;
  }
  /**
   * @return EventBatchRecordFailure[]
   */
  public function getBatchFailures()
  {
    return $this->batchFailures;
  }
  /**
   * @param EventRecordFailure[]
   */
  public function setEventFailures($eventFailures)
  {
    $this->eventFailures = $eventFailures;
  }
  /**
   * @return EventRecordFailure[]
   */
  public function getEventFailures()
  {
    return $this->eventFailures;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param PlayerEvent[]
   */
  public function setPlayerEvents($playerEvents)
  {
    $this->playerEvents = $playerEvents;
  }
  /**
   * @return PlayerEvent[]
   */
  public function getPlayerEvents()
  {
    return $this->playerEvents;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EventUpdateResponse::class, 'Google_Service_Games_EventUpdateResponse');
