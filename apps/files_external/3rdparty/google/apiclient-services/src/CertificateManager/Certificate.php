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

namespace Google\Service\CertificateManager;

class Certificate extends \Google\Collection
{
  protected $collection_key = 'sanDnsnames';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string[]
   */
  public $labels;
  protected $managedType = ManagedCertificate::class;
  protected $managedDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $pemCertificate;
  /**
   * @var string[]
   */
  public $sanDnsnames;
  /**
   * @var string
   */
  public $scope;
  protected $selfManagedType = SelfManagedCertificate::class;
  protected $selfManagedDataType = '';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param ManagedCertificate
   */
  public function setManaged(ManagedCertificate $managed)
  {
    $this->managed = $managed;
  }
  /**
   * @return ManagedCertificate
   */
  public function getManaged()
  {
    return $this->managed;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPemCertificate($pemCertificate)
  {
    $this->pemCertificate = $pemCertificate;
  }
  /**
   * @return string
   */
  public function getPemCertificate()
  {
    return $this->pemCertificate;
  }
  /**
   * @param string[]
   */
  public function setSanDnsnames($sanDnsnames)
  {
    $this->sanDnsnames = $sanDnsnames;
  }
  /**
   * @return string[]
   */
  public function getSanDnsnames()
  {
    return $this->sanDnsnames;
  }
  /**
   * @param string
   */
  public function setScope($scope)
  {
    $this->scope = $scope;
  }
  /**
   * @return string
   */
  public function getScope()
  {
    return $this->scope;
  }
  /**
   * @param SelfManagedCertificate
   */
  public function setSelfManaged(SelfManagedCertificate $selfManaged)
  {
    $this->selfManaged = $selfManaged;
  }
  /**
   * @return SelfManagedCertificate
   */
  public function getSelfManaged()
  {
    return $this->selfManaged;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Certificate::class, 'Google_Service_CertificateManager_Certificate');
