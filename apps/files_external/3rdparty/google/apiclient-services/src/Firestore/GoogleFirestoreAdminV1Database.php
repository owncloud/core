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

class GoogleFirestoreAdminV1Database extends \Google\Model
{
  /**
   * @var string
   */
  public $appEngineIntegrationMode;
  /**
   * @var string
   */
  public $concurrencyMode;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $keyPrefix;
  /**
   * @var string
   */
  public $locationId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setAppEngineIntegrationMode($appEngineIntegrationMode)
  {
    $this->appEngineIntegrationMode = $appEngineIntegrationMode;
  }
  /**
   * @return string
   */
  public function getAppEngineIntegrationMode()
  {
    return $this->appEngineIntegrationMode;
  }
  /**
   * @param string
   */
  public function setConcurrencyMode($concurrencyMode)
  {
    $this->concurrencyMode = $concurrencyMode;
  }
  /**
   * @return string
   */
  public function getConcurrencyMode()
  {
    return $this->concurrencyMode;
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
  public function setKeyPrefix($keyPrefix)
  {
    $this->keyPrefix = $keyPrefix;
  }
  /**
   * @return string
   */
  public function getKeyPrefix()
  {
    return $this->keyPrefix;
  }
  /**
   * @param string
   */
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  /**
   * @return string
   */
  public function getLocationId()
  {
    return $this->locationId;
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
class_alias(GoogleFirestoreAdminV1Database::class, 'Google_Service_Firestore_GoogleFirestoreAdminV1Database');
