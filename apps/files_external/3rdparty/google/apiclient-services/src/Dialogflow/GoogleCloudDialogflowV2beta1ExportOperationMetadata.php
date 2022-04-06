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

class GoogleCloudDialogflowV2beta1ExportOperationMetadata extends \Google\Model
{
  protected $exportedGcsDestinationType = GoogleCloudDialogflowV2beta1GcsDestination::class;
  protected $exportedGcsDestinationDataType = '';

  /**
   * @param GoogleCloudDialogflowV2beta1GcsDestination
   */
  public function setExportedGcsDestination(GoogleCloudDialogflowV2beta1GcsDestination $exportedGcsDestination)
  {
    $this->exportedGcsDestination = $exportedGcsDestination;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1GcsDestination
   */
  public function getExportedGcsDestination()
  {
    return $this->exportedGcsDestination;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1ExportOperationMetadata::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1ExportOperationMetadata');
