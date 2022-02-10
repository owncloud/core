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

class Database extends \Google\Model
{
  /**
   * @var string
   */
  public $charset;
  /**
   * @var string
   */
  public $collation;
  /**
   * @var string
   */
  public $etag;
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
  public $project;
  /**
   * @var string
   */
  public $selfLink;
  protected $sqlserverDatabaseDetailsType = SqlServerDatabaseDetails::class;
  protected $sqlserverDatabaseDetailsDataType = '';

  /**
   * @param string
   */
  public function setCharset($charset)
  {
    $this->charset = $charset;
  }
  /**
   * @return string
   */
  public function getCharset()
  {
    return $this->charset;
  }
  /**
   * @param string
   */
  public function setCollation($collation)
  {
    $this->collation = $collation;
  }
  /**
   * @return string
   */
  public function getCollation()
  {
    return $this->collation;
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
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param SqlServerDatabaseDetails
   */
  public function setSqlserverDatabaseDetails(SqlServerDatabaseDetails $sqlserverDatabaseDetails)
  {
    $this->sqlserverDatabaseDetails = $sqlserverDatabaseDetails;
  }
  /**
   * @return SqlServerDatabaseDetails
   */
  public function getSqlserverDatabaseDetails()
  {
    return $this->sqlserverDatabaseDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Database::class, 'Google_Service_SQLAdmin_Database');
