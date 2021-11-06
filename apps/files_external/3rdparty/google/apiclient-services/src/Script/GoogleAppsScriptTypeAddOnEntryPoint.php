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

namespace Google\Service\Script;

class GoogleAppsScriptTypeAddOnEntryPoint extends \Google\Model
{
  public $addOnType;
  public $description;
  public $helpUrl;
  public $postInstallTipUrl;
  public $reportIssueUrl;
  public $title;

  public function setAddOnType($addOnType)
  {
    $this->addOnType = $addOnType;
  }
  public function getAddOnType()
  {
    return $this->addOnType;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setHelpUrl($helpUrl)
  {
    $this->helpUrl = $helpUrl;
  }
  public function getHelpUrl()
  {
    return $this->helpUrl;
  }
  public function setPostInstallTipUrl($postInstallTipUrl)
  {
    $this->postInstallTipUrl = $postInstallTipUrl;
  }
  public function getPostInstallTipUrl()
  {
    return $this->postInstallTipUrl;
  }
  public function setReportIssueUrl($reportIssueUrl)
  {
    $this->reportIssueUrl = $reportIssueUrl;
  }
  public function getReportIssueUrl()
  {
    return $this->reportIssueUrl;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsScriptTypeAddOnEntryPoint::class, 'Google_Service_Script_GoogleAppsScriptTypeAddOnEntryPoint');
