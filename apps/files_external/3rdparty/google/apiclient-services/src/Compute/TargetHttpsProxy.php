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

class TargetHttpsProxy extends \Google\Collection
{
  protected $collection_key = 'sslCertificates';
  /**
   * @var string
   */
  public $authorizationPolicy;
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
  public $fingerprint;
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
   * @var bool
   */
  public $proxyBind;
  /**
   * @var string
   */
  public $quicOverride;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $serverTlsPolicy;
  /**
   * @var string[]
   */
  public $sslCertificates;
  /**
   * @var string
   */
  public $sslPolicy;
  /**
   * @var string
   */
  public $urlMap;

  /**
   * @param string
   */
  public function setAuthorizationPolicy($authorizationPolicy)
  {
    $this->authorizationPolicy = $authorizationPolicy;
  }
  /**
   * @return string
   */
  public function getAuthorizationPolicy()
  {
    return $this->authorizationPolicy;
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
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
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
   * @param bool
   */
  public function setProxyBind($proxyBind)
  {
    $this->proxyBind = $proxyBind;
  }
  /**
   * @return bool
   */
  public function getProxyBind()
  {
    return $this->proxyBind;
  }
  /**
   * @param string
   */
  public function setQuicOverride($quicOverride)
  {
    $this->quicOverride = $quicOverride;
  }
  /**
   * @return string
   */
  public function getQuicOverride()
  {
    return $this->quicOverride;
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
   * @param string
   */
  public function setServerTlsPolicy($serverTlsPolicy)
  {
    $this->serverTlsPolicy = $serverTlsPolicy;
  }
  /**
   * @return string
   */
  public function getServerTlsPolicy()
  {
    return $this->serverTlsPolicy;
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
  /**
   * @param string
   */
  public function setUrlMap($urlMap)
  {
    $this->urlMap = $urlMap;
  }
  /**
   * @return string
   */
  public function getUrlMap()
  {
    return $this->urlMap;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetHttpsProxy::class, 'Google_Service_Compute_TargetHttpsProxy');
