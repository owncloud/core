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

namespace Google\Service\AndroidManagement;

class ContactInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $contactEmail;
  /**
   * @var string
   */
  public $dataProtectionOfficerEmail;
  /**
   * @var string
   */
  public $dataProtectionOfficerName;
  /**
   * @var string
   */
  public $dataProtectionOfficerPhone;
  /**
   * @var string
   */
  public $euRepresentativeEmail;
  /**
   * @var string
   */
  public $euRepresentativeName;
  /**
   * @var string
   */
  public $euRepresentativePhone;

  /**
   * @param string
   */
  public function setContactEmail($contactEmail)
  {
    $this->contactEmail = $contactEmail;
  }
  /**
   * @return string
   */
  public function getContactEmail()
  {
    return $this->contactEmail;
  }
  /**
   * @param string
   */
  public function setDataProtectionOfficerEmail($dataProtectionOfficerEmail)
  {
    $this->dataProtectionOfficerEmail = $dataProtectionOfficerEmail;
  }
  /**
   * @return string
   */
  public function getDataProtectionOfficerEmail()
  {
    return $this->dataProtectionOfficerEmail;
  }
  /**
   * @param string
   */
  public function setDataProtectionOfficerName($dataProtectionOfficerName)
  {
    $this->dataProtectionOfficerName = $dataProtectionOfficerName;
  }
  /**
   * @return string
   */
  public function getDataProtectionOfficerName()
  {
    return $this->dataProtectionOfficerName;
  }
  /**
   * @param string
   */
  public function setDataProtectionOfficerPhone($dataProtectionOfficerPhone)
  {
    $this->dataProtectionOfficerPhone = $dataProtectionOfficerPhone;
  }
  /**
   * @return string
   */
  public function getDataProtectionOfficerPhone()
  {
    return $this->dataProtectionOfficerPhone;
  }
  /**
   * @param string
   */
  public function setEuRepresentativeEmail($euRepresentativeEmail)
  {
    $this->euRepresentativeEmail = $euRepresentativeEmail;
  }
  /**
   * @return string
   */
  public function getEuRepresentativeEmail()
  {
    return $this->euRepresentativeEmail;
  }
  /**
   * @param string
   */
  public function setEuRepresentativeName($euRepresentativeName)
  {
    $this->euRepresentativeName = $euRepresentativeName;
  }
  /**
   * @return string
   */
  public function getEuRepresentativeName()
  {
    return $this->euRepresentativeName;
  }
  /**
   * @param string
   */
  public function setEuRepresentativePhone($euRepresentativePhone)
  {
    $this->euRepresentativePhone = $euRepresentativePhone;
  }
  /**
   * @return string
   */
  public function getEuRepresentativePhone()
  {
    return $this->euRepresentativePhone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContactInfo::class, 'Google_Service_AndroidManagement_ContactInfo');
