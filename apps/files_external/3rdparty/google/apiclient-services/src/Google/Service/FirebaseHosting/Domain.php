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

class Google_Service_FirebaseHosting_Domain extends Google_Model
{
  public $domainName;
  protected $domainRedirectType = 'Google_Service_FirebaseHosting_DomainRedirect';
  protected $domainRedirectDataType = '';
  protected $provisioningType = 'Google_Service_FirebaseHosting_DomainProvisioning';
  protected $provisioningDataType = '';
  public $site;
  public $status;
  public $updateTime;

  public function setDomainName($domainName)
  {
    $this->domainName = $domainName;
  }
  public function getDomainName()
  {
    return $this->domainName;
  }
  /**
   * @param Google_Service_FirebaseHosting_DomainRedirect
   */
  public function setDomainRedirect(Google_Service_FirebaseHosting_DomainRedirect $domainRedirect)
  {
    $this->domainRedirect = $domainRedirect;
  }
  /**
   * @return Google_Service_FirebaseHosting_DomainRedirect
   */
  public function getDomainRedirect()
  {
    return $this->domainRedirect;
  }
  /**
   * @param Google_Service_FirebaseHosting_DomainProvisioning
   */
  public function setProvisioning(Google_Service_FirebaseHosting_DomainProvisioning $provisioning)
  {
    $this->provisioning = $provisioning;
  }
  /**
   * @return Google_Service_FirebaseHosting_DomainProvisioning
   */
  public function getProvisioning()
  {
    return $this->provisioning;
  }
  public function setSite($site)
  {
    $this->site = $site;
  }
  public function getSite()
  {
    return $this->site;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
