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

class GoogleCloudDialogflowCxV3beta1PageInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $currentPage;
  /**
   * @var string
   */
  public $displayName;
  protected $formInfoType = GoogleCloudDialogflowCxV3beta1PageInfoFormInfo::class;
  protected $formInfoDataType = '';

  /**
   * @param string
   */
  public function setCurrentPage($currentPage)
  {
    $this->currentPage = $currentPage;
  }
  /**
   * @return string
   */
  public function getCurrentPage()
  {
    return $this->currentPage;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GoogleCloudDialogflowCxV3beta1PageInfoFormInfo
   */
  public function setFormInfo(GoogleCloudDialogflowCxV3beta1PageInfoFormInfo $formInfo)
  {
    $this->formInfo = $formInfo;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1PageInfoFormInfo
   */
  public function getFormInfo()
  {
    return $this->formInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1PageInfo::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1PageInfo');
