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

class ScienceCitationTranslatedAuthor extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "department" => "Department",
        "email" => "Email",
        "guessOrderType" => "GuessOrderType",
        "institution" => "Institution",
        "language" => "Language",
        "lastName" => "LastName",
        "otherNames" => "OtherNames",
        "sourceText" => "SourceText",
        "type" => "Type",
  ];
  /**
   * @var string
   */
  public $department;
  /**
   * @var string
   */
  public $email;
  /**
   * @var int
   */
  public $guessOrderType;
  /**
   * @var string
   */
  public $institution;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $lastName;
  /**
   * @var string
   */
  public $otherNames;
  /**
   * @var string
   */
  public $sourceText;
  /**
   * @var int
   */
  public $type;

  /**
   * @param string
   */
  public function setDepartment($department)
  {
    $this->department = $department;
  }
  /**
   * @return string
   */
  public function getDepartment()
  {
    return $this->department;
  }
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
   * @param int
   */
  public function setGuessOrderType($guessOrderType)
  {
    $this->guessOrderType = $guessOrderType;
  }
  /**
   * @return int
   */
  public function getGuessOrderType()
  {
    return $this->guessOrderType;
  }
  /**
   * @param string
   */
  public function setInstitution($institution)
  {
    $this->institution = $institution;
  }
  /**
   * @return string
   */
  public function getInstitution()
  {
    return $this->institution;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }
  /**
   * @return string
   */
  public function getLastName()
  {
    return $this->lastName;
  }
  /**
   * @param string
   */
  public function setOtherNames($otherNames)
  {
    $this->otherNames = $otherNames;
  }
  /**
   * @return string
   */
  public function getOtherNames()
  {
    return $this->otherNames;
  }
  /**
   * @param string
   */
  public function setSourceText($sourceText)
  {
    $this->sourceText = $sourceText;
  }
  /**
   * @return string
   */
  public function getSourceText()
  {
    return $this->sourceText;
  }
  /**
   * @param int
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return int
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScienceCitationTranslatedAuthor::class, 'Google_Service_Contentwarehouse_ScienceCitationTranslatedAuthor');
