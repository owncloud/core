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

class Google_Service_FirebaseManagement_AnalyticsDetails extends Google_Collection
{
  protected $collection_key = 'streamMappings';
  protected $analyticsPropertyType = 'Google_Service_FirebaseManagement_AnalyticsProperty';
  protected $analyticsPropertyDataType = '';
  protected $streamMappingsType = 'Google_Service_FirebaseManagement_StreamMapping';
  protected $streamMappingsDataType = 'array';

  /**
   * @param Google_Service_FirebaseManagement_AnalyticsProperty
   */
  public function setAnalyticsProperty(Google_Service_FirebaseManagement_AnalyticsProperty $analyticsProperty)
  {
    $this->analyticsProperty = $analyticsProperty;
  }
  /**
   * @return Google_Service_FirebaseManagement_AnalyticsProperty
   */
  public function getAnalyticsProperty()
  {
    return $this->analyticsProperty;
  }
  /**
   * @param Google_Service_FirebaseManagement_StreamMapping
   */
  public function setStreamMappings($streamMappings)
  {
    $this->streamMappings = $streamMappings;
  }
  /**
   * @return Google_Service_FirebaseManagement_StreamMapping
   */
  public function getStreamMappings()
  {
    return $this->streamMappings;
  }
}
