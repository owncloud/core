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

class Google_Service_CloudSearch_Person extends Google_Collection
{
  protected $collection_key = 'photos';
  protected $emailAddressesType = 'Google_Service_CloudSearch_EmailAddress';
  protected $emailAddressesDataType = 'array';
  public $name;
  public $obfuscatedId;
  protected $personNamesType = 'Google_Service_CloudSearch_Name';
  protected $personNamesDataType = 'array';
  protected $photosType = 'Google_Service_CloudSearch_Photo';
  protected $photosDataType = 'array';

  /**
   * @param Google_Service_CloudSearch_EmailAddress
   */
  public function setEmailAddresses($emailAddresses)
  {
    $this->emailAddresses = $emailAddresses;
  }
  /**
   * @return Google_Service_CloudSearch_EmailAddress
   */
  public function getEmailAddresses()
  {
    return $this->emailAddresses;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setObfuscatedId($obfuscatedId)
  {
    $this->obfuscatedId = $obfuscatedId;
  }
  public function getObfuscatedId()
  {
    return $this->obfuscatedId;
  }
  /**
   * @param Google_Service_CloudSearch_Name
   */
  public function setPersonNames($personNames)
  {
    $this->personNames = $personNames;
  }
  /**
   * @return Google_Service_CloudSearch_Name
   */
  public function getPersonNames()
  {
    return $this->personNames;
  }
  /**
   * @param Google_Service_CloudSearch_Photo
   */
  public function setPhotos($photos)
  {
    $this->photos = $photos;
  }
  /**
   * @return Google_Service_CloudSearch_Photo
   */
  public function getPhotos()
  {
    return $this->photos;
  }
}
