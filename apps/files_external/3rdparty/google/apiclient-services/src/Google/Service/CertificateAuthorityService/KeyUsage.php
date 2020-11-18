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

class Google_Service_CertificateAuthorityService_KeyUsage extends Google_Collection
{
  protected $collection_key = 'unknownExtendedKeyUsages';
  protected $baseKeyUsageType = 'Google_Service_CertificateAuthorityService_KeyUsageOptions';
  protected $baseKeyUsageDataType = '';
  protected $extendedKeyUsageType = 'Google_Service_CertificateAuthorityService_ExtendedKeyUsageOptions';
  protected $extendedKeyUsageDataType = '';
  protected $unknownExtendedKeyUsagesType = 'Google_Service_CertificateAuthorityService_ObjectId';
  protected $unknownExtendedKeyUsagesDataType = 'array';

  /**
   * @param Google_Service_CertificateAuthorityService_KeyUsageOptions
   */
  public function setBaseKeyUsage(Google_Service_CertificateAuthorityService_KeyUsageOptions $baseKeyUsage)
  {
    $this->baseKeyUsage = $baseKeyUsage;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_KeyUsageOptions
   */
  public function getBaseKeyUsage()
  {
    return $this->baseKeyUsage;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_ExtendedKeyUsageOptions
   */
  public function setExtendedKeyUsage(Google_Service_CertificateAuthorityService_ExtendedKeyUsageOptions $extendedKeyUsage)
  {
    $this->extendedKeyUsage = $extendedKeyUsage;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_ExtendedKeyUsageOptions
   */
  public function getExtendedKeyUsage()
  {
    return $this->extendedKeyUsage;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_ObjectId
   */
  public function setUnknownExtendedKeyUsages($unknownExtendedKeyUsages)
  {
    $this->unknownExtendedKeyUsages = $unknownExtendedKeyUsages;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_ObjectId
   */
  public function getUnknownExtendedKeyUsages()
  {
    return $this->unknownExtendedKeyUsages;
  }
}
