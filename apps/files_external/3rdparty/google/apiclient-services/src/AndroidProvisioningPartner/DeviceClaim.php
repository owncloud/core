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

namespace Google\Service\AndroidProvisioningPartner;

class DeviceClaim extends \Google\Model
{
  /**
   * @var string
   */
  public $additionalService;
  /**
   * @var string
   */
  public $ownerCompanyId;
  /**
   * @var string
   */
  public $resellerId;
  /**
   * @var string
   */
  public $sectionType;
  /**
   * @var string
   */
  public $vacationModeExpireTime;
  /**
   * @var string
   */
  public $vacationModeStartTime;

  /**
   * @param string
   */
  public function setAdditionalService($additionalService)
  {
    $this->additionalService = $additionalService;
  }
  /**
   * @return string
   */
  public function getAdditionalService()
  {
    return $this->additionalService;
  }
  /**
   * @param string
   */
  public function setOwnerCompanyId($ownerCompanyId)
  {
    $this->ownerCompanyId = $ownerCompanyId;
  }
  /**
   * @return string
   */
  public function getOwnerCompanyId()
  {
    return $this->ownerCompanyId;
  }
  /**
   * @param string
   */
  public function setResellerId($resellerId)
  {
    $this->resellerId = $resellerId;
  }
  /**
   * @return string
   */
  public function getResellerId()
  {
    return $this->resellerId;
  }
  /**
   * @param string
   */
  public function setSectionType($sectionType)
  {
    $this->sectionType = $sectionType;
  }
  /**
   * @return string
   */
  public function getSectionType()
  {
    return $this->sectionType;
  }
  /**
   * @param string
   */
  public function setVacationModeExpireTime($vacationModeExpireTime)
  {
    $this->vacationModeExpireTime = $vacationModeExpireTime;
  }
  /**
   * @return string
   */
  public function getVacationModeExpireTime()
  {
    return $this->vacationModeExpireTime;
  }
  /**
   * @param string
   */
  public function setVacationModeStartTime($vacationModeStartTime)
  {
    $this->vacationModeStartTime = $vacationModeStartTime;
  }
  /**
   * @return string
   */
  public function getVacationModeStartTime()
  {
    return $this->vacationModeStartTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceClaim::class, 'Google_Service_AndroidProvisioningPartner_DeviceClaim');
