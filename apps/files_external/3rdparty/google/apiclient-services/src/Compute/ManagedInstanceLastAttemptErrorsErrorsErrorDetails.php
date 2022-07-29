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

namespace Google\Service\Compute;

class ManagedInstanceLastAttemptErrorsErrorsErrorDetails extends \Google\Model
{
  protected $errorInfoType = ErrorInfo::class;
  protected $errorInfoDataType = '';
  protected $helpType = Help::class;
  protected $helpDataType = '';
  protected $localizedMessageType = LocalizedMessage::class;
  protected $localizedMessageDataType = '';

  /**
   * @param ErrorInfo
   */
  public function setErrorInfo(ErrorInfo $errorInfo)
  {
    $this->errorInfo = $errorInfo;
  }
  /**
   * @return ErrorInfo
   */
  public function getErrorInfo()
  {
    return $this->errorInfo;
  }
  /**
   * @param Help
   */
  public function setHelp(Help $help)
  {
    $this->help = $help;
  }
  /**
   * @return Help
   */
  public function getHelp()
  {
    return $this->help;
  }
  /**
   * @param LocalizedMessage
   */
  public function setLocalizedMessage(LocalizedMessage $localizedMessage)
  {
    $this->localizedMessage = $localizedMessage;
  }
  /**
   * @return LocalizedMessage
   */
  public function getLocalizedMessage()
  {
    return $this->localizedMessage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedInstanceLastAttemptErrorsErrorsErrorDetails::class, 'Google_Service_Compute_ManagedInstanceLastAttemptErrorsErrorsErrorDetails');
