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

class Google_Service_CertificateAuthorityService_CertificateTemplate extends Google_Model
{
  public $createTime;
  public $description;
  protected $identityConstraintsType = 'Google_Service_CertificateAuthorityService_CertificateIdentityConstraints';
  protected $identityConstraintsDataType = '';
  public $labels;
  public $name;
  protected $passthroughExtensionsType = 'Google_Service_CertificateAuthorityService_CertificateExtensionConstraints';
  protected $passthroughExtensionsDataType = '';
  protected $predefinedValuesType = 'Google_Service_CertificateAuthorityService_X509Parameters';
  protected $predefinedValuesDataType = '';
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_CertificateIdentityConstraints
   */
  public function setIdentityConstraints(Google_Service_CertificateAuthorityService_CertificateIdentityConstraints $identityConstraints)
  {
    $this->identityConstraints = $identityConstraints;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_CertificateIdentityConstraints
   */
  public function getIdentityConstraints()
  {
    return $this->identityConstraints;
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
  /**
   * @param Google_Service_CertificateAuthorityService_CertificateExtensionConstraints
   */
  public function setPassthroughExtensions(Google_Service_CertificateAuthorityService_CertificateExtensionConstraints $passthroughExtensions)
  {
    $this->passthroughExtensions = $passthroughExtensions;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_CertificateExtensionConstraints
   */
  public function getPassthroughExtensions()
  {
    return $this->passthroughExtensions;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_X509Parameters
   */
  public function setPredefinedValues(Google_Service_CertificateAuthorityService_X509Parameters $predefinedValues)
  {
    $this->predefinedValues = $predefinedValues;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_X509Parameters
   */
  public function getPredefinedValues()
  {
    return $this->predefinedValues;
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
