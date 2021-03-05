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

class Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchProcessRequest extends Google_Collection
{
  protected $collection_key = 'inputConfigs';
  protected $documentOutputConfigType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentOutputConfig';
  protected $documentOutputConfigDataType = '';
  protected $inputConfigsType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchProcessRequestBatchInputConfig';
  protected $inputConfigsDataType = 'array';
  protected $inputDocumentsType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchDocumentsInputConfig';
  protected $inputDocumentsDataType = '';
  protected $outputConfigType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchProcessRequestBatchOutputConfig';
  protected $outputConfigDataType = '';
  public $skipHumanReview;

  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentOutputConfig
   */
  public function setDocumentOutputConfig(Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentOutputConfig $documentOutputConfig)
  {
    $this->documentOutputConfig = $documentOutputConfig;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentOutputConfig
   */
  public function getDocumentOutputConfig()
  {
    return $this->documentOutputConfig;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchProcessRequestBatchInputConfig[]
   */
  public function setInputConfigs($inputConfigs)
  {
    $this->inputConfigs = $inputConfigs;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchProcessRequestBatchInputConfig[]
   */
  public function getInputConfigs()
  {
    return $this->inputConfigs;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchDocumentsInputConfig
   */
  public function setInputDocuments(Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchDocumentsInputConfig $inputDocuments)
  {
    $this->inputDocuments = $inputDocuments;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchDocumentsInputConfig
   */
  public function getInputDocuments()
  {
    return $this->inputDocuments;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchProcessRequestBatchOutputConfig
   */
  public function setOutputConfig(Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchProcessRequestBatchOutputConfig $outputConfig)
  {
    $this->outputConfig = $outputConfig;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3BatchProcessRequestBatchOutputConfig
   */
  public function getOutputConfig()
  {
    return $this->outputConfig;
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
