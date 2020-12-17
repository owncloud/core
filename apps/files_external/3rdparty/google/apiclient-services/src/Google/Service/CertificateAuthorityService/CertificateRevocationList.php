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

class Google_Service_CertificateAuthorityService_CertificateRevocationList extends Google_Collection
{
  protected $collection_key = 'revokedCertificates';
  public $accessUrl;
  public $createTime;
  public $labels;
  public $name;
  public $pemCrl;
  protected $revokedCertificatesType = 'Google_Service_CertificateAuthorityService_RevokedCertificate';
  protected $revokedCertificatesDataType = 'array';
  public $sequenceNumber;
  public $state;
  public $updateTime;

  public function setAccessUrl($accessUrl)
  {
    $this->accessUrl = $accessUrl;
  }
  public function getAccessUrl()
  {
    return $this->accessUrl;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPemCrl($pemCrl)
  {
    $this->pemCrl = $pemCrl;
  }
  public function getPemCrl()
  {
    return $this->pemCrl;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_RevokedCertificate[]
   */
  public function setRevokedCertificates($revokedCertificates)
  {
    $this->revokedCertificates = $revokedCertificates;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_RevokedCertificate[]
   */
  public function getRevokedCertificates()
  {
    return $this->revokedCertificates;
  }
  public function setSequenceNumber($sequenceNumber)
  {
    $this->sequenceNumber = $sequenceNumber;
  }
  public function getSequenceNumber()
  {
    return $this->sequenceNumber;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
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
