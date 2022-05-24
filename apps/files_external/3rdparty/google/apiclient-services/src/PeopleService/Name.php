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

namespace Google\Service\PeopleService;

class Name extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $displayNameLastFirst;
  /**
   * @var string
   */
  public $familyName;
  /**
   * @var string
   */
  public $givenName;
  /**
   * @var string
   */
  public $honorificPrefix;
  /**
   * @var string
   */
  public $honorificSuffix;
  protected $metadataType = FieldMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $middleName;
  /**
   * @var string
   */
  public $phoneticFamilyName;
  /**
   * @var string
   */
  public $phoneticFullName;
  /**
   * @var string
   */
  public $phoneticGivenName;
  /**
   * @var string
   */
  public $phoneticHonorificPrefix;
  /**
   * @var string
   */
  public $phoneticHonorificSuffix;
  /**
   * @var string
   */
  public $phoneticMiddleName;
  /**
   * @var string
   */
  public $unstructuredName;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setDisplayNameLastFirst($displayNameLastFirst)
  {
    $this->displayNameLastFirst = $displayNameLastFirst;
  }
  /**
   * @return string
   */
  public function getDisplayNameLastFirst()
  {
    return $this->displayNameLastFirst;
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
  public function setHonorificPrefix($honorificPrefix)
  {
    $this->honorificPrefix = $honorificPrefix;
  }
  /**
   * @return string
   */
  public function getHonorificPrefix()
  {
    return $this->honorificPrefix;
  }
  /**
   * @param string
   */
  public function setHonorificSuffix($honorificSuffix)
  {
    $this->honorificSuffix = $honorificSuffix;
  }
  /**
   * @return string
   */
  public function getHonorificSuffix()
  {
    return $this->honorificSuffix;
  }
  /**
   * @param FieldMetadata
   */
  public function setMetadata(FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return FieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setMiddleName($middleName)
  {
    $this->middleName = $middleName;
  }
  /**
   * @return string
   */
  public function getMiddleName()
  {
    return $this->middleName;
  }
  /**
   * @param string
   */
  public function setPhoneticFamilyName($phoneticFamilyName)
  {
    $this->phoneticFamilyName = $phoneticFamilyName;
  }
  /**
   * @return string
   */
  public function getPhoneticFamilyName()
  {
    return $this->phoneticFamilyName;
  }
  /**
   * @param string
   */
  public function setPhoneticFullName($phoneticFullName)
  {
    $this->phoneticFullName = $phoneticFullName;
  }
  /**
   * @return string
   */
  public function getPhoneticFullName()
  {
    return $this->phoneticFullName;
  }
  /**
   * @param string
   */
  public function setPhoneticGivenName($phoneticGivenName)
  {
    $this->phoneticGivenName = $phoneticGivenName;
  }
  /**
   * @return string
   */
  public function getPhoneticGivenName()
  {
    return $this->phoneticGivenName;
  }
  /**
   * @param string
   */
  public function setPhoneticHonorificPrefix($phoneticHonorificPrefix)
  {
    $this->phoneticHonorificPrefix = $phoneticHonorificPrefix;
  }
  /**
   * @return string
   */
  public function getPhoneticHonorificPrefix()
  {
    return $this->phoneticHonorificPrefix;
  }
  /**
   * @param string
   */
  public function setPhoneticHonorificSuffix($phoneticHonorificSuffix)
  {
    $this->phoneticHonorificSuffix = $phoneticHonorificSuffix;
  }
  /**
   * @return string
   */
  public function getPhoneticHonorificSuffix()
  {
    return $this->phoneticHonorificSuffix;
  }
  /**
   * @param string
   */
  public function setPhoneticMiddleName($phoneticMiddleName)
  {
    $this->phoneticMiddleName = $phoneticMiddleName;
  }
  /**
   * @return string
   */
  public function getPhoneticMiddleName()
  {
    return $this->phoneticMiddleName;
  }
  /**
   * @param string
   */
  public function setUnstructuredName($unstructuredName)
  {
    $this->unstructuredName = $unstructuredName;
  }
  /**
   * @return string
   */
  public function getUnstructuredName()
  {
    return $this->unstructuredName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Name::class, 'Google_Service_PeopleService_Name');
