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

namespace Google\Service\SQLAdmin;

class User extends \Google\Model
{
  /**
   * @var string
   */
  public $dualPasswordType;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $host;
  /**
   * @var string
   */
  public $instance;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $password;
  protected $passwordPolicyType = UserPasswordValidationPolicy::class;
  protected $passwordPolicyDataType = '';
  /**
   * @var string
   */
  public $project;
  protected $sqlserverUserDetailsType = SqlServerUserDetails::class;
  protected $sqlserverUserDetailsDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setDualPasswordType($dualPasswordType)
  {
    $this->dualPasswordType = $dualPasswordType;
  }
  /**
   * @return string
   */
  public function getDualPasswordType()
  {
    return $this->dualPasswordType;
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
  public function setHost($host)
  {
    $this->host = $host;
  }
  /**
   * @return string
   */
  public function getHost()
  {
    return $this->host;
  }
  /**
   * @param string
   */
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  /**
   * @return string
   */
  public function getInstance()
  {
    return $this->instance;
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
   * @param string
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }
  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }
  /**
   * @param UserPasswordValidationPolicy
   */
  public function setPasswordPolicy(UserPasswordValidationPolicy $passwordPolicy)
  {
    $this->passwordPolicy = $passwordPolicy;
  }
  /**
   * @return UserPasswordValidationPolicy
   */
  public function getPasswordPolicy()
  {
    return $this->passwordPolicy;
  }
  /**
   * @param string
   */
  public function setProject($project)
  {
    $this->project = $project;
  }
  /**
   * @return string
   */
  public function getProject()
  {
    return $this->project;
  }
  /**
   * @param SqlServerUserDetails
   */
  public function setSqlserverUserDetails(SqlServerUserDetails $sqlserverUserDetails)
  {
    $this->sqlserverUserDetails = $sqlserverUserDetails;
  }
  /**
   * @return SqlServerUserDetails
   */
  public function getSqlserverUserDetails()
  {
    return $this->sqlserverUserDetails;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(User::class, 'Google_Service_SQLAdmin_User');
