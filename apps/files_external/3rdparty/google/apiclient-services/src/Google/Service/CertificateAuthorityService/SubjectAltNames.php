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

class Google_Service_CertificateAuthorityService_SubjectAltNames extends Google_Collection
{
  protected $collection_key = 'uris';
  protected $customSansType = 'Google_Service_CertificateAuthorityService_X509Extension';
  protected $customSansDataType = 'array';
  public $dnsNames;
  public $emailAddresses;
  public $ipAddresses;
  public $uris;

  /**
   * @param Google_Service_CertificateAuthorityService_X509Extension[]
   */
  public function setCustomSans($customSans)
  {
    $this->customSans = $customSans;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_X509Extension[]
   */
  public function getCustomSans()
  {
    return $this->customSans;
  }
  public function setDnsNames($dnsNames)
  {
    $this->dnsNames = $dnsNames;
  }
  public function getDnsNames()
  {
    return $this->dnsNames;
  }
  public function setEmailAddresses($emailAddresses)
  {
    $this->emailAddresses = $emailAddresses;
  }
  public function getEmailAddresses()
  {
    return $this->emailAddresses;
  }
  public function setIpAddresses($ipAddresses)
  {
    $this->ipAddresses = $ipAddresses;
  }
  public function getIpAddresses()
  {
    return $this->ipAddresses;
  }
  public function setUris($uris)
  {
    $this->uris = $uris;
  }
  public function getUris()
  {
    return $this->uris;
  }
}
