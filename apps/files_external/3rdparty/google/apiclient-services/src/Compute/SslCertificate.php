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

namespace Google\Service\Compute;

class SslCertificate extends \Google\Collection
{
  protected $collection_key = 'subjectAlternativeNames';
  /**
   * @var string
   */
  public $certificate;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $managedType = SslCertificateManagedSslCertificate::class;
  protected $managedDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $privateKey;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $selfLink;
  protected $selfManagedType = SslCertificateSelfManagedSslCertificate::class;
  protected $selfManagedDataType = '';
  /**
   * @var string[]
   */
  public $subjectAlternativeNames;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setCertificate($certificate)
  {
    $this->certificate = $certificate;
  }
  /**
   * @return string
   */
  public function getCertificate()
  {
    return $this->certificate;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
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
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param SslCertificateManagedSslCertificate
   */
  public function setManaged(SslCertificateManagedSslCertificate $managed)
  {
    $this->managed = $managed;
  }
  /**
   * @return SslCertificateManagedSslCertificate
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
  public function setPrivateKey($privateKey)
  {
    $this->privateKey = $privateKey;
  }
  /**
   * @return string
   */
  public function getPrivateKey()
  {
    return $this->privateKey;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param SslCertificateSelfManagedSslCertificate
   */
  public function setSelfManaged(SslCertificateSelfManagedSslCertificate $selfManaged)
  {
    $this->selfManaged = $selfManaged;
  }
  /**
   * @return SslCertificateSelfManagedSslCertificate
   */
  public function getSelfManaged()
  {
    return $this->selfManaged;
  }
  /**
   * @param string[]
   */
  public function setSubjectAlternativeNames($subjectAlternativeNames)
  {
    $this->subjectAlternativeNames = $subjectAlternativeNames;
  }
  /**
   * @return string[]
   */
  public function getSubjectAlternativeNames()
  {
    return $this->subjectAlternativeNames;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SslCertificate::class, 'Google_Service_Compute_SslCertificate');
