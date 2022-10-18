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

class GlossaryTermsPair extends \Google\Model
{
  protected $sourceTermType = GlossaryTerm::class;
  protected $sourceTermDataType = '';
  protected $targetTermType = GlossaryTerm::class;
  protected $targetTermDataType = '';

  /**
   * @param GlossaryTerm
   */
  public function setSourceTerm(GlossaryTerm $sourceTerm)
  {
    $this->sourceTerm = $sourceTerm;
  }
  /**
   * @return GlossaryTerm
   */
  public function getSourceTerm()
  {
    return $this->sourceTerm;
  }
  /**
   * @param GlossaryTerm
   */
  public function setTargetTerm(GlossaryTerm $targetTerm)
  {
    $this->targetTerm = $targetTerm;
  }
  /**
   * @return GlossaryTerm
   */
  public function getTargetTerm()
  {
    return $this->targetTerm;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GlossaryTermsPair::class, 'Google_Service_Translate_GlossaryTermsPair');
