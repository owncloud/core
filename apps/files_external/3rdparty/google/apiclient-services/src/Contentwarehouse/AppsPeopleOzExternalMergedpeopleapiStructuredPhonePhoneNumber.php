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

class AppsPeopleOzExternalMergedpeopleapiStructuredPhonePhoneNumber extends \Google\Model
{
  /**
   * @var string
   */
  public $e164;
  protected $i18nDataType = AppsPeopleOzExternalMergedpeopleapiStructuredPhonePhoneNumberI18nData::class;
  protected $i18nDataDataType = '';

  /**
   * @param string
   */
  public function setE164($e164)
  {
    $this->e164 = $e164;
  }
  /**
   * @return string
   */
  public function getE164()
  {
    return $this->e164;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiStructuredPhonePhoneNumberI18nData
   */
  public function setI18nData(AppsPeopleOzExternalMergedpeopleapiStructuredPhonePhoneNumberI18nData $i18nData)
  {
    $this->i18nData = $i18nData;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiStructuredPhonePhoneNumberI18nData
   */
  public function getI18nData()
  {
    return $this->i18nData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiStructuredPhonePhoneNumber::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiStructuredPhonePhoneNumber');
