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

class PostgresqlSchema extends \Google\Collection
{
  protected $collection_key = 'postgresqlTables';
  protected $postgresqlTablesType = PostgresqlTable::class;
  protected $postgresqlTablesDataType = 'array';
  /**
   * @var string
   */
  public $schema;

  /**
   * @param PostgresqlTable[]
   */
  public function setPostgresqlTables($postgresqlTables)
  {
    $this->postgresqlTables = $postgresqlTables;
  }
  /**
   * @return PostgresqlTable[]
   */
  public function getPostgresqlTables()
  {
    return $this->postgresqlTables;
  }
  /**
   * @param string
   */
  public function setSchema($schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return string
   */
  public function getSchema()
  {
    return $this->schema;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PostgresqlSchema::class, 'Google_Service_Datastream_PostgresqlSchema');
