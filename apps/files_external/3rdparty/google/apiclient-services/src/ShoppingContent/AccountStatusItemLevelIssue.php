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

namespace Google\Service\ShoppingContent;

class AccountStatusItemLevelIssue extends \Google\Model
{
  /**
   * @var string
   */
  public $attributeName;
  /**
   * @var string
   */
  public $code;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $detail;
  /**
   * @var string
   */
  public $documentation;
  /**
   * @var string
   */
  public $numItems;
  /**
   * @var string
   */
  public $resolution;
  /**
   * @var string
   */
  public $servability;

  /**
   * @param string
   */
  public function setAttributeName($attributeName)
  {
    $this->attributeName = $attributeName;
  }
  /**
   * @return string
   */
  public function getAttributeName()
  {
    return $this->attributeName;
  }
  /**
   * @param string
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDetail($detail)
  {
    $this->detail = $detail;
  }
  /**
   * @return string
   */
  public function getDetail()
  {
    return $this->detail;
  }
  /**
   * @param string
   */
  public function setDocumentation($documentation)
  {
    $this->documentation = $documentation;
  }
  /**
   * @return string
   */
  public function getDocumentation()
  {
    return $this->documentation;
  }
  /**
   * @param string
   */
  public function setNumItems($numItems)
  {
    $this->numItems = $numItems;
  }
  /**
   * @return string
   */
  public function getNumItems()
  {
    return $this->numItems;
  }
  /**
   * @param string
   */
  public function setResolution($resolution)
  {
    $this->resolution = $resolution;
  }
  /**
   * @return string
   */
  public function getResolution()
  {
    return $this->resolution;
  }
  /**
   * @param string
   */
  public function setServability($servability)
  {
    $this->servability = $servability;
  }
  /**
   * @return string
   */
  public function getServability()
  {
    return $this->servability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountStatusItemLevelIssue::class, 'Google_Service_ShoppingContent_AccountStatusItemLevelIssue');
