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

class AppsDynamiteVideoCallMetadata extends \Google\Model
{
  protected $meetingSpaceType = MeetingSpace::class;
  protected $meetingSpaceDataType = '';
  /**
   * @var bool
   */
  public $shouldNotRender;
  /**
   * @var bool
   */
  public $wasCreatedInCurrentGroup;

  /**
   * @param MeetingSpace
   */
  public function setMeetingSpace(MeetingSpace $meetingSpace)
  {
    $this->meetingSpace = $meetingSpace;
  }
  /**
   * @return MeetingSpace
   */
  public function getMeetingSpace()
  {
    return $this->meetingSpace;
  }
  /**
   * @param bool
   */
  public function setShouldNotRender($shouldNotRender)
  {
    $this->shouldNotRender = $shouldNotRender;
  }
  /**
   * @return bool
   */
  public function getShouldNotRender()
  {
    return $this->shouldNotRender;
  }
  /**
   * @param bool
   */
  public function setWasCreatedInCurrentGroup($wasCreatedInCurrentGroup)
  {
    $this->wasCreatedInCurrentGroup = $wasCreatedInCurrentGroup;
  }
  /**
   * @return bool
   */
  public function getWasCreatedInCurrentGroup()
  {
    return $this->wasCreatedInCurrentGroup;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteVideoCallMetadata::class, 'Google_Service_CloudSearch_AppsDynamiteVideoCallMetadata');
