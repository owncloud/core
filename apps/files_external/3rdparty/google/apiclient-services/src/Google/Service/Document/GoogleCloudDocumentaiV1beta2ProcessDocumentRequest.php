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

class Google_Service_Document_GoogleCloudDocumentaiV1beta2ProcessDocumentRequest extends Google_Model
{
  protected $automlParamsType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2AutoMlParams';
  protected $automlParamsDataType = '';
  public $documentType;
  protected $entityExtractionParamsType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2EntityExtractionParams';
  protected $entityExtractionParamsDataType = '';
  protected $formExtractionParamsType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2FormExtractionParams';
  protected $formExtractionParamsDataType = '';
  protected $inputConfigType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2InputConfig';
  protected $inputConfigDataType = '';
  protected $ocrParamsType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2OcrParams';
  protected $ocrParamsDataType = '';
  protected $outputConfigType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2OutputConfig';
  protected $outputConfigDataType = '';
  public $parent;
  protected $tableExtractionParamsType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2TableExtractionParams';
  protected $tableExtractionParamsDataType = '';

  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2AutoMlParams
   */
  public function setAutomlParams(Google_Service_Document_GoogleCloudDocumentaiV1beta2AutoMlParams $automlParams)
  {
    $this->automlParams = $automlParams;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2AutoMlParams
   */
  public function getAutomlParams()
  {
    return $this->automlParams;
  }
  public function setDocumentType($documentType)
  {
    $this->documentType = $documentType;
  }
  public function getDocumentType()
  {
    return $this->documentType;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2EntityExtractionParams
   */
  public function setEntityExtractionParams(Google_Service_Document_GoogleCloudDocumentaiV1beta2EntityExtractionParams $entityExtractionParams)
  {
    $this->entityExtractionParams = $entityExtractionParams;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2EntityExtractionParams
   */
  public function getEntityExtractionParams()
  {
    return $this->entityExtractionParams;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2FormExtractionParams
   */
  public function setFormExtractionParams(Google_Service_Document_GoogleCloudDocumentaiV1beta2FormExtractionParams $formExtractionParams)
  {
    $this->formExtractionParams = $formExtractionParams;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2FormExtractionParams
   */
  public function getFormExtractionParams()
  {
    return $this->formExtractionParams;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2InputConfig
   */
  public function setInputConfig(Google_Service_Document_GoogleCloudDocumentaiV1beta2InputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2InputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2OcrParams
   */
  public function setOcrParams(Google_Service_Document_GoogleCloudDocumentaiV1beta2OcrParams $ocrParams)
  {
    $this->ocrParams = $ocrParams;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2OcrParams
   */
  public function getOcrParams()
  {
    return $this->ocrParams;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2OutputConfig
   */
  public function setOutputConfig(Google_Service_Document_GoogleCloudDocumentaiV1beta2OutputConfig $outputConfig)
  {
    $this->outputConfig = $outputConfig;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2OutputConfig
   */
  public function getOutputConfig()
  {
    return $this->outputConfig;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2TableExtractionParams
   */
  public function setTableExtractionParams(Google_Service_Document_GoogleCloudDocumentaiV1beta2TableExtractionParams $tableExtractionParams)
  {
    $this->tableExtractionParams = $tableExtractionParams;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2TableExtractionParams
   */
  public function getTableExtractionParams()
  {
    return $this->tableExtractionParams;
  }
}
