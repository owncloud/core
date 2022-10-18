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

namespace Google\Service\CloudSearch;

class AppsDynamiteMemberId extends \Google\Model
{
  protected $rosterIdType = AppsDynamiteRosterId::class;
  protected $rosterIdDataType = '';
  protected $userIdType = AppsDynamiteUserId::class;
  protected $userIdDataType = '';

  /**
   * @param AppsDynamiteRosterId
   */
  public function setRosterId(AppsDynamiteRosterId $rosterId)
  {
    $this->rosterId = $rosterId;
  }
  /**
   * @return AppsDynamiteRosterId
   */
  public function getRosterId()
  {
    return $this->rosterId;
  }
  /**
   * @param AppsDynamiteUserId
   */
  public function setUserId(AppsDynamiteUserId $userId)
  {
    $this->userId = $userId;
  }
  /**
   * @return AppsDynamiteUserId
   */
  public function getUserId()
  {
    return $this->userId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteMemberId::class, 'Google_Service_CloudSearch_AppsDynamiteMemberId');
