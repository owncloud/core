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

namespace Google\Service\Drive;

class LabelField extends \Google\Collection
{
  protected $collection_key = 'user';
  /**
   * @var string[]
   */
  public $dateString;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $integer;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $selection;
  /**
   * @var string[]
   */
  public $text;
  protected $userType = User::class;
  protected $userDataType = 'array';
  /**
   * @var string
   */
  public $valueType;

  /**
   * @param string[]
   */
  public function setDateString($dateString)
  {
    $this->dateString = $dateString;
  }
  /**
   * @return string[]
   */
  public function getDateString()
  {
    return $this->dateString;
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
   * @param string[]
   */
  public function setInteger($integer)
  {
    $this->integer = $integer;
  }
  /**
   * @return string[]
   */
  public function getInteger()
  {
    return $this->integer;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string[]
   */
  public function setSelection($selection)
  {
    $this->selection = $selection;
  }
  /**
   * @return string[]
   */
  public function getSelection()
  {
    return $this->selection;
  }
  /**
   * @param string[]
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string[]
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param User[]
   */
  public function setUser($user)
  {
    $this->user = $user;
  }
  /**
   * @return User[]
   */
  public function getUser()
  {
    return $this->user;
  }
  /**
   * @param string
   */
  public function setValueType($valueType)
  {
    $this->valueType = $valueType;
  }
  /**
   * @return string
   */
  public function getValueType()
  {
    return $this->valueType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LabelField::class, 'Google_Service_Drive_LabelField');
