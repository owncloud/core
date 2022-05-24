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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2StoredInfoType extends \Google\Collection
{
  protected $collection_key = 'pendingVersions';
  protected $currentVersionType = GooglePrivacyDlpV2StoredInfoTypeVersion::class;
  protected $currentVersionDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $pendingVersionsType = GooglePrivacyDlpV2StoredInfoTypeVersion::class;
  protected $pendingVersionsDataType = 'array';

  /**
   * @param GooglePrivacyDlpV2StoredInfoTypeVersion
   */
  public function setCurrentVersion(GooglePrivacyDlpV2StoredInfoTypeVersion $currentVersion)
  {
    $this->currentVersion = $currentVersion;
  }
  /**
   * @return GooglePrivacyDlpV2StoredInfoTypeVersion
   */
  public function getCurrentVersion()
  {
    return $this->currentVersion;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GooglePrivacyDlpV2StoredInfoTypeVersion[]
   */
  public function setPendingVersions($pendingVersions)
  {
    $this->pendingVersions = $pendingVersions;
  }
  /**
   * @return GooglePrivacyDlpV2StoredInfoTypeVersion[]
   */
  public function getPendingVersions()
  {
    return $this->pendingVersions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2StoredInfoType::class, 'Google_Service_DLP_GooglePrivacyDlpV2StoredInfoType');
