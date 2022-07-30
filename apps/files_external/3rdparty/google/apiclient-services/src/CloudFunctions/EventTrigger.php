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

namespace Google\Service\CloudFunctions;

class EventTrigger extends \Google\Collection
{
  protected $collection_key = 'eventFilters';
  /**
   * @var string
   */
  public $channel;
  protected $eventFiltersType = EventFilter::class;
  protected $eventFiltersDataType = 'array';
  /**
   * @var string
   */
  public $eventType;
  /**
   * @var string
   */
  public $pubsubTopic;
  /**
   * @var string
   */
  public $retryPolicy;
  /**
   * @var string
   */
  public $serviceAccountEmail;
  /**
   * @var string
   */
  public $trigger;
  /**
   * @var string
   */
  public $triggerRegion;

  /**
   * @param string
   */
  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  /**
   * @return string
   */
  public function getChannel()
  {
    return $this->channel;
  }
  /**
   * @param EventFilter[]
   */
  public function setEventFilters($eventFilters)
  {
    $this->eventFilters = $eventFilters;
  }
  /**
   * @return EventFilter[]
   */
  public function getEventFilters()
  {
    return $this->eventFilters;
  }
  /**
   * @param string
   */
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  /**
   * @return string
   */
  public function getEventType()
  {
    return $this->eventType;
  }
  /**
   * @param string
   */
  public function setPubsubTopic($pubsubTopic)
  {
    $this->pubsubTopic = $pubsubTopic;
  }
  /**
   * @return string
   */
  public function getPubsubTopic()
  {
    return $this->pubsubTopic;
  }
  /**
   * @param string
   */
  public function setRetryPolicy($retryPolicy)
  {
    $this->retryPolicy = $retryPolicy;
  }
  /**
   * @return string
   */
  public function getRetryPolicy()
  {
    return $this->retryPolicy;
  }
  /**
   * @param string
   */
  public function setServiceAccountEmail($serviceAccountEmail)
  {
    $this->serviceAccountEmail = $serviceAccountEmail;
  }
  /**
   * @return string
   */
  public function getServiceAccountEmail()
  {
    return $this->serviceAccountEmail;
  }
  /**
   * @param string
   */
  public function setTrigger($trigger)
  {
    $this->trigger = $trigger;
  }
  /**
   * @return string
   */
  public function getTrigger()
  {
    return $this->trigger;
  }
  /**
   * @param string
   */
  public function setTriggerRegion($triggerRegion)
  {
    $this->triggerRegion = $triggerRegion;
  }
  /**
   * @return string
   */
  public function getTriggerRegion()
  {
    return $this->triggerRegion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EventTrigger::class, 'Google_Service_CloudFunctions_EventTrigger');
