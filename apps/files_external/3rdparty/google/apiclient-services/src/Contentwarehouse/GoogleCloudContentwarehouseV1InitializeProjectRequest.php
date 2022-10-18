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

namespace Google\Service\Contentwarehouse;

class GoogleCloudContentwarehouseV1InitializeProjectRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $accessControlMode;
  /**
   * @var string
   */
  public $databaseType;
  /**
   * @var string
   */
  public $kmsKey;

  /**
   * @param string
   */
  public function setAccessControlMode($accessControlMode)
  {
    $this->accessControlMode = $accessControlMode;
  }
  /**
   * @return string
   */
  public function getAccessControlMode()
  {
    return $this->accessControlMode;
  }
  /**
   * @param string
   */
  public function setDatabaseType($databaseType)
  {
    $this->databaseType = $databaseType;
  }
  /**
   * @return string
   */
  public function getDatabaseType()
  {
    return $this->databaseType;
  }
  /**
   * @param string
   */
  public function setKmsKey($kmsKey)
  {
    $this->kmsKey = $kmsKey;
  }
  /**
   * @return string
   */
  public function getKmsKey()
  {
    return $this->kmsKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1InitializeProjectRequest::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1InitializeProjectRequest');
