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

namespace Google\Service\Contentwarehouse;

class AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataProfileNameModificationHistory extends \Google\Model
{
  /**
   * @var int
   */
  public $computedNameChangesRemaining;
  /**
   * @var int
   */
  public $computedNicknameChangesRemaining;
  /**
   * @var int
   */
  public $nameChangesRemaining;
  /**
   * @var string
   */
  public $nameLastModified;
  /**
   * @var int
   */
  public $nicknameChangesRemaining;
  /**
   * @var string
   */
  public $nicknameLastModified;
  /**
   * @var string
   */
  public $quotaEnforcementStatus;

  /**
   * @param int
   */
  public function setComputedNameChangesRemaining($computedNameChangesRemaining)
  {
    $this->computedNameChangesRemaining = $computedNameChangesRemaining;
  }
  /**
   * @return int
   */
  public function getComputedNameChangesRemaining()
  {
    return $this->computedNameChangesRemaining;
  }
  /**
   * @param int
   */
  public function setComputedNicknameChangesRemaining($computedNicknameChangesRemaining)
  {
    $this->computedNicknameChangesRemaining = $computedNicknameChangesRemaining;
  }
  /**
   * @return int
   */
  public function getComputedNicknameChangesRemaining()
  {
    return $this->computedNicknameChangesRemaining;
  }
  /**
   * @param int
   */
  public function setNameChangesRemaining($nameChangesRemaining)
  {
    $this->nameChangesRemaining = $nameChangesRemaining;
  }
  /**
   * @return int
   */
  public function getNameChangesRemaining()
  {
    return $this->nameChangesRemaining;
  }
  /**
   * @param string
   */
  public function setNameLastModified($nameLastModified)
  {
    $this->nameLastModified = $nameLastModified;
  }
  /**
   * @return string
   */
  public function getNameLastModified()
  {
    return $this->nameLastModified;
  }
  /**
   * @param int
   */
  public function setNicknameChangesRemaining($nicknameChangesRemaining)
  {
    $this->nicknameChangesRemaining = $nicknameChangesRemaining;
  }
  /**
   * @return int
   */
  public function getNicknameChangesRemaining()
  {
    return $this->nicknameChangesRemaining;
  }
  /**
   * @param string
   */
  public function setNicknameLastModified($nicknameLastModified)
  {
    $this->nicknameLastModified = $nicknameLastModified;
  }
  /**
   * @return string
   */
  public function getNicknameLastModified()
  {
    return $this->nicknameLastModified;
  }
  /**
   * @param string
   */
  public function setQuotaEnforcementStatus($quotaEnforcementStatus)
  {
    $this->quotaEnforcementStatus = $quotaEnforcementStatus;
  }
  /**
   * @return string
   */
  public function getQuotaEnforcementStatus()
  {
    return $this->quotaEnforcementStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataProfileNameModificationHistory::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataProfileNameModificationHistory');
