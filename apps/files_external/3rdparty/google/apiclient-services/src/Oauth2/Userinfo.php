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

namespace Google\Service\Oauth2;

class Userinfo extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "familyName" => "family_name",
        "givenName" => "given_name",
        "verifiedEmail" => "verified_email",
  ];
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $familyName;
  /**
   * @var string
   */
  public $gender;
  /**
   * @var string
   */
  public $givenName;
  /**
   * @var string
   */
  public $hd;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $link;
  /**
   * @var string
   */
  public $locale;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $picture;
  /**
   * @var bool
   */
  public $verifiedEmail;

  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setFamilyName($familyName)
  {
    $this->familyName = $familyName;
  }
  /**
   * @return string
   */
  public function getFamilyName()
  {
    return $this->familyName;
  }
  /**
   * @param string
   */
  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  /**
   * @return string
   */
  public function getGender()
  {
    return $this->gender;
  }
  /**
   * @param string
   */
  public function setGivenName($givenName)
  {
    $this->givenName = $givenName;
  }
  /**
   * @return string
   */
  public function getGivenName()
  {
    return $this->givenName;
  }
  /**
   * @param string
   */
  public function setHd($hd)
  {
    $this->hd = $hd;
  }
  /**
   * @return string
   */
  public function getHd()
  {
    return $this->hd;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setLink($link)
  {
    $this->link = $link;
  }
  /**
   * @return string
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param string
   */
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return string
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPicture($picture)
  {
    $this->picture = $picture;
  }
  /**
   * @return string
   */
  public function getPicture()
  {
    return $this->picture;
  }
  /**
   * @param bool
   */
  public function setVerifiedEmail($verifiedEmail)
  {
    $this->verifiedEmail = $verifiedEmail;
  }
  /**
   * @return bool
   */
  public function getVerifiedEmail()
  {
    return $this->verifiedEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Userinfo::class, 'Google_Service_Oauth2_Userinfo');
