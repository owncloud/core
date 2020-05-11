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

class Google_Service_AndroidEnterprise_AppVersion extends Google_Collection
{
  protected $collection_key = 'trackId';
  public $isProduction;
  public $track;
  public $trackId;
  public $versionCode;
  public $versionString;

  public function setIsProduction($isProduction)
  {
    $this->isProduction = $isProduction;
  }
  public function getIsProduction()
  {
    return $this->isProduction;
  }
  public function setTrack($track)
  {
    $this->track = $track;
  }
  public function getTrack()
  {
    return $this->track;
  }
  public function setTrackId($trackId)
  {
    $this->trackId = $trackId;
  }
  public function getTrackId()
  {
    return $this->trackId;
  }
  public function setVersionCode($versionCode)
  {
    $this->versionCode = $versionCode;
  }
  public function getVersionCode()
  {
    return $this->versionCode;
  }
  public function setVersionString($versionString)
  {
    $this->versionString = $versionString;
  }
  public function getVersionString()
  {
    return $this->versionString;
  }
}
