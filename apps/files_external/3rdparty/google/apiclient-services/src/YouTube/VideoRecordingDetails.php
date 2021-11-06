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

namespace Google\Service\YouTube;

class VideoRecordingDetails extends \Google\Model
{
  protected $locationType = GeoPoint::class;
  protected $locationDataType = '';
  public $locationDescription;
  public $recordingDate;

  /**
   * @param GeoPoint
   */
  public function setLocation(GeoPoint $location)
  {
    $this->location = $location;
  }
  /**
   * @return GeoPoint
   */
  public function getLocation()
  {
    return $this->location;
  }
  public function setLocationDescription($locationDescription)
  {
    $this->locationDescription = $locationDescription;
  }
  public function getLocationDescription()
  {
    return $this->locationDescription;
  }
  public function setRecordingDate($recordingDate)
  {
    $this->recordingDate = $recordingDate;
  }
  public function getRecordingDate()
  {
    return $this->recordingDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoRecordingDetails::class, 'Google_Service_YouTube_VideoRecordingDetails');
