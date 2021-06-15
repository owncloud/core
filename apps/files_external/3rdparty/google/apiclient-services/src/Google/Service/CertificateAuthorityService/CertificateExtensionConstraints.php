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

class Google_Service_CertificateAuthorityService_CertificateExtensionConstraints extends Google_Collection
{
  protected $collection_key = 'knownExtensions';
  protected $additionalExtensionsType = 'Google_Service_CertificateAuthorityService_ObjectId';
  protected $additionalExtensionsDataType = 'array';
  public $knownExtensions;

  /**
   * @param Google_Service_CertificateAuthorityService_ObjectId[]
   */
  public function setAdditionalExtensions($additionalExtensions)
  {
    $this->additionalExtensions = $additionalExtensions;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_ObjectId[]
   */
  public function getAdditionalExtensions()
  {
    return $this->additionalExtensions;
  }
  public function setKnownExtensions($knownExtensions)
  {
    $this->knownExtensions = $knownExtensions;
  }
  public function getKnownExtensions()
  {
    return $this->knownExtensions;
  }
}
