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

class Google_Service_Dataproc_KerberosConfig extends Google_Model
{
  public $crossRealmTrustAdminServer;
  public $crossRealmTrustKdc;
  public $crossRealmTrustRealm;
  public $crossRealmTrustSharedPasswordUri;
  public $enableKerberos;
  public $kdcDbKeyUri;
  public $keyPasswordUri;
  public $keystorePasswordUri;
  public $keystoreUri;
  public $kmsKeyUri;
  public $realm;
  public $rootPrincipalPasswordUri;
  public $tgtLifetimeHours;
  public $truststorePasswordUri;
  public $truststoreUri;

  public function setCrossRealmTrustAdminServer($crossRealmTrustAdminServer)
  {
    $this->crossRealmTrustAdminServer = $crossRealmTrustAdminServer;
  }
  public function getCrossRealmTrustAdminServer()
  {
    return $this->crossRealmTrustAdminServer;
  }
  public function setCrossRealmTrustKdc($crossRealmTrustKdc)
  {
    $this->crossRealmTrustKdc = $crossRealmTrustKdc;
  }
  public function getCrossRealmTrustKdc()
  {
    return $this->crossRealmTrustKdc;
  }
  public function setCrossRealmTrustRealm($crossRealmTrustRealm)
  {
    $this->crossRealmTrustRealm = $crossRealmTrustRealm;
  }
  public function getCrossRealmTrustRealm()
  {
    return $this->crossRealmTrustRealm;
  }
  public function setCrossRealmTrustSharedPasswordUri($crossRealmTrustSharedPasswordUri)
  {
    $this->crossRealmTrustSharedPasswordUri = $crossRealmTrustSharedPasswordUri;
  }
  public function getCrossRealmTrustSharedPasswordUri()
  {
    return $this->crossRealmTrustSharedPasswordUri;
  }
  public function setEnableKerberos($enableKerberos)
  {
    $this->enableKerberos = $enableKerberos;
  }
  public function getEnableKerberos()
  {
    return $this->enableKerberos;
  }
  public function setKdcDbKeyUri($kdcDbKeyUri)
  {
    $this->kdcDbKeyUri = $kdcDbKeyUri;
  }
  public function getKdcDbKeyUri()
  {
    return $this->kdcDbKeyUri;
  }
  public function setKeyPasswordUri($keyPasswordUri)
  {
    $this->keyPasswordUri = $keyPasswordUri;
  }
  public function getKeyPasswordUri()
  {
    return $this->keyPasswordUri;
  }
  public function setKeystorePasswordUri($keystorePasswordUri)
  {
    $this->keystorePasswordUri = $keystorePasswordUri;
  }
  public function getKeystorePasswordUri()
  {
    return $this->keystorePasswordUri;
  }
  public function setKeystoreUri($keystoreUri)
  {
    $this->keystoreUri = $keystoreUri;
  }
  public function getKeystoreUri()
  {
    return $this->keystoreUri;
  }
  public function setKmsKeyUri($kmsKeyUri)
  {
    $this->kmsKeyUri = $kmsKeyUri;
  }
  public function getKmsKeyUri()
  {
    return $this->kmsKeyUri;
  }
  public function setRealm($realm)
  {
    $this->realm = $realm;
  }
  public function getRealm()
  {
    return $this->realm;
  }
  public function setRootPrincipalPasswordUri($rootPrincipalPasswordUri)
  {
    $this->rootPrincipalPasswordUri = $rootPrincipalPasswordUri;
  }
  public function getRootPrincipalPasswordUri()
  {
    return $this->rootPrincipalPasswordUri;
  }
  public function setTgtLifetimeHours($tgtLifetimeHours)
  {
    $this->tgtLifetimeHours = $tgtLifetimeHours;
  }
  public function getTgtLifetimeHours()
  {
    return $this->tgtLifetimeHours;
  }
  public function setTruststorePasswordUri($truststorePasswordUri)
  {
    $this->truststorePasswordUri = $truststorePasswordUri;
  }
  public function getTruststorePasswordUri()
  {
    return $this->truststorePasswordUri;
  }
  public function setTruststoreUri($truststoreUri)
  {
    $this->truststoreUri = $truststoreUri;
  }
  public function getTruststoreUri()
  {
    return $this->truststoreUri;
  }
}
