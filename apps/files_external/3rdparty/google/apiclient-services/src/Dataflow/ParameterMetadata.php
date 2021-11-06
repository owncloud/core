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

namespace Google\Service\Dataflow;

class ParameterMetadata extends \Google\Collection
{
  protected $collection_key = 'regexes';
  public $customMetadata;
  public $helpText;
  public $isOptional;
  public $label;
  public $name;
  public $paramType;
  public $regexes;

  public function setCustomMetadata($customMetadata)
  {
    $this->customMetadata = $customMetadata;
  }
  public function getCustomMetadata()
  {
    return $this->customMetadata;
  }
  public function setHelpText($helpText)
  {
    $this->helpText = $helpText;
  }
  public function getHelpText()
  {
    return $this->helpText;
  }
  public function setIsOptional($isOptional)
  {
    $this->isOptional = $isOptional;
  }
  public function getIsOptional()
  {
    return $this->isOptional;
  }
  public function setLabel($label)
  {
    $this->label = $label;
  }
  public function getLabel()
  {
    return $this->label;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParamType($paramType)
  {
    $this->paramType = $paramType;
  }
  public function getParamType()
  {
    return $this->paramType;
  }
  public function setRegexes($regexes)
  {
    $this->regexes = $regexes;
  }
  public function getRegexes()
  {
    return $this->regexes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ParameterMetadata::class, 'Google_Service_Dataflow_ParameterMetadata');
