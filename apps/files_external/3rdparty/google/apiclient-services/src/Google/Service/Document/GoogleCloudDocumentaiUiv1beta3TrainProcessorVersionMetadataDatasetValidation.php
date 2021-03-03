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

class Google_Service_Document_GoogleCloudDocumentaiUiv1beta3TrainProcessorVersionMetadataDatasetValidation extends Google_Collection
{
  protected $collection_key = 'documentErrors';
  protected $datasetErrorsType = 'Google_Service_Document_GoogleRpcStatus';
  protected $datasetErrorsDataType = 'array';
  protected $documentErrorsType = 'Google_Service_Document_GoogleRpcStatus';
  protected $documentErrorsDataType = 'array';

  /**
   * @param Google_Service_Document_GoogleRpcStatus[]
   */
  public function setDatasetErrors($datasetErrors)
  {
    $this->datasetErrors = $datasetErrors;
  }
  /**
   * @return Google_Service_Document_GoogleRpcStatus[]
   */
  public function getDatasetErrors()
  {
    return $this->datasetErrors;
  }
  /**
   * @param Google_Service_Document_GoogleRpcStatus[]
   */
  public function setDocumentErrors($documentErrors)
  {
    $this->documentErrors = $documentErrors;
  }
  /**
   * @return Google_Service_Document_GoogleRpcStatus[]
   */
  public function getDocumentErrors()
  {
    return $this->documentErrors;
  }
}
