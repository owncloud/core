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

namespace Google\Service\Docs;

class Footnote extends \Google\Collection
{
  protected $collection_key = 'content';
  protected $contentType = StructuralElement::class;
  protected $contentDataType = 'array';
  /**
   * @var string
   */
  public $footnoteId;

  /**
   * @param StructuralElement[]
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return StructuralElement[]
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param string
   */
  public function setFootnoteId($footnoteId)
  {
    $this->footnoteId = $footnoteId;
  }
  /**
   * @return string
   */
  public function getFootnoteId()
  {
    return $this->footnoteId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Footnote::class, 'Google_Service_Docs_Footnote');
