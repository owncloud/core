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

class TargetSslProxy extends \Google\Collection
{
  protected $collection_key = 'sslCertificates';
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
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $proxyHeader;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $service;
  /**
   * @var string[]
   */
  public $sslCertificates;
  /**
   * @var string
   */
  public $sslPolicy;

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
  public function setProxyHeader($proxyHeader)
  {
    $this->proxyHeader = $proxyHeader;
  }
  /**
   * @return string
   */
  public function getProxyHeader()
  {
    return $this->proxyHeader;
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
   * @param string
   */
  public function setService($service)
  {
    $this->service = $service;
  }
  /**
   * @return string
   */
  public function getService()
  {
    return $this->service;
  }
  /**
   * @param string[]
   */
  public function setSslCertificates($sslCertificates)
  {
    $this->sslCertificates = $sslCertificates;
  }
  /**
   * @return string[]
   */
  public function getSslCertificates()
  {
    return $this->sslCertificates;
  }
  /**
   * @param string
   */
  public function setSslPolicy($sslPolicy)
  {
    $this->sslPolicy = $sslPolicy;
  }
  /**
   * @return string
   */
  public function getSslPolicy()
  {
    return $this->sslPolicy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetSslProxy::class, 'Google_Service_Compute_TargetSslProxy');
