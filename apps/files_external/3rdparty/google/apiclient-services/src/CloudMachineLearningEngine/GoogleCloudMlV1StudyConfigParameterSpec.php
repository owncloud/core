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

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1StudyConfigParameterSpec extends \Google\Collection
{
  protected $collection_key = 'childParameterSpecs';
  protected $categoricalValueSpecType = GoogleCloudMlV1StudyConfigParameterSpecCategoricalValueSpec::class;
  protected $categoricalValueSpecDataType = '';
  protected $childParameterSpecsType = GoogleCloudMlV1StudyConfigParameterSpec::class;
  protected $childParameterSpecsDataType = 'array';
  protected $discreteValueSpecType = GoogleCloudMlV1StudyConfigParameterSpecDiscreteValueSpec::class;
  protected $discreteValueSpecDataType = '';
  protected $doubleValueSpecType = GoogleCloudMlV1StudyConfigParameterSpecDoubleValueSpec::class;
  protected $doubleValueSpecDataType = '';
  protected $integerValueSpecType = GoogleCloudMlV1StudyConfigParameterSpecIntegerValueSpec::class;
  protected $integerValueSpecDataType = '';
  public $parameter;
  protected $parentCategoricalValuesType = GoogleCloudMlV1StudyConfigParameterSpecMatchingParentCategoricalValueSpec::class;
  protected $parentCategoricalValuesDataType = '';
  protected $parentDiscreteValuesType = GoogleCloudMlV1StudyConfigParameterSpecMatchingParentDiscreteValueSpec::class;
  protected $parentDiscreteValuesDataType = '';
  protected $parentIntValuesType = GoogleCloudMlV1StudyConfigParameterSpecMatchingParentIntValueSpec::class;
  protected $parentIntValuesDataType = '';
  public $scaleType;
  public $type;

  /**
   * @param GoogleCloudMlV1StudyConfigParameterSpecCategoricalValueSpec
   */
  public function setCategoricalValueSpec(GoogleCloudMlV1StudyConfigParameterSpecCategoricalValueSpec $categoricalValueSpec)
  {
    $this->categoricalValueSpec = $categoricalValueSpec;
  }
  /**
   * @return GoogleCloudMlV1StudyConfigParameterSpecCategoricalValueSpec
   */
  public function getCategoricalValueSpec()
  {
    return $this->categoricalValueSpec;
  }
  /**
   * @param GoogleCloudMlV1StudyConfigParameterSpec[]
   */
  public function setChildParameterSpecs($childParameterSpecs)
  {
    $this->childParameterSpecs = $childParameterSpecs;
  }
  /**
   * @return GoogleCloudMlV1StudyConfigParameterSpec[]
   */
  public function getChildParameterSpecs()
  {
    return $this->childParameterSpecs;
  }
  /**
   * @param GoogleCloudMlV1StudyConfigParameterSpecDiscreteValueSpec
   */
  public function setDiscreteValueSpec(GoogleCloudMlV1StudyConfigParameterSpecDiscreteValueSpec $discreteValueSpec)
  {
    $this->discreteValueSpec = $discreteValueSpec;
  }
  /**
   * @return GoogleCloudMlV1StudyConfigParameterSpecDiscreteValueSpec
   */
  public function getDiscreteValueSpec()
  {
    return $this->discreteValueSpec;
  }
  /**
   * @param GoogleCloudMlV1StudyConfigParameterSpecDoubleValueSpec
   */
  public function setDoubleValueSpec(GoogleCloudMlV1StudyConfigParameterSpecDoubleValueSpec $doubleValueSpec)
  {
    $this->doubleValueSpec = $doubleValueSpec;
  }
  /**
   * @return GoogleCloudMlV1StudyConfigParameterSpecDoubleValueSpec
   */
  public function getDoubleValueSpec()
  {
    return $this->doubleValueSpec;
  }
  /**
   * @param GoogleCloudMlV1StudyConfigParameterSpecIntegerValueSpec
   */
  public function setIntegerValueSpec(GoogleCloudMlV1StudyConfigParameterSpecIntegerValueSpec $integerValueSpec)
  {
    $this->integerValueSpec = $integerValueSpec;
  }
  /**
   * @return GoogleCloudMlV1StudyConfigParameterSpecIntegerValueSpec
   */
  public function getIntegerValueSpec()
  {
    return $this->integerValueSpec;
  }
  public function setParameter($parameter)
  {
    $this->parameter = $parameter;
  }
  public function getParameter()
  {
    return $this->parameter;
  }
  /**
   * @param GoogleCloudMlV1StudyConfigParameterSpecMatchingParentCategoricalValueSpec
   */
  public function setParentCategoricalValues(GoogleCloudMlV1StudyConfigParameterSpecMatchingParentCategoricalValueSpec $parentCategoricalValues)
  {
    $this->parentCategoricalValues = $parentCategoricalValues;
  }
  /**
   * @return GoogleCloudMlV1StudyConfigParameterSpecMatchingParentCategoricalValueSpec
   */
  public function getParentCategoricalValues()
  {
    return $this->parentCategoricalValues;
  }
  /**
   * @param GoogleCloudMlV1StudyConfigParameterSpecMatchingParentDiscreteValueSpec
   */
  public function setParentDiscreteValues(GoogleCloudMlV1StudyConfigParameterSpecMatchingParentDiscreteValueSpec $parentDiscreteValues)
  {
    $this->parentDiscreteValues = $parentDiscreteValues;
  }
  /**
   * @return GoogleCloudMlV1StudyConfigParameterSpecMatchingParentDiscreteValueSpec
   */
  public function getParentDiscreteValues()
  {
    return $this->parentDiscreteValues;
  }
  /**
   * @param GoogleCloudMlV1StudyConfigParameterSpecMatchingParentIntValueSpec
   */
  public function setParentIntValues(GoogleCloudMlV1StudyConfigParameterSpecMatchingParentIntValueSpec $parentIntValues)
  {
    $this->parentIntValues = $parentIntValues;
  }
  /**
   * @return GoogleCloudMlV1StudyConfigParameterSpecMatchingParentIntValueSpec
   */
  public function getParentIntValues()
  {
    return $this->parentIntValues;
  }
  public function setScaleType($scaleType)
  {
    $this->scaleType = $scaleType;
  }
  public function getScaleType()
  {
    return $this->scaleType;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1StudyConfigParameterSpec::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpec');
