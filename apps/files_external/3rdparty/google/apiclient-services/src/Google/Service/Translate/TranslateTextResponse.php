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

class Google_Service_Translate_TranslateTextResponse extends Google_Collection
{
  protected $collection_key = 'translations';
  protected $glossaryTranslationsType = 'Google_Service_Translate_Translation';
  protected $glossaryTranslationsDataType = 'array';
  protected $translationsType = 'Google_Service_Translate_Translation';
  protected $translationsDataType = 'array';

  /**
   * @param Google_Service_Translate_Translation
   */
  public function setGlossaryTranslations($glossaryTranslations)
  {
    $this->glossaryTranslations = $glossaryTranslations;
  }
  /**
   * @return Google_Service_Translate_Translation
   */
  public function getGlossaryTranslations()
  {
    return $this->glossaryTranslations;
  }
  /**
   * @param Google_Service_Translate_Translation
   */
  public function setTranslations($translations)
  {
    $this->translations = $translations;
  }
  /**
   * @return Google_Service_Translate_Translation
   */
  public function getTranslations()
  {
    return $this->translations;
  }
}
