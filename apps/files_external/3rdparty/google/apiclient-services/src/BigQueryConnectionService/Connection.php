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

namespace Google\Service\BigQueryConnectionService;

class Connection extends \Google\Model
{
  protected $cloudSqlType = CloudSqlProperties::class;
  protected $cloudSqlDataType = '';
  public $creationTime;
  public $description;
  public $friendlyName;
  public $hasCredential;
  public $lastModifiedTime;
  public $name;

  /**
   * @param CloudSqlProperties
   */
  public function setCloudSql(CloudSqlProperties $cloudSql)
  {
    $this->cloudSql = $cloudSql;
  }
  /**
   * @return CloudSqlProperties
   */
  public function getCloudSql()
  {
    return $this->cloudSql;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFriendlyName($friendlyName)
  {
    $this->friendlyName = $friendlyName;
  }
  public function getFriendlyName()
  {
    return $this->friendlyName;
  }
  public function setHasCredential($hasCredential)
  {
    $this->hasCredential = $hasCredential;
  }
  public function getHasCredential()
  {
    return $this->hasCredential;
  }
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Connection::class, 'Google_Service_BigQueryConnectionService_Connection');
