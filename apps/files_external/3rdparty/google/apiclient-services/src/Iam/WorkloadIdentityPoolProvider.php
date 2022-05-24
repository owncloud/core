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

namespace Google\Service\Iam;

class WorkloadIdentityPoolProvider extends \Google\Model
{
  /**
   * @var string
   */
  public $attributeCondition;
  /**
   * @var string[]
   */
  public $attributeMapping;
  protected $awsType = Aws::class;
  protected $awsDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $disabled;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;
  protected $oidcType = Oidc::class;
  protected $oidcDataType = '';
  /**
   * @var string
   */
  public $state;

  /**
   * @param string
   */
  public function setAttributeCondition($attributeCondition)
  {
    $this->attributeCondition = $attributeCondition;
  }
  /**
   * @return string
   */
  public function getAttributeCondition()
  {
    return $this->attributeCondition;
  }
  /**
   * @param string[]
   */
  public function setAttributeMapping($attributeMapping)
  {
    $this->attributeMapping = $attributeMapping;
  }
  /**
   * @return string[]
   */
  public function getAttributeMapping()
  {
    return $this->attributeMapping;
  }
  /**
   * @param Aws
   */
  public function setAws(Aws $aws)
  {
    $this->aws = $aws;
  }
  /**
   * @return Aws
   */
  public function getAws()
  {
    return $this->aws;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
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
   * @param Oidc
   */
  public function setOidc(Oidc $oidc)
  {
    $this->oidc = $oidc;
  }
  /**
   * @return Oidc
   */
  public function getOidc()
  {
    return $this->oidc;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkloadIdentityPoolProvider::class, 'Google_Service_Iam_WorkloadIdentityPoolProvider');
