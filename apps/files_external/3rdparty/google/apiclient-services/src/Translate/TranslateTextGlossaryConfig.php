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

namespace Google\Service\Translate;

class TranslateTextGlossaryConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $glossary;
  /**
   * @var bool
   */
  public $ignoreCase;

  /**
   * @param string
   */
  public function setGlossary($glossary)
  {
    $this->glossary = $glossary;
  }
  /**
   * @return string
   */
  public function getGlossary()
  {
    return $this->glossary;
  }
  /**
   * @param bool
   */
  public function setIgnoreCase($ignoreCase)
  {
    $this->ignoreCase = $ignoreCase;
  }
  /**
   * @return bool
   */
  public function getIgnoreCase()
  {
    return $this->ignoreCase;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TranslateTextGlossaryConfig::class, 'Google_Service_Translate_TranslateTextGlossaryConfig');
