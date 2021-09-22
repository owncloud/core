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
  public $contactEmail;
  public $dataProtectionOfficerEmail;
  public $dataProtectionOfficerName;
  public $dataProtectionOfficerPhone;
  public $euRepresentativeEmail;
  public $euRepresentativeName;
  public $euRepresentativePhone;

  public function setContactEmail($contactEmail)
  {
    $this->contactEmail = $contactEmail;
  }
  public function getContactEmail()
  {
    return $this->contactEmail;
  }
  public function setDataProtectionOfficerEmail($dataProtectionOfficerEmail)
  {
    $this->dataProtectionOfficerEmail = $dataProtectionOfficerEmail;
  }
  public function getDataProtectionOfficerEmail()
  {
    return $this->dataProtectionOfficerEmail;
  }
  public function setDataProtectionOfficerName($dataProtectionOfficerName)
  {
    $this->dataProtectionOfficerName = $dataProtectionOfficerName;
  }
  public function getDataProtectionOfficerName()
  {
    return $this->dataProtectionOfficerName;
  }
  public function setDataProtectionOfficerPhone($dataProtectionOfficerPhone)
  {
    $this->dataProtectionOfficerPhone = $dataProtectionOfficerPhone;
  }
  public function getDataProtectionOfficerPhone()
  {
    return $this->dataProtectionOfficerPhone;
  }
  public function setEuRepresentativeEmail($euRepresentativeEmail)
  {
    $this->euRepresentativeEmail = $euRepresentativeEmail;
  }
  public function getEuRepresentativeEmail()
  {
    return $this->euRepresentativeEmail;
  }
  public function setEuRepresentativeName($euRepresentativeName)
  {
    $this->euRepresentativeName = $euRepresentativeName;
  }
  public function getEuRepresentativeName()
  {
    return $this->euRepresentativeName;
  }
  public function setEuRepresentativePhone($euRepresentativePhone)
  {
    $this->euRepresentativePhone = $euRepresentativePhone;
  }
  public function getEuRepresentativePhone()
  {
    return $this->euRepresentativePhone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContactInfo::class, 'Google_Service_AndroidManagement_ContactInfo');
