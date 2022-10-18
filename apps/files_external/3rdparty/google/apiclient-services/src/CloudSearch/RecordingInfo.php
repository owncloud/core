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

namespace Google\Service\CloudSearch;

class RecordingInfo extends \Google\Model
{
  protected $latestRecordingEventType = RecordingEvent::class;
  protected $latestRecordingEventDataType = '';
  /**
   * @var string
   */
  public $ownerDisplayName;
  /**
   * @var string
   */
  public $producerDeviceId;
  /**
   * @var string
   */
  public $recordingApplicationType;
  /**
   * @var string
   */
  public $recordingId;
  /**
   * @var string
   */
  public $recordingStatus;

  /**
   * @param RecordingEvent
   */
  public function setLatestRecordingEvent(RecordingEvent $latestRecordingEvent)
  {
    $this->latestRecordingEvent = $latestRecordingEvent;
  }
  /**
   * @return RecordingEvent
   */
  public function getLatestRecordingEvent()
  {
    return $this->latestRecordingEvent;
  }
  /**
   * @param string
   */
  public function setOwnerDisplayName($ownerDisplayName)
  {
    $this->ownerDisplayName = $ownerDisplayName;
  }
  /**
   * @return string
   */
  public function getOwnerDisplayName()
  {
    return $this->ownerDisplayName;
  }
  /**
   * @param string
   */
  public function setProducerDeviceId($producerDeviceId)
  {
    $this->producerDeviceId = $producerDeviceId;
  }
  /**
   * @return string
   */
  public function getProducerDeviceId()
  {
    return $this->producerDeviceId;
  }
  /**
   * @param string
   */
  public function setRecordingApplicationType($recordingApplicationType)
  {
    $this->recordingApplicationType = $recordingApplicationType;
  }
  /**
   * @return string
   */
  public function getRecordingApplicationType()
  {
    return $this->recordingApplicationType;
  }
  /**
   * @param string
   */
  public function setRecordingId($recordingId)
  {
    $this->recordingId = $recordingId;
  }
  /**
   * @return string
   */
  public function getRecordingId()
  {
    return $this->recordingId;
  }
  /**
   * @param string
   */
  public function setRecordingStatus($recordingStatus)
  {
    $this->recordingStatus = $recordingStatus;
  }
  /**
   * @return string
   */
  public function getRecordingStatus()
  {
    return $this->recordingStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RecordingInfo::class, 'Google_Service_CloudSearch_RecordingInfo');
