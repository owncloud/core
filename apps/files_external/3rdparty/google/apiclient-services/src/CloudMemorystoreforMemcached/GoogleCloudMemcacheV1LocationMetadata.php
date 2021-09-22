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

namespace Google\Service\CloudMemorystoreforMemcached;

class GoogleCloudMemcacheV1LocationMetadata extends \Google\Model
{
  protected $availableZonesType = GoogleCloudMemcacheV1ZoneMetadata::class;
  protected $availableZonesDataType = 'map';

  /**
   * @param GoogleCloudMemcacheV1ZoneMetadata[]
   */
  public function setAvailableZones($availableZones)
  {
    $this->availableZones = $availableZones;
  }
  /**
   * @return GoogleCloudMemcacheV1ZoneMetadata[]
   */
  public function getAvailableZones()
  {
    return $this->availableZones;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMemcacheV1LocationMetadata::class, 'Google_Service_CloudMemorystoreforMemcached_GoogleCloudMemcacheV1LocationMetadata');
