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

namespace Google\Service\Datastream;

class PostgresqlSourceConfig extends \Google\Model
{
  protected $excludeObjectsType = PostgresqlRdbms::class;
  protected $excludeObjectsDataType = '';
  protected $includeObjectsType = PostgresqlRdbms::class;
  protected $includeObjectsDataType = '';
  /**
   * @var string
   */
  public $publication;
  /**
   * @var string
   */
  public $replicationSlot;

  /**
   * @param PostgresqlRdbms
   */
  public function setExcludeObjects(PostgresqlRdbms $excludeObjects)
  {
    $this->excludeObjects = $excludeObjects;
  }
  /**
   * @return PostgresqlRdbms
   */
  public function getExcludeObjects()
  {
    return $this->excludeObjects;
  }
  /**
   * @param PostgresqlRdbms
   */
  public function setIncludeObjects(PostgresqlRdbms $includeObjects)
  {
    $this->includeObjects = $includeObjects;
  }
  /**
   * @return PostgresqlRdbms
   */
  public function getIncludeObjects()
  {
    return $this->includeObjects;
  }
  /**
   * @param string
   */
  public function setPublication($publication)
  {
    $this->publication = $publication;
  }
  /**
   * @return string
   */
  public function getPublication()
  {
    return $this->publication;
  }
  /**
   * @param string
   */
  public function setReplicationSlot($replicationSlot)
  {
    $this->replicationSlot = $replicationSlot;
  }
  /**
   * @return string
   */
  public function getReplicationSlot()
  {
    return $this->replicationSlot;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PostgresqlSourceConfig::class, 'Google_Service_Datastream_PostgresqlSourceConfig');
