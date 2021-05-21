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

class Google_Service_Document_GoogleCloudDocumentaiV1BatchProcessRequest extends Google_Model
{
  protected $documentOutputConfigType = 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentOutputConfig';
  protected $documentOutputConfigDataType = '';
  protected $inputDocumentsType = 'Google_Service_Document_GoogleCloudDocumentaiV1BatchDocumentsInputConfig';
  protected $inputDocumentsDataType = '';
  public $skipHumanReview;

  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1DocumentOutputConfig
   */
  public function setDocumentOutputConfig(Google_Service_Document_GoogleCloudDocumentaiV1DocumentOutputConfig $documentOutputConfig)
  {
    $this->documentOutputConfig = $documentOutputConfig;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1DocumentOutputConfig
   */
  public function getDocumentOutputConfig()
  {
    return $this->documentOutputConfig;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1BatchDocumentsInputConfig
   */
  public function setInputDocuments(Google_Service_Document_GoogleCloudDocumentaiV1BatchDocumentsInputConfig $inputDocuments)
  {
    $this->inputDocuments = $inputDocuments;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1BatchDocumentsInputConfig
   */
  public function getInputDocuments()
  {
    return $this->inputDocuments;
  }
  public function setSkipHumanReview($skipHumanReview)
  {
    $this->skipHumanReview = $skipHumanReview;
  }
  public function getSkipHumanReview()
  {
    return $this->skipHumanReview;
  }
}
