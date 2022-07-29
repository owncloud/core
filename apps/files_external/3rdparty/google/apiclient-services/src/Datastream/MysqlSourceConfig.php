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

class MysqlSourceConfig extends \Google\Model
{
  protected $excludeObjectsType = MysqlRdbms::class;
  protected $excludeObjectsDataType = '';
  protected $includeObjectsType = MysqlRdbms::class;
  protected $includeObjectsDataType = '';
  /**
   * @var int
   */
  public $maxConcurrentCdcTasks;

  /**
   * @param MysqlRdbms
   */
  public function setExcludeObjects(MysqlRdbms $excludeObjects)
  {
    $this->excludeObjects = $excludeObjects;
  }
  /**
   * @return MysqlRdbms
   */
  public function getExcludeObjects()
  {
    return $this->excludeObjects;
  }
  /**
   * @param MysqlRdbms
   */
  public function setIncludeObjects(MysqlRdbms $includeObjects)
  {
    $this->includeObjects = $includeObjects;
  }
  /**
   * @return MysqlRdbms
   */
  public function getIncludeObjects()
  {
    return $this->includeObjects;
  }
  /**
   * @param int
   */
  public function setMaxConcurrentCdcTasks($maxConcurrentCdcTasks)
  {
    $this->maxConcurrentCdcTasks = $maxConcurrentCdcTasks;
  }
  /**
   * @return int
   */
  public function getMaxConcurrentCdcTasks()
  {
    return $this->maxConcurrentCdcTasks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MysqlSourceConfig::class, 'Google_Service_Datastream_MysqlSourceConfig');
