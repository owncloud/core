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

namespace Google\Service\PubsubLite;

class TimeTarget extends \Google\Model
{
  public $eventTime;
  public $publishTime;

  public function setEventTime($eventTime)
  {
    $this->eventTime = $eventTime;
  }
  public function getEventTime()
  {
    return $this->eventTime;
  }
  public function setPublishTime($publishTime)
  {
    $this->publishTime = $publishTime;
  }
  public function getPublishTime()
  {
    return $this->publishTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TimeTarget::class, 'Google_Service_PubsubLite_TimeTarget');
