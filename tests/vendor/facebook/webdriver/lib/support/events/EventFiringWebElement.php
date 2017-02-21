<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

class EventFiringWebElement implements WebDriverElement, WebDriverLocatable {

  /**
   * @var WebDriverElement
   */
  protected $element;

  /**
   * @var WebDriverDispatcher
   */
  protected $dispatcher;

  /**
   * @param WebDriverElement    $element
   * @param WebDriverDispatcher $dispatcher
   */
  public function __construct(WebDriverElement $element,
                              WebDriverDispatcher $dispatcher) {
    $this->element = $element;
    $this->dispatcher = $dispatcher;
    return $this;
  }

  /**
   * @return WebDriverDispatcher
   */
  public function getDispatcher() {
    return $this->dispatcher;
  }

  /**
   * @param mixed $method
   * @return void
   */
  protected function dispatch($method) {
    if (!$this->dispatcher) {
      return;
    }
    $arguments = func_get_args();
    unset($arguments[0]);
    $this->dispatcher->dispatch($method, $arguments);
  }

  /**
   * @return WebDriverElement
   */
  public function getElement() {
    return $this->element;
  }

  /**
   * @param WebDriverElement $element
   * @return EventFiringWebElement
   */
  private function newElement(WebDriverElement $element) {
    return new EventFiringWebElement($element, $this->getDispatcher());
  }

  /**
   * @param mixed $value
   * @return $this
   * @throws WebDriverException
   */
  public function sendKeys($value) {

    $this->dispatch('beforeChangeValueOf', $this);
    try {
      $this->element->sendKeys($value);
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
    $this->dispatch('afterChangeValueOf', $this);
    return $this;

  }

  /**
   * @return $this
   * @throws WebDriverException
   */
  public function click() {
    $this->dispatch('beforeClickOn', $this);
    try {
      $this->element->click();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
    $this->dispatch('afterClickOn', $this);
    return $this;
  }

  /**
   * @param WebDriverBy $by
   * @return EventFiringWebElement
   * @throws WebDriverException
   */
  public function findElement(WebDriverBy $by) {
    $this->dispatch(
      'beforeFindBy',
      $by,
      $this,
      $this->dispatcher->getDefaultDriver());
    try {
      $element = $this->newElement($this->element->findElement($by));
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
    $this->dispatch(
      'afterFindBy',
      $by,
      $this,
      $this->dispatcher->getDefaultDriver()
    );
    return $element;
  }

  /**
   * @param WebDriverBy $by
   * @return array
   * @throws WebDriverException
   */
  public function findElements(WebDriverBy $by) {
    $this->dispatch(
      'beforeFindBy',
      $by,
      $this,
      $this->dispatcher->getDefaultDriver()
    );
    try {
      $elements = array();
      foreach ($this->element->findElements($by) as $element) {
        $elements[] = $this->newElement($element);
      }
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
    $this->dispatch(
      'afterFindBy',
      $by,
      $this,
      $this->dispatcher->getDefaultDriver()
    );
    return $elements;
  }

  /**
   * @return $this
   * @throws WebDriverException
   */
  public function clear() {
    try {
      $this->element->clear();
      return $this;
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @param string $attribute_name
   * @return string
   * @throws WebDriverException
   */
  public function getAttribute($attribute_name) {
    try {
      return $this->element->getAttribute($attribute_name);
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @param string $css_property_name
   * @return string
   * @throws WebDriverException
   */
  public function getCSSValue($css_property_name) {
    try {
      return $this->element->getCSSValue($css_property_name);
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return WebDriverPoint
   * @throws WebDriverException
   */
  public function getLocation() {
    try {
      return $this->element->getLocation();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return WebDriverPoint
   * @throws WebDriverException
   */
  public function getLocationOnScreenOnceScrolledIntoView() {
    try {
      return $this->element->getLocationOnScreenOnceScrolledIntoView();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return WebDriverCoordinates
   */
  public function getCoordinates() {
    try {
      return $this->element->getCoordinates();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }


  /**
   * @return WebDriverDimension
   * @throws WebDriverException
   */
  public function getSize() {
    try {
      return $this->element->getSize();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return string
   * @throws WebDriverException
   */
  public function getTagName() {
    try {
      return $this->element->getTagName();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return string
   * @throws WebDriverException
   */
  public function getText() {
    try {
      return $this->element->getText();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return bool
   * @throws WebDriverException
   */
  public function isDisplayed() {
    try {
      return $this->element->isDisplayed();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return bool
   * @throws WebDriverException
   */
  public function isEnabled() {
    try {
      return $this->element->isEnabled();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return bool
   * @throws WebDriverException
   */
  public function isSelected() {
    try {
      return $this->element->isSelected();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return $this
   * @throws WebDriverException
   */
  public function submit() {
    try {
      $this->element->submit();
      return $this;
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return string
   * @throws WebDriverException
   */
  public function getID() {
    try {
      return $this->element->getID();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }


  /**
   * Test if two element IDs refer to the same DOM element.
   *
   * @param WebDriverElement $other
   * @return bool
   */
  public function equals(WebDriverElement $other) {
    try {
      return $this->element->equals($other);
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  private function dispatchOnException($exception) {
    $this->dispatch(
      'onException',
      $exception,
      $this->dispatcher->getDefaultDriver()
    );
    throw $exception;
  }


}
