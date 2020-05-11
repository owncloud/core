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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpec extends Google_Collection
{
  protected $collection_key = 'childParameterSpecs';
  protected $categoricalValueSpecType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecCategoricalValueSpec';
  protected $categoricalValueSpecDataType = '';
  protected $childParameterSpecsType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpec';
  protected $childParameterSpecsDataType = 'array';
  protected $discreteValueSpecType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecDiscreteValueSpec';
  protected $discreteValueSpecDataType = '';
  protected $doubleValueSpecType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecDoubleValueSpec';
  protected $doubleValueSpecDataType = '';
  protected $integerValueSpecType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecIntegerValueSpec';
  protected $integerValueSpecDataType = '';
  public $parameter;
  protected $parentCategoricalValuesType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentCategoricalValueSpec';
  protected $parentCategoricalValuesDataType = '';
  protected $parentDiscreteValuesType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentDiscreteValueSpec';
  protected $parentDiscreteValuesDataType = '';
  protected $parentIntValuesType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentIntValueSpec';
  protected $parentIntValuesDataType = '';
  public $scaleType;
  public $type;

  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecCategoricalValueSpec
   */
  public function setCategoricalValueSpec(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecCategoricalValueSpec $categoricalValueSpec)
  {
    $this->categoricalValueSpec = $categoricalValueSpec;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecCategoricalValueSpec
   */
  public function getCategoricalValueSpec()
  {
    return $this->categoricalValueSpec;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpec
   */
  public function setChildParameterSpecs($childParameterSpecs)
  {
    $this->childParameterSpecs = $childParameterSpecs;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpec
   */
  public function getChildParameterSpecs()
  {
    return $this->childParameterSpecs;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecDiscreteValueSpec
   */
  public function setDiscreteValueSpec(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecDiscreteValueSpec $discreteValueSpec)
  {
    $this->discreteValueSpec = $discreteValueSpec;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecDiscreteValueSpec
   */
  public function getDiscreteValueSpec()
  {
    return $this->discreteValueSpec;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecDoubleValueSpec
   */
  public function setDoubleValueSpec(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecDoubleValueSpec $doubleValueSpec)
  {
    $this->doubleValueSpec = $doubleValueSpec;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecDoubleValueSpec
   */
  public function getDoubleValueSpec()
  {
    return $this->doubleValueSpec;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecIntegerValueSpec
   */
  public function setIntegerValueSpec(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecIntegerValueSpec $integerValueSpec)
  {
    $this->integerValueSpec = $integerValueSpec;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecIntegerValueSpec
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
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentCategoricalValueSpec
   */
  public function setParentCategoricalValues(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentCategoricalValueSpec $parentCategoricalValues)
  {
    $this->parentCategoricalValues = $parentCategoricalValues;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentCategoricalValueSpec
   */
  public function getParentCategoricalValues()
  {
    return $this->parentCategoricalValues;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentDiscreteValueSpec
   */
  public function setParentDiscreteValues(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentDiscreteValueSpec $parentDiscreteValues)
  {
    $this->parentDiscreteValues = $parentDiscreteValues;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentDiscreteValueSpec
   */
  public function getParentDiscreteValues()
  {
    return $this->parentDiscreteValues;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentIntValueSpec
   */
  public function setParentIntValues(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentIntValueSpec $parentIntValues)
  {
    $this->parentIntValues = $parentIntValues;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpecMatchingParentIntValueSpec
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
