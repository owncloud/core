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

class Google_Service_Docs_InsertInlineImageRequest extends Google_Model
{
  protected $endOfSegmentLocationType = 'Google_Service_Docs_EndOfSegmentLocation';
  protected $endOfSegmentLocationDataType = '';
  protected $locationType = 'Google_Service_Docs_Location';
  protected $locationDataType = '';
  protected $objectSizeType = 'Google_Service_Docs_Size';
  protected $objectSizeDataType = '';
  public $uri;

  /**
   * @param Google_Service_Docs_EndOfSegmentLocation
   */
  public function setEndOfSegmentLocation(Google_Service_Docs_EndOfSegmentLocation $endOfSegmentLocation)
  {
    $this->endOfSegmentLocation = $endOfSegmentLocation;
  }
  /**
   * @return Google_Service_Docs_EndOfSegmentLocation
   */
  public function getEndOfSegmentLocation()
  {
    return $this->endOfSegmentLocation;
  }
  /**
   * @param Google_Service_Docs_Location
   */
  public function setLocation(Google_Service_Docs_Location $location)
  {
    $this->location = $location;
  }
  /**
   * @return Google_Service_Docs_Location
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param Google_Service_Docs_Size
   */
  public function setObjectSize(Google_Service_Docs_Size $objectSize)
  {
    $this->objectSize = $objectSize;
  }
  /**
   * @return Google_Service_Docs_Size
   */
  public function getObjectSize()
  {
    return $this->objectSize;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}
