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

class Google_Service_Document_GoogleCloudDocumentaiUiv1beta3TrainProcessorVersionMetadata extends Google_Model
{
  protected $commonMetadataType = 'Google_Service_Document_GoogleCloudDocumentaiUiv1beta3CommonOperationMetadata';
  protected $commonMetadataDataType = '';
  protected $testDatasetValidationType = 'Google_Service_Document_GoogleCloudDocumentaiUiv1beta3TrainProcessorVersionMetadataDatasetValidation';
  protected $testDatasetValidationDataType = '';
  protected $trainingDatasetValidationType = 'Google_Service_Document_GoogleCloudDocumentaiUiv1beta3TrainProcessorVersionMetadataDatasetValidation';
  protected $trainingDatasetValidationDataType = '';

  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiUiv1beta3CommonOperationMetadata
   */
  public function setCommonMetadata(Google_Service_Document_GoogleCloudDocumentaiUiv1beta3CommonOperationMetadata $commonMetadata)
  {
    $this->commonMetadata = $commonMetadata;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiUiv1beta3CommonOperationMetadata
   */
  public function getCommonMetadata()
  {
    return $this->commonMetadata;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiUiv1beta3TrainProcessorVersionMetadataDatasetValidation
   */
  public function setTestDatasetValidation(Google_Service_Document_GoogleCloudDocumentaiUiv1beta3TrainProcessorVersionMetadataDatasetValidation $testDatasetValidation)
  {
    $this->testDatasetValidation = $testDatasetValidation;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiUiv1beta3TrainProcessorVersionMetadataDatasetValidation
   */
  public function getTestDatasetValidation()
  {
    return $this->testDatasetValidation;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiUiv1beta3TrainProcessorVersionMetadataDatasetValidation
   */
  public function setTrainingDatasetValidation(Google_Service_Document_GoogleCloudDocumentaiUiv1beta3TrainProcessorVersionMetadataDatasetValidation $trainingDatasetValidation)
  {
    $this->trainingDatasetValidation = $trainingDatasetValidation;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiUiv1beta3TrainProcessorVersionMetadataDatasetValidation
   */
  public function getTrainingDatasetValidation()
  {
    return $this->trainingDatasetValidation;
  }
}
