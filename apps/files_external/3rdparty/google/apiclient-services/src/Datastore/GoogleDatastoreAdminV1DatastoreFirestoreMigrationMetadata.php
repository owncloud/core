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

namespace Google\Service\Datastore;

class GoogleDatastoreAdminV1DatastoreFirestoreMigrationMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $migrationState;
  /**
   * @var string
   */
  public $migrationStep;

  /**
   * @param string
   */
  public function setMigrationState($migrationState)
  {
    $this->migrationState = $migrationState;
  }
  /**
   * @return string
   */
  public function getMigrationState()
  {
    return $this->migrationState;
  }
  /**
   * @param string
   */
  public function setMigrationStep($migrationStep)
  {
    $this->migrationStep = $migrationStep;
  }
  /**
   * @return string
   */
  public function getMigrationStep()
  {
    return $this->migrationStep;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDatastoreAdminV1DatastoreFirestoreMigrationMetadata::class, 'Google_Service_Datastore_GoogleDatastoreAdminV1DatastoreFirestoreMigrationMetadata');
