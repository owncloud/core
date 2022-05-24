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

class DomainAlias extends \Google\Model
{
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $domainAliasName;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $parentDomainName;
  /**
   * @var bool
   */
  public $verified;

  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param string
   */
  public function setDomainAliasName($domainAliasName)
  {
    $this->domainAliasName = $domainAliasName;
  }
  /**
   * @return string
   */
  public function getDomainAliasName()
  {
    return $this->domainAliasName;
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
  public function setParentDomainName($parentDomainName)
  {
    $this->parentDomainName = $parentDomainName;
  }
  /**
   * @return string
   */
  public function getParentDomainName()
  {
    return $this->parentDomainName;
  }
  /**
   * @param bool
   */
  public function setVerified($verified)
  {
    $this->verified = $verified;
  }
  /**
   * @return bool
   */
  public function getVerified()
  {
    return $this->verified;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DomainAlias::class, 'Google_Service_Directory_DomainAlias');
