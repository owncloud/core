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

class Domains extends \Google\Collection
{
  protected $collection_key = 'domainAliases';
  /**
   * @var string
   */
  public $creationTime;
  protected $domainAliasesType = DomainAlias::class;
  protected $domainAliasesDataType = 'array';
  /**
   * @var string
   */
  public $domainName;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var bool
   */
  public $isPrimary;
  /**
   * @var string
   */
  public $kind;
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
   * @param DomainAlias[]
   */
  public function setDomainAliases($domainAliases)
  {
    $this->domainAliases = $domainAliases;
  }
  /**
   * @return DomainAlias[]
   */
  public function getDomainAliases()
  {
    return $this->domainAliases;
  }
  /**
   * @param string
   */
  public function setDomainName($domainName)
  {
    $this->domainName = $domainName;
  }
  /**
   * @return string
   */
  public function getDomainName()
  {
    return $this->domainName;
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
   * @param bool
   */
  public function setIsPrimary($isPrimary)
  {
    $this->isPrimary = $isPrimary;
  }
  /**
   * @return bool
   */
  public function getIsPrimary()
  {
    return $this->isPrimary;
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
class_alias(Domains::class, 'Google_Service_Directory_Domains');
