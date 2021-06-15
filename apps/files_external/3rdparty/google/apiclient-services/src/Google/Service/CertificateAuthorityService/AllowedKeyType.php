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

class Google_Service_CertificateAuthorityService_AllowedKeyType extends Google_Model
{
  protected $ellipticCurveType = 'Google_Service_CertificateAuthorityService_EcKeyType';
  protected $ellipticCurveDataType = '';
  protected $rsaType = 'Google_Service_CertificateAuthorityService_RsaKeyType';
  protected $rsaDataType = '';

  /**
   * @param Google_Service_CertificateAuthorityService_EcKeyType
   */
  public function setEllipticCurve(Google_Service_CertificateAuthorityService_EcKeyType $ellipticCurve)
  {
    $this->ellipticCurve = $ellipticCurve;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_EcKeyType
   */
  public function getEllipticCurve()
  {
    return $this->ellipticCurve;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_RsaKeyType
   */
  public function setRsa(Google_Service_CertificateAuthorityService_RsaKeyType $rsa)
  {
    $this->rsa = $rsa;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_RsaKeyType
   */
  public function getRsa()
  {
    return $this->rsa;
  }
}
