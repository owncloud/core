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

namespace Google\Service\AndroidManagement;

class OncCertificateProvider extends \Google\Collection
{
  protected $collection_key = 'certificateReferences';
  public $certificateReferences;
  protected $contentProviderEndpointType = ContentProviderEndpoint::class;
  protected $contentProviderEndpointDataType = '';

  public function setCertificateReferences($certificateReferences)
  {
    $this->certificateReferences = $certificateReferences;
  }
  public function getCertificateReferences()
  {
    return $this->certificateReferences;
  }
  /**
   * @param ContentProviderEndpoint
   */
  public function setContentProviderEndpoint(ContentProviderEndpoint $contentProviderEndpoint)
  {
    $this->contentProviderEndpoint = $contentProviderEndpoint;
  }
  /**
   * @return ContentProviderEndpoint
   */
  public function getContentProviderEndpoint()
  {
    return $this->contentProviderEndpoint;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OncCertificateProvider::class, 'Google_Service_AndroidManagement_OncCertificateProvider');
