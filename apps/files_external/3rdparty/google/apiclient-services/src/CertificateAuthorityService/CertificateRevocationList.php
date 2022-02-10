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

namespace Google\Service\CertificateAuthorityService;

class CertificateRevocationList extends \Google\Collection
{
  protected $collection_key = 'revokedCertificates';
  /**
   * @var string
   */
  public $accessUrl;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $pemCrl;
  /**
   * @var string
   */
  public $revisionId;
  protected $revokedCertificatesType = RevokedCertificate::class;
  protected $revokedCertificatesDataType = 'array';
  /**
   * @var string
   */
  public $sequenceNumber;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setAccessUrl($accessUrl)
  {
    $this->accessUrl = $accessUrl;
  }
  /**
   * @return string
   */
  public function getAccessUrl()
  {
    return $this->accessUrl;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPemCrl($pemCrl)
  {
    $this->pemCrl = $pemCrl;
  }
  /**
   * @return string
   */
  public function getPemCrl()
  {
    return $this->pemCrl;
  }
  /**
   * @param string
   */
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  /**
   * @return string
   */
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param RevokedCertificate[]
   */
  public function setRevokedCertificates($revokedCertificates)
  {
    $this->revokedCertificates = $revokedCertificates;
  }
  /**
   * @return RevokedCertificate[]
   */
  public function getRevokedCertificates()
  {
    return $this->revokedCertificates;
  }
  /**
   * @param string
   */
  public function setSequenceNumber($sequenceNumber)
  {
    $this->sequenceNumber = $sequenceNumber;
  }
  /**
   * @return string
   */
  public function getSequenceNumber()
  {
    return $this->sequenceNumber;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CertificateRevocationList::class, 'Google_Service_CertificateAuthorityService_CertificateRevocationList');
