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

namespace Google\Service\CloudRedis;

class PersistenceConfig extends \Google\Model
{
  public $persistenceMode;
  public $rdbNextSnapshotTime;
  public $rdbSnapshotPeriod;
  public $rdbSnapshotStartTime;

  public function setPersistenceMode($persistenceMode)
  {
    $this->persistenceMode = $persistenceMode;
  }
  public function getPersistenceMode()
  {
    return $this->persistenceMode;
  }
  public function setRdbNextSnapshotTime($rdbNextSnapshotTime)
  {
    $this->rdbNextSnapshotTime = $rdbNextSnapshotTime;
  }
  public function getRdbNextSnapshotTime()
  {
    return $this->rdbNextSnapshotTime;
  }
  public function setRdbSnapshotPeriod($rdbSnapshotPeriod)
  {
    $this->rdbSnapshotPeriod = $rdbSnapshotPeriod;
  }
  public function getRdbSnapshotPeriod()
  {
    return $this->rdbSnapshotPeriod;
  }
  public function setRdbSnapshotStartTime($rdbSnapshotStartTime)
  {
    $this->rdbSnapshotStartTime = $rdbSnapshotStartTime;
  }
  public function getRdbSnapshotStartTime()
  {
    return $this->rdbSnapshotStartTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PersistenceConfig::class, 'Google_Service_CloudRedis_PersistenceConfig');
