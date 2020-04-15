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

class Google_Service_ContainerAnalysis_Distribution extends Google_Model
{
  public $architecture;
  public $cpeUri;
  public $description;
  protected $latestVersionType = 'Google_Service_ContainerAnalysis_Version';
  protected $latestVersionDataType = '';
  public $maintainer;
  public $url;

  public function setArchitecture($architecture)
  {
    $this->architecture = $architecture;
  }
  public function getArchitecture()
  {
    return $this->architecture;
  }
  public function setCpeUri($cpeUri)
  {
    $this->cpeUri = $cpeUri;
  }
  public function getCpeUri()
  {
    return $this->cpeUri;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Version
   */
  public function setLatestVersion(Google_Service_ContainerAnalysis_Version $latestVersion)
  {
    $this->latestVersion = $latestVersion;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Version
   */
  public function getLatestVersion()
  {
    return $this->latestVersion;
  }
  public function setMaintainer($maintainer)
  {
    $this->maintainer = $maintainer;
  }
  public function getMaintainer()
  {
    return $this->maintainer;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
