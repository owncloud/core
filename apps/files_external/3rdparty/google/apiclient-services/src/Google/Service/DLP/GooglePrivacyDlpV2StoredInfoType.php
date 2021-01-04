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

class Google_Service_DLP_GooglePrivacyDlpV2StoredInfoType extends Google_Collection
{
  protected $collection_key = 'pendingVersions';
  protected $currentVersionType = 'Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeVersion';
  protected $currentVersionDataType = '';
  public $name;
  protected $pendingVersionsType = 'Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeVersion';
  protected $pendingVersionsDataType = 'array';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeVersion
   */
  public function setCurrentVersion(Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeVersion $currentVersion)
  {
    $this->currentVersion = $currentVersion;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeVersion
   */
  public function getCurrentVersion()
  {
    return $this->currentVersion;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeVersion[]
   */
  public function setPendingVersions($pendingVersions)
  {
    $this->pendingVersions = $pendingVersions;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeVersion[]
   */
  public function getPendingVersions()
  {
    return $this->pendingVersions;
  }
}
