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

class Google_Service_CertificateAuthorityService_CertificateConfig extends Google_Model
{
  protected $publicKeyType = 'Google_Service_CertificateAuthorityService_PublicKey';
  protected $publicKeyDataType = '';
  protected $subjectConfigType = 'Google_Service_CertificateAuthorityService_SubjectConfig';
  protected $subjectConfigDataType = '';
  protected $x509ConfigType = 'Google_Service_CertificateAuthorityService_X509Parameters';
  protected $x509ConfigDataType = '';

  /**
   * @param Google_Service_CertificateAuthorityService_PublicKey
   */
  public function setPublicKey(Google_Service_CertificateAuthorityService_PublicKey $publicKey)
  {
    $this->publicKey = $publicKey;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_PublicKey
   */
  public function getPublicKey()
  {
    return $this->publicKey;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_SubjectConfig
   */
  public function setSubjectConfig(Google_Service_CertificateAuthorityService_SubjectConfig $subjectConfig)
  {
    $this->subjectConfig = $subjectConfig;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_SubjectConfig
   */
  public function getSubjectConfig()
  {
    return $this->subjectConfig;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_X509Parameters
   */
  public function setX509Config(Google_Service_CertificateAuthorityService_X509Parameters $x509Config)
  {
    $this->x509Config = $x509Config;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_X509Parameters
   */
  public function getX509Config()
  {
    return $this->x509Config;
  }
}
