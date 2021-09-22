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
  public $authorizationPolicy;
  public $creationTimestamp;
  public $description;
  public $fingerprint;
  public $id;
  public $kind;
  public $name;
  public $proxyBind;
  public $quicOverride;
  public $region;
  public $selfLink;
  public $serverTlsPolicy;
  public $sslCertificates;
  public $sslPolicy;
  public $urlMap;

  public function setAuthorizationPolicy($authorizationPolicy)
  {
    $this->authorizationPolicy = $authorizationPolicy;
  }
  public function getAuthorizationPolicy()
  {
    return $this->authorizationPolicy;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProxyBind($proxyBind)
  {
    $this->proxyBind = $proxyBind;
  }
  public function getProxyBind()
  {
    return $this->proxyBind;
  }
  public function setQuicOverride($quicOverride)
  {
    $this->quicOverride = $quicOverride;
  }
  public function getQuicOverride()
  {
    return $this->quicOverride;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setServerTlsPolicy($serverTlsPolicy)
  {
    $this->serverTlsPolicy = $serverTlsPolicy;
  }
  public function getServerTlsPolicy()
  {
    return $this->serverTlsPolicy;
  }
  public function setSslCertificates($sslCertificates)
  {
    $this->sslCertificates = $sslCertificates;
  }
  public function getSslCertificates()
  {
    return $this->sslCertificates;
  }
  public function setSslPolicy($sslPolicy)
  {
    $this->sslPolicy = $sslPolicy;
  }
  public function getSslPolicy()
  {
    return $this->sslPolicy;
  }
  public function setUrlMap($urlMap)
  {
    $this->urlMap = $urlMap;
  }
  public function getUrlMap()
  {
    return $this->urlMap;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetHttpsProxy::class, 'Google_Service_Compute_TargetHttpsProxy');
