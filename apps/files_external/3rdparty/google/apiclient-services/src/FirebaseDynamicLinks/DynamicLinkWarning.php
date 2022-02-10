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

namespace Google\Service\FirebaseDynamicLinks;

class DynamicLinkWarning extends \Google\Model
{
  /**
   * @var string
   */
  public $warningCode;
  /**
   * @var string
   */
  public $warningDocumentLink;
  /**
   * @var string
   */
  public $warningMessage;

  /**
   * @param string
   */
  public function setWarningCode($warningCode)
  {
    $this->warningCode = $warningCode;
  }
  /**
   * @return string
   */
  public function getWarningCode()
  {
    return $this->warningCode;
  }
  /**
   * @param string
   */
  public function setWarningDocumentLink($warningDocumentLink)
  {
    $this->warningDocumentLink = $warningDocumentLink;
  }
  /**
   * @return string
   */
  public function getWarningDocumentLink()
  {
    return $this->warningDocumentLink;
  }
  /**
   * @param string
   */
  public function setWarningMessage($warningMessage)
  {
    $this->warningMessage = $warningMessage;
  }
  /**
   * @return string
   */
  public function getWarningMessage()
  {
    return $this->warningMessage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DynamicLinkWarning::class, 'Google_Service_FirebaseDynamicLinks_DynamicLinkWarning');
