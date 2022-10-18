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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaSfdcInstance extends \Google\Collection
{
  protected $collection_key = 'authConfigId';
  /**
   * @var string[]
   */
  public $authConfigId;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $deleteTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $serviceAuthority;
  /**
   * @var string
   */
  public $sfdcOrgId;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string[]
   */
  public function setAuthConfigId($authConfigId)
  {
    $this->authConfigId = $authConfigId;
  }
  /**
   * @return string[]
   */
  public function getAuthConfigId()
  {
    return $this->authConfigId;
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
   * @param string
   */
  public function setDeleteTime($deleteTime)
  {
    $this->deleteTime = $deleteTime;
  }
  /**
   * @return string
   */
  public function getDeleteTime()
  {
    return $this->deleteTime;
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
   * @param string
   */
  public function setServiceAuthority($serviceAuthority)
  {
    $this->serviceAuthority = $serviceAuthority;
  }
  /**
   * @return string
   */
  public function getServiceAuthority()
  {
    return $this->serviceAuthority;
  }
  /**
   * @param string
   */
  public function setSfdcOrgId($sfdcOrgId)
  {
    $this->sfdcOrgId = $sfdcOrgId;
  }
  /**
   * @return string
   */
  public function getSfdcOrgId()
  {
    return $this->sfdcOrgId;
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
class_alias(GoogleCloudIntegrationsV1alphaSfdcInstance::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaSfdcInstance');
