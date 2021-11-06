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

class ComputeMessageStatsResponse extends \Google\Model
{
  public $messageBytes;
  public $messageCount;
  public $minimumEventTime;
  public $minimumPublishTime;

  public function setMessageBytes($messageBytes)
  {
    $this->messageBytes = $messageBytes;
  }
  public function getMessageBytes()
  {
    return $this->messageBytes;
  }
  public function setMessageCount($messageCount)
  {
    $this->messageCount = $messageCount;
  }
  public function getMessageCount()
  {
    return $this->messageCount;
  }
  public function setMinimumEventTime($minimumEventTime)
  {
    $this->minimumEventTime = $minimumEventTime;
  }
  public function getMinimumEventTime()
  {
    return $this->minimumEventTime;
  }
  public function setMinimumPublishTime($minimumPublishTime)
  {
    $this->minimumPublishTime = $minimumPublishTime;
  }
  public function getMinimumPublishTime()
  {
    return $this->minimumPublishTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ComputeMessageStatsResponse::class, 'Google_Service_PubsubLite_ComputeMessageStatsResponse');
