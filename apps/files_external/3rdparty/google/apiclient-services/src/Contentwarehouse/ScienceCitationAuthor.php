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

class ScienceCitationAuthor extends \Google\Collection
{
  protected $collection_key = 'ID';
  protected $internal_gapi_mappings = [
        "comment" => "Comment",
        "department" => "Department",
        "email" => "Email",
        "guessOrderType" => "GuessOrderType",
        "iD" => "ID",
        "institution" => "Institution",
        "isCJKForeignName" => "IsCJKForeignName",
        "isCorrespondingAuthor" => "IsCorrespondingAuthor",
        "lastName" => "LastName",
        "otherNames" => "OtherNames",
        "sourceText" => "SourceText",
        "type" => "Type",
  ];
  /**
   * @var string
   */
  public $comment;
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
   * @var string[]
   */
  public $iD;
  /**
   * @var string
   */
  public $institution;
  /**
   * @var bool
   */
  public $isCJKForeignName;
  /**
   * @var bool
   */
  public $isCorrespondingAuthor;
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
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return string
   */
  public function getComment()
  {
    return $this->comment;
  }
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
   * @param string[]
   */
  public function setID($iD)
  {
    $this->iD = $iD;
  }
  /**
   * @return string[]
   */
  public function getID()
  {
    return $this->iD;
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
   * @param bool
   */
  public function setIsCJKForeignName($isCJKForeignName)
  {
    $this->isCJKForeignName = $isCJKForeignName;
  }
  /**
   * @return bool
   */
  public function getIsCJKForeignName()
  {
    return $this->isCJKForeignName;
  }
  /**
   * @param bool
   */
  public function setIsCorrespondingAuthor($isCorrespondingAuthor)
  {
    $this->isCorrespondingAuthor = $isCorrespondingAuthor;
  }
  /**
   * @return bool
   */
  public function getIsCorrespondingAuthor()
  {
    return $this->isCorrespondingAuthor;
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
class_alias(ScienceCitationAuthor::class, 'Google_Service_Contentwarehouse_ScienceCitationAuthor');
