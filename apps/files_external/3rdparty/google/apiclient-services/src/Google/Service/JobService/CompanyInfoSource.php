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

class Google_Service_JobService_CompanyInfoSource extends Google_Model
{
  public $freebaseMid;
  public $gplusId;
  public $mapsCid;
  public $unknownTypeId;

  public function setFreebaseMid($freebaseMid)
  {
    $this->freebaseMid = $freebaseMid;
  }
  public function getFreebaseMid()
  {
    return $this->freebaseMid;
  }
  public function setGplusId($gplusId)
  {
    $this->gplusId = $gplusId;
  }
  public function getGplusId()
  {
    return $this->gplusId;
  }
  public function setMapsCid($mapsCid)
  {
    $this->mapsCid = $mapsCid;
  }
  public function getMapsCid()
  {
    return $this->mapsCid;
  }
  public function setUnknownTypeId($unknownTypeId)
  {
    $this->unknownTypeId = $unknownTypeId;
  }
  public function getUnknownTypeId()
  {
    return $this->unknownTypeId;
  }
}
