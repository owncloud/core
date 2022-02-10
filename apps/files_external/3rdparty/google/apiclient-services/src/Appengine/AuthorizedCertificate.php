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

namespace Google\Service\Appengine;

class AuthorizedCertificate extends \Google\Collection
{
  protected $collection_key = 'visibleDomainMappings';
  protected $certificateRawDataType = CertificateRawData::class;
  protected $certificateRawDataDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var int
   */
  public $domainMappingsCount;
  /**
   * @var string[]
   */
  public $domainNames;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string
   */
  public $id;
  protected $managedCertificateType = ManagedCertificate::class;
  protected $managedCertificateDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $visibleDomainMappings;

  /**
   * @param CertificateRawData
   */
  public function setCertificateRawData(CertificateRawData $certificateRawData)
  {
    $this->certificateRawData = $certificateRawData;
  }
  /**
   * @return CertificateRawData
   */
  public function getCertificateRawData()
  {
    return $this->certificateRawData;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param int
   */
  public function setDomainMappingsCount($domainMappingsCount)
  {
    $this->domainMappingsCount = $domainMappingsCount;
  }
  /**
   * @return int
   */
  public function getDomainMappingsCount()
  {
    return $this->domainMappingsCount;
  }
  /**
   * @param string[]
   */
  public function setDomainNames($domainNames)
  {
    $this->domainNames = $domainNames;
  }
  /**
   * @return string[]
   */
  public function getDomainNames()
  {
    return $this->domainNames;
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
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param ManagedCertificate
   */
  public function setManagedCertificate(ManagedCertificate $managedCertificate)
  {
    $this->managedCertificate = $managedCertificate;
  }
  /**
   * @return ManagedCertificate
   */
  public function getManagedCertificate()
  {
    return $this->managedCertificate;
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
   * @param string[]
   */
  public function setVisibleDomainMappings($visibleDomainMappings)
  {
    $this->visibleDomainMappings = $visibleDomainMappings;
  }
  /**
   * @return string[]
   */
  public function getVisibleDomainMappings()
  {
    return $this->visibleDomainMappings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuthorizedCertificate::class, 'Google_Service_Appengine_AuthorizedCertificate');
