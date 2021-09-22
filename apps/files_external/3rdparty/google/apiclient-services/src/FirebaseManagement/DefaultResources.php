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

class DefaultResources extends \Google\Model
{
  public $hostingSite;
  public $locationId;
  public $realtimeDatabaseInstance;
  public $storageBucket;

  public function setHostingSite($hostingSite)
  {
    $this->hostingSite = $hostingSite;
  }
  public function getHostingSite()
  {
    return $this->hostingSite;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
  public function setRealtimeDatabaseInstance($realtimeDatabaseInstance)
  {
    $this->realtimeDatabaseInstance = $realtimeDatabaseInstance;
  }
  public function getRealtimeDatabaseInstance()
  {
    return $this->realtimeDatabaseInstance;
  }
  public function setStorageBucket($storageBucket)
  {
    $this->storageBucket = $storageBucket;
  }
  public function getStorageBucket()
  {
    return $this->storageBucket;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DefaultResources::class, 'Google_Service_FirebaseManagement_DefaultResources');
