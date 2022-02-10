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

namespace Google\Service\CloudHealthcare;

class ListHl7V2StoresResponse extends \Google\Collection
{
  protected $collection_key = 'hl7V2Stores';
  protected $hl7V2StoresType = Hl7V2Store::class;
  protected $hl7V2StoresDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;

  /**
   * @param Hl7V2Store[]
   */
  public function setHl7V2Stores($hl7V2Stores)
  {
    $this->hl7V2Stores = $hl7V2Stores;
  }
  /**
   * @return Hl7V2Store[]
   */
  public function getHl7V2Stores()
  {
    return $this->hl7V2Stores;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListHl7V2StoresResponse::class, 'Google_Service_CloudHealthcare_ListHl7V2StoresResponse');
