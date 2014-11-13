<?php
/**
 * The Random Factory
 *
 * Use this factory to instantiate random number generators, sources and mixers.
 *
 * PHP version 5.3
 *
 * @category   PHPPasswordLib
 * @package    Random
 * @author     Anthony Ferrara <ircmaxell@ircmaxell.com>
 * @copyright  2011 The Authors
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    Build @@version@@
 */

namespace RandomLib;

use SecurityLib\Strength;

/**
 * The Random Factory
 *
 * Use this factory to instantiate random number generators, sources and mixers.
 *
 * @category   PHPPasswordLib
 * @package    Random
 * @author     Anthony Ferrara <ircmaxell@ircmaxell.com>
 */
class Factory extends \SecurityLib\AbstractFactory {

    /**
     * @var array A list of available random number mixing strategies
     */
    protected $mixers = array();

    /**
     * @var array A list of available random number sources
     */
    protected $sources = array();

    /**
     * Build a new instance of the factory, loading core mixers and sources
     *
     * @return void
     */
    public function __construct() {
        $this->loadMixers();
        $this->loadSources();
    }

    /**
     * Get a generator for the requested strength
     *
     * @param Strength $strength The requested strength of the random number
     *
     * @return Generator The instantiated generator
     * @throws RuntimeException If an appropriate mixing strategy isn't found
     */
    public function getGenerator(\SecurityLib\Strength $strength) {
        $sources    = $this->getSources();
        $newSources = array();
        foreach ($sources as $source) {
            if ($strength->compare($source::getStrength()) <= 0) {
                $newSources[] = new $source;
            }
        }
        $mixer = $this->findMixer($strength);
        return new Generator($newSources, $mixer);
    }

    /**
     * Get a high strength random number generator
     *
     * High Strength keys should ONLY be used for generating extremely strong
     * cryptographic keys.  Generating them is very resource intensive and may
     * take several minutes or more depending on the requested size.
     *
     * @return Generator The instantiated generator
     */
    public function getHighStrengthGenerator() {
        return $this->getGenerator(new Strength(Strength::HIGH));
    }

    /**
     * Get a low strength random number generator
     *
     * Low Strength should be used anywhere that random strings are needed in a
     * non-cryptographical setting.  They are not strong enough to be used as
     * keys or salts.  They are however useful for one-time use tokens.
     *
     * @return Generator The instantiated generator
     */
    public function getLowStrengthGenerator() {
        return $this->getGenerator(new Strength(Strength::LOW));
    }

    /**
     * Get a medium strength random number generator
     *
     * Medium Strength should be used for most needs of a cryptographic nature.
     * They are strong enough to be used as keys and salts.  However, they do
     * take some time and resources to generate, so they should not be over-used
     *
     * @return Generator The instantiated generator
     */
    public function getMediumStrengthGenerator() {
        return $this->getGenerator(new Strength(Strength::MEDIUM));
    }

    /**
     * Get all loaded mixing strategies
     *
     * @return array An array of mixers
     */
    public function getMixers() {
        return $this->mixers;
    }

    /**
     * Get all loaded random number sources
     *
     * @return array An array of sources
     */
    public function getSources() {
        return $this->sources;
    }

    /**
     * Register a mixing strategy for this factory instance
     *
     * @param string $name  The name of the stategy
     * @param string $class The class name of the implementation
     *
     * @return Factory $this The current factory instance
     */
    public function registerMixer($name, $class) {
        $this->registerType(
            'mixers',
            __NAMESPACE__ . '\\Mixer',
            $name,
            $class
        );
        return $this;
    }

    /**
     * Register a random number source for this factory instance
     *
     * Note that this class must implement the Source interface
     *
     * @param string $name  The name of the stategy
     * @param string $class The class name of the implementation
     *
     * @return Factory $this The current factory instance
     */
    public function registerSource($name, $class) {
        $this->registerType(
            'sources',
            __NAMESPACE__ . '\\Source',
            $name,
            $class
        );
        return $this;
    }

    /**
     * Find a mixer based upon the requested strength
     *
     * @param Strength $strength The strength mixer to find
     *
     * @return Mixer The found mixer
     * @throws RuntimeException if a valid mixer cannot be found
     */
    protected function findMixer(\SecurityLib\Strength $strength) {
        $newMixer = null;
        $fallback = null;
        foreach ($this->getMixers() as $mixer) {
            if ($strength->compare($mixer::getStrength()) == 0) {
                $newMixer = new $mixer;
            } elseif ($strength->compare($mixer::getStrength()) == 1) {
                $fallback = new $mixer;
            }
        }
        if (is_null($newMixer)) {
            if (is_null($fallback)) {
                throw new \RuntimeException('Could not find mixer');
            }
            return $fallback;
        }
        return $newMixer;
    }

    /**
     * Load all core mixing strategies
     *
     * @return void
     */
    protected function loadMixers() {
        $this->loadFiles(
            __DIR__ . '/Mixer',
            __NAMESPACE__ . '\\Mixer\\',
            array($this, 'registerMixer')
        );
    }

    /**
     * Load all core random number sources
     *
     * @return void
     */
    protected function loadSources() {
        $this->loadFiles(
            __DIR__ . '/Source',
            __NAMESPACE__ . '\\Source\\',
            array($this, 'registerSource')
        );
    }

}

