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

namespace Google\Service\Firestore;

class GoogleFirestoreAdminV1Field extends \Google\Model
{
  protected $indexConfigType = GoogleFirestoreAdminV1IndexConfig::class;
  protected $indexConfigDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $ttlConfigType = GoogleFirestoreAdminV1TtlConfig::class;
  protected $ttlConfigDataType = '';

  /**
   * @param GoogleFirestoreAdminV1IndexConfig
   */
  public function setIndexConfig(GoogleFirestoreAdminV1IndexConfig $indexConfig)
  {
    $this->indexConfig = $indexConfig;
  }
  /**
   * @return GoogleFirestoreAdminV1IndexConfig
   */
  public function getIndexConfig()
  {
    return $this->indexConfig;
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
   * @param GoogleFirestoreAdminV1TtlConfig
   */
  public function setTtlConfig(GoogleFirestoreAdminV1TtlConfig $ttlConfig)
  {
    $this->ttlConfig = $ttlConfig;
  }
  /**
   * @return GoogleFirestoreAdminV1TtlConfig
   */
  public function getTtlConfig()
  {
    return $this->ttlConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirestoreAdminV1Field::class, 'Google_Service_Firestore_GoogleFirestoreAdminV1Field');
