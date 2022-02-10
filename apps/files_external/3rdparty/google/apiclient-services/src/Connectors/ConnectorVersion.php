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

namespace Google\Service\Connectors;

class ConnectorVersion extends \Google\Collection
{
  protected $collection_key = 'roleGrants';
  protected $authConfigTemplatesType = AuthConfigTemplate::class;
  protected $authConfigTemplatesDataType = 'array';
  protected $configVariableTemplatesType = ConfigVariableTemplate::class;
  protected $configVariableTemplatesDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $displayName;
  protected $egressControlConfigType = EgressControlConfig::class;
  protected $egressControlConfigDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $launchStage;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $releaseVersion;
  protected $roleGrantType = RoleGrant::class;
  protected $roleGrantDataType = '';
  protected $roleGrantsType = RoleGrant::class;
  protected $roleGrantsDataType = 'array';
  protected $supportedRuntimeFeaturesType = SupportedRuntimeFeatures::class;
  protected $supportedRuntimeFeaturesDataType = '';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param AuthConfigTemplate[]
   */
  public function setAuthConfigTemplates($authConfigTemplates)
  {
    $this->authConfigTemplates = $authConfigTemplates;
  }
  /**
   * @return AuthConfigTemplate[]
   */
  public function getAuthConfigTemplates()
  {
    return $this->authConfigTemplates;
  }
  /**
   * @param ConfigVariableTemplate[]
   */
  public function setConfigVariableTemplates($configVariableTemplates)
  {
    $this->configVariableTemplates = $configVariableTemplates;
  }
  /**
   * @return ConfigVariableTemplate[]
   */
  public function getConfigVariableTemplates()
  {
    return $this->configVariableTemplates;
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
   * @param EgressControlConfig
   */
  public function setEgressControlConfig(EgressControlConfig $egressControlConfig)
  {
    $this->egressControlConfig = $egressControlConfig;
  }
  /**
   * @return EgressControlConfig
   */
  public function getEgressControlConfig()
  {
    return $this->egressControlConfig;
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
  public function setLaunchStage($launchStage)
  {
    $this->launchStage = $launchStage;
  }
  /**
   * @return string
   */
  public function getLaunchStage()
  {
    return $this->launchStage;
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
  public function setReleaseVersion($releaseVersion)
  {
    $this->releaseVersion = $releaseVersion;
  }
  /**
   * @return string
   */
  public function getReleaseVersion()
  {
    return $this->releaseVersion;
  }
  /**
   * @param RoleGrant
   */
  public function setRoleGrant(RoleGrant $roleGrant)
  {
    $this->roleGrant = $roleGrant;
  }
  /**
   * @return RoleGrant
   */
  public function getRoleGrant()
  {
    return $this->roleGrant;
  }
  /**
   * @param RoleGrant[]
   */
  public function setRoleGrants($roleGrants)
  {
    $this->roleGrants = $roleGrants;
  }
  /**
   * @return RoleGrant[]
   */
  public function getRoleGrants()
  {
    return $this->roleGrants;
  }
  /**
   * @param SupportedRuntimeFeatures
   */
  public function setSupportedRuntimeFeatures(SupportedRuntimeFeatures $supportedRuntimeFeatures)
  {
    $this->supportedRuntimeFeatures = $supportedRuntimeFeatures;
  }
  /**
   * @return SupportedRuntimeFeatures
   */
  public function getSupportedRuntimeFeatures()
  {
    return $this->supportedRuntimeFeatures;
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
class_alias(ConnectorVersion::class, 'Google_Service_Connectors_ConnectorVersion');
