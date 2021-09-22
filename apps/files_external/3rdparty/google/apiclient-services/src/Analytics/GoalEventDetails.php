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

namespace Google\Service\Analytics;

class GoalEventDetails extends \Google\Collection
{
  protected $collection_key = 'eventConditions';
  protected $eventConditionsType = GoalEventDetailsEventConditions::class;
  protected $eventConditionsDataType = 'array';
  public $useEventValue;

  /**
   * @param GoalEventDetailsEventConditions[]
   */
  public function setEventConditions($eventConditions)
  {
    $this->eventConditions = $eventConditions;
  }
  /**
   * @return GoalEventDetailsEventConditions[]
   */
  public function getEventConditions()
  {
    return $this->eventConditions;
  }
  public function setUseEventValue($useEventValue)
  {
    $this->useEventValue = $useEventValue;
  }
  public function getUseEventValue()
  {
    return $this->useEventValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoalEventDetails::class, 'Google_Service_Analytics_GoalEventDetails');
