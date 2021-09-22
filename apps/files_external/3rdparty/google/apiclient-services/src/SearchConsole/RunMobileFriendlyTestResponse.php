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

namespace Google\Service\SearchConsole;

class RunMobileFriendlyTestResponse extends \Google\Collection
{
  protected $collection_key = 'resourceIssues';
  public $mobileFriendliness;
  protected $mobileFriendlyIssuesType = MobileFriendlyIssue::class;
  protected $mobileFriendlyIssuesDataType = 'array';
  protected $resourceIssuesType = ResourceIssue::class;
  protected $resourceIssuesDataType = 'array';
  protected $screenshotType = Image::class;
  protected $screenshotDataType = '';
  protected $testStatusType = TestStatus::class;
  protected $testStatusDataType = '';

  public function setMobileFriendliness($mobileFriendliness)
  {
    $this->mobileFriendliness = $mobileFriendliness;
  }
  public function getMobileFriendliness()
  {
    return $this->mobileFriendliness;
  }
  /**
   * @param MobileFriendlyIssue[]
   */
  public function setMobileFriendlyIssues($mobileFriendlyIssues)
  {
    $this->mobileFriendlyIssues = $mobileFriendlyIssues;
  }
  /**
   * @return MobileFriendlyIssue[]
   */
  public function getMobileFriendlyIssues()
  {
    return $this->mobileFriendlyIssues;
  }
  /**
   * @param ResourceIssue[]
   */
  public function setResourceIssues($resourceIssues)
  {
    $this->resourceIssues = $resourceIssues;
  }
  /**
   * @return ResourceIssue[]
   */
  public function getResourceIssues()
  {
    return $this->resourceIssues;
  }
  /**
   * @param Image
   */
  public function setScreenshot(Image $screenshot)
  {
    $this->screenshot = $screenshot;
  }
  /**
   * @return Image
   */
  public function getScreenshot()
  {
    return $this->screenshot;
  }
  /**
   * @param TestStatus
   */
  public function setTestStatus(TestStatus $testStatus)
  {
    $this->testStatus = $testStatus;
  }
  /**
   * @return TestStatus
   */
  public function getTestStatus()
  {
    return $this->testStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RunMobileFriendlyTestResponse::class, 'Google_Service_SearchConsole_RunMobileFriendlyTestResponse');
