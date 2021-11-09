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

class DiscoverConnectionProfileRequest extends \Google\Model
{
  protected $connectionProfileType = ConnectionProfile::class;
  protected $connectionProfileDataType = '';
  public $connectionProfileName;
  protected $mysqlRdbmsType = MysqlRdbms::class;
  protected $mysqlRdbmsDataType = '';
  protected $oracleRdbmsType = OracleRdbms::class;
  protected $oracleRdbmsDataType = '';
  public $recursionDepth;
  public $recursive;

  /**
   * @param ConnectionProfile
   */
  public function setConnectionProfile(ConnectionProfile $connectionProfile)
  {
    $this->connectionProfile = $connectionProfile;
  }
  /**
   * @return ConnectionProfile
   */
  public function getConnectionProfile()
  {
    return $this->connectionProfile;
  }
  public function setConnectionProfileName($connectionProfileName)
  {
    $this->connectionProfileName = $connectionProfileName;
  }
  public function getConnectionProfileName()
  {
    return $this->connectionProfileName;
  }
  /**
   * @param MysqlRdbms
   */
  public function setMysqlRdbms(MysqlRdbms $mysqlRdbms)
  {
    $this->mysqlRdbms = $mysqlRdbms;
  }
  /**
   * @return MysqlRdbms
   */
  public function getMysqlRdbms()
  {
    return $this->mysqlRdbms;
  }
  /**
   * @param OracleRdbms
   */
  public function setOracleRdbms(OracleRdbms $oracleRdbms)
  {
    $this->oracleRdbms = $oracleRdbms;
  }
  /**
   * @return OracleRdbms
   */
  public function getOracleRdbms()
  {
    return $this->oracleRdbms;
  }
  public function setRecursionDepth($recursionDepth)
  {
    $this->recursionDepth = $recursionDepth;
  }
  public function getRecursionDepth()
  {
    return $this->recursionDepth;
  }
  public function setRecursive($recursive)
  {
    $this->recursive = $recursive;
  }
  public function getRecursive()
  {
    return $this->recursive;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DiscoverConnectionProfileRequest::class, 'Google_Service_Datastream_DiscoverConnectionProfileRequest');
