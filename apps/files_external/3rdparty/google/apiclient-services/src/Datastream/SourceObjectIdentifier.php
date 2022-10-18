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

namespace Google\Service\Datastream;

class SourceObjectIdentifier extends \Google\Model
{
  protected $mysqlIdentifierType = MysqlObjectIdentifier::class;
  protected $mysqlIdentifierDataType = '';
  protected $oracleIdentifierType = OracleObjectIdentifier::class;
  protected $oracleIdentifierDataType = '';
  protected $postgresqlIdentifierType = PostgresqlObjectIdentifier::class;
  protected $postgresqlIdentifierDataType = '';

  /**
   * @param MysqlObjectIdentifier
   */
  public function setMysqlIdentifier(MysqlObjectIdentifier $mysqlIdentifier)
  {
    $this->mysqlIdentifier = $mysqlIdentifier;
  }
  /**
   * @return MysqlObjectIdentifier
   */
  public function getMysqlIdentifier()
  {
    return $this->mysqlIdentifier;
  }
  /**
   * @param OracleObjectIdentifier
   */
  public function setOracleIdentifier(OracleObjectIdentifier $oracleIdentifier)
  {
    $this->oracleIdentifier = $oracleIdentifier;
  }
  /**
   * @return OracleObjectIdentifier
   */
  public function getOracleIdentifier()
  {
    return $this->oracleIdentifier;
  }
  /**
   * @param PostgresqlObjectIdentifier
   */
  public function setPostgresqlIdentifier(PostgresqlObjectIdentifier $postgresqlIdentifier)
  {
    $this->postgresqlIdentifier = $postgresqlIdentifier;
  }
  /**
   * @return PostgresqlObjectIdentifier
   */
  public function getPostgresqlIdentifier()
  {
    return $this->postgresqlIdentifier;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SourceObjectIdentifier::class, 'Google_Service_Datastream_SourceObjectIdentifier');
