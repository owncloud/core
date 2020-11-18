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

class Google_Service_CertificateAuthorityService_AllowedSubjectAltNames extends Google_Collection
{
  protected $collection_key = 'allowedUris';
  public $allowCustomSans;
  public $allowGlobbingDnsWildcards;
  public $allowedDnsNames;
  public $allowedEmailAddresses;
  public $allowedIps;
  public $allowedUris;

  public function setAllowCustomSans($allowCustomSans)
  {
    $this->allowCustomSans = $allowCustomSans;
  }
  public function getAllowCustomSans()
  {
    return $this->allowCustomSans;
  }
  public function setAllowGlobbingDnsWildcards($allowGlobbingDnsWildcards)
  {
    $this->allowGlobbingDnsWildcards = $allowGlobbingDnsWildcards;
  }
  public function getAllowGlobbingDnsWildcards()
  {
    return $this->allowGlobbingDnsWildcards;
  }
  public function setAllowedDnsNames($allowedDnsNames)
  {
    $this->allowedDnsNames = $allowedDnsNames;
  }
  public function getAllowedDnsNames()
  {
    return $this->allowedDnsNames;
  }
  public function setAllowedEmailAddresses($allowedEmailAddresses)
  {
    $this->allowedEmailAddresses = $allowedEmailAddresses;
  }
  public function getAllowedEmailAddresses()
  {
    return $this->allowedEmailAddresses;
  }
  public function setAllowedIps($allowedIps)
  {
    $this->allowedIps = $allowedIps;
  }
  public function getAllowedIps()
  {
    return $this->allowedIps;
  }
  public function setAllowedUris($allowedUris)
  {
    $this->allowedUris = $allowedUris;
  }
  public function getAllowedUris()
  {
    return $this->allowedUris;
  }
}
