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

class Google_Service_Apigee_GoogleCloudApigeeV1CustomDomainConfigData extends Google_Model
{
  public $domain;
  public $force;
  public $id;
  public $redirectHttps;
  public $siteId;
  public $subdomain;
  public $tlsAlias;
  public $tlsKeystore;

  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  public function getDomain()
  {
    return $this->domain;
  }
  public function setForce($force)
  {
    $this->force = $force;
  }
  public function getForce()
  {
    return $this->force;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setRedirectHttps($redirectHttps)
  {
    $this->redirectHttps = $redirectHttps;
  }
  public function getRedirectHttps()
  {
    return $this->redirectHttps;
  }
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
  public function getSiteId()
  {
    return $this->siteId;
  }
  public function setSubdomain($subdomain)
  {
    $this->subdomain = $subdomain;
  }
  public function getSubdomain()
  {
    return $this->subdomain;
  }
  public function setTlsAlias($tlsAlias)
  {
    $this->tlsAlias = $tlsAlias;
  }
  public function getTlsAlias()
  {
    return $this->tlsAlias;
  }
  public function setTlsKeystore($tlsKeystore)
  {
    $this->tlsKeystore = $tlsKeystore;
  }
  public function getTlsKeystore()
  {
    return $this->tlsKeystore;
  }
}
