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

namespace Google\Service\Contentwarehouse;

class StorageGraphBfgSpiiCertification extends \Google\Model
{
  protected $authorityFeedbackType = StorageGraphBfgAuthorityFeedbackMetadata::class;
  protected $authorityFeedbackDataType = '';
  protected $legalRequestType = StorageGraphBfgLegalRequestMetadata::class;
  protected $legalRequestDataType = '';
  protected $publicInformationType = StorageGraphBfgPublicInformationMetadata::class;
  protected $publicInformationDataType = '';

  /**
   * @param StorageGraphBfgAuthorityFeedbackMetadata
   */
  public function setAuthorityFeedback(StorageGraphBfgAuthorityFeedbackMetadata $authorityFeedback)
  {
    $this->authorityFeedback = $authorityFeedback;
  }
  /**
   * @return StorageGraphBfgAuthorityFeedbackMetadata
   */
  public function getAuthorityFeedback()
  {
    return $this->authorityFeedback;
  }
  /**
   * @param StorageGraphBfgLegalRequestMetadata
   */
  public function setLegalRequest(StorageGraphBfgLegalRequestMetadata $legalRequest)
  {
    $this->legalRequest = $legalRequest;
  }
  /**
   * @return StorageGraphBfgLegalRequestMetadata
   */
  public function getLegalRequest()
  {
    return $this->legalRequest;
  }
  /**
   * @param StorageGraphBfgPublicInformationMetadata
   */
  public function setPublicInformation(StorageGraphBfgPublicInformationMetadata $publicInformation)
  {
    $this->publicInformation = $publicInformation;
  }
  /**
   * @return StorageGraphBfgPublicInformationMetadata
   */
  public function getPublicInformation()
  {
    return $this->publicInformation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StorageGraphBfgSpiiCertification::class, 'Google_Service_Contentwarehouse_StorageGraphBfgSpiiCertification');
