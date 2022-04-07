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

namespace Google\Service\VMMigrationService;

class AvailableUpdates extends \Google\Model
{
  protected $inPlaceUpdateType = ApplianceVersion::class;
  protected $inPlaceUpdateDataType = '';
  protected $newDeployableApplianceType = ApplianceVersion::class;
  protected $newDeployableApplianceDataType = '';

  /**
   * @param ApplianceVersion
   */
  public function setInPlaceUpdate(ApplianceVersion $inPlaceUpdate)
  {
    $this->inPlaceUpdate = $inPlaceUpdate;
  }
  /**
   * @return ApplianceVersion
   */
  public function getInPlaceUpdate()
  {
    return $this->inPlaceUpdate;
  }
  /**
   * @param ApplianceVersion
   */
  public function setNewDeployableAppliance(ApplianceVersion $newDeployableAppliance)
  {
    $this->newDeployableAppliance = $newDeployableAppliance;
  }
  /**
   * @return ApplianceVersion
   */
  public function getNewDeployableAppliance()
  {
    return $this->newDeployableAppliance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AvailableUpdates::class, 'Google_Service_VMMigrationService_AvailableUpdates');
