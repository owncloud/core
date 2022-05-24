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

namespace Google\Service\Clouderrorreporting;

class ErrorGroupStats extends \Google\Collection
{
  protected $collection_key = 'timedCounts';
  protected $affectedServicesType = ServiceContext::class;
  protected $affectedServicesDataType = 'array';
  /**
   * @var string
   */
  public $affectedUsersCount;
  /**
   * @var string
   */
  public $count;
  /**
   * @var string
   */
  public $firstSeenTime;
  protected $groupType = ErrorGroup::class;
  protected $groupDataType = '';
  /**
   * @var string
   */
  public $lastSeenTime;
  /**
   * @var int
   */
  public $numAffectedServices;
  protected $representativeType = ErrorEvent::class;
  protected $representativeDataType = '';
  protected $timedCountsType = TimedCount::class;
  protected $timedCountsDataType = 'array';

  /**
   * @param ServiceContext[]
   */
  public function setAffectedServices($affectedServices)
  {
    $this->affectedServices = $affectedServices;
  }
  /**
   * @return ServiceContext[]
   */
  public function getAffectedServices()
  {
    return $this->affectedServices;
  }
  /**
   * @param string
   */
  public function setAffectedUsersCount($affectedUsersCount)
  {
    $this->affectedUsersCount = $affectedUsersCount;
  }
  /**
   * @return string
   */
  public function getAffectedUsersCount()
  {
    return $this->affectedUsersCount;
  }
  /**
   * @param string
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return string
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param string
   */
  public function setFirstSeenTime($firstSeenTime)
  {
    $this->firstSeenTime = $firstSeenTime;
  }
  /**
   * @return string
   */
  public function getFirstSeenTime()
  {
    return $this->firstSeenTime;
  }
  /**
   * @param ErrorGroup
   */
  public function setGroup(ErrorGroup $group)
  {
    $this->group = $group;
  }
  /**
   * @return ErrorGroup
   */
  public function getGroup()
  {
    return $this->group;
  }
  /**
   * @param string
   */
  public function setLastSeenTime($lastSeenTime)
  {
    $this->lastSeenTime = $lastSeenTime;
  }
  /**
   * @return string
   */
  public function getLastSeenTime()
  {
    return $this->lastSeenTime;
  }
  /**
   * @param int
   */
  public function setNumAffectedServices($numAffectedServices)
  {
    $this->numAffectedServices = $numAffectedServices;
  }
  /**
   * @return int
   */
  public function getNumAffectedServices()
  {
    return $this->numAffectedServices;
  }
  /**
   * @param ErrorEvent
   */
  public function setRepresentative(ErrorEvent $representative)
  {
    $this->representative = $representative;
  }
  /**
   * @return ErrorEvent
   */
  public function getRepresentative()
  {
    return $this->representative;
  }
  /**
   * @param TimedCount[]
   */
  public function setTimedCounts($timedCounts)
  {
    $this->timedCounts = $timedCounts;
  }
  /**
   * @return TimedCount[]
   */
  public function getTimedCounts()
  {
    return $this->timedCounts;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ErrorGroupStats::class, 'Google_Service_Clouderrorreporting_ErrorGroupStats');
