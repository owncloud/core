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

namespace Google\Service\SmartDeviceManagement;

class GoogleHomeEnterpriseSdmV1ListStructuresResponse extends \Google\Collection
{
  protected $collection_key = 'structures';
  public $nextPageToken;
  protected $structuresType = GoogleHomeEnterpriseSdmV1Structure::class;
  protected $structuresDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param GoogleHomeEnterpriseSdmV1Structure[]
   */
  public function setStructures($structures)
  {
    $this->structures = $structures;
  }
  /**
   * @return GoogleHomeEnterpriseSdmV1Structure[]
   */
  public function getStructures()
  {
    return $this->structures;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleHomeEnterpriseSdmV1ListStructuresResponse::class, 'Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1ListStructuresResponse');
