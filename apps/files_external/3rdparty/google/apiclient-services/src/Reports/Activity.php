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

namespace Google\Service\Reports;

class Activity extends \Google\Collection
{
  protected $collection_key = 'events';
  protected $actorType = ActivityActor::class;
  protected $actorDataType = '';
  public $etag;
  protected $eventsType = ActivityEvents::class;
  protected $eventsDataType = 'array';
  protected $idType = ActivityId::class;
  protected $idDataType = '';
  public $ipAddress;
  public $kind;
  public $ownerDomain;

  /**
   * @param ActivityActor
   */
  public function setActor(ActivityActor $actor)
  {
    $this->actor = $actor;
  }
  /**
   * @return ActivityActor
   */
  public function getActor()
  {
    return $this->actor;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param ActivityEvents[]
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return ActivityEvents[]
   */
  public function getEvents()
  {
    return $this->events;
  }
  /**
   * @param ActivityId
   */
  public function setId(ActivityId $id)
  {
    $this->id = $id;
  }
  /**
   * @return ActivityId
   */
  public function getId()
  {
    return $this->id;
  }
  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }
  public function getIpAddress()
  {
    return $this->ipAddress;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOwnerDomain($ownerDomain)
  {
    $this->ownerDomain = $ownerDomain;
  }
  public function getOwnerDomain()
  {
    return $this->ownerDomain;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Activity::class, 'Google_Service_Reports_Activity');
