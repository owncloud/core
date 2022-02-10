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
  /**
   * @var string
   */
  public $addOnType;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $helpUrl;
  /**
   * @var string
   */
  public $postInstallTipUrl;
  /**
   * @var string
   */
  public $reportIssueUrl;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setAddOnType($addOnType)
  {
    $this->addOnType = $addOnType;
  }
  /**
   * @return string
   */
  public function getAddOnType()
  {
    return $this->addOnType;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setHelpUrl($helpUrl)
  {
    $this->helpUrl = $helpUrl;
  }
  /**
   * @return string
   */
  public function getHelpUrl()
  {
    return $this->helpUrl;
  }
  /**
   * @param string
   */
  public function setPostInstallTipUrl($postInstallTipUrl)
  {
    $this->postInstallTipUrl = $postInstallTipUrl;
  }
  /**
   * @return string
   */
  public function getPostInstallTipUrl()
  {
    return $this->postInstallTipUrl;
  }
  /**
   * @param string
   */
  public function setReportIssueUrl($reportIssueUrl)
  {
    $this->reportIssueUrl = $reportIssueUrl;
  }
  /**
   * @return string
   */
  public function getReportIssueUrl()
  {
    return $this->reportIssueUrl;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsScriptTypeAddOnEntryPoint::class, 'Google_Service_Script_GoogleAppsScriptTypeAddOnEntryPoint');
