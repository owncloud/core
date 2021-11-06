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

class CertificateTemplate extends \Google\Model
{
  public $createTime;
  public $description;
  protected $identityConstraintsType = CertificateIdentityConstraints::class;
  protected $identityConstraintsDataType = '';
  public $labels;
  public $name;
  protected $passthroughExtensionsType = CertificateExtensionConstraints::class;
  protected $passthroughExtensionsDataType = '';
  protected $predefinedValuesType = X509Parameters::class;
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
   * @param CertificateIdentityConstraints
   */
  public function setIdentityConstraints(CertificateIdentityConstraints $identityConstraints)
  {
    $this->identityConstraints = $identityConstraints;
  }
  /**
   * @return CertificateIdentityConstraints
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
   * @param CertificateExtensionConstraints
   */
  public function setPassthroughExtensions(CertificateExtensionConstraints $passthroughExtensions)
  {
    $this->passthroughExtensions = $passthroughExtensions;
  }
  /**
   * @return CertificateExtensionConstraints
   */
  public function getPassthroughExtensions()
  {
    return $this->passthroughExtensions;
  }
  /**
   * @param X509Parameters
   */
  public function setPredefinedValues(X509Parameters $predefinedValues)
  {
    $this->predefinedValues = $predefinedValues;
  }
  /**
   * @return X509Parameters
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CertificateTemplate::class, 'Google_Service_CertificateAuthorityService_CertificateTemplate');
