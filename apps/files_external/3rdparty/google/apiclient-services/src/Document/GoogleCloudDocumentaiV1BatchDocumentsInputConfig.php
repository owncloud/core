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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1BatchDocumentsInputConfig extends \Google\Model
{
  protected $gcsDocumentsType = GoogleCloudDocumentaiV1GcsDocuments::class;
  protected $gcsDocumentsDataType = '';
  protected $gcsPrefixType = GoogleCloudDocumentaiV1GcsPrefix::class;
  protected $gcsPrefixDataType = '';

  /**
   * @param GoogleCloudDocumentaiV1GcsDocuments
   */
  public function setGcsDocuments(GoogleCloudDocumentaiV1GcsDocuments $gcsDocuments)
  {
    $this->gcsDocuments = $gcsDocuments;
  }
  /**
   * @return GoogleCloudDocumentaiV1GcsDocuments
   */
  public function getGcsDocuments()
  {
    return $this->gcsDocuments;
  }
  /**
   * @param GoogleCloudDocumentaiV1GcsPrefix
   */
  public function setGcsPrefix(GoogleCloudDocumentaiV1GcsPrefix $gcsPrefix)
  {
    $this->gcsPrefix = $gcsPrefix;
  }
  /**
   * @return GoogleCloudDocumentaiV1GcsPrefix
   */
  public function getGcsPrefix()
  {
    return $this->gcsPrefix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1BatchDocumentsInputConfig::class, 'Google_Service_Document_GoogleCloudDocumentaiV1BatchDocumentsInputConfig');
