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

namespace Google\Service\FirebaseManagement;

class AnalyticsDetails extends \Google\Collection
{
  protected $collection_key = 'streamMappings';
  protected $analyticsPropertyType = AnalyticsProperty::class;
  protected $analyticsPropertyDataType = '';
  protected $streamMappingsType = StreamMapping::class;
  protected $streamMappingsDataType = 'array';

  /**
   * @param AnalyticsProperty
   */
  public function setAnalyticsProperty(AnalyticsProperty $analyticsProperty)
  {
    $this->analyticsProperty = $analyticsProperty;
  }
  /**
   * @return AnalyticsProperty
   */
  public function getAnalyticsProperty()
  {
    return $this->analyticsProperty;
  }
  /**
   * @param StreamMapping[]
   */
  public function setStreamMappings($streamMappings)
  {
    $this->streamMappings = $streamMappings;
  }
  /**
   * @return StreamMapping[]
   */
  public function getStreamMappings()
  {
    return $this->streamMappings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AnalyticsDetails::class, 'Google_Service_FirebaseManagement_AnalyticsDetails');
