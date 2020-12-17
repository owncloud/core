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

class Google_Service_Dns_ManagedZoneOperationsListResponse extends Google_Collection
{
  protected $collection_key = 'operations';
  protected $headerType = 'Google_Service_Dns_ResponseHeader';
  protected $headerDataType = '';
  public $kind;
  public $nextPageToken;
  protected $operationsType = 'Google_Service_Dns_Operation';
  protected $operationsDataType = 'array';

  /**
   * @param Google_Service_Dns_ResponseHeader
   */
  public function setHeader(Google_Service_Dns_ResponseHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return Google_Service_Dns_ResponseHeader
   */
  public function getHeader()
  {
    return $this->header;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param Google_Service_Dns_Operation[]
   */
  public function setOperations($operations)
  {
    $this->operations = $operations;
  }
  /**
   * @return Google_Service_Dns_Operation[]
   */
  public function getOperations()
  {
    return $this->operations;
  }
}
