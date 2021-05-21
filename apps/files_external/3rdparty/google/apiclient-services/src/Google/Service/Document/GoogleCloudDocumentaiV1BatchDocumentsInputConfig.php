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

class Google_Service_Document_GoogleCloudDocumentaiV1BatchDocumentsInputConfig extends Google_Model
{
  protected $gcsDocumentsType = 'Google_Service_Document_GoogleCloudDocumentaiV1GcsDocuments';
  protected $gcsDocumentsDataType = '';
  protected $gcsPrefixType = 'Google_Service_Document_GoogleCloudDocumentaiV1GcsPrefix';
  protected $gcsPrefixDataType = '';

  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1GcsDocuments
   */
  public function setGcsDocuments(Google_Service_Document_GoogleCloudDocumentaiV1GcsDocuments $gcsDocuments)
  {
    $this->gcsDocuments = $gcsDocuments;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1GcsDocuments
   */
  public function getGcsDocuments()
  {
    return $this->gcsDocuments;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1GcsPrefix
   */
  public function setGcsPrefix(Google_Service_Document_GoogleCloudDocumentaiV1GcsPrefix $gcsPrefix)
  {
    $this->gcsPrefix = $gcsPrefix;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1GcsPrefix
   */
  public function getGcsPrefix()
  {
    return $this->gcsPrefix;
  }
}
