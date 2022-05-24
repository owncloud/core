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

namespace Google\Service\AnalyticsReporting;

class EventData extends \Google\Model
{
  /**
   * @var string
   */
  public $eventAction;
  /**
   * @var string
   */
  public $eventCategory;
  /**
   * @var string
   */
  public $eventCount;
  /**
   * @var string
   */
  public $eventLabel;
  /**
   * @var string
   */
  public $eventValue;

  /**
   * @param string
   */
  public function setEventAction($eventAction)
  {
    $this->eventAction = $eventAction;
  }
  /**
   * @return string
   */
  public function getEventAction()
  {
    return $this->eventAction;
  }
  /**
   * @param string
   */
  public function setEventCategory($eventCategory)
  {
    $this->eventCategory = $eventCategory;
  }
  /**
   * @return string
   */
  public function getEventCategory()
  {
    return $this->eventCategory;
  }
  /**
   * @param string
   */
  public function setEventCount($eventCount)
  {
    $this->eventCount = $eventCount;
  }
  /**
   * @return string
   */
  public function getEventCount()
  {
    return $this->eventCount;
  }
  /**
   * @param string
   */
  public function setEventLabel($eventLabel)
  {
    $this->eventLabel = $eventLabel;
  }
  /**
   * @return string
   */
  public function getEventLabel()
  {
    return $this->eventLabel;
  }
  /**
   * @param string
   */
  public function setEventValue($eventValue)
  {
    $this->eventValue = $eventValue;
  }
  /**
   * @return string
   */
  public function getEventValue()
  {
    return $this->eventValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EventData::class, 'Google_Service_AnalyticsReporting_EventData');
