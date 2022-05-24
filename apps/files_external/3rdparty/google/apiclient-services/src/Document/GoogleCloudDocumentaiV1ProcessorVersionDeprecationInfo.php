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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1ProcessorVersionDeprecationInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $deprecationTime;
  /**
   * @var string
   */
  public $replacementProcessorVersion;

  /**
   * @param string
   */
  public function setDeprecationTime($deprecationTime)
  {
    $this->deprecationTime = $deprecationTime;
  }
  /**
   * @return string
   */
  public function getDeprecationTime()
  {
    return $this->deprecationTime;
  }
  /**
   * @param string
   */
  public function setReplacementProcessorVersion($replacementProcessorVersion)
  {
    $this->replacementProcessorVersion = $replacementProcessorVersion;
  }
  /**
   * @return string
   */
  public function getReplacementProcessorVersion()
  {
    return $this->replacementProcessorVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1ProcessorVersionDeprecationInfo::class, 'Google_Service_Document_GoogleCloudDocumentaiV1ProcessorVersionDeprecationInfo');
