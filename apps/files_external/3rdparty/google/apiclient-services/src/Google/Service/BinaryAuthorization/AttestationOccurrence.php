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

class Google_Service_BinaryAuthorization_AttestationOccurrence extends Google_Collection
{
  protected $collection_key = 'signatures';
  protected $jwtsType = 'Google_Service_BinaryAuthorization_Jwt';
  protected $jwtsDataType = 'array';
  public $serializedPayload;
  protected $signaturesType = 'Google_Service_BinaryAuthorization_Signature';
  protected $signaturesDataType = 'array';

  /**
   * @param Google_Service_BinaryAuthorization_Jwt[]
   */
  public function setJwts($jwts)
  {
    $this->jwts = $jwts;
  }
  /**
   * @return Google_Service_BinaryAuthorization_Jwt[]
   */
  public function getJwts()
  {
    return $this->jwts;
  }
  public function setSerializedPayload($serializedPayload)
  {
    $this->serializedPayload = $serializedPayload;
  }
  public function getSerializedPayload()
  {
    return $this->serializedPayload;
  }
  /**
   * @param Google_Service_BinaryAuthorization_Signature[]
   */
  public function setSignatures($signatures)
  {
    $this->signatures = $signatures;
  }
  /**
   * @return Google_Service_BinaryAuthorization_Signature[]
   */
  public function getSignatures()
  {
    return $this->signatures;
  }
}
