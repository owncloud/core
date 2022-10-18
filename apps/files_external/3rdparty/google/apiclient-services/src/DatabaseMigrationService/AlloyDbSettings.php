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

namespace Google\Service\DatabaseMigrationService;

class AlloyDbSettings extends \Google\Model
{
  protected $initialUserType = UserPassword::class;
  protected $initialUserDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  protected $primaryInstanceSettingsType = PrimaryInstanceSettings::class;
  protected $primaryInstanceSettingsDataType = '';
  /**
   * @var string
   */
  public $vpcNetwork;

  /**
   * @param UserPassword
   */
  public function setInitialUser(UserPassword $initialUser)
  {
    $this->initialUser = $initialUser;
  }
  /**
   * @return UserPassword
   */
  public function getInitialUser()
  {
    return $this->initialUser;
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
   * @param PrimaryInstanceSettings
   */
  public function setPrimaryInstanceSettings(PrimaryInstanceSettings $primaryInstanceSettings)
  {
    $this->primaryInstanceSettings = $primaryInstanceSettings;
  }
  /**
   * @return PrimaryInstanceSettings
   */
  public function getPrimaryInstanceSettings()
  {
    return $this->primaryInstanceSettings;
  }
  /**
   * @param string
   */
  public function setVpcNetwork($vpcNetwork)
  {
    $this->vpcNetwork = $vpcNetwork;
  }
  /**
   * @return string
   */
  public function getVpcNetwork()
  {
    return $this->vpcNetwork;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AlloyDbSettings::class, 'Google_Service_DatabaseMigrationService_AlloyDbSettings');
