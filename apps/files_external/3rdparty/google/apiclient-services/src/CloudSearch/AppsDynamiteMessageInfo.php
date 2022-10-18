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

class AppsDynamiteMessageInfo extends \Google\Model
{
  protected $messageType = AppsDynamiteMessage::class;
  protected $messageDataType = '';
  /**
   * @var string
   */
  public $searcherMembershipState;

  /**
   * @param AppsDynamiteMessage
   */
  public function setMessage(AppsDynamiteMessage $message)
  {
    $this->message = $message;
  }
  /**
   * @return AppsDynamiteMessage
   */
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param string
   */
  public function setSearcherMembershipState($searcherMembershipState)
  {
    $this->searcherMembershipState = $searcherMembershipState;
  }
  /**
   * @return string
   */
  public function getSearcherMembershipState()
  {
    return $this->searcherMembershipState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteMessageInfo::class, 'Google_Service_CloudSearch_AppsDynamiteMessageInfo');
