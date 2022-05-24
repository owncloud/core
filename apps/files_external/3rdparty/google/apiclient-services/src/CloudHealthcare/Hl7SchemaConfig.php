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

namespace Google\Service\CloudHealthcare;

class Hl7SchemaConfig extends \Google\Collection
{
  protected $collection_key = 'version';
  protected $messageSchemaConfigsType = SchemaGroup::class;
  protected $messageSchemaConfigsDataType = 'map';
  protected $versionType = VersionSource::class;
  protected $versionDataType = 'array';

  /**
   * @param SchemaGroup[]
   */
  public function setMessageSchemaConfigs($messageSchemaConfigs)
  {
    $this->messageSchemaConfigs = $messageSchemaConfigs;
  }
  /**
   * @return SchemaGroup[]
   */
  public function getMessageSchemaConfigs()
  {
    return $this->messageSchemaConfigs;
  }
  /**
   * @param VersionSource[]
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return VersionSource[]
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Hl7SchemaConfig::class, 'Google_Service_CloudHealthcare_Hl7SchemaConfig');
