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

class Google_Service_CertificateAuthorityService_ListCertificateRevocationListsResponse extends Google_Collection
{
  protected $collection_key = 'unreachable';
  protected $certificateRevocationListsType = 'Google_Service_CertificateAuthorityService_CertificateRevocationList';
  protected $certificateRevocationListsDataType = 'array';
  public $nextPageToken;
  public $unreachable;

  /**
   * @param Google_Service_CertificateAuthorityService_CertificateRevocationList[]
   */
  public function setCertificateRevocationLists($certificateRevocationLists)
  {
    $this->certificateRevocationLists = $certificateRevocationLists;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_CertificateRevocationList[]
   */
  public function getCertificateRevocationLists()
  {
    return $this->certificateRevocationLists;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setUnreachable($unreachable)
  {
    $this->unreachable = $unreachable;
  }
  public function getUnreachable()
  {
    return $this->unreachable;
  }
}
