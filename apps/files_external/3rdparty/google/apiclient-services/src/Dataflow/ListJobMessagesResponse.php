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

namespace Google\Service\Dataflow;

class ListJobMessagesResponse extends \Google\Collection
{
  protected $collection_key = 'jobMessages';
  protected $autoscalingEventsType = AutoscalingEvent::class;
  protected $autoscalingEventsDataType = 'array';
  protected $jobMessagesType = JobMessage::class;
  protected $jobMessagesDataType = 'array';
  public $nextPageToken;

  /**
   * @param AutoscalingEvent[]
   */
  public function setAutoscalingEvents($autoscalingEvents)
  {
    $this->autoscalingEvents = $autoscalingEvents;
  }
  /**
   * @return AutoscalingEvent[]
   */
  public function getAutoscalingEvents()
  {
    return $this->autoscalingEvents;
  }
  /**
   * @param JobMessage[]
   */
  public function setJobMessages($jobMessages)
  {
    $this->jobMessages = $jobMessages;
  }
  /**
   * @return JobMessage[]
   */
  public function getJobMessages()
  {
    return $this->jobMessages;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListJobMessagesResponse::class, 'Google_Service_Dataflow_ListJobMessagesResponse');
