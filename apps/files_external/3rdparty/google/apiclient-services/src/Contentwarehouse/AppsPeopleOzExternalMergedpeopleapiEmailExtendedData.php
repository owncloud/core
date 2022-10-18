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

namespace Google\Service\Contentwarehouse;

class AppsPeopleOzExternalMergedpeopleapiEmailExtendedData extends \Google\Model
{
  protected $internalExternalType = PeoplestackFlexorgsProtoInternalExternal::class;
  protected $internalExternalDataType = '';
  /**
   * @var bool
   */
  public $isPlaceholder;
  /**
   * @var bool
   */
  public $smtpServerSupportsTls;
  /**
   * @var bool
   */
  public $usesConfusingCharacters;

  /**
   * @param PeoplestackFlexorgsProtoInternalExternal
   */
  public function setInternalExternal(PeoplestackFlexorgsProtoInternalExternal $internalExternal)
  {
    $this->internalExternal = $internalExternal;
  }
  /**
   * @return PeoplestackFlexorgsProtoInternalExternal
   */
  public function getInternalExternal()
  {
    return $this->internalExternal;
  }
  /**
   * @param bool
   */
  public function setIsPlaceholder($isPlaceholder)
  {
    $this->isPlaceholder = $isPlaceholder;
  }
  /**
   * @return bool
   */
  public function getIsPlaceholder()
  {
    return $this->isPlaceholder;
  }
  /**
   * @param bool
   */
  public function setSmtpServerSupportsTls($smtpServerSupportsTls)
  {
    $this->smtpServerSupportsTls = $smtpServerSupportsTls;
  }
  /**
   * @return bool
   */
  public function getSmtpServerSupportsTls()
  {
    return $this->smtpServerSupportsTls;
  }
  /**
   * @param bool
   */
  public function setUsesConfusingCharacters($usesConfusingCharacters)
  {
    $this->usesConfusingCharacters = $usesConfusingCharacters;
  }
  /**
   * @return bool
   */
  public function getUsesConfusingCharacters()
  {
    return $this->usesConfusingCharacters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiEmailExtendedData::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiEmailExtendedData');
