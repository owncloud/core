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

namespace Google\Service\AndroidEnterprise;

class Enterprise extends \Google\Collection
{
  protected $collection_key = 'administrator';
  protected $administratorType = Administrator::class;
  protected $administratorDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $primaryDomain;

  /**
   * @param Administrator[]
   */
  public function setAdministrator($administrator)
  {
    $this->administrator = $administrator;
  }
  /**
   * @return Administrator[]
   */
  public function getAdministrator()
  {
    return $this->administrator;
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
  public function setPrimaryDomain($primaryDomain)
  {
    $this->primaryDomain = $primaryDomain;
  }
  /**
   * @return string
   */
  public function getPrimaryDomain()
  {
    return $this->primaryDomain;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Enterprise::class, 'Google_Service_AndroidEnterprise_Enterprise');
