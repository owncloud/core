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

namespace Google\Service\AndroidPublisher;

class CanceledStateContext extends \Google\Model
{
  protected $developerInitiatedCancellationType = DeveloperInitiatedCancellation::class;
  protected $developerInitiatedCancellationDataType = '';
  protected $replacementCancellationType = ReplacementCancellation::class;
  protected $replacementCancellationDataType = '';
  protected $systemInitiatedCancellationType = SystemInitiatedCancellation::class;
  protected $systemInitiatedCancellationDataType = '';
  protected $userInitiatedCancellationType = UserInitiatedCancellation::class;
  protected $userInitiatedCancellationDataType = '';

  /**
   * @param DeveloperInitiatedCancellation
   */
  public function setDeveloperInitiatedCancellation(DeveloperInitiatedCancellation $developerInitiatedCancellation)
  {
    $this->developerInitiatedCancellation = $developerInitiatedCancellation;
  }
  /**
   * @return DeveloperInitiatedCancellation
   */
  public function getDeveloperInitiatedCancellation()
  {
    return $this->developerInitiatedCancellation;
  }
  /**
   * @param ReplacementCancellation
   */
  public function setReplacementCancellation(ReplacementCancellation $replacementCancellation)
  {
    $this->replacementCancellation = $replacementCancellation;
  }
  /**
   * @return ReplacementCancellation
   */
  public function getReplacementCancellation()
  {
    return $this->replacementCancellation;
  }
  /**
   * @param SystemInitiatedCancellation
   */
  public function setSystemInitiatedCancellation(SystemInitiatedCancellation $systemInitiatedCancellation)
  {
    $this->systemInitiatedCancellation = $systemInitiatedCancellation;
  }
  /**
   * @return SystemInitiatedCancellation
   */
  public function getSystemInitiatedCancellation()
  {
    return $this->systemInitiatedCancellation;
  }
  /**
   * @param UserInitiatedCancellation
   */
  public function setUserInitiatedCancellation(UserInitiatedCancellation $userInitiatedCancellation)
  {
    $this->userInitiatedCancellation = $userInitiatedCancellation;
  }
  /**
   * @return UserInitiatedCancellation
   */
  public function getUserInitiatedCancellation()
  {
    return $this->userInitiatedCancellation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CanceledStateContext::class, 'Google_Service_AndroidPublisher_CanceledStateContext');
