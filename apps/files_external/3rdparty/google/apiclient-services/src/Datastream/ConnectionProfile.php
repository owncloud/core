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

class ConnectionProfile extends \Google\Model
{
  public $createTime;
  public $displayName;
  protected $forwardSshConnectivityType = ForwardSshTunnelConnectivity::class;
  protected $forwardSshConnectivityDataType = '';
  protected $gcsProfileType = GcsProfile::class;
  protected $gcsProfileDataType = '';
  public $labels;
  protected $mysqlProfileType = MysqlProfile::class;
  protected $mysqlProfileDataType = '';
  public $name;
  protected $noConnectivityType = NoConnectivitySettings::class;
  protected $noConnectivityDataType = '';
  protected $oracleProfileType = OracleProfile::class;
  protected $oracleProfileDataType = '';
  protected $privateConnectivityType = PrivateConnectivity::class;
  protected $privateConnectivityDataType = '';
  protected $staticServiceIpConnectivityType = StaticServiceIpConnectivity::class;
  protected $staticServiceIpConnectivityDataType = '';
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param ForwardSshTunnelConnectivity
   */
  public function setForwardSshConnectivity(ForwardSshTunnelConnectivity $forwardSshConnectivity)
  {
    $this->forwardSshConnectivity = $forwardSshConnectivity;
  }
  /**
   * @return ForwardSshTunnelConnectivity
   */
  public function getForwardSshConnectivity()
  {
    return $this->forwardSshConnectivity;
  }
  /**
   * @param GcsProfile
   */
  public function setGcsProfile(GcsProfile $gcsProfile)
  {
    $this->gcsProfile = $gcsProfile;
  }
  /**
   * @return GcsProfile
   */
  public function getGcsProfile()
  {
    return $this->gcsProfile;
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
   * @param MysqlProfile
   */
  public function setMysqlProfile(MysqlProfile $mysqlProfile)
  {
    $this->mysqlProfile = $mysqlProfile;
  }
  /**
   * @return MysqlProfile
   */
  public function getMysqlProfile()
  {
    return $this->mysqlProfile;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param NoConnectivitySettings
   */
  public function setNoConnectivity(NoConnectivitySettings $noConnectivity)
  {
    $this->noConnectivity = $noConnectivity;
  }
  /**
   * @return NoConnectivitySettings
   */
  public function getNoConnectivity()
  {
    return $this->noConnectivity;
  }
  /**
   * @param OracleProfile
   */
  public function setOracleProfile(OracleProfile $oracleProfile)
  {
    $this->oracleProfile = $oracleProfile;
  }
  /**
   * @return OracleProfile
   */
  public function getOracleProfile()
  {
    return $this->oracleProfile;
  }
  /**
   * @param PrivateConnectivity
   */
  public function setPrivateConnectivity(PrivateConnectivity $privateConnectivity)
  {
    $this->privateConnectivity = $privateConnectivity;
  }
  /**
   * @return PrivateConnectivity
   */
  public function getPrivateConnectivity()
  {
    return $this->privateConnectivity;
  }
  /**
   * @param StaticServiceIpConnectivity
   */
  public function setStaticServiceIpConnectivity(StaticServiceIpConnectivity $staticServiceIpConnectivity)
  {
    $this->staticServiceIpConnectivity = $staticServiceIpConnectivity;
  }
  /**
   * @return StaticServiceIpConnectivity
   */
  public function getStaticServiceIpConnectivity()
  {
    return $this->staticServiceIpConnectivity;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConnectionProfile::class, 'Google_Service_Datastream_ConnectionProfile');
