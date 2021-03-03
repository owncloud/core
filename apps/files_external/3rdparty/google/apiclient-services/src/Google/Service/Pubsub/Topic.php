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

class Google_Service_Pubsub_Topic extends Google_Model
{
  public $kmsKeyName;
  public $labels;
  protected $messageStoragePolicyType = 'Google_Service_Pubsub_MessageStoragePolicy';
  protected $messageStoragePolicyDataType = '';
  public $name;
  public $satisfiesPzs;
  protected $schemaSettingsType = 'Google_Service_Pubsub_SchemaSettings';
  protected $schemaSettingsDataType = '';

  public function setKmsKeyName($kmsKeyName)
  {
    $this->kmsKeyName = $kmsKeyName;
  }
  public function getKmsKeyName()
  {
    return $this->kmsKeyName;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Google_Service_Pubsub_MessageStoragePolicy
   */
  public function setMessageStoragePolicy(Google_Service_Pubsub_MessageStoragePolicy $messageStoragePolicy)
  {
    $this->messageStoragePolicy = $messageStoragePolicy;
  }
  /**
   * @return Google_Service_Pubsub_MessageStoragePolicy
   */
  public function getMessageStoragePolicy()
  {
    return $this->messageStoragePolicy;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSatisfiesPzs($satisfiesPzs)
  {
    $this->satisfiesPzs = $satisfiesPzs;
  }
  public function getSatisfiesPzs()
  {
    return $this->satisfiesPzs;
  }
  /**
   * @param Google_Service_Pubsub_SchemaSettings
   */
  public function setSchemaSettings(Google_Service_Pubsub_SchemaSettings $schemaSettings)
  {
    $this->schemaSettings = $schemaSettings;
  }
  /**
   * @return Google_Service_Pubsub_SchemaSettings
   */
  public function getSchemaSettings()
  {
    return $this->schemaSettings;
  }
}
