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

class Google_Service_OnDemandScanning_Fingerprint extends Google_Collection
{
  protected $collection_key = 'v2Blob';
  public $v1Name;
  public $v2Blob;
  public $v2Name;

  public function setV1Name($v1Name)
  {
    $this->v1Name = $v1Name;
  }
  public function getV1Name()
  {
    return $this->v1Name;
  }
  public function setV2Blob($v2Blob)
  {
    $this->v2Blob = $v2Blob;
  }
  public function getV2Blob()
  {
    return $this->v2Blob;
  }
  public function setV2Name($v2Name)
  {
    $this->v2Name = $v2Name;
  }
  public function getV2Name()
  {
    return $this->v2Name;
  }
}
