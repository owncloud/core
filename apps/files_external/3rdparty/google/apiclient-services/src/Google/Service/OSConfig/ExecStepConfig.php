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

class Google_Service_OSConfig_ExecStepConfig extends Google_Collection
{
  protected $collection_key = 'allowedSuccessCodes';
  public $allowedSuccessCodes;
  protected $gcsObjectType = 'Google_Service_OSConfig_GcsObject';
  protected $gcsObjectDataType = '';
  public $interpreter;
  public $localPath;

  public function setAllowedSuccessCodes($allowedSuccessCodes)
  {
    $this->allowedSuccessCodes = $allowedSuccessCodes;
  }
  public function getAllowedSuccessCodes()
  {
    return $this->allowedSuccessCodes;
  }
  /**
   * @param Google_Service_OSConfig_GcsObject
   */
  public function setGcsObject(Google_Service_OSConfig_GcsObject $gcsObject)
  {
    $this->gcsObject = $gcsObject;
  }
  /**
   * @return Google_Service_OSConfig_GcsObject
   */
  public function getGcsObject()
  {
    return $this->gcsObject;
  }
  public function setInterpreter($interpreter)
  {
    $this->interpreter = $interpreter;
  }
  public function getInterpreter()
  {
    return $this->interpreter;
  }
  public function setLocalPath($localPath)
  {
    $this->localPath = $localPath;
  }
  public function getLocalPath()
  {
    return $this->localPath;
  }
}
