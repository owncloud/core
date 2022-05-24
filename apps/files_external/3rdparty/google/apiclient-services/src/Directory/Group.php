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

namespace Google\Service\Directory;

class Group extends \Google\Collection
{
  protected $collection_key = 'nonEditableAliases';
  /**
   * @var bool
   */
  public $adminCreated;
  /**
   * @var string[]
   */
  public $aliases;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $directMembersCount;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $nonEditableAliases;

  /**
   * @param bool
   */
  public function setAdminCreated($adminCreated)
  {
    $this->adminCreated = $adminCreated;
  }
  /**
   * @return bool
   */
  public function getAdminCreated()
  {
    return $this->adminCreated;
  }
  /**
   * @param string[]
   */
  public function setAliases($aliases)
  {
    $this->aliases = $aliases;
  }
  /**
   * @return string[]
   */
  public function getAliases()
  {
    return $this->aliases;
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
  public function setDirectMembersCount($directMembersCount)
  {
    $this->directMembersCount = $directMembersCount;
  }
  /**
   * @return string
   */
  public function getDirectMembersCount()
  {
    return $this->directMembersCount;
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
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
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
   * @param string[]
   */
  public function setNonEditableAliases($nonEditableAliases)
  {
    $this->nonEditableAliases = $nonEditableAliases;
  }
  /**
   * @return string[]
   */
  public function getNonEditableAliases()
  {
    return $this->nonEditableAliases;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Group::class, 'Google_Service_Directory_Group');
