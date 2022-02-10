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

namespace Google\Service\Dataproc;

class KerberosConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $crossRealmTrustAdminServer;
  /**
   * @var string
   */
  public $crossRealmTrustKdc;
  /**
   * @var string
   */
  public $crossRealmTrustRealm;
  /**
   * @var string
   */
  public $crossRealmTrustSharedPasswordUri;
  /**
   * @var bool
   */
  public $enableKerberos;
  /**
   * @var string
   */
  public $kdcDbKeyUri;
  /**
   * @var string
   */
  public $keyPasswordUri;
  /**
   * @var string
   */
  public $keystorePasswordUri;
  /**
   * @var string
   */
  public $keystoreUri;
  /**
   * @var string
   */
  public $kmsKeyUri;
  /**
   * @var string
   */
  public $realm;
  /**
   * @var string
   */
  public $rootPrincipalPasswordUri;
  /**
   * @var int
   */
  public $tgtLifetimeHours;
  /**
   * @var string
   */
  public $truststorePasswordUri;
  /**
   * @var string
   */
  public $truststoreUri;

  /**
   * @param string
   */
  public function setCrossRealmTrustAdminServer($crossRealmTrustAdminServer)
  {
    $this->crossRealmTrustAdminServer = $crossRealmTrustAdminServer;
  }
  /**
   * @return string
   */
  public function getCrossRealmTrustAdminServer()
  {
    return $this->crossRealmTrustAdminServer;
  }
  /**
   * @param string
   */
  public function setCrossRealmTrustKdc($crossRealmTrustKdc)
  {
    $this->crossRealmTrustKdc = $crossRealmTrustKdc;
  }
  /**
   * @return string
   */
  public function getCrossRealmTrustKdc()
  {
    return $this->crossRealmTrustKdc;
  }
  /**
   * @param string
   */
  public function setCrossRealmTrustRealm($crossRealmTrustRealm)
  {
    $this->crossRealmTrustRealm = $crossRealmTrustRealm;
  }
  /**
   * @return string
   */
  public function getCrossRealmTrustRealm()
  {
    return $this->crossRealmTrustRealm;
  }
  /**
   * @param string
   */
  public function setCrossRealmTrustSharedPasswordUri($crossRealmTrustSharedPasswordUri)
  {
    $this->crossRealmTrustSharedPasswordUri = $crossRealmTrustSharedPasswordUri;
  }
  /**
   * @return string
   */
  public function getCrossRealmTrustSharedPasswordUri()
  {
    return $this->crossRealmTrustSharedPasswordUri;
  }
  /**
   * @param bool
   */
  public function setEnableKerberos($enableKerberos)
  {
    $this->enableKerberos = $enableKerberos;
  }
  /**
   * @return bool
   */
  public function getEnableKerberos()
  {
    return $this->enableKerberos;
  }
  /**
   * @param string
   */
  public function setKdcDbKeyUri($kdcDbKeyUri)
  {
    $this->kdcDbKeyUri = $kdcDbKeyUri;
  }
  /**
   * @return string
   */
  public function getKdcDbKeyUri()
  {
    return $this->kdcDbKeyUri;
  }
  /**
   * @param string
   */
  public function setKeyPasswordUri($keyPasswordUri)
  {
    $this->keyPasswordUri = $keyPasswordUri;
  }
  /**
   * @return string
   */
  public function getKeyPasswordUri()
  {
    return $this->keyPasswordUri;
  }
  /**
   * @param string
   */
  public function setKeystorePasswordUri($keystorePasswordUri)
  {
    $this->keystorePasswordUri = $keystorePasswordUri;
  }
  /**
   * @return string
   */
  public function getKeystorePasswordUri()
  {
    return $this->keystorePasswordUri;
  }
  /**
   * @param string
   */
  public function setKeystoreUri($keystoreUri)
  {
    $this->keystoreUri = $keystoreUri;
  }
  /**
   * @return string
   */
  public function getKeystoreUri()
  {
    return $this->keystoreUri;
  }
  /**
   * @param string
   */
  public function setKmsKeyUri($kmsKeyUri)
  {
    $this->kmsKeyUri = $kmsKeyUri;
  }
  /**
   * @return string
   */
  public function getKmsKeyUri()
  {
    return $this->kmsKeyUri;
  }
  /**
   * @param string
   */
  public function setRealm($realm)
  {
    $this->realm = $realm;
  }
  /**
   * @return string
   */
  public function getRealm()
  {
    return $this->realm;
  }
  /**
   * @param string
   */
  public function setRootPrincipalPasswordUri($rootPrincipalPasswordUri)
  {
    $this->rootPrincipalPasswordUri = $rootPrincipalPasswordUri;
  }
  /**
   * @return string
   */
  public function getRootPrincipalPasswordUri()
  {
    return $this->rootPrincipalPasswordUri;
  }
  /**
   * @param int
   */
  public function setTgtLifetimeHours($tgtLifetimeHours)
  {
    $this->tgtLifetimeHours = $tgtLifetimeHours;
  }
  /**
   * @return int
   */
  public function getTgtLifetimeHours()
  {
    return $this->tgtLifetimeHours;
  }
  /**
   * @param string
   */
  public function setTruststorePasswordUri($truststorePasswordUri)
  {
    $this->truststorePasswordUri = $truststorePasswordUri;
  }
  /**
   * @return string
   */
  public function getTruststorePasswordUri()
  {
    return $this->truststorePasswordUri;
  }
  /**
   * @param string
   */
  public function setTruststoreUri($truststoreUri)
  {
    $this->truststoreUri = $truststoreUri;
  }
  /**
   * @return string
   */
  public function getTruststoreUri()
  {
    return $this->truststoreUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KerberosConfig::class, 'Google_Service_Dataproc_KerberosConfig');
