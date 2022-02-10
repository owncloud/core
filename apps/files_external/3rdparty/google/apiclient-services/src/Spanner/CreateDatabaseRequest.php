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

namespace Google\Service\Spanner;

class CreateDatabaseRequest extends \Google\Collection
{
  protected $collection_key = 'extraStatements';
  /**
   * @var string
   */
  public $createStatement;
  /**
   * @var string
   */
  public $databaseDialect;
  protected $encryptionConfigType = EncryptionConfig::class;
  protected $encryptionConfigDataType = '';
  /**
   * @var string[]
   */
  public $extraStatements;

  /**
   * @param string
   */
  public function setCreateStatement($createStatement)
  {
    $this->createStatement = $createStatement;
  }
  /**
   * @return string
   */
  public function getCreateStatement()
  {
    return $this->createStatement;
  }
  /**
   * @param string
   */
  public function setDatabaseDialect($databaseDialect)
  {
    $this->databaseDialect = $databaseDialect;
  }
  /**
   * @return string
   */
  public function getDatabaseDialect()
  {
    return $this->databaseDialect;
  }
  /**
   * @param EncryptionConfig
   */
  public function setEncryptionConfig(EncryptionConfig $encryptionConfig)
  {
    $this->encryptionConfig = $encryptionConfig;
  }
  /**
   * @return EncryptionConfig
   */
  public function getEncryptionConfig()
  {
    return $this->encryptionConfig;
  }
  /**
   * @param string[]
   */
  public function setExtraStatements($extraStatements)
  {
    $this->extraStatements = $extraStatements;
  }
  /**
   * @return string[]
   */
  public function getExtraStatements()
  {
    return $this->extraStatements;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateDatabaseRequest::class, 'Google_Service_Spanner_CreateDatabaseRequest');
