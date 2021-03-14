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

class Google_Service_CloudHealthcare_Hl7SchemaConfig extends Google_Collection
{
  protected $collection_key = 'version';
  protected $messageSchemaConfigsType = 'Google_Service_CloudHealthcare_SchemaGroup';
  protected $messageSchemaConfigsDataType = 'map';
  protected $versionType = 'Google_Service_CloudHealthcare_VersionSource';
  protected $versionDataType = 'array';

  /**
   * @param Google_Service_CloudHealthcare_SchemaGroup[]
   */
  public function setMessageSchemaConfigs($messageSchemaConfigs)
  {
    $this->messageSchemaConfigs = $messageSchemaConfigs;
  }
  /**
   * @return Google_Service_CloudHealthcare_SchemaGroup[]
   */
  public function getMessageSchemaConfigs()
  {
    return $this->messageSchemaConfigs;
  }
  /**
   * @param Google_Service_CloudHealthcare_VersionSource[]
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return Google_Service_CloudHealthcare_VersionSource[]
   */
  public function getVersion()
  {
    return $this->version;
  }
}
