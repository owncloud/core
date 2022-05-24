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

namespace Google\Service\Dfareporting;

class OrderContact extends \Google\Model
{
  /**
   * @var string
   */
  public $contactInfo;
  /**
   * @var string
   */
  public $contactName;
  /**
   * @var string
   */
  public $contactTitle;
  /**
   * @var string
   */
  public $contactType;
  /**
   * @var string
   */
  public $signatureUserProfileId;

  /**
   * @param string
   */
  public function setContactInfo($contactInfo)
  {
    $this->contactInfo = $contactInfo;
  }
  /**
   * @return string
   */
  public function getContactInfo()
  {
    return $this->contactInfo;
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
  public function setContactTitle($contactTitle)
  {
    $this->contactTitle = $contactTitle;
  }
  /**
   * @return string
   */
  public function getContactTitle()
  {
    return $this->contactTitle;
  }
  /**
   * @param string
   */
  public function setContactType($contactType)
  {
    $this->contactType = $contactType;
  }
  /**
   * @return string
   */
  public function getContactType()
  {
    return $this->contactType;
  }
  /**
   * @param string
   */
  public function setSignatureUserProfileId($signatureUserProfileId)
  {
    $this->signatureUserProfileId = $signatureUserProfileId;
  }
  /**
   * @return string
   */
  public function getSignatureUserProfileId()
  {
    return $this->signatureUserProfileId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderContact::class, 'Google_Service_Dfareporting_OrderContact');
