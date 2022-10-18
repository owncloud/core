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

class HangoutEvent extends \Google\Collection
{
  protected $collection_key = 'participantId';
  /**
   * @var string
   */
  public $hangoutDurationSecs;
  /**
   * @var string
   */
  public $mediaType;
  protected $participantIdType = StoredParticipantId::class;
  protected $participantIdDataType = 'array';
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setHangoutDurationSecs($hangoutDurationSecs)
  {
    $this->hangoutDurationSecs = $hangoutDurationSecs;
  }
  /**
   * @return string
   */
  public function getHangoutDurationSecs()
  {
    return $this->hangoutDurationSecs;
  }
  /**
   * @param string
   */
  public function setMediaType($mediaType)
  {
    $this->mediaType = $mediaType;
  }
  /**
   * @return string
   */
  public function getMediaType()
  {
    return $this->mediaType;
  }
  /**
   * @param StoredParticipantId[]
   */
  public function setParticipantId($participantId)
  {
    $this->participantId = $participantId;
  }
  /**
   * @return StoredParticipantId[]
   */
  public function getParticipantId()
  {
    return $this->participantId;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HangoutEvent::class, 'Google_Service_CloudSearch_HangoutEvent');
