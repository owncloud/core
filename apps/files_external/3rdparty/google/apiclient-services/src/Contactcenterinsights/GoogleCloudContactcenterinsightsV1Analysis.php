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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1Analysis extends \Google\Model
{
  protected $analysisResultType = GoogleCloudContactcenterinsightsV1AnalysisResult::class;
  protected $analysisResultDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $requestTime;

  /**
   * @param GoogleCloudContactcenterinsightsV1AnalysisResult
   */
  public function setAnalysisResult(GoogleCloudContactcenterinsightsV1AnalysisResult $analysisResult)
  {
    $this->analysisResult = $analysisResult;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1AnalysisResult
   */
  public function getAnalysisResult()
  {
    return $this->analysisResult;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setRequestTime($requestTime)
  {
    $this->requestTime = $requestTime;
  }
  /**
   * @return string
   */
  public function getRequestTime()
  {
    return $this->requestTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1Analysis::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1Analysis');
