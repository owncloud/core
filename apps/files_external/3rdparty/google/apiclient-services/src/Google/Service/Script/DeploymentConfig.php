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

class Google_Service_Script_DeploymentConfig extends Google_Model
{
  public $description;
  public $manifestFileName;
  public $scriptId;
  public $versionNumber;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setManifestFileName($manifestFileName)
  {
    $this->manifestFileName = $manifestFileName;
  }
  public function getManifestFileName()
  {
    return $this->manifestFileName;
  }
  public function setScriptId($scriptId)
  {
    $this->scriptId = $scriptId;
  }
  public function getScriptId()
  {
    return $this->scriptId;
  }
  public function setVersionNumber($versionNumber)
  {
    $this->versionNumber = $versionNumber;
  }
  public function getVersionNumber()
  {
    return $this->versionNumber;
  }
}
