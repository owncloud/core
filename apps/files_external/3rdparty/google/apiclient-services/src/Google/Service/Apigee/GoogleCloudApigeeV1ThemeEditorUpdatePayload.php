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

class Google_Service_Apigee_GoogleCloudApigeeV1ThemeEditorUpdatePayload extends Google_Model
{
  public $customScss;
  public $editorMode;
  public $favicon;
  public $kind;
  public $logo;
  public $mobileLogo;
  public $overrides;
  public $variables;

  public function setCustomScss($customScss)
  {
    $this->customScss = $customScss;
  }
  public function getCustomScss()
  {
    return $this->customScss;
  }
  public function setEditorMode($editorMode)
  {
    $this->editorMode = $editorMode;
  }
  public function getEditorMode()
  {
    return $this->editorMode;
  }
  public function setFavicon($favicon)
  {
    $this->favicon = $favicon;
  }
  public function getFavicon()
  {
    return $this->favicon;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLogo($logo)
  {
    $this->logo = $logo;
  }
  public function getLogo()
  {
    return $this->logo;
  }
  public function setMobileLogo($mobileLogo)
  {
    $this->mobileLogo = $mobileLogo;
  }
  public function getMobileLogo()
  {
    return $this->mobileLogo;
  }
  public function setOverrides($overrides)
  {
    $this->overrides = $overrides;
  }
  public function getOverrides()
  {
    return $this->overrides;
  }
  public function setVariables($variables)
  {
    $this->variables = $variables;
  }
  public function getVariables()
  {
    return $this->variables;
  }
}
