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

namespace Google\Service\Essentialcontacts;

class GoogleCloudEssentialcontactsV1SendTestMessageRequest extends \Google\Collection
{
  protected $collection_key = 'contacts';
  /**
   * @var string[]
   */
  public $contacts;
  /**
   * @var string
   */
  public $notificationCategory;

  /**
   * @param string[]
   */
  public function setContacts($contacts)
  {
    $this->contacts = $contacts;
  }
  /**
   * @return string[]
   */
  public function getContacts()
  {
    return $this->contacts;
  }
  /**
   * @param string
   */
  public function setNotificationCategory($notificationCategory)
  {
    $this->notificationCategory = $notificationCategory;
  }
  /**
   * @return string
   */
  public function getNotificationCategory()
  {
    return $this->notificationCategory;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudEssentialcontactsV1SendTestMessageRequest::class, 'Google_Service_Essentialcontacts_GoogleCloudEssentialcontactsV1SendTestMessageRequest');
