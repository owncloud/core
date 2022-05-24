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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV3alpha1CreateDocumentOperationMetadata extends \Google\Model
{
  protected $genericMetadataType = GoogleCloudDialogflowV3alpha1GenericKnowledgeOperationMetadata::class;
  protected $genericMetadataDataType = '';

  /**
   * @param GoogleCloudDialogflowV3alpha1GenericKnowledgeOperationMetadata
   */
  public function setGenericMetadata(GoogleCloudDialogflowV3alpha1GenericKnowledgeOperationMetadata $genericMetadata)
  {
    $this->genericMetadata = $genericMetadata;
  }
  /**
   * @return GoogleCloudDialogflowV3alpha1GenericKnowledgeOperationMetadata
   */
  public function getGenericMetadata()
  {
    return $this->genericMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV3alpha1CreateDocumentOperationMetadata::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV3alpha1CreateDocumentOperationMetadata');
