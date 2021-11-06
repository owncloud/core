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

namespace Google\Service\GameServices;

class GameServerConfigOverride extends \Google\Model
{
  public $configVersion;
  protected $realmsSelectorType = RealmSelector::class;
  protected $realmsSelectorDataType = '';

  public function setConfigVersion($configVersion)
  {
    $this->configVersion = $configVersion;
  }
  public function getConfigVersion()
  {
    return $this->configVersion;
  }
  /**
   * @param RealmSelector
   */
  public function setRealmsSelector(RealmSelector $realmsSelector)
  {
    $this->realmsSelector = $realmsSelector;
  }
  /**
   * @return RealmSelector
   */
  public function getRealmsSelector()
  {
    return $this->realmsSelector;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GameServerConfigOverride::class, 'Google_Service_GameServices_GameServerConfigOverride');
