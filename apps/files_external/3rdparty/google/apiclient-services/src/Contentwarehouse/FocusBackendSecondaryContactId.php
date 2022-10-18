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

class FocusBackendSecondaryContactId extends \Google\Collection
{
  protected $collection_key = 'contactDetailHash';
  protected $contactDetailHashType = FocusBackendContactDetailHash::class;
  protected $contactDetailHashDataType = 'array';
  /**
   * @var string
   */
  public $contactName;
  /**
   * @var string
   */
  public $contactNameHash;

  /**
   * @param FocusBackendContactDetailHash[]
   */
  public function setContactDetailHash($contactDetailHash)
  {
    $this->contactDetailHash = $contactDetailHash;
  }
  /**
   * @return FocusBackendContactDetailHash[]
   */
  public function getContactDetailHash()
  {
    return $this->contactDetailHash;
  }
  /**
   * @param string
   */
  public function setContactName($contactName)
  {
    $this->contactName = $contactName;
  }
  /**
   * @return string
   */
  public function getContactName()
  {
    return $this->contactName;
  }
  /**
   * @param string
   */
  public function setContactNameHash($contactNameHash)
  {
    $this->contactNameHash = $contactNameHash;
  }
  /**
   * @return string
   */
  public function getContactNameHash()
  {
    return $this->contactNameHash;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FocusBackendSecondaryContactId::class, 'Google_Service_Contentwarehouse_FocusBackendSecondaryContactId');
