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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3PageInfo extends Google_Model
{
  public $currentPage;
  protected $formInfoType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3PageInfoFormInfo';
  protected $formInfoDataType = '';

  public function setCurrentPage($currentPage)
  {
    $this->currentPage = $currentPage;
  }
  public function getCurrentPage()
  {
    return $this->currentPage;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3PageInfoFormInfo
   */
  public function setFormInfo(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3PageInfoFormInfo $formInfo)
  {
    $this->formInfo = $formInfo;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3PageInfoFormInfo
   */
  public function getFormInfo()
  {
    return $this->formInfo;
  }
}
