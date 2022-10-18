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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaListCertificatesResponse extends \Google\Collection
{
  protected $collection_key = 'certificates';
  protected $certificatesType = GoogleCloudIntegrationsV1alphaCertificate::class;
  protected $certificatesDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;

  /**
   * @param GoogleCloudIntegrationsV1alphaCertificate[]
   */
  public function setCertificates($certificates)
  {
    $this->certificates = $certificates;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaCertificate[]
   */
  public function getCertificates()
  {
    return $this->certificates;
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
class_alias(GoogleCloudIntegrationsV1alphaListCertificatesResponse::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaListCertificatesResponse');
