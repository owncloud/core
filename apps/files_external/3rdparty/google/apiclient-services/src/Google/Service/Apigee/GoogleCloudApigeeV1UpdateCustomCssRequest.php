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

class Google_Service_Apigee_GoogleCloudApigeeV1UpdateCustomCssRequest extends Google_Model
{
  protected $cssEditorPayloadType = 'Google_Service_Apigee_GoogleCloudApigeeV1CssEditorUpdatePayload';
  protected $cssEditorPayloadDataType = '';
  protected $themeEditorPayloadType = 'Google_Service_Apigee_GoogleCloudApigeeV1ThemeEditorUpdatePayload';
  protected $themeEditorPayloadDataType = '';

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CssEditorUpdatePayload
   */
  public function setCssEditorPayload(Google_Service_Apigee_GoogleCloudApigeeV1CssEditorUpdatePayload $cssEditorPayload)
  {
    $this->cssEditorPayload = $cssEditorPayload;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CssEditorUpdatePayload
   */
  public function getCssEditorPayload()
  {
    return $this->cssEditorPayload;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ThemeEditorUpdatePayload
   */
  public function setThemeEditorPayload(Google_Service_Apigee_GoogleCloudApigeeV1ThemeEditorUpdatePayload $themeEditorPayload)
  {
    $this->themeEditorPayload = $themeEditorPayload;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ThemeEditorUpdatePayload
   */
  public function getThemeEditorPayload()
  {
    return $this->themeEditorPayload;
  }
}
