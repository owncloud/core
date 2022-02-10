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

namespace Google\Service\CloudDomains;

class ContactSettings extends \Google\Model
{
  protected $adminContactType = Contact::class;
  protected $adminContactDataType = '';
  /**
   * @var string
   */
  public $privacy;
  protected $registrantContactType = Contact::class;
  protected $registrantContactDataType = '';
  protected $technicalContactType = Contact::class;
  protected $technicalContactDataType = '';

  /**
   * @param Contact
   */
  public function setAdminContact(Contact $adminContact)
  {
    $this->adminContact = $adminContact;
  }
  /**
   * @return Contact
   */
  public function getAdminContact()
  {
    return $this->adminContact;
  }
  /**
   * @param string
   */
  public function setPrivacy($privacy)
  {
    $this->privacy = $privacy;
  }
  /**
   * @return string
   */
  public function getPrivacy()
  {
    return $this->privacy;
  }
  /**
   * @param Contact
   */
  public function setRegistrantContact(Contact $registrantContact)
  {
    $this->registrantContact = $registrantContact;
  }
  /**
   * @return Contact
   */
  public function getRegistrantContact()
  {
    return $this->registrantContact;
  }
  /**
   * @param Contact
   */
  public function setTechnicalContact(Contact $technicalContact)
  {
    $this->technicalContact = $technicalContact;
  }
  /**
   * @return Contact
   */
  public function getTechnicalContact()
  {
    return $this->technicalContact;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContactSettings::class, 'Google_Service_CloudDomains_ContactSettings');
