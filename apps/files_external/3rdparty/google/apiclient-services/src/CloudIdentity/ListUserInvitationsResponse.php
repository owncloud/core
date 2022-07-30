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

namespace Google\Service\CloudIdentity;

class ListUserInvitationsResponse extends \Google\Collection
{
  protected $collection_key = 'userInvitations';
  /**
   * @var string
   */
  public $nextPageToken;
  protected $userInvitationsType = UserInvitation::class;
  protected $userInvitationsDataType = 'array';

  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param UserInvitation[]
   */
  public function setUserInvitations($userInvitations)
  {
    $this->userInvitations = $userInvitations;
  }
  /**
   * @return UserInvitation[]
   */
  public function getUserInvitations()
  {
    return $this->userInvitations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListUserInvitationsResponse::class, 'Google_Service_CloudIdentity_ListUserInvitationsResponse');
